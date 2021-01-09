<?php
echo "Hello World";

$foo = "foobar";
$aaa = "foo는 $foo";
echo $aaa;

$baz = array("value" => "foo");
echo "this is {$baz['value']} !";

$variable = "1234";

echo <<<END
$variable
END;
?>
