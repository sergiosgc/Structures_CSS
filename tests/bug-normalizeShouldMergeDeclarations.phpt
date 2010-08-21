--TEST--
Bug regression guard: CSS::normalize won't merge border-top with border
--FILE--
<?php
$testCSS = file_get_contents(dirname(__FILE__) . '/input/bug.normalizeShouldMergeDeclarations.css');

include('include/parse.php');

$parser->result->normalize(false);

var_dump( $parser->result->__toString() );
?>
--EXPECT--
string(40) "a
{
 border: 1px solid rgb(255, 0, 0)
}
"
