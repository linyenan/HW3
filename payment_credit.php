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
$_SESSION['form']['transport_payment'] = $_POST['transport_payment'];
$_SESSION['form']['invoice_carrier_number'] = $_POST['invoice_carrier_number'];
// $_SESSION['form']['coupon_code'] = $_POST['coupon_code'];

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
    <link rel="stylesheet" href="./reset.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="./JS_LBD/" rel="stylesheet">
    <link rel="stylesheet" href="./header.css">
    <link rel="stylesheet" href="./nav-footer.css">
    <link rel="stylesheet" href="./JS_WCY/card.css">
    <title>payment_credit</title>
    <style>
        body {
            background-color: #FDFFF8;
            font-family: 'Noto Sans TC', sans-serif;
        }

        .container {
            max-width: 1640px;
        }

        /* 信用卡交易資訊 */
        .card {
            padding: 50px;
        }

        .content-01 {
            margin-top: 30px;
        }

        .credit-title,
        .holder-title {
            font-size: 24px;
            font-weight: 500;
        }

        .credit-name {
            border-bottom: 1px solid #cccccc;
        }

        .creditcard-img {
            display: flex;
        }

        .card-img {
            max-width: 417px;
        }

        .credit-card {
            max-width: 61px;
            margin-right: 10px;
        }

        .credit-type,
        .credit-num,
        .credit-period,
        .safe-num,
        .name,
        .email,
        .phone-number,
        .address,
        .notice {
            font-size: 18px;
            color: #707070;
            font-weight: 400;
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

        .user-info {
            font-size: 18px;
            color: #FF9F1C;
        }

        /* 持卡人資料 */
        @media screen and (max-width:880px) {
            .card {
                padding: 30px;
            }

            .credit-title,
            .holder-title {
                font-size: 18px;
                font-weight: 500;
            }

            .credit-card {
                width: 30.5px;
                margin-right: 5px;
            }

            .section-02,
            .section-03 {
                padding: 0 15px;
            }

            .credit-type,
            .credit-num,
            .credit-period,
            .safe-num,
            .name,
            .email,
            .phone-number,
            .address,
            .notice {
                font-size: 16px;
                font-weight: 400;
            }

            #next-step {
                width: 100px;
                height: 35px;
                color: #fff;
                background-color: #FF9F1C;
            }

        }

        /* 訂單明細 */
        .sch-title,
        .sch-location,
        .price,
        .number {
            font-size: 18px;
        }

        /* 同意並送出 */
        .color {
            color: #FF9F1C;
        }
    </style>
</head>

