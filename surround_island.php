<?php require_once 'db.inc.php' ?>
<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>surround_island</title>
    <link rel="stylesheet" href="./reset.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
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


        /* slider */
        .title_lty {
            font-size: 48px;
            margin: 2rem auto;
            position: relative;
        }


        .img1_lty img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .img1_lty {
            z-index: 100;

        }

        /* slide meta */
        .slide_meta_lty {
            position: absolute;
            background-color: white;
            padding: 1rem;
            width: 52.5%;
            left: 81%;
            bottom: 30%;
        }

        .slide_meta_lty span {
            font-size: 26px;
            color: #5E6472;
            line-height: 36px;
            font-weight: 700;
        }

        .slide_meta_lty p {
            font-size: 16px;
            line-height: 26px;
            margin-top: 8px;
            color: #5E6472;
        }

        .link1_lty a {
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

        @media (max-width:880px) {
            .slide_meta_lty {
                position: relative;
                left: auto;
                bottom: auto;
                width: auto;
                margin-left: 10px;
                margin-right: 10px;
                margin-top: -40px;
                padding: 16px 16px 0px 16px;
            }


        }



        .link1_lty a:hover {
            text-decoration: none;
        }

        /* lebal 12345  */

        .ul1_lty {
            color: #ABADB2;
        }

        .ul1_lty li {

            text-align: center;
        }

        .ul1_lty li a {
            font-size: 36px;
            padding: 3px 10px;
            color: #ABADB2;
            border-bottom: 3px solid #ABADB2;
            font-weight: 700;
        }

        .ul1_lty li a:hover {
            text-decoration: none;
            color: #00A878;
            border-bottom: 3px solid #00A878;
        }

        /* 選擇方案 */
        .title2_lty {
            writing-mode: vertical-lr;
            font-size: 36px;
            font-weight: 700;
            color: #5E6472;
            background-color: white;
            box-shadow: 3px 3px #cececea2;
            padding: 3px;
            position: absolute;
            right: 2px;
            z-index: 100;
            letter-spacing: 12px;
        }

        .content1_lty {
            background-color: #B1D660;
            height: 330px;
            font-size: 26px;
            line-height: 36px;
            color: white;

            top: 36%;
        }

        .li1_lty a {
            color: #ABADB2;
        }

        .li1_lty a:hover {
            text-decoration: none;
        }

        /*  */

        .ul2_lty li {
            margin: 0 auto;
        }

        .ul2_lty li a {
            text-decoration: none;
            font-size: 26px;
            font-weight: 700;
            color: #3F4552;
        }

        .ul2_lty li a:hover {
            color: #00A878;
            border-bottom: 3px solid #00A878;
        }

        .title3_lty {
            border-bottom: 3px solid black;
        }

        .title3_lty p {
            font-size: 48px;
            font-weight: 700;
            writing-mode: vertical-lr;
            color: #FF9F1C;
        }

        .text2_lty {
            color: #5E6472;
            font-size: 18px;
            font-weight: 500;
        }

        .cards_lty {
            display: flex;
            flex-wrap: wrap;
        }

        .cards_item_lty {
            max-width: 320px;
            background: white;
            box-shadow: 3px 3px #cececea2;
            padding-right: 0;
            padding-left: 0;
            margin: 5px;

        }

        .cards_item_lty img {
            width: 100%;
        }

        .row_h_100 {
            height: 100vh;
        }

        .row_h_70 {
            height: 70vh;
        }

        .row_h_90 {
            height: 90vh;
        }

        @media (max-width:880px) {
            .title3_lty p {
                writing-mode: horizontal-tb;
                font-size: 24px;
                padding-top: 2px;
            }

            .title_lty {
                font-size: 30px;
                margin: 1rem auto;
                position: relative;
            }

            .lebal1_lty ul li a {
                font-size: 24px;
            }

            .slide_meta_lty span {
                font-size: 18px;
            }

            .slide_meta_lty p {
                font-size: 12px;
                line-height: 18px;
            }

            .div_lty p {
                font-size: 12px;
                margin: 2rem;
            }

            .title2_lty {
                font-size: 26px;
                right: 2rem;
            }

            .title3_lty {
                border-bottom: none;
            }

            .cards_item_lty {
                max-width: 170px;
            }

            .row_h_100 {
                height: 100%;
            }

            .row_h_70 {
                height: 100%;
            }

            .row_h_90 {
                height: 100%;
            }


        }

        .btn_color_lty {
            color: #919191;
            background-color: white;
            border-color: #C9C9C9;
        }

        .btn_color_lty:hover,
        .btn_color_lty:focus,
        .btn_color_lty:active:hover {
            color: white;
            background-color: #B1D660;
        }

        .dropdown-menu a:hover,
        .dropdown-menu a:focus,
        .dropdown-menu a:active:hover {
            color: white;
            background-color: #B1D660;
        }

        .tab {
            color: #00A878;
        }

        a {
            outline: none;
        }

        #section-1 {
            padding-top: 120px;
        }

        #section-2 {
            padding-top: 120px;
        }

        #section-3 {
            padding-top: 120px;
        }
    </style>
