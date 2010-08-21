--TEST--
CSS::expandShorthand test for expansion of outline declaration
--FILE--
<?php
$testCSS = file_get_contents(dirname(__FILE__) . '/input/shorthandOutline.css');

include('include/parse.php');

$parser->result->expandShorthand();
var_dump( $parser->result->__toString() );
?>
--EXPECT--
string(81) "a
{
 outline-color: rgb(255, 0, 0);
 outline-style: solid;
 outline-width: 2px
}
"