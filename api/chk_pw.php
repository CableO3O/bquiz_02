<?php include_once "db.php";

echo $User->count($_POST);

// $res=$User->count(['acc'=>$_POST['acc']]);

// if ($res>0) {
    
//     $res=$User->count(['pw'=>$_POST['pw']]);
//     if($res>0){
//         echo 1;
//     }else{
//         echo 2;
//     }
// }else{
//     echo 0;
// }