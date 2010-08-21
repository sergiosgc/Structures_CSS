<?php
/**
 * @package Structures_CSS
 */

/* vim: set expandtab tabstop=4 shiftwidth=4 foldmethod=marker: */
/** */
require_once('Structures/CSS/Rule.php');
/**
 * CSS ruleset class as per CSS2rev1 4.1.7: A rule set (also called "rule") consists of a selector followed by a declaration block.
 * @package Structures_CSS
 */
class Structures_CSS_Rule_AtPage extends Structures_CSS_Rule_Set implements Structures_CSS_Rule
{
    /* Constructor {{{ */
    /**
     * Constructor
     *
     */
    public function __construct($ruleset, $pseudo = null)
    {
        $selector = '@page';
        if (!is_null($pseudo)) {
            $selector .= ' ' . $pseudo;
        }
        parent::__construct($selector, $ruleset);
    }
    /* }}} */
}
?>
