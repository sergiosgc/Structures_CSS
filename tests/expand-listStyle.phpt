--TEST--
CSS::expandShorthand test for expansion of list-style declaration
--FILE--
<?php
$testCSS = file_get_contents(dirname(__FILE__) . '/input/shorthandListStyle.css');

include('include/parse.php');

$parser->result->expandShorthand();
var_dump( $parser->result->__toString() );
?>
--EXPECT--
string(85) "a
{
 list-style-type: disc;
 list-style-position: outside;
 list-style-image: none
}
"
