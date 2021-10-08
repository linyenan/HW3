<?php
// 儲存於伺服器端,不用擔心用戶禁用session的問題,但記錄檔案的負荷由伺服器承擔
session_start();

// print_r($_POST);
// exit();

//預設訊息
$obj['success'] = false;
$obj['info'] = "加入購物車失敗";

//判斷 post 變數是否存在
if( isset($_POST['prod_id']) && isset($_POST['prod_name']) &&
    isset($_POST['prod_main_img']) && isset($_POST['prod_qty']) ) {

    //假如先前沒有建立購物車,就直接初始化(建立)
    if( !isset($_SESSION['cart'])) $_SESSION['cart'] = [];

    //判斷購物車裡面的商品,是否有重複,若有,則將數量進行更新
    $hasProductId = false;
    if(count( $_SESSION['cart']) > 0 ){
        foreach($_SESSION['cart'] as $index => $obj){
            if($obj['prod_id'] == (int)$_POST['prod_id']){

                    //更新商品數量
                    $_SESSION['cart'][$index]['prod_qty'] += (int)$_POST['prod_qty'];

                    //更新bool值,代表購物車內有重複的商品
                    $hasProductId = true;
                }
        }
    }

    //將主要資料放到購物車中
    if( $hasProductId == false){
        $_SESSION['cart'][] = [
            "prod_id" => (int)$_POST['prod_id'],
            "prod_name" => $_POST['prod_name'],
            "prod_description" => $_POST['prod_description'],
            "prod_main_img" => $_POST['prod_main_img'],
            "prod_price" => (int)$_POST['prod_price'],
            "rental_charge" => (int)$_POST['rental_charge'] ,
            "rental_day" => empty($_POST['rental_day']) ? NULL : $_POST['rental_day'],
            "travel_day" => empty($_POST['travel_day']) ? NULL : $_POST['travel_day'],
            "func_name"=> (int)$_POST['func_name'],
            "prod_qty" => (int)$_POST['prod_qty']
        ];         
    }

    //設定訊息
    $obj['success'] = true;
    $obj['info'] = "加入購物車成功";
    $obj['count_products'] = count($_SESSION['cart']);
}

//告訴前端，回傳格式為 JSON (前端接到，會是物件型態)
header('Content-Type: application/json');

//輸出 JSON 格式，供 ajax 取得 response
echo json_encode($obj, JSON_UNESCAPED_UNICODE);