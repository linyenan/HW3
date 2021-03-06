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

    /* --------------------------ζΈι-------------------------------------- */
    .input-group {
      width: 150px !important;
    }

    /* --------------------------ζ₯ζ-------------------------------------- */
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
            <li class="list-group-item" aria-current="true" style="font-size: 22px; color: white; text-align: center; background-color: #B1D660;">θ£εε°ε±</li>
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
                      data-func-name="<?= $obj['func_name'] ?>">ε ε₯θ³Όη©θ»
              </button>
              <button class="btn btn-warning" style="background-color: #FF9F1C; width: 200px; height: 60px; color: #ffffff;">η«ε³δΈθ¨</button>
            </div>
          </div>
        </div>
      <?php
      }
      ?>
    </div>
    <!-- ζζ©η -->
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
                    data-func-name="<?= $obj['func_name'] ?>">ε ε₯θ³Όη©θ»</button>
            <button class="btn btn-warning" style="background-color: #FF9F1C; width: 180px; height: 40px; color: #ffffff; margin-top: 10px;">η«ε³δΈθ¨</button>
          </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row d-none d-xl-block d-xl-flex" style="text-align: center; margin-top: 100px;">
      <p style="font-size: 36px;">ζ°΄δΈζ΄»εγι£ι­ει²ηηηζ³ιΈζ</p>
      <p style="font-size: 26px;">θη’³ιΈθηε€ι¨ζθ³ͺιεΈΈθη¨ηθ³ζ―ι²η’ηοΌε ζ­€ε?ε―δ»₯ε¨ζ‘ε£ηη°ε’δΈε­ζΎ</p>
    </div>
    <div class="row d-block d-xl-none" style="text-align: center; margin-top: 60px;">
      <p style="font-size: 24px;">ζ°΄δΈζ΄»εγι£ι­ει²ηηηζ³ιΈζ</p>
      <p style="font-size: 16px;">θη’³ιΈθηε€ι¨ζθ³ͺιεΈΈθη¨ηθ³ζ―ι²η’ηοΌε ζ­€ε?ε―δ»₯ε¨ζ‘ε£ηη°ε’δΈε­ζΎ</p>
    </div>

    <div class="row d-none d-xl-block d-xl-flex" style="width: 1020px; margin: 50px 150px;">
      <div>
        <p style="font-size: 18px; font-weight: bold; border-bottom: 2px solid;">εεηΉθ² | Product Features</p>
        <p style="font-size: 18px;">ε§ι¨ζθ³ͺζθ»γζιοΌδΈ¦θ½ηΊζ¨ηη©εζδΎζεηη·©θ‘γε€ι¨δΉζη΄ηοΌδ»₯δΎΏζΌζζ‘οΌε¦ζζ¨εΈζεζδ½Ώη¨οΌδΉε―ε₯δΈι¨ιηθεΈΆγ</p>
      </div>
      <div>
        <p style="font-size: 18px; font-weight: bold; border-bottom: 2px solid;">εεθ³θ¨ | Product Information</p>
        <p style="font-size: 18px;">
          -θη¨ηι²η’θη’³ιΈι―η΅ζ§<br>
          -IPX7ζ°΄δΈδΈε¬ε°Ίι²ζ°΄ (30ει)<br>
          -ε€ι¨η΄ηθ¨­θ¨οΌδΎΏζΌζζ‘<br>
          -ε§ι¨ζη€ε―ζεΈζΈζ΄<br>
          -ζ΄©ε£ι₯θ¨­θ¨
        </p>
      </div>
      <div>
        <p style="font-size: 18px; font-weight: bold; border-bottom: 2px solid;">ζδΊΊηηεΏθ©± | Wild Kids' Sincere Talk</p>
        <p style="font-size: 18px;">
          ιζ¬Ύι²ζ°΄ηζ2η¨?ε°Ίε―ΈδΎζ¨ιΈζοΌε―δΏθ­·ζ¨ηη©ει²ε‘΅γι²ζ°΄γι²ε?ε·ζε²ε·οΌζ―ζ°΄δΈζ΄»εγι£ι­ει²ηηηζ³ιΈζγδΈ­γε°εη‘¬ηε―δ»₯ζΆη΄ι§η§γδΏ‘η¨ε‘γηΎιγι¦ι£Ύγι¨θΊ«ε·₯ε·ζι°εδΉι‘ηη©εγ
        </p>
      </div>
      <div class="coi-3" style="padding-left: 1000px;">
        <img src="./SVG_LBD/more_mountain.svg" alt="">
      </div>
    </div>
    <div class="row d-block d-xl-none" style="width: 100%; margin-top: 50px; margin-left: 0;">
      <div>
        <p style="font-size: 18px; font-weight: bold; border-bottom: 2px solid;">εεηΉθ² | Product Features</p>
        <p style="font-size: 16px;">ε§ι¨ζθ³ͺζθ»γζιοΌδΈ¦θ½ηΊζ¨ηη©εζδΎζεηη·©θ‘γε€ι¨δΉζη΄ηοΌδ»₯δΎΏζΌζζ‘οΌε¦ζζ¨εΈζεζδ½Ώη¨οΌδΉε―ε₯δΈι¨ιηθεΈΆγ</p>
      </div>
      <div>
        <p style="font-size: 18px; font-weight: bold; border-bottom: 2px solid;">εεθ³θ¨ | Product Information</p>
        <p style="font-size: 16px;">
          -θη¨ηι²η’θη’³ιΈι―η΅ζ§<br>
          -IPX7ζ°΄δΈδΈε¬ε°Ίι²ζ°΄ (30ει)<br>
          -ε€ι¨η΄ηθ¨­θ¨οΌδΎΏζΌζζ‘<br>
          -ε§ι¨ζη€ε―ζεΈζΈζ΄<br>
          -ζ΄©ε£ι₯θ¨­θ¨
        </p>
      </div>
      <div>
        <p style="font-size: 18px; font-weight: bold; border-bottom: 2px solid;">ζδΊΊηηεΏθ©± | Wild Kids' Sincere Talk</p>
        <p style="font-size: 16px;">
          ιζ¬Ύι²ζ°΄ηζ2η¨?ε°Ίε―ΈδΎζ¨ιΈζοΌε―δΏθ­·ζ¨ηη©ει²ε‘΅γι²ζ°΄γι²ε?ε·ζε²ε·οΌζ―ζ°΄δΈζ΄»εγι£ι­ει²ηηηζ³ιΈζγδΈ­γε°εη‘¬ηε―δ»₯ζΆη΄ι§η§γδΏ‘η¨ε‘γηΎιγι¦ι£Ύγι¨θΊ«ε·₯ε·ζι°εδΉι‘ηη©εγ
        </p>
      </div>
      <div class="col-3" style="padding-left: 190px;">
        <img src="./SVG_LBD/more_mountain.svg" alt="" style="width: 150px;">
      </div>
    </div>

    <div class="row d-none d-xl-block d-xl-flex">
            <div class="col-2">
                <div style="width: 50px; border-bottom: 3px solid #000000; padding-right: 100px;">
                    <h1 style="color: #000000">ηΈιθ£ε</h1>
                </div>
            </div>
            <div id="carouselExampleControls" class="carousel slide col-10" data-bs-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <div class="card-group">
                        <div class="card">
                          <img src="./images_LBD/e-1.jpg" class="card-img-top" alt="...">
                          <div class="card-body">
                            <h5 class="card-title">Granite Gear η»ε±±ε₯θ‘θε</h5>
                            <span class="card-text" style="position: relative;"><img src="./SVG_LBD/star.svg" alt=""></span>
                            <span class="card-text" style="position: absolute; top: 380px; left: 210px;">TWD <span style="color: #FF9F1C; font-weight: bold; font-size: 20px;">6,000</span></span>
                          </div>
                        </div>
                        <div class="card">
                          <img src="./images_LBD/e-2.jpg" class="card-img-top" alt="...">
                          <div class="card-body">
                            <h5 class="card-title">η‘θ’γη΄γ</h5>
                            <span class="card-text" style="position: relative;"><img src="./SVG_LBD/star.svg" alt=""></span>
                            <span class="card-text" style="position: absolute; top: 380px; left: 210px;">TWD <span style="color: #FF9F1C; font-weight: bold; font-size: 20px;">2,450</span></span>
                          </div>
                        </div>
                        <div class="card">
                          <img src="./images_LBD/e-3.jpg" class="card-img-top" alt="...">
                          <div class="card-body">
                            <h5 class="card-title">ADISI ι­ι·ζ΅?ζ¨</h5>
                            <span class="card-text" style="position: relative;"><img src="./SVG_LBD/star.svg" alt=""></span>
                            <span class="card-text" style="position: absolute; top: 380px; left: 210px;">TWD <span style="color: #FF9F1C; font-weight: bold; font-size: 20px;">1,100</span></span>
                          </div>
                        </div>
                        <div class="card">
                          <img src="./images_LBD/e-4.jpg" class="card-img-top" alt="...">
                          <div class="card-body">
                            <h5 class="card-title">η»ε±±ζ</h5>
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
                            <h5 class="card-title">ιηε₯ιη΅ Β | 2~3δΊΊι©η¨</h5>
                            <span class="card-text" style="position: relative;"><img src="./SVG_LBD/star.svg" alt=""></span>
                            <span class="card-text" style="position: absolute; top: 380px; left: 210px;">TWD <span style="color: #FF9F1C; font-weight: bold; font-size: 20px;">1,120</span></span>
                          </div>
                        </div>
                        <div class="card">
                          <img src="./images_LBD/e-6.jpg" class="card-img-top" alt="...">
                          <div class="card-body">
                            <h5 class="card-title">ι ­ηγι»γ</h5>
                            <span class="card-text" style="position: relative;"><img src="./SVG_LBD/star.svg" alt=""></span>
                            <span class="card-text" style="position: absolute; top: 380px; left: 210px;">TWD <span style="color: #FF9F1C; font-weight: bold; font-size: 20px;">1,200</span></span>
                          </div>
                        </div>
                        <div class="card">
                          <img src="./images_LBD/e-7.jpg" class="card-img-top" alt="...">
                          <div class="card-body">
                            <h5 class="card-title">MYSTERY RANCH η»ε±±θε19L</h5>
                            <span class="card-text" style="position: relative;"><img src="./SVG_LBD/star.svg" alt=""></span>
                            <span class="card-text" style="position: absolute; top: 380px; left: 210px;">TWD <span style="color: #FF9F1C; font-weight: bold; font-size: 20px;">6,000</span></span>
                          </div>
                        </div>
                        <div class="card">
                          <img src="./images_LBD/e-8.jpg" class="card-img-top" alt="...">
                          <div class="card-body">
                            <h5 class="card-title">MYSTERY RANCH η»ε±±θε19L</h5>
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
                    <h1 style="color: #000000; font-size: 24px">ηΈιθ£ε</h1>
                </div>
            </div>
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel" style="width: 320px;">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <div class="card-group" style="display: flex;">
                        <div class="card col-6">
                          <img src="./images_LBD/e-1.jpg" class="card-img-top" alt="...">
                          <div class="card-body" style="height: 100px;">
                            <h5 class="card-title" style="font-size: 16px;">η»ε±±ε₯θ‘θε</h5>
                            <span class="card-text" style="position: relative;"><img src="./SVG_LBD/star.svg" alt="" width="100px;"></span>
                            <span class="card-text" style="position: absolute; top: 220px; left: 70px; font-size: 12px;">TWD <span style="color: #FF9F1C; font-weight: bold; font-size: 16px;">6,000</span></span>
                          </div>
                        </div>
                        <div class="card">
                          <img src="./images_LBD/e-2.jpg" class="card-img-top" alt="...">
                          <div class="card-body">
                            <h5 class="card-title" style="font-size: 16px;">η‘θ’γη΄γ</h5>
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
                          <h5 class="card-title" style="font-size: 16px;">ιηε₯ιη΅</h5>
                          <span class="card-text" style="position: relative;"><img src="./SVG_LBD/star.svg" alt="" width="100px;"></span>
                          <span class="card-text" style="position: absolute; top: 220px; left: 70px; font-size: 12px;">TWD <span style="color: #FF9F1C; font-weight: bold; font-size: 16px;">1,120</span></span>
                        </div>
                      </div>
                      <div class="card">
                        <img src="./images_LBD/e-6.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title" style="font-size: 16px;">ι ­ηγι»</h5>
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
                    <h1 style="color: #000000">εζ¨ζ¨θ¦</h1>
                </div>
            </div>
            <div id="carouselExampleControls_1" class="carousel slide col-10" data-bs-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <div class="card-group">
                        <div class="card">
                          <img src="./images_LBD/l-13.jpg" class="card-img-top" alt="..." style="width: 334px; height: 290px; object-fit: cover;">
                          <div class="card-body">
                            <h5 class="card-title">ι«ιδΈζ₯ο½ι«ιζζ΄₯εΊηΌ | θ₯Ώε­η£ε€ι½ | ζζ΄₯ζΈ‘θΌͺ | ζζ΄₯θθ‘ηΎι£</h5>
                            <p><i class="fas fa-map-marker-alt"></i>&nbsp;  Kaohsiung</p>
                            <span class="card-text" style="position: relative;"><img src="./SVG_LBD/star.svg" alt=""></span>
                            <span class="card-text" style="position: absolute; top: 400px; left: 210px;">TWD <span style="color: #FF9F1C; font-weight: bold; font-size: 20px;">4,399</span></span>
                          </div>
                        </div>                
                        <div class="card">
                          <img src="./images/n18.jpg" class="card-img-top" alt="..." style="width: 334px; height: 290px; object-fit: cover;">
                          <div class="card-body">
                            <h5 class="card-title">εηΎ©δΈζ₯ζ―ι»ιο½ιΏιε±±ε°η«θ» | θ³ζ«»θ± | ζ£?ζι΅θ·― | θ§εθΆε</h5>
                            <p><i class="fas fa-map-marker-alt"></i>&nbsp; Chiayi</p>
                            <span class="card-text" style="position: relative;"><img src="./SVG_LBD/star.svg" alt=""></span>
                            <span class="card-text" style="position: absolute; top: 400px; left: 210px;">TWD <span style="color: #FF9F1C; font-weight: bold; font-size: 20px;">1,908</span></span>
                          </div>
                        </div>                
                        <div class="card">
                          <img src="./images_LBD/m-12.jpg" class="card-img-top" alt="..." style="width: 334px; height: 290px; object-fit: cover;">
                          <div class="card-body">
                            <h5 class="card-title">ζ°εε?θ­δΈζ₯ο½ηδΎ | η€ζΊͺη₯ε’ε₯θ‘ | ζ‘ΆεΎθΆεΆΊε€ι | ζ±ηΌε±±</h5>
                            <p><i class="fas fa-map-marker-alt"></i>&nbsp; Yilan</p>
                            <span class="card-text" style="position: relative;"><img src="./SVG_LBD/star.svg" alt=""></span>
                            <span class="card-text" style="position: absolute; top: 400px; left: 210px;">TWD <span style="color: #FF9F1C; font-weight: bold; font-size: 20px;">4,020</span></span>
                          </div>
                        </div>                
                        <div class="card">
                          <img src="./images/t2.png" class="card-img-top" alt="..." style="width: 334px; height: 290px; object-fit: cover;">
                          <div class="card-body">
                            <h5 class="card-title">ζ°εδΈζ₯ζ―ι»ιο½ηδΎζΊ«ζ³ | ηδΎθθ‘ | ε―Άθε·ειθθ‘ζδΉζ</h5>
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
                            <h5 class="card-title">ει¨δΈζ₯ | εζΎ³ιε²³ηεΈζΊ―ζΊͺ | εε³ΆζΉ | ε«ε¦θΆε | ζ°Έε?ζ­₯ι</h5>
                            <p><i class="fas fa-map-marker-alt"></i>&nbsp; Taipei</p>
                            <span class="card-text" style="position: relative;"><img src="./SVG_LBD/star.svg" alt=""></span>
                            <span class="card-text" style="position: absolute; top: 400px; left: 210px;">TWD <span style="color: #FF9F1C; font-weight: bold; font-size: 20px;">8,000</span></span>
                          </div>
                        </div>                
                        <div class="card">
                          <img src="./images_LBD/we.jpg" class="card-img-top" alt="..." style="width: 334px; height: 290px; object-fit: cover;">
                          <div class="card-body">
                            <h5 class="card-title">ε°ζ±δΈζ₯ο½ε€ͺιΊ»ιιιθ±θ³γη₯ζ¬θηΊι’¨ει₯</h5>
                            <p><i class="fas fa-map-marker-alt"></i>&nbsp; Taitung</p>
                            <span class="card-text" style="position: relative;"><img src="./SVG_LBD/star.svg" alt=""></span>
                            <span class="card-text" style="position: absolute; top: 400px; left: 210px;">TWD <span style="color: #FF9F1C; font-weight: bold; font-size: 20px;">8,000</span></span>
                          </div>
                        </div>                
                        <div class="card">
                          <img src="./images_LBD/l-14.jpg" class="card-img-top" alt="..." style="width: 334px; height: 290px; object-fit: cover;">
                          <div class="card-body">
                            <h5 class="card-title">ε?θ­δΈζ₯ο½ζζ± ζ£?ζη«₯θ©±γι¦¬εηζζ’η΄’</h5>
                            <p><i class="fas fa-map-marker-alt"></i>&nbsp; Yilan</p>
                            <span class="card-text" style="position: relative;"><img src="./SVG_LBD/star.svg" alt=""></span>
                            <span class="card-text" style="position: absolute; top: 400px; left: 210px;">TWD <span style="color: #FF9F1C; font-weight: bold; font-size: 20px;">2,999</span></span>
                          </div>
                        </div>                
                        <div class="card">
                          <img src="./images/i-5.jpg" class="card-img-top" alt="..." style="width: 334px; height: 290px; object-fit: cover;">
                          <div class="card-body">
                            <h5 class="card-title">θε³Άιι’¨δΈζ₯ο½δΈηΎζ΅?ζ½ο½ζ΅·ζ΄η§ε ΄ο½ εΏ«ζ¨ζΈ‘εζ</h5>
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
                  <h1 style="color: #000000; font-size: 24px">εζ¨ζ¨θ¦</h1>
              </div>
          </div>
          <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel" style="width: 320px;">
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <div class="card-group" style="display: flex;">
                      <div class="card col-6">
                        <img src="./images_LBD/l-10.jpg" class="card-img-top" alt="...">
                        <div class="card-body" style="height: 120px;">
                          <h5 class="card-title" style="font-size: 16px;">ει¨δΈζ₯</h5>
                          <p style="font-size: 10px; margin-bottom: 0;"><i class="fas fa-map-marker-alt" style="font-size: 10px;"></i>&nbsp; Taipei</p>
                          <span class="card-text" style="position: relative;"><img src="./SVG_LBD/star.svg" alt="" width="100px;"></span>
                          <span class="card-text" style="position: absolute; top: 235px; left: 70px; font-size: 12px;">TWD <span style="color: #FF9F1C; font-weight: bold; font-size: 16px;">8,000</span></span>
                        </div>
                      </div>
                      <div class="card">
                        <img src="./images_LBD/we.jpg" class="card-img-top" alt="..." style="width: 146px; height: 146px; object-fit: cover;">
                        <div class="card-body">
                          <h5 class="card-title" style="font-size: 16px;">ε°ζ±δΈζ₯</h5>
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
                        <h5 class="card-title" style="font-size: 16px;">ε?θ­δΈζ₯</h5>
                        <p style="font-size: 10px; margin-bottom: 0;"><i class="fas fa-map-marker-alt" style="font-size: 10px;"></i>&nbsp; Yilan</p>
                        <span class="card-text" style="position: relative;"><img src="./SVG_LBD/star.svg" alt="" width="100px;"></span>
                        <span class="card-text" style="position: absolute; top: 235px; left: 70px; font-size: 12px;">TWD <span style="color: #FF9F1C; font-weight: bold; font-size: 16px;">2,999</span></span>
                      </div>
                    </div>
                    <div class="card">
                      <img src="./images/i-5.jpg" class="card-img-top" alt="..." style="width: 146px; height: 146px; object-fit: cover;">
                      <div class="card-body">
                        <h5 class="card-title" style="font-size: 16px;">θε³Άιι’¨δΈζ₯</h5>
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