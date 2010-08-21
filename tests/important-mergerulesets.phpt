--TEST--
Maintain important declarations when merging rulesets
--FILE--
<?php
$testCSS = file_get_contents(dirname(__FILE__) . '/input/important.css');

include('include/parse.php');

$parser->result->mergeRulesets();
var_dump( $parser->result->__toString() );
?>
--EXPECT--
string(53) "a
{
 color: rgb(0, 0, 255) !important;
 top: -27px
}
"
