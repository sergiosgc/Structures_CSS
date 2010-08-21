<?php
/**
 * @package Structures_CSS
 */

/* vim: set expandtab tabstop=4 shiftwidth=4 foldmethod=marker: */
/** */
require_once('Structures/CSS/Declaration.php');
/** */
require_once('Structures/CSS/Exception.php');
/**
 * CSS declaration font class
 * @package Structures_CSS
 */
class Structures_CSS_Declaration_Font extends Structures_CSS_Declaration
{
    /* ExpandShorthand {{{ */
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
        $values = array_filter($this->_values, 'is_object');
        if (count($values) == 1) {
            switch ($values[0]->getValue()) {
                case 'caption':
                case 'icon':
                case 'menu':
                case 'message-box':
                case 'small-caption':
                case 'status-bar':
                    return false;
            }
        }
        $values = array_values($this->_values);
        $fontFamilyIndex = count($values) - 1;
        while ($fontFamilyIndex >= 0 && $values[$fontFamilyIndex] != '') $fontFamilyIndex --;
        $fontFamilyIndex--; // The '' operator appears right after the first font-family alternative
        $fontFamily = array_slice($values, $fontFamilyIndex);
        unset($fontFamily[1]); // Discard the '' operator
        $fontFamily = array_values($fontFamily); // Reindex the array keys
        $values = array_values(array_filter(array_slice($values, 0, $fontFamilyIndex), 'is_object')); // Slice, discard operators and reindex array keys
        switch (count($values)) {
            case 0:
                break;
            case 1:
                $expanded = array(
                    Structures_CSS_Declaration::create('font-size', array(clone $values[0]), $this->getImportant()),
                    );
                break;
            case 2:
                $expanded = array(
                    Structures_CSS_Declaration::create('font-size', array(clone $values[0]), $this->getImportant()),
                    Structures_CSS_Declaration::create('line-height', array(clone $values[1]), $this->getImportant()),
                    );
                break;
            case 4:
                $expanded = array(
                    Structures_CSS_Declaration::create('font-style', array(clone $values[0]), $this->getImportant()),
                    Structures_CSS_Declaration::create('font-variant', array(clone $values[1]), $this->getImportant()),
                    Structures_CSS_Declaration::create('font-weight', array(clone $values[2]), $this->getImportant()),
                    Structures_CSS_Declaration::create('font-size', array(clone $values[3]), $this->getImportant()),
                    );
                break;
            case 5:
                $expanded = array(
                    Structures_CSS_Declaration::create('font-style', array(clone $values[0]), $this->getImportant()),
                    Structures_CSS_Declaration::create('font-variant', array(clone $values[1]), $this->getImportant()),
                    Structures_CSS_Declaration::create('font-weight', array(clone $values[2]), $this->getImportant()),
                    Structures_CSS_Declaration::create('font-size', array(clone $values[3]), $this->getImportant()),
                    Structures_CSS_Declaration::create('line-height', array(clone $values[4]), $this->getImportant()),
                    );
                break;
            default:
                require_once('Structures/CSS/Exception.php');
                throw new Structures_CSS_Exception(sprintf('Unable to expand font declaration. Don\'t know what to do with %d values', count($values)));
        }
        $expanded[] = Structures_CSS_Declaration::create('font-family', $fontFamily, $this->getImportant());

        $this->_container->replaceDeclaration($this, $expanded);
        return true;
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
        // Buggy method. I've disabled it
        return false;
        // TODO Fix bug with handling of line-height (this uses a '' operator and not a '/' operator between font-size and line-height
        // TODO Fix bug with handling of undefined default in font-family
        $result = parent::collapseShorthand($ruleset, 
                                  array(
                                   'font-style' => array('normal'),
                                   'font-variant' => array('normal'),
                                   'font-weight' => array('normal'),
                                   'font-size' => array('medium'),
                                   'line-height' => array('normal'),
                                   'font-family' => array('normal')), // Default not defined in spec, API does not contemple undefined defaults
                                  'font', null, false);
        return $result;
    }
    /* }}} */
}
?>
