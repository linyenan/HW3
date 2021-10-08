<?php require_once 'db.inc.php' ?>
<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./CSS_LBD/reset.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./gototop.css">
    <link rel="stylesheet" href="./header.css">
    <link rel="stylesheet" href="./nav-footer.css">
    <style>
        /* ---------------------------------------------------------------- */
        body {
            background-color: #FDFFF8;
            font-family: 'Noto Sans TC', sans-serif;
        }

        .container {
            max-width: 1640px;
        }

        /* ----------------------滾動浮現------------------------------------------ */
        .scroll {
            transform: translateY(200px);
            opacity: 0;
            transition: 1s;
        }

        .scroll.show {
            transform: translateY(0px);
            opacity: 1;
        }

        /* ---------------------------------------------------------------- */
        .mask {
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            opacity: 0;
            background-color: rgba(0, 0, 0, 0.4);
            transition: all 0.6s ease;
            color: #fafafa;
            padding: 50px;
            overflow: hidden;
        }

        .mask:hover {
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 12px;
            opacity: 1;
            background-color: rgba(0, 0, 0, 0.4);
            transition: all 0.6s ease;
            color: #fafafa;
            padding: 50px;
            overflow: hidden;
        }

        .mask_mob {
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            opacity: 0;
            background-color: rgba(0, 0, 0, 0.4);
            transition: all 0.6s ease;
            color: #fafafa;
            padding: 15px 10px;
            overflow: hidden;
        }

        .mask_mob:hover {
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            opacity: 1;
            background-color: rgba(0, 0, 0, 0.4);
            transition: all 0.6s ease;
            color: #fafafa;
            padding: 15px 10px;
            overflow: hidden;
        }

        /* --------------------探索-------------------------------------------- */
        .caption-style {
            list-style-type: none;
            margin: 0px;
            padding: 0px;
        }

        .caption-style li {
            float: left;
            padding: 0px;
            position: relative;
            overflow: hidden;
        }

        .caption-style li:hover .caption {
            opacity: 1;
        }

        .caption-style li:hover img {
            opacity: 1;
            transform: scale(1.15, 1.15);
        }

        .caption-style img {
            margin: 0px;
            padding: 0px;
            float: left;
            z-index: 4;
        }

        .caption-style .caption {
            cursor: pointer;
            position: absolute;
            opacity: 0;
            transition: all 0.45s ease-in-out;
        }

        .caption-style img {
            transition: all 0.25s ease-in-out;
        }

        .caption-style .blur {
            background-color: rgba(0, 0, 0, 0.65);
            height: 690px;
            width: 540px;
            z-index: 5;
            position: absolute;
        }

        .caption-style .caption-text h1 {
            text-transform: uppercase;
            font-size: 24px;
            border-bottom: 1px solid;
            width: 300px;
        }

        .caption-style .caption-text {
            z-index: 10;
            color: #fff;
            position: absolute;
            top: 80px;
            left: 100px;
            width: 400px;
            height: 300px;
        }

        @media (max-width:800px) {
            .mt-900 {
                margin-top: 900px;
            }
        }
    </style>
</head>

