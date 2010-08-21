--TEST--
CSS::collapseShorthand test for collapsing of background declaration
--FILE--
<?php
$testCSS = file_get_contents(dirname(__FILE__) . '/input/expandedBackground.css');

include('include/parse.php');

$parser->result->collapseShorthand(true);
var_dump( $parser->result->__toString() );
?>
--EXPECT--
string(129) "a
{
 background: rgb(255, 0, 0) url("/image.png") repeat scroll 0% 0%
}
b
{
 background: transparent none inherit scroll 0% 0%
}
"
