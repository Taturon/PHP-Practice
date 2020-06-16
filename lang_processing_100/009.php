<?php
$words = explode(' ', trim(fgets(STDIN)));

foreach ($words as $word) {
	if (strlen($word) > 4) {
		$chars = str_split($word);
		$first = array_shift($chars);
		$last = array_pop($chars);
		shuffle($chars);
		$typoglycemia[] = $first . implode($chars) . $last;
	} else {
		$typoglycemia[] = $word;
	}
}

$sentence = implode(' ', $typoglycemia); 

echo $sentence . PHP_EOL;
