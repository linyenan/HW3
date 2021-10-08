<?php require_once 'db.inc.php' ?>
<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>1+1+1_index</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />
    <link rel="stylesheet" href="./reset.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="jquery-2.1.4.js"></script>
    <link rel="stylesheet" href="./header.css">
    <link rel="stylesheet" href="./nav-footer.css">


    <style>
        /*herosection */
        .herosection {
            text-align: center;
            background-image: url(./images/90263182_3878137128893635_2715412224431620096_n\ .jpg);
            background-size: cover;
            width: 100%;
            height: 100vh;
            background-position: center center;
            display: flex;
            justify-content: center;
            align-items: center;

        }

        .content {

            line-height: 10vh;
            /* padding: 300px;
            padding-left: auto;
            padding-left: auto; */

        }

        .content_box {
            background-color: rgba(255, 255, 255, 0.349);
            text-align: center;
            width: 288px;
            height: 288px;
            border: #fff 15px solid;
            /* margin: 0 auto 0 auto; */
            line-height: 270px;


        }

        .content_box>h1 {
            font-size: 72px;
            color: white;
            font-weight: bold;
            text-shadow: 2px 2px 7px #111111;
            padding-top: 75px;


        }



        .content>p {
            color: #fff;
            font-weight: bold;
            font-size: 36px;
            text-shadow: 2px 2px 7px #111111;
        }

        .up-img>img {
            height: 249px;

        }

        @media screen and (max-width:575.99px) {
            /* .main {
                height: 844px;
            } */

            .herosection {
                height: 844px;
            }

            .content_box {

                width: 128px;
                height: 128px;
                border: #fff 5px solid;
                /* margin: 0 auto 0 auto; */
                line-height: 44px;


            }

            .content_box>h1 {
                font-size: 30px;
                padding-top: 40px;
            }

            .content>p {
                font-size: 18px;
            }
        }

        /*herosection end */

        /* secsection start */
        .secsection {
            padding: 0 80px 0 80px;
            background-size: contain;
            z-index: 0;
            /* height: 240px; */

        }

        .secsection.row {
            padding-top: 10px;
            display: flex;
        }

        .left_content>img {
            height: 600px;
            display: flex;
        }



        .mid_content {
            padding-left: 175px;
        }


        .title_lyc>h1 {
            writing-mode: vertical-lr;
            font-size: 48px;
            color: #fff;
            font-weight: bold;
            text-orientation: upright;
            letter-spacing: 10px;
            padding: 152px 100px 60px 0px;

        }

        hr {
            border: 0;
            border-top: 3px solid rgba(255, 255, 255);

        }

        .center_content {
            padding-top: 290px;
        }


        .top>img {
            height: 176px;
            padding-right: 10rem;
            display: flex;
        }

        .md {
            display: flex;
            font-size: 48px;
            font-weight: bold;
            color: white;
        }

        .mt {
            padding-left: 1rem;
        }

        .plus {
            padding: 0 6rem 0 6rem;

        }

        .bt {
            display: flex;
            padding-top: 4rem;
        }

        .left {
            font-size: 18px;
            padding-left: 1rem;
            color: white;
            line-height: 28px;
            height: 66px;
            width: 489px;
        }

        .right {
            padding-left: 10rem;
        }

        .right a .start_btn {
            background-color: #FF9F1C;
            color: white;
            width: 200px;
            height: 60px;
            font-size: 18px;
            font-weight: bold;
            box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.178);
        }

        .right a .start_btn {
            background-color: #E89018;
            color: white;
            /* margin-top: -20px; */
            transition: 0.3s;

        }

        .right_content>img {
            height: 600px;
        }





        /* secsection RWD*/
        @media screen and (max-width:575.99px) {
            .secsection {
                height: 249px;
                padding: 0px;
                display: flex;
                width: 100%;
            }

            .secsection.row {
                padding-top: 10px;

            }

            .left_content>img {
                height: 200px;
            }

            .mid_content {
                padding-left: 0px;
            }

            .title_lyc>h1 {
                font-size: 18px;
                padding: 20px 0px 70px 0px;
                line-height: 26px;
            }

            hr {
                display: none;
            }

            .center_content {
                padding-top: 30px;
                /* padding-left: 10px; */
                width: 281px;


            }

            .top>img {
                height: 75px;
                padding-right: 1rem;
                display: flex;
            }

            .md {
                display: flex;
                font-size: 18px;
                font-weight: bold;
                color: white;
            }

            .mt {
                padding-left: 1rem;
            }

            .plus {
                padding: 0 1rem 0 1rem;

            }

            .bt {
                padding-top: 15px;
                display: block;

            }

            .left {
                font-size: 12px;
                color: white;
                line-height: 18px;
                width: 164px;
                /* padding-left: 50px; */


            }

            .left>p {
                /* overflow: hidden; */
                white-space: nowrap;
                text-overflow: ellipsis;
                /* display: -webkit-box; */
                -webkit-line-clamp: 2;
                -webkit-box-orient: vertical;
                white-space: normal;
                /* margin-left: 20px; */
                width:230px;

            }

            .right {
                padding-left: 2.3rem;
            }

            .start_btn {
                background-color: #FF9F1C;
                color: white;
                width: 180px;
                height: 40px;
                font-size: 14px;
                font-weight: bold;
                box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.178);
                margin-top:20px;

            }

            .right a:hover{
                background-color: #E89018;
                color: white;
                margin-top: -20px;
                transition: 0.3s;
            }

            .right_content>img {
                display: none;
            }
        }

        /*footer */
        footer {
            height: 300px;
            width: 100%;
            background: url(./SVG/footer-mountain/background_1.svg);
            position: relative;
            display: grid;
            place-content: center;
            place-items: center;
            margin-top: 100px;

        }



        img.footer-logo {
            width: 120px;
        }

        .mountain1,
        .mountain2,
        .mountain3 {
            position: absolute;
            width: 216px;
        }

        .mountain1 {
            top: -34%;
            left: 1%;
        }

        .mountain2 {
            top: -13%;
            left: 31%;
        }

        .mountain3 {
            top: -13%;
            right: 4%;
        }

        @media screen and (max-width:575.99px) {
            footer {
                height: 100px;
            }

            footer.sea {
                height: 100px;
                background: url(./SVG/mobile-sea-footer.svg) 0 bottom repeat-x;
            }

            img.footer-logo {
                width: 60px;
            }

            .mountain1 {
                width: 130px;
                top: -62%;
            }

            .mountain2 {
                display: none;
            }

            .mountain3 {
                width: 130px;
                top: -39%;
            }
        }
    </style>


