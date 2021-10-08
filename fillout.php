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

// echo "<pre>";
// print_r($_SESSION['cart']);
// echo "<pre>";

//如果購物車與商品索引與數量同時存在，則修改指定索引的商品數量
if (isset($_POST['index']) && isset($_POST['qty'])) {
    foreach ($_POST['index'] as $index => $value) {
        $_SESSION['cart'][$index]['prod_qty'] = $_POST['qty'][$index];
    }
}

// exit();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- jQuery UI -->
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <!-- css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <link rel="stylesheet" href="./SVG/css/select_gj.css">
    <script src="http://www.jq22.com/jquery/jquery-1.10.2.js"></script>
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="./reset.css">
    <link rel="stylesheet" href="./header.css">
    <link rel="stylesheet" href="./nav-footer.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.9.1.js"></script>
    <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <title>fillout</title>
    <style>
        /* 會員和購物車 */
        .member-cart {
            margin-left: auto;
            display: flex;
            align-items: center;
        }

        img.profile-icon {
            width: 32px;
        }

        img.cart-icon {
            width: 40px;
            margin-left: 30px;
        }

        img.menu-icon {
            width: 24px;
            display: none;
        }

        body {
            background-color: #FDFFF8;
            font-family: 'Noto Sans TC', sans-serif;
        }

        .section-01,
        .section-02 {
            padding: 30px;
        }

        .img-thumbnail {
            width: 260px;
            height: 190px;
        }

        .flag {
            width: 30px;
        }

        @media screen and (max-width:880px) {

            #first_name,
            #last_name,
            #gender,
            #email,
            #phone_num,
            #address,
            #country {
                font-size: 14px;
                margin-bottom: 10px;
            }

            .img-thumbnail {
                width: 122px;
                height: 88px;
            }

            .ellipsis {
                overflow: hidden;
                white-space: nowrap;
                text-overflow: ellipsis;
            }
        }

        /* 訂購人資料 */
        #next-step {
            width: 180px;
            height: 50px;
            color: #fff;
            background-color: #FF9F1C;
        }

        #next-step:hover {
            background-color: #FDB149;
        }

        #pre-step {
            width: 180px;
            height: 50px;
            color: #fff;
            font-size: 16px;
            background-color: #5E6472;
        }

        #pre-step:hover {
            background-color: #727886;
        }

        .fa-chevron-down {
            transition: transform 0.35s ease;
            transform-origin: .5em 50%;
            width: 1.25em;
            line-height: 0;
        }

        .form-label-order-info,
        .form-label-tourist-info,
        .point {
            font-size: 16px;
            font-weight: 400;
            color: #707070;
        }

        label {
            color: #707070;
            cursor: pointer;
        }

        input[type=radio] {
            background-image: url(./SVG/radio.svg);
            -webkit-appearance: none;
            -moz-appearance: none;
            box-shadow: none !important;
            appearance: none;
            transition: 0.2s all linear;
        }

        input[type=radio]:checked {
            border: 8px solid #FF9F1C;
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

        .btn:hover,
        .btn:focus {
            outline: none;
        }

        input::placeholder {
            font-size: 14px;
        }

        .price {
            font-size: 36px;
            color: #FF9F1C;
        }

        .dollar {
            font-size: 16px;
            font-weight: 500;
            color: #FF9F1C;
        }

        .sch-title {
            font-size: 18px;
            line-height: 24px;
        }
        .fs-4 {
            font-weight: 700;
        }
        .fs-6 {
            font-weight: 700;
        }

        @media screen and (max-width:880px) {
            #next-step {
                width: 100px;
                height: 35px;
                color: #fff;
                background-color: #FF9F1C;
            }

            #pre-step {
                width: 100px;
                height: 35px;
                color: #fff;
                background-color: #5E6472;
            }

            .sch-title {
                font-size: 16px;
                line-height: 24px;
            }

            .date {
                font-size: 12px;
            }

            .people {
                font-size: 14px;
            }

            .form-check-label {
                font-size: 12px;
            }
        }



        /* RWD */




        .container {
            max-width: 1640px;
        }
    </style>
</head>

