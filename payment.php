<?php require_once 'db.inc.php' ?>
<?php session_start() ?>
<?php
//如果這個階段沒有購物車，就將頁面轉到商品確認頁
if (!isset($_SESSION['cart'])) {
    header("Location: shopcart1.php");
    exit();
}

// echo "<pre>";
// print_r($_POST);
// echo "<pre>";

//將表單資訊寫入 session，之後建立訂單時，一起變成訂單資訊
$_SESSION['form'] = [];
$_SESSION['form']['recipient_email'] = $_POST['recipient_email'];
$_SESSION['form']['recipient_first_name'] = $_POST['recipient_first_name'];
$_SESSION['form']['recipient_last_name'] = $_POST['recipient_last_name'];
$_SESSION['form']['gender'] = $_POST['gender'];
$_SESSION['form']['country'] = $_POST['country'];
$_SESSION['form']['recipient_phone_number'] = $_POST['recipient_phone_number'];
$_SESSION['form']['recipient_address'] = $_POST['recipient_address'];
$_SESSION['form']['recipient_comments'] = $_POST['recipient_comments'];
// $_SESSION['form']['recipient_address'] = "火星";
// echo "<pre>";
// print_r($_SESSION);
// echo "<pre>";

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
    <link rel="stylesheet" href="./header.css">
    <link rel="stylesheet" href="./nav-footer.css">
    <title>payment</title>
    <style>
        body {
            background-color: #FDFFF8;
            font-family: 'Noto Sans TC', sans-serif;
        }

        .container {
            max-width: 1640px;
            min-height: 85vh;
        }

        /* 訂購人資料 */
        .credit-card {
            width: 61px;
        }

        /* 付款方式 */
        .way,
        .invoice {
            font-size: 24px;
            font-weight: 500;
        }

        .creditcard,
        .remit {
            font-size: 18px;
            font-weight: 500;
        }

        .sch-title {
            font-size: 18px;
            line-height: 24px;
            font-weight: 500;
        }

        .section-03 {
            margin-left: 122px;
        }

        h5 {
            font-size: 16px;
            font-weight: 400;
            color: #707070;
        }

        input[type=checkbox] {
            background-image: url(./SVG/checkbox.svg);
            user-select: none;
            /* 防止文字被滑鼠選取反白 */
            outline: none;
            border: none !important;
            box-shadow: none !important;
            transition: 0.2s all linear;
            margin-right: 5px;
        }

        input[type=checkbox]:checked {
            background-color: #B1D660;
            outline: none;
        }

        #next-step {
            width: 180px;
            height: 50px;
            color: #fff;
            background-color: #FF9F1C;
        }

        #next-step:hover {
            background-color: #FDB149;
        }

        /* 同意並送出 */
        #next-step {
            background-color: #FF9F1C;
        }

        .receipt {
            font-size: 26px;
            color: #FF9F1C;
        }

        label {
            color: #707070;
            cursor: pointer;
        }

        @media screen and (max-width:880px) {
            .section-03 {
                margin: 0;
                margin-top: 50px;
            }

            .way,
            .invoice {
                font-size: 18px;
                font-weight: 500;
            }

            .creditcard,
            .remit,
            .save {
                font-size: 18px;
                font-weight: 400;
            }

            .receipt {
                font-size: 18px;
                color: #FF9F1C;
            }

            h5 {
                font-size: 16px;
                line-height: 24px;
                font-weight: 400;
            }

            label {
                font-size: 16px;
                color: #707070;
                cursor: pointer;
            }

        }
    </style>
</head>

