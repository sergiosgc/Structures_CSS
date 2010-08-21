--TEST--
Bug regression guard: Font family expansion should not introduce explicit default values
--FILE--
<?php
$testCSS = file_get_contents(dirname(__FILE__) . '/input/bug.incompleteFontFamily.css');

include('include/parse.php');

$parser->result->expandShorthand();
var_dump( $parser->result->__toString() );
?>
--EXPECT--
string(37) "a
{
 font-family: Arial,sans-serif
}
"
