--TEST--
Bug regression guard: Null result on border expansion using CSS::expandShorthand
--FILE--
<?php
$testCSS = file_get_contents(dirname(__FILE__) . '/input/bug.borderWontExpand.css');

include('include/parse.php');

$parser->result->expandShorthand();
var_dump( $parser->result->__toString() );
?>
--EXPECT--
string(383) "a
{
 border-top-width: medium;
 border-right-width: medium;
 border-bottom-width: medium;
 border-left-width: medium;
 border-top-style: solid;
 border-right-style: solid;
 border-bottom-style: solid;
 border-left-style: solid;
 border-top-color: rgb(255, 0, 255);
 border-right-color: rgb(255, 0, 255);
 border-bottom-color: rgb(255, 0, 255);
 border-left-color: rgb(255, 0, 255)
}
"
