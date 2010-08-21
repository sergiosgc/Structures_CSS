--TEST--
Bug regression guard: Structures_CSS outputs empty result sets instead of silently discarding
--FILE--
<?php
$testCSS = file_get_contents(dirname(__FILE__) . '/input/bug.emptyRulesetsShouldBeDiscarded.css');

include('include/parse.php');
foreach ($parser->result as $ruleset) foreach($ruleset as $declaration) $ruleset->removeDeclaration($declaration->getProperty());
var_dump( $parser->result->__toString() );
?>
--EXPECT--
string(0) ""
