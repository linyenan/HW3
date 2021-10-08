<?php require_once 'db.inc.php' ?>
<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>equiment-shop-index</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="./reset.css">
    <link rel="stylesheet" href="./gototop.css">
    <link rel="stylesheet" href="./header.css">
    <link rel="stylesheet" href="./nav-footer.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Noto Sans TC', sans-serif;
        }

        @media screen and (max-width:575.99px) {}

        /* main style */

        /* 字級宣告 */
        h1 {
            font-size: 48px;
            line-height: 60px;
            letter-spacing: 10px;
            color: black;
            font-weight: bold;
            border-bottom: black 3px;
        }


        h2 {
            font-size: 36px;
            line-height: 46px;
            /* letter-spacing: 10px; */
            font-weight: bold;

        }

        h3 {
            font-size: 26px;
            line-height: 36px;
            /* letter-spacing: 10px; */
            font-weight: bold;
        }

        p {
            font-size: 18px;
            line-height: 28px;
            /* letter-spacing: 10px; */
        }

        .sm-text {
            font-size: 16px;
            line-height: 26px;
            /* letter-spacing: 10px; */
        }

        /* 字級宣告 end*/

        .LYC-container {
            padding: 0 150px;
            background-color: #FDFFF8;
        }

        .page-title-box {
            margin-top: 75px;
            text-align: center;
        }

        .page-title-box>h1 {
            /* text-align: center; */
            padding-bottom: 20px;
            border-bottom: solid 3px black;


        }

        /* 租裝備選單 */

        /* 租裝備 標題 */
        .title-left {
            height: 270px;
            border: solid #b1d660;
        }

        .title-color {
            background-color: #b1d660;
            height: 95px;
            display: flex;
            padding-left: 40%;
            padding-top: 3%;

        }
        
        .title-color>h1 {
            color: #fff;
            font-weight: bold;
            font-size: 48px;
        }

        .title-color>h2 {
            color: #fff;
            padding-top: 3%;
        }

        /* 下方各種裝備選單 */
        .chose-content {
            display: flex;
            padding: 10px;

        }

        .boots-box {
            width: 33%;
            text-align: center;
        }

        .boots-box>img {
            height: 91.87px;
            /* padding-right: 5%; */
        }

        .boots-box>h3 {

            text-align: center;
            font-weight: bold;
            margin-top: 10px;
        }

        .boots-box:hover {
            background-color: #F4FCE1;
            box-shadow: 3px 3px 9px #5E6472;
            margin-bottom: 20px;
            transition: 0.3s;
        }

        .water-box {
            width: 33%;
            text-align: center;
        }

        .water-box>img {
            height: 91.87px;
        }

        .water-box>h3 {

            text-align: center;
            font-weight: bold;
            margin-top: 10px;
        }

        .water-box:hover {
            background-color: #F4FCE1;
            box-shadow: 3px 3px 9px #5E6472;
            margin-bottom: 20px;
            transition: 0.3s;
        }

        .other-box {
            width: 33%;
            text-align: center;
        }

        .other-box>img {
            height: 91.87px;
        }

        .other-box>h3 {

            text-align: center;
            font-weight: bold;
            margin-top: 10px;
        }

        .other-box:hover {
            background-color: #F4FCE1;
            box-shadow: 3px 3px 9px #5E6472;
            margin-bottom: 20px;
            transition: 0.3s;
        }

        /* 買裝備選單 */

        .title-right {
            height: 270px;
            border: solid #FF9F1C;
            ;
        }

        .title-right-color {
            background-color: #FF9F1C;
            height: 95px;
            display: flex;
            padding-left: 40%;
            padding-top: 3%;

        }

        .title-right-color>h1 {
            color: #fff;
            font-weight: bold;
            font-size: 48px;
        }

        .title-right-color>h2 {
            color: #fff;
            padding-top: 3%;
        }

        /* 下方各種裝備選單 */
        .chose-content {
            display: flex;
            padding: 10px;

        }

        .right-boots-box {
            width: 33%;
            text-align: center;
        }

        .right-boots-box>img {
            height: 91.87px;
            /* padding-right: 5%; */
        }

        .right-boots-box>h3 {

            text-align: center;
            font-weight: bold;
            margin-top: 10px;
        }

        .right-boots-box:hover {
            background-color: #FCF6E1;
            box-shadow: 3px 3px 9px #5E6472;
            margin-bottom: 20px;
            transition: 0.3s;
        }

        .right-water-box {
            width: 33%;
            text-align: center;
        }

        .right-water-box>img {
            height: 91.87px;
        }

        .right-water-box>h3 {

            text-align: center;
            font-weight: bold;
            margin-top: 10px;
        }

        .right-water-box:hover {
            background-color: #FCF6E1;
            box-shadow: 3px 3px 9px #5E6472;
            margin-bottom: 20px;
            transition: 0.3s;
        }

        .right-other-box {
            width: 33%;
            text-align: center;
        }

        .right-other-box>img {
            height: 91.87px;
        }

        .right-other-box>h3 {

            text-align: center;
            font-weight: bold;
            margin-top: 10px;
        }

        .right-other-box:hover {
            background-color: #FCF6E1;
            box-shadow: 3px 3px 9px #5E6472;
            margin-bottom: 20px;
            transition: 0.3s;

        }

        /* 租借排行 卡片群組 */

        .rental-title-box {
            width: 50%;
        }

        .rental-title {
            height: 315px;
            align-items: center;
            text-align: center;
            /* width: 50%; */
            padding: 1rem;
            margin-top: 25px;
        }

        /* 獎盃TOP1 */
        .trophy-box>img {
            height: 25px;
            padding-right: 10px;
        }

        .trophy-box>.sm-text {
            padding-right: 10px;
        }


        :focus #Heart-2 {
            fill: tomato;
        }
        .card {
            transition: .25s;
        }

        .card:hover {
            box-shadow: 3px 3px 9px #5E6472;
            transform-origin: center;
            transform: scale(1.1);
        }

        footer {
            background: url(./SVG/nav-footer/logo-white-img.svg) center bottom 67px/ 120px auto no-repeat, url(./SVG/nav-footer/mountain01.svg) 2% 0/ 216px auto no-repeat, url(./SVG/nav-footer/mountain02.svg) 31% 9%/ 216px auto no-repeat, url(./SVG/nav-footer/mountain03.svg) right 4% top 9%/ 216px auto no-repeat, url(./SVG/nav-footer/background_1.svg) 0 bottom/ auto 200px repeat-x, #FDFFF8;
        }
        /* main RWD  */
        @media screen and (max-width:575.99px) {
            h1 {
                font-size: 30px;
                font-weight: bold;
                line-height: 36px;
            }

            h2 {
                font-size: 24px;
                font-weight: bold;
                line-height: 30px;
                /* letter-spacing: 10px; */
            }

            h3 {
                font-size: 18px;
                font-weight: bold;
                line-height: 24px;
                /* letter-spacing: 10px; */
            }
            
            p {
                font-size: 14px;
                line-height: 21px;
                /* letter-spacing: 10px; */
            }

            .sm-text {
                font-size: 14px;
                line-height: 18px;
                /* letter-spacing: 10px; */
            }

            .LYC-container {
                padding: 0px 15px;
            }

            /* 裝備小屋 title RWD */
            .page-title-box {
                margin-top: 25px;
                text-align: center;
            }

            /* 租裝備 標題 RWD */

            .title-color {
                padding-left: 33%;
                padding-top: 8%;

            }

            /* 租裝備 RWD */
            .boots-box>img {
                height: 61.73px;
                /* padding-right: 5%; */
            }

            a>h3 {

                text-align: center;
                font-weight: bold;
                margin-top: 40px;
            }

            .water-box>img {
                height: 61.73px;
                padding-left: -10px;

                /* padding-right: 5%; */
            }

            .water-box>h3 {

                text-align: center;
                font-weight: bold;
                margin-top: 40px;

            }

            .other-box>img {
                height: 61.73px;
                /* padding-right: 5%; */
            }

            .other-box>h3 {

                text-align: center;
                font-weight: bold;
                margin-top: 40px;
            }


            /* 買裝備 RWD */

            .title-right {
                margin-top: 10px;
            }

            .title-right-color {
                padding-left: 33%;
                padding-top: 8%;

            }

            .right-boots-box>img {
                height: 61.73px;
                /* padding-right: 5%; */
            }

            .right-boots-box>h3 {

                text-align: center;
                font-weight: bold;
                margin-top: 40px;
            }

            .right-water-box>img {
                height: 61.73px;
                padding-left: -10px;

                /* padding-right: 5%; */
            }

            .right-water-box>h3 {

                text-align: center;
                font-weight: bold;
                margin-top: 40px;

            }

            .right-other-box>img {
                height: 61.73px;
                /* padding-right: 5%; */
            }

            .right-other-box>h3 {

                text-align: center;
                font-weight: bold;
                margin-top: 40px;
            }




            /* 手機板 租借卡片群組title */
            .rental-title-box {
                width: 300px;


            }

            .rental-title {
                vertical-align: baseline;
                align-items: center;
                text-align: center;
                padding: 1px;
                height: 45px;
                margin: 0 auto 10px auto;
                line-height: 40px;
                /* width: 80%; */

            }
            footer {
                height: 166px;
                background: url(./SVG/nav-footer/logo-white-img.svg) center bottom 34px/ 60px auto no-repeat, url(./SVG/nav-footer/mountain01.svg) 2% 5%/ 130px auto no-repeat, url(./SVG/nav-footer/mountain03.svg) right 4% top 9%/ 130px auto no-repeat, url(./SVG/nav-footer/background_1.svg) 0 bottom/ auto 100px repeat-x, #FDFFF8;
            }
            

        }






        
       
    </style>


