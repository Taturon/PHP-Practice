<?php
require_once 'n_gram.php';

$input = trim(fgets(STDIN));

echo "---word_ngram---\n";
echo var_dump(word_ngram($input, 2)) . PHP_EOL;
echo "---char_ngram---\n";
echo var_dump(char_ngram($input, 2)) . PHP_EOL;

	
