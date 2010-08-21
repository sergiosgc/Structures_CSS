<?php
/**
 * @package Structures_CSS
 */

/* vim: set expandtab tabstop=4 shiftwidth=4 foldmethod=marker: */
/** */
require_once('Structures/CSS/Declaration.php');
/** */
require_once('Structures/CSS/Value.php');
/**
 * CSS declaration border class
 * @package Structures_CSS
 */
class Structures_CSS_Declaration_Border extends Structures_CSS_Declaration
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
        require_once('Structures/CSS/Value/Generic.php');
        require_once('Structures/CSS/Value/Color.php');

        return $this->_expandShorthand($deep, 
                               array(
                                 'border-width' => array(array('Structures_CSS_Value_Unit', 'Structures_CSS_Value_Generic')),
                                 'border-style'  => 'Structures_CSS_Value_Generic',
                                 'border-color' => array(array('Structures_CSS_Value_Color', 'Structures_CSS_Value_Generic'))));
    }
    /* }}} */
    /* collapseShorthand {{{ */
    /**
     * Collapse single properties in one shorthand property
     *
     * @param Structures_CSS_Rule_Set
     * @return boolean True iff colapsing ocurred
     */
    public static function collapseShorthand($ruleset, $important = null)
    {
        if (is_null($important)) {
            $a = self::collapseShorthand($ruleset, true);
            return self::collapseShorthand($ruleset, false) || $a;
        }
        $values = array();
        $toRemove = array();
        foreach (array('width', 'style', 'color') as $property) {
            $top = self::_getSubpropertyValue($ruleset, $property, 'top', $important);
            $right = self::_getSubpropertyValue($ruleset, $property, 'right', $important);
            $bottom = self::_getSubpropertyValue($ruleset, $property, 'bottom', $important);
            $left = self::_getSubpropertyValue($ruleset, $property, 'left', $important);

            if (!($top && $right && $bottom && $left)) break;
            if ($top->__toString() != $right->__toString()) break;
            if ($top->__toString() != $bottom->__toString()) break;
            if ($top->__toString() != $left->__toString()) break;

            $values[] = $top;
            $toRemove[] = $property;
        }
        if (count($values) == 0) return false;

        $ruleset->addDeclaration(Structures_CSS_Declaration::create('border', 
            Structures_CSS_Value::addRPNOperators($values, ''), $important), true);
        foreach ($toRemove as $property) {
            try {
                $ruleset->removeDeclaration('border-' . $property);
            } catch (Exception $e) {} // Declaration may not exist, it's ok
            foreach (array('top', 'left', 'bottom', 'right') as $position) {
                try {
                    $ruleset->removeDeclaration('border-' . $position . '-' . $property);
                } catch (Exception $e) {} // Declaration may not exist, it's ok
            }
        }
        return true;
    }
    /* }}} */
    /* _getSubpropertyValue {{{ */
    protected static function _getSubpropertyValue($ruleset, $property, $position, $important)
    {
        $p = $ruleset->getDeclaration('border-' . $position . '-' . $property, $important);
        if ($p) {
            return $p->getValue(0);
        }

        $p = $ruleset->getDeclaration('border-' . $property, $important);
        if ($p) {
            $p->expandBoxModelValues();
            $value = array_values(array_filter($p->getValues(), 'is_object'));
            switch ($position) {
                case 'top':
                    return $value[0];
                    break;
                case 'right':
                    return $value[1];
                    break;
                case 'bottom':
                    return $value[2];
                    break;
                case 'left':
                    return $value[3];
                    break;
           }
        }
        return false;
    }
    /* }}} */
}
?>
