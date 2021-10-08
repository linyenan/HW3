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
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC:wght@100;300;400;500;700; 900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
  <link rel="stylesheet" href="./CSS_LBD/lightbox.min.css">
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

    /* --------------------------數量-------------------------------------- */
    .input-group {
      width: 150px !important;
    }

    /* --------------------------日曆-------------------------------------- */
    .daterangepicker td.active,
    .daterangepicker td.active:hover {
      background-color: #FF9F1C !important;
    }

    .daterangepicker td.end-date.active {
      background-color: #FF9F1C !important;
    }

    .daterangepicker td.in-range {
      background-color: #ffa01c4b !important;
    }

    .btn-primary {
      background-color: #FF9F1C !important;
    }
    #heart, #heart2 {
      color: grey;  
      font-size: 50px;
    }
    #heart.red, #heart2.red {
      color: red;
    }
  </style>
</head>

<body>

  <?php require_once 'header.php' ?>

  <div class="container">
    <div class="row d-none d-xl-block d-xl-flex" style="background-color: #E8E9E7; margin-top: 100px;">
      <div class="col-2">
        <div>
          <ul class="nav flex-column list-group">
            <li class="list-group-item" aria-current="true" style="font-size: 22px; color: white; text-align: center; background-color: #B1D660;">裝備小屋</li>
            <?php
              $sql = "SELECT * FROM `categories` WHERE `parent_id` = 21";
              $arr = $pdo->query($sql)->fetchAll();
              foreach ($arr as $obj) {
            ?>
              <li class="nav-item list-group-item">
                <a style="color: #B1D660; font-size: 22px;" class="nav-link" href="eq_house_buy.php?parent_id=21&cat_id=<?= $obj['id'] ?>"><?= $obj['cat_name'] ?></a>
              </li>
            <?php
            }
            ?>
          </ul>
        </div>
      </div>
      <?php
      if (isset($_GET['prod_id'])) {
        $sql = "SELECT * FROM `product` WHERE `id` = {$_GET['prod_id']}";
        $obj = $pdo->query($sql)->fetch();
      ?>
        <div class="col-6" style="text-align: center; position: relative;">
          <img src="./images/<?= $obj['prod_main_img'] ?>" alt="<?= $obj['prod_name'] ?>" title="<?= $obj['prod_name'] ?>" style="width: 630px; height: 630px;">
          <button id="zoom" class="btn btn-warning btn-outline-secondary" style="background-color: #5E6472; position: absolute; top: 590px; left: 730px;"><i class="fas fa-search-plus" style="color: white;"></i></button>
          <div>
            <?php
            $sql = "SELECT * FROM `products_img` WHERE `func` = 'zoom' AND `prod_id` = {$_GET['prod_id']}";
            $arr = $pdo->query($sql)->fetchAll();
            foreach ($arr as $objImg) {
            ?>
              <a data-lightbox="roadtrip" href="./images/<?= $objImg['filename'] ?>" style="display: none;">
                <img src="./images/<?= $objImg['filename'] ?>" class="img-thumbnail figure-img img-fluid rounded float-start m-1" style="width: 100px;" alt="...">
              </a>
            <?php
            }
            ?>
          </div>
        </div>
        <div class="col-4">
          <div class="card" style="width: 470px; margin-top: 110px;">
            <div class="card-body">
              <div>
                <span class="card-title" style="font-size: 26px; font-weight: bold;"><?= $obj['prod_name'] ?></span>
                <a href="#">
                  <i class="fa fa-heart" 
                      style="font-size: 26px;"
                      id="heart"
                      data-prod-id="<?= $obj['id'] ?>"
                      data-email="<?= $_SESSION['email'] ?>">
                  </i>
                </a>
              </div>
              <h6 class="card-subtitle mb-2 text-muted" style="font-size: 18px; margin-top: 10px;">TWD <span style="font-size: 36px; color: #FF9F1C; font-weight: bold;"><?= $obj['prod_price'] ?></span></h6>
              <img src="./SVG_LBD/star.svg" alt="">
              <hr>
              <div class="dropdown">
                <div class="input-group mb-3">
                  <button class="btn btn-outline-secondary" type="button" id="btn_minus"><i class="fas fa-minus"></i></button>
                  <input type="text" class="form-control" placeholder="" id="qty" value="1">
                  <button class="btn btn-outline-secondary" type="button" id="btn_plus"><i class="fas fa-plus"></i></button>
                </div>
              </div>
              <hr>
              <button class="btn btn-warning btn-outline-secondary" 
                      style="background-color: #5E6472; width: 200px; height: 60px; color: #ffffff; margin-right: 30px;" 
                      id="btn_set_cart" 
                      data-prod-id="<?= $obj['id'] ?>" 
                      data-prod-name="<?= $obj['prod_name'] ?>"
                      data-prod-description="<?= $obj['prod_description']?>"  
                      data-prod-main-img="<?= $obj['prod_main_img'] ?>" 
                      data-prod-price="<?= $obj['prod_price'] ?>" 
                      data-func-name="<?= $obj['func_name'] ?>">加入購物車
              </button>
              <button class="btn btn-warning" style="background-color: #FF9F1C; width: 200px; height: 60px; color: #ffffff;">立即下訂</button>
            </div>
          </div>
        </div>
      <?php
      }
      ?>
    </div>
    <!-- 手機版 -->
    <div class="d-block d-xl-none">
          <div style="margin-top: 20px; text-align: center;">
            <?php
            $sql = "SELECT * FROM `categories` WHERE `parent_id` = 17";
            $arr = $pdo->query($sql)->fetchAll();
            foreach($arr as $obj){
            ?>
              <a style="font-size: 18px; color: black; text-decoration: none;" href="eq_house_buy.php?parent_id=17&cat_id=<?= $obj['id'] ?>"><?= $obj['cat_name'] ?>/</a>
            <?php } ?>
          </div>
          <div style="position: relative;">
            <img src="./images/waterproof-red.jpeg" alt="" style="width: 100%; margin-top: 20px;">
            <button id="zoom2" class="btn btn-warning btn-outline-secondary" style="background-color: #5E6472; position: absolute; top: 350px; left: 320px;"><i class="fas fa-search-plus" style="color: white;"></i></button>
          </div>
          <div style="text-align: center; margin-top: 20px;">
            <a href="./images/waterproof-red.jpeg" data-lightbox="roadtrip2"  style="display: none;">
              <img src="./images/waterproof-red.jpeg" alt="">
            </a>
            <a href="./images/waterproof-inside-red.jpeg" data-lightbox="roadtrip2"  style="display: none;">
              <img src="./images/waterproof-inside-red.jpeg" alt="">
            </a>
            <a href="./images/waterproof-other-red.jpeg" data-lightbox="roadtrip2"  style="display: none;">
              <img src="./images/waterproof-other-red.jpeg" alt="">
            </a>
          </div>
          <?php
          if(isset($_GET['prod_id'])){
            $sql = "SELECT * FROM `product` WHERE `id` = {$_GET['prod_id']}";
            $obj = $pdo->query($sql)->fetch();
          ?>
      <div class="col">
        <div class="card" style="width: 366px; margin-top: 20px;">
          <div class="card-body" style="margin-top: 10px;">
            <div>
              <span class="card-title" style="font-size: 19px; font-weight: bold;"><?= $obj['prod_name'] ?></span>
              <a href="#">
                <i class="fa fa-heart" 
                    style="font-size: 26px;"
                    id="heart2"
                    data-prod-id="<?= $obj['id'] ?>"
                    data-email="<?= $_SESSION['email'] ?>">
                </i>
              </a>
            </div>
            <h6 class="card-subtitle mb-2 text-muted" style="font-size: 14px; margin-top: 10px;">TWD <span style="font-size: 24px; color: #FF9F1C; font-weight: bold;"><?= $obj['prod_price'] ?></span></h6>
            <img src="./SVG_LBD/star.svg" alt="" style="width: 100px;">
            <hr>
          <?php
        }
          ?>
          <div class="dropdown">
            <div class="input-group mb-3">
              <button class="btn btn-outline-secondary" type="button" id="btn_minus"><i class="fas fa-minus"></i></button>
              <input type="text" class="form-control" placeholder="" id="qty" value="1">
              <button class="btn btn-outline-secondary" type="button" id="btn_plus"><i class="fas fa-plus"></i></button>
            </div>
          </div>
          <hr>
          <div style="text-align: center;">
            <button class="btn btn-warning btn-outline-secondary" 
                    style="background-color: #5E6472; width: 180px; height: 40px; color: #ffffff;" 
                    id="btn_set_cart" 
                    data-prod-id="<?= $obj['id'] ?>" 
                    data-prod-name="<?= $obj['prod_name'] ?>"
                    data-prod-description="<?= $obj['prod_description']?>"  
                    data-prod-main-img="<?= $obj['prod_main_img'] ?>" 
                    data-prod-price="<?= $obj['prod_price'] ?>" 
                    data-func-name="<?= $obj['func_name'] ?>">加入購物車</button>
            <button class="btn btn-warning" style="background-color: #FF9F1C; width: 180px; height: 40px; color: #ffffff; margin-top: 10px;">立即下訂</button>
          </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row d-none d-xl-block d-xl-flex" style="text-align: center; margin-top: 100px;">
      <p style="font-size: 36px;">水上活動、釣魚和露營的理想選擇</p>
      <p style="font-size: 26px;">聚碳酸脂的外部材質非常耐用甚至是防碎的，因此它可以在惡劣的環境下存放</p>
    </div>
    <div class="row d-block d-xl-none" style="text-align: center; margin-top: 60px;">
      <p style="font-size: 24px;">水上活動、釣魚和露營的理想選擇</p>
      <p style="font-size: 16px;">聚碳酸脂的外部材質非常耐用甚至是防碎的，因此它可以在惡劣的環境下存放</p>
    </div>

    <div class="row d-none d-xl-block d-xl-flex" style="width: 1020px; margin: 50px 150px;">
      <div>
        <p style="font-size: 18px; font-weight: bold; border-bottom: 2px solid;">商品特色 | Product Features</p>
        <p style="font-size: 18px;">內部材質柔軟、柔韌，並能為您的物品提供柔和的緩衝。外部也有紋理，以便於抓握，如果您希望免持使用，也可套上隨附的腕帶。</p>
      </div>
      <div>
        <p style="font-size: 18px; font-weight: bold; border-bottom: 2px solid;">商品資訊 | Product Information</p>
        <p style="font-size: 18px;">
          -耐用的防碎聚碳酸酯結構<br>
          -IPX7水下一公尺防水 (30分鐘)<br>
          -外部紋理設計，便於抓握<br>
          -內部托盤可拆卸清洗<br>
          -洩壓閥設計
        </p>
      </div>
      <div>
        <p style="font-size: 18px; font-weight: bold; border-bottom: 2px solid;">旅人瘋真心話 | Wild Kids' Sincere Talk</p>
        <p style="font-size: 18px;">
          這款防水盒有2種尺寸供您選擇，可保護您的物品防塵、防水、防刮傷或割傷，是水上活動、釣魚和露營的理想選擇。中、小型硬盒可以收納駕照、信用卡、現金、首飾、隨身工具或鑰匙之類的物品。
        </p>
      </div>
      <div class="coi-3" style="padding-left: 1000px;">
        <img src="./SVG_LBD/more_mountain.svg" alt="">
      </div>
    </div>
    <div class="row d-block d-xl-none" style="width: 100%; margin-top: 50px; margin-left: 0;">
      <div>
        <p style="font-size: 18px; font-weight: bold; border-bottom: 2px solid;">商品特色 | Product Features</p>
        <p style="font-size: 16px;">內部材質柔軟、柔韌，並能為您的物品提供柔和的緩衝。外部也有紋理，以便於抓握，如果您希望免持使用，也可套上隨附的腕帶。</p>
      </div>
      <div>
        <p style="font-size: 18px; font-weight: bold; border-bottom: 2px solid;">商品資訊 | Product Information</p>
        <p style="font-size: 16px;">
          -耐用的防碎聚碳酸酯結構<br>
          -IPX7水下一公尺防水 (30分鐘)<br>
          -外部紋理設計，便於抓握<br>
          -內部托盤可拆卸清洗<br>
          -洩壓閥設計
        </p>
      </div>
      <div>
        <p style="font-size: 18px; font-weight: bold; border-bottom: 2px solid;">旅人瘋真心話 | Wild Kids' Sincere Talk</p>
        <p style="font-size: 16px;">
          這款防水盒有2種尺寸供您選擇，可保護您的物品防塵、防水、防刮傷或割傷，是水上活動、釣魚和露營的理想選擇。中、小型硬盒可以收納駕照、信用卡、現金、首飾、隨身工具或鑰匙之類的物品。
        </p>
      </div>
      <div class="col-3" style="padding-left: 190px;">
        <img src="./SVG_LBD/more_mountain.svg" alt="" style="width: 150px;">
      </div>
    </div>

    <div class="row d-none d-xl-block d-xl-flex">
            <div class="col-2">
                <div style="width: 50px; border-bottom: 3px solid #000000; padding-right: 100px;">
                    <h1 style="color: #000000">相關裝備</h1>
                </div>
            </div>
            <div id="carouselExampleControls" class="carousel slide col-10" data-bs-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <div class="card-group">
                        <div class="card">
                          <img src="./images_LBD/e-1.jpg" class="card-img-top" alt="...">
                          <div class="card-body">
                            <h5 class="card-title">Granite Gear 登山健行背包</h5>
                            <span class="card-text" style="position: relative;"><img src="./SVG_LBD/star.svg" alt=""></span>
                            <span class="card-text" style="position: absolute; top: 380px; left: 210px;">TWD <span style="color: #FF9F1C; font-weight: bold; font-size: 20px;">6,000</span></span>
                          </div>
                        </div>
                        <div class="card">
                          <img src="./images_LBD/e-2.jpg" class="card-img-top" alt="...">
                          <div class="card-body">
                            <h5 class="card-title">睡袋【紅】</h5>
                            <span class="card-text" style="position: relative;"><img src="./SVG_LBD/star.svg" alt=""></span>
                            <span class="card-text" style="position: absolute; top: 380px; left: 210px;">TWD <span style="color: #FF9F1C; font-weight: bold; font-size: 20px;">2,450</span></span>
                          </div>
                        </div>
                        <div class="card">
                          <img src="./images_LBD/e-3.jpg" class="card-img-top" alt="...">
                          <div class="card-body">
                            <h5 class="card-title">ADISI 魚雷浮標</h5>
                            <span class="card-text" style="position: relative;"><img src="./SVG_LBD/star.svg" alt=""></span>
                            <span class="card-text" style="position: absolute; top: 380px; left: 210px;">TWD <span style="color: #FF9F1C; font-weight: bold; font-size: 20px;">1,100</span></span>
                          </div>
                        </div>
                        <div class="card">
                          <img src="./images_LBD/e-4.jpg" class="card-img-top" alt="...">
                          <div class="card-body">
                            <h5 class="card-title">登山杖</h5>
                            <span class="card-text" style="position: relative;"><img src="./SVG_LBD/star.svg" alt=""></span>
                            <span class="card-text" style="position: absolute; top: 380px; left: 210px;">TWD <span style="color: #FF9F1C; font-weight: bold; font-size: 20px;">1,800</span></span>
                          </div>
                        </div>
                    </div>
                  </div>
                  <div class="carousel-item">
                    <div class="card-group">
                        <div class="card">
                          <img src="./images_LBD/e-5.jpg" class="card-img-top" alt="...">
                          <div class="card-body">
                            <h5 class="card-title">野營套鍋組  | 2~3人適用</h5>
                            <span class="card-text" style="position: relative;"><img src="./SVG_LBD/star.svg" alt=""></span>
                            <span class="card-text" style="position: absolute; top: 380px; left: 210px;">TWD <span style="color: #FF9F1C; font-weight: bold; font-size: 20px;">1,120</span></span>
                          </div>
                        </div>
                        <div class="card">
                          <img src="./images_LBD/e-6.jpg" class="card-img-top" alt="...">
                          <div class="card-body">
                            <h5 class="card-title">頭燈【黑】</h5>
                            <span class="card-text" style="position: relative;"><img src="./SVG_LBD/star.svg" alt=""></span>
                            <span class="card-text" style="position: absolute; top: 380px; left: 210px;">TWD <span style="color: #FF9F1C; font-weight: bold; font-size: 20px;">1,200</span></span>
                          </div>
                        </div>
                        <div class="card">
                          <img src="./images_LBD/e-7.jpg" class="card-img-top" alt="...">
                          <div class="card-body">
                            <h5 class="card-title">MYSTERY RANCH 登山背包19L</h5>
                            <span class="card-text" style="position: relative;"><img src="./SVG_LBD/star.svg" alt=""></span>
                            <span class="card-text" style="position: absolute; top: 380px; left: 210px;">TWD <span style="color: #FF9F1C; font-weight: bold; font-size: 20px;">6,000</span></span>
                          </div>
                        </div>
                        <div class="card">
                          <img src="./images_LBD/e-8.jpg" class="card-img-top" alt="...">
                          <div class="card-body">
                            <h5 class="card-title">MYSTERY RANCH 登山背包19L</h5>
                            <span class="card-text" style="position: relative;"><img src="./SVG_LBD/star.svg" alt=""></span>
                            <span class="card-text" style="position: absolute; top: 380px; left: 210px;">TWD <span style="color: #FF9F1C; font-weight: bold; font-size: 20px;">6,000</span></span>
                          </div>
                        </div>
                    </div>
                  </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev" style="position: absolute;
                top: 150px;
                left: -15px;
                background-color: #B1D660;
                height: 90px;
                width: 50px;">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next" style="position: absolute;
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
                    <h1 style="color: #000000; font-size: 24px">相關裝備</h1>
                </div>
            </div>
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel" style="width: 320px;">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <div class="card-group" style="display: flex;">
                        <div class="card col-6">
                          <img src="./images_LBD/e-1.jpg" class="card-img-top" alt="...">
                          <div class="card-body" style="height: 100px;">
                            <h5 class="card-title" style="font-size: 16px;">登山健行背包</h5>
                            <span class="card-text" style="position: relative;"><img src="./SVG_LBD/star.svg" alt="" width="100px;"></span>
                            <span class="card-text" style="position: absolute; top: 220px; left: 70px; font-size: 12px;">TWD <span style="color: #FF9F1C; font-weight: bold; font-size: 16px;">6,000</span></span>
                          </div>
                        </div>
                        <div class="card">
                          <img src="./images_LBD/e-2.jpg" class="card-img-top" alt="...">
                          <div class="card-body">
                            <h5 class="card-title" style="font-size: 16px;">睡袋【紅】</h5>
                            <span class="card-text" style="position: relative;"><img src="./SVG_LBD/star.svg" alt="" width="100px;"></span>
                            <span class="card-text" style="position: absolute; top: 220px; left: 70px; font-size: 12px;">TWD <span style="color: #FF9F1C; font-weight: bold; font-size: 16px;">2,450</span></span>
                          </div>
                        </div>                   
                    </div>
                  </div>
                  <div class="carousel-item">
                    <div class="card-group" style="display: flex;">
                      <div class="card col-6">
                        <img src="./images_LBD/e-5.jpg" class="card-img-top" alt="...">
                        <div class="card-body" style="height: 100px;">
                          <h5 class="card-title" style="font-size: 16px;">野營套鍋組</h5>
                          <span class="card-text" style="position: relative;"><img src="./SVG_LBD/star.svg" alt="" width="100px;"></span>
                          <span class="card-text" style="position: absolute; top: 220px; left: 70px; font-size: 12px;">TWD <span style="color: #FF9F1C; font-weight: bold; font-size: 16px;">1,120</span></span>
                        </div>
                      </div>
                      <div class="card">
                        <img src="./images_LBD/e-6.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title" style="font-size: 16px;">頭燈【黑</h5>
                          <span class="card-text" style="position: relative;"><img src="./SVG_LBD/star.svg" alt="" width="100px;"></span>
                          <span class="card-text" style="position: absolute; top: 220px; left: 70px; font-size: 12px;">TWD <span style="color: #FF9F1C; font-weight: bold; font-size: 16px;">1,200</span></span>
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

  <footer style="margin-top: 100px">

  </footer>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
  <script src="./JS_WCY/lightbox.min.js"></script>
  <script src="./JS_WCY/custom2.js"></script>
  <script src="./js/header.js"></script>
</body>

</html>