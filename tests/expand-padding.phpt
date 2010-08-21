--TEST--
CSS::expandShorthand test for expansion of padding declaration
--FILE--
<?php
$testCSS = file_get_contents(dirname(__FILE__) . '/input/shorthandPadding.css');

include('include/parse.php');

$parser->result->expandShorthand();
var_dump( $parser->result->__toString() );
?>
--EXPECT--
string(265) "a
{
 padding-top: 10px;
 padding-right: 10px;
 padding-bottom: 10px;
 padding-left: 10px
}
b
{
 padding-top: 4px;
 padding-right: 5px;
 padding-bottom: 4px;
 padding-left: 5px
}
c
{
 padding-top: 1px;
 padding-right: 2px;
 padding-bottom: 3px;
 padding-left: 2px
}
"