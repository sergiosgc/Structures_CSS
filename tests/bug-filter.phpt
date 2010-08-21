--TEST--
Bug regression guard: Parser fails with filter: alpha(opacity=<number>)
--FILE--
<?php
$testCSS = file_get_contents(dirname(__FILE__) . '/input/filter.css');

include('include/parse.php');
var_dump( $parser->result->__toString() );
?>
--EXPECT--
