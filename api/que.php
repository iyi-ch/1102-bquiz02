<?php

include_once "../base.php";

if(!empty($_POST['subject'])){
    $Que->save(['text'=>$_POST['subject'],'count'=>0,'subject_id'=>0]);

}

to("../back.php?do=que");
