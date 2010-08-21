--TEST--
CSS::collapseShorthand test for collapsing of cue declaration
--FILE--
<?php
$testCSS = file_get_contents(dirname(__FILE__) . '/input/expandedCue.css');

include('include/parse.php');

$parser->result->collapseShorthand(true);
var_dump( $parser->result->__toString() );
?>
--EXPECT--
string(58) "a
{
 cue: url("a.mp3") url("b.mp3")
}
b
{
 cue: inherit
}
"