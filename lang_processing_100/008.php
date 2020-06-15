<?php
$input = trim(fgets(STDIN));
function cipher($str) {
	$result = '';
	$chars = str_split($str);
	foreach ($chars as $char) {
		if (preg_match('/^[a-z]+$/', $char)) {
			$result .= chr(219 - ord($char));
		} else {
			$result .= $char;
		}
	}
	return $result;
}

$coded = cipher($input);
$decoded = cipher($coded);
echo '-----coded-----' . PHP_EOL;
echo $coded . PHP_EOL;	
echo '----decoded----' . PHP_EOL;
echo $decoded . PHP_EOL;	
