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

        /* --------------------心得分享-------------------------------------------- */
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
            padding: 10px;
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
            padding: 10px;
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
        <!-- 桌機版先 手機版後 -->
        <div class="row herosection d-none d-xl-block">
            <img src="./images_LBD/mountain_9.png" alt="" style="position: relative;">
            <div style="position: absolute; top: 278px; left: 293px; background-color: #cfd0d28c; font-size: 36px; width: 95px; height: 360px">
                <p style="text-align: center; align-items: center; margin-top: 70px">百岳之首</p>
            </div>
            <div style="position: absolute; top: 416px; left: 409px; background-color: #cfd0d28c; font-size: 36px; width: 95px; height: 360px">
                <p style="text-align: center; align-items: center; margin-top: 70px">挑戰自我</p>
            </div>
        </div>
        <div class="row herosection d-block d-xl-none">
            <p style="color: #00A878; font-size: 30px; font-weight: bold; text-align: center; margin-top: 10px;">攀登玉山</p>
            <img src="./images_LBD/mountain_9.png" alt="" style="position: relative;">
            <div style="position: absolute; top: 140px; left: 50px; background-color: #cfd0d28c; font-size: 18px; width: 45px; height: 150px">
                <p style="text-align: center; align-items: center; margin-top: 20px">百岳之首</p>
            </div>
            <div style="position: absolute; top: 150px; left: 100px; background-color: #cfd0d28c; font-size: 18px; width: 45px; height: 150px">
                <p style="text-align: center; align-items: center; margin-top: 20px">挑戰自我</p>
            </div>
        </div>

        <div class="row section_1 d-none d-xl-block d-xl-flex scroll" style="margin-top: 200px">
            <div class="col-xl-2">
                <div style="width: 50px; border-bottom: 3px solid #000000; padding-right: 100px;">
                    <h1 style="color: #00A878">第一高峰玉山</h1>
                </div>
                <p class="mt-3">Yushan mountain</p>
            </div>
            <div class="col-xl-10" style="position: relative;">
                <div>
                    <img src="./images_LBD/m-2.jpg" alt="" style="width: 100%;">
                </div>
                <div class="p-3" style="width: 812px; height: 202px; background-color: #ffffff; position: absolute; top: 630px; left: -100px; font-size: 18px; border: 1px solid;">
                    <p style="margin-top: 40px; line-height: 28px; letter-spacing: 2px;">小巧的台灣，國土面積在全球排名第137名，但3千公尺以上的高山卻有268座，面積比我們大10倍的日本，只有10幾座。玉山海拔3952公尺，為台灣最高峰、百岳之首，也是最有指標意義的聖山。</p>
                </div>
            </div>
        </div>
        <div class="row section_1 d-block d-xl-none scroll" style="margin-top: 100px; position: relative;">
            <div class="col-12" style="position: absolute; top: -70px; z-index: 99999; background-color: #fdfff88f; width: 130px;">
                <div style="width: 50px; border-bottom: 3px solid #000000; padding-right: 100px;">
                    <p style="color: #00A878; font-size: 24px; line-height: 30px;">第一高峰玉山</p>
                </div>
                <p class="mt-3" style="font-size: 9px;">Yushan mountain</p>
            </div>
            <div class="col-xl-10" style="position: relative;">
                <div>
                    <img src="./images_LBD/m-2.jpg" alt="" style="width: 100%;">
                </div>
                <div class="p-3" style="width: 318px; height: 125px; background-color: #ffffff; position: absolute; top: 200px; left: 35px; font-size: 12px; border: 1px solid;">
                    <p style="letter-spacing: 2px;">小巧的台灣，國土面積在全球排名第137名，但3千公尺以上的高山卻有268座，面積比我們大10倍的日本，只有10幾座。玉山海拔3952公尺，為台灣最高峰、百岳之首，也是最有指標意義的聖山。</p>
                </div>
            </div>
        </div>

        <div class="row section_2 d-none d-xl-block d-xl-flex scroll" style="margin-top: 200px;">
            <div class="col-2">
                <div style="width: 50px; border-bottom: 3px solid #000000; padding-right: 100px;">
                    <h1 style="color: #00A878">攻頂的意義</h1>
                </div>
                <p class="mt-3">Meaning</p>
                <img src="./SVG_LBD/mountain.svg" alt="">
            </div>
            <div class="col-10" style="position: relative;">
                <div>
                    <img src="./images_LBD/m-4.jpg" alt="" style="width: 100%;">
                </div>
                <div class="p-3" style="width: 812px; height: 202px; background-color: #ffffff; position: absolute; top: 660px; left: 270px; font-size: 18px; border: 1px solid;">
                    <p style="margin-top: 27px; line-height: 28px; letter-spacing: 2px;">對於想挑戰自我的登山客來說，攀登百岳是一個門檻，而百岳之中，玉山是最容易完成的一座，儘管海拔達到3952公尺是台灣第一高峰，但因為路線較為平坦寬闊、方向指示清晰，在百岳之中難易度可以說是最低的，體力好一點的甚至可以單攻，登上玉山代表你站上了台灣之巔。</p>
                </div>
                <a href="./journey_yushan_detail .php">
                    <button class="btn btn-warning" style="background-color: #FF9F1C; width: 200px; height: 60px; position: absolute; top: 802px; left: 980px; color: #ffffff;">點我立刻出發！</button>
                </a>
            </div>
        </div>
        <div class="row section_2 d-block d-xl-none scroll" style="margin-top: 200px; position: relative;">
            <div class="col-2" style="position: absolute; top: -70px; z-index: 99999; background-color: #fdfff88f; width: 130px;">
                <div style="width: 50px; border-bottom: 3px solid #000000; padding-right: 100px;">
                    <h1 style="color: #00A878; font-size: 24px; line-height: 30px;">攻頂的意義</h1>
                </div>
                <p class="mt-3" style="font-size: 9px;">Meaning</p>
            </div>
            <div class="col-10" style="position: relative;">
                <div>
                    <img src="./images_LBD/m-4.jpg" alt="" style="width: 366px;">
                </div>
                <div class="p-3" style="width: 318px; height: 160px; background-color: #ffffff; position: absolute; top: 180px; left: 35px; font-size: 12px; border: 1px solid;">
                    <p style="letter-spacing: 2px;">對於想挑戰自我的登山客來說，攀登百岳是一個門檻，而百岳之中，玉山是最容易完成的一座，儘管海拔達到3952公尺是台灣第一高峰，但因為路線較為平坦寬闊、方向指示清晰，在百岳之中難易度可以說是最低的，體力好一點的甚至可以單攻，登上玉山代表你站上了台灣之巔。</p>
                    <img src="./SVG_LBD/mountain.svg" alt="" style="width: 98px; position: absolute; top: -40px; left: 250px;">
                </div>
                <a href="./journey_yushan_detail .php">
                    <button class="btn btn-warning" style="background-color: #FF9F1C; width: 180px; height: 40px; position: absolute; top: 320px; left: 200px; color: #ffffff;">點我立刻出發！</button>
                </a>
            </div>
        </div>

        <div class="row section_3 d-none d-xl-block d-xl-flex scroll" style="margin-top: 200px">
            <div class="col-2">
                <div style="width: 50px; border-bottom: 3px solid #000000; padding-right: 100px;">
                    <h1 style="color: #00A878">路線介紹</h1>
                </div>
                <p class="mt-3">Route map</p>
            </div>
            <div class="col-10" style="position: relative;">
                <div>
                    <img src="./images_LBD/m-14.jpg" alt="" style="width: 1088px;">
                </div>
                <div class="p-3" style="width: 812px; height: 202px; background-color: #ffffff; position: absolute; top: 600px; left: 600px; font-size: 18px; border: 1px solid;">
                    <p style="margin-top: 30px; line-height: 28px; letter-spacing: 2px;">玉山群峰包括有玉山主峰、前峰、東峰、西峰、南峰、北峰、北北峰、鹿山、東小南山、小南山、南玉山等11連峰，其排列是以玉山主峰為中心成雙十字狀交叉分布，除北北峰及小南山外，其餘皆為百岳名山，不僅是登山者所嚮往，且玉山主峰更是國內外熱門登山路線。</p>
                </div>
                <a href="./journey_yushan_detail .php">
                    <button class="btn btn-warning" style="background-color: #FF9F1C; width: 200px; height: 60px; position: absolute; top: 742px; left: 800px; color: #ffffff;">詳細行程介紹</button>

                </a>
            </div>
        </div>
        <div class="row section_3 d-block d-xl-none scroll" style="margin-top: 300px; position: relative;">
            <div class="col-2" style="position: absolute; top: -70px; z-index: 99999; background-color: #fdfff88f; width: 130px;">
                <div style="width: 50px; border-bottom: 3px solid #000000; padding-right: 100px;">
                    <h1 style="color: #00A878; font-size: 24px; line-height: 30px;">路線介紹</h1>
                </div>
                <p class="mt-3" style="font-size: 9px; width: 100px;">Route map</p>
            </div>
            <div class="col-10" style="position: relative;">
                <div>
                    <img src="./images_LBD/m-14.jpg" alt="" style="width: 366px;">
                </div>
                <div class="p-3" style="width: 318px; height: 160px; background-color: #ffffff; position: absolute; top: 230px; left: 35px; font-size: 12px; border: 1px solid;">
                    <p style="letter-spacing: 2px;">玉山群峰包括有玉山主峰、前峰、東峰、西峰、南峰、北峰、北北峰、鹿山、東小南山、小南山、南玉山等11連峰，其排列是以玉山主峰為中心成雙十字狀交叉分布，除北北峰及小南山外，其餘皆為百岳名山，不僅是登山者所嚮往，且玉山主峰更是國內外熱門登山路線。</p>
                </div>
                <a href="./journey_yushan_detail .php">
                    <button class="btn btn-warning" style="background-color: #FF9F1C; width: 180px; height: 40px; position: absolute; top: 370px; left: 100px; color: #ffffff;">詳細行程介紹</button>
                </a>
            </div>
        </div>

        <div class="row section_4 d-none d-xl-block d-xl-flex scroll" style="margin-top: 200px">
            <div class="col-2">
                <div style="width: 50px; border-bottom: 3px solid #000000; padding-right: 100px;">
                    <h1 style="color: #00A878">推薦裝備</h1>
                </div>
                <p class="mt-3">Equipment</p>
            </div>
            <div class="col-10" style="position: relative;">
                <div class="row">
                    <div class="col-6">
                        <img src="./SVG_LBD/eq_pack.svg" alt="">
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
                        <a href="eq_house_buy.php?parent_id=21&cat_id=22"><button class="btn btn-warning" style="background-color: #FF9F1C; width: 200px; height: 60px; margin-top: 50px; color: #ffffff;">查看更多裝備</button></a>

                    </div>
                </div>
            </div>
        </div>
        <div class="row section_4 d-block d-xl-none scroll" style="margin-top: 200px">
            <div class="col-12">
                <div style="width: 50px; border-bottom: 3px solid #000000; padding-right: 100px;">
                    <h1 style="color: #00A878; font-size: 24px; line-height: 30px;">推薦裝備</h1>
                </div>
                <p class="mt-3" style="font-size: 9px;">Equipment</p>
            </div>
            <div class="col-12" style="position: relative;">
                <div class="row">
                    <div class="col-12">
                        <img src="./SVG_LBD/eq_pack.svg" alt="" style="width: 250px; position: absolute; top: -200px; left: 140px;">
                    </div>
                    <div class="col-12">
                        <div class="p-3" style="margin-top: 100px; width: 366px; height: 180px; background-color: #ffffff; font-size: 12px; border: 1px solid;">
                            <p style="letter-spacing: 2px;">千萬不要因為最近登山健行風氣興盛、或是一聽到〝必做〞兩個字就殺去爬山。登山是一個人人都可以參與的活動，但也是有危險性的活動，一定要做好事前準備，才能快樂上山、平安回家。
                                <br><br>兩三千公尺的大山實在太難挑戰，沒關係，登山新手能從周邊的郊山開始，一樣能看見不同的台灣之美，鍛練好身體再一步步挑戰台灣百岳。
                            </p>
                        </div>
                        <a href="eq_house_buy.php?parent_id=21&cat_id=22">
                            <button class="btn btn-warning" style="background-color: #FF9F1C; width: 180px; height: 40px; margin-top: 50px; color: #ffffff; position: absolute; top: 0">查看更多裝備</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row section_4_1 d-none d-xl-block d-xl-flex" style="align-items: center;">
            <div class="col-2">
                <img src="./SVG_LBD/eq_shoe.svg" alt="">
            </div>
            <div class="col-2">
                <img src="./SVG_LBD/eq_watercan.svg" alt="">
            </div>
            <div class="col-2">
                <img src="./SVG_LBD/eq_fire.svg" alt="">
            </div>
            <div class="col-2">
                <img src="./SVG_LBD/eq_lamp.svg" alt="">
            </div>
            <div class="col-2">
                <img src="./SVG_LBD/eq_climb.svg" alt="">
            </div>
            <div class="col-2">
                <img src="./SVG_LBD/eq_pan.svg" alt="">
            </div>
        </div>
        <div class="row section_4_1 d-block d-flex d-xl-none">
            <div class="col-6 mt-2">
                <img src="./SVG_LBD/eq_shoe.svg" alt="" style="width: 180px;">
            </div>
            <div class="col-6 mt-2">
                <img src="./SVG_LBD/eq_climb.svg" alt="" style="width: 150px; height: 150px;">
            </div>
            <div class="col-6 mt-2">
                <img src="./SVG_LBD/eq_watercan.svg" alt="" style="width: 130px;">
            </div>
            <div class="col-6 mt-2">
                <img src="./SVG_LBD/eq_fire.svg" alt="" style="width: 150px;">
            </div>
            <div class="col-6 mt-2">
                <img src="./SVG_LBD/eq_lamp.svg" alt="" style="width: 150px;">
            </div>
            <div class="col-6 mt-2">
                <img src="./SVG_LBD/eq_pan.svg" alt="" style="width: 150px;">
            </div>
        </div>

        <div class="row section_5 d-none d-xl-block d-xl-flex scroll">
            <div class="col" style="position: relative;">
                <div style="width: 320px; margin: 0 auto;">
                    <span style="color: #00A878; font-size: 40px; font-weight: 500;">心得分享</span>
                    <img src="./SVG_LBD/island.svg" alt="">
                </div>
                <div style="border-top: 3px solid #000000; width: 320px; position: absolute; top: 140px; left: 660px;">
                    <p class="mt-3" style="padding-left: 120px;">Experience</p>
                </div>
            </div>
        </div>
        <div class="row section_5 d-block d-xl-none scroll">
            <div class="col" style="position: relative;">
                <div style="margin: 0 auto; text-align: center;">
                    <span style="color: #00A878; font-size: 24px; font-weight: 500;">心得分享</span>
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
                    <img src="./images_LBD/m-2.jpg" alt="" style="width: 410px; height: 320px;">
                    <div class="mask">
                        <img src="./SVG_LBD/star.svg" alt="" style="width: 120px;">
                        <p style="margin-top: 30px;">行走在森林中，就算是中午也不會曝曬，在大自然的懷抱中，輕鬆漫步，吸收芬多精，遠離市俗塵囂的好地方，疫情期間還是要配合戴口罩，放慢腳步也能走得輕鬆。</p>
                    </div>
                </a>
            </div>
            <div class="col-3" style=" position: relative;">
                <a href="#">
                    <img src="./images_LBD/m-3.jpg" alt="" style="width: 410px; height: 320px;">
                    <div class="mask">
                        <img src="./SVG_LBD/star.svg" alt="" style="width: 120px;">
                        <p style="margin-top: 30px;">此次走自導式環形步道，步道平緩好走，騷蟬鳴叫一路陪伴不寂寞，還有一個造型很特別的廁所，外部玻璃建造，內部三間圓筒形廁所(女廁)，沿路發現斯了文豪蜥蜴、紅圓扁鍬形蟲、光帶馬陸、天蛾幼蟲、蕈菇類、苔蘚地衣…等，生態豐富，很棒的生態之旅。</p>
                    </div>
                </a>
            </div>
            <div class="col-3" style=" position: relative;">
                <a href="#">
                    <img src="./images_LBD/m-4.jpg" alt="" style="width: 410px; height: 320px;">
                    <div class="mask">
                        <img src="./SVG_LBD/star.svg" alt="" style="width: 120px;">
                        <p style="margin-top: 30px;">東眼山屬於台灣的小百岳，高度1212公尺，裡面的樹木都很高大筆直，如果要走完自主導覽步道，經過三角點後一圈，大約需要2-2.5小時，步道有許多階梯，也有一些是樹根交雜的泥地，比較適合身強體壯的年輕人，長輩和孩童可以選擇其他步道，推薦前往！</p>
                    </div>
                </a>
            </div>
            <div class="col-3" style=" position: relative;">
                <a href="#">
                    <img src="./images_LBD/m-5.jpg" alt="" style="width: 410px; height: 320px;">
                    <div class="mask">
                        <img src="./SVG_LBD/star.svg" alt="" style="width: 120px;">
                        <p style="margin-top: 30px;">好朋友家人一起運動聯絡感情的好地方。樹木高聳步道好走，進入到森林的每個階段感受不一樣。不僅空氣好，也有運動的效果下山還可延路採買水蜜桃。</p>
                    </div>
                </a>
            </div>
            <div class="col-3" style=" position: relative;">
                <a href="#">
                    <img src="./images_LBD/m-6.jpg" alt="" style="width: 410px; height: 320px;">
                    <div class="mask">
                        <img src="./SVG_LBD/star.svg" alt="" style="width: 120px;">
                        <p style="margin-top: 30px;">走進山中，每一步都是享受，感受充滿芬多精的涼爽空氣從肺部緩緩吐出，享受蟲鳴鳥叫交織出的自然協奏曲，推薦給大家！</p>
                    </div>
                </a>
            </div>
            <div class="col-3" style=" position: relative;">
                <a href="#">
                    <img src="./images_LBD/m-7.jpg" alt="" style="width: 410px; height: 320px;">
                    <div class="mask">
                        <img src="./SVG_LBD/star.svg" alt="" style="width: 120px;">
                        <p style="margin-top: 30px;">我最喜歡森林浴步道及親子峰步道景色。而且步道維護佳，可以安心行走。停車方便、服務親切、遊客中心展覽館非常讚且有飲水機、乾淨廁所、服務人員親切。</p>
                    </div>
                </a>
            </div>
            <div class="col-3" style=" position: relative;">
                <a href="#">
                    <img src="./images_LBD/m-8.jpg" alt="" style="width: 410px; height: 320px;">
                    <div class="mask">
                        <img src="./SVG_LBD/star.svg" alt="" style="width: 120px;">
                        <p style="margin-top: 30px;">大概有20年以上沒去過玉山，這次去被驚艷到，非常美，人沒有很多，呼吸高山的清新空氣，讓人快樂。木棧道鋪設算是完整，非常好走，建議穿較止滑的鞋子。</p>
                    </div>
                </a>
            </div>
            <div class="col-3" style=" position: relative;">
                <a href="#">
                    <img src="./images_LBD/m-10.jpg" alt="" style="width: 410px; height: 320px;">
                    <div class="mask">
                        <img src="./SVG_LBD/star.svg" alt="" style="width: 120px;">
                        <p style="margin-top: 30px;">漫步在森林中非常舒服，步道&棧道都規劃的很好！先線上購票當天就不用花時間排隊，還可以免費停車，推薦！</p>
                    </div>
                </a>
            </div>

        </div>
        <div class="row section_5_1 d-block d-flex d-xl-none scroll" style="margin-top: 50px">
            <div class="col-6" style="padding: 0; position: relative;">
                <a href="#">
                    <img src="./images_LBD/m-2.jpg" alt="" style="width: 195px; height: 130px;">
                    <div class="mask_mob">
                        <img src="./SVG_LBD/star.svg" alt="" style="width: 80px;">
                        <p style="margin-top: 5px; font-size: 12px;">滿分的行程。我承認費用比較高。 我們搭乘的是小台的快艇,可以在船艙外享受海風的吹拂。不喜歡吹風的也可以躲進床艙內。</p>
                    </div>
                </a>
            </div>
            <div class="col-6" style="padding: 0; position: relative;">
                <a href="#">
                    <img src="./images_LBD/m-7.jpg" alt="" style="width: 195px; height: 130px;">
                    <div class="mask_mob">
                        <img src="./SVG_LBD/star.svg" alt="" style="width: 80px;">
                        <p style="margin-top: 5px; font-size: 12px;">滿分的行程。我承認費用比較高。 我們搭乘的是小台的快艇,可以在船艙外享受海風的吹拂。不喜歡吹風的也可以躲進床艙內。</p>
                    </div>
                </a>
            </div>
            <div class="col-6" style="padding: 0; position: relative;">
                <a href="#">
                    <img src="./images_LBD/m-8.jpg" alt="" style="width: 195px; height: 130px;">
                    <div class="mask_mob">
                        <img src="./SVG_LBD/star.svg" alt="" style="width: 80px;">
                        <p style="margin-top: 5px; font-size: 12px;">滿分的行程。我承認費用比較高。 我們搭乘的是小台的快艇,可以在船艙外享受海風的吹拂。不喜歡吹風的也可以躲進床艙內。</p>
                    </div>
                </a>
            </div>
            <div class="col-6" style="padding: 0; position: relative;">
                <a href="#">
                    <img src="./images_LBD/m-10.jpg" alt="" style="width: 195px; height: 130px;">
                    <div class="mask_mob">
                        <img src="./SVG_LBD/star.svg" alt="" style="width: 80px;">
                        <p style="margin-top: 5px; font-size: 12px;">滿分的行程。我承認費用比較高。 我們搭乘的是小台的快艇,可以在船艙外享受海風的吹拂。不喜歡吹風的也可以躲進床艙內。</p>
                    </div>
                </a>
            </div>

        </div>

        <div class="row section_6 d-none d-xl-block scroll" style="margin-top: 100px">
            <div style="text-align: center;">
                <div>
                    <span style="color: #00A878; font-size: 40px; font-weight: 500;">只要踏上山徑，每一步都值得你探險</span>
                    <img src="./SVG_LBD/logo_mountain.svg" alt="">
                </div>
                <div style="border-top: 3px solid #000000; width: 700px; margin-right: 0; margin-left: 460px;">
                    <p class="mt-3">Explore</p>
                </div>
            </div>
        </div>
        <div class="row section_6 d-block d-xl-none scroll" style="margin-top: 100px">
            <div style="text-align: center;">
                <div style="position: relative;">
                    <span style="color: #00A878; font-size: 24px; font-weight: 500;">只要踏上山徑<br>&nbsp;每一步都值得你探險</span>
                    <img src="./SVG_LBD/logo_mountain.svg" alt="" style="position: absolute; top: 0; left: 270px; width: 28px;">
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
                            <img src="./images_LBD/m-12.jpg" alt="" style="width: 540px; height: 690px; object-fit: cover;">
                        </a>
                        <div class="caption">
                            <div class="blur"></div>
                            <div class="caption-text">
                                <h1>玉山&nbsp;&nbsp;&nbsp;&nbsp;<small style="font-size: .3rem;">Yushan mountain</small></h1>
                                <p>當你越過山頭，每一次呼吸都是如此自由</p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-4">
                <ul class="caption-style">
                    <li>
                        <a href="#">
                            <img src="./images_LBD/m-8.jpg" alt="" style="width: 540px; height: 690px; object-fit: cover;">
                        </a>
                        <div class="caption">
                            <div class="blur"></div>
                            <div class="caption-text">
                                <h1>玉山&nbsp;&nbsp;&nbsp;&nbsp;<small style="font-size: .3rem;">Yushan mountain</small></h1>
                                <p>當你越過山頭，每一次呼吸都是如此自由</p>
                            </div>
                        </div>
                    </li>

                </ul>
            </div>
            <div class="col-4">
                <ul class="caption-style">
                    <li>
                        <a href="#">
                            <img src="./images_LBD/m-7.jpg" alt="" style="width: 540px; height: 690px; object-fit: cover;">
                        </a>
                        <div class="caption">
                            <div class="blur"></div>
                            <div class="caption-text">
                                <h1>玉山&nbsp;&nbsp;&nbsp;&nbsp;<small style="font-size: .3rem;">Yushan mountain</small></h1>
                                <p>當你越過山頭，每一次呼吸都是如此自由</p>
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
                            <img src="./images_LBD/m-12.jpg" alt="" style="width: 100%; height: 280px;">
                        </a>
                        <div class="caption">
                            <div class="blur" style="height: 280px; width: 390px;"></div>
                            <div class="caption-text" style="position: absolute; top: 100px; left: 50px;">
                                <h1>玉山&nbsp;&nbsp;&nbsp;&nbsp;<small style="font-size: .3rem;">Yushan mountain</small></h1>
                                <p>當你越過山頭，每一次呼吸都是如此自由</p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col" style="padding: 0;">
                <ul class="caption-style">
                    <li>
                        <a href="#">
                            <img src="./images_LBD/m-8.jpg" alt="" style="width: 100%; height: 280px;">
                        </a>
                        <div class="caption">
                            <div class="blur" style="height: 280px; width: 390px;"></div>
                            <div class="caption-text" style="position: absolute; top: 100px; left: 50px;">
                                <h1>玉山&nbsp;&nbsp;&nbsp;&nbsp;<small style="font-size: .3rem;">Yushan mountain</small></h1>
                                <p>當你越過山頭，每一次呼吸都是如此自由</p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col" style="padding: 0;">
                <ul class="caption-style">
                    <li>
                        <a href="#">
                            <img src="./images_LBD/m-7.jpg" alt="" style="width: 100%; height: 280px; margin-bottom: 150px;">
                        </a>
                        <div class="caption">
                            <div class="blur" style="height: 300px; width: 390px;"></div>
                            <div class="caption-text" style="position: absolute; top: 100px; left: 50px;">
                                <h1>玉山&nbsp;&nbsp;&nbsp;&nbsp;<small style="font-size: .3rem;">Yushan mountain</small></h1>
                                <p>當你越過山頭，每一次呼吸都是如此自由</p>
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