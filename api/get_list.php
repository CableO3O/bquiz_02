<?php
include_once "db.php";
$rows=$News->all(['type'=>$_GET['type'],'sh'=>1]);
foreach ($rows as $row) {
    echo "<a style='display:block' href='Javascript:getNews({$row['id']})'>";
    echo $row['title'];
    echo "</a>";
}