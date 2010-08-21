--TEST--
CSS::expandShorthand test for shallow expansion of border declaration
--FILE--
<?php
$testCSS = file_get_contents(dirname(__FILE__) . '/input/shorthandBorder.css');

include('include/parse.php');

$parser->result->expandShorthand(false);
var_dump( $parser->result->__toString() );
?>
--EXPECT--
string(107) "a
{
 border-width: 1px;
 border-style: solid;
 border-color: rgb(255, 0, 0)
}
b
{
 border-width: inherit
}
"