<body>

    <?php require_once 'header.php' ?>

    <div class="container">
        <div class="row herosection d-none d-xl-block">
            <img src="./images_LBD/l-4.jpg" alt="" style="position: relative;">
            <div style="position: absolute; top: 250px; left: 1400px; background-color: #cfd0d28c; font-size: 36px; width: 95px; height: 440px">
                <p style="text-align: center; align-items: center; margin-top: 40px">煙雨飄渺的景色</p>
            </div>
            <div style="position: absolute; top: 388px; left: 1516px; background-color: #cfd0d28c; font-size: 36px; width: 95px; height: 400px">
                <p style="text-align: center; align-items: center; margin-top: 40px">美得讓人屏息</p>
            </div>
        </div>
        <div class="row herosection d-block d-xl-none">
            <p style="color: #ADE8F4; font-size: 30px; font-weight: bold; text-align: center; margin-top: 10px;">泳渡日月潭</p>
            <img src="./images_LBD/l-4.jpg" alt="" style="position: relative;">
            <div style="position: absolute; top: 140px; left: 250px; background-color: #cfd0d28c; font-size: 18px; width: 45px; height: 220px">
                <p style="text-align: center; align-items: center; margin-top: 20px">煙雨飄渺的景色</p>
            </div>
            <div style="position: absolute; top: 130px; left: 300px; background-color: #cfd0d28c; font-size: 18px; width: 45px; height: 200px">
                <p style="text-align: center; align-items: center; margin-top: 20px">美得讓人屏息</p>
            </div>
        </div>

        <div class="row section_1 d-none d-xl-block d-xl-flex scroll" style="margin-top: 200px">
            <div class="col-2">
                <div style="width: 50px; border-bottom: 3px solid #000000; padding-right: 100px; position: relative;">
                    <h1 style="color: #ADE8F4">最大的淡水湖</h1>
                    <h1 style="color: #ADE8F4; position: absolute; top: 144px; left: 50px;">日月潭</h1>
                    <img src="./SVG_LBD/logo_lake.svg" alt="" style="position: absolute; top: 80px; left: 80px;">
                </div>
                <p class="mt-3">Sunmoon lake</p>
            </div>
            <div class="col-10" style="position: relative;">
                <div>
                    <img src="./images_LBD/l-2.jpg" alt="" style="width: 100%;">
                </div>
                <div class="p-3" style="width: 812px; height: 202px; background-color: #ffffff; position: absolute; top: 740px; left: 544px; font-size: 18px; border: 1px solid;">
                    <p style="margin-top: 15px; line-height: 28px; letter-spacing: 2px;">日月潭為台灣最大淡水湖泊、也是最美的高山湖泊。<br><br>雨天的日月潭，山湖皆覆上一層透白的霧氣，煙雨飄渺的樣子根本一幅山水畫；晴天的日月潭，湖面乾淨的像一面鏡子，將所有景色倒映在水中，藍天白雲配上壯闊的山景，美得跟明信片一樣無懈可擊。</p>
                </div>
            </div>
        </div>
        <div class="row section_1 d-block d-xl-none scroll" style="margin-top: 150px; position: relative;">
            <div class="col-2" style="position: absolute; top: -70px; z-index: 99999; background-color: #fdfff88f; width: 130px;">
                <div style="width: 50px; border-bottom: 3px solid #000000; padding-right: 100px;">
                    <h1 style="color: #ADE8F4; font-size: 24px">最大的淡水湖</h1>
                    <h1 style="color: #ADE8F4; position: absolute; top: 83px; left: 50px; font-size: 24px; width: 10px;">日月潭</h1>
                    <img src="./SVG_LBD/logo_lake.svg" alt="" style="position: absolute; top: 70px; left: 80px; width: 26px;">
                </div>
                <p class="mt-3" style="font-size: 9px;">Sunmoon lake</p>
            </div>
            <div class="col-xl-10" style="position: relative;">
                <div>
                    <img src="./images_LBD/l-2.jpg" alt="" style="width: 100%; margin-top: 50px;">
                </div>
                <div class="p-3" style="width: 318px; height: 180px; background-color: #ffffff; position: absolute; top: 250px; left: 38px; font-size: 12px; border: 1px solid;">
                    <p style="letter-spacing: 2px;">日月潭為台灣最大淡水湖泊、也是最美的高山湖泊。<br><br>雨天的日月潭，山湖皆覆上一層透白的霧氣，煙雨飄渺的樣子根本一幅山水畫；晴天的日月潭，湖面乾淨的像一面鏡子，將所有景色倒映在水中，藍天白雲配上壯闊的山景，美得跟明信片一樣無懈可擊。</p>
                </div>
            </div>
        </div>

        <div class="row section_2 d-none d-xl-block d-xl-flex scroll" style="margin-top: 200px">
            <div class="col-2">
                <div style="width: 50px; border-bottom: 3px solid #000000; padding-right: 100px;">
                    <h1 style="color: #ADE8F4">橫渡日月潭</h1>
                </div>
                <p class="mt-3">Across</p>
                <img src="./SVG-LBD/lake.svg" alt="">
            </div>
            <div class="col-10" style="position: relative;">
                <div>
                    <img src="./images_LBD/l-5.jpg" alt="" style="width: 100%;">
                </div>
                <div class="p-3" style="width: 812px; height: 202px; background-color: #ffffff; position: absolute; top: 800px; left: 150px; font-size: 18px; border: 1px solid;">
                    <p style="margin-top: 27px; line-height: 28px; letter-spacing: 2px;">自1983年開始，每年日月潭都會舉辦泳渡日月潭的活動，全程大約3000公尺，更於2002年正式列入世界游泳名人堂，每年都會吸引數萬人來此，變成一個「萬人泳渡日月潭」的嘉年華聖事。有別於站在岸邊觀看美景，這個活動可以讓你以輕鬆慢游的方式，於湖中360度觀看日月潭的湖光山色。</p>
                </div>
                <a href="./journey_sunmoonlake_detail .php">
                    <button class="btn btn-warning" style="background-color: #FF9F1C; width: 200px; height: 60px; position: absolute; top: 942px; left: 850px; color: #ffffff;">點我立刻出發！</button>
                </a>
            </div>
        </div>
        <div class="row section_2 d-block d-xl-none scroll" style="margin-top: 250px; position: relative;">
            <div class="col-2" style="position: absolute; top: -70px; z-index: 99999; background-color: #fdfff88f; width: 100px;">
                <div style="width: 50px; border-bottom: 3px solid #000000; padding-right: 50px;">
                    <h1 style="color: #ADE8F4; font-size: 24px; line-height: 30px;">橫渡日月潭</h1>
                </div>
                <p class="mt-3" style="font-size: 9px;">Across</p>
                <img src="./SVG_LBD/lake.svg" alt="" style="width: 74px; position: absolute; top: 100px; left: 40px;">
            </div>
            <div class="col" style="position: relative;">
                <div>
                    <img src="./images_LBD/l-5.jpg" alt="" style="width: 100%; margin-top: 50px;">
                </div>
                <div class="p-3" style="width: 318px; height: 160px; background-color: #ffffff; position: absolute; top: 250px; left: 38px; font-size: 12px; border: 1px solid;">
                    <p style="letter-spacing: 2px;">自1983年開始，每年日月潭都會舉辦泳渡日月潭的活動，全程大約3000公尺，更於2002年正式列入世界游泳名人堂，每年都會吸引數萬人來此，變成一個「萬人泳渡日月潭」的嘉年華聖事。有別於站在岸邊觀看美景，這個活動可以讓你以輕鬆慢游的方式，於湖中360度觀看日月潭的湖光山色。</p>
                </div>
                <a href="./journey_sunmoonlake_detail .php">
                    <button class="btn btn-warning" style="background-color: #FF9F1C; width: 180px; height: 40px; position: absolute; top: 395px; left: 200px; color: #ffffff;">點我立刻出發！</button>
                </a>
            </div>
        </div>

        <div class="row section_3 d-none d-xl-block d-xl-flex scroll" style="margin-top: 300px">
            <div class="col-2">
                <div style="width: 50px; border-bottom: 3px solid #000000; padding-right: 100px;">
                    <h1 style="color: #ADE8F4">自行車環湖</h1>
                </div>
                <p class="mt-3">Route map</p>
            </div>
            <div class="col-10" style="position: relative;">
                <div>
                    <img src="./images_LBD/l-6.jpg" alt="" style="width: 100%;">
                </div>
                <div class="p-3" style="width: 812px; height: 202px; background-color: #ffffff; position: absolute; top: 580px; left: -250px; font-size: 18px; border: 1px solid;">
                    <p style="margin-top: 30px; line-height: 28px; letter-spacing: 2px;">也可以選擇騎乘自行車環湖。環潭公路路線隨地勢起伏稍具挑戰性，適合熱愛自我挑戰的你；另外，喜愛悠閒步調的遊客則可選擇騎乘短距離的自行車道追風；而擁有高低起伏丘陵的埔里鎮，每一條自行車道都是自我的挑戰，蜿蜒的公路與綿延的山景相互輝映，還可登高一探金龍山的絕美日出。</p>
                </div>
            </div>
        </div>
        <div class="row section_3 d-block d-xl-none scroll" style="margin-top: 250px; position: relative;">
            <div class="col-2" style="position: absolute; top: -70px; z-index: 99999; background-color: #fdfff88f; width: 100px;">
                <div style="width: 50px; border-bottom: 3px solid #000000; padding-right: 85px;">
                    <h1 style="color: #ADE8F4; font-size: 24px; line-height: 30px;">自行車環湖</h1>
                </div>
                <p class="mt-3" style="font-size: 9px;">Route map</p>
                <img src="./SVG_LBD/eq_bike.svg" alt="" style="width: 60px; position: absolute; top: 120px; left: 40px;">
            </div>
            <div class="col" style="position: relative;">
                <div>
                    <img src="./images_LBD/l-6.jpg" alt="" style="width: 100%; margin-top: 50px;">
                </div>
                <div class="p-3" style="width: 318px; height: 160px; background-color: #ffffff; position: absolute; top: 250px; left: 38px; font-size: 12px; border: 1px solid;">
                    <p style="letter-spacing: 2px;">也可以選擇騎乘自行車環湖。環潭公路路線隨地勢起伏稍具挑戰性，適合熱愛自我挑戰的你；另外，喜愛悠閒步調的遊客則可選擇騎乘短距離的自行車道追風；而擁有高低起伏丘陵的埔里鎮，每一條自行車道都是自我的挑戰，蜿蜒的公路與綿延的山景相互輝映，還可登高一探金龍山的絕美日出。</p>
                </div>
            </div>
        </div>

        <div class="row section_4 d-none d-xl-block d-xl-flex scroll" style="margin-top: 200px">
            <div class="col-2">
                <div style="width: 50px; border-bottom: 3px solid #000000; padding-right: 100px;">
                    <h1 style="color: #ADE8F4">推薦裝備</h1>
                </div>
                <p class="mt-3">Equipment</p>
            </div>
            <div class="col-10" style="position: relative;">
                <div class="row">
                    <div class="col-6">
                        <img src="./SVG_LBD/eq_clothes.svg" alt="">
                    </div>
                    <div class="col-6">
                        <div>
                            <h2 style="padding-left: 170px; padding-top: 50px;">工欲善其事 <br> &emsp;&emsp;必先利其器</h2>
                        </div>
                        <div class="p-3" style="width: 600px; height: 300px; background-color: #ffffff; font-size: 18px; border: 1px solid;">
                            <p style="margin-top: 30px; line-height: 28px; letter-spacing: 2px;">千萬不要因為最近登山健行風氣興盛、或是一聽到〝必做〞兩個字就殺去爬山。登山是一個人人都可以參與的活動，但也是有危險性的活動，一定要做好事前準備，才能快樂上山、平安回家。
                                <br><br>兩三千公尺的大山實在太難挑戰，沒關係，登山新手能從周邊的郊山開始，一樣能看見不同的台灣之美，鍛練好身體再一步步挑戰台灣百岳。
                            </p>
                        </div>
                        <a href="eq_house_buy.php?parent_id=21&cat_id=23">
                            <button class="btn btn-warning" style="color:white;background-color: #FF9F1C; width: 200px; height: 60px; margin-top: 50px;">查看更多裝備</button>

                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row section_4 d-block d-xl-none scroll" style="margin-top: 200px">
            <div class="col-12">
                <div style="width: 50px; border-bottom: 3px solid #000000; padding-right: 100px;">
                    <h1 style="color: #ADE8F4; font-size: 24px; line-height: 30px;">推薦裝備</h1>
                </div>
                <p class="mt-3" style="font-size: 9px;">Equipment</p>
            </div>
            <div class="col-12" style="position: relative;">
                <div class="row">
                    <div class="col-12">
                        <img src="./SVG_LBD/eq_clothes.svg" alt="" style="width: 150px; position: absolute; top: -200px; left: 200px;">
                    </div>
                    <div class="col-12">
                        <div class="p-3" style="margin-top: 100px; width: 366px; height: 180px; background-color: #ffffff; font-size: 12px; border: 1px solid;">
                            <p style="letter-spacing: 2px;">千萬不要因為最近登山健行風氣興盛、或是一聽到〝必做〞兩個字就殺去爬山。登山是一個人人都可以參與的活動，但也是有危險性的活動，一定要做好事前準備，才能快樂上山、平安回家。
                                <br><br>兩三千公尺的大山實在太難挑戰，沒關係，登山新手能從周邊的郊山開始，一樣能看見不同的台灣之美，鍛練好身體再一步步挑戰台灣百岳。
                            </p>
                        </div>
                        <a href="eq_house_buy.php?parent_id=21&cat_id=23">
                            <button class="btn btn-warning" style="background-color: #FF9F1C; width: 180px; height: 40px; margin-top: 50px; color: #ffffff; position: absolute; top: 0">查看更多裝備</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row section_4_1 d-none d-xl-block d-xl-flex" style="align-items: center;">
            <div class="col-2">
                <img src="./SVG_LBD/eq_sandals.svg" alt="">
            </div>
            <div class="col-2">
                <img src="./SVG_LBD/eq_goggles.svg" alt="">
            </div>
            <div class="col-2">
                <img src="./SVG_LBD/eq_bike.svg" alt="">
            </div>
            <div class="col-2">
                <img src="./SVG_LBD/eq_bag.svg" alt="">
            </div>
            <div class="col-2" style="display: flex;">
                <img src="./SVG_LBD/eq_board.svg" alt="" style="margin: 0 auto;">
            </div>
            <div class="col-2">
                <img src="./SVG_LBD/eq_gopro.svg" alt="">
            </div>
        </div>
        <div class="row section_4_1 d-block d-flex d-xl-none" style="text-align: center;">
            <div class="col-6" style="margin-top: 40px;">
                <img src="./SVG_LBD/eq_bike.svg" alt="" style="width: 130px;">
            </div>
            <div class="col-6 mt-2">
                <img src="./SVG_LBD/eq_bag.svg" alt="" style="width: 150px; height: 150px;">
            </div>
            <div class="col-6 mt-4">
                <img src="./SVG_LBD/eq_board.svg" alt="" style="width: 80px;">
            </div>
            <div class="col-6 mt-2">
                <img src="./SVG_LBD/eq_gopro.svg" alt="" style="width: 150px;">
            </div>
            <div class="col-6 mt-2">
                <img src="./SVG_LBD/eq_sandals.svg" alt="" style="width: 120px;">
            </div>
            <div class="col-6 mt-2" style="padding-top: 20px;">
                <img src="./SVG_LBD/eq_goggles.svg" alt="" style="width: 150px;">
            </div>
        </div>

        <div class="row section_5 d-none d-xl-block d-xl-flex scroll">
            <div class="col" style="position: relative;">
                <div style="width: 320px; margin: 0 auto;">
                    <span style="color: #ADE8F4; font-size: 40px; font-weight: 500;">心得分享</span>
                    <img src="./SVG_LBD/island.svg" alt="">
                </div>
                <div style="border-top: 3px solid #000000; width: 320px; position: absolute; top: 140px; left: 640px;">
                    <p class="mt-3" style="padding-left: 120px;">Experience</p>
                </div>
            </div>
        </div>
        <div class="row section_5 d-block d-xl-none scroll">
            <div class="col" style="position: relative;">
                <div style="margin: 0 auto; text-align: center;">
                    <span style="color: #ADE8F4; font-size: 24px; font-weight: 500;">心得分享</span>
                    <img src="./SVG_LBD/island.svg" alt="" style="width: 56px;">
                </div>
                <div style="border-top: 3px solid #000000; width: 160px; position: absolute; top: 55px; left: 110px;">
                    <p class="mt-3" style="padding-left: 40px;">Experience</p>
                </div>
            </div>
        </div>

        <div class="row section_5_1 d-none d-xl-block d-xl-flex scroll" style="margin-top: 50px">
            <div class="col-3" style=" position: relative;">
                <a href="#">
                    <img src="./images_LBD/l-10.jpg" alt="" style="width: 410px; height: 320px;">
                    <div class="mask">
                        <img src="./SVG_LBD/star.svg" alt="" style="width: 120px;">
                        <p style="margin-top: 30px;">遊艇做起來快又穩，不用開車就能透過搭船的方式往來三個位置，而且乘船班次相當多，不僅相當方便也非常省時間。是個小孩老人也都能參與的行程，非常棒!再搭配上周邊景點例如車埕或是埔里，安排個1～2日遊的放鬆漫遊行程，都是不錯的選擇。</p>
                    </div>
                </a>
            </div>
            <div class="col-3" style=" position: relative;">
                <a href="#">
                    <img src="./images_LBD/l-14.jpg" alt="" style="width: 410px; height: 320px;">
                    <div class="mask">
                        <img src="./SVG_LBD/star.svg" alt="" style="width: 120px;">
                        <p style="margin-top: 30px;">很久沒有去日月潭了，因為是搭台灣好行前往，所以選擇搭船遊覽各個碼頭，從水社廣場走到換票處約3分鐘，換票後再步行2分鐘到碼頭搭船，有提供地圖跟時刻表很方便，船班大概間距半小時，搭乘者不多，所以有包船的感覺。</p>
                    </div>
                </a>
            </div>
            <div class="col-3" style=" position: relative;">
                <a href="#">
                    <img src="./images_LBD/l-11.jpg" alt="" style="width: 410px; height: 320px;">
                    <div class="mask">
                        <img src="./SVG_LBD/star.svg" alt="" style="width: 120px;">
                        <p style="margin-top: 30px;">日月潭風景秀麗水社碼頭週邊和伊達邵商店老街有很多餐廳和手工藝品店，非常值得用餐和購買手工藝品、原住民釀造的小米酒。</p>
                    </div>
                </a>
            </div>
            <div class="col-3" style=" position: relative;">
                <a href="#">
                    <img src="./images_LBD/l-7.jpg" alt="" style="width: 410px; height: 320px;">
                    <div class="mask">
                        <img src="./SVG_LBD/star.svg" alt="" style="width: 120px;">
                        <p style="margin-top: 30px;">環境美氣氛佳，日月潭水位雖下降不少，但還是很美～我們坐在室外的座位，船上很乾淨，整體感覺很舒服。</p>
                    </div>
                </a>
            </div>
            <div class="col-3" style=" position: relative;">
                <a href="#">
                    <img src="./images_LBD/l-12.jpg" alt="" style="width: 410px; height: 320px;">
                    <div class="mask">
                        <img src="./SVG_LBD/star.svg" alt="" style="width: 120px;">
                        <p style="margin-top: 30px;">這次搭船遊日月譚體驗很好，一路上的風景很好 天氣也不錯，希望下次還有機會可以搭乘這艘船，分享給想來日月潭的人。</p>
                    </div>
                </a>
            </div>
            <div class="col-3" style=" position: relative;">
                <a href="#">
                    <img src="./images_LBD/l-13.jpg" alt="" style="width: 410px; height: 320px;">
                    <div class="mask">
                        <img src="./SVG_LBD/star.svg" alt="" style="width: 120px;">
                        <p style="margin-top: 30px;">三個碼頭都能兌換船票，雖然平日班次較少，但工作人員指示清楚，船上有工作人員導覽，環境乾淨整潔，整體cp值高。</p>
                    </div>
                </a>
            </div>
            <div class="col-3" style=" position: relative;">
                <a href="#">
                    <img src="./images_LBD/l-3.jpg" alt="" style="width: 410px; height: 320px;">
                    <div class="mask">
                        <img src="./SVG_LBD/star.svg" alt="" style="width: 120px;">
                        <p style="margin-top: 30px;">可能因為日月潭很乾涸的關係，搭乘的人沒有很多，很像在包船，船本身也算乾淨，滿推薦的！</p>
                    </div>
                </a>
            </div>
            <div class="col-3" style=" position: relative;">
                <a href="#">
                    <img src="./images_LBD/l-15.jpg" alt="" style="width: 410px; height: 320px;">
                    <div class="mask">
                        <img src="./SVG_LBD/star.svg" alt="" style="width: 120px;">
                        <p style="margin-top: 30px;">船公司服務態度很好、貼心服務，不論人多人少都會告知開船時間，值得期待下次再去坐船，船班時間也很準時，會提醒五分鐘前至船頭等待。</p>
                    </div>
                </a>
            </div>

        </div>
        <div class="row section_5_1 d-block d-flex d-xl-none scroll" style="margin-top: 50px">
            <div class="col-6" style="padding: 0; position: relative;">
                <a href="#">
                    <img src="./images_LBD/l-14.jpg" alt="" style="width: 195px; height: 147px;">
                    <div class="mask_mob">
                        <img src="./SVG_LBD/star.svg" alt="" style="width: 80px;">
                        <p style="margin-top: 5px; font-size: 12px;">船公司服務態度很好、貼心服務，不論人多人少都會告知開船時間，值得期待下次再去坐船，船班時間也很準時，會提醒五分鐘前至船頭等待。</p>
                    </div>
                </a>
            </div>
            <div class="col-6" style="padding: 0; position: relative;">
                <a href="#">
                    <img src="./images_LBD/l-11.jpg" alt="" style="width: 195px; height: 147px;">
                    <div class="mask_mob">
                        <img src="./SVG_LBD/star.svg" alt="" style="width: 80px;">
                        <p style="margin-top: 5px; font-size: 12px;">這次搭船遊日月譚體驗很好，一路上的風景很好 天氣也不錯，希望下次還有機會可以搭乘這艘船，分享給想來日月潭的人。</p>
                    </div>
                </a>
            </div>
            <div class="col-6" style="padding: 0; position: relative;">
                <a href="#">
                    <img src="./images_LBD/l-7.jpg" alt="" style="width: 195px; height: 147px;">
                    <div class="mask_mob">
                        <img src="./SVG_LBD/star.svg" alt="" style="width: 80px;">
                        <p style="margin-top: 5px; font-size: 12px;">日月潭風景秀麗水社碼頭週邊和伊達邵商店老街有很多餐廳和手工藝品店，非常值得用餐和購買手工藝品、原住民釀造的小米酒。</p>
                    </div>
                </a>
            </div>
            <div class="col-6" style="padding: 0; position: relative;">
                <a href="#">
                    <img src="./images_LBD/l-13.jpg" alt="" style="width: 195px; height: 147px;">
                    <div class="mask_mob">
                        <img src="./SVG_LBD/star.svg" alt="" style="width: 80px;">
                        <p style="margin-top: 5px; font-size: 12px;">三個碼頭都能兌換船票，雖然平日班次較少，但工作人員指示清楚，船上有工作人員導覽，環境乾淨整潔，整體cp值高。</p>
                    </div>
                </a>
            </div>

        </div>

        <div class="row section_6 d-none d-xl-block d-xl-flex scroll" style="margin-top: 100px">
            <div style="text-align: center;">
                <div>
                    <span style="color: #ADE8F4; font-size: 40px; font-weight: 500;">宛如仙境的人間聖地</span>
                </div>
                <div style="border-top: 3px solid #000000; width: 360px; margin: 0 auto;">
                    <p class="mt-3">Explore</p>
                </div>
            </div>
        </div>
        <div class="row section_6 d-block d-xl-none scroll" style="margin-top: 100px">
            <div style="text-align: center;">
                <div style="position: relative;">
                    <span style="color: #ADE8F4; font-size: 24px; font-weight: 500;">宛如仙境的人間勝地</span>
                </div>
                <div style="border-top: 3px solid #000000; width: 210px; margin-left: 80px;">
                    <p class="mt-3">Explore</p>
                </div>
            </div>
        </div>

        <div class="row section_6_1 d-none d-xl-block d-xl-flex scroll" style="margin-top: 50px">
            <div class="col-4">
                <ul class="caption-style">
                    <li>
                        <a href="#">
                            <img src="./images_LBD/l-14.jpg" alt="" style="width: 540px; height: 690px; object-fit: cover;">
                        </a>
                        <div class="caption">
                            <div class="blur"></div>
                            <div class="caption-text">
                                <h1>日月潭&nbsp;&nbsp;&nbsp;&nbsp;<small style="font-size: .3rem;">Sunmoon lake</small></h1>
                                <p>當你潛入水裡，每一次呼吸都是如此感動</p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-4">
                <ul class="caption-style">
                    <li>
                        <a href="#">
                            <img src="./images_LBD/l-8.jpg" alt="" style="width: 540px; height: 690px; object-fit: cover;">
                        </a>
                        <div class="caption">
                            <div class="blur"></div>
                            <div class="caption-text">
                                <h1>日月潭&nbsp;&nbsp;&nbsp;&nbsp;<small style="font-size: .3rem;">Sunmoon lake</small></h1>
                                <p>當你潛入水裡，每一次呼吸都是如此感動</p>
                            </div>
                        </div>
                    </li>

                </ul>
            </div>
            <div class="col-4">
                <ul class="caption-style">
                    <li>
                        <a href="#">
                            <img src="./images_LBD/l-9.jpg" alt="" style="width: 540px; height: 690px; object-fit: cover;">
                        </a>
                        <div class="caption">
                            <div class="blur"></div>
                            <div class="caption-text">
                                <h1>日月潭&nbsp;&nbsp;&nbsp;&nbsp;<small style="font-size: .3rem;">Sunmoon lake</small></h1>
                                <p>當你潛入水裡，每一次呼吸都是如此感動</p>
                            </div>
                        </div>
                    </li>

                </ul>
            </div>
        </div>
        <div class="row section_6_1 d-block d-xl-none scroll" style="margin-top: 50px">
            <div class="col" style="padding: 0;">
                <ul class="caption-style">
                    <li>
                        <a href="#">
                            <img src="./images_LBD/l-3.jpg" alt="" style="width: 100%; height: 280px;">
                        </a>
                        <div class="caption">
                            <div class="blur" style="height: 280px; width: 390px;"></div>
                            <div class="caption-text" style="position: absolute; top: 100px; left: 50px;">
                                <h1>日月潭&nbsp;&nbsp;&nbsp;&nbsp;<small style="font-size: .3rem;">Sunmoon lake</small></h1>
                                <p>當你潛入水裡，每一次呼吸都是如此感動</p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col" style="padding: 0;">
                <ul class="caption-style">
                    <li>
                        <a href="#">
                            <img src="./images_LBD/l-8.jpg" alt="" style="width: 100%; height: 280px;">
                        </a>
                        <div class="caption">
                            <div class="blur" style="height: 280px; width: 390px;"></div>
                            <div class="caption-text" style="position: absolute; top: 100px; left: 50px;">
                                <h1>日月潭&nbsp;&nbsp;&nbsp;&nbsp;<small style="font-size: .3rem;">Sunmoon lake</small></h1>
                                <p>當你潛入水裡，每一次呼吸都是如此感動</p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col" style="padding: 0;">
                <ul class="caption-style">
                    <li>
                        <a href="#">
                            <img src="./images_LBD/l-9.jpg" alt="" style="width: 100%; height: 280px; margin-bottom: 150px;">
                        </a>
                        <div class="caption">
                            <div class="blur" style="height: 300px; width: 390px;"></div>
                            <div class="caption-text" style="position: absolute; top: 100px; left: 50px;">
                                <h1>日月潭&nbsp;&nbsp;&nbsp;&nbsp;<small style="font-size: .3rem;">Sunmoon lake</small></h1>
                                <p>當你潛入水裡，每一次呼吸都是如此感動</p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <footer class="mt-900">

    </footer>

    <script src="./js/jquery-3.6.0.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

    <script src="./JS_WCY/custom2.js"></script>
    <script src="./js/header.js"></script>
</body>


</html>