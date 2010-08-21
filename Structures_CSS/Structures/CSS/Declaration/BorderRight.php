<?php
/**
 * @package Structures_CSS
 */

/* vim: set expandtab tabstop=4 shiftwidth=4 foldmethod=marker: */
/** */
require_once('Structures/CSS/Declaration.php');
/**
 * CSS declaration border class
 * @package Structures_CSS
 */
class Structures_CSS_Declaration_BorderRight extends Structures_CSS_Declaration
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
        require_once('Structures/CSS/Value/Color.php');
        require_once('Structures/CSS/Value/Unit.php');
        require_once('Structures/CSS/Value/Generic.php');

        return $this->_expandShorthand($deep, 
                               array(
                                 'border-right-width' => 'Structures_CSS_Value_Unit',
                                 'border-right-style'  => 'Structures_CSS_Value_Generic',
                                 'border-right-color' => 'Structures_CSS_Value_Color'));
    }
    /* }}} */
    /* collapseShorthand {{{ */
    /**
     * Collapse single properties in one shorthand property
     *
     * @param Structures_CSS_Rule_Set
     * @return boolean True iff colapsing ocurred
     */
    public static function collapseShorthand($ruleset)
    {
        return parent::collapseShorthand($ruleset, 
                                  array(
                                   'border-right-width' => array('inherit'),
                                   'border-right-style' => array('inherit'),
                                   'border-right-color' => array('inherit')),
                                  'border-right');
    }
    /* }}} */
}
?>
