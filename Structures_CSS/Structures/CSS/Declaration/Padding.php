<?php
/**
 * @package Structures_CSS
 */

/* vim: set expandtab tabstop=4 shiftwidth=4 foldmethod=marker: */
/** */
require_once('Structures/CSS/Declaration/BoxModel.php');
/** */
require_once('Structures/CSS/Exception.php');
/**
 * CSS declaration padding class
 * @package Structures_CSS
 */
class Structures_CSS_Declaration_Padding extends Structures_CSS_Declaration_BoxModel
{
    /* expandShorthand {{{ */
    /**
     * For shorthand properties, like border or font, replaces this declaration with the 
     * non-shorthand equivalent properties
     *
     * Some shorthand properties resolve onto other shorthand properties. For example:
     *  border: 1px;
     * resolves into:
     *  border-width: 1px;
     * By default, this method performs a /deep/ replacement, so that:
     *  border: 1px;
     * resolves into:
     *  border-top-width: 1px;
     *  border-right-width: 1px;
     *  border-bottom-width: 1px;
     *  border-left-width: 1px;
     * If you wish a shallow replacement, pass false as the first paramenter
     *
     * @param boolean Perform a deep replacement? Defaults to true
     * @return boolean True if a replacement has ocurred, false otherwise
     */
    public function expandShorthand($deep = true)
    {
        require_once('Structures/CSS/Value/Unit.php');
        $this->expandBoxModelValues();
        return $this->_expandShorthand($deep, 
                               array(
                                'padding-top' => 'Structures_CSS_Value_Unit',
                                'padding-right' => 'Structures_CSS_Value_Unit',
                                'padding-bottom' => 'Structures_CSS_Value_Unit',
                                'padding-left' => 'Structures_CSS_Value_Unit'));
    }
    /* }}} */
    /* collapseShorthand {{{ */
    /**
     * Collapse single properties in one shorthand property
     *
     * @param Structures_CSS_Rule_Set
     * @return boolean True iff colapsing ocurred
     */
    public static function collapseShorthand(&$ruleset)
    {
        $result = parent::collapseShorthand($ruleset, 
                                  array(
                                   'padding-top' => array(0),
                                   'padding-right' => array(0),
                                   'padding-bottom' => array(0),
                                   'padding-left' => array(0)), 
                                  'padding', null, false);
        return $result;
    }
    /* }}} */
}
?>
