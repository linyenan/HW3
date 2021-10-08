<?php require_once 'db.inc.php' ?>
<?php session_start() ?>
<?php
// 如果這個階段沒有登入帳號，或沒有購物車，就將頁面轉到商品確認頁
if (!isset($_SESSION['email']) || !isset($_SESSION['cart'])) {
    header("Location: shopcart1.php");
    exit();
}

// echo"<pre>";
// print_r($_SESSION);
// echo "<pre>";

// echo"<pre>";
// print_r($_POST);
// echo "<pre>";

//總額 與 優惠後總額
$total = 0;
// $total_m = 0;

// echo "<pre>";
// print_r($total);
// echo "<pre>";

//計算總價
foreach ($_SESSION['cart'] as $key => $obj) {
    // $total += $obj['prod_price'] * $obj['prod_qty'];
    // 計算商品總價
    $renttotal = 0;
    $buytotal = 0;
    $traveltotal = 0;


    //計算小計
    if ($obj['func_name'] == 17) {

        $renttotal += $obj['rental_charge'] * $obj['prod_qty'] * 3;
    }
    if($obj['func_name'] == 21){

        $buytotal += $obj['prod_price'] * $obj['prod_qty'];
    }
    if($obj['func_name'] == 0){

        $traveltotal += $obj['prod_price'] * $obj['prod_qty'];
    }
    $total += $renttotal + $buytotal + $traveltotal;
}


/**
 * 先讓 總額 與 優惠後總額 的值一樣, 
 * 之後看看是否使用優惠代碼，來決定實際的優惠後總額
 */
// $total_m = $total;

//判斷優惠代碼是否存在，有則計算出優惠後價格
// if( $_SESSION['form']['coupon_code'] != '' ){
//     $sqlCoupon = "SELECT * FROM `coupon` WHERE `code` = '{$_SESSION['form']['coupon_code']}'";
//     $stmt = $pdo->query($sqlCoupon);
//     if($stmt->rowCount() > 0){
//         //取得優惠資訊
//         $obj = $stmt->fetch();

//         //計算優惠後總額
//         $total_m = ceil($total * $obj['percentage']);

//         //將優惠券設定為已使用
//         $sqlUpdate = "UPDATE `coupon` SET `isUsed` = 1 WHERE `code` = '{$_SESSION['form']['coupon_code']}'";
//         $pdo->query($sqlUpdate);
//     }
// }

//信用卡資訊
$card_number = $_POST['number'];
$card_valid_date = $_POST['expiry'];
$card_ccv = $_POST['cvc'];
$card_holder = $_POST['name'];

// // 是否付款
// $obj['paid']= true;
// $paid ($arr0['paid']) ? 'paid' : 'not-paid';


//建立訂單
$sql =  "INSERT INTO 
        `orders`
        (`email`,`transport_payment`, `recipient_email`, 
        `recipient_first_name`, `recipient_last_name`, `gender`, 
        `country`,`recipient_phone_number`, `recipient_address`, `recipient_comments`, 
        `card_number`, `card_valid_date`, `card_ccv`, 
        `card_holder`, `total`,`invoice_carrier_number`) 
        VALUES 
        ('{$_SESSION['email']}','{$_SESSION['form']['transport_payment']}', '{$_SESSION['form']['recipient_email']}', 
        '{$_SESSION['form']['recipient_first_name']}', '{$_SESSION['form']['recipient_last_name']}', '{$_SESSION['form']['gender']}', 
        '{$_SESSION['form']['country']}','{$_SESSION['form']['recipient_phone_number']}', 
        '{$_SESSION['form']['recipient_address']}', '{$_SESSION['form']['recipient_comments']}', '{$card_number}', 
        '{$card_valid_date}', '{$card_ccv}', '{$card_holder}', 
        {$total},'{$_SESSION['form']['invoice_carrier_number']}')";
$stmt = $pdo->query($sql);

// echo "<pre>";
// print_r($stmt->errorInfo());
// echo "</pre>";



/**
 * 若訂單成立，則取得新增資料的 ID (自動編號，Auto Increment 的 ID)，
 * 透過 ID 來建立訂單資料表的訂單編號 (order_id)。
 */