</head>

<body>
    <?php require_once 'header.php' ?>
    <main>
        <div class="LYC-container">
            <div class="row">
                <div class="col-lg-5 col-sm-1">

                </div>
                <div class="page-title-box col-lg-2 col-sm-2 ">
                    <h1>
                        裝備小屋
                    </h1>
                </div>
                <div class="col-lg-5 col-sm-1">

                </div>
            </div>


            <div class="row justify-content-center" style=" margin-top: 5%">
                <div class="col-12  col-xl-4">
                    <div class="title-left">
                        <div class="title-color">
                            <h1>租
                            </h1>
                            <h2>裝備</h2>
                        </div>
                        <div class="chose-content">


                            <div class="boots-box">

                                <img src="./SVG/hiking-boots.svg" alt="">
                                <a href="eq_house_rent.php?parent_id=17&cat_id=18" style="text-decoration: none; color: black;">
                                    <h3>
                                        山裝備
                                    </h3>
                                </a>
                            </div>

                            <div class="water-box">

                                <img src="./SVG/swim-goggles.svg" alt="">
                                <a href="eq_house_rent.php?parent_id=17&cat_id=19" style="text-decoration: none; color: black;">
                                    <h3>
                                        水裝備
                                    </h3>
                                </a>

                            </div>

                            <div class="other-box">

                                <img src="./SVG/gopro.svg" alt="">
                                <a href="eq_house_rent.php?parent_id=17&cat_id=20" style="text-decoration: none; color: black;">
                                    <h3>
                                        其他裝備</h3>
                                </a>
                            </div>

                        </div>



                    </div>

                </div>


                <div class="col-12   col-xl-4 ">
                    <div class="title-right" style="height: 270px; border: solid #FF9F1C; ">
                        <div class="title-right-color">
                            <h1>買
                            </h1>
                            <h2>
                                裝備
                            </h2>
                        </div>
                        <div class="chose-content">
                            <div class="right-boots-box">
                                <img src="./SVG/hiking-boots.svg" alt="">
                                <a href="eq_house_buy.php?parent_id=21&cat_id=22" style="text-decoration: none; color: black;">
                                    <h3>
                                        山裝備
                                    </h3>
                                </a>
                            </div>
                            <div class="right-water-box">
                                <img src="./SVG/swim-goggles.svg" alt="">
                                <a href="eq_house_buy.php?parent_id=21&cat_id=23" style="text-decoration: none; color: black;">
                                    <h3>
                                        水裝備
                                    </h3>
                                </a>

                            </div>

                            <div class="right-other-box">
                                <img src="./SVG/gopro.svg" alt="">
                                <a href="eq_house_buy.php?parent_id=21&cat_id=24" style="text-decoration: none; color: black;">
                                    <h3>
                                        其他裝備
                                    </h3>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="container mt-5">

                <div class="row">
                    <div class="col-xl-2 col-12 flex-xl-column  flex-row col-xl-2 " style="margin: 0 auto
                    ;">
                        <div class="rental-title-box" style="margin: 0 auto;">
                            <h1 class="rental-title" style="color: #fff;background-color: #B1D660;">
                                租借排行</h1>
                        </div>
                    </div>
                    <div class="col-xl-10 col-12 d-flex flex-wrap" style="max-width: 1900px;">
                        <div class="col-6 col-xl-3" style="width: 300px;">


                            <div class="trophy-box d-flex">
                                <img src="./SVG/獎盃01.svg" alt="">
                                <div class="sm-text">
                                    TOP
                                </div>
                                <div class="sm-text" style="color: #FFC648;">
                                    1</div>

                            </div>




                            <div class="card mt-1 " style="padding-right: 1px ;">
                                <div class="card-top" style="position:relative;">
                                    <!-- 愛心 -->
                                    <a href="" class="liked"><svg style="position:absolute; right: 2px; top: 2%;" xmlns="http://www.w3.org/2000/svg" width="30.37" height="26.114" viewBox="0 0 30.37 26.114">
                                            <g id="Group_875" data-name="Group 875" transform="translate(1 1)">
                                                <g id="Heart" transform="translate(0 0)">
                                                    <path id="Heart-2" data-name="Heart" d="M26.127,2.209a7.829,7.829,0,0,0-10.85,0L14.21,3.237,13.143,2.209a7.829,7.829,0,0,0-10.85,0,7.154,7.154,0,0,0,0,10.451L14.21,24.139,26.127,12.66a7.154,7.154,0,0,0,0-10.451" transform="translate(-0.025 -0.025)" fill="none" stroke="#d7d8d4" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" fill-rule="evenodd" />
                                                </g>
                                            </g>
                                        </svg>
                                    </a>

                                    <img src="./images/bag-blue.jpeg" class="card-img-top" alt="...">
                                </div>
                                <div class="card-body">
                                    <a href="#" style="text-decoration: none; color: black;">
                                        <h5 class="card-title">登山背包【藍】</h5>
                                    </a>
                                    <span class="card-text"><img src="./SVG/stars.svg" alt=""></span>
                                    <span class="card-text">TWD
                                        <span style="color: #FF9F1C; font-weight: bold; font-size: 20px;">600</span></span>
                                </div>
                            </div>


                        </div>
                        <div class="col-6 col-xl-3">
                            <div class="trophy-box d-flex">
                                <img src="./SVG/獎盃0 2.svg" alt="">
                                <div class="sm-text">
                                    TOP
                                </div>
                                <div class="sm-text" style="color: #FFC648;">
                                    2</div>
                            </div>


                            <div class="card mt-1" style="padding-right: 1px;">
                                <div class="card-top" style="position:relative;">
                                    <!-- 愛心 -->
                                    <a href="#" class="liked"><svg style="position:absolute; right: 2px; top: 2%;" xmlns="http://www.w3.org/2000/svg" width="30.37" height="26.114" viewBox="0 0 30.37 26.114">
                                            <g id="Group_875" data-name="Group 875" transform="translate(1 1)">
                                                <g id="Heart" transform="translate(0 0)">
                                                    <path id="Heart-2" data-name="Heart" d="M26.127,2.209a7.829,7.829,0,0,0-10.85,0L14.21,3.237,13.143,2.209a7.829,7.829,0,0,0-10.85,0,7.154,7.154,0,0,0,0,10.451L14.21,24.139,26.127,12.66a7.154,7.154,0,0,0,0-10.451" transform="translate(-0.025 -0.025)" fill="none" stroke="#d7d8d4" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" fill-rule="evenodd" />
                                                </g>
                                            </g>
                                        </svg>
                                    </a>
                                    <img src="./images/sleeping-bag-red.jpg" class="card-img-top" alt="...">
                                </div>
                                <div class="card-body">
                                    <a href="#" style="text-decoration: none; color: black;">
                                        <h5 class="card-title">保暖睡袋【紅】</h5>
                                    </a>
                                    <span class="card-text"><img src="./SVG/stars.svg" alt=""></span>
                                    <span class="card-text">TWD
                                        <span style="color: #FF9F1C; font-weight: bold; font-size: 20px;">245</span></span>
                                </div>
                            </div>

                        </div>
                        <div class="col-6 col-xl-3">
                            <div class="trophy-box d-flex">
                                <img src="./SVG/獎盃03.svg" alt="">
                                <div class="sm-text">
                                    TOP
                                </div>
                                <div class="sm-text" style="color: #FFC648;">
                                    3</div>
                            </div>

                            <div class="card mt-1 " style="padding-right: 1px;">
                                <div class="card-top" style="position:relative;">
                                    <!-- 愛心 -->
                                    <a href="" class="liked"><svg style="position:absolute; right: 2px; top: 2%;" xmlns="http://www.w3.org/2000/svg" width="30.37" height="26.114" viewBox="0 0 30.37 26.114">
                                            <g id="Group_875" data-name="Group 875" transform="translate(1 1)">
                                                <g id="Heart" transform="translate(0 0)">
                                                    <path id="Heart-2" data-name="Heart" d="M26.127,2.209a7.829,7.829,0,0,0-10.85,0L14.21,3.237,13.143,2.209a7.829,7.829,0,0,0-10.85,0,7.154,7.154,0,0,0,0,10.451L14.21,24.139,26.127,12.66a7.154,7.154,0,0,0,0-10.451" transform="translate(-0.025 -0.025)" fill="none" stroke="#d7d8d4" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" fill-rule="evenodd" />
                                                </g>
                                            </g>
                                        </svg>
                                    </a>
                                    <img src="./images/waterproof-bag-blue.jpeg" class="card-img-top" alt="...">
                                </div>
                                <div class="card-body">
                                    <a href="#" style="text-decoration: none; color: black;">
                                        <h5 class="card-title">防水袋【藍色】
                                        </h5>
                                    </a>
                                    <span class="card-text"><img src="./SVG/stars.svg" alt=""></span>
                                    <span class="card-text">TWD
                                        <span style="color: #FF9F1C; font-weight: bold; font-size: 20px;">145</span></span>
                                </div>
                            </div>

                        </div>
                        <div class="col-6 col-xl-3 ">
                            <div class="trophy-box d-flex">
                                <img src="./SVG/獎盃03.svg" alt="" style="visibility: hidden;">
                                <div class="sm-text">
                                    TOP
                                </div>
                                <div class="sm-text " style="color: #FFC648;">
                                    4</div>
                            </div>

                            <div class="card  mt-1 " style="padding-right: 1px;">
                                <div class="card-top" style="position:relative;">
                                    <a href="#" class="liked"><svg style="position:absolute; right: 2px; top: 2%;" xmlns="http://www.w3.org/2000/svg" width="30.37" height="26.114" viewBox="0 0 30.37 26.114">
                                            <g id="Group_875" data-name="Group 875" transform="translate(1 1)">
                                                <g id="Heart" transform="translate(0 0)">
                                                    <path id="Heart-2" data-name="Heart" d="M26.127,2.209a7.829,7.829,0,0,0-10.85,0L14.21,3.237,13.143,2.209a7.829,7.829,0,0,0-10.85,0,7.154,7.154,0,0,0,0,10.451L14.21,24.139,26.127,12.66a7.154,7.154,0,0,0,0-10.451" transform="translate(-0.025 -0.025)" fill="none" stroke="#d7d8d4" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" fill-rule="evenodd" />
                                                </g>
                                            </g>
                                        </svg>
                                    </a>
                                    <img src="./images/hiking-boots-pink.jpg" class="card-img-top" alt="...">
                                </div>
                                <div class="card-body">
                                    <a href="#" style="text-decoration: none; color: black;">
                                        <h5 class="card-title">登山鞋【粉紅】</h5>
                                    </a>
                                    <span class="card-text"><img src="./SVG/stars.svg" alt=""></span>
                                    <span class="card-text">TWD
                                        <span style="color: #FF9F1C; font-weight: bold; font-size: 20px;">1,800</span></span>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

            </div>
            <div class="container mt-5">

                <div class="row">
                    <div class="col-xl-2 col-12 flex-xl-column  flex-row col-xl-2 " style="margin: 0 auto
                    ;">
                        <div class="rental-title-box" style="margin: 0 auto;">
                            <h1 class="rental-title" style="color: #fff;background-color: #FF9F1C;">
                                熱銷排名</h1>
                        </div>
                    </div>
                    <div class="col-xl-10 col-12 d-flex flex-wrap" style="max-width: 1900px;">
                        <div class="col-6 col-xl-3" style="width: 300px;">


                            <div class="trophy-box d-flex">
                                <img src="./SVG/獎盃01.svg" alt="">
                                <div class="sm-text">
                                    TOP
                                </div>
                                <div class="sm-text" style="color: #FFC648;">
                                    1</div>
                            </div>



                            <div class="card mt-1" style="padding-right: 1px">
                                <div class="card-top" style="position:relative;">
                                    <a class="liked" href="#"><svg style="position:absolute; right: 2px; top: 2%;" xmlns="http://www.w3.org/2000/svg" width="30.37" height="26.114" viewBox="0 0 30.37 26.114">
                                            <g id="Group_875" data-name="Group 875" transform="translate(1 1)">
                                                <g id="Heart" transform="translate(0 0)">
                                                    <path id="Heart-2" data-name="Heart" d="M26.127,2.209a7.829,7.829,0,0,0-10.85,0L14.21,3.237,13.143,2.209a7.829,7.829,0,0,0-10.85,0,7.154,7.154,0,0,0,0,10.451L14.21,24.139,26.127,12.66a7.154,7.154,0,0,0,0-10.451" transform="translate(-0.025 -0.025)" fill="none" stroke="#d7d8d4" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" fill-rule="evenodd" />
                                                </g>
                                            </g>
                                        </svg>
                                    </a>
                                    <img src="./images/snorkel-darkblue.jpeg" class="card-img-top" alt="...">
                                </div>
                                <div class="card-body">
                                    <a href="#" style="text-decoration: none; color: black;">
                                        <h5 class="card-title">呼吸管【藍色】</h5>
                                    </a>
                                    <span class="card-text"><img src="./SVG/stars.svg" alt=""></span>
                                    <span class="card-text">TWD
                                    <span style="color: #FF9F1C; font-weight: bold; font-size: 20px;">680</span></span>

                                </div>
                            </div>


                        </div>
                        <div class="col-6 col-xl-3">
                            <div class="trophy-box d-flex">
                                <img src="./SVG/獎盃0 2.svg" alt="">
                                <div class="sm-text">
                                    TOP
                                </div>
                                <div class="sm-text" style="color: #FFC648;">
                                    2</div>
                            </div>


                            <div class="card mt-1" style="padding-right: 1px;">
                                <div class="card-top" style="position:relative;">
                                    <!-- 愛心 -->
                                    <a class="liked" href="#"><svg style="position:absolute; right: 2px; top: 2%;" xmlns="http://www.w3.org/2000/svg" width="30.37" height="26.114" viewBox="0 0 30.37 26.114">
                                            <g id="Group_875" data-name="Group 875" transform="translate(1 1)">
                                                <g id="Heart" transform="translate(0 0)">
                                                    <path id="Heart-2" data-name="Heart" d="M26.127,2.209a7.829,7.829,0,0,0-10.85,0L14.21,3.237,13.143,2.209a7.829,7.829,0,0,0-10.85,0,7.154,7.154,0,0,0,0,10.451L14.21,24.139,26.127,12.66a7.154,7.154,0,0,0,0-10.451" transform="translate(-0.025 -0.025)" fill="none" stroke="#d7d8d4" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" fill-rule="evenodd" />
                                                </g>
                                            </g>
                                        </svg>
                                    </a>
                                    <img src="./images/water-proof-top.jpeg" class="card-img-top" alt="...">
                                </div>
                                <div class="card-body">
                                    <a href="#" style="text-decoration: none; color: black;">
                                        <h5 class="card-title">防曬衝浪水母衣</h5>
                                    </a>
                                    <span class="card-text"><img src="./SVG/stars.svg" alt=""></span>
                                    <span class="card-text">TWD
                                        <span style="color: #FF9F1C; font-weight: bold; font-size: 20px;">399</span></span>
                                </div>
                            </div>

                        </div>
                        <div class="col-6 col-xl-3">
                            <div class="trophy-box d-flex">
                                <img src="./SVG/獎盃03.svg" alt="">
                                <div class="sm-text">
                                    TOP
                                </div>
                                <div class="sm-text" style="color: #FFC648;">
                                    3</div>
                            </div>

                            <div class="card mt-1" style="padding-right: 1px;">
                                <div class="card-top" style="position:relative;">
                                    <!-- 愛心 -->
                                    <a class="liked" href="#"><svg style="position:absolute; right: 2px; top: 2%;" xmlns="http://www.w3.org/2000/svg" width="30.37" height="26.114" viewBox="0 0 30.37 26.114">
                                            <g id="Group_875" data-name="Group 875" transform="translate(1 1)">
                                                <g id="Heart" transform="translate(0 0)">
                                                    <path id="Heart-2" data-name="Heart" d="M26.127,2.209a7.829,7.829,0,0,0-10.85,0L14.21,3.237,13.143,2.209a7.829,7.829,0,0,0-10.85,0,7.154,7.154,0,0,0,0,10.451L14.21,24.139,26.127,12.66a7.154,7.154,0,0,0,0-10.451" transform="translate(-0.025 -0.025)" fill="none" stroke="#d7d8d4" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" fill-rule="evenodd" />
                                                </g>
                                            </g>
                                        </svg>
                                    </a>
                                    <img src="./images/wram-hat-dark-blue.jpg" class="card-img-top" alt="...">
                                </div>
                                <div class="card-body">
                                    <a href="#" style="text-decoration: none; color: black;">
                                        <h5 class="card-title">保暖帽【深藍】</h5>
                                    </a>
                                    <span class="card-text"><img src="./SVG/stars.svg" alt=""></span>
                                    <span class="card-text">TWD
                                        <span style="color: #FF9F1C; font-weight: bold; font-size: 20px;">490</span></span>
                                </div>
                            </div>

                        </div>
                        <div class="col-6 col-xl-3">
                            <div class="trophy-box d-flex">
                                <img src="./SVG/獎盃03.svg" alt="" style="visibility: hidden;">
                                <div class="sm-text">
                                    TOP
                                </div>
                                <div class="sm-text" style="color: #FFC648;">
                                    4</div>
                            </div>

                            <div class="card mt-1" style="padding-right: 1px;">
                                <div class="card-top" style="position:relative;">
                                    <!-- 愛心 -->
                                    <a class="liked" href="#"><svg style="position:absolute; right: 2px; top: 2%;" xmlns="http://www.w3.org/2000/svg" width="30.37" height="26.114" viewBox="0 0 30.37 26.114">
                                            <g id="Group_875" data-name="Group 875" transform="translate(1 1)">
                                                <g id="Heart" transform="translate(0 0)">
                                                    <path id="Heart-2" data-name="Heart" d="M26.127,2.209a7.829,7.829,0,0,0-10.85,0L14.21,3.237,13.143,2.209a7.829,7.829,0,0,0-10.85,0,7.154,7.154,0,0,0,0,10.451L14.21,24.139,26.127,12.66a7.154,7.154,0,0,0,0-10.451" transform="translate(-0.025 -0.025)" fill="none" stroke="#d7d8d4" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" fill-rule="evenodd" />
                                                </g>
                                            </g>
                                        </svg>
                                    </a>
                                    <img src="./images/gopro.jpg" class="card-img-top" alt="...">
                                </div>
                                <div class="card-body">
                                    <a style="text-decoration: none; color: black;">
                                    <h5 class="card-title d-none d-xl-flex">GoPro HERO9 Black </h5>

                                        <h5 class="card-title d-flex d-xl-none">GoPro Black </h5>

                                    </a>
                                    <span class="card-text"><img src="./SVG/stars.svg" alt=""></span>
                                    <span class="card-text">TWD
                                        <span style="color: #FF9F1C; font-weight: bold; font-size: 20px;">13,888</span></span>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </div>

    </main>
    <footer >
       
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

    <script src="./js/header.js"></script>
    <script>
        $('a.liked').click(function(event) {
            event.preventDefault();
            console.log('hi');
        });
    </script>
</body>





</html>