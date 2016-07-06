<?php
header('Content-Type:text/html;charset=utf-8');

ob_start();	// 开启缓冲区

echo '<div>我向浏览器输出了，并且将输出的数据存放在了缓冲区。</div>';

$a = ob_get_contents();	// 获取输出至缓冲区的内容

echo $a;

?>