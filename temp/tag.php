<?php
$unarray = "for&historical&reasons&accept&its&parameters&in&either&order";
$motscles	= explode('&', $unarray, -1);

$motReturn = "";
$last_key = end(array_keys($motscles));
foreach ($motscles as $key => $value) {
	# code...
	if ($key == $last_key) {
	$motReturn .= "(NULL, '".$value."');";
	} else {
	$motReturn .= "(NULL, '".$value."'), ";
	}
	
	
}

echo $motReturn;

?>
