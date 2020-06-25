<?php
$lines = file('neko.txt.mecab');

$i = 0;
foreach ($lines as $line) {
	if ($line === "EOS\n") {
		$morph['surface'] = 'EOS';
		$morph['base'] = null;
		$morph['pos'] = null;
		$morph['pos1'] = null;
	} else {
		$str = explode("\t", $line);
		$morph['surface'] = $str[0];
		$elements = explode(',', $str[1]);
		$morph['base'] = $elements[6];
		$morph['pos'] = $elements[0];
		$morph['pos1'] = $elements[1];
	}
	$morphs[$i] = $morph;
	$i++;
}

