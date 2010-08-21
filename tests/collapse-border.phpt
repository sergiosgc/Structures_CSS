--TEST--
CSS::collapseShorthand test for collapsing of border declaration
--FILE--
<?php
$testCSS = file_get_contents(dirname(__FILE__) . '/input/expandedBorder.css');

include('include/parse.php');

$parser->result->collapseShorthand();
var_dump( $parser->result->__toString() );
?>
--EXPECT--
string(93) "a
{
 border: 1px solid rgb(255, 0, 0)
}
b
{
 border-style: inherit inherit inherit inherit
}
"
