--TEST--
CSS::expandShorthand test for expansion of background declaration
--FILE--
<?php
$testCSS = file_get_contents(dirname(__FILE__) . '/input/shorthandBackground.css');

include('include/parse.php');

$parser->result->expandShorthand(true);
var_dump( $parser->result->__toString() );
?>
--EXPECT--
string(206) "a
{
 background-color: rgb(255, 0, 0);
 background-image: url("/image.png");
 background-repeat: repeat;
 background-attachment: scroll;
 background-position: left bottom
}
b
{
 background-color: inherit
}
"