</head>

<body>
    <!-- navbar -->

    <?php require_once 'header.php' ?>

    <div class="container">
        <div class="row">
            <p class="title_lty" style="font-weight:700">火車環島</p>
        </div>

        <div class="row flex-row-reverse row_h_90">
            <div class="lebal1_lty col-xl-4 col-12">
                <ul class="d-flex justify-content-around ul1_lty">
                    <li>
                        <a href="" id="01" class="tab">01</a>
                    </li>
                    <li>
                        <a href="" id="02" class="tab">02</a>
                    </li>
                    <li>
                        <a href="" id="03" class="tab">03</a>
                    </li>
                    <li>
                        <a href="" id="04" class="tab">04</a>
                    </li>
                    <li>
                        <a href="" id="05" class="tab">05</a>
                    </li>
                </ul>
            </div>


            <div class="img-wrap-herosection  col-xl-8 col-12">
                <div class=" img1_lty " id="her01">
                    <figure>
                        <a href="">
                            <img src="./img/12.jpg" alt="">
                        </a>
                    </figure>
                    <div class="slide_meta_lty">
                        <span>東部之美-太魯閣號小火車之旅</span>
                        <p>
                            每年約 8 月至 9 月為金針花季六十石山位在富里鄉竹田村東側海拔約 800 公尺的海岸山脈上，經過一段蜿蜒的山路後，眼前出現無邊無際的田野景致，幾座農舍、涼亭散落在金黃色的金針花田間，形成一幅樸質的田園畫作。更設有六處觀景亭台，分別以宣草、黃花、鹿蔥、丹棘、療愁、忘憂等金針花的各種別稱為命名，並為每個亭台題匾，讓您在絕佳的環境中飽覽最美的景色，觀賞日出日落、視野寛闊、氣象變化多端等各具特色的景緻，讓您每秒都有不同的驚喜。
                        </p>
                        <div class="link1_lty">
                            <!-- <a href="#">查看更多</a> -->
                        </div>
                    </div>
                </div>
                <div class=" img1_lty" id="her02" style="display: none;">
                    <figure>
                        <a href="">
                            <img src="./img/13.jpg" alt="">
                        </a>
                    </figure>
                    <div class="slide_meta_lty">
                        <span>北部之美-碧砂漁港日出海釣</span>
                        <p>
                            基隆海上冒險、夜釣小管、吃海鮮，多個願望一次滿足！夜巡北海岸，從海面上欣賞九份山城燈景，依季節夜釣小管、白帶魚、鯖魚或其他不同魚種
                        </p>
                        <div class="link1_lty">
                            <!-- <a href="#">查看更多</a> -->
                        </div>
                    </div>
                </div>
                <div class=" img1_lty" id="her03" style="display: none;">
                    <figure>
                        <a href="">
                            <img src="./img/14.jpg" alt="">
                        </a>
                    </figure>
                    <div class="slide_meta_lty">
                        <span>南部之美-後灣生態夕陽獨木舟體驗</span>
                        <p>
                            在黃昏時段觀賞海上夕陽美景，以不同角度欣賞墾丁之美，無經驗的初學者也能安心體驗，享受趣味十足的獨木舟水上活動
                        </p>
                        <div class="link1_lty">
                            <!-- <a href="#">查看更多</a> -->
                        </div>
                    </div>
                </div>
                <div class="img1_lty" id="her04" style="display: none;">
                    <figure>
                        <a href="">
                            <img src="./img/15.jpg" alt="">
                        </a>
                    </figure>
                    <div class="slide_meta_lty">
                        <span>外島之美-世界級的玄武岩景觀</span>
                        <p>
                            在西吉嶼北邊有著長達八百公尺的玄武岩牆，西北邊則有著三條經過萬年的海水沖刷所形成的海蝕溝，氣勢磅礡，壯麗異常。完整的南方四島，沿途中會帶著各位旅人，依序巡航，在南鐵砧嶼看求子岩與肉形石頭巾嶼，欣賞漫天飛舞的海鷗
                        </p>
                        <div class="link1_lty">
                            <!-- <a href="#">查看更多</a> -->
                        </div>
                    </div>
                </div>
                <div class="img1_lty" id="her05" style="display: none;">
                    <figure>
                        <a href="">
                            <img src="./img/16.jpg" alt="">
                        </a>
                    </figure>
                    <div class="slide_meta_lty">
                        <span>中部之美-合歡山觀星夜遊</span>
                        <p>
                            前往台灣第一座國際級星空資源保育公園－合歡山暗空公園，一同徜徉在無光害的浩瀚星空中！在這區域眼力所及的範圍內，所有的夜間光照都必須符合適當的管理，以確保星空觀測的品質，在自然、科學、教育、文化遺產方面也都有特殊的保護。在這裡，你可以仰望沒有任何光害的星空與銀河。
                        </p>
                        <div class="link1_lty">
                            <!-- <a href="#">查看更多</a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <p class="title_lty" style="font-weight:700">選擇方案</p>
        </div>

        <div class="row">
            <div class="div_lty mb-xl-5">
                <p style="text-align: center;">
                    鑑於套裝旅遊日益盛行，三倆好友隨時可成行的小團體旅行風潮，因此我們提供了區域、踩點、自由行三種方案，讓您可以根據自己的時間安排行程，也可以根據所在地選擇出發區域，讓您自由的暢遊台灣，為提升專業合理化的旅遊品質為目標，引領您體驗各式各樣的台灣之美。
                </p>
            </div>
        </div>

        <div class="row row_h_70">

            <li class="col-xl-4 col-12 li1_lty" style="list-style: none;">
                <a href="#section-1" class="js-anchor-link">
                    <h2 class="title2_lty">
                        區域方案
                    </h2>
                    <div>
                        <img src="./SVG/taitung-img.svg" alt="" style="max-height:380px" data-aos="zoom-in-down">
                    </div>
                    <p>
                        提供六種篩選，讓您可以根據天數或區域做選擇，每個區域都能體會到各種面貌的台灣特色
                    </p>
                </a>
            </li>
            <li class="col-xl-4 col-12 li1_lty" style="list-style: none;">
                <a href="#section-2" class="js-anchor-link">
                    <h2 class="title2_lty">
                        踩點方案
                    </h2>
                    <div>
                        <img src="./SVG/location-img.svg" alt="" style="max-height:380px" data-aos="zoom-in-down">
                    </div>
                    <p>
                        提供四種篩選，讓您可以根據所在區域做選擇，此方案採用一日遊的形式讓您快速體驗當地文化
                    </p>
                </a>
            </li>
            <li class="col-xl-4 col-12 li1_lty" style="list-style: none;">
                <a href="#section-3" class="js-anchor-link">
                    <h2 class="title2_lty">
                        自由行
                    </h2>
                    <div>
                        <img src="./SVG/free-img.svg" alt="" style="max-height:380px" data-aos="zoom-in-down">
                    </div>
                    <p>
                        讓您自由搭配喜歡的行程，只要時間確定，立即來一趟說走就走的旅行！
                    </p>
                </a>
            </li>



        </div>

        <!-- 區域方案 -->
        <div class="row mt-3 row_h_100" id="section-1">
            <div class="col-xl-2 ">
                <div class="title3_lty d-flex pb-xl-5">
                    <svg xmlns="http://www.w3.org/2000/svg" width="63.034" height="50.008" viewBox="0 0 63.034 50.008" class="col-xl-6 col-2">
                        <g id="圖層_2" data-name="圖層 2" transform="matrix(0.995, -0.105, 0.105, 0.995, -1.381, 5.755)">
                            <g id="圖層_1" data-name="圖層 1">
                                <rect id="矩形_572" data-name="矩形 572" width="53.3" height="29.2" transform="translate(1.003 16.168) rotate(-16.53)" fill="#ff9f1c" stroke="#ff9f1c" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                <rect id="矩形_573" data-name="矩形 573" width="7.9" height="9.65" transform="translate(10.847 18.556) rotate(-16.53)" fill="#ade8f4" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="0.75" />
                                <rect id="矩形_574" data-name="矩形 574" width="7.9" height="9.65" transform="translate(24.217 14.596) rotate(-16.53)" fill="#ade8f4" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="0.75" />
                                <rect id="矩形_575" data-name="矩形 575" width="7.9" height="9.65" transform="translate(37.576 10.629) rotate(-16.53)" fill="#ade8f4" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="0.75" />
                            </g>
                        </g>
                    </svg>
                    <p class="col-xl-6 col-10 text3_lty">區域方案</p>
                </div>

                <p class="p-3 text2_lty d-xl-block d-none">可以根據時間及地點來選擇你的目的地</p>

                <img src="./SVG/taitung-img.svg" alt="" class="d-xl-block d-none " data-aos="zoom-in-down">
            </div>

            <div class="col-xl-10">
                <ul class="d-xl-flex d-none ul2_lty mb-xl-4">
                    <?php
                    $sql = "SELECT DISTINCT `feature_id`, `cat_name`
                            FROM `product`
                            INNER JOIN `categories` ON `product`.`feature_id` = `categories`.`id`
                            WHERE `cat_id` = 4";
                    $arr = $pdo->query($sql)->fetchAll();
                    foreach ($arr as $obj) {
                    ?>
                        <li>
                            <a id="cat_id_4" href="surround_island.php?cat_id=4&feature_id=<?= $obj['feature_id'] ?>#section-1"><?= $obj['cat_name'] ?></a>
                        </li>
                    <?php
                    }
                    ?>
                </ul>

                <div class="dropdown d-xl-none d-flex flex-row-reverse">
                    <button class="btn dropdown-toggle btn_color_lty" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        請選擇您的行程
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <?php
                        $sql = "SELECT DISTINCT `feature_id`, `cat_name`
                    FROM `product`
                    INNER JOIN `categories` ON `product`.`feature_id` = `categories`.`id`
                    WHERE `cat_id` = 4";
                        $arr = $pdo->query($sql)->fetchAll();
                        foreach ($arr as $obj) {
                        ?>
                            <a id="cat_id_4" class="dropdown-item" href="surround_island.php?cat_id=4&feature_id=<?= $obj['feature_id'] ?>#cat_id_4"><?= $obj['cat_name'] ?></a>
                        <?php
                        }
                        ?>
                    </div>
                </div>

                <div class="cards_lty">
                    <?php
                    $sql = "SELECT * FROM `product` WHERE `cat_id` = 4  ";
                    if (isset($_GET['feature_id']) && isset($_GET['cat_id']) && $_GET['cat_id'] == 4) $sql .= "AND `feature_id` = {$_GET['feature_id']} ";
                    $sql .= "LIMIT 8 ";
                    $arr = $pdo->query($sql)->fetchAll();
                    foreach ($arr as $obj) {
                    ?>
                        <div class="cards_item_lty col-xl-3 col-6">
                            <a href="./journey_detail.php">
                                <img src="./images/<?= $obj['prod_main_img'] ?>" alt="" style="width:100%; height: 214px; object-fit: cover;">
                            </a>
                            <p><?= $obj['prod_name'] ?></p>
                            <span><svg xmlns="http://www.w3.org/2000/svg" width="13.792" height="18.389" viewBox="0 0 13.792 18.389">
                                    <path id="map-marker-alt-solid" d="M6.187,18.018C.969,10.453,0,9.676,0,6.9a6.9,6.9,0,1,1,13.792,0c0,2.78-.969,3.557-6.187,11.122a.862.862,0,0,1-1.417,0ZM6.9,9.769A2.873,2.873,0,1,0,4.023,6.9,2.873,2.873,0,0,0,6.9,9.769Z" fill="#d9d9d9" />
                                </svg>
                                <?= $obj['location'] ?>
                            </span>
                            <div class="d-flex mt-3 justify-content-between pb-2 pr-2">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="151" height="25" viewBox="0 0 151 25">
                                    <defs>
                                        <clipPath id="clip-path">
                                            <rect width="151" height="25" fill="none" />
                                        </clipPath>
                                    </defs>
                                    <g id="重复网格_6" data-name="重复网格 6" clip-path="url(#clip-path)">
                                        <g transform="translate(-1095 -1603)">
                                            <path id="多边形_13" data-name="多边形 13" d="M11.6,1.8a1,1,0,0,1,1.79,0l2.881,5.784A1,1,0,0,0,17,8.119l6.2,1.107a1,1,0,0,1,.556,1.665L19.3,15.682a1,1,0,0,0-.258.819l.919,6.576A1,1,0,0,1,18.5,24.1l-5.542-2.888a1,1,0,0,0-.924,0L6.5,24.1a1,1,0,0,1-1.452-1.025L5.962,16.5a1,1,0,0,0-.258-.819l-4.455-4.79a1,1,0,0,1,.556-1.665L8,8.119a1,1,0,0,0,.719-.539Z" transform="translate(1095 1603)" fill="#ffd21c" />
                                        </g>
                                        <g transform="translate(-1064 -1603)">
                                            <path id="多边形_13-2" data-name="多边形 13" d="M11.6,1.8a1,1,0,0,1,1.79,0l2.881,5.784A1,1,0,0,0,17,8.119l6.2,1.107a1,1,0,0,1,.556,1.665L19.3,15.682a1,1,0,0,0-.258.819l.919,6.576A1,1,0,0,1,18.5,24.1l-5.542-2.888a1,1,0,0,0-.924,0L6.5,24.1a1,1,0,0,1-1.452-1.025L5.962,16.5a1,1,0,0,0-.258-.819l-4.455-4.79a1,1,0,0,1,.556-1.665L8,8.119a1,1,0,0,0,.719-.539Z" transform="translate(1095 1603)" fill="#ffd21c" />
                                        </g>
                                        <g transform="translate(-1033 -1603)">
                                            <path id="多边形_13-3" data-name="多边形 13" d="M11.6,1.8a1,1,0,0,1,1.79,0l2.881,5.784A1,1,0,0,0,17,8.119l6.2,1.107a1,1,0,0,1,.556,1.665L19.3,15.682a1,1,0,0,0-.258.819l.919,6.576A1,1,0,0,1,18.5,24.1l-5.542-2.888a1,1,0,0,0-.924,0L6.5,24.1a1,1,0,0,1-1.452-1.025L5.962,16.5a1,1,0,0,0-.258-.819l-4.455-4.79a1,1,0,0,1,.556-1.665L8,8.119a1,1,0,0,0,.719-.539Z" transform="translate(1095 1603)" fill="#ffd21c" />
                                        </g>
                                        <g transform="translate(-1002 -1603)">
                                            <path id="多边形_13-4" data-name="多边形 13" d="M11.6,1.8a1,1,0,0,1,1.79,0l2.881,5.784A1,1,0,0,0,17,8.119l6.2,1.107a1,1,0,0,1,.556,1.665L19.3,15.682a1,1,0,0,0-.258.819l.919,6.576A1,1,0,0,1,18.5,24.1l-5.542-2.888a1,1,0,0,0-.924,0L6.5,24.1a1,1,0,0,1-1.452-1.025L5.962,16.5a1,1,0,0,0-.258-.819l-4.455-4.79a1,1,0,0,1,.556-1.665L8,8.119a1,1,0,0,0,.719-.539Z" transform="translate(1095 1603)" fill="#ffd21c" />
                                        </g>
                                        <g transform="translate(-971 -1603)">
                                            <path id="多边形_13-5" data-name="多边形 13" d="M11.6,1.8a1,1,0,0,1,1.79,0l2.881,5.784A1,1,0,0,0,17,8.119l6.2,1.107a1,1,0,0,1,.556,1.665L19.3,15.682a1,1,0,0,0-.258.819l.919,6.576A1,1,0,0,1,18.5,24.1l-5.542-2.888a1,1,0,0,0-.924,0L6.5,24.1a1,1,0,0,1-1.452-1.025L5.962,16.5a1,1,0,0,0-.258-.819l-4.455-4.79a1,1,0,0,1,.556-1.665L8,8.119a1,1,0,0,0,.719-.539Z" transform="translate(1095 1603)" fill="#ffd21c" />
                                        </g>
                                    </g>
                                </svg>
                                <span>
                                    <span>
                                        TWD
                                    </span>
                                    <?= number_format($obj['prod_price']) ?>
                                </span>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>

            </div>
        </div>
        <!-- 踩點方案 -->
        <div class="row mt-3 row_h_100" id="section-2">
            <div class="col-xl-2">
                <div class="title3_lty d-flex pb-xl-5">
                    <svg xmlns="http://www.w3.org/2000/svg" width="63.034" height="50.008" viewBox="0 0 63.034 50.008" class="col-xl-6 col-2">
                        <g id="圖層_2" data-name="圖層 2" transform="matrix(0.995, -0.105, 0.105, 0.995, -1.381, 5.755)">
                            <g id="圖層_1" data-name="圖層 1">
                                <rect id="矩形_572" data-name="矩形 572" width="53.3" height="29.2" transform="translate(1.003 16.168) rotate(-16.53)" fill="#ff9f1c" stroke="#ff9f1c" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                <rect id="矩形_573" data-name="矩形 573" width="7.9" height="9.65" transform="translate(10.847 18.556) rotate(-16.53)" fill="#ade8f4" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="0.75" />
                                <rect id="矩形_574" data-name="矩形 574" width="7.9" height="9.65" transform="translate(24.217 14.596) rotate(-16.53)" fill="#ade8f4" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="0.75" />
                                <rect id="矩形_575" data-name="矩形 575" width="7.9" height="9.65" transform="translate(37.576 10.629) rotate(-16.53)" fill="#ade8f4" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="0.75" />
                            </g>
                        </g>
                    </svg>
                    <p class="col-xl-6 col-10  text3_lty ">踩點方案</p>
                </div>

                <p class="p-3 text2_lty d-xl-block d-none">可以根據地點來選擇你的目的地，根據自己的時間長度決定！</p>

                <img src="./SVG/location-img.svg" alt="" class="d-xl-block d-none" data-aos="zoom-in-down">
            </div>

            <div class="col-xl-10">
                <ul class="ul2_lty d-xl-flex d-none ">
                    <?php
                    $sql = "SELECT DISTINCT `feature_id`, `cat_name`
                            FROM `product`
                            INNER JOIN `categories` ON `product`.`feature_id` = `categories`.`id`
                            WHERE `cat_id` = 11";
                    $arr = $pdo->query($sql)->fetchAll();
                    foreach ($arr as $obj) {
                    ?>
                        <li>
                            <a id="cat_id_11" href="surround_island.php?cat_id=11&feature_id=<?= $obj['feature_id'] ?>#section-2"><?= $obj['cat_name'] ?></a>
                        </li>
                    <?php
                    }
                    ?>
                </ul>

                <div class="dropdown d-xl-none d-flex flex-row-reverse">
                    <button class="btn btn_color_lty dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        請選擇您的行程
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <?php
                        $sql = "SELECT DISTINCT `feature_id`, `cat_name`
                            FROM `product`
                            INNER JOIN `categories` ON `product`.`feature_id` = `categories`.`id`
                            WHERE `cat_id` = 11";
                        $arr = $pdo->query($sql)->fetchAll();
                        foreach ($arr as $obj) {
                        ?>
                            <a id="cat_id_11" class="dropdown-item" href="surround_island.php?cat_id=11&feature_id=<?= $obj['feature_id'] ?>#cat_id_11"><?= $obj['cat_name'] ?></a>
                        <?php
                        }
                        ?>
                    </div>
                </div>

                <div class="cards_lty">
                    <?php
                    $sql = "SELECT * FROM `product` WHERE `cat_id` = 11  ";
                    if (isset($_GET['feature_id']) && isset($_GET['cat_id']) && $_GET['cat_id'] == 11) $sql .= "AND `feature_id` = {$_GET['feature_id']} ";
                    $sql .= "LIMIT 8 ";
                    $arr = $pdo->query($sql)->fetchAll();
                    foreach ($arr as $obj) {
                    ?>
                        <div class="cards_item_lty col-xl-3 col-6">
                            <a href="./journey_spot_detail .php">
                                <img src="./images/<?= $obj['prod_main_img'] ?>" alt="" style="width:100%; height: 214px; object-fit: cover;">
                            </a>
                            <p><?= $obj['prod_name'] ?></p>
                            <span><svg xmlns="http://www.w3.org/2000/svg" width="13.792" height="18.389" viewBox="0 0 13.792 18.389">
                                    <path id="map-marker-alt-solid" d="M6.187,18.018C.969,10.453,0,9.676,0,6.9a6.9,6.9,0,1,1,13.792,0c0,2.78-.969,3.557-6.187,11.122a.862.862,0,0,1-1.417,0ZM6.9,9.769A2.873,2.873,0,1,0,4.023,6.9,2.873,2.873,0,0,0,6.9,9.769Z" fill="#d9d9d9" />
                                </svg>
                                <?= $obj['location'] ?>
                            </span>
                            <div class="d-flex mt-3 justify-content-between pb-2 pr-2">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="151" height="25" viewBox="0 0 151 25">
                                    <defs>
                                        <clipPath id="clip-path">
                                            <rect width="151" height="25" fill="none" />
                                        </clipPath>
                                    </defs>
                                    <g id="重复网格_6" data-name="重复网格 6" clip-path="url(#clip-path)">
                                        <g transform="translate(-1095 -1603)">
                                            <path id="多边形_13" data-name="多边形 13" d="M11.6,1.8a1,1,0,0,1,1.79,0l2.881,5.784A1,1,0,0,0,17,8.119l6.2,1.107a1,1,0,0,1,.556,1.665L19.3,15.682a1,1,0,0,0-.258.819l.919,6.576A1,1,0,0,1,18.5,24.1l-5.542-2.888a1,1,0,0,0-.924,0L6.5,24.1a1,1,0,0,1-1.452-1.025L5.962,16.5a1,1,0,0,0-.258-.819l-4.455-4.79a1,1,0,0,1,.556-1.665L8,8.119a1,1,0,0,0,.719-.539Z" transform="translate(1095 1603)" fill="#ffd21c" />
                                        </g>
                                        <g transform="translate(-1064 -1603)">
                                            <path id="多边形_13-2" data-name="多边形 13" d="M11.6,1.8a1,1,0,0,1,1.79,0l2.881,5.784A1,1,0,0,0,17,8.119l6.2,1.107a1,1,0,0,1,.556,1.665L19.3,15.682a1,1,0,0,0-.258.819l.919,6.576A1,1,0,0,1,18.5,24.1l-5.542-2.888a1,1,0,0,0-.924,0L6.5,24.1a1,1,0,0,1-1.452-1.025L5.962,16.5a1,1,0,0,0-.258-.819l-4.455-4.79a1,1,0,0,1,.556-1.665L8,8.119a1,1,0,0,0,.719-.539Z" transform="translate(1095 1603)" fill="#ffd21c" />
                                        </g>
                                        <g transform="translate(-1033 -1603)">
                                            <path id="多边形_13-3" data-name="多边形 13" d="M11.6,1.8a1,1,0,0,1,1.79,0l2.881,5.784A1,1,0,0,0,17,8.119l6.2,1.107a1,1,0,0,1,.556,1.665L19.3,15.682a1,1,0,0,0-.258.819l.919,6.576A1,1,0,0,1,18.5,24.1l-5.542-2.888a1,1,0,0,0-.924,0L6.5,24.1a1,1,0,0,1-1.452-1.025L5.962,16.5a1,1,0,0,0-.258-.819l-4.455-4.79a1,1,0,0,1,.556-1.665L8,8.119a1,1,0,0,0,.719-.539Z" transform="translate(1095 1603)" fill="#ffd21c" />
                                        </g>
                                        <g transform="translate(-1002 -1603)">
                                            <path id="多边形_13-4" data-name="多边形 13" d="M11.6,1.8a1,1,0,0,1,1.79,0l2.881,5.784A1,1,0,0,0,17,8.119l6.2,1.107a1,1,0,0,1,.556,1.665L19.3,15.682a1,1,0,0,0-.258.819l.919,6.576A1,1,0,0,1,18.5,24.1l-5.542-2.888a1,1,0,0,0-.924,0L6.5,24.1a1,1,0,0,1-1.452-1.025L5.962,16.5a1,1,0,0,0-.258-.819l-4.455-4.79a1,1,0,0,1,.556-1.665L8,8.119a1,1,0,0,0,.719-.539Z" transform="translate(1095 1603)" fill="#ffd21c" />
                                        </g>
                                        <g transform="translate(-971 -1603)">
                                            <path id="多边形_13-5" data-name="多边形 13" d="M11.6,1.8a1,1,0,0,1,1.79,0l2.881,5.784A1,1,0,0,0,17,8.119l6.2,1.107a1,1,0,0,1,.556,1.665L19.3,15.682a1,1,0,0,0-.258.819l.919,6.576A1,1,0,0,1,18.5,24.1l-5.542-2.888a1,1,0,0,0-.924,0L6.5,24.1a1,1,0,0,1-1.452-1.025L5.962,16.5a1,1,0,0,0-.258-.819l-4.455-4.79a1,1,0,0,1,.556-1.665L8,8.119a1,1,0,0,0,.719-.539Z" transform="translate(1095 1603)" fill="#ffd21c" />
                                        </g>
                                    </g>
                                </svg>
                                <span>
                                    <span>
                                        TWD
                                    </span>
                                    <?= number_format($obj['prod_price']) ?>
                                </span>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>

            </div>
        </div>
        <!-- 自由行 -->
        <div class="row mt-3" id="section-3">
            <div class="col-xl-2">
                <div class="title3_lty d-flex pb-5">
                    <svg xmlns="http://www.w3.org/2000/svg" width="63.034" height="50.008" viewBox="0 0 63.034 50.008" class="col-xl-6 col-2">
                        <g id="圖層_2" data-name="圖層 2" transform="matrix(0.995, -0.105, 0.105, 0.995, -1.381, 5.755)">
                            <g id="圖層_1" data-name="圖層 1">
                                <rect id="矩形_572" data-name="矩形 572" width="53.3" height="29.2" transform="translate(1.003 16.168) rotate(-16.53)" fill="#ff9f1c" stroke="#ff9f1c" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                <rect id="矩形_573" data-name="矩形 573" width="7.9" height="9.65" transform="translate(10.847 18.556) rotate(-16.53)" fill="#ade8f4" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="0.75" />
                                <rect id="矩形_574" data-name="矩形 574" width="7.9" height="9.65" transform="translate(24.217 14.596) rotate(-16.53)" fill="#ade8f4" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="0.75" />
                                <rect id="矩形_575" data-name="矩形 575" width="7.9" height="9.65" transform="translate(37.576 10.629) rotate(-16.53)" fill="#ade8f4" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="0.75" />
                            </g>
                        </g>
                    </svg>
                    <p class="col-xl-6 col-10  text3_lty">自由行</p>
                </div>

                <p class="p-3 text2_lty d-xl-block d-none">想去哪就去哪！</p>

                <img src="./SVG/free-img.svg" alt="" class="d-xl-block d-none" data-aos="zoom-in-down">
            </div>


            <div class="img1_lty col-xl-8 col-12">
                <figure>
                    <a href="">
                        <img src="./img/4.jpg" alt="">
                    </a>
                </figure>
                <div class="slide_meta_lty p-5">
                    <span style="font-size:26px; color:#5E6472;line-height:36px;font-weight:700;">精選自由配</span>
                    <p style="font-size: 16px; line-height: 26px; margin-top: 8px; color: #5E6472;">
                        我們提供了各種行程，豐富多樣，讓您走遍
                        台灣的每個角落、體驗台灣之美
                    </p>
                    <div class="link1_lty">
                        <a href="#">查看更多</a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <link rel="stylesheet" href="./gototop.php">
    <footer></footer>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

    <!-- aos -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="./js/header.js"></script>


    <!-- <script type="text/javascript">
        $(".tab").each(function (index) {
            $(this).click(function (e) {
                triggletab();
                triigletabcontent();
                $(this).toggleClass("active");
                $(".tab-c")
                    .eq(index)
                    .toggleClass("active");
            });
        });
        //to remove all tab headers
        function triggletab() {
            $(".tab").each(function () {
                $(this).removeClass("active");
            });
        }

        //triggle the tab content
        function triigletabcontent() {
            $(".tab-c").each(function () {
                $(this).removeClass("active");
            });
        }
    </script> -->


    <script>
        AOS.init();
    </script>

    <script>
        $('#01').click(function() {
            event.preventDefault();
            $('#01').css('color', '#00A878').css('border-bottom', '3px solid #00A878');
            $('#02').css('color', '#ABADB2').css('border-bottom', '3px solid #ABADB2');
            $('#03').css('color', '#ABADB2').css('border-bottom', '3px solid #ABADB2');
            $('#04').css('color', '#ABADB2').css('border-bottom', '3px solid #ABADB2');
            $('#05').css('color', '#ABADB2').css('border-bottom', '3px solid #ABADB2');
            $('#her01').css('display', 'block');
            $('#her02').css('display', 'none')
            $('#her03').css('display', 'none')
            $('#her04').css('display', 'none')
            $('#her05').css('display', 'none')
        })
        $('#02').click(function() {
            event.preventDefault();
            $('#02').css('color', '#00A878').css('border-bottom', '3px solid #00A878');
            $('#01').css('color', '#ABADB2').css('border-bottom', '3px solid #ABADB2');
            $('#03').css('color', '#ABADB2').css('border-bottom', '3px solid #ABADB2');
            $('#04').css('color', '#ABADB2').css('border-bottom', '3px solid #ABADB2');
            $('#05').css('color', '#ABADB2').css('border-bottom', '3px solid #ABADB2');
            $('#her02').css('display', 'block');
            $('#her01').css('display', 'none')
            $('#her03').css('display', 'none')
            $('#her04').css('display', 'none')
            $('#her05').css('display', 'none')
        })
        $('#03').click(function() {
            event.preventDefault();
            $('#03').css('color', '#00A878').css('border-bottom', '3px solid #00A878');
            $('#01').css('color', '#ABADB2').css('border-bottom', '3px solid #ABADB2');
            $('#02').css('color', '#ABADB2').css('border-bottom', '3px solid #ABADB2');
            $('#04').css('color', '#ABADB2').css('border-bottom', '3px solid #ABADB2');
            $('#05').css('color', '#ABADB2').css('border-bottom', '3px solid #ABADB2');
            $('#her03').css('display', 'block');
            $('#her01').css('display', 'none')
            $('#her02').css('display', 'none')
            $('#her04').css('display', 'none')
            $('#her05').css('display', 'none')
        })
        $('#04').click(function() {
            event.preventDefault();
            $('#04').css('color', '#00A878').css('border-bottom', '3px solid #00A878');
            $('#01').css('color', '#ABADB2').css('border-bottom', '3px solid #ABADB2');
            $('#02').css('color', '#ABADB2').css('border-bottom', '3px solid #ABADB2');
            $('#03').css('color', '#ABADB2').css('border-bottom', '3px solid #ABADB2');
            $('#05').css('color', '#ABADB2').css('border-bottom', '3px solid #ABADB2');
            $('#her04').css('display', 'block');
            $('#her01').css('display', 'none')
            $('#her03').css('display', 'none')
            $('#her02').css('display', 'none')
            $('#her05').css('display', 'none')
        })
        $('#05').click(function() {
            event.preventDefault();
            $('#05').css('color', '#00A878').css('border-bottom', '3px solid #00A878');
            $('#01').css('color', '#ABADB2').css('border-bottom', '3px solid #ABADB2');
            $('#02').css('color', '#ABADB2').css('border-bottom', '3px solid #ABADB2');
            $('#03').css('color', '#ABADB2').css('border-bottom', '3px solid #ABADB2');
            $('#04').css('color', '#ABADB2').css('border-bottom', '3px solid #ABADB2');
            $('#her05').css('display', 'block');
            $('#her01').css('display', 'none')
            $('#her03').css('display', 'none')
            $('#her02').css('display', 'none')
            $('#her04').css('display', 'none')
        })

        // function number_format(n) {
        //     n += "";
        //     var arr = n.split(".");
        //     var re = /(\d{1,3})(?=(\d{3})+$)/g;
        //     return arr[0].replace(re,"$1,") + (arr.length == 2 ? "."+arr[1] : "");
        // }

        // 滾動到特定位置
        $('.js-anchor-link').click(function(e) {
            e.preventDefault();
            var target = $($(this).attr('href'));
            if (target.length) {
                var scrollTo = target.offset().top;
                $('body, html').animate({
                    scrollTop: scrollTo + 'px'
                }, 800);
            }
        });
    </script>

    <script>

    </script>
</body>

</html>