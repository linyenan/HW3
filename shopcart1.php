<?php require_once 'db.inc.php' ?>
<?php
session_start();
// 假設已登入
// $_SESSION['email'] = "formosa123@gmail.com";
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>shopcart1</title>
    <link rel="stylesheet" href="./reset.css">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2021.2.616/styles/kendo.common.min.css" />
    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2021.2.616/styles/kendo.metro.min.css" />
    <link rel="stylesheet" href="https://kendo.cdn.telerik.com/2021.2.616/styles/kendo.metro.mobile.min.css" />
    <link rel="stylesheet" href="./header.css">
    <link rel="stylesheet" href="./nav-footer.css">


    <style>
        body {
            background-color: #FDFFF8;
            font-family: 'Noto Sans TC', sans-serif;
        }

        .container {
            max-width: 1640px;
        }

        /* -------------------------------------------------------------------------------------------------------------- */
        .car-top-lty {
            background-color: #B1D660;
            height: 160px;
            width: 100%;
            border-radius: 3px;
        }

        .car-top-lty p {
            height: 100%;
            color: white;
            font-size: 36px;
            font-weight: 500;

        }

        .car-top-lty p i {
            color: white;
            margin-right: 0.5rem;
        }

        .car-schedule-lty,
        .car-buy-lty,
        .car-borrow-lty,
        .car-coupon-lty {
            min-height: 320px;
            width: 100%;
            background-color: white;
            box-shadow: 3px 3px #cececea2;

        }

        .text4_lty {
            font-size: 26px;
            font-weight: 700;

        }

        .img-wrap-lty p {
            display: inline;
        }

        .dollars_lty i {
            font-size: 24px;
            color: #ABADB2;
        }

        .car-borrow-lty {
            background-color: white;
        }

        /* .img-wrap-lty {
            width: 400px;

        } */

        .img-wrap-lty img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .tr_lty th {
            font-size: 26px;
            line-height: 36px;
            font-weight: 600;
        }

        .tr2_lty th {
            font-size: 20px;
            line-height: 32px;
            font-weight: 400;
        }


        .td_lty a i {
            font-size: 24px;
            color: #ABADB2;
            padding: 2px;
        }


        .table td {
            padding: .75rem;
            vertical-align: middle;
            border-top: 1px solid #dee2e6;
            text-align: left;
        }


        .table th {
            padding: .75rem;
            vertical-align: middle;
            border-top: 1px solid #dee2e6;
            text-align: left;
        }

        .total_lty {
            min-height: 100px;
            width: 100%;
            background-color: white;
            box-shadow: 3px 3px #cececea2;
            border-top: 1px solid black;
        }

        .link2_lty a {
            height: 60px;
            width: 200px;
            color: white;
            background-color: #FF9F1C;
            text-align: center;
            line-height: 60px;
            float: right;
            border-radius: 3px;
            box-shadow: 3px 3px #cececea2;
            font-weight: 700;
        }

        .link2_lty a:hover {
            text-decoration: none;
        }

        .line_lty {
            border-left: 10px solid #B1D660;
            height: 80px;
            display: inline;
            font-size: 36px;
            color: #707070;
            padding-left: 36px;
            padding-top: 10px;
        }

        .cards2_lty {
            display: flex;
            flex-wrap: wrap;
            margin: 0 auto;
            padding-left: 15px;
        }

        .cards2_item_lty {
            max-width: 320px;
            background: white;
            box-shadow: 3px 3px #cececea2;
            padding-right: 0;
            padding-left: 0;
            margin: 5px;

        }

        .cards2_item_lty img {
            width: 100%;
        }


        /* ----------------------------------- */
        .product_title_lty {
            height: 35%;
            /* border-bottom: 1px dashed black; */
            font-size: 26px;
            font-weight: 700;
        }

        .product_detail_lty {
            height: 65%;
            /* border-bottom: 1px solid gray; */
        }

        /* ----------------------------------- */
        .product_title2_lty {
            height: 30%;
            /* border-bottom: 1px dashed black; */
            font-size: 26px;
            font-weight: 700;
        }

        .product_detail2_lty {
            height: 70%;
            /* border-bottom: 1px solid gray; */
        }

        .end_time_lty,
        .start_time_lty {
            font-size: 22px;
            font-weight: 700;
        }

        .prod_price_lty {
            font-size: 26px;
            font-weight: 700;
        }

        .prod_func_lty a i {
            color: #ABADB2;
            padding: 1px;
            font-size: 24px;
        }

        .total_price_lty {
            font-size: 36px;
        }

        .color_ntd {
            color: #FF9F1C;
            font-weight: 600;
        }

        .prod_delete_lty a {
            color: black;
        }

        .prod_delete_lty a:hover {
            color: black;
            text-decoration: none;
        }

        @media (max-width:880px) {


            .cards2_item_lty {
                max-width: 170px;
            }

            .car-top-lty {
                max-height: 60px;
            }

            .car-top-lty p {
                height: 100%;
                color: white;
                font-size: 18px;
                font-weight: 500;

            }

            .car-top-lty p i {
                color: white;
                margin-right: 0.5rem;
            }

            .car_total_lty {
                padding: 0 15px;
            }

            .car-schedule-lty,
            .car-buy-lty,
            .car-borrow-lty,
            .car-coupon-lty {

                width: 100%;
                background-color: white;
                box-shadow: 3px 3px #cececea2;
                align-items: normal;
                min-height: 100px;
                /* border-bottom: 1px solid black; */
            }

            .prod_check_lty {
                /* border-bottom: 1px dashed black; */
                padding: 10px;
            }

            .prod_intro_lty img {
                width: 100px;
            }

            .prod_intro_lty {
                padding: 10px;
            }

            .prod_date_lyt {
                font-size: 12px;
                padding-left: 40px;
            }

            .start_time_lty,
            .end_time_lty {
                font-size: 12px;
            }

            .prod_price_wrap_lty p {
                float: right;
            }

            .product_title_lty {
                height: 35%;
                border-bottom: none;
                font-size: 26px;
                font-weight: 700;
            }

            .product_detail_lty {
                border-bottom: none;
            }

            .product_detail2_lty {
                border-bottom: none;
            }



            .people_count {
                font-size: 12px;
            }

            .people_count select {
                height: 30px;
                width: 30px;
            }

            .total_price_lty {
                font-size: 26px;
            }

            .link2_lty a {
                height: 35px;
                width: 100px;
                color: white;
                background-color: #FF9F1C;
                text-align: center;
                line-height: 35px;
                float: right;
                border-radius: 3px;
                box-shadow: 3px 3px #cececea2;
                font-weight: 700;
                font-size: 12px;
                margin-bottom: 5px;
            }

            .link3_lty a {
                height: 35px;
                width: 100px;
                color: white;
                background-color: #707070;
                text-align: center;
                line-height: 35px;
                float: right;
                border-radius: 3px;
                box-shadow: 3px 3px #cececea2;
                font-weight: 700;
                font-size: 12px;
                margin-bottom: 5px;
            }

            .link2_lty a:hover {
                text-decoration: none;
            }

            .link3_lty a:hover {
                text-decoration: none;
            }

            .prod_delete_lty {
                margin-top: 5px;
            }
        }

        /*button*/
        .next-step {
            width: 180px;
            height: 50px;
            color: #fff;
            border-radius: 3px;
            background-color: #FF9F1C;
        }

        .next-step:hover {
            background-color: #FDB149;
        }

        @media screen and (max-width:880px) {
            .next-step {
                display: flex;
                justify-content: center;
                align-items: center;
                width: 100px;
                height: 35px;
                font-size: 12px;
                color: #fff;
                background-color: #FF9F1C;
            }

            .buy {
                display: none;
            }

            .prod_date_lyt {
                font-size: 12px;
                padding-left: 40px;
                display: none;
            }
        }
    </style>
