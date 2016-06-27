<?php
function checkLength($str, $min, $max) {
	preg_match_all('/./u', $str, $matches);
	// var_dump($matches[0]);
	$len = count($matches[0]);
	if ($len < $min || $len > $max) {
		return false;
	} else {
		return true;
	}
}
?>