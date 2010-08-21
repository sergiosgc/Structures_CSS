--TEST--
CSS::collapseShorthand test for collapsing of list-style declaration
--FILE--
<?php
$testCSS = file_get_contents(dirname(__FILE__) . '/input/expandedListStyle.css');

include('include/parse.php');

$parser->result->collapseShorthand(true);
var_dump( $parser->result->__toString() );
?>
--EXPECT--
string(37) "a
{
 list-style: disc outside none
}
"