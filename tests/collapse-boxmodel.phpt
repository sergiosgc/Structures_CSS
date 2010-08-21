--TEST--
CSS::collapseBoxModelValues
--FILE--
<?php
$testCSS = file_get_contents(dirname(__FILE__) . '/input/expandedBoxModel.css');

include('include/parse.php');

$parser->result->collapseBoxModelValues();
var_dump( $parser->result->__toString() );
?>
--EXPECT--
string(90) "a
{
 border: 0px inherit inherit
}
b
{
 margin: 1px 2px
}
c
{
 padding: 1px 2px 2px 1px
}
"
