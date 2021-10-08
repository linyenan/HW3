<?php require_once 'db.inc.php' ?>
<?php session_start() ?>
<?php
$where = "";
if (isset($_GET['cat_id'])) {
  $where = "WHERE `cat_id` = {$_GET['cat_id']}";
}

$sqlTotal = "SELECT COUNT(1) AS `count` FROM `product` {$where}";
$totalRows = $pdo->query($sqlTotal)->fetch()['count'];

$numPerPage = 20;

$totalPages = ceil($totalRows / $numPerPage);

$page = (isset($_GET['page']) && $_GET['page'] > 0) ?  $_GET['page'] : 1;

$offset = ($page - 1) * $numPerPage;
?>
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

    /* ----------------------shine animation------------------------------------------ */
    .column {
      padding: 0;
    }

    .column:last-child {
      padding-bottom: 60px;
    }

    .column::after {
      content: '';
      clear: both;
      display: block;
    }

    figure {
      width: 298px;
      height: 298px;
      margin: 0;
      padding: 0;
      background: #fff;
      overflow: hidden;
    }

    .hover14 figure {
      position: relative;
    }

    .hover14 figure::before {
      position: absolute;
      top: 0;
      left: -75%;
      z-index: 2;
      display: block;
      content: '';
      width: 50%;
      height: 100%;
      background: linear-gradient(to right, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, .3) 100%);
      transform: skewX(-25deg);
    }

    .hover14 figure:hover::before {
      animation: shine .75s;
    }

    @-webkit-keyframes shine {
      100% {
        left: 125%;
      }
    }

    @keyframes shine {
      100% {
        left: 125%;
      }
    }

    /* ----------------------分頁------------------------------------------ */
    .page-item.active .page-link {
      background-color: #B1D660 !important;
      border-color: #B1D660 !important;
      color: #fff !important;
    }

    .page-link {
      color: #ABADB2 !important;
    }
  </style>
</head>

