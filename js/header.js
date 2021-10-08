
$('#login a').click(function (e) {
    $(e).preventDefault();
});


$('button.btn-member').click(function () {
    $('.mobile-member').toggle();
});

// 手機左側選單
$('img.menu-icon').click(function () {
    $('.mobile-navbar').fadeToggle(150);
    if ($('.mobile-member').css('display', 'block')) $('.mobile-member').hide();
    $('.mobile-navbar').css('display', 'grid');
    $('header').css('background-color', '#ade8f4');
});
$('img.cross').click(function () {
    $('.mobile-navbar').fadeToggle(150);
    $('header').css('background-color', '#b1d660');
});
$('label.nav-item').click(function () {
    $(this).next().slideToggle(150);
});


$(window).scroll(function () {
    var height = $(window).scrollTop();
    if (height > 1000) {
        $(".gototop a").fadeIn();
    } else {
        $(".gototop a").fadeOut();
    }
});




// 會員登入點擊註冊跳的內容  
$(document).on('click', '#registerBtn', function () {
    $('#login').html(` <div class="modal-dialog" role="document">
            <div class="modal-content" style="border: none; background-color: transparent;">
                <div class="modal-body">
                    <div class="container">
                        <div class="login">
                            <form class="form text-center" >
                                <h2>會員註冊</h2>
                                <div class="group">
                                    <input type="text" id="input_email" placeholder="輸入E-mail">
                                </div>
                                <div class="group">
                                    <input type="password" id="input_password" placeholder="設定密碼">
                                </div>
                                <div class="btn_group text-center">
                                    <button class="btn btn-green" id="register_check_btn">確定</button>
                                </div>
                                <div class="btn_group text-center mt-2">
                                    <button class="btn btn-gray" id="cancelRegister">取消</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>`);
})

// 按取消後跳的內容 
$('#login').on('click', '#cancelRegister', function () {
    event.preventDefault();

    // 如果有email不完整的錯誤訊息的話就清掉
    $('input#input_email')
        .removeClass("border border-danger border-2")
        .tooltip()
        .tooltip('dispose');

    $('#login').html(`<div class="modal-dialog" role="document">
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
        </div>`);
})

// 註冊成功後跳的內容 
$('#login').on('click', '#register_check_btn', function () {
    event.preventDefault();

    // 如果有email不完整的錯誤訊息的話就清掉
    $('input#user_id')
        .removeClass("border border-danger border-2")
        .tooltip()
        .tooltip('dispose');

    //各自將 input 帶入變數中
    let input_email = $('input#input_email');
    let input_pwd = $('input#input_password');
    let input_name = $('input#name')
    let input_birthdate = $('input#birthdate');
    let input_address = $('input#address');

    //判斷 email 是否符合自訂格式
    let re = /\S+@\S+(\.\S+)+/;
    if (!re.test(input_email.val())) {
        input_email
            .addClass("border border-danger border-2")
            .tooltip({
                title: '請填寫完整的 E-mail',
                placement: 'top'
            })
            .tooltip('show');

        return false;
    } else {
        input_email
            .removeClass("border border-danger border-2")
            .tooltip()
            .tooltip('dispose');
    }

    //檢查 密碼 是否輸入
    if (input_pwd.val() == '') {
        alert('請輸入密碼');
        return false;
    }

    let objUser = {
        email: input_email.val(),
        pwd: input_pwd.val(),
    };

    $.post('insertUser.php', objUser, function (obj) {
        if (obj['success']) {
            $('#login').html(`<div class="modal-dialog" role="document">
                        <div class="modal-content" style="border: none; background-color: transparent;">
                            <div class="modal-body">
                                <div class="container">
                                    <div class="login">
                                        <form class="form text-center">
                                            <h2>會員登入</h2>
                                            <div class="group">
                                                <h3>${obj['email']}</h3>
                                                <img src="./img_lya/correct.png" alt="" width="120px" height="120px"
                                                    class="mt-2">
                                                <h3 class="mt-2">會員註冊成功 !</h3>
                                            </div>
                                            <button class="btn btn-green" id="register_success_btn">確定</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>`);
        } else {
            alert(`${obj['info']}`);
        }
    }, 'json');
});