<body>
    <!-- navbar -->
    <?php require_once 'header.php' ?>
    <div class="main">
        <div class="container">
            <div class="my-xl-4">
                <div class="d-xl-block d-none">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="1644" height="104" viewBox="0 0 1644 104">
                        <defs>
                            <clipPath id="clip-path">
                                <rect width="31" height="31" fill="none" />
                            </clipPath>
                        </defs>
                        <circle id="椭圆_1" data-name="椭圆 1" cx="36" cy="36" r="36" fill="#abadb2" />
                        <circle id="椭圆_2" data-name="椭圆 2" cx="36" cy="36" r="36" transform="translate(784)" fill="#abadb2" />
                        <circle id="椭圆_3" data-name="椭圆 3" cx="36" cy="36" r="36" transform="translate(1568)" fill="#ff9f1c" />
                        <line id="直线_1" data-name="直线 1" x2="712" transform="translate(72.5 36.5)" fill="none" stroke="#abadb2" stroke-width="3" />
                        <line id="直线_2" data-name="直线 2" x2="712" transform="translate(856.5 36.5)" fill="none" stroke="#abadb2" stroke-width="3" />
                        <text id="填寫資料" transform="translate(780 99)" fill="#707070" font-size="20" font-family="YuGothicUI-Regular, Yu Gothic UI">
                            <tspan x="8" y="0" style="font-size: 16px;">填寫資料</tspan>
                        </text>
                        <text id="確認付款" transform="translate(1564 99)" fill="#707070" font-size="20" font-family="YuGothicUI-Regular, Yu Gothic UI">
                            <tspan x="8" y="0" style="font-size: 16px;">確認付款</tspan>
                        </text>
                        <text id="購物車" transform="translate(6 99)" fill="#707070" font-size="20" font-family="YuGothicUI-Regular, Yu Gothic UI">
                            <tspan x="8" y="0" style="font-size: 16px;">購物車</tspan>
                        </text>
                        <g id="Yes" transform="translate(20 21)" clip-path="url(#clip-path)">
                            <rect id="矩形_460" data-name="矩形 460" width="31" height="31" fill="none" />
                            <path id="Checkbox" d="M12.293,21.379,0,9.086,2.494,6.592l9.8,9.621L28.506,0,31,2.494Z" transform="translate(0 2)" fill="#fff" />
                        </g>
                        <g id="Options" transform="translate(1624 28) rotate(90)">
                            <rect id="矩形_449" data-name="矩形 449" width="16" height="16" transform="translate(0 12)" fill="none" />
                            <path id="联合_1" data-name="联合 1" d="M0,36a4,4,0,1,1,4,4A4,4,0,0,1,0,36ZM0,20a4,4,0,1,1,4,4A4,4,0,0,1,0,20ZM0,4A4,4,0,1,1,4,8,4,4,0,0,1,0,4Z" transform="translate(4)" fill="#fff" />
                        </g>
                        <g id="icon_content_create_24px" data-name="icon/content/create_24px" transform="translate(804 20)">
                            <rect id="Boundary" width="32" height="32" fill="none" />
                            <path id="_Color" data-name=" ↳Color" d="M5.417,26l0,0h0L0,26V20.584L15.974,4.61l5.417,5.416ZM22.935,8.481h0L17.52,3.065,20.163.422a1.44,1.44,0,0,1,2.037,0l3.38,3.38a1.443,1.443,0,0,1,0,2.037L22.936,8.48Z" transform="translate(3 3)" fill="#fff" />
                        </g>
                    </svg>
                </div>
                <div class="d-xl-none d-block" style="margin:20px 30px">
                    <svg xmlns="http://www.w3.org/2000/svg" width="292" height="60" viewBox="0 0 292 60">
                        <g id="组_2480" data-name="组 2480" transform="translate(-1212 -2017)">
                            <g id="组_2477" data-name="组 2477" transform="translate(-16 75)">
                                <g id="组_2149" data-name="组 2149" transform="translate(429 1794)">
                                    <circle id="椭圆_2" data-name="椭圆 2" cx="18" cy="18" r="18" transform="translate(924 148)" fill="#abadb2" />
                                    <g id="icon_content_create_24px" data-name="icon/content/create_24px" transform="translate(934 158)">
                                        <rect id="Boundary" width="16" height="16" fill="none" />
                                        <path id="_Color" data-name=" ↳Color" d="M2.083,10H0V7.917L6.144,1.773,8.227,3.856ZM8.821,3.262h0L6.738,1.179,7.755.162a.554.554,0,0,1,.783,0l1.3,1.3a.555.555,0,0,1,0,.783L8.822,3.262Z" transform="translate(3 3)" fill="#fff" />
                                    </g>
                                </g>
                            </g>
                            <line id="直线_204" data-name="直线 204" x2="95" transform="translate(1370.5 2035.5)" fill="none" stroke="#abadb2" stroke-width="3" />
                            <line id="直线_205" data-name="直线 205" x2="95" transform="translate(1245.5 2035.5)" fill="none" stroke="#abadb2" stroke-width="3" />
                            <g id="组_2476" data-name="组 2476" transform="translate(-16 74)">
                                <g id="组_2150" data-name="组 2150" transform="translate(842 1130)">
                                    <g id="组_822" data-name="组 822" transform="translate(386 813)">
                                        <circle id="椭圆_1" data-name="椭圆 1" cx="18" cy="18" r="18" fill="#ff9f1c" />
                                    </g>
                                    <path id="路径_668" data-name="路径 668" d="M264.426,661.325l5.313,5.34,8.413-8.6" transform="translate(132.711 168.633)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                </g>
                            </g>
                            <g id="组_2478" data-name="组 2478" transform="translate(-16 74)">
                                <g id="组_2148" data-name="组 2148" transform="translate(-230 1795)">
                                    <circle id="椭圆_3" data-name="椭圆 3" cx="18" cy="18" r="18" transform="translate(1708 148)" fill="#abadb2" />
                                </g>
                                <g id="Options" transform="translate(1504 1959) rotate(90)">
                                    <path id="联合_1" data-name="联合 1" d="M0,13.5A1.5,1.5,0,1,1,1.5,15,1.5,1.5,0,0,1,0,13.5Zm0-6A1.5,1.5,0,1,1,1.5,9,1.5,1.5,0,0,1,0,7.5Zm0-6A1.5,1.5,0,1,1,1.5,3,1.5,1.5,0,0,1,0,1.5Z" fill="#fff" />
                                </g>
                            </g>
                        </g>
                        <g id="组_2610" data-name="组 2610" transform="translate(-52 -76)">
                            <text id="購物車" transform="translate(52 133)" fill="#707070" font-size="12" font-family="YuGothicUI-Regular, Yu Gothic UI">
                                <tspan x="0" y="0">購物車</tspan>
                            </text>
                            <text id="填寫資料" transform="translate(171 133)" fill="#707070" font-size="12" font-family="YuGothicUI-Regular, Yu Gothic UI">
                                <tspan x="0" y="0">填寫資料</tspan>
                            </text>
                            <text id="確認付款" transform="translate(296 133)" fill="#707070" font-size="12" font-family="YuGothicUI-Regular, Yu Gothic UI">
                                <tspan x="0" y="0">確認付款</tspan>
                            </text>
                        </g>
                    </svg>
                </div>
                <!-- 付款方式 -->
                <form class="mt-xl-5 m-auto" name="myForm" method="post" action="payment_credit.php">
                    <div class="row">
                        <div class="col-xl-8">
                            <div class="col-12 p-5 bg-white shadow bg-body rounded">
                                <div class="g-4 needs-validation" novalidate>
                                    <div class="col-xl-12 border-bottom pb-3">
                                        <span class="way">付款方式</span>
                                    </div>
                                    <div class="row py-4">
                                        <div class="col-xl-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" name="transport_payment" checked>
                                                <label class="form-check-label creditcard" for="flexCheckDefault">
                                                    信用卡
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-xl-9 col-12">
                                            <h5>當點選信用卡，您將在下一頁連至第三方金流服務進行刷卡。</h5>
                                            <div class="d-flex">
                                                <img class="credit-card" src="./SVG/Visa_2021.svg" alt="">
                                                <img class="credit-card" src="./SVG/Mastercard-logo.svg" alt="">
                                                <img class="credit-card" src="./SVG/JCB_logo.svg" alt="">
                                                <img class="credit-card" src="./SVG/UnionPay_logo.svg" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" name="transport_payment">
                                                <label class="form-check-label remit" for="flexCheckDefault">ATM 轉帳
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-xl-9">
                                            <h5>當點選 ATM轉帳，您將在下一頁取得匯款資訊。</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- 電子發票 -->
                            <div class="col-xl-12 p-5 bg-white shadow bg-body rounded mt-5">
                                <div class="row g-4 needs-validation" novalidate>
                                    <div class="col-xl-12 mb-3 border-bottom pb-3">
                                        <span class="invoice">電子發票</span>
                                    </div>
                                    <div class="col-xl-12">
                                        <h5>以下資訊只用於開立發票，並不會在其他頁面顯示。<br>
                                            發票一經開立後不可更改，請確認資訊是否都填寫正確喔！<br>
                                            以下請擇一</h5>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label save" for="flexCheckDefault">
                                                存至寶島旅人瘋會員帳戶，若有中獎我們將寄信通知您。
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="row">
                                            <label for="inputEmail3" class="col-md-5 col-form-label">請輸入手機號碼</label>
                                            <div class="col-md-7">
                                                <input type="text" class="form-control" id="inputEmail3">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="row">
                                            <label for="inputEmail3" class="col-md-5 col-form-label">自然人憑證</label>
                                            <div class="col-md-7">
                                                <input type="text" class="form-control" id="inputEmail3" name="invoice_carrier_number">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- 訂單明細 -->
                        <div class="section-03 col-xl-3">
                            <?php
                            //購物車商品的數量
                            $count = 0;
                            $total = 0;

                            //判斷購物車是否存在，若存在，同時確認裡頭的商品數量
                            if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                                //更新商品數量
                                $count = count($_SESSION['cart']);


                                foreach ($_SESSION['cart'] as $key => $obj) {
                                    //計算小計
                                    $total += $obj['prod_price'] * $obj['prod_qty'];
                                }
                            }
                            ?>
                            <div class="col-xl-12 bg-white shadow bg-body rounded">
                                <!-- 行程 -->
                                <div class="row m-auto p-4">
                                    <h5 class="col-xl-12 col-6 text-center"><?= $_POST['recipient_first_name'] ?><?= $_POST['recipient_last_name'] ?></h5>
                                    <h5 class="col-xl-12 col-6 color receipt text-center">訂單明細</h5>
                                    <?php
                                    foreach ($_SESSION['cart'] as $key => $obj) {
                                        if ($obj['func_name'] == 0) {
                                    ?>
                                            <div class="col-xl-12 mt-5">
                                                <img class="img-thumbnail" style="width:260px ;height:190px ;" src="./images/<?= $obj['prod_main_img'] ?>" alt="">
                                                <div class="row mt-3">
                                                    <span class="sch-title fs-6"><?= $obj['prod_name'] ?></span>
                                                    <span class="sch-location"><?= $obj['prod_qty'] ?></span>
                                                </div>
                                            </div>
                                            <div class="row justify-content-between mt-3">
                                                <span class="col price">售價</span>
                                                <span class="col number"><?= $obj['prod_price'] ?></span>
                                            </div>
                                </div>
                        <?php
                                        }
                                    }
                        ?>
                        <!-- 購買商品 -->
                        <?php
                        foreach ($_SESSION['cart'] as $key => $obj) {
                            if ($obj['func_name'] == "21") {
                        ?>
                                <div class="row m-auto p-4">
                                    <div class="col-xl-12 mt-5">
                                        <img class="img-thumbnail" style="width:260px ;height:190px ;" src="./images/<?= $obj['prod_main_img'] ?>" alt="">
                                        <div class="row mt-3">
                                            <span class="sch-title fs-6"><?= $obj['prod_name'] ?></span>
                                            <span class="sch-location"><?= $obj['prod_qty'] ?></span>
                                        </div>
                                    </div>
                                    <div class="row justify-content-between mt-3">
                                        <span class="col price">售價</span>
                                        <span class="col number"><?= $obj['prod_price'] ?></span>
                                    </div>
                                </div>
                        <?php
                            }
                        }
                        ?>
                        <!-- 租借商品 -->
                        <?php
                        foreach ($_SESSION['cart'] as $key => $obj) {
                            if ($obj['func_name'] == "17") {
                        ?>
                                <div class="row m-auto p-4">
                                    <div class="col-xl-12 mt-5">
                                        <img class="img-thumbnail" style="width:260px ;height:190px ;" src="./images/<?= $obj['prod_main_img'] ?>" alt="">
                                        <div class="row mt-3">
                                            <span class="sch-title fs-6"><?= $obj['prod_name'] ?></span>
                                            <span class="sch-location"><?= $obj['prod_qty'] ?></span>
                                        </div>
                                    </div>
                                    <div class="row justify-content-between mt-3">
                                        <span class="col price">售價</span>
                                        <span class="col number"><?= $obj['rental_charge'] ?></span>
                                    </div>
                                </div>
                        <?php
                            }
                        }
                        ?>
                        <div class="col border-top mt-3">
                            <div class="row p-4">
                                <h5 class="col price">總金額</h5>
                                <?php
                                // 計算商品總價
                                $renttotal = 0;
                                $buytotal = 0;
                                $traveltotal = 0;

                                foreach ($_SESSION['cart'] as $key => $obj) {
                                    //計算小計
                                    if ($obj['func_name'] == 17) {

                                        $renttotal += $obj['rental_charge'] * $obj['prod_qty'];
                                    } elseif ($obj['func_name'] == 21) {

                                        $buytotal += $obj['prod_price'] * $obj['prod_qty'];
                                    } else {

                                        $traveltotal += $obj['prod_price'] * $obj['prod_qty'];
                                    }
                                    $total = $renttotal + $buytotal + $traveltotal;
                                }
                                ?>
                                <span class="col number"><?= $total ?></span>
                            </div>
                        </div>
                        <!-- <div class="row justify-content-center mt-5">
                                <button type="submit" class="btn col-6" onclick="location.href='payment_credit.php'"id="next-step">同意並送出</button>
                            </div> -->
                            </div>
                            <div class="row justify-content-center mt-5">
                                <button type="submit" class="btn col-6" id="next-step">同意並送出</button>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    <!-- footer -->
    <footer></footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="./js/header.js"></script>
</body>

</html>