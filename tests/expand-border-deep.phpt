--TEST--
CSS::expandShorthand test for deep expansion of border declaration
--FILE--
<?php
$testCSS = file_get_contents(dirname(__FILE__) . '/input/shorthandBorder.css');

include('include/parse.php');

$parser->result->expandShorthand(true);
var_dump( $parser->result->__toString() );
?>
--EXPECT--
string(486) "a
{
 border-top-width: 1px;
 border-right-width: 1px;
 border-bottom-width: 1px;
 border-left-width: 1px;
 border-top-style: solid;
 border-right-style: solid;
 border-bottom-style: solid;
 border-left-style: solid;
 border-top-color: rgb(255, 0, 0);
 border-right-color: rgb(255, 0, 0);
 border-bottom-color: rgb(255, 0, 0);
 border-left-color: rgb(255, 0, 0)
}
b
{
 border-top-width: inherit;
 border-right-width: inherit;
 border-bottom-width: inherit;
 border-left-width: inherit
}
"
