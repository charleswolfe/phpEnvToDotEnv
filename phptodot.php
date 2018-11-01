<?php

/**
 * Depricated functions, so we will handle and return nothing
 */
function append_config($crap) {
        return '';
}

/**
 * Setup
 */
$in_file_name = $argv[1];

if (!$in_file_name) {
        throw new Exception('need to specify an input .env.php file!');
}

$in_env = include $in_file_name;
$out_file_name = ($argv[2]) ?: (str_replace('.php','', $in_file_name));
$handle = fopen($out_file_name, 'w') or die('Cannot open file:  '.$out_file_name);

foreach($in_env as $key => $value) {
        $line = $key . '="' . $value .'"' . PHP_EOL;
        fwrite($handle, $line);
}

fclose($handle);
