<?php
    $string = 'The quick brown fox jumped over the lazy dog';

    $pattern = array();
    $pattern[0] = '/quick/';
    $pattern[1] = '/brown/';
    $pattern[2] = '/fox/';

    $replacements = array();
    $replacements[0] = 'bear';
    $replacements[1] = 'black';
    $replacements[2] = 'slow';
 
    $replacements2 = array();
    $replacements2[2] = 'slow';
    $replacements2[0] = 'bear';
    $replacements2[1] = 'black';

    echo preg_replace($pattern, $replacements, $string);
    echo "<br>";
    echo preg_replace($pattern, $replacements2, $string);

?>