$(window).scroll(function () {
    $('.scroll').each(function (index, item) {
        if ($(window).scrollTop() + $(window).height() >= $(item).offset().top) {
            $(item).addClass('show');
        }
        else {
            $(item).removeClass('show');
        }
    });
});

$('button#zoom').click(function (event) {
    $('a[data-lightbox="roadtrip"]').eq(0).click();
});

$('button#zoom2').click(function (event) {
    $('a[data-lightbox="roadtrip2"]').eq(0).click();
});

// //增加商品數量
// $('button#btn_plus').click(function (event) {
//     let input_qty = $('input#qty');
//     input_qty.val(parseInt(input_qty.val()) + 1);
// });

// 增加商品數量(sunmoonlake)
$('button#btn_plus').click(function(event) {
    let input_qty = $('input#qty');
    input_qty.val(parseInt(input_qty.val()) + 1);
    // console.log('hi');
    // console.log('QTY', $('#qty').val());
    // console.log('price', $('.myPrice').text());
    $('.total_dollars span').text($('#qty').val() * $('.myPrice').text())
});

//減少商品數量(sunmoonlake)
$('button#btn_minus').click(function(event) {
    let input_qty = $('input#qty');
    if (parseInt(input_qty.val()) - 1 < 1) return false;
    input_qty.val(parseInt(input_qty.val()) - 1);

    $('.total_dollars span').text($('#qty').val() * $('.myPrice').text())
});

// //減少商品數量
// $('button#btn_minus').click(function (event) {
//     let input_qty = $('input#qty');
//     if (parseInt(input_qty.val()) - 1 < 1) return false;
//     input_qty.val(parseInt(input_qty.val()) - 1);
// });

//增加商品數量(購物車)
$('button.btn_plus').click(function(event){
    //計算數量
    let btn = $(this);
    let index = btn.attr('data-index');
    let prod_price = btn.attr('data-prod-price');
    let input_qty = $(`input.qty[data-index="${index}"]`);
    input_qty.val( parseInt(input_qty.val()) + 1 );

    //修改商品金額
    $(`span[data-index="${index}"]`).text( input_qty.val() * prod_price );

    //更新總計
    let total = 0;
    $(`input.qty`).each(function(index, element){
        //更新成正整數
        total += ( parseInt($(element).val()) * parseInt($(element).attr('data-prod-price')) );
    });
    $('span#total').text(total);
    
});

updateTotalPrice();

// 商品總計數字
function updateTotalPrice(){
    console.log('hi');
    let total = 0;

    $('.prod_price_lty').each(function(index, element){
        total = total + parseInt($(element).text());
    });

    $('#total').text(total);
}

//減少商品數量(購物車)
$('button.btn_minus').click(function(event){
    let btn = $(this);
    let index = btn.attr('data-index');
    let prod_price = btn.attr('data-prod-price');
    let input_qty = $(`input.qty[data-index="${index}"]`);
    if( parseInt(input_qty.val()) - 1 < 1 ) return false;
    input_qty.val( parseInt(input_qty.val()) - 1 );

    //修改商品金額
    $(`span[data-index="${index}"]`).text( input_qty.val() * prod_price );

    //更新總計
    let total = 0;
    $(`input.qty`).each(function(index, element){
        total += ( parseInt($(element).val()) * parseInt($(element).attr('data-prod-price')) );
    });
    $('span#total').text(total);
});

//加入商品至購物車
$('button#btn_set_cart').click(function (event) {
    event.preventDefault();
    //取得 button 的 jQuery 物件
    let btn = $(this);

    // alert(123);

    //送出 post 請求，加入購物車
    let objProduct = {
        prod_id: btn.attr('data-prod-id'),
        prod_name: btn.attr('data-prod-name'),
        prod_description: btn.attr('data-prod-description'),
        prod_main_img: btn.attr('data-prod-main-img'),
        prod_price: parseInt(btn.attr('data-prod-price')),
        rental_charge: parseInt(btn.attr('data-rental-charge')),
        rental_day: $('input#rental_day').val(),
        travel_day: $('input#travel_day').val(),
        func_name: btn.attr('data-func-name'),
        prod_qty: $('input#qty').val()

    };
    // console.log(objProduct);
    $.post("setCart.php", objProduct, function (obj) {
        if (obj['success']) {
            //成功訊息
            alert('加入購物車成功');

            //將網頁上的購物車商品數量更新
            $('span#count_products').text(obj['count_products']);
        }
        console.log(obj);
    }, 'json');
});

//刪除購物車內商品
$('a.delete').click(function(event){
    //避免元素的預設事件被觸發
    event.preventDefault();

    //取得選定刪除的購物車索引
    let index = $(this).attr('data-index');

    $.get("deleteItem.php", {index: index}, function(obj){
        if(obj['success']){
            location.reload();
        } else {
            alert(`${obj['info']}`);
        }
        // console.log(obj);
    }, 'json');
});

// 日曆
$(function () {
    $('input[name="daterange"]').daterangepicker({
        opens: 'left'
    }, function (start, end, label) {
        console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
    });
});

//fillout 自動輸入

   $(function() {
    var availableTags = [
        "陳家豪",
        "AppleScript"
        ];
    $("#first_name").autocomplete({
    source:availableTags
    });
});

$('#heart, #heart2').click(function(event) {
    event.preventDefault();
    $(this).toggleClass('red');

    let objProduct = {
        prod_id: $(this).attr('data-prod-id'),
        email: $(this).attr('data-email'),
    };
    $.post("follow.php", objProduct, function(obj){
        if(obj['success']){
            //成功訊息
            alert('加入收藏成功');
        } else {
            alert(`${obj['info']}`)
        }
        console.log(obj);
    }, 'json');
});
