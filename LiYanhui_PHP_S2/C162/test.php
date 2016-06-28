<?php

// 生成一个文件
file_put_contents('123.php', '1234567890');

// 读取文件
echo file_get_contents('123.php');

?>