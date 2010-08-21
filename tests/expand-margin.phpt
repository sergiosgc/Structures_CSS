--TEST--
CSS::expandShorthand test for expansion of margin declaration
--FILE--
<?php
$testCSS = file_get_contents(dirname(__FILE__) . '/input/shorthandMargin.css');

include('include/parse.php');

$parser->result->expandShorthand();
var_dump( $parser->result->__toString() );
?>
--EXPECT--
string(253) "a
{
 margin-top: 10px;
 margin-right: 10px;
 margin-bottom: 10px;
 margin-left: 10px
}
b
{
 margin-top: 4px;
 margin-right: 5px;
 margin-bottom: 4px;
 margin-left: 5px
}
c
{
 margin-top: 1px;
 margin-right: 2px;
 margin-bottom: 3px;
 margin-left: 2px
}
"