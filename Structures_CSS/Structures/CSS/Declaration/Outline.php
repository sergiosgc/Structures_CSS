<?php
/**
 * @package Structures_CSS
 */

/* vim: set expandtab tabstop=4 shiftwidth=4 foldmethod=marker: */
/** */
require_once('Structures/CSS/Declaration/BoxModel.php');
/**
 * CSS declaration outline class
 * @package Structures_CSS
 */
class Structures_CSS_Declaration_Outline extends Structures_CSS_Declaration_BoxModel
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
        
        return $this->_expandShorthand($deep, 
                               array(
                                'outline-color' => 'Structures_CSS_Value_Color',
                                'outline-style' => 'Structures_CSS_Value_Generic',
                                'outline-width' => 'Structures_CSS_Value_Unit'));
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
                                   'outline-color' => array('invert'),
                                   'outline-style' => array('none'),
                                   'outline-width' => array('medium')),
                                  'outline', null, false);
        return $result;
    }
    /* }}} */
}
?>
