<?php
function ngram($sentence, $n) {
	$ngram = [];
	$end = count($sentence) - $n + 1;
	for ($i = 0; $i < $end; $i++) {
		$ngram[] = array_slice($sentence, $i ,$n);
	}
	return $ngram;
}

function word_ngram($sentence, $n) {
	$sequence = str_word_count($sentence, 1);
	$word_ngram = ngram($sequence, $n);
	$result = [];
	foreach ($word_ngram as $word) {
		$w_result[] = implode(' ', $word);
	}
	return $w_result;
}

function char_ngram($sentence, $n) {
	$sequence = str_split($sentence);
	$char_ngram = ngram($sequence, $n);
	$c_result = array_map('implode', $char_ngram);
	return $c_result;
}

