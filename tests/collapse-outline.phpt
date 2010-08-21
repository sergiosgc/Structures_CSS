--TEST--
CSS::collapseShorthand test for collapsing of outline declaration
--FILE--
<?php
$testCSS = file_get_contents(dirname(__FILE__) . '/input/expandedOutline.css');

include('include/parse.php');

$parser->result->collapseShorthand(true);
var_dump( $parser->result->__toString() );
?>
--EXPECT--
string(41) "a
{
 outline: rgb(255, 0, 0) solid 2px
}
"