<body>
    <!-- navbar -->
    <?php require_once 'header.php' ?>
    <!-- progress -->
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
            <!-- mobile -->
            <div class="d-xl-none d-block" style="margin: 20px 30px;">
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
        </div>
        <!-- 信用卡交易資訊 -->
        <form class="main" name="myForm" method="POST" action="payment_finish.php">
            <div class="section-01">
                <div class="card bg-white shadow bg-body rounded">
                    <div class="credit-name row pb-4">
                        <div class="payment-title col-xl-9 col-6">
                            <span class="credit-title">信用卡交易資訊</span>
                        </div>
                        <div class="creditcard-img col-xl-3 col-6">
                            <img class="credit-card" src="./SVG/Visa_2021.svg" alt="">
                            <img class="credit-card" src="./SVG/Mastercard-logo.svg" alt="">
                            <img class="credit-card" src="./SVG/JCB_logo.svg" alt="">
                            <img class="credit-card" src="./SVG/UnionPay_logo.svg" alt="">
                        </div>
                    </div>
                    <div class="content-01 row">
                        <div class="col-xl-5 col-12 align-self-center">
                            <div class="card-wrapper"></div>
                        </div>
                        <div class="col-xl-7 form-container active">
                            <div class="row g-4 mt-3" action="">
                                <label for="validationCustom04" class="col-xl-4 credit-type">信用卡類型</label>
                                <div class="col-xl-8">
                                    <select class="form-select" id="validationCustom04" required>
                                        <option selected disabled value=""></option>
                                        <option>Visa</option>
                                        <option>MasterCard</option>
                                        <option>JCB</option>
                                        <option>UnionPay</option>
                                    </select>
                                </div>
                                <label for="inputEmail3" class="col-xl-4 credit-num">信用卡卡號</label>
                                <div class="num col-xl-8 col">
                                    <input type="text" name="number" class="form-control"  />
                                </div>
                                <label for="inputEmail3" class="col-md-4 credit-period">卡片有效期限</label>
                                <div class="col-xl-2 col-6">
                                    <input type="text" name="expiry" class="form-control"  />
                                </div>
                                <div class="col-xl-4"></div>
                                <label for="inputEmail3" class="col-xl-4 safe-num">信用卡安全碼</label>
                                <div class="col-xl-2">
                                    <input type="text" name="cvc" class="form-control"  />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 持卡人資料 -->
            <div class="card bg-white shadow bg-body rounded mt-5">
                <div class="row g-4">
                    <div class="col-xl-12 d-flex border-bottom pb-4">
                        <div class="col-xl-2 col-6 mt-3">
                            <span class="holder-title">持卡人資料</span>
                        </div>
                        <div class="col-xl-10 col-6 mt-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label user-info" for="flexCheckDefault">
                                    記住本次付款人資訊
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="row">
                            <label for="inputEmail3" class="col-xl-4 col-form-label name">持卡人姓名</label>
                            <div class="col-md-8">
                                <input type="text" name="name" class="form-control" id="inputEmail3">
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="row">
                            <label for="inputEmail3" class="col-md-4 col-form-label email">電子信箱</label>
                            <div class="col-md-8">
                                <input type="email" class="form-control" id="inputEmail3">
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="row">
                            <label for="inputEmail3" class="col-md-4 col-form-label phone-number">手機號碼</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="inputEmail3">
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="row">
                            <label for="inputEmail3" class="col-md-4 col-form-label address">帳單地址</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="inputEmail3">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 注意 -->
            <div class="card bg-white shadow rounded mt-5">
                <div class="row g-4">
                    <div class="col-xl-10 col-12">
                        <h5 class="notice lh-base">注意！當點下<strong class="color">立即付款</strong>，即表示您已確認訂單無誤以及同意右邊顯示的總金額，且同意<br>服務條款和退訂政策。</h5>
                    </div>
                    <?php
                    //購物車商品的數量
                    $count = 0;
                    $total = 0;

                    //判斷購物車是否存在，若存在，同時確認裡頭的商品數量
                    if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                        //更新商品數量
                        $count = count($_SESSION['cart']);
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
                    }
                    ?>
                    <div class="col-xl-2 text-center mt-5">
                        <p class="fs-4">TWD<?= $total ?></p>
                        <button type="submit" class="btn mt-5" id="next-step">立即付款</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    </div>
    <!-- footer -->
    <footer></footer>
    <script src="//code.jquery.com/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="./js/header.js"></script> 
    <script src="./JS_WCY/jquery.card.js"></script>
    <!-- <script src="./JS_WCY/card.js"></script> -->
    <script>
        // 信用卡翻轉動畫
        // jQuery


        // Vanilla JavaScript
        new Card({
            form: document.querySelector('form[name="myForm"]'),
            container: '.card-wrapper'
        });

        $('form').card({
            ontainer: '.card-wrapper',
            // number formatting
            formatting: true,

            // selectors
            formSelectors: {
                numberInput: 'input[name="card_number"]',
                expiryInput: 'input[name="card_valid_date"]',
                cvcInput: 'input[name="card_ccv"]',
                nameInput: 'input[name="card_holder"]'
            },
            cardSelectors: {
                cardContainer: '.jp-card-container',
                card: '.jp-card',
                numberDisplay: '.jp-card-number',
                expiryDisplay: '.jp-card-expiry',
                cvcDisplay: '.jp-card-cvc',
                nameDisplay: '.jp-card-name'
            },

            // custom messages
            messages: {
                validDate: 'valid\nthru',
                monthYear: 'month/year'
            },

            // custom placeholders
            placeholders: {
                number: '&bull;&bull;&bull;&bull; &bull;&bull;&bull;&bull; &bull;&bull;&bull;&bull; &bull;&bull;&bull;&bull;',
                cvc: '&bull;&bull;&bull;',
                expiry: '&bull;&bull;/&bull;&bull;',
                name: 'Full Name'
            },

            // enable input masking 
            masks: {
                cardNumber: false
            },

            // valid/invalid CSS classes
            classes: {
                valid: 'jp-card-valid',
                invalid: 'jp-card-invalid'
            },

            // debug mode
            debug: false

        });
    </script>



</body>

</html>