<body>
  <?php require_once 'header.php' ?>

  <div class="container">
    <div class="row d-none d-xl-block d-xl-flex" style="margin-top: 100px;">
      <div class="col-2">
        <div>
          <ul class="nav flex-column list-group">
            <li class="list-group-item" aria-current="true" style="font-size: 22px; color: white; text-align: center; background-color: #B1D660;">裝備小屋</li>
            <?php
            $sql = "SELECT * FROM `categories` WHERE `parent_id` = 17";
            $arr = $pdo->query($sql)->fetchAll();
            foreach ($arr as $obj) {
            ?>
              <li class="nav-item list-group-item">
                <a style="color: #B1D660; font-size: 22px;" class="nav-link" href="eq_house_rent.php?parent_id=17&cat_id=<?= $obj['id'] ?>"><?= $obj['cat_name'] ?></a>
              </li>
            <?php
            }
            ?>
          </ul>
        </div>
      </div>
      <div class="col-10" style="padding-right: 0;">
        <div class="row" style="text-align: center;">
          <p style="font-size: 48px; font-weight: bold;">租裝備</p>
        </div>
        <!-- 商品一覽 -->
        <div class="row">
          <?php if (isset($_GET['cat_id'])) { ?>
            <div class="row">
              <?php
              $sql = "SELECT * 
                              FROM `product` 
                              WHERE `cat_id` = {$_GET['cat_id']}
                              LIMIT {$offset}, {$numPerPage}";
              $arr = $pdo->query($sql)->fetchAll();
              foreach ($arr as $obj) {
              ?>
                <div class="col mt-5">
                  <div class="card" style="width: 300px;">
                    <div class="hover14 column">
                      <figure>
                        <a href="eq_detail_rent.php?parent_id=<?= $_GET['parent_id'] ?>&cat_id=<?= $_GET['cat_id'] ?>&prod_id=<?= $obj['id'] ?>"><img src="./images/<?= $obj['prod_main_img'] ?>" class="card-img-top" alt="..."></a>
                      </figure>
                    </div>
                    <div class="card-body">
                      <h5 class="card-title"><?= $obj['prod_name'] ?></h5>
                      <span class="card-text" style="margin-left: 140px;">TWD <span style="color: #FF9F1C; font-weight: bold; font-size: 20px;"><?= $obj['rental_charge'] ?>/ 天</span></span>
                    </div>
                  </div>
                </div>
              <?php
              }
              ?>
            </div>
          <?php } ?>
        </div>
        <!-- 分頁 -->
        <div class="row" style="margin-top: 80px; margin-left: 1060px;">
          <?php if (isset($_GET['parent_id']) && isset($_GET['cat_id'])) { ?>
            <nav aria-label="Page navigation example">
              <ul class="pagination pagination-lg">

                <li class="page-item <?php if ($page == 1)  echo 'disabled' ?>">
                  <a class="page-link" href="eq_house_rent.php?parent_id=<?= $_GET['parent_id'] ?>&cat_id=<?= $_GET['cat_id'] ?>&page=1" aria-label="Previous" style="color: #ABADB2;">
                    <span aria-hidden="true">&laquo;</span>
                  </a>
                </li>

                <?php
                for ($i = 1; $i <= $totalPages; $i++) {
                  if ($page == $i) $strClass = 'active';
                  else $strClass = '';
                ?>
                  <li class="page-item <?= $strClass ?>">
                    <a class="page-link" href="eq_house_rent.php?parent_id=<?= $_GET['parent_id'] ?>&cat_id=<?= $_GET['cat_id'] ?>&page=<?= $i ?>"><?= $i ?></a>
                  </li>
                <?php
                }
                ?>

                <li class="page-item <?php if ($page == $totalPages)  echo 'disabled' ?>">
                  <a class="page-link" href="eq_house_rent.php?parent_id=<?= $_GET['parent_id'] ?>&cat_id=<?= $_GET['cat_id'] ?>&page=<?= $totalPages ?>" aria-label="Next" style="color: #ABADB2;">
                    <span aria-hidden="true">&raquo;</span>
                  </a>
                </li>

              </ul>
            </nav>
          <?php } ?>
        </div>
      </div>
    </div>
    <div class="row d-block d-xl-none" style="margin-top: 30px;">
      <div>
        <div style="border-bottom: 3px solid black; width: 100px; margin: 0 auto;">
          <p style="font-size: 30px; font-weight: bold; text-align: center; margin: 0 auto;">租裝備</p>
        </div>
      </div>
      <div style="margin-top: 20px; text-align: center;">
        <?php
        $sql = "SELECT * FROM `categories` WHERE `parent_id` = 17";
        $arr = $pdo->query($sql)->fetchAll();
        foreach ($arr as $obj) {
        ?>
          <a style="font-size: 18px; color: black; text-decoration: none;" href="eq_house_rent.php?parent_id=17&cat_id=<?= $obj['id'] ?>"><?= $obj['cat_name'] ?>/</a>
        <?php } ?>
      </div>
      <?php if (isset($_GET['cat_id'])) { ?>
        <div class="group" style="display: flex; flex-wrap: wrap;">
          <?php
          $sql = "SELECT * 
            FROM `product` 
            WHERE `cat_id` = {$_GET['cat_id']}
            LIMIT {$offset}, {$numPerPage}";
          $arr = $pdo->query($sql)->fetchAll();
          foreach ($arr as $obj) {
          ?>
            <div class="card col-6" style="height: 310px; margin-top: 20px;">
              <a href="eq_detail_rent.php?parent_id=<?= $_GET['parent_id'] ?>&cat_id=<?= $_GET['cat_id'] ?>&prod_id=<?= $obj['id'] ?>">
                <img src="./images/<?= $obj['prod_main_img'] ?>" class="card-img-top" alt="..." style="width: 181px; height: 181px; border: 1px solid black;">
              </a>
              <div class="card-body">
                <h5 class="card-title" style="font-size: 15px;"><?= $obj['prod_name'] ?></h5>
                <span class="card-text" style="position: absolute; top: 260px; left: 50px;">TWD <span style="color: #FF9F1C; font-weight: bold; font-size: 20px;"><?= $obj['rental_charge'] ?>/ 天</span></span>
              </div>
            </div>
          <?php
          }
          ?>
        </div>
      <?php } ?>
      <!-- 分頁 -->
      <div class="row" style="margin-top: 40px;">
        <?php if (isset($_GET['parent_id']) && isset($_GET['cat_id'])) { ?>
          <nav aria-label="Page navigation example">
            <ul class="pagination pagination-sm" style="padding-left: 260px;">

              <li class="page-item <?php if ($page == 1)  echo 'disabled' ?>">
                <a class="page-link" href="eq_house_rent.php?parent_id=<?= $_GET['parent_id'] ?>&cat_id=<?= $_GET['cat_id'] ?>&page=1" aria-label="Previous" style="color: #ABADB2;">
                  <span aria-hidden="true">&laquo;</span>
                </a>
              </li>

              <?php
              for ($i = 1; $i <= $totalPages; $i++) {
                if ($page == $i) $strClass = 'active';
                else $strClass = '';
              ?>
                <li class="page-item <?= $strClass ?>">
                  <a class="page-link" href="eq_house_rent.php?parent_id=<?= $_GET['parent_id'] ?>&cat_id=<?= $_GET['cat_id'] ?>&page=<?= $i ?>"><?= $i ?></a>
                </li>
              <?php
              }
              ?>

              <li class="page-item <?php if ($page == $totalPages)  echo 'disabled' ?>">
                <a class="page-link" href="eq_house_rent.php?parent_id=<?= $_GET['parent_id'] ?>&cat_id=<?= $_GET['cat_id'] ?>&page=<?= $totalPages ?>" aria-label="Next" style="color: #ABADB2;">
                  <span aria-hidden="true">&raquo;</span>
                </a>
              </li>

            </ul>
          </nav>
        <?php } ?>
      </div>
    </div>
  </div>

  <footer style="margin-top: 100px">

  </footer>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  <script src="./js/header.js"></script>
</body>

</html>