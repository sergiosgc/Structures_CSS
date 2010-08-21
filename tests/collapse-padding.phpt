--TEST--
CSS::collapseShorthand test for collapsing of padding declaration
--FILE--
<?php
$testCSS = file_get_contents(dirname(__FILE__) . '/input/expandedPadding.css');

include('include/parse.php');

$parser->result->collapseShorthand(true);
var_dump( $parser->result->__toString() );
?>
--EXPECT--
string(100) "a
{
 padding: 10px 10px 10px 10px
}
b
{
 padding: 4px 5px 4px 5px
}
c
{
 padding: 1px 2px 3px 2px
}
"
