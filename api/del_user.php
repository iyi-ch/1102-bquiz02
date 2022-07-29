<?php
include_once "../base.php";

// $_POST['del']=[2,3,4];

if(!empty($_POST['del'])){
    foreach($_POST['del'] as $id){
        $User->del($id);
    }
}
