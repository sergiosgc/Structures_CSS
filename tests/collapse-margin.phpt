--TEST--
CSS::collapseShorthand test for collapsing of margin declaration
--FILE--
<?php
$testCSS = file_get_contents(dirname(__FILE__) . '/input/expandedMargin.css');

include('include/parse.php');

$parser->result->collapseShorthand(true);
var_dump( $parser->result->__toString() );
?>
--EXPECT--
string(97) "a
{
 margin: 10px 10px 10px 10px
}
b
{
 margin: 4px 5px 4px 5px
}
c
{
 margin: 1px 2px 3px 2px
}
"