<body>
    <!-- navbar -->
    <?php require_once 'header.php' ?>
    <div class="container">
        <div class="row my-xl-4">
            <div class="d-xl-block d-none">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="1644" height="104" viewBox="0 0 1644 104">
                    <defs>
                        <clipPath id="clip-path">
                            <rect width="31" height="31" fill="none" />
                        </clipPath>
                    </defs>
                    <circle id="椭圆_1" data-name="椭圆 1" cx="36" cy="36" r="36" fill="#abadb2" />
                    <circle id="椭圆_2" data-name="椭圆 2" cx="36" cy="36" r="36" transform="translate(784)" fill="#ff9f1c" />
                    <circle id="椭圆_3" data-name="椭圆 3" cx="36" cy="36" r="36" transform="translate(1568)" fill="#abadb2" />
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
            <form name="myForm" method="post" action="payment.php" class="needs-validation" novalidate>
                <!-- 訂購人資料 -->
                <div class="m-xl-auto">
                    <p>
                        <button class="btn" type="button" data-bs-toggle="collapse" data-bs-target="#order-info" aria-expanded="true" aria-controls="order-info">
                            <p class="fs-4"><i class="fas fa-chevron-down"></i>訂購人資料</p>
                        </button>
                    </p>
                    <div class="collapse show" id="order-info">
                        <div class="card col-md-8 card-body shadow bg-body rounded m-auto">
                            <div class="section-01">
                                <div class="row needs-validation" novalidate>                                   
                                    <div class="col-xl-6 col-12 mb-3 ui-widget">
                                        <label for="validationCustom01" class="form-label-order-info mb-3" id="first_name" for="first_name">名字（First name）</label>
                                        <input type="text" class="form-control tags" id="validationCustom01 first_name" name="recipient_first_name" placeholder="Please enter your first name" required>
                                        <div class="invalid-feedback">
                                            請填入你的名字！
                                        </div>
                                    </div>
                                    <div class="col-xl-6 mb-3 ui-widget">
                                        <label for="validationCustom02" class="form-label-order-info mb-3" id="last_name">姓氏（Last name）</label>
                                        <input type="text" class="form-control tags" id="validationCustom02" name="recipient_last_name" placeholder="Please enter your last name" required>
                                        <div class="invalid-feedback">
                                            請填入你的姓氏！
                                        </div>
                                    </div>                                                                    
                                    <div class="col-xl-6 col-12 mb-3">
                                        <label for="validationCustom01" class="form-label-order-info d-flex flex-column mb-3" id="gender">性別（Gender）</label>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" id="inlineCheckbox1" value="男" name="gender">
                                            <label class="form-check-label" for="inlineCheckbox1">男</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" id="inlineCheckbox2" value="女" name="gender">
                                            <label class="form-check-label" for="inlineCheckbox2">女</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" id="inlineCheckbox3" value="不方便透漏" name="gender">
                                            <label class="form-check-label" for="inlineCheckbox3">不方便透露</label>
                                        </div>
                                        <div id="invalidCheck3Feedback" class="invalid-feedback">
                                            請選擇你的性別！
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-12 mb-3">
                                        <label for="validationCustom04" class="form-label-order-info mb-3" id="country">國家／地區(Country/Region)</label>
                                        <select style="width:100%;border: 1px solid #ced4da;" name="country" class="fastbannerform__country form-select" aria-label="Default select example">
                                            <option value="ASA" title="AA">America</option>
                                            <option value="AND" title="AD">Andorra</option>
                                            <option value="ARE" title="AE">United Arab Emirates</option>
                                            <option value="AFG" title="AF">Afghanistan</option>
                                            <option value="ATG" title="AG">Antigua and Barbuda</option>
                                            <option value="ALB" title="AL">Albania</option>
                                            <option value="ARM" title="AM">Armenia</option>
                                            <option value="AGO" title="AO">Angola</option>
                                            <option value="ARG" title="AR">Argentina</option>
                                            <option value="AUT" title="AT">Austria</option>
                                            <option value="AUS" title="AU">Australia</option>
                                            <option value="ABW" title="AW">Aruba</option>
                                            <option value="AZE" title="AZ">Azerbaijan</option>
                                            <option value="BIH" title="BA">Bosnia and Herzegovina</option>
                                            <option value="BRB" title="BB">Barbados</option>
                                            <option value="BGD" title="BD">Bangladesh</option>
                                            <option value="BEL" title="BE">Belgium</option>
                                            <option value="BFA" title="BF">Burkina Faso</option>
                                            <option value="BGR" title="BG">Bulgaria</option>
                                            <option value="BHR" title="BH">Bahrain</option>
                                            <option value="BDI" title="BI">Burundi</option>
                                            <option value="BEN" title="BJ">Benin</option>
                                            <option value="BMU" title="BM">Bermuda</option>
                                            <option value="BRN" title="BN">Brunei</option>
                                            <option value="BOL" title="BO">Bolivia</option>
                                            <option value="BRA" title="BR">Brazil</option>
                                            <option value="BHS" title="BS">Bahamas</option>
                                            <option value="BTN" title="BT">Bhutan</option>
                                            <option value="BWA" title="BW">Botswana</option>
                                            <option value="BLR" title="BY">Belarus</option>
                                            <option value="BLZ" title="BZ">Belize</option>
                                            <option value="CAN" title="CA">Canada</option>
                                            <option value="COD" title="CD">Democratic Republic of the Congo</option>
                                            <option value="CAF" title="CF">Central African Republic</option>
                                            <option value="COG" title="CG">Democratic Republic of the Congo</option>
                                            <option value="CHE" title="CH">Switzerland</option>
                                            <option value="CHL" title="CL">Chile</option>
                                            <option value="CMR" title="CM">Cameroon</option>
                                            <option value="CHN" title="CN">China</option>
                                            <option value="COL" title="CO">Colombia</option>
                                            <option value="CRI" title="CR">Costa Rica</option>
                                            <option value="CUB" title="CU">Cuba</option>
                                            <option value="CPV" title="CV">Cape Verde</option>
                                            <option value="CYP" title="CY">Cyprus</option>
                                            <option value="CZE" title="CZ">Czech Republic</option>
                                            <option value="DEU" title="DE">Germany</option>
                                            <option value="DJI" title="DJ">Djibouti</option>
                                            <option value="DNK" title="DK">Denmark</option>
                                            <option value="DMA" title="DM">Dominica</option>
                                            <option value="DOM" title="DO">Dominican Republic</option>
                                            <option value="DZA" title="DZ">Algeria</option>
                                            <option value="ECU" title="EC">Ecuador</option>
                                            <option value="EST" title="EE">Estonia</option>
                                            <option value="EGY" title="EG">Egypt</option>
                                            <option value="ERI" title="ER">Eritrea</option>
                                            <option value="ESP" title="ES">Spain</option>
                                            <option value="ETH" title="ET">Ethiopia</option>
                                            <option value="FIN" title="FI">Finland</option>
                                            <option value="FJI" title="FJ">Fiji</option>
                                            <option value="FLK" title="FK">Falkland Islands</option>
                                            <option value="FSM" title="FM">Micronesia</option>
                                            <option value="FRO" title="FO">Faroe Islands</option>
                                            <option value="FRA" title="FR">France</option>
                                            <option value="GAB" title="GA">Gabon</option>
                                            <option value="GBR" title="GB">United Kingdom</option>
                                            <option value="GRD" title="GD">Grenada</option>
                                            <option value="GEO" title="GE">Georgia</option>
                                            <option value="GHA" title="GH">Ghana</option>
                                            <option value="GIB" title="GI">Gibraltar</option>
                                            <option value="GMB" title="GM">Gambia</option>
                                            <option value="GIN" title="GN">Guinea</option>
                                            <option value="GNQ" title="GQ">Equatorial Guinea</option>
                                            <option value="GRC" title="GR">Greece</option>
                                            <option value="GTM" title="GT">Guatemala</option>
                                            <option value="GNB" title="GW">Guinea-Bissau</option>
                                            <option value="GUY" title="GY">Guyana</option>
                                            <option value="HKG" title="HK">Hong Kong</option>
                                            <option value="HND" title="HN">Honduras</option>
                                            <option value="HRV" title="HR">Croatia</option>
                                            <option value="HTI" title="HT">Haiti</option>
                                            <option value="HUN" title="HU">Hungary</option>
                                            <option value="IDN" title="ID">Indonesia</option>
                                            <option value="IRL" title="IE">Ireland</option>
                                            <option value="ISR" title="IL">Israel</option>
                                            <option value="IND" title="IN">India</option>
                                            <option value="IRQ" title="IQ">Iraq</option>
                                            <option value="IRN" title="IR">Iran</option>
                                            <option value="ISL" title="IS">Iceland</option>
                                            <option value="ITA" title="IT">Italy</option>
                                            <option value="JAM" title="JM">Jamaica</option>
                                            <option value="JOR" title="JO">Jordan</option>
                                            <option value="JPN" title="JP">Japan</option>
                                            <option value="KEN" title="KE">Kenya</option>
                                            <option value="KGZ" title="KG">Kyrgyzstan</option>
                                            <option value="KHM" title="KH">Cambodia</option>
                                            <option value="KIR" title="KI">Kiribati</option>
                                            <option value="COM" title="KM">Comoros</option>
                                            <option value="KNA" title="KN">Saint Kitts and Nevis</option>
                                            <option value="PRK" title="KP">North Korea</option>
                                            <option value="KOR" title="KR">South Korea</option>
                                            <option value="KWT" title="KW">Kuwait</option>
                                            <option value="CYM" title="KY">Cayman Islands</option>
                                            <option value="KAZ" title="KZ">Kazakhstan</option>
                                            <option value="LAO" title="LA">Laos</option>
                                            <option value="LBN" title="LB">Lebanon</option>
                                            <option value="LCA" title="LC">Saint Lucia</option>
                                            <option value="LIE" title="LI">Liechtenstein</option>
                                            <option value="LKA" title="LK">Sri Lanka</option>
                                            <option value="LBR" title="LR">Liberia</option>
                                            <option value="LSO" title="LS">Lesotho</option>
                                            <option value="LTU" title="LT">Lithuania</option>
                                            <option value="LUX" title="LU">Luxembourg</option>
                                            <option value="LVA" title="LV">Latvia</option>
                                            <option value="LBY" title="LY">Libya</option>
                                            <option value="MAR" title="MA">Morocco</option>
                                            <option value="MCO" title="MC">Monaco</option>
                                            <option value="MDA" title="MD">Moldova</option>
                                            <option value="MNE" title="ME">Montenegro</option>
                                            <option value="MDG" title="MG">Madagascar</option>
                                            <option value="MKD" title="MK">Macedonia</option>
                                            <option value="MLI" title="ML">Mali</option>
                                            <option value="MMR" title="MM">Myanmar</option>
                                            <option value="MNG" title="MN">Mongolia</option>
                                            <option value="MAC" title="MO">Macao</option>
                                            <option value="MRT" title="MR">Mauritania</option>
                                            <option value="MLT" title="MT">Malta</option>
                                            <option value="MUS" title="MU">Mauritius</option>
                                            <option value="MDV" title="MV">Maldives</option>
                                            <option value="MWI" title="MW">Malawi</option>
                                            <option value="MEX" title="MX">Mexico</option>
                                            <option value="MYS" title="MY">Malaysia</option>
                                            <option value="MOZ" title="MZ">Mozambique</option>
                                            <option value="NAM" title="NA">Namibia</option>
                                            <option value="NER" title="NE">Niger</option>
                                            <option value="NGA" title="NG">Nigeria</option>
                                            <option value="NIC" title="NI">Nicaragua</option>
                                            <option value="NLD" title="NL">Netherlands</option>
                                            <option value="NOR" title="NO">Norway</option>
                                            <option value="NPL" title="NP">Nepal</option>
                                            <option value="NRU" title="NR">Nauru</option>
                                            <option value="NZL" title="NZ">New Zealand</option>
                                            <option value="OMN" title="OM">Oman</option>
                                            <option value="PAN" title="PA">Panama</option>
                                            <option value="PER" title="PE">Peru</option>
                                            <option value="PNG" title="PG">Papua New Guinea</option>
                                            <option value="PHL" title="PH">Philippines</option>
                                            <option value="PAK" title="PK">Pakistan</option>
                                            <option value="POL" title="PL">Poland</option>
                                            <option value="PRI" title="PR">Puerto Rico</option>
                                            <option value="PSE" title="PS">Palestine</option>
                                            <option value="PRT" title="PT">Portugal</option>
                                            <option value="PLW" title="PW">Palau</option>
                                            <option value="PRY" title="PY">Paraguay</option>
                                            <option value="QAT" title="QA">Qatar</option>
                                            <option value="ROU" title="RO">Romania</option>
                                            <option value="SRB" title="RS">Serbia</option>
                                            <option value="RUS" title="RU">Russia</option>
                                            <option value="RWA" title="RW">Rwanda</option>
                                            <option value="SAU" title="SA">Saudi Arabia</option>
                                            <option value="SLB" title="SB">Solomon Islands</option>
                                            <option value="SYC" title="SC">Seychelles</option>
                                            <option value="SDN" title="SD">Sudan</option>
                                            <option value="SWE" title="SE">Sweden</option>
                                            <option value="SGP" title="SG">Singapore</option>
                                            <option value="SVN" title="SI">Slovenia</option>
                                            <option value="SVK" title="SK">Slovak Republic</option>
                                            <option value="SLE" title="SL">Sierra Leone</option>
                                            <option value="SMR" title="SM">San Marino</option>
                                            <option value="SEN" title="SN">Senegal</option>
                                            <option value="SOM" title="SO">Somalia</option>
                                            <option value="SUR" title="SR">Suriname</option>
                                            <option value="STP" title="ST">Sao Tome and Principe</option>
                                            <option value="SLV" title="SV">El Salvador</option>
                                            <option value="SYR" title="SY">Syria</option>
                                            <option value="SWZ" title="SZ">Swaziland</option>
                                            <option value="TCD" title="TD">Chad</option>
                                            <option value="TGO" title="TG">Togo</option>
                                            <option value="THA" title="TH">Thailand</option>
                                            <option value="TJK" title="TJ">Tajikistan</option>
                                            <option value="TKM" title="TM">Turkmenistan</option>
                                            <option value="TUN" title="TN">Tunisia</option>
                                            <option value="TON" title="TO">Tonga</option>
                                            <option value="TUR" title="TR">Turkey</option>
                                            <option value="TTO" title="TT">Trinidad and Tobago</option>
                                            <option value="TUV" title="TV">Tuvalu</option>
                                            <option value="TWN" title="TW" selected="selected">Taiwan</option>
                                            <option value="TZA" title="TZ">Tanzania</option>
                                            <option value="UKR" title="UA">Ukraine</option>
                                            <option value="UGA" title="UG">Uganda</option>
                                            <option value="URY" title="UY">Uruguay</option>
                                            <option value="UZB" title="UZ">Uzbekistan</option>
                                            <option value="VCT" title="VC">Saint Vincent And The Grenadine</option>
                                            <option value="VEN" title="VE">Venezuela</option>
                                            <option value="VGB" title="VG">British Virgin Islands</option>
                                            <option value="VNM" title="VN">Vietnam</option>
                                            <option value="VUT" title="VU">Vanuatu</option>
                                            <option value="WLF" title="WF">Wallis and Futuna</option>
                                            <option value="WSM" title="WS">Western Samoa</option>
                                            <option value="YEM" title="YE">Yemen</option>
                                            <option value="ZAF" title="ZA">South Africa</option>
                                            <option value="ZMB" title="ZM">Zambia</option>
                                            <option value="ZWE" title="ZW">Zimbabwe</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            請選擇你的國籍！
                                        </div>
                                    </div>
                                    <div class="col-xl-12 mb-3">
                                        <label for="exampleFormControlInput1" class="form-label-order-info mb-3" id="email">電子信箱（Email address）</label>
                                        <input type="email" class="form-control tags" id="exampleFormControlInput1" placeholder="Please enter your email address" name="recipient_email">
                                    </div>
                                    <div class="col-xl-12 mb-3">
                                        <div class="row g-2">
                                            <label for="exampleFormControlInput1" class="form-label-order-info mb-3" id="phone_num">聯絡電話（Phone Number) </label>
                                            <div class="col-xl-3 col-4">
                                                <select class="form-select" aria-label="Default select example">
                                                    <option value="+886">
                                                        <p>台灣 +886</p>
                                                    </option>
                                                    <option value="+81">
                                                        <p>日本 +81</p>
                                                    </option>
                                                    <option value="+82">
                                                        <p>韓國 +82</p>
                                                    </option>
                                                    <option value="+91">
                                                        <p>印度 +91</p>
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="col-xl-9 col-8 align-self-end">
                                                <input type="text" class="form-control tags" id="exampleFormControlInput1" placeholder="Please enter your phone number" name="recipient_phone_number">
                                            </div>
                                            <div class="invalid-feedback">
                                                請選擇你的聯絡電話！
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 mb-3">
                                        <label for="exampleFormControlInput1" class="form-label-order-info mb-3" id="address">地址（Address）</label>
                                        <input type="text" class="form-control tags" id="exampleFormControlInput1" placeholder="Please enter your address" name="recipient_address">
                                    </div>
                                    <div class="col-12">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="form-check d-flex align-items-center">
                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    儲存訊息做為下次使用
                                                </label>
                                            </div>
                                            <a class="btn" id="next-step">繼續</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- 旅客資料 -->
                <div class="row mt-5">
                    <p>
                        <button class="btn" type="button" data-bs-toggle="collapse" data-bs-target="#tourist-info" aria-expanded="false" aria-controls="tourist-info">
                            <p class="fs-4"><i class="fas fa-chevron-down"></i>旅客資料</p>
                        </button>
                    </p>
                    <div class="collapse" id="tourist-info">
                        <div class="card col-md-8 card-body shadow bg-body rounded border m-auto">
                            <div class="section-02">
                                <form class="row g-2 needs-validation" novalidate>
                                    <div class="sch row mb-5">
                                        <!-- 行程商品陳列區 -->
                                        <?php
                                        foreach ($_SESSION['cart'] as $key => $obj) {
                                            if ($obj['func_name'] == 0) {
                                        ?>
                                                <div class="col-xl-4 col-5">
                                                    <img class="img-thumbnail" src="./images/<?= $obj['prod_main_img'] ?>" alt="">
                                                </div>
                                                <div class="sch_info col-xl-8 col">
                                                    <div class="mb-3 me-2">
                                                        <span class="form-label-tourist-info sch-title">
                                                            <span class="d-xl-block d-none fs-6"><?= $obj['prod_name'] ?></span>
                                                        </span>
                                                    </div>
                                                    <div class="row">
                                                        <span class="col-xl-5 col-12 date">
                                                            <p>數量</p>
                                                            <P><?= $obj['prod_qty'] ?></P>
                                                        </span>
                                                        <span class="col-xl-3 col-12 people">
                                                            <P>價格</P>
                                                            <P>TWD<?= $obj['prod_price'] ?> </P>
                                                        </span>
                                                    </div>
                                                </div>
                                        <?php
                                            }
                                        }
                                        ?>
                                        <!-- 購買商品陳列區 -->
                                        <?php
                                        foreach ($_SESSION['cart'] as $key => $obj) {
                                            if ($obj['func_name'] == 21) {
                                        ?>
                                                <div class="col-xl-4 col-5">
                                                    <img class="img-thumbnail" src="./images/<?= $obj['prod_main_img'] ?>" alt="">
                                                </div>
                                                <div class="sch_info col-xl-8 col">
                                                    <div class="mb-3 me-2">
                                                        <span class="form-label-tourist-info sch-title">
                                                            <span class="d-xl-block d-none fs-6"><?= $obj['prod_name'] ?></span>
                                                        </span>
                                                    </div>
                                                    <div class="row">
                                                        <span class="col-xl-5 col-12 date">
                                                            <p>數量</p>
                                                            <P><?= $obj['prod_qty'] ?></P>
                                                        </span>
                                                        <span class="col-xl-3 col-12 people">
                                                            <P>價格</P>
                                                            <P>TWD<?= $obj['prod_price'] ?> </P>
                                                        </span>
                                                    </div>
                                                </div>
                                        <?php
                                            }
                                        }
                                        ?>
                                        <!-- 租借商品陳列區 -->
                                        <?php
                                        foreach ($_SESSION['cart'] as $key => $obj) {
                                            if ($obj['func_name'] == 17) {
                                        ?>
                                                <div class="col-xl-4 col-5">
                                                    <img class="img-thumbnail" src="./images/<?= $obj['prod_main_img'] ?>" alt="">
                                                </div>
                                                <div class="sch_info col-xl-8 col">
                                                    <div class="mb-3 me-2">
                                                        <span class="form-label-tourist-info sch-title">
                                                            <span class="d-xl-block d-none fs-6"><?= $obj['prod_name'] ?></span>
                                                        </span>
                                                    </div>
                                                    <div class="row">
                                                        <span class="col-xl-5 col-12 date">
                                                            <p>數量</p>
                                                            <P><?= $obj['prod_qty'] ?></P>
                                                        </span>
                                                        <span class="col-xl-3 col-12 people">
                                                            <P>價格</P>
                                                            <P>TWD<?= $obj['rental_charge'] ?></P>
                                                        </span>
                                                    </div>
                                                </div>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                    <div class="d-flex justify-content-between border-bottom pb-3">
                                        <p class="fs-4">旅客資料</p>
                                        <p class="fs-6">清除</p>
                                    </div>
                                    <div class="col-xl-12 mt-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                旅客代表人與訂購人資料相同
                                            </label>
                                        </div>
                                    </div>
                                    <!-- 旅客代表人 -->
                                    <div class="col-xl-12 border-bottom pb-3 mt-5 mb-3">
                                        <span class="fs-4">旅客代表人</span>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6 col-12 mb-3">
                                            <label for="validationCustom01" class="form-label-order-info mb-3">名字（First name）</label>
                                            <input type="text" class="form-control  tags" id="recipient_first_name" value="" placeholder="Please enter your first name" required>
                                            <div class="invalid-feedback">
                                                請填入你的名字！
                                            </div>
                                        </div>
                                        <div class="col-xl-6 mb-3">
                                            <label for="validationCustom02" class="form-label-order-info mb-3" id="recipient_last_name">姓氏（Last name）</label>
                                            <input type="text" class="form-control  tags" id="recipient_last_name" value="" placeholder="Please enter your last name" required>
                                            <div class="invalid-feedback">
                                                請填入你的姓氏！
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6 col-12 mb-3">
                                            <label for="validationCustom01" class="form-label-order-info d-flex flex-column mb-3" id="gender">性別（Gender）</label>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" id="inlineCheckbox1" value="男">
                                                <label class="form-check-label" for="inlineCheckbox1">男</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" id="inlineCheckbox2" value="女">
                                                <label class="form-check-label" for="inlineCheckbox2">女</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" id="inlineCheckbox3" value="不方便透漏">
                                                <label class="form-check-label" for="inlineCheckbox3">不方便透露</label>
                                            </div>
                                            <div id="invalidCheck3Feedback" class="invalid-feedback">
                                                請選擇你的性別！
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col mb-3">
                                            <label for="validationCustom04" class="form-label-order-info col-xl-12 col-6 mb-3" id="country">國家／地區(Country/Region)</label>
                                            <select style="width:100%;" class="fastbannerform__country form-select col" aria-label="Default select example">
                                                <option value="ASA" title="AA">America</option>
                                                <option value="AND" title="AD">Andorra</option>
                                                <option value="ARE" title="AE">United Arab Emirates</option>
                                                <option value="AFG" title="AF">Afghanistan</option>
                                                <option value="ATG" title="AG">Antigua and Barbuda</option>
                                                <option value="ALB" title="AL">Albania</option>
                                                <option value="ARM" title="AM">Armenia</option>
                                                <option value="AGO" title="AO">Angola</option>
                                                <option value="ARG" title="AR">Argentina</option>
                                                <option value="AUT" title="AT">Austria</option>
                                                <option value="AUS" title="AU">Australia</option>
                                                <option value="ABW" title="AW">Aruba</option>
                                                <option value="AZE" title="AZ">Azerbaijan</option>
                                                <option value="BIH" title="BA">Bosnia and Herzegovina</option>
                                                <option value="BRB" title="BB">Barbados</option>
                                                <option value="BGD" title="BD">Bangladesh</option>
                                                <option value="BEL" title="BE">Belgium</option>
                                                <option value="BFA" title="BF">Burkina Faso</option>
                                                <option value="BGR" title="BG">Bulgaria</option>
                                                <option value="BHR" title="BH">Bahrain</option>
                                                <option value="BDI" title="BI">Burundi</option>
                                                <option value="BEN" title="BJ">Benin</option>
                                                <option value="BMU" title="BM">Bermuda</option>
                                                <option value="BRN" title="BN">Brunei</option>
                                                <option value="BOL" title="BO">Bolivia</option>
                                                <option value="BRA" title="BR">Brazil</option>
                                                <option value="BHS" title="BS">Bahamas</option>
                                                <option value="BTN" title="BT">Bhutan</option>
                                                <option value="BWA" title="BW">Botswana</option>
                                                <option value="BLR" title="BY">Belarus</option>
                                                <option value="BLZ" title="BZ">Belize</option>
                                                <option value="CAN" title="CA">Canada</option>
                                                <option value="COD" title="CD">Democratic Republic of the Congo</option>
                                                <option value="CAF" title="CF">Central African Republic</option>
                                                <option value="COG" title="CG">Democratic Republic of the Congo</option>
                                                <option value="CHE" title="CH">Switzerland</option>
                                                <option value="CHL" title="CL">Chile</option>
                                                <option value="CMR" title="CM">Cameroon</option>
                                                <option value="CHN" title="CN">China</option>
                                                <option value="COL" title="CO">Colombia</option>
                                                <option value="CRI" title="CR">Costa Rica</option>
                                                <option value="CUB" title="CU">Cuba</option>
                                                <option value="CPV" title="CV">Cape Verde</option>
                                                <option value="CYP" title="CY">Cyprus</option>
                                                <option value="CZE" title="CZ">Czech Republic</option>
                                                <option value="DEU" title="DE">Germany</option>
                                                <option value="DJI" title="DJ">Djibouti</option>
                                                <option value="DNK" title="DK">Denmark</option>
                                                <option value="DMA" title="DM">Dominica</option>
                                                <option value="DOM" title="DO">Dominican Republic</option>
                                                <option value="DZA" title="DZ">Algeria</option>
                                                <option value="ECU" title="EC">Ecuador</option>
                                                <option value="EST" title="EE">Estonia</option>
                                                <option value="EGY" title="EG">Egypt</option>
                                                <option value="ERI" title="ER">Eritrea</option>
                                                <option value="ESP" title="ES">Spain</option>
                                                <option value="ETH" title="ET">Ethiopia</option>
                                                <option value="FIN" title="FI">Finland</option>
                                                <option value="FJI" title="FJ">Fiji</option>
                                                <option value="FLK" title="FK">Falkland Islands</option>
                                                <option value="FSM" title="FM">Micronesia</option>
                                                <option value="FRO" title="FO">Faroe Islands</option>
                                                <option value="FRA" title="FR">France</option>
                                                <option value="GAB" title="GA">Gabon</option>
                                                <option value="GBR" title="GB">United Kingdom</option>
                                                <option value="GRD" title="GD">Grenada</option>
                                                <option value="GEO" title="GE">Georgia</option>
                                                <option value="GHA" title="GH">Ghana</option>
                                                <option value="GIB" title="GI">Gibraltar</option>
                                                <option value="GMB" title="GM">Gambia</option>
                                                <option value="GIN" title="GN">Guinea</option>
                                                <option value="GNQ" title="GQ">Equatorial Guinea</option>
                                                <option value="GRC" title="GR">Greece</option>
                                                <option value="GTM" title="GT">Guatemala</option>
                                                <option value="GNB" title="GW">Guinea-Bissau</option>
                                                <option value="GUY" title="GY">Guyana</option>
                                                <option value="HKG" title="HK">Hong Kong</option>
                                                <option value="HND" title="HN">Honduras</option>
                                                <option value="HRV" title="HR">Croatia</option>
                                                <option value="HTI" title="HT">Haiti</option>
                                                <option value="HUN" title="HU">Hungary</option>
                                                <option value="IDN" title="ID">Indonesia</option>
                                                <option value="IRL" title="IE">Ireland</option>
                                                <option value="ISR" title="IL">Israel</option>
                                                <option value="IND" title="IN">India</option>
                                                <option value="IRQ" title="IQ">Iraq</option>
                                                <option value="IRN" title="IR">Iran</option>
                                                <option value="ISL" title="IS">Iceland</option>
                                                <option value="ITA" title="IT">Italy</option>
                                                <option value="JAM" title="JM">Jamaica</option>
                                                <option value="JOR" title="JO">Jordan</option>
                                                <option value="JPN" title="JP">Japan</option>
                                                <option value="KEN" title="KE">Kenya</option>
                                                <option value="KGZ" title="KG">Kyrgyzstan</option>
                                                <option value="KHM" title="KH">Cambodia</option>
                                                <option value="KIR" title="KI">Kiribati</option>
                                                <option value="COM" title="KM">Comoros</option>
                                                <option value="KNA" title="KN">Saint Kitts and Nevis</option>
                                                <option value="PRK" title="KP">North Korea</option>
                                                <option value="KOR" title="KR">South Korea</option>
                                                <option value="KWT" title="KW">Kuwait</option>
                                                <option value="CYM" title="KY">Cayman Islands</option>
                                                <option value="KAZ" title="KZ">Kazakhstan</option>
                                                <option value="LAO" title="LA">Laos</option>
                                                <option value="LBN" title="LB">Lebanon</option>
                                                <option value="LCA" title="LC">Saint Lucia</option>
                                                <option value="LIE" title="LI">Liechtenstein</option>
                                                <option value="LKA" title="LK">Sri Lanka</option>
                                                <option value="LBR" title="LR">Liberia</option>
                                                <option value="LSO" title="LS">Lesotho</option>
                                                <option value="LTU" title="LT">Lithuania</option>
                                                <option value="LUX" title="LU">Luxembourg</option>
                                                <option value="LVA" title="LV">Latvia</option>
                                                <option value="LBY" title="LY">Libya</option>
                                                <option value="MAR" title="MA">Morocco</option>
                                                <option value="MCO" title="MC">Monaco</option>
                                                <option value="MDA" title="MD">Moldova</option>
                                                <option value="MNE" title="ME">Montenegro</option>
                                                <option value="MDG" title="MG">Madagascar</option>
                                                <option value="MKD" title="MK">Macedonia</option>
                                                <option value="MLI" title="ML">Mali</option>
                                                <option value="MMR" title="MM">Myanmar</option>
                                                <option value="MNG" title="MN">Mongolia</option>
                                                <option value="MAC" title="MO">Macao</option>
                                                <option value="MRT" title="MR">Mauritania</option>
                                                <option value="MLT" title="MT">Malta</option>
                                                <option value="MUS" title="MU">Mauritius</option>
                                                <option value="MDV" title="MV">Maldives</option>
                                                <option value="MWI" title="MW">Malawi</option>
                                                <option value="MEX" title="MX">Mexico</option>
                                                <option value="MYS" title="MY">Malaysia</option>
                                                <option value="MOZ" title="MZ">Mozambique</option>
                                                <option value="NAM" title="NA">Namibia</option>
                                                <option value="NER" title="NE">Niger</option>
                                                <option value="NGA" title="NG">Nigeria</option>
                                                <option value="NIC" title="NI">Nicaragua</option>
                                                <option value="NLD" title="NL">Netherlands</option>
                                                <option value="NOR" title="NO">Norway</option>
                                                <option value="NPL" title="NP">Nepal</option>
                                                <option value="NRU" title="NR">Nauru</option>
                                                <option value="NZL" title="NZ">New Zealand</option>
                                                <option value="OMN" title="OM">Oman</option>
                                                <option value="PAN" title="PA">Panama</option>
                                                <option value="PER" title="PE">Peru</option>
                                                <option value="PNG" title="PG">Papua New Guinea</option>
                                                <option value="PHL" title="PH">Philippines</option>
                                                <option value="PAK" title="PK">Pakistan</option>
                                                <option value="POL" title="PL">Poland</option>
                                                <option value="PRI" title="PR">Puerto Rico</option>
                                                <option value="PSE" title="PS">Palestine</option>
                                                <option value="PRT" title="PT">Portugal</option>
                                                <option value="PLW" title="PW">Palau</option>
                                                <option value="PRY" title="PY">Paraguay</option>
                                                <option value="QAT" title="QA">Qatar</option>
                                                <option value="ROU" title="RO">Romania</option>
                                                <option value="SRB" title="RS">Serbia</option>
                                                <option value="RUS" title="RU">Russia</option>
                                                <option value="RWA" title="RW">Rwanda</option>
                                                <option value="SAU" title="SA">Saudi Arabia</option>
                                                <option value="SLB" title="SB">Solomon Islands</option>
                                                <option value="SYC" title="SC">Seychelles</option>
                                                <option value="SDN" title="SD">Sudan</option>
                                                <option value="SWE" title="SE">Sweden</option>
                                                <option value="SGP" title="SG">Singapore</option>
                                                <option value="SVN" title="SI">Slovenia</option>
                                                <option value="SVK" title="SK">Slovak Republic</option>
                                                <option value="SLE" title="SL">Sierra Leone</option>
                                                <option value="SMR" title="SM">San Marino</option>
                                                <option value="SEN" title="SN">Senegal</option>
                                                <option value="SOM" title="SO">Somalia</option>
                                                <option value="SUR" title="SR">Suriname</option>
                                                <option value="STP" title="ST">Sao Tome and Principe</option>
                                                <option value="SLV" title="SV">El Salvador</option>
                                                <option value="SYR" title="SY">Syria</option>
                                                <option value="SWZ" title="SZ">Swaziland</option>
                                                <option value="TCD" title="TD">Chad</option>
                                                <option value="TGO" title="TG">Togo</option>
                                                <option value="THA" title="TH">Thailand</option>
                                                <option value="TJK" title="TJ">Tajikistan</option>
                                                <option value="TKM" title="TM">Turkmenistan</option>
                                                <option value="TUN" title="TN">Tunisia</option>
                                                <option value="TON" title="TO">Tonga</option>
                                                <option value="TUR" title="TR">Turkey</option>
                                                <option value="TTO" title="TT">Trinidad and Tobago</option>
                                                <option value="TUV" title="TV">Tuvalu</option>
                                                <option value="TWN" title="TW" selected="selected">Taiwan</option>
                                                <option value="TZA" title="TZ">Tanzania</option>
                                                <option value="UKR" title="UA">Ukraine</option>
                                                <option value="UGA" title="UG">Uganda</option>
                                                <option value="URY" title="UY">Uruguay</option>
                                                <option value="UZB" title="UZ">Uzbekistan</option>
                                                <option value="VCT" title="VC">Saint Vincent And The Grenadine</option>
                                                <option value="VEN" title="VE">Venezuela</option>
                                                <option value="VGB" title="VG">British Virgin Islands</option>
                                                <option value="VNM" title="VN">Vietnam</option>
                                                <option value="VUT" title="VU">Vanuatu</option>
                                                <option value="WLF" title="WF">Wallis and Futuna</option>
                                                <option value="WSM" title="WS">Western Samoa</option>
                                                <option value="YEM" title="YE">Yemen</option>
                                                <option value="ZAF" title="ZA">South Africa</option>
                                                <option value="ZMB" title="ZM">Zambia</option>
                                                <option value="ZWE" title="ZW">Zimbabwe</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                請選擇你的國籍！
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 mb-3">
                                        <label for="exampleFormControlInput1" class="form-label-order-info mb-3" id="email">電子信箱（Email address）</label>
                                        <input type="email" class="form-control  tags" id="exampleFormControlInput1" placeholder="Please enter your email address">
                                    </div>
                                    <div class="col-xl-12 mb-3">
                                        <div class="row g-2">
                                            <label for="exampleFormControlInput1" class="form-label-order-info mb-3" id="phone_num">聯絡電話（Phone Number)</label>
                                            <div class="col-xl-3 col-4">
                                                <select class="form-select" aria-label="Default select example">
                                                    <option value="+886">台灣 +886</option>
                                                    <option value="+81">日本 +81</option>
                                                    <option value="+82">韓國 +82</option>
                                                    <option value="+91">印度 +91</option>
                                                </select>
                                            </div>
                                            <div class="col-xl-9 col-8 align-self-end">
                                                <input type="text" class="form-control  tags" id="exampleFormControlInput1" placeholder="Please enter your phone number">
                                            </div>
                                            <div class="invalid-feedback">
                                                請選擇你的聯絡電話！
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 mb-3">
                                        <label for="exampleFormControlInput1" class="form-label-order-info mb-3" id="address">地址（Address）</label>
                                        <input type="text" class="form-control tags" id="exampleFormControlInput1" placeholder="Please enter your address">
                                    </div>
                                    <!-- 旅客1 -->
                                    <div class="col-xl-12 border-bottom pb-3 mt-5 mb-3">
                                        <span class="fs-4">旅客1</span>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6 col-12 mb-3">
                                            <label for="validationCustom01" class="form-label-order-info mb-3" id="recipient_first_name">名字（First name）</label>
                                            <input type="text" class="form-control  tags" id="validationCustom01" placeholder="Please enter your first name" required>
                                            <div class="invalid-feedback">
                                                請填入你的名字！
                                            </div>
                                        </div>
                                        <div class="col-xl-6 mb-3">
                                            <label for="validationCustom02" class="form-label-order-info mb-3" id="recipient_last_name">姓氏（Last name）</label>
                                            <input type="text" class="form-control  tags" id="validationCustom02" value="" placeholder="Please enter your last name" required>
                                            <div class="invalid-feedback">
                                                請填入你的姓氏！
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6 col-12 mb-3">
                                            <label for="validationCustom01" class="form-label-order-info d-flex flex-column mb-3" id="gender">性別（Gender）</label>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" id="inlineCheckbox1" value="男">
                                                <label class="form-check-label" for="inlineCheckbox1">男</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" id="inlineCheckbox2" value="女">
                                                <label class="form-check-label" for="inlineCheckbox2">女</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" id="inlineCheckbox3" value="不方便透漏">
                                                <label class="form-check-label" for="inlineCheckbox3">不方便透露</label>
                                            </div>
                                            <div id="invalidCheck3Feedback" class="invalid-feedback">
                                                請選擇你的性別！
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-12 mb-3">
                                            <label for="validationCustom04" class="form-label-order-info col-xl-12 col-12 mb-3" id="country">國家／地區(Country/Region)</label>
                                            <select style="width:100%;" class="fastbannerform__country form-select col" aria-label="Default select example">
                                                <option value="ASA" title="AA">America</option>
                                                <option value="AND" title="AD">Andorra</option>
                                                <option value="ARE" title="AE">United Arab Emirates</option>
                                                <option value="AFG" title="AF">Afghanistan</option>
                                                <option value="ATG" title="AG">Antigua and Barbuda</option>
                                                <option value="ALB" title="AL">Albania</option>
                                                <option value="ARM" title="AM">Armenia</option>
                                                <option value="AGO" title="AO">Angola</option>
                                                <option value="ARG" title="AR">Argentina</option>
                                                <option value="AUT" title="AT">Austria</option>
                                                <option value="AUS" title="AU">Australia</option>
                                                <option value="ABW" title="AW">Aruba</option>
                                                <option value="AZE" title="AZ">Azerbaijan</option>
                                                <option value="BIH" title="BA">Bosnia and Herzegovina</option>
                                                <option value="BRB" title="BB">Barbados</option>
                                                <option value="BGD" title="BD">Bangladesh</option>
                                                <option value="BEL" title="BE">Belgium</option>
                                                <option value="BFA" title="BF">Burkina Faso</option>
                                                <option value="BGR" title="BG">Bulgaria</option>
                                                <option value="BHR" title="BH">Bahrain</option>
                                                <option value="BDI" title="BI">Burundi</option>
                                                <option value="BEN" title="BJ">Benin</option>
                                                <option value="BMU" title="BM">Bermuda</option>
                                                <option value="BRN" title="BN">Brunei</option>
                                                <option value="BOL" title="BO">Bolivia</option>
                                                <option value="BRA" title="BR">Brazil</option>
                                                <option value="BHS" title="BS">Bahamas</option>
                                                <option value="BTN" title="BT">Bhutan</option>
                                                <option value="BWA" title="BW">Botswana</option>
                                                <option value="BLR" title="BY">Belarus</option>
                                                <option value="BLZ" title="BZ">Belize</option>
                                                <option value="CAN" title="CA">Canada</option>
                                                <option value="COD" title="CD">Democratic Republic of the Congo</option>
                                                <option value="CAF" title="CF">Central African Republic</option>
                                                <option value="COG" title="CG">Democratic Republic of the Congo</option>
                                                <option value="CHE" title="CH">Switzerland</option>
                                                <option value="CHL" title="CL">Chile</option>
                                                <option value="CMR" title="CM">Cameroon</option>
                                                <option value="CHN" title="CN">China</option>
                                                <option value="COL" title="CO">Colombia</option>
                                                <option value="CRI" title="CR">Costa Rica</option>
                                                <option value="CUB" title="CU">Cuba</option>
                                                <option value="CPV" title="CV">Cape Verde</option>
                                                <option value="CYP" title="CY">Cyprus</option>
                                                <option value="CZE" title="CZ">Czech Republic</option>
                                                <option value="DEU" title="DE">Germany</option>
                                                <option value="DJI" title="DJ">Djibouti</option>
                                                <option value="DNK" title="DK">Denmark</option>
                                                <option value="DMA" title="DM">Dominica</option>
                                                <option value="DOM" title="DO">Dominican Republic</option>
                                                <option value="DZA" title="DZ">Algeria</option>
                                                <option value="ECU" title="EC">Ecuador</option>
                                                <option value="EST" title="EE">Estonia</option>
                                                <option value="EGY" title="EG">Egypt</option>
                                                <option value="ERI" title="ER">Eritrea</option>
                                                <option value="ESP" title="ES">Spain</option>
                                                <option value="ETH" title="ET">Ethiopia</option>
                                                <option value="FIN" title="FI">Finland</option>
                                                <option value="FJI" title="FJ">Fiji</option>
                                                <option value="FLK" title="FK">Falkland Islands</option>
                                                <option value="FSM" title="FM">Micronesia</option>
                                                <option value="FRO" title="FO">Faroe Islands</option>
                                                <option value="FRA" title="FR">France</option>
                                                <option value="GAB" title="GA">Gabon</option>
                                                <option value="GBR" title="GB">United Kingdom</option>
                                                <option value="GRD" title="GD">Grenada</option>
                                                <option value="GEO" title="GE">Georgia</option>
                                                <option value="GHA" title="GH">Ghana</option>
                                                <option value="GIB" title="GI">Gibraltar</option>
                                                <option value="GMB" title="GM">Gambia</option>
                                                <option value="GIN" title="GN">Guinea</option>
                                                <option value="GNQ" title="GQ">Equatorial Guinea</option>
                                                <option value="GRC" title="GR">Greece</option>
                                                <option value="GTM" title="GT">Guatemala</option>
                                                <option value="GNB" title="GW">Guinea-Bissau</option>
                                                <option value="GUY" title="GY">Guyana</option>
                                                <option value="HKG" title="HK">Hong Kong</option>
                                                <option value="HND" title="HN">Honduras</option>
                                                <option value="HRV" title="HR">Croatia</option>
                                                <option value="HTI" title="HT">Haiti</option>
                                                <option value="HUN" title="HU">Hungary</option>
                                                <option value="IDN" title="ID">Indonesia</option>
                                                <option value="IRL" title="IE">Ireland</option>
                                                <option value="ISR" title="IL">Israel</option>
                                                <option value="IND" title="IN">India</option>
                                                <option value="IRQ" title="IQ">Iraq</option>
                                                <option value="IRN" title="IR">Iran</option>
                                                <option value="ISL" title="IS">Iceland</option>
                                                <option value="ITA" title="IT">Italy</option>
                                                <option value="JAM" title="JM">Jamaica</option>
                                                <option value="JOR" title="JO">Jordan</option>
                                                <option value="JPN" title="JP">Japan</option>
                                                <option value="KEN" title="KE">Kenya</option>
                                                <option value="KGZ" title="KG">Kyrgyzstan</option>
                                                <option value="KHM" title="KH">Cambodia</option>
                                                <option value="KIR" title="KI">Kiribati</option>
                                                <option value="COM" title="KM">Comoros</option>
                                                <option value="KNA" title="KN">Saint Kitts and Nevis</option>
                                                <option value="PRK" title="KP">North Korea</option>
                                                <option value="KOR" title="KR">South Korea</option>
                                                <option value="KWT" title="KW">Kuwait</option>
                                                <option value="CYM" title="KY">Cayman Islands</option>
                                                <option value="KAZ" title="KZ">Kazakhstan</option>
                                                <option value="LAO" title="LA">Laos</option>
                                                <option value="LBN" title="LB">Lebanon</option>
                                                <option value="LCA" title="LC">Saint Lucia</option>
                                                <option value="LIE" title="LI">Liechtenstein</option>
                                                <option value="LKA" title="LK">Sri Lanka</option>
                                                <option value="LBR" title="LR">Liberia</option>
                                                <option value="LSO" title="LS">Lesotho</option>
                                                <option value="LTU" title="LT">Lithuania</option>
                                                <option value="LUX" title="LU">Luxembourg</option>
                                                <option value="LVA" title="LV">Latvia</option>
                                                <option value="LBY" title="LY">Libya</option>
                                                <option value="MAR" title="MA">Morocco</option>
                                                <option value="MCO" title="MC">Monaco</option>
                                                <option value="MDA" title="MD">Moldova</option>
                                                <option value="MNE" title="ME">Montenegro</option>
                                                <option value="MDG" title="MG">Madagascar</option>
                                                <option value="MKD" title="MK">Macedonia</option>
                                                <option value="MLI" title="ML">Mali</option>
                                                <option value="MMR" title="MM">Myanmar</option>
                                                <option value="MNG" title="MN">Mongolia</option>
                                                <option value="MAC" title="MO">Macao</option>
                                                <option value="MRT" title="MR">Mauritania</option>
                                                <option value="MLT" title="MT">Malta</option>
                                                <option value="MUS" title="MU">Mauritius</option>
                                                <option value="MDV" title="MV">Maldives</option>
                                                <option value="MWI" title="MW">Malawi</option>
                                                <option value="MEX" title="MX">Mexico</option>
                                                <option value="MYS" title="MY">Malaysia</option>
                                                <option value="MOZ" title="MZ">Mozambique</option>
                                                <option value="NAM" title="NA">Namibia</option>
                                                <option value="NER" title="NE">Niger</option>
                                                <option value="NGA" title="NG">Nigeria</option>
                                                <option value="NIC" title="NI">Nicaragua</option>
                                                <option value="NLD" title="NL">Netherlands</option>
                                                <option value="NOR" title="NO">Norway</option>
                                                <option value="NPL" title="NP">Nepal</option>
                                                <option value="NRU" title="NR">Nauru</option>
                                                <option value="NZL" title="NZ">New Zealand</option>
                                                <option value="OMN" title="OM">Oman</option>
                                                <option value="PAN" title="PA">Panama</option>
                                                <option value="PER" title="PE">Peru</option>
                                                <option value="PNG" title="PG">Papua New Guinea</option>
                                                <option value="PHL" title="PH">Philippines</option>
                                                <option value="PAK" title="PK">Pakistan</option>
                                                <option value="POL" title="PL">Poland</option>
                                                <option value="PRI" title="PR">Puerto Rico</option>
                                                <option value="PSE" title="PS">Palestine</option>
                                                <option value="PRT" title="PT">Portugal</option>
                                                <option value="PLW" title="PW">Palau</option>
                                                <option value="PRY" title="PY">Paraguay</option>
                                                <option value="QAT" title="QA">Qatar</option>
                                                <option value="ROU" title="RO">Romania</option>
                                                <option value="SRB" title="RS">Serbia</option>
                                                <option value="RUS" title="RU">Russia</option>
                                                <option value="RWA" title="RW">Rwanda</option>
                                                <option value="SAU" title="SA">Saudi Arabia</option>
                                                <option value="SLB" title="SB">Solomon Islands</option>
                                                <option value="SYC" title="SC">Seychelles</option>
                                                <option value="SDN" title="SD">Sudan</option>
                                                <option value="SWE" title="SE">Sweden</option>
                                                <option value="SGP" title="SG">Singapore</option>
                                                <option value="SVN" title="SI">Slovenia</option>
                                                <option value="SVK" title="SK">Slovak Republic</option>
                                                <option value="SLE" title="SL">Sierra Leone</option>
                                                <option value="SMR" title="SM">San Marino</option>
                                                <option value="SEN" title="SN">Senegal</option>
                                                <option value="SOM" title="SO">Somalia</option>
                                                <option value="SUR" title="SR">Suriname</option>
                                                <option value="STP" title="ST">Sao Tome and Principe</option>
                                                <option value="SLV" title="SV">El Salvador</option>
                                                <option value="SYR" title="SY">Syria</option>
                                                <option value="SWZ" title="SZ">Swaziland</option>
                                                <option value="TCD" title="TD">Chad</option>
                                                <option value="TGO" title="TG">Togo</option>
                                                <option value="THA" title="TH">Thailand</option>
                                                <option value="TJK" title="TJ">Tajikistan</option>
                                                <option value="TKM" title="TM">Turkmenistan</option>
                                                <option value="TUN" title="TN">Tunisia</option>
                                                <option value="TON" title="TO">Tonga</option>
                                                <option value="TUR" title="TR">Turkey</option>
                                                <option value="TTO" title="TT">Trinidad and Tobago</option>
                                                <option value="TUV" title="TV">Tuvalu</option>
                                                <option value="TWN" title="TW" selected="selected">Taiwan</option>
                                                <option value="TZA" title="TZ">Tanzania</option>
                                                <option value="UKR" title="UA">Ukraine</option>
                                                <option value="UGA" title="UG">Uganda</option>
                                                <option value="URY" title="UY">Uruguay</option>
                                                <option value="UZB" title="UZ">Uzbekistan</option>
                                                <option value="VCT" title="VC">Saint Vincent And The Grenadine</option>
                                                <option value="VEN" title="VE">Venezuela</option>
                                                <option value="VGB" title="VG">British Virgin Islands</option>
                                                <option value="VNM" title="VN">Vietnam</option>
                                                <option value="VUT" title="VU">Vanuatu</option>
                                                <option value="WLF" title="WF">Wallis and Futuna</option>
                                                <option value="WSM" title="WS">Western Samoa</option>
                                                <option value="YEM" title="YE">Yemen</option>
                                                <option value="ZAF" title="ZA">South Africa</option>
                                                <option value="ZMB" title="ZM">Zambia</option>
                                                <option value="ZWE" title="ZW">Zimbabwe</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                請選擇你的國籍！
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 mb-3">
                                        <label for="exampleFormControlInput1" class="form-label-order-info mb-3" id="email">電子信箱（Email address）</label>
                                        <input type="email" class="form-control  tags" id="exampleFormControlInput1" placeholder="Please enter your email address">
                                    </div>
                                    <div class="col-xl-12 mb-3">
                                        <div class="row g-2">
                                            <label for="exampleFormControlInput1" class="form-label-order-info mb-3" id="phone_num">聯絡電話（Phone Number)</label>
                                            <div class="col-xl-3 col-4">
                                                <select class="form-select" aria-label="Default select example">
                                                    <option>
                                                        <p>台灣 +886</p>
                                                    </option>
                                                    <option>
                                                        <p>日本 +81</p>
                                                    </option>
                                                    <option>
                                                        <p>韓國 +82</p>
                                                    </option>
                                                    <option>
                                                        <p>印度 +91</p>
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="col-xl-9 col-8 align-self-end">
                                                <input type="text" class="form-control  tags" id="exampleFormControlInput1" placeholder="Please enter your phone number">
                                            </div>
                                            <div class="invalid-feedback">
                                                請選擇你的聯絡電話！
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="exampleFormControlInput1" class="form-label-order-info mb-3" id="address">地址（Address）</label>
                                        <input type="text" class="form-control tags" id="exampleFormControlInput1" placeholder="Please enter your address">
                                    </div>
                                    <!-- 旅遊期間聯絡方式 -->
                                    <div class="col-xl-12 mb-3 mt-5 pb-3 border-bottom">
                                        <span class="fs-4">旅遊期間聯絡方式</span>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6 mb-3">
                                            <label for="validationCustom01" class="form-label-tourist-info mb-3" id="recipient_first_name">聯絡人名字（First name）</label>
                                            <input type="text" class="form-control  tags" id="validationCustom01" value="" placeholder="Please enter your first name" required>
                                            <div class="invalid-feedback">
                                                請填入你的名字！
                                            </div>
                                        </div>
                                        <div class="col-xl-6 mb-3">
                                            <label for="validationCustom02" class="form-label-tourist-info mb-3" id="recipient_last_name">聯絡人姓氏（Last name）</label>
                                            <input type="text" class="form-control  tags" id="validationCustom02" value="" placeholder="Please enter your last name" required>
                                            <div class="invalid-feedback">
                                                請填入你的姓氏！
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 mb-3">
                                        <div class="row g-2">
                                            <label for="exampleFormControlInput1" class="form-label-order-info mb-3" id="phone_num">聯絡電話（Phone Number)</label>
                                            <div class="col-xl-3 col-4">
                                                <select class="form-select" aria-label="Default select example">
                                                    <option>
                                                        <p>台灣 +886</p>
                                                    </option>
                                                    <option>
                                                        <p>日本 +81</p>
                                                    </option>
                                                    <option>
                                                        <p>韓國 +82</p>
                                                    </option>
                                                    <option>
                                                        <p>印度 +91</p>
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="col-xl-9 col-8 align-self-end">
                                                <input type="text" class="form-control  tags" id="exampleFormControlInput1" placeholder="Please enter your phone number">
                                            </div>
                                            <div class="invalid-feedback">
                                                請選擇你的聯絡電話！
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-12 mt-5 mb-3 border-bottom">
                                        <label for="exampleFormControlTextarea1" class="form-label fs-4">特殊需求備註</label>
                                    </div>
                                    <div class="col-xl-12">
                                        <textarea class="form-control  tags" id="exampleFormControlTextarea1" row="3" name="recipient_comments"></textarea>
                                    </div>
                                    <div class="col-xl-12 mt-5">
                                        <span class="fs-4">使用點數</span>
                                    </div>
                                    <div class="col-xl-12">
                                        <span>您目前累積的點數:</span>
                                        <p></p>
                                    </div>
                                    <?php
                                    //購物車商品的數量
                                    $count = 0;
                                    $total = 0;

                                    //判斷購物車是否存在，若存在，同時確認裡頭的商品數量
                                    if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                                        //更新商品數量
                                        $count = count($_SESSION['cart']);
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
                                    }
                                    ?>
                                    <div class="text-end">
                                        <span><?= $count ?>件商品合計</span>
                                        <span class="dollar">TWD</span>
                                        <span class="price"><?= $total ?></span>
                                    </div>
                                    <div class="col-xl-12 d-flex justify-content-end align-content-center">
                                        <span><img style="width: 20px;margin-right: 5px;" src="./SVG/member-system/bobee.svg" alt=""></span>
                                        <span style="color: #ADE8F4;"><?= floor($total / 100) ?> BOBEE point</span>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-xl-8 m-auto my-5">
                            <div class="d-flex justify-content-between">
                                <input class="btn" type="button" onclick="history.back()" id="pre-step" value="回上一頁"></input>
                                <button class="btn" type="submit" onclick="location.href='payment.php'" id="next-step">前往結帳</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- footer -->
    <footer></footer>

    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
    <!-- jQuery CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- jQuery UI -->
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script type="text/javascript" src="./SVG/js/select_gj.min.js"></script>
    <script src="./SVG/js/select2_1.js"></script>
    <!--  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="./js/header.js"></script>
    <script src="./JS_WCY/custom2.js"></script>

    <script>
        $( function() {
            var availableTags = [
            "陳",
            "家豪",
            "s911790112@gmail.com",
            "0958077320",
            "桃園市蘆竹區南福街84-22號",
            "我想要9/3號下午6點送達",
            "蔡",
            "家蓉",
            "a3219099@yahoo.com.tw",
            "0935009394",
            "台北市大安區復興南路一段390號2樓"
            ];

            $( ".tags" ).autocomplete({
            source: availableTags
            });
     } );
  </script>

</body>

</html>