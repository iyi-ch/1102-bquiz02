<?php
include_once "../base.php";

//$acc=$_POST['acc'];
//echo $User->math('count','id',['acc'=>$acc]);
// 縮減成以下
$chk=$User->math('count','id',['acc'=>$_POST['acc'],'pw'=>$_POST['pw']]);

if($chk){
    $_SESSION['user']=$_POST['acc'];
    echo 1;
}else{
    echo 0;
}

?>