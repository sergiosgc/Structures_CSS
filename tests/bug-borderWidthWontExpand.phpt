--TEST--
Bug regression guard: Null result on border-width expansion using CSS::expandShorthand
--FILE--
<?php
$testCSS = file_get_contents(dirname(__FILE__) . '/input/bug.borderWidthWontExpand.css');

include('include/parse.php');

$parser->result->expandShorthand();
var_dump( $parser->result->__toString() );
?>
--EXPECT--
string(111) "a
{
 border-top-width: thin;
 border-right-width: thin;
 border-bottom-width: thin;
 border-left-width: thin
}
"
