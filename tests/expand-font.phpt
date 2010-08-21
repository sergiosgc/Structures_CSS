--TEST--
CSS::expandShorthand test for expansion of font declaration
--FILE--
<?php
$testCSS = file_get_contents(dirname(__FILE__) . '/input/shorthandFont.css');

include('include/parse.php');

$parser->result->expandShorthand();
var_dump( $parser->result->__toString() );
?>
--EXPECT--
string(386) "a
{
 font-style: italic;
 font-variant: small-caps;
 font-weight: bold;
 font-size: 12px;
 line-height: 2;
 font-family: Arial,monospace
}
b
{
 font-size: 12px;
 line-height: 2;
 font-family: Arial,monospace
}
c
{
 font-style: italic;
 font-variant: small-caps;
 font-weight: bold;
 font-size: 12px;
 font-family: Arial,monospace
}
d
{
 font-size: 12px;
 font-family: Arial,monospace
}
"
