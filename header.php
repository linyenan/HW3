<header class="sticky-top">
    <img src="./SVG/nav-footer/Menu.svg" alt="" class="menu-icon" />
    <ul class="navbar">
        <li><a href="./index.php">三件事</a></li>
        <li><a href="./mountain.php">玉山</a></li>
        <li><a href="./lake.php">日月潭</a></li>
        <li><a href="./surround_island.php">環島</a></li>
        <li><a href="./equipment-shop.php">裝備小屋</a></li>
        <li><a href="./1+1+1_index.php">1+1+1</a></li>
    </ul>

    <!-- 手機板左側選單 -->
    <div class="mobile-navbar">
        <img src="./SVG/nav-footer/cross.svg" alt="" class="cross">
        <span>close</span>
        <div class="mobile-navbar-container">
            <ul class="mobile-navbar-list">
                <a href="./index.php">
                    <li>三件事</li>
                </a>
                <a href="./mountain.php">
                    <li>玉山</li>
                </a>
                <a href="./lake.php">
                    <li>日月潭</li>
                </a>
                <a href="./surround_island.php">
                    <li>環島</li>
                </a>
                <input type="checkbox" class="none" id="equiptment">
                <label for="equiptment" class="nav-item">裝備小屋<img src="./SVG/nav-footer/arrow-down.svg" alt=""></label>
                <ul class="layer1">

                    <a href="./eq_house_rent.php?parent_id=17&cat_id=18">
                        <li>租賃裝備</li>
                    </a>


                    <a href="./eq_house_buy.php?parent_id=21&cat_id=22">
                        <li>購買裝備</li>
                    </a>

                </ul>
                <a href="./1+1+1_index.php">
                    <li>1+1+1</li>
                </a>
            </ul>
        </div>
    </div>
    <a href="./index.php" class="nav-logo"><img src="./SVG/nav-footer/logo-white-img.svg" alt="" /></a>

    <div class="member-cart"><a href=""></a>

        <?php if (isset($_SESSION['email'])) { ?>

            <button class="btn-member" data-toggle="modal" data-whatever="@mdo">
                <!-- 手機板右側選單 -->
                <div class="mobile-member">
                    <img src="./SVG/nav-footer/poly_1.svg" alt="">
                    <div class="mobile-member-top">
                        <div style="font-size:14px;padding:3px">
                            <p>Hello, </p>
                            <a href="./member-profile.php">
                            <?php

                                $sqlUser = "SELECT *
                                FROM `users`
                                WHERE `email` = '{$_SESSION['email']}'";
                                $arrUser = $pdo->query($sqlUser)->fetch();

                                if ($arrUser['last_name'] || $arrUser['first_name']) {
                                    echo "{$arrUser['last_name']}{$arrUser['first_name']}";
                                } else {
                                    echo "{$arrUser['email']}";
                                };
                                ?>
                            </a>
                            
                        </div>
                    </div>
                    <ul class="mobile-member-list">
                        <a href="./member-order.php">
                            <li>訂單紀錄</li>
                        </a>
                        <a href="./member-rent.php">
                            <li>我的租借</li>
                        </a>
                        <a href="./member-favorite.php">
                            <li>我的收藏</li>
                        </a>
                        <a href="./member-ahieve.php">
                            <li>我的成就</li>
                        </a>
                        <a href="./member-point.php">
                            <li>會員積點</li>
                        </a>
                        <a href="./member-coupon.php">
                            <li>會員優惠</li>
                        </a>
                        <a href="" id='logout'>
                            <li>登出</li>
                        </a>
                    </ul>

                </div>
            </button>
        <?php } else { ?>
            <button class="btn-member" data-toggle="modal" data-target="#login" data-whatever="@mdo">
            <?php } ?>
            <a href="shopcart1.php" class="pt-2">
                <button class="btn-cart" data-toggle="modal" data-whatever="@mdo"></button>
            </a>
    </div>
</header>

<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="border: none; background-color: transparent;">
            <div class="modal-body">
                <div class="container">
                    <div class="login">
                        <form class="form">
                            <h2>會員登入</h2>
                            <div class="group">
                                <input type="text" id="user_id" placeholder="輸入E-mail">
                            </div>
                            <div class="group">
                                <input type="password" id="user_password" placeholder="輸入密碼">
                            </div>
                            <button class="btn btn-yellow" id="loginBtn">登入</button>
                            <a href="#" class="color" id="forget_passwordBtn">忘記密碼?</a>
                        </form>
                        <button class="btn btn-green" id="registerBtn">免費註冊</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="gototop d-none d-sm-block" style="z-index:100000000;">
    <a href="#">
        <img src="./SVG/img/man.svg" alt="" width="150px">
    </a>
</div>