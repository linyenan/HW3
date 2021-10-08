<?php  require_once 'member-header.php' ?>

    <link rel="stylesheet" href="./member-order.css" />
</head>

<body>
    <?php
    $sqlUser = "SELECT *
    FROM `users`
    WHERE `email` = '{$_SESSION['email']}'";
    $arrUser = $pdo->query($sqlUser)->fetch();
    ?>

    <?php require_once 'header.php' ?>

    <div class="member-body">
        
        <?php require_once 'member-menu.php' ?>

        <div class="member-container">
            <h2>我的租借</h2>

            <?php
            $sql = "SELECT * FROM `orders_detail`
                INNER JOIN `orders`
                ON `orders_detail`.`order_id` = `orders`.`order_id`
                WHERE `email` = '{$_SESSION['email']}' AND `func_name` = '17'
                ORDER BY `id` DESC";
            $stmt = $pdo->query($sql);
            $arr = $stmt->fetchAll();
            if ($stmt->rowCount() > 0) {
                $count_orders = $stmt->rowCount();
            ?>

                <div class="page-input">
                    <h3>共<?= $count_orders ?>筆 每頁顯示10筆</h3>
                    <div class="page-input-item">
                        第<input type="text" id="page-input" value="1" />頁
                    </div>
                </div>

                <?php
            }
            if ($stmt->rowCount() > 0) {
                foreach ($arr as $obj) {
                ?>

                    <div class="order-box">
                        <a href="" class="order-main">
                            <div class="order-title">
                                <div class="img"><img src="./images/<?= $obj['prod_main_img'] ?>"></div>
                                <p><?= $obj['prod_name'] ?></p>
                            </div>
                            <div class="order-cols">
                                <div class="order-col">
                                    <p><?= $obj['prod_qty'] ?>件</p>
                                </div>
                                <div class="order-col">
                                    <img src="./SVG/member-system/time.svg" alt="" />
                                    <p><?= $obj['rental_day'] ?></p>
                                </div>
                                <div class="order-col">
                                    <strong>配送中</strong>
                                </div>
                            </div>
                        </a>
                        <div class="order-button">
                            <a href="./member-rent-detail.php?email=<?= $_SESSION['email'] ?>&order_id=<?= $obj['order_id'] ?>&prod_id=<?= $obj['prod_id'] ?>"><button class="btn-green" value="">查看詳細</button></a>
                        </div>
                    </div>

                <?php
                }
            } else {
                ?>
                <p>尚未有租借紀錄</p>
            <?php
            }
            ?>

            <div class="pagination">
                <div class="page-group">
                    <a class="prev-page disable" href=""></a>
                    <a class="page-item nowpage" href="">1</a>
                    <a class="next-page disable" href=""></a>
                </div>
            </div>
        </div>
    </div>
    </div>
    <footer></footer>
    <script src="./js/jquery-3.6.0.min.js"></script>
    <script src="./js/member-system.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>

</html>