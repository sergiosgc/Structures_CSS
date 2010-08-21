--TEST--
Bug regression guard: Structures_CSS_Declaration_Border::collapseShorthand produces invalid RPN value stack
--FILE--
<?php
$testCSS = file_get_contents(dirname(__FILE__) . '/input/bug.borderShorthandInvalidRPN.css');

include('include/parse.php');

$parser->result->collapseShorthand(false);
var_dump( $parser->result->__toString() );
?>
--EXPECT--
string(56) "b
{
 border-color: rgb(180, 214, 223) inherit inherit
}
"
