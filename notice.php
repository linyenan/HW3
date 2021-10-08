<?php require_once 'db.inc.php' ?>
<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>notice</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
        <link rel="stylesheet" href="./header.css">
    <link rel="stylesheet" href="./nav-footer.css">
    <!-- <link rel="stylesheet" href="./bootstrap-4.2.1-dist/css/bootstrap-grid.css"> -->
    <style>
        /* body{
            min-height:100vh;
        }

        footer{
            position:absolute;
            bottom:0;
        } */

        .titlename_lty {
            text-align: center;
            font-size: 36px;
            font-weight: 800;
        }

        .wrap_lty {
            width: 100%;
        }

        .rule_lty p {
            min-height: 320px;
        }



        .friday,
        .saturday,
        .sunday,
        .monday {
            border-radius: 50%;
            height: 144px;
            width: 144px;
            text-align: center;
            color: white;
            font-size: 30px;
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
        }

        .friday,
        .monday {
            background-color: #B1D660;
        }

        .saturday,
        .sunday {
            background-color: #ADE8F4;
        }



        .example_lty p {
            text-align: center;
            font-size: 36px;
            font-weight: 600;
        }

        .daylinewrap_lty {
            font-size: 26px;
            font-weight: 600;
            color: #707070;
            max-width: 800px;
            margin: 80px auto;
        }

        .img-wrap_lty {
            max-width: 300px;
        }

        .img-wrap_lty img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .btn-style-lty {
            border: 3px solid #FF9F1C;
            box-shadow: 3px 3px rgba(128, 128, 128, 0.507);
            border-radius: 5px;
        }

        .img-wrap2_lty {
            max-width: 100px;
        }

        .img-wrap2_lty img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .vh100{
            min-height:100vh;
        }
        @media screen and (max-width:575.99px) {
            

            .friday,
            .saturday,
            .sunday,
            .monday {
                border-radius: 50%;
                height: 80px;
                width: 80px;
                text-align: center;
                color: white;
                font-size: 20px;
                font-weight: 600;
                display: flex;
                align-items: center;
                justify-content: center;
                margin: 20px auto;

            }

            .vh100{
            min-height:627px;
            }
        }



        /* ---------------------------------------------------------------- */
        body {
            background-color: #FDFFF8;
        }

        .container {
            max-width: 1640px;
        }
    </style>
</head>

