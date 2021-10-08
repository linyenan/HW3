<!DOCTYPE html>
<html lang="en">
<?php session_start() ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./reset.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="./nav-footer.css?v=<?php echo time(); ?>">
</head>
<style>
    body {
        background: url(./SVG/background\(2560\).svg) left -150px top 100px/ auto 100vh no-repeat;
    }

    .container {
        height: 400px;
        background-color: white;
        width: 300px;
        display: flex;
        justify-content: center;
        box-shadow: 2px 2px 2px 3px #ccc;
        border-radius: 23px;
        margin-top: 170px;
        margin-bottom: -130px;
    }

    h2 {
        font-size: 36px;
        color: #919191;
        font-weight: bold;
        text-align: center;
        margin-bottom: 30px;
        margin-top: 30px;
        border-bottom: 4px solid #b1d660;
    }

    h3 {
        font-size: 20px;
        color: #707070;
        font-weight: bold;
        text-align: center;
    }

    p {
        font-size: 16px;
        font-weight: bold;
        text-align: center;
    }

    .form {
        margin-bottom: 10px;
    }

    .group {
        margin-bottom: 30px;
    }

    .btn {
        color: #fff;
        border-radius: 3px 3px 3px 3px;
        border: 0;
    }

    .btn-yellow {
        background-color: #FF9F1C;
    }

    .btn-green {
        background-color: #00A878;
    }

    .btn-gray {
        background-color: #707070;
    }

    .btn:hover {
        color: #fff;
    }

    #login .btn-yellow {
        margin-right: 25px;
    }


    a:visited,
    a:hover,
    a:active {
        color: inherit;
    }

    a.color {
        font-size: 16px;
        color: red;
    }

    /* 以上是會員登入的css */


    button.btn-member {
        background: url(./SVG/nav-footer/Profile.svg) center center/30px auto no-repeat, transparent;
        width: 32px;
        height: 32px;
        border: 0;
        position: relative;
    }

    /* 為了和漢堡選單結合 */

    button.btn-cart {
        background: url(./SVG/nav-footer/cart.svg) center center/40px auto no-repeat, transparent;
        width: 40px;
        height: 40px;
        margin-left: 30px;
        border: 0;
    }

    button.btn-member:focus,
    button.btn-cart:focus {
        outline: 0;
    }

    /* 消除boostrap效果 */

    /* 以下是RWD */
    @media screen and (max-width:991.99px) {

        button.btn-member {
            background: url(./SVG/nav-footer/Profile.svg) center center/24px auto no-repeat, transparent;
            width: 24px;
            height: 24px;
        }

        button.btn-cart {
            background: url(./SVG/nav-footer/cart.svg) center center/30px auto no-repeat, transparent;
            width: 30px;
            height: 30px;
            margin-left: 15px;
        }
    }
</style>