if ($stmt->rowCount() > 0) {
    //取得新增資料時的自動編號
    $lastInsertId = $pdo->lastInsertId();

    //建立訂單編號
    $order_id = date("Ymd") . sprintf('%05d', $lastInsertId);

    //將訂單編號更新回 orders 資料表
    $sqlUpdate = "UPDATE `orders` SET `order_id` = '{$order_id}' WHERE `id` = {$lastInsertId}";
    $pdo->query($sqlUpdate);

    //處理商品明細資訊
    foreach ($_SESSION['cart'] as $key => $obj) {
        // //計算小計
        // $renttotal = $obj['rental_charge'] * $obj['prod_qty'];
        // $subtotal = $obj['prod_price'] * $obj['prod_qty'];
        $subtotal = 0;

        //計算小計
        if ($obj['func_name'] == 17) {

            $subtotal = $obj['rental_charge'] * $obj['prod_qty'] * 3;
        }
        if ($obj['func_name'] == 21) {

            $subtotal = $obj['prod_price'] * $obj['prod_qty'];
        }
        if ($obj['func_name'] == 0) {

            $subtotal = $obj['prod_price'] * $obj['prod_qty'];
        }


        // print_r($obj);

        // $obj['prod_price'] = ( $obj['prod_price'] != NULL || $obj['prod_price'] != "" )  ? $obj['prod_price'] : NULL;

        //新增商品名細
        $sqlDetail = "INSERT INTO `orders_detail`
                    (`order_id`, `prod_id`, `func_name`, `prod_name`, 
                    `prod_description`, `prod_main_img`, `prod_price`,
                     `rental_charge`, `rental_day`, `travel_day`, `prod_qty`, 
                     `subtotal`) VALUES
                    ('{$order_id}', {$obj['prod_id']}, {$obj['func_name']},'{$obj['prod_name']}','{$obj['prod_description']}',  
                    '{$obj['prod_main_img']}', '{$obj['prod_price']}', '{$obj['rental_charge']}', 
                    '{$obj['rental_day']}', '{$obj['travel_day']}',  {$obj['prod_qty']},{$subtotal})";

        // echo $sqlDetail;
        $pdo->query($sqlDetail);

        // echo "<pre>";
        // print_r($pdo->errorInfo());
        // echo "</pre>";
    }


    //刪除購物車
    unset($_SESSION['cart'], $_SESSION['form']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./reset.css">
    <link rel="stylesheet" href="./header.css">
    <link rel="stylesheet" href="./nav-footer.css">
    <title>Document</title>
    <style>
        body {
            background-color: #FDFFF8;
            font-family: 'Noto Sans TC', sans-serif;
        }

        .main {
            max-width: 1640px;
            min-height: 85vh;
            margin: 0 auto;
        }

        .content {
            margin-top: 104px;
        }

        /* 結帳成功 */
        h2 {
            font-size: 36px;
            font-weight: 500;
            color: #707070;
        }

        h4 {
            font-size: 26px;
            font-weight: 500;
            color: #707070;
            margin-top: 20px;
        }

        p {
            color: #707070;
            max-width: 50%;
            text-align: center;
            font-size: 18px;
            margin: 30px auto;
            line-height: 24px;
        }

        .notice {
            color: red;
            font-size: 16px;
            background-color: rgba(255, 122, 122, 0.351);
            border: 1px solid rgba(255, 122, 122, 0.351);
            border-radius: 5px;
            padding: 20px;
        }

        .col-6 {
            position: relative;
        }

        .circle i {
            font-size: 48px;
            color: #ffffff;
            position: absolute;
            top: 35%;
            left: 50%;
            transform: translateX(-50%);
            z-index: 1;
        }

        .info {
            margin-top: 20px;
        }

        #next-step {
            font-size: 16px;
            width: 180px;
            height: 50px;
            border: none !important;
            color: #fff;
            background-color: #FF9F1C;
        }

        #next-step:hover {
            background-color: #FDB149;
        }

        .btn:hover,
        .btn:focus {
            outline: none;
            border: none !important;
            box-shadow: none !important;
        }

        #contact {
            font-size: 16px;
            width: 180px;
            height: 50px;
            border: none !important;
            color: #fff;
            background-color: #00A878;
        }

        #contact:hover {
            background-color: #1BBA8D;
        }

        @media screen and (max-width:880px) {
            .content {
                margin-top: 50px;
            }

            .info {
                margin-top: 20px;
            }

            h2 {
                font-size: 26px;
                font-weight: 700;
                color: #707070;
            }

            h4 {
                font-size: 18px;
                font-weight: 500;
                color: #707070;
                margin-top: 20px;
            }

            p {
                max-width: 100%;
                text-align: center;
                font-size: 16px;
                padding-top: 20px;
                margin: 0 auto;
                line-height: 24px;
            }

            .notice {
                margin: 20px 15px;
                color: red;
                font-size: 14px;
            }

            #next-step {
                width: 100px;
                height: 35px;
                color: #fff;
                background-color: #FF9F1C;
            }

            #contact {
                width: 100px;
                height: 35px;
                color: #fff;
            }
        }

        /* 同意並送出 */
        #next-step {
            background-color: #FF9F1C;
        }

        #contact {
            background-color: #00A878;
        }

        .color {
            color: #FF9F1C;
        }
    </style>
</head>

<body>
    <!-- navbar -->
    <?php require_once 'header.php' ?>
    <div class="main">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 text-center content">
                    <span class="circle-group">
                        <img src="./SVG/finish.svg" alt="">
                    </span>
                    <div class="info">
                        <h2>結帳成功</h2>
                        <h4>您的訂單編號為：<?= $order_id ?></h4>
                        <p class="notice">提醒您，寶島旅人瘋不會主動以電話方式聯繫您，如有不明來電請勿理會並且請您撥打反詐騙專線165，謝謝！</p>
                        <p>感謝您的支持，祝您旅途愉快！</p>
                    </div>
                    <div class="row my-5">
                        <div class="col-6">
                            <a href="./index.php">
                                <button type="button" class="btn btn-primary btn-lg" id="contact">回到首頁</button>
                            </a>
                        </div>
                        <div class="col-6">
                            <a href="./member-order.php">
                                <button type="button" class="btn btn-primary btn-lg" id="next-step">前往會員中心</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- footer -->
    <footer></footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="./js/header.js"></script>
</body>

</html>