--TEST--
Bug regression guard: border-left wrongly expands to border-top-*
--FILE--
<?php
$testCSS = file_get_contents(dirname(__FILE__) . '/input/bug.borderLeftExpandsToBorderTop.css');

include('include/parse.php');
$parser->result->expandShorthand();
var_dump( $parser->result->__toString() );
?>
--EXPECT--
string(96) "a
{
 border-left-width: 10px;
 border-left-style: solid;
 border-left-color: rgb(117, 51, 84)
}
"
