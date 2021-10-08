<?php
//讀取 composer 所下載的套件
require_once('vendor/autoload.php');

use PHPMailer\PHPMailer\PHPMailer;

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Mailer = "smtp";
$mail->CharSet = 'UTF-8';
$mail->SMTPDebug  = 1;
$mail->SMTPAuth   = TRUE;
$mail->SMTPSecure = "tls";
$mail->Port       = 587;
$mail->Host       = "smtp.gmail.com";
$mail->Username = "2021lyalya@gmail.com";
$mail->Password = "rzvvjngawxnbetbf";

$mail->IsHTML(true);
$mail->AddAddress($_POST['email'], "Receiver");
$mail->SetFrom("2021lyalya@gmail.com", "寶島旅人瘋");
// $mail->AddReplyTo("reply-to-email@domain", "reply-to-name");
// $mail->AddCC("cc-recipient-email@domain", "cc-recipient-name");
$mail->Subject = "測試我的 PHP 寄信功能";
$content = "驗證碼: <a href='http://localhost/taiwan0825-main/setpassword.php?email={$_POST['email']}' target='_blank'>Change password</a>";
$mail->MsgHTML($content);

//預設訊息
$obj['success'] = false;
$obj['info'] = "註冊失敗";

if ($mail->Send()) {
    //修改預設訊息
    $obj['success'] = true;
    $obj['info'] = "寄送成功";
}

//告訴前端，回傳格式為 JSON (前端接到，會是物件型態)
header('Content-Type: application/json');

//輸出 JSON 格式，供 ajax 取得 response
echo json_encode($obj, JSON_UNESCAPED_UNICODE);
