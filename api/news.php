<?php
include_once "../base.php";

// api 寫法


foreach($_POST['id'] as $id){
    if(isset($_POST['del']) && in_array($id,$_POST['del'])){
        $News->del($id);
    }else{
        $row=$News->find($id);
        $row['sh']=(isset($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;
        $News->save($row);
    }
}


// if (isset($_POST['del'])) {
//     foreach ($_POST['del'] as $id) {
//         $News->del($id);
//     }
// }

// $rows = $News->all();
// // 撈出所有資料
// // 問芳妤
// foreach ($rows as $row) {
//     if (in_array($row['id'], $_POST['sh'])) {
//         $row['sh'] = 1;
//         // 顯示
//     } else {
//         $row['sh'] = 0;
//         // 不顯示
//     }
//     $News->save($row);
// }


to("../back.php?do=news");
