<?php
include_once "../base.php";

// 陣列(宣告)

// $array['健康新知']=1;
// $array['菸害防治']=2;
// $array['癌症防治']=3;
// $array['慢性病防治']=4;

// 縮減版
// $array=[
// "健康新知"=>"1",
// "菸害防治"=>"2",
// "癌症防治"=>"3",
// "慢性病防治"=>"4",
// ];

$id=$_GET['id'];
$news=$News->find($id);
echo nl2br($news['text']);
?>