<body>
    <!-- header -->
    <header class="sea">
        <img src="./SVG/nav-footer/Menu.svg" alt="" class="menu-icon">

        <ul class="navbar">
            <li><a href="">三件事</a></li>
            <li><a href="">玉山</a></li>
            <li><a href="">日月潭</a></li>
            <li><a href="">環島</a></li>
            <li><a href="">裝備小屋</a></li>
            <li><a href="">1+1+1</a></li>
        </ul>

        <!-- 手機板左側選單 -->
        <div class="mobile-navbar">
            <img src="./SVG/nav-footer/cross.svg" alt="" class="cross">
            <span>close</span>
            <div class="mobile-navbar-container">
                <ul class="mobile-navbar-list">
                    <a href="">
                        <li>三件事</li>
                    </a>
                    <a href="">
                        <li>玉山</li>
                    </a>
                    <a href="">
                        <li>日月潭</li>
                    </a>
                    <a href="">
                        <li>環島</li>
                    </a>
                    <input type="checkbox" class="none" id="equiptment">
                    <label for="equiptment" class="nav-item">裝備小屋<img src="./SVG/nav-footer/arrow-down.svg" alt=""></label>
                    <ul class="layer1">
                        <input type="checkbox" class="none" id="rent">
                        <label for="rent" class="nav-item">租賃裝備<img src="./SVG/nav-footer/arrow-down.svg" alt=""></label>
                        <ul class="layer2">
                            <input type="checkbox" class="none" id="climb">
                            <label for="climb" class="nav-item">山裝備<img src="./SVG/nav-footer/arrow-down.svg" alt=""></label>
                            <ul class="layer3">
                                <li>登山背包</li>
                                <li>登山靴</li>
                                <li>???</li>
                            </ul>
                            <input type="checkbox" class="none" id="water">
                            <label for="water" class="nav-item">水裝備<img src="./SVG/nav-footer/arrow-down.svg" alt=""></label>
                            <ul class="layer3">
                                <li>???</li>
                                <li>???</li>
                            </ul>
                        </ul>
                        <input type="checkbox" class="none" id="purchase">
                        <label for="purchase" class="nav-item">購買裝備<img src="./SVG/nav-footer/arrow-down.svg" alt=""></label>
                        <ul class="layer2">
                            <li>???</li>
                            <li>???</li>
                        </ul>
                    </ul>
                    <a href="">
                        <li>1+1+1</li>
                    </a>
                </ul>
            </div>
        </div>

        <a href="" class="nav-logo"><img class="nav-logo" src="./SVG/nav-footer/logo-white-img.svg" alt=""></a>

        <div class="member-cart">

            <?php if (isset($_SESSION['email'])) { ?>
                <button class="btn-member" data-toggle="modal" data-whatever="@mdo">
                    <!-- 手機板右側選單 -->
                    <div class="mobile-member">
                        <img src="./SVG/nav-footer/poly_1.svg" alt="">
                        <div class="mobile-member-top">
                            <a href=""><img src="./SVG/nav-footer/avatar.svg" alt=""></a>
                            <div>
                                <p>Hello, </p>
                                <?php echo $_SESSION['email'] ?>
                            </div>
                        </div>
                        <ul class="mobile-member-list">
                            <a href="./member-order.html">
                                <li>訂單紀錄</li>
                            </a>
                            <a href="./member-rent.html">
                                <li>我的租借</li>
                            </a>
                            <a href="./member-favorite.html">
                                <li>我的收藏</li>
                            </a>
                            <a href="./member-ahieve.html">
                                <li>我的成就</li>
                            </a>
                            <a href="./member-point.html">
                                <li>會員積點</li>
                            </a>
                            <a href="./member-coupon.html">
                                <li>會員優惠</li>
                            </a>
                        </ul>
                        <a href="" id='logout'>登出</a>
                    </div>
                </button>
            <?php } else { ?>
                <button class="btn-member" data-toggle="modal" data-target="#login" data-whatever="@mdo">
                <?php } ?>
                <button class="btn-cart" data-toggle="modal" data-target="#login" data-whatever="@mdo"></button>
        </div>
    </header>

    <!-- 重新設定密碼 -->
    <div class="modal-dialog" id="setpassword" role="document">
        <div class="modal-content" style="border: none; background-color: transparent;">
            <div class="modal-body">
                <div class="container">
                    <div class="login">
                        <form class="form">
                            <h2>會員登入</h2>
                            <div class="member mb-3 text-center">
                                <img src="./img_lya/head.png" alt="" width="70px" height="70px">
                                <h3 class="mt-3"><?php echo $_GET['email'] ?></h3>
                            </div>
                            <div class="group text-center">
                                <input type="text" name="" id="pwd" placeholder="重新設定密碼">
                            </div>
                            <div class="group text-center">
                                <input type="text" name="" id="pwd_confirm" placeholder="再次輸入密碼">
                            </div>
                            <div class="btn_group text-center">
                                <button class="btn btn-green" id="setpassword_success_btn">確定</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="./js/jquery-3.6.0.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script>
        $('#login a').click(function(e) {
            $(e).preventDefault();
        });

        //let logined = false; //是否已登入? 否

        /*if (logined) {
            $('button.btn-member').removeAttr('data-target');
            $('button.btn-cart').removeAttr('data-target');
            // 如果已登入則斷開和光箱的連結 
        };*/

        $('button.btn-member').click(function() {
            $('.mobile-member').toggle();
        });

        // 左側選單的js
        $('img.menu-icon').click(function() {
            $('.mobile-navbar').fadeToggle(150);
            if ($('.mobile-member').css('display', 'block')) $('.mobile-member').hide();
            $('.mobile-navbar').css('display', 'grid');
            $('header').css('background-color', '#ade8f4');
        });
        $('img.cross').click(function() {
            $('.mobile-navbar').fadeToggle(150);
            $('header').css('background-color', '#b1d660');
        });
        $('label.nav-item').click(function() {
            $(this).next().slideToggle(150);
        });
        // 設定密碼完成跳的內容  


        $(document).on('click', '#setpassword_success_btn', function(event) {
            //避免元素的預設事件被觸發
            event.preventDefault();

            let input_pwd = $('input#pwd').val();
            let input_pwd_confirm = $('input#pwd_confirm').val();
            if (input_pwd == '' || input_pwd_confirm == '') {
                alert('密碼不能為空');
                return false;
            } else if (input_pwd != input_pwd_confirm) {
                alert('密碼不一致');
                return false;
            }

            var email = "<?php print($_GET['email']); ?>";
            let objPwd = {
                email: email,
                pwd: input_pwd,
            };
            $.post('verify.php', objPwd, function(obj) {
                $('#setpassword').html(`<div class="modal-dialog" role="document">
      <div class="modal-content" style="border: none; background-color: transparent;">
        <div class="modal-body">
          <div class="container">
            <div class="login">
              <form class="form text-center">
                <h2>會員登入</h2>
                <div class="group">
                  <img src="./img_lya/correct.png" alt="" width="120px" height="120px" class="mt-2">
                  <h3 class="mt-2">密碼設定完成 !</h3>
                </div>
                <button class="btn btn-green"><a href="./index.php">確定</a></button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>`);
            }, 'json');
        })
    </script>
</body>

</html>