<?php
define('DEBUG', false);
ini_set('include_path', realpath(dirname(__FILE__) . '/../../ParserDriver') . ':' . 
                        realpath(dirname(__FILE__) . '/../../Structures_CSS/Structures_CSS') . ':' . 
                        realpath(dirname(__FILE__) . '/../../CSSDOM') . ':' . 
                        realpath(dirname(__FILE__) . '/../') . ':' .  
                        ini_get('include_path'));
require_once('CSS/Parser.php');
require_once('CSS/Lexer.php');
require_once('Structures/CSS/Iterator/Recursive.php');
$parser = new CSS_Parser();
$parser->tokenizeAndParse(new CSS_Lexer, $testCSS);
/*

$aux = new ReflectionClass('CSS_Parser');
$aux = $aux->getConstants();
$tokenNames = array();
foreach ($aux as $constant => $value) {
    if ($constant == 'YY_NO_ACTION') break;
    $tokenNames[$value] = $constant;
}


$lexer = new CSS_Lexer($testCSS);
$parser = new CSS_Parser();
if (DEBUG) $parser->PrintTrace();
while ($token = $lexer->nextToken()) {
    if (DEBUG) {
        print("------------\n");
        print("  Lexer current line: " . $lexer->getLine() . "\n");
        printf("  Lexer output token {%s, %s}\n", $tokenNames[$token['token']], $token['value']);
        print("------------\n");
    }
    $parser->doParse($token['token'], $token['value']);
}
$parser->doParse(0,0);
*/
?>