<body>
   
    <?php require_once 'header.php' ?>

    <div class="container">
        <div class="row vh100 d-xl-flex d-none" style="margin-top: 100px;">
            <div class="col-2 d-none d-xl-block">
                <div>
                    <p style="font-size: 18px;">首頁 / 裝備小屋 / 租賃</p>
                </div>
            </div>
            <div class="col-xl-10 d-none d-xl-block" style="padding-right: 0;">

                <p class="titlename_lty">租借須知</p>
                <div class="wrap_lty">
                    <div class="accordion" id="accordionExample">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h2 class="mb-0">
                                    <button class="btn button_style_lty" type="button" data-toggle="collapse"
                                        data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        租賃條約
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                data-parent="#accordionExample">
                                <div class="card-body">

                                    公司名稱：寶島旅人瘋<br>
                                    統一編號：83111111<br>
                                    代表人：林宗諭<br>
                                    E-mail : taiwan_travel@gmail.com 電話：( 02 ) 6636-6666<br>

                                    契約當事⼈
                                    1. 借出⽅寶島旅人瘋（以下簡稱甲⽅）及承租⽅（以下簡稱⼄⽅）茲為出租相關物品 ( 以下簡稱出租物件 ) ⼄事，雙⽅同意訂立本契約書。<br>
                                    2. 承租⽅需為年滿20歲以上之中華⺠國國⺠或依中華⺠國法律設立登記之公司⾏號。<br>
                                    租⾦及費⽤計算<br>
                                    「租賃時間」：⼄⽅租⽤甲⽅裝備時，租期基價為兩天⼀夜計算，租⾦價格請⾒租⾦表。<br>
                                    「訂⾦條款」：訂金即為所需租賃裝備的租金總額<br>
                                    「押⾦條款」：租⽤裝備時須依租⾦表所⽰規定⾦額預付押⾦或是抵押證件（甲⽅不得以拿證件做任意⽤途）。<br>
                                    「押⾦退款」：歸還出租物件 ( 須達檢定標準 ) 後，店⾯即刻退還押⾦（除了需要展開或檢查比較久的裝備）。<br>
                                    「賠償⾦額」：甲⽅有權直接⾃押⾦中扣除或追索相關賠償因租賃關係所⽣之⼀切債權、損害賠償及逾期產⽣之費⽤。如出租物件賠償額⾼於押⾦，⼄⽅應負償還之責不得有異。出租物件歸還過程，甲⽅將會進⾏簡單點檢以茲確認是否有損害相關賠償事宜。然如果出租物件屬於需要展開才能發現問題之品項，如帳篷、天幕、地布、、、等。由於礙於展開空間以及避免耽誤客⼾時間，故甲⽅有權利進⾏五天內因客⼾租賃關係產⽣的出租物件使⽤損害賠償損失之追討，甲⽅將會拍攝下出租物件損耗之處進⾏報價，⼄⽅得以同意後續賠償之事宜。
                                    租賃訂單成立<br>
                                    乙方確認所需租賃的裝備後，告知甲方，待甲方確認乙方所需租賃的裝備均有庫存後，乙方需於當日將所需租賃的裝備租金總額匯至甲方戶頭，而甲方於收到乙方所需租賃的出租物件租金總額後，此訂單方成立。<br>
                                    取貨與歸還時間及逾時歸還費用計算<br>
                                    可於指定租借⽇期的16點後前往⾨市取出租物件，並於歸還日期的19點前歸還出租物件。延遲歸還者，若於歸還日期當日21點營業結束前歸還，以「伍拾元」乘上逾期歸還的出租物件數量計算延遲費⽤；若於歸還日期過後歸還，視實際歸還⽇期，以「該出租物件兩天一夜方案的半價」乘上逾期天數計算延遲費⽤。<br>
                                    領取裝備的注意事項<br>
                                    ⾃⾏取件者，請當場檢查出租物件情況，經確認無誤並簽收後，始得領取出租物件。租賃取貨時會進⾏簡易點檢，請客⼾務必針對可能性問題在離場店⾯前進⾏相關諮詢與⾃⾏點檢確認，經離場店⾯後，由於無法逕⾏判定出租物件損壞是否為⼈為因素等，故無法認列本公司出租物件損壞之責為甲⽅，因此歸還出租物件如有損壞將請客⼾逕⾏賠償。甲⽅每次出租物件前，均經過專⼈清潔、維護及保養，出租物件非全新品，凡有正常磨損、汙漬，不影響使⽤功能及安全者，不視為瑕疵。取貨當天無法進⾏租賃契約出租物件項⽬更改，如乙方無法承租出租物件⼀律收取租賃⾦全額，並不得更換等價出租物件抵銷原出租物件的租賃⾦。出租物件歸還時有毀損、遺失、非⼀般正常使⽤所產⽣的髒汙
                                    ( 意指無法或者難以清理等狀態 ) 、損壞等情形，⼄⽅應照價維修或賠償。<br>
                                    注意：照價泛指當時出租物件新品的市場價格。<br>
                                    出租物件如有未達點檢標準，將會收取相關賠償及服務費等並於押⾦中扣款。如押⾦不⾜賠償費甲⽅得以向⼄⽅索償另外的費⽤。出租物件⼀經取貨離場，無論有無使⽤該出租物件，不得要求退貨及退款。租賃取/還貨，請依照⾨市營業時間，到店取/還貨，如超過或未達營業時間，不得取/還貨，⼀概產⽣費⽤與相關責任，請⾃⾏負擔。因取貨過程皆有點檢，歸還過程不得以商品有瑕疵為由⽽不賠償損害之責。<br>
                                    退訂說明<br>
                                    1. 因不可抗之天然因素，如颱風、地震等並且由政府公告停班停課 ( 不含⼤雨或營主退訂營位等因素
                                    )，得以退還全額訂⾦；請於政府公告後三天內，⾃⾏⾄甲⽅官⽅ｌｉｎｅ主動取消訂單，並提供銀⾏款資訊（非⽟⼭扣15元⼿續費），如無⾃⾏取消訂單，視同放棄退款權利。<br>
                                    2.
                                    一般退訂於租借日期前十五日取消，訂金將全額退還；租借日期前八日前至十四日取消，予以退還訂金之八成；租借日期前四日前至七日取消，予以退還訂金之五成；租借日期前一日至三日取消，予以退還訂金之兩成；當日取消，予不退還訂金。<br>
                                    退款⽅式：非⽟⼭銀⾏帳號收取退款，退匯過程將會扣除給予銀⾏⼿續費15元為其退款⾦額。<br>
                                    租賃品點檢說明<br>
                                    點檢過程皆會有監視器全程錄影存證，領取出租物件點檢至領取出租物件時將會由⼈員與乙方點檢出租物件等相關事宜說明，部份配件請乙方於點檢時確認功能性以保障租賃者權益，乙方如點檢過程沒有注意⽽導致使⽤以及後續商品有損耗題，將列入賠償費⽤。歸還出租物件點檢至歸還出租物件需無汙
                                    ( 意指無法或者難以清理等狀態 )
                                    ，無損與數量無誤等。出租物件如有未達出租物件點檢標準，將會收取相關賠償及服務費等並於押⾦中扣款。出租物件損毀導至無法繼續承租條件，則視同出租物件整組損毀需以當時出租物件價格之原價賠償。乙方應依⼀般物品之通常使⽤⽅式操作出租裝備，非依常規使⽤裝備所產⽣之危險及損害甲方不負賠償責任。<br>
                                    保管義務<br>
                                    ⼄⽅應盡善良管理⼈之注意義務保管及維護出租物件，禁⽌轉租、出賣、設質、抵押、讓與、擔保、典當出租物件等⾏為。租賃期間出租物件及相關配件之所有權仍歸屬甲⽅，本契約僅係將出租物件及相關配件在約定期間內租賃予⼄⽅使⽤，⼄⽅並不取得其他任何權利。<br>
                                    賠償說明<br>
                                    歸還出租物件如無達租賃品點檢標準 ( 如上說明 )<br>
                                    ，須賠償相關費⽤，其費⽤將由甲⽅既定價格⾏⽀付，如其損害出租物件程度為無法使之繼續營運承租之商品，則需要整組商品照市價原價進⾏賠償，不得以等值產品或者商品進⾏賠償；更不得以商品預估殘值進⾏償還或不償還等規避責任。歸還出租物件時，如出租物件損壞需原廠評估報價維修費⽤進⾏賠償，甲⽅有權暫時扣留押⾦，待確認賠償⾦額時，扣除賠償⾦及維修期間的裝備使用費，其餘才歸還乙方。歸還出租物件五天內發現有損壞，甲⽅有權逕向乙方求償應盡的損害費⽤。維修期間視同續租，租期從歸還開始⾄維修完成寄回⽇為⽌。遺失必須在歸還⽇後三天內結清款項，否則視同續租，租期為歸還⽇⾄結清款項為⽌。如租⽤裝備使⽤過程中，產⽣意外事故，致使受傷、死亡等，⼀概與甲⽅無關，不得要求任何賠償。<br>
                                    完整契約<br>
                                    除本約定條款外，商品銷售網⾴及訂購流程中相關網⾴上所呈現之相關資訊，包括相關交易條件、限制及說明等，亦為契約之⼀部分。<br>
                                    合意管轄<br>
                                    本契約如有未盡事宜，甲、⼄雙⽅依相關法令、習慣及誠信原則協議之。若因本契約發⽣訴訟時，甲⼄雙⽅同意以臺灣臺北地⽅法院為第⼀審管轄法院。<br>
                                    ＊裝備若有損壞，皆須負賠償責任<br>
                                    ＊頭燈皆沒有附電池，請⾃⾏購買，4 號電池4顆。<br>
                                    ＊爐具皆沒有附⾼⼭瓦斯，請⾃⾏購買，不會組裝請遵循甲方員工的教學，<br>
                                    ＊因乙方沒有組裝好產⽣氣爆火災傷害，甲方皆不賦予賠償責任。<br>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <h2 class="mb-0">
                                    <button class="btn collapsed button_style_lty" type="button" data-toggle="collapse"
                                        data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        租借流程
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                data-parent="#accordionExample">
                                <div class="card-body">
                                    STEP 1. 選取您需要的裝備數量加入購物車，確認無誤後點選前往結帳。<br>

                                    STEP 2. 填寫訂購人資料及租借/歸還日期，確認無誤送出後，加官方告知訂單編號。<br>
                                    STEP 3.
                                    等待寶島旅人瘋小編確認您的預訂單所使用裝備的期間是否有庫存，會以LINE或電話跟您確認所需的裝備均有庫存後，再煩請您於當日午夜12點前將所需的裝備租金總額匯至我們的戶頭，待我們收到款項後會再告知該訂單完成。(
                                    約2個工作天內完成 )<br>

                                    STEP 4. 確認訂單成立後，於租借日攜帶證件或押金來店領取，當場清點所租借之品項。<br>

                                    STEP 5. 歸還裝備時，須現場清點所租借之品項無誤。<br>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingThree">
                                <h2 class="mb-0">
                                    <button class="btn  collapsed button_style_lty" type="button" data-toggle="collapse"
                                        data-target="#collapseThree" aria-expanded="false"
                                        aria-controls="collapseThree">
                                        租借範例
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                data-parent="#accordionExample">
                                <div class="card-body example_lty ">
                                    <p>六日兩天一夜</p>

                                    <div class="day_wrap">
                                        <div class="d-flex" style="max-width: 800px; margin: 0 auto;">
                                            <div class="friday">週五</div>
                                            <div class="saturday">週六</div>
                                            <div class="sunday">週日</div>
                                            <div class="monday">週一</div>
                                        </div>
                                    </div>

                                    <div class="d-flex daylinewrap_lty">
                                        <div class="col-3" style="text-align: center;">16:00前宅配到府</div>
                                        <div class="col-6 pl-xl-3">
                                            --------------------------------></div>

                                        <div class="col-3" style="text-align: center;">10:00前送回 </div>
                                    </div>
                                    <div class="img-wrap_lty d-flex ">
                                        <img src="./SVG/eq_fire.svg" alt="" class="col">
                                        <img src="./SVG/eq_goggles.svg" alt="" class="col">
                                        <img src="./SVG/eq_gopro.svg" alt="" class="col">
                                        <img src="./SVG/eq_pack.svg" alt="" class="col">
                                        <img src="./SVG/eq_shoe.svg" alt="" class="col">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>

        <div class="row d-block d-xl-none vh100">
            <p style="text-align: center;font-size: 24px;font-weight: 700;">租借須知</p>
            <p class="d-flex flex-wrap justify-content-center">
                <a class="btn btn-style-lty  btn-sm col-12" data-toggle="collapse" href="#collapseExample" role="button"
                    aria-expanded="false" aria-controls="collapseExample" style="margin: 5px;width: 200px;">
                    租賃條約
                </a>
                <a class="btn btn-style-lty btn-sm col-12" data-toggle="collapse" href="#collapseExample2" role="button"
                    aria-expanded="false" aria-controls="collapseExample" style="margin: 5px;width: 200px;">
                    租借流程
                </a>
                <a class="btn btn-style-lty btn-sm col-12" data-toggle="collapse" href="#collapseExample3" role="button"
                    aria-expanded="false" aria-controls="collapseExample" style="margin: 5px;width: 200px;">
                    租借範例
                </a>

            </p>
            <div class="collapse" id="collapseExample">
                <div class="card card-body">
                    公司名稱：野孩子的生活股份有限公司<br>
                    統一編號：83143567<br>
                    代表人：郭昭慶<br>
                    E-mail : info@wildkidslife.com 電話：( 02 ) 2732-1314<br>

                    契約當事⼈
                    1. 借出⽅野孩⼦的⽣活股份有限公司（以下簡稱甲⽅）及承租⽅（以下簡稱⼄⽅）茲為出租相關物品 ( 以下簡稱出租物件 ) ⼄事，雙⽅同意訂立本契約書。<br>
                    2. 承租⽅需為年滿20歲以上之中華⺠國國⺠或依中華⺠國法律設立登記之公司⾏號。<br>
                    租⾦及費⽤計算<br>
                    「租賃時間」：⼄⽅租⽤甲⽅裝備時，租期基價為兩天⼀夜計算，租⾦價格請⾒租⾦表。<br>
                    「訂⾦條款」：訂金即為所需租賃裝備的租金總額<br>
                    「押⾦條款」：租⽤裝備時須依租⾦表所⽰規定⾦額預付押⾦或是抵押證件（甲⽅不得以拿證件做任意⽤途）。<br>
                    「押⾦退款」：歸還出租物件 ( 須達檢定標準 ) 後，店⾯即刻退還押⾦（除了需要展開或檢查比較久的裝備）。<br>
                    「賠償⾦額」：甲⽅有權直接⾃押⾦中扣除或追索相關賠償因租賃關係所⽣之⼀切債權、損害賠償及逾期產⽣之費⽤。如出租物件賠償額⾼於押⾦，⼄⽅應負償還之責不得有異。出租物件歸還過程，甲⽅將會進⾏簡單點檢以茲確認是否有損害相關賠償事宜。然如果出租物件屬於需要展開才能發現問題之品項，如帳篷、天幕、地布、、、等。由於礙於展開空間以及避免耽誤客⼾時間，故甲⽅有權利進⾏五天內因客⼾租賃關係產⽣的出租物件使⽤損害賠償損失之追討，甲⽅將會拍攝下出租物件損耗之處進⾏報價，⼄⽅得以同意後續賠償之事宜。
                    租賃訂單成立<br>
                    乙方確認所需租賃的裝備後，告知甲方，待甲方確認乙方所需租賃的裝備均有庫存後，乙方需於當日將所需租賃的裝備租金總額匯至甲方戶頭，而甲方於收到乙方所需租賃的出租物件租金總額後，此訂單方成立。<br>
                    取貨與歸還時間及逾時歸還費用計算<br>
                    可於指定租借⽇期的16點後前往⾨市取出租物件，並於歸還日期的19點前歸還出租物件。延遲歸還者，若於歸還日期當日21點營業結束前歸還，以「伍拾元」乘上逾期歸還的出租物件數量計算延遲費⽤；若於歸還日期過後歸還，視實際歸還⽇期，以「該出租物件兩天一夜方案的半價」乘上逾期天數計算延遲費⽤。<br>
                    領取裝備的注意事項<br>
                    ⾃⾏取件者，請當場檢查出租物件情況，經確認無誤並簽收後，始得領取出租物件。租賃取貨時會進⾏簡易點檢，請客⼾務必針對可能性問題在離場店⾯前進⾏相關諮詢與⾃⾏點檢確認，經離場店⾯後，由於無法逕⾏判定出租物件損壞是否為⼈為因素等，故無法認列本公司出租物件損壞之責為甲⽅，因此歸還出租物件如有損壞將請客⼾逕⾏賠償。甲⽅每次出租物件前，均經過專⼈清潔、維護及保養，出租物件非全新品，凡有正常磨損、汙漬，不影響使⽤功能及安全者，不視為瑕疵。取貨當天無法進⾏租賃契約出租物件項⽬更改，如乙方無法承租出租物件⼀律收取租賃⾦全額，並不得更換等價出租物件抵銷原出租物件的租賃⾦。出租物件歸還時有毀損、遺失、非⼀般正常使⽤所產⽣的髒汙
                    ( 意指無法或者難以清理等狀態 ) 、損壞等情形，⼄⽅應照價維修或賠償。<br>
                    注意：照價泛指當時出租物件新品的市場價格。<br>
                    出租物件如有未達點檢標準，將會收取相關賠償及服務費等並於押⾦中扣款。如押⾦不⾜賠償費甲⽅得以向⼄⽅索償另外的費⽤。出租物件⼀經取貨離場，無論有無使⽤該出租物件，不得要求退貨及退款。租賃取/還貨，請依照⾨市營業時間，到店取/還貨，如超過或未達營業時間，不得取/還貨，⼀概產⽣費⽤與相關責任，請⾃⾏負擔。因取貨過程皆有點檢，歸還過程不得以商品有瑕疵為由⽽不賠償損害之責。<br>
                    退訂說明<br>
                    1. 因不可抗之天然因素，如颱風、地震等並且由政府公告停班停課 ( 不含⼤雨或營主退訂營位等因素
                    )，得以退還全額訂⾦；請於政府公告後三天內，⾃⾏⾄甲⽅官⽅ｌｉｎｅ主動取消訂單，並提供銀⾏款資訊（非⽟⼭扣15元⼿續費），如無⾃⾏取消訂單，視同放棄退款權利。<br>
                    2.
                    一般退訂於租借日期前十五日取消，訂金將全額退還；租借日期前八日前至十四日取消，予以退還訂金之八成；租借日期前四日前至七日取消，予以退還訂金之五成；租借日期前一日至三日取消，予以退還訂金之兩成；當日取消，予不退還訂金。<br>
                    退款⽅式：非⽟⼭銀⾏帳號收取退款，退匯過程將會扣除給予銀⾏⼿續費15元為其退款⾦額。<br>
                    租賃品點檢說明<br>
                    點檢過程皆會有監視器全程錄影存證，領取出租物件點檢至領取出租物件時將會由⼈員與乙方點檢出租物件等相關事宜說明，部份配件請乙方於點檢時確認功能性以保障租賃者權益，乙方如點檢過程沒有注意⽽導致使⽤以及後續商品有損耗題，將列入賠償費⽤。歸還出租物件點檢至歸還出租物件需無汙
                    ( 意指無法或者難以清理等狀態 )
                    ，無損與數量無誤等。出租物件如有未達出租物件點檢標準，將會收取相關賠償及服務費等並於押⾦中扣款。出租物件損毀導至無法繼續承租條件，則視同出租物件整組損毀需以當時出租物件價格之原價賠償。乙方應依⼀般物品之通常使⽤⽅式操作出租裝備，非依常規使⽤裝備所產⽣之危險及損害甲方不負賠償責任。<br>
                    保管義務<br>
                    ⼄⽅應盡善良管理⼈之注意義務保管及維護出租物件，禁⽌轉租、出賣、設質、抵押、讓與、擔保、典當出租物件等⾏為。租賃期間出租物件及相關配件之所有權仍歸屬甲⽅，本契約僅係將出租物件及相關配件在約定期間內租賃予⼄⽅使⽤，⼄⽅並不取得其他任何權利。<br>
                    賠償說明<br>
                    歸還出租物件如無達租賃品點檢標準 ( 如上說明 )<br>
                    ，須賠償相關費⽤，其費⽤將由甲⽅既定價格⾏⽀付，如其損害出租物件程度為無法使之繼續營運承租之商品，則需要整組商品照市價原價進⾏賠償，不得以等值產品或者商品進⾏賠償；更不得以商品預估殘值進⾏償還或不償還等規避責任。歸還出租物件時，如出租物件損壞需原廠評估報價維修費⽤進⾏賠償，甲⽅有權暫時扣留押⾦，待確認賠償⾦額時，扣除賠償⾦及維修期間的裝備使用費，其餘才歸還乙方。歸還出租物件五天內發現有損壞，甲⽅有權逕向乙方求償應盡的損害費⽤。維修期間視同續租，租期從歸還開始⾄維修完成寄回⽇為⽌。遺失必須在歸還⽇後三天內結清款項，否則視同續租，租期為歸還⽇⾄結清款項為⽌。如租⽤裝備使⽤過程中，產⽣意外事故，致使受傷、死亡等，⼀概與甲⽅無關，不得要求任何賠償。<br>
                    完整契約<br>
                    除本約定條款外，商品銷售網⾴及訂購流程中相關網⾴上所呈現之相關資訊，包括相關交易條件、限制及說明等，亦為契約之⼀部分。<br>
                    合意管轄<br>
                    本契約如有未盡事宜，甲、⼄雙⽅依相關法令、習慣及誠信原則協議之。若因本契約發⽣訴訟時，甲⼄雙⽅同意以臺灣臺北地⽅法院為第⼀審管轄法院。<br>
                    ＊裝備若有損壞，皆須負賠償責任<br>
                    ＊頭燈皆沒有附電池，請⾃⾏購買，4 號電池4顆。<br>
                    ＊爐具皆沒有附⾼⼭瓦斯，請⾃⾏購買，不會組裝請遵循甲方員工的教學，<br>
                    ＊因乙方沒有組裝好產⽣氣爆火災傷害，甲方皆不賦予賠償責任。<br>
                </div>
            </div>
            <div class="collapse" id="collapseExample2">
                <div class="card card-body">
                    STEP 1. 選取您需要的裝備數量加入購物車，確認無誤後點選前往結帳。<br>

                    STEP 2. 填寫訂購人資料及租借/歸還日期，確認無誤送出後，加官方告知訂單編號。<br>
                    STEP 3.
                    等待野孩子小編確認您的預訂單所使用裝備的期間是否有庫存，會以LINE或電話跟您確認所需的裝備均有庫存後，再煩請您於當日午夜12點前將所需的裝備租金總額匯至我們的戶頭，待我們收到款項後會再告知該訂單完成。(
                    約2個工作天內完成 )<br>

                    STEP 4. 確認訂單成立後，於租借日攜帶證件或押金來店領取，當場清點所租借之品項。<br>

                    STEP 5. 歸還裝備時，須現場清點所租借之品項無誤。<br>
                </div>
            </div>
            <div class="collapse" id="collapseExample3">
                <div class="card card-body">
                    <p style="text-align: center;margin: 5px;font-size: 26px; font-weight: 700;">六日兩天一夜</p>
                    <div class="card-body example_lty d-flex">


                        <div class="day_wrap d-flex align-items-center">
                            <div class="d-flex flex-column " style="margin: 0 auto;">
                                <div class="friday">週五</div>
                                <div class="saturday">週六</div>
                                <div class="sunday">週日</div>
                                <div class="monday">週一</div>
                            </div>
                        </div>

                        <div class="daylinewrap_lty">
                            <div class="d-block" style="text-align: center;">16:00前宅配到府</div>
                            <div class="d-block img-wrap2_lty">
                                <img src="./SVG/eq_fire.svg" alt="">
                            </div>
                            <div class="d-block img-wrap2_lty">
                                <img src="./SVG/eq_goggles.svg" alt="">
                            </div>
                            <div class="d-block img-wrap2_lty">
                                <img src="./SVG/eq_pack.svg" alt="">
                            </div>
                            <div class="d-block" style="text-align: center;">10:00前送回 </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer>
        
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
        integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
        integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
        crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
    
    <script src="./js/header.js"></script>

</body>

</html>