// 登入成功跳的內容
$('#login').on('click', '#loginBtn', function (event) {
    event.preventDefault();

    if ($('input#user_id').val() == '') {
        $('input#user_id')
            .addClass("border border-danger border-2")
            .tooltip({
                title: '請填寫完整的 E-mail',
                placement: 'top'
            })
            .tooltip('show');

        return false;
    }

    let objUser = {
        email: $('input#user_id').val(),
        pwd: $('input#user_password').val()
    };

    $.post('login.php', objUser, function (obj) {
        console.log(obj);
        if (obj['success']) {
            $('#login').html(`<div class="modal-dialog" role="document">
                        <div class="modal-content" style="border: none; background-color: transparent;">
                            <div class="modal-body">
                                <div class="container">
                                    <div class="login">
                                        <form class="form text-center">
                                            <h2>會員登入</h2>
                                            <div class="group">
                                                <h3>${obj['email']}</h3>
                                                <img src="./img_lya/correct.png" alt="" width="120px" height="120px"
                                                    class="mt-2">
                                                <h3 class="mt-2">會員登入成功 !</h3>
                                            </div>
                                            <button class="btn btn-green" id="login_success_btn">確定</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>`);
        } else {
            alert(`${obj['info']}`);
        }
    }, 'json');
});

// 忘記密碼跳的內容

$('#login').on('click', '#forget_passwordBtn', function () {
    $('#login').html(`<div class="modal-dialog" role="document">
            <div class="modal-content" style="border: none; background-color: transparent;">
                <div class="modal-body">
                    <div class="container">
                        <div class="login">
                            <form class="form text-center">
                                <h2>會員登入</h2>
                                <div class="group">
                                    <h3>請輸入您的E-mail</h3>
                                    <input type="text" name="" id="input_forget_user_id" placeholder="輸入E-mail">
                                </div>
                                <div class="btn_group text-center">
                                    <button class="btn btn-green" id="confirm_letterBtn">寄送確認信</button>
                                </div>
                                <button class="btn btn-gray mt-2" id="cancel_setpassword">返回至登入</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>`);
});

// 登入/註冊 成功後，reload page
$('#login_success_btn').on('click', e => location.href = 'login1.php');
$('#register_success_btn').on('click', e => location.href = 'login1.php');

//登出
$('#logout').click(function (event) {
    //避免元素的預設事件被觸發
    event.preventDefault();

    $.get('logout.php', function (obj) {
        if (obj['success']) {
            alert('登出成功');

            setTimeout(function () {
                location.href = 'index.php'; // louout後跳到哪
            }, 500);
        }
    }, 'json');
});


// 返回上一步內容(回到登入畫面)
$('#login').on('click', '#cancel_setpassword', function () {
    $('#login').html(`<div class="modal-dialog" role="document">
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
        </div>`);
});


// 確認信跳的內容

$('#login').on('click', '#confirm_letterBtn', function () {
    event.preventDefault();

    // 如果有email不完整的錯誤訊息的話就清掉
    $('input#user_id')
        .removeClass("border border-danger border-2")
        .tooltip()
        .tooltip('dispose');

    //各自將 input 帶入變數中
    let input_email = $('input#input_forget_user_id');

    //判斷 email 是否符合自訂格式
    let re = /\S+@\S+(\.\S+)+/;
    if (!re.test(input_email.val())) {
        input_email
            .addClass("border border-danger border-2")
            .tooltip({
                title: '請填寫完整的 E-mail',
                placement: 'top'
            })
            .tooltip('show');

        return false;
    } else {
        input_email
            .removeClass("border border-danger border-2")
            .tooltip()
            .tooltip('dispose');
    }

    let objUser = {
        email: input_email.val(),
    };

    $.post('sendmail.php', objUser, function (obj) { }, 'json');

    $('#login').html(`<div class="modal-dialog" role="document">
                    <div class="modal-content" style="border: none; background-color: transparent;">
                        <div class="modal-body">
                            <div class="container">
                                <div class="login">
                                    <form class="form text-center">
                                    <h2>會員登入</h2>
                                    <div class="group">
                                        <p>已寄送一封認證信至</p>
                                        <h3>${input_email.val()}</h3>
                                    </div>
                                    <div class="btn_group text-center">
                                    </div>
                                    <button class="btn btn-gray mt-2" id="cancel_send_letter">返回上一步</button>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>`);
});

//返回上一步驟(重新填email)

$('#login').on('click', '#cancel_send_letter', function () {
    $('#login').html(`<div class="modal-dialog" role="document">
            <div class="modal-content" style="border: none; background-color: transparent;">
                <div class="modal-body">
                    <div class="container">
                        <div class="login">
                            <form class="form text-center">
                                <h2>會員登入</h2>
                                <div class="group">
                                    <h3>請輸入您的E-mail</h3>
                                    <input type="text" name="" id="input_forget_user_id" placeholder="輸入E-mail">
                                </div>
                                <div class="btn_group text-center">
                                    <button class="btn btn-green" id="confirm_letterBtn">寄送確認信</button>
                                </div>
                                <button class="btn btn-gray mt-2" id="cancel_setpassword">返回上一步</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>`);
});