</head>

<body>
    <?php require_once 'header.php' ?>
    <div class="container">
        <div class="row mt-xl-4">
            <div class="d-xl-block d-none"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="1644" height="104" viewBox="0 0 1644 104">
                    <defs>
                        <clipPath id="clip-path">
                            <rect width="31" height="31" fill="none" />
                        </clipPath>
                    </defs>
                    <circle id="椭圆_1" data-name="椭圆 1" cx="36" cy="36" r="36" fill="#ff9f1c" />
                    <circle id="椭圆_2" data-name="椭圆 2" cx="36" cy="36" r="36" transform="translate(784)" fill="#abadb2" />
                    <circle id="椭圆_3" data-name="椭圆 3" cx="36" cy="36" r="36" transform="translate(1568)" fill="#abadb2" />
                    <line id="直线_1" data-name="直线 1" x2="712" transform="translate(72.5 36.5)" fill="none" stroke="#707070" stroke-width="3" />
                    <line id="直线_2" data-name="直线 2" x2="712" transform="translate(856.5 36.5)" fill="none" stroke="#707070" stroke-width="3" />
                    <text id="填寫資料" transform="translate(780 99)" fill="#707070" font-size="20" font-family="YuGothicUI-Regular, Yu Gothic UI">
                        <tspan x="0" y="0">填寫資料</tspan>
                    </text>
                    <text id="確認付款" transform="translate(1564 99)" fill="#707070" font-size="20" font-family="YuGothicUI-Regular, Yu Gothic UI">
                        <tspan x="0" y="0">確認付款</tspan>
                    </text>
                    <text id="購物車" transform="translate(6 99)" fill="#707070" font-size="20" font-family="YuGothicUI-Regular, Yu Gothic UI">
                        <tspan x="0" y="0">購物車</tspan>
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
            <div class="d-xl-none d-block" style="margin:30px auto;">
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
    </div>
    <form action="fillout.php" method="post" name="myForm">
        <div class="container">
            <div class="row mt-xl-5 car_total_lty">
                <div class="car-top-lty">
                    <p class="d-flex justify-content-center align-items-center">
                        <i class="fas fa-shopping-cart"></i>購物車
                    </p>
                </div>
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
                <!-- 購買行程 -->
                <div class="car-schedule-lty">
                    <!-- 購買行程php -->
                    <?php
                    foreach ($_SESSION['cart'] as $key => $obj) {
                        if ($obj['func_name'] == 0) {
                    ?>
                        <div class="product_detail_lty d-flex align-items-center flex-wrap">
                            <div class="col-xl-1 col-12 prod_check_lty text-xl-center">
                                <input type="checkbox" id="checkbox_01" class="k-checkbox" checked="checked" name="Checkbox[]">
                                <span class="d-inline d-xl-none" style="margin-left: 8px;">購買行程</span>
                            </div>
                            <div class="col-xl-3 col-12 prod_lty">
                                <div class="prod_intro_lty d-flex align-items-center">
                                    <img src="./images/<?= $obj['prod_main_img'] ?>" class="col-xl-4 img-thumbnail" alt="">
                                    <p class="pro_name_detail_lty col-xl-8"><?= $obj['prod_name'] ?></p>
                                </div>
                            </div>
                            <div class="col-xl-3 col-7 prod_date_lyt">
                                <p>
                                    <span>
                                        <?= $obj['travel_day'] ?>
                                    </span>
                                </p>
                            </div>
                            <div class="col-xl-2 col-6 prod_price_wrap_lty">
                                <div class="people_count input-group d-flex justify-content-start">
                                    <input type="hidden" name="index[]" value="<?= $key ?>">
                                    <button class="btn btn-outline-secondary btn_minus" type="button" data-index="<?= $key ?>" data-func-name="<?= $obj['func_name'] ?>" 
                                    data-prod-price="<?= $obj['prod_price'] ?>"><i class="fas fa-minus"></i></button>
                                    <input type="text" name="qty[]" class="form-control qty" placeholder="" data-index="<?= $key ?>" data-prod-price="<?= $obj['prod_price'] ?>" value="<?= $obj['prod_qty'] ?>">
                                    <button class="btn btn-outline-secondary btn_plus" type="button" data-index="<?= $key ?>" data-func-name="<?= $obj['func_name'] ?>" 
                                    data-prod-price="<?= $obj['prod_price'] ?>"><i class="fas fa-plus"></i></button>
                                </div>
                            </div>
                            <div class="col-xl col-6">
                                <p>TWD<span class="prod_price_lty" data-index="<?= $key ?>"><?= $obj['prod_price'] * $obj['prod_qty'] ?></span></p>
                            </div>
                            <div class="col-xl prod_func_lty pb-xl-3 d-none d-xl-flex justify-content-around">
                                <a href="#">
                                    <i class="fas fa-heart pt-xl-2"></i>
                                </a>
                                <a href="#" class="delete" data-index="<?= $key ?>">
                                    <i class="fas fa-trash-alt pt-xl-2"></i>
                                </a>
                            </div>
                        </div>
                    <?php
                        }
                    }
                    ?>
                </div>
                <!-- 購買商品 -->
                <div class="car-borrow-lty">
                    <?php
                    foreach ($_SESSION['cart'] as $key => $obj) {
                        if ($obj['func_name'] == 21) {
                    ?>
                            <div class="product_detail2_lty d-flex align-items-center flex-wrap">
                                <div class="col-xl-1 col-12 prod_check_lty text-xl-center">
                                    <input type="checkbox" id="checkbox_02" class="k-checkbox" checked="checked" name="Checkbox[]">
                                    <span class="d-inline d-xl-none" style="margin-left: 8px;">購買商品</span>
                                </div>
                                <div class="col-xl-3 col-12 prod_lty">
                                    <div class="prod_intro_lty d-flex align-items-center">
                                        <img src="./images/<?= $obj['prod_main_img'] ?>" class="col-xl-4" alt="">
                                        <p class="pro_name_detail_lty col-xl-8"><?= $obj['prod_name'] ?></p>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-7 prod_date_lyt">
                                </div>
                                <div class="col-xl-2  col-6 prod_count_lty">
                                    <div class="people_count input-group d-flex justify-content-start">
                                        <input type="hidden" name="index[]" value="<?= $key ?>">
                                        <button class="btn btn-outline-secondary btn_minus" type="button" data-index="<?= $key ?>" data-func-name="<?= $obj['func_name'] ?>" 
                                        data-prod-price="<?= $obj['prod_price'] ?>"><i class="fas fa-minus"></i></button>
                                        <input type="text" name="qty[]" class="form-control qty" placeholder="" data-index="<?= $key ?>" data-prod-price="<?= $obj['prod_price'] ?>" value="<?= $obj['prod_qty'] ?>">
                                        <button class="btn btn-outline-secondary btn_plus" type="button" data-index="<?= $key ?>" data-func-name="<?= $obj['func_name'] ?>" 
                                        data-prod-price="<?= $obj['prod_price'] ?>"><i class="fas fa-plus"></i></button>
                                    </div>
                                </div>
                                <div class="col-xl col-6">
                                    <p>TWD<span class="prod_price_lty" data-index="<?= $key ?>"><?= $obj['prod_price'] * $obj['prod_qty'] ?></span></p>
                                </div>
                                <div class="col-xl prod_func_lty d-flex justify-content-around align-content-center">
                                    <a href="#">
                                        <i class="fas fa-heart pt-xl-2"></i>
                                    </a>
                                    <a href="#" class="delete" data-index="<?= $key ?>">
                                        <i class="fas fa-trash-alt pt-xl-2"></i>
                                    </a>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>
                <!-- 租借商品 -->
                <div class="car-buy-lty">
                    <?php
                    foreach ($_SESSION['cart'] as $key => $obj) {
                        if ($obj['func_name'] == 17) {
                    ?>
                            <div class="product_detail2_lty d-flex align-items-center flex-wrap">
                                <div class="col-xl-1 col-12 prod_check_lty text-xl-center">
                                    <input type="checkbox" id="checkbox_03" class="k-checkbox" checked="checked" name="Checkbox[]">
                                    <span class="d-inline d-xl-none" style="margin-left: 8px;">租借商品</span>
                                </div>
                                <div class="col-xl-3 col-12 prod_lty">
                                    <div class="prod_intro_lty d-flex align-items-center">
                                        <img src="./images/<?= $obj['prod_main_img'] ?>" class="col-xl-4" alt="">
                                        <p class="pro_name_detail_lty col-xl-8"><?= $obj['prod_name'] ?> </p>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-7 prod_date_lyt">
                                    <span>
                                        <?= $obj['rental_day'] ?>
                                    </span>
                                </div>
                                <div class="col-xl-2 col-6 prod_count_lty">
                                    <div class="people_count input-group d-flex justify-content-start">
                                        <input type="hidden" name="index[]" value="<?= $key ?>">
                                        <button class="btn btn-outline-secondary btn_minus" 
                                        type="button" 
                                        data-index="<?= $key ?>" 
                                        data-func-name="<?= $obj['func_name'] ?>" 
                                        data-rental-charge="<?= $obj['rental_charge'] ?>">
                                        <i class="fas fa-minus"></i></button>
                                        <input type="text" name="qty[]" class="form-control qty" placeholder="" data-index="<?= $key ?>" data-prod-price="<?= $obj['rental_charge'] ?>" value="<?= $obj['prod_qty'] ?>">
                                        <button class="btn btn-outline-secondary btn_plus" type="button" 
                                        data-index="<?= $key ?>"
                                        data-func-name="<?= $obj['func_name'] ?>" 
                                        data-rental-charge="<?= $obj['rental_charge'] ?>"><i class="fas fa-plus"></i></button>
                                    </div>
                                </div>
                                <div class="col-xl col-6">
                                    <p>TWD<span class="prod_price_lty" data-index="<?= $key ?>"><?= $obj['rental_charge'] * $obj['prod_qty'] * 3?></span></p>
                                </div>
                                <div class="col-xl prod_func_lty pb-xl-3 d-none d-xl-flex justify-content-around align-content-center">
                                    <a href="#">
                                        <i class="fas fa-heart pt-xl-2"></i>
                                    </a>
                                    <a href="#" class="delete" data-index="<?= $key ?>">
                                        <i class="fas fa-trash-alt pt-xl-2"></i>
                                    </a>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>
                <!-- 全部欄位 -->
                <div class="total_lty pt-xl-3">
                    <div class=" d-flex align-items-center flex-wrap">
                        <div class="col-xl-1 col-2 prod_check2_lty text-center">
                            <input type="checkbox" id="eq1" class="k-checkbox" checked="checked">
                        </div>
                        <div class="col-xl-5 col-10 prod_lty">
                            <div class="prod_delete_lty d-flex align-items-center text-xl-center">
                                全選(<span class="total_count_lty"><?= $count ?></span>) |
                                <a href="">刪除已選擇項目</a>
                            </div>
                        </div>
                        <div class="col-xl-1 col-4 prod_date_lyt">
                        </div>
                        <div class="col-xl-3 col-12 prod_count_lty">
                            <p>共<span class="total_count_lty count_products"><?= $count ?></span>件商品合計<span class="color_ntd">NTD <span class="total_price_lty" id="total"><?= $total ?></span></span></p>
                        </div>
                        <?php if ($count > 0) { ?>
                            <div class="col-xl-2  prod_price_wrap_lty d-none d-xl-flex">
                                <div class="link2_lty">
                                    <button type="submit" class="next-step" href="#">繼續結帳</button>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div style="width:100%; padding: 15px;" class="d-flex d-xl-block justify-content-between">
                    <div class="link3_lty d-xl-none d-inline">
                        <a href="#">繼續購物</a>
                    </div>
                    <?php
                    if ($count > 0) {
                    ?>
                        <div class="link2_lty d-xl-none d-inline">
                            <button type="submit" class="next-step" href="#">繼續結帳</button>
                        </div>
                    <?php
                    }
                    ?>
                    <a style="float: right; margin-top: 10px;padding-right:13px;color: black; font-size: 18px;font-weight: 500;" href="" class="d-xl-block d-none">
                        >繼續購物
                    </a>
                </div>
            </div>
            <div class="row mt-xl-5 recommanded_lty">
                <div class="line_lty">猜你還喜歡...</div>
            </div>
            <div class="row">
                <div class="cards2_lty">
                <!-- 桌機卡片 -->
                <div class="row d-none d-xl-block d-xl-flex" style="margin-top: 200px;">
                    <div class="col-2">
                        <div style="width: 50px; border-bottom: 3px solid #000000; padding-right: 100px;">
                            <h1 style="color: #000000">向您推薦</h1>
                        </div>
                    </div>
                    <div id="carouselExampleControls_1" class="carousel slide col-10" data-bs-ride="carousel">
                        <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="card-group">
                                <div class="card">
                                <img src="./images_LBD/l-13.jpg" class="card-img-top" alt="..." style="width: 334px; height: 290px; object-fit: cover;">
                                <div class="card-body">
                                    <h5 class="card-title">高雄七日｜高雄旗津出發 | 西子灣夕陽 | 旗津渡輪 | 旗津老街美食</h5>
                                    <p><i class="fas fa-map-marker-alt"></i>&nbsp;  Kaohsiung</p>
                                    <span class="card-text" style="position: relative;"><img src="./SVG_LBD/star.svg" alt=""></span>
                                    <span class="card-text" style="position: absolute; top: 400px; left: 210px;">TWD <span style="color: #FF9F1C; font-weight: bold; font-size: 20px;">4,399</span></span>
                                </div>
                                </div>                
                                <div class="card">
                                <img src="./images/n18.jpg" class="card-img-top" alt="..." style="width: 334px; height: 290px; object-fit: cover;">
                                <div class="card-body">
                                    <h5 class="card-title">嘉義一日景點遊｜阿里山小火車 | 賞櫻花 | 森林鐵路 | 觀光茶園</h5>
                                    <p><i class="fas fa-map-marker-alt"></i>&nbsp; Chiayi</p>
                                    <span class="card-text" style="position: relative;"><img src="./SVG_LBD/star.svg" alt=""></span>
                                    <span class="card-text" style="position: absolute; top: 400px; left: 210px;">TWD <span style="color: #FF9F1C; font-weight: bold; font-size: 20px;">1,908</span></span>
                                </div>
                                </div>                
                                <div class="card">
                                <img src="./images_LBD/m-12.jpg" class="card-img-top" alt="..." style="width: 334px; height: 290px; object-fit: cover;">
                                <div class="card-body">
                                    <h5 class="card-title">新北宜蘭七日｜烏來 | 礁溪祕境健行 | 桶後越嶺古道 | 東眼山</h5>
                                    <p><i class="fas fa-map-marker-alt"></i>&nbsp; Yilan</p>
                                    <span class="card-text" style="position: relative;"><img src="./SVG_LBD/star.svg" alt=""></span>
                                    <span class="card-text" style="position: absolute; top: 400px; left: 210px;">TWD <span style="color: #FF9F1C; font-weight: bold; font-size: 20px;">4,020</span></span>
                                </div>
                                </div>                
                                <div class="card">
                                <img src="./images/t2.png" class="card-img-top" alt="..." style="width: 334px; height: 290px; object-fit: cover;">
                                <div class="card-body">
                                    <h5 class="card-title">新北一日景點遊｜烏來溫泉 | 烏來老街 | 寶藏巖國際藝術村之旅</h5>
                                    <p><i class="fas fa-map-marker-alt"></i>&nbsp; Taipei</p>
                                    <span class="card-text" style="position: relative;"><img src="./SVG_LBD/star.svg" alt=""></span>
                                    <span class="card-text" style="position: absolute; top: 400px; left: 210px;">TWD <span style="color: #FF9F1C; font-weight: bold; font-size: 20px;">2,000</span></span>
                                </div>
                                </div>                
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="card-group">
                                <div class="card">
                                <img src="./images_LBD/l-10.jpg" class="card-img-top" alt="..." style="width: 334px; height: 290px; object-fit: cover;">
                                <div class="card-body">
                                    <h5 class="card-title">北部七日 | 南澳金岳瀑布溯溪 | 千島湖 | 八卦茶園 | 永安步道</h5>
                                    <p><i class="fas fa-map-marker-alt"></i>&nbsp; Taipei</p>
                                    <span class="card-text" style="position: relative;"><img src="./SVG_LBD/star.svg" alt=""></span>
                                    <span class="card-text" style="position: absolute; top: 400px; left: 210px;">TWD <span style="color: #FF9F1C; font-weight: bold; font-size: 20px;">8,000</span></span>
                                </div>
                                </div>                
                                <div class="card">
                                <img src="./images_LBD/we.jpg" class="card-img-top" alt="..." style="width: 334px; height: 290px; object-fit: cover;">
                                <div class="card-body">
                                    <h5 class="card-title">台東七日｜太麻里金針花賞、知本老爺風呂饗</h5>
                                    <p><i class="fas fa-map-marker-alt"></i>&nbsp; Taitung</p>
                                    <span class="card-text" style="position: relative;"><img src="./SVG_LBD/star.svg" alt=""></span>
                                    <span class="card-text" style="position: absolute; top: 400px; left: 210px;">TWD <span style="color: #FF9F1C; font-weight: bold; font-size: 20px;">8,000</span></span>
                                </div>
                                </div>                
                                <div class="card">
                                <img src="./images_LBD/l-14.jpg" class="card-img-top" alt="..." style="width: 334px; height: 290px; object-fit: cover;">
                                <div class="card-body">
                                    <h5 class="card-title">宜蘭七日｜明池森林童話、馬告生態探索</h5>
                                    <p><i class="fas fa-map-marker-alt"></i>&nbsp; Yilan</p>
                                    <span class="card-text" style="position: relative;"><img src="./SVG_LBD/star.svg" alt=""></span>
                                    <span class="card-text" style="position: absolute; top: 400px; left: 210px;">TWD <span style="color: #FF9F1C; font-weight: bold; font-size: 20px;">2,999</span></span>
                                </div>
                                </div>                
                                <div class="card">
                                <img src="./images/i-5.jpg" class="card-img-top" alt="..." style="width: 334px; height: 290px; object-fit: cover;">
                                <div class="card-body">
                                    <h5 class="card-title">菊島采風七日｜七美浮潛｜海洋牧場｜ 快樂渡假村</h5>
                                    <p><i class="fas fa-map-marker-alt"></i>&nbsp; Orchid Island</p>
                                    <span class="card-text" style="position: relative;"><img src="./SVG_LBD/star.svg" alt=""></span>
                                    <span class="card-text" style="position: absolute; top: 400px; left: 210px;">TWD <span style="color: #FF9F1C; font-weight: bold; font-size: 20px;">6,000</span></span>
                                </div>
                                </div>                
                            </div>
                        </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls_1" data-bs-slide="prev" style="position: absolute;
                        top: 150px;
                        left: -15px;
                        background-color: #B1D660;
                        height: 90px;
                        width: 50px;">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls_1" data-bs-slide="next" style="position: absolute;
                        top: 150px;
                        left: 1330px;
                        background-color: #B1D660;
                        height: 90px;
                        width: 50px;">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
        <div class="row d-block d-flex d-xl-none" style="margin-top: 50px;">
          <div class="col-2">
              <div style="width: 50px; border-bottom: 3px solid #000000; padding-right: 5px;">
                  <h1 style="color: #000000; font-size: 24px">向您推薦</h1>
              </div>
          </div>
          <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel" style="width: 320px;">
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <div class="card-group" style="display: flex;">
                      <div class="card col-6">
                        <img src="./images_LBD/l-10.jpg" class="card-img-top" alt="...">
                        <div class="card-body" style="height: 120px;">
                          <h5 class="card-title" style="font-size: 16px;">北部七日</h5>
                          <p style="font-size: 10px; margin-bottom: 0;"><i class="fas fa-map-marker-alt" style="font-size: 10px;"></i>&nbsp; Taipei</p>
                          <span class="card-text" style="position: relative;"><img src="./SVG_LBD/star.svg" alt="" width="100px;"></span>
                          <span class="card-text" style="position: absolute; top: 235px; left: 70px; font-size: 12px;">TWD <span style="color: #FF9F1C; font-weight: bold; font-size: 16px;">8,000</span></span>
                        </div>
                      </div>
                      <div class="card">
                        <img src="./images_LBD/we.jpg" class="card-img-top" alt="..." style="width: 146px; height: 146px; object-fit: cover;">
                        <div class="card-body">
                          <h5 class="card-title" style="font-size: 16px;">台東七日</h5>
                          <p style="font-size: 10px; margin-bottom: 0;"><i class="fas fa-map-marker-alt" style="font-size: 10px;"></i>&nbsp; Taitung</p>
                          <span class="card-text" style="position: relative;"><img src="./SVG_LBD/star.svg" alt="" width="100px;"></span>
                          <span class="card-text" style="position: absolute; top: 235px; left: 70px; font-size: 12px;">TWD <span style="color: #FF9F1C; font-weight: bold; font-size: 16px;">8,000</span></span>
                        </div>
                      </div>                   
                  </div>
                </div>
                <div class="carousel-item">
                  <div class="card-group" style="display: flex;">
                    <div class="card col-6">
                      <img src="./images_LBD/l-14.jpg" class="card-img-top" alt="..." style="width: 146px; height: 146px; object-fit: cover;">
                      <div class="card-body" style="height: 120px;">
                        <h5 class="card-title" style="font-size: 16px;">宜蘭七日</h5>
                        <p style="font-size: 10px; margin-bottom: 0;"><i class="fas fa-map-marker-alt" style="font-size: 10px;"></i>&nbsp; Yilan</p>
                        <span class="card-text" style="position: relative;"><img src="./SVG_LBD/star.svg" alt="" width="100px;"></span>
                        <span class="card-text" style="position: absolute; top: 235px; left: 70px; font-size: 12px;">TWD <span style="color: #FF9F1C; font-weight: bold; font-size: 16px;">2,999</span></span>
                      </div>
                    </div>
                    <div class="card">
                      <img src="./images/i-5.jpg" class="card-img-top" alt="..." style="width: 146px; height: 146px; object-fit: cover;">
                      <div class="card-body">
                        <h5 class="card-title" style="font-size: 16px;">菊島采風七日</h5>
                        <p style="font-size: 10px; margin-bottom: 0;"><i class="fas fa-map-marker-alt" style="font-size: 10px;"></i>&nbsp; Orchid Island</p>
                        <span class="card-text" style="position: relative;"><img src="./SVG_LBD/star.svg" alt="" width="100px;"></span>
                        <span class="card-text" style="position: absolute; top: 235px; left: 70px; font-size: 12px;">TWD <span style="color: #FF9F1C; font-weight: bold; font-size: 16px;">6,000</span></span>
                      </div>
                    </div>    
                  </div>
                </div>
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev" style="position: absolute;
              top: 100px;
              left: 12px;
              background-color: #B1D660;
              height: 60px;
              width: 30px;">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next" style="position: absolute;
              top: 100px;
              left: 278px;
              background-color: #B1D660;
              height: 60px;
              width: 30px;">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
          </div>
        </div>
 
                </div>
            </div>
        </div>
    </form>
    <footer></footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->
 
    <script src="https://kendo.cdn.telerik.com/2021.2.616/js/jquery.min.js"></script>
    <script src="https://kendo.cdn.telerik.com/2021.2.616/js/kendo.all.min.js"></script>
    <script src="./JS_WCY/custom2.js"></script>
 
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="./js/header.js"></script>
</body>

</html>