</head>

<body>
    <?php require_once 'header.php' ?>


    <div class="container_LYC">
        <main style="background-color: #01BBE8;">
            <div class="herosection ">
                <div class="content ">
                    <div class="content_box">
                        <h1>1+1+1</h1>
                    </div>
                    <p>寶島大師就是你!</p>
                </div>

            </div>
            <!-- secsection -->
            <div class="secsection">
                <div class="row justify-content-between">
                    <div class="left_content">
                        <img src="./SVG/1+1+1_img.svg" alt="">
                    </div>
                    <div class="mid_content">
                        <div class="title_lyc">
                            <h1>
                                1+1+1
                            </h1>

                        </div>
                        <hr>
                    </div>
                    <div class="center_content">
                        <div class="top" style="display: flex;">
                            <img src="./SVG/mountain-small.svg" alt="">
                            <img src="./SVG/swimming-img_1.svg" alt="">
                            <img src="./SVG/train-img_1.svg" alt="">
                        </div>
                        <div class="md">
                            <p class="mt">登玉山</p>
                            <p class="plus">+</p>
                            <p class="sunmoon">日月潭</p>
                            <p class="plus">+</p>
                            <p class="island">環島</p>

                        </div>
                        <div class="bt">
                            <div class="left">
                                <p>
                                網路上有流傳著這麼一個說法，台灣人必須完成三件事「登玉山、泳渡日月潭、單車環島」，但為什麼要完成這三件事，你有想過嗎？
                                </p>
                            </div>
                            <div class="right">
                                <a href="./1+1+1_details.php">
                                    <button type="button" class="start_btn">
                                        立即出發</button>
                                </a>
                            </div>

                        </div>

                    </div>
                    <div class="right_content">
                        <img src="./SVG/1+1+1_img.svg" alt="">
                    </div>


                </div>


            </div>
            <footer>
                <img src=" ./SVG/logo-white-img.svg" alt="" class="footer-logo">
                <img src="./SVG/footer-mountain/mountain01.svg" alt="" class="mountain1">
                <img src="./SVG/footer-mountain/mountain02.svg" alt="" class="mountain2">
                <img src="./SVG/footer-mountain/mountain03.svg" alt="" class="mountain3">
            </footer>
        </main>

    </div>

    <script src="./js/jquery-3.6.0.js"></script>
    <script src="./js/header.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>



</body>

</html>