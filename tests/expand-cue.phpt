--TEST--
CSS::expandShorthand test for expansion of cue declaration
--FILE--
<?php
$testCSS = file_get_contents(dirname(__FILE__) . '/input/shorthandCue.css');

include('include/parse.php');

$parser->result->expandShorthand();
var_dump( $parser->result->__toString() );
?>
--EXPECT--
string(78) "a
{
 cue-before: url("a.mp3");
 cue-after: url("b.mp3")
}
b
{
 cue: inherit
}
"
