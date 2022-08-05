<?php
include_once "../base.php";

$opt=$_POST['opt'];
$option=$Que->find($opt);
$option['count']++;
$Que->save($option);

$subject=$Que->find($option['subject_id']);
$subject['count']++;
$Que->save($subject);
echo $subject['id'];
to("../index.php?do=result&id=".$subject['id']);

?>