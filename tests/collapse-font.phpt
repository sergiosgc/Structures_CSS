--TEST--
CSS::collapseShorthand test for collapsing of font declaration
--SKIPIF--
skip function is currently disabled
--FILE--
<?php
$testCSS = file_get_contents(dirname(__FILE__) . '/input/expandedFont.css');

include('include/parse.php');

$parser->result->collapseShorthand();
var_dump( $parser->result->__toString() );
?>
--EXPECT--
