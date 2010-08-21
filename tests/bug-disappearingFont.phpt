--TEST--
Bug regression guard: Disappearing font declaration on CSS::expandShorthand
--FILE--
<?php
$testCSS = file_get_contents(dirname(__FILE__) . '/input/bug.disappearingFont.css');

include('include/parse.php');

$parser->result->expandShorthand();
var_dump( $parser->result->__toString() );
?>
--EXPECT--
string(172) "#language-header,
#updated-header
{
 font-style: normal;
 font-variant: normal;
 font-weight: normal;
 font-size: 25px;
 line-height: 1.4;
 font-family: Arial,sans-serif
}
"