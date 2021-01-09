<?php
if(preg_match("/\bweb\b/i", "PHP is the web scripting language of choice.")) {
	echo "A match was found";
}
else {
	echo "A match was not found";
}

if(preg_match("/\bweb\b/i", "PHP is the website scripting language of choice.")) {
	echo "A match was found<br>";
}
else {
	echo "A match was not found<br>";
}



$subject = 'coding everybody http://opentutorials.org egoing@egoing.com 010-2246-1662';
preg_match('~(http://\w+\.\w+)\s(\w+@\w+\.\w+)~',$subject, $match);
var_dump($match);
echo "homepage: " . $match[1];
echo "<br>";
echo "email: " . $match[2] . "<br>";

$string = 'April 15, 2003';
$pattern = '/(\w+) (\d+), (\d+)/i';
$replacement = '${1}1,$3';
echo preg_replace($pattern, $replacement, $string);
?>
