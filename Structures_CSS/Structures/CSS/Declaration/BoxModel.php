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
 * CSS declaration abstract class from where box model declaration inherit
 * @package Structures_CSS
 */
abstract class Structures_CSS_Declaration_BoxModel extends Structures_CSS_Declaration implements IteratorAggregate
{
    /* collapseShorthand {{{ */
    /**
     * Collapse single properties in one shorthand property for box model properties (where each single property defines four values in the resulting shorthand)
     *
     * @param Structures_CSS_Rule_Set
     * @param array Dictionary of property defaults indexed by property name. Each property default is an array of Structures_CSS_Value instances or an array of native values that Structures_CSS_Value::create can properly transform
     * @param string Shorthand property name
     * @param boolean Collapse rules with !important set?
     * @param boolean Assume missing values at the end of the declaration are set to the default?
     * @param boolean Deep True if collapsing should be recursive
     * @return boolean True iff colapsing ocurred
     */
    public static function collapseShorthand(&$ruleset, $properties, $shorthand, $important, $tailIsDefaults, $deep = true)
    {
        switch ($shorthand) {
            case 'border-color':
            case 'border-style':
            case 'border-width':
            case 'margin':
            case 'padding':
            case 'outline':
                return parent::collapseShorthand($ruleset, $properties, $shorthand, $important, $tailIsDefaults, $deep);
                break;
        }

        if (is_null($properties) || is_null($shorthand)) return false;
        /* Preprocess the properties array */
        foreach ($properties as $property => $defaultValues) {
            foreach ($defaultValues as $index => $defaultValue) {
                if (!$defaultValue instanceof Structures_CSS_Value) $properties[$property][$index] = Structures_CSS_Value::create($defaultValue);
            }
        }
        if (is_null($important)) {
            $a = self::collapseShorthand($ruleset, $properties, $shorthand, false, $tailIsDefaults);
            $b = self::collapseShorthand($ruleset, $properties, $shorthand, true, $tailIsDefaults);
            return $a || $b; // Use variables to compute return value because lazy boolean expression evaluation could cause incomplete execution
        }

        $defaultValues = array_values($properties);
        $propertyNames = array_keys($properties);
        $sourceProperties = array();
        foreach($propertyNames as $property) {
            $sourceProperties[$property] =  $ruleset->getDeclaration($property, $important);
        }
        $existingProperties = array_keys(array_filter($sourceProperties));
        if (count($existingProperties) == 0) return false;

        foreach($propertyNames as $property) if (!$sourceProperties[$property]) {
            $sourceProperties[$property] = Structures_CSS_Declaration::create($property, Structures_CSS_Value::addRPNOperators($properties[$property], ''), $important);
        }

        foreach($propertyNames as $property) if ($sourceProperties[$property] instanceof Structures_CSS_Declaration_BoxModel) $sourceProperties[$property]->expandBoxModelValues(); 

        $shorthandValues = array();
        foreach (array(0, 1, 3, 5) as $valuePos) foreach ($propertyNames as $property) {
            $shorthandValues[] = $sourceProperties[$property]->getValue($valuePos);
        }

        foreach ($existingProperties as $property) $ruleset->removeDeclaration($property);
        $ruleset->addDeclaration(Structures_CSS_Declaration::create($shorthand, Structures_CSS_Value::addRPNOperators($shorthandValues, ''), $important));

        return true;
    }
    /* }}} */
    /* expandBoxModelValues {{{ */
    /**
     * Expands shorthand properties defining top, right, bottom and left properties to explicitely define all four values
     *
     * @return boolean True if collapsing ocurred
     */
    public function expandBoxModelValues()
    {
        $values = array_values(array_filter($this->getValues(), 'is_object'));
        $result = count($values);
        if (count($values) == 1) {
            $values = array($values[0], clone $values[0]);
        }
        if (count($values) == 2) {
            $values = array($values[0], $values[1], clone $values[0]);
        }
        if (count($values) == 3) {
            $values = array($values[0], $values[1], $values[2], clone $values[1]);
        }
        $this->setValues(Structures_CSS_Value::addRPNOperators($values, ''));
        return count($values) != $result;
    }
    /* }}} */
    /* collapseBoxModelValues {{{ */
    /**
     * Reduces shorthand properties defining top, right, bottom and left properties to the minimum ammount of values
     *
     * @return boolean True if collapsing ocurred
     */
    public function collapseBoxModelValues()
    {
        $values = array_values(array_filter($this->getValues(), 'is_object'));
        $result = count($values);
        if (count($values) == 4 && $values[1]->equals($values[3])) {
            unset($values[3]);
        }
        if (count($values) == 3 && $values[0]->equals($values[2])) {
            unset($values[2]);
        }
        if (count($values) == 2 && $values[0]->equals($values[1])) {
            unset($values[1]);
        }
        $this->setValues(Structures_CSS_Value::addRPNOperators($values, ''));
        return count($values) != $result;
    }
    /* }}} */
}
?>
