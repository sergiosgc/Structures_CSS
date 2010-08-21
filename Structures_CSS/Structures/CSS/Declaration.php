<?php
/**
 * @package Structures_CSS
 */

/* vim: set expandtab tabstop=4 shiftwidth=4 foldmethod=marker: */
/** */
require_once('Structures/CSS/Value.php');
/**
 * CSS declaration parent class as per CSS2rev1
 * @package Structures_CSS
 */
class Structures_CSS_Declaration implements IteratorAggregate
{
    /* container field {{{ */
    /** Where is this object contained in the CSS */
    protected $_container;
    /**
     * Container Getter
     *
     * @return object Container
     */
    public function getContainer()
    {
        return $this->_container;
    }
    /**
     * Container Setter
     *
     * @param object Container
     */
    public function setContainer(&$value)
    {
        $this->_container =& $value;
    }
    /* }}} */
    /* GetCSS {{{ */
    /**
     * Traverse the container tree upwards until finding the CSS object and return it
     *
     * @return mixed Description
     */
    public function getCSS()
    {
        require_once('Structures/CSS.php');
        $candidate =& $this->getContainer();
        if ($candidate instanceof Structures_CSS) {
            return $candidate;
        } else {
            return $candidate->getCSS();
        }
    }
    /* }}} */
    /* property field {{{ */
    /** Property name
     */
    protected $_property;
    /**
     * property Getter
     *
     * @return string Property name
     */
    public function getProperty()
    {
        return $this->_property;
    }
    /**
     * property Setter
     *
     * @param string New Property name
     */
    public function setProperty($value)
    {
        $this->_property = $value;
    }
    /* }}} */
    /* values field {{{ */
    /** Array of values defined in the declaration
     */
    protected $_values;
    /**
     * values Getter
     *
     * @return array Array of Structures_CSS_Value instances
     */
    public function &getValues()
    {
        return $this->_values;
    }
    /**
     * values Getter
     *
     * @return array Array of Structures_CSS_Value instances
     */
    public function &getValue($i)
    {
        return $this->_values[$i];
    }
    /**
     * values Setter
     *
     * @param array Array of Structures_CSS_Value instances
     */
    public function setValues($value)
    {
        $this->_values = $value;
        foreach (array_keys($this->_values) as $key) if (is_object($this->_values[$key])) $this->_values[$key]->setContainer($this);
    }
    /**
     * Add a new value to this declaration
     *
     * @param Structures_CSS_Value Value to be added
     */
    public function addValue(&$value)
    {
        $this->_values[] =& $value;
        if (is_object($value)) $value->setContainer($this);
    }
    /* }}} */
    /* important field {{{ */
    /** Important name
     */
    protected $_important;
    /**
     * important Getter
     *
     * @return boolean Important name
     */
    public function getImportant()
    {
        return $this->_important;
    }
    /**
     * important Getter alias
     *
     * @return boolean Important name
     */
    public function isImportant()
    {
        return $this->getImportant();
    }
    /**
     * important Setter
     *
     * @param boolean New Important name
     */
    public function setImportant($value)
    {
        $this->_important = $value;
    }
    /* }}} */
    /*     __construct {{{ */
    /**
     * Constructor
     *
     */
    public function __construct($property, $values, $important)
    {
        $this->setProperty((string) $property);
        foreach (array_keys($values) as $key) {
            $this->addValue($values[$key]);
        }
        $this->setImportant((boolean) $important);
    }
    /* }}} */
    /* Create {{{ */
    /**
     * Factory method. Selects an appropriate Structures_CSS_Declaration subclass and returns a new instance
     *
     * @param string Property
     * @param array Structures_CSS_Value array with property values
     * @param boolean Important CSS property flag
     * @return Structures_CSS_Declaration A new Structures_CSS_Declaration
     */
    public static function &create($property, $values, $important)
    {
        switch ($property) {
            case 'border':
                require_once('Structures/CSS/Declaration/Border.php');
                $result = new Structures_CSS_Declaration_Border($property, $values, $important);
                break;
            case 'border-width':
                require_once('Structures/CSS/Declaration/BorderWidth.php');
                $result = new Structures_CSS_Declaration_BorderWidth($property, $values, $important);
                break;
            case 'border-color':
                require_once('Structures/CSS/Declaration/BorderColor.php');
                $result = new Structures_CSS_Declaration_BorderColor($property, $values, $important);
                break;
            case 'border-style':
                require_once('Structures/CSS/Declaration/BorderStyle.php');
                $result = new Structures_CSS_Declaration_BorderStyle($property, $values, $important);
                break;
            case 'border-top':
                require_once('Structures/CSS/Declaration/BorderTop.php');
                $result = new Structures_CSS_Declaration_BorderTop($property, $values, $important);
                break;
            case 'border-right':
                require_once('Structures/CSS/Declaration/BorderRight.php');
                $result = new Structures_CSS_Declaration_BorderRight($property, $values, $important);
                break;
            case 'border-bottom':
                require_once('Structures/CSS/Declaration/BorderBottom.php');
                $result = new Structures_CSS_Declaration_BorderBottom($property, $values, $important);
                break;
            case 'border-left':
                require_once('Structures/CSS/Declaration/BorderLeft.php');
                $result = new Structures_CSS_Declaration_BorderLeft($property, $values, $important);
                break;
            case 'outline':
                require_once('Structures/CSS/Declaration/Outline.php');
                $result = new Structures_CSS_Declaration_Outline($property, $values, $important);
                break;
            case 'font':
                require_once('Structures/CSS/Declaration/Font.php');
                $result = new Structures_CSS_Declaration_Font($property, $values, $important);
                break;
            case 'background':
                require_once('Structures/CSS/Declaration/Background.php');
                $result = new Structures_CSS_Declaration_Background($property, $values, $important);
                break;
            case 'list-style':
                require_once('Structures/CSS/Declaration/ListStyle.php');
                $result = new Structures_CSS_Declaration_ListStyle($property, $values, $important);
                break;
            case 'padding':
                require_once('Structures/CSS/Declaration/Padding.php');
                $result = new Structures_CSS_Declaration_Padding($property, $values, $important);
                break;
            case 'margin':
                require_once('Structures/CSS/Declaration/Margin.php');
                $result = new Structures_CSS_Declaration_Margin($property, $values, $important);
                break;
            case 'cue':
                require_once('Structures/CSS/Declaration/Cue.php');
                $result = new Structures_CSS_Declaration_Cue($property, $values, $important);
                break;
            case 'pause':
                require_once('Structures/CSS/Declaration/Pause.php');
                $result = new Structures_CSS_Declaration_Pause($property, $values, $important);
                break;
            default:
                $result = new Structures_CSS_Declaration($property, $values, $important);
        }
        return $result;
    }
    /* }}} */
    /*     __toString {{{ */
    /**
     * Produce a string representation of the declaration, suitable for inclusion in a CSS text file
     *
     * @return string CSS value as a string
     */
    public function __toString()
    {
        $result = strtolower($this->getProperty());
        $result .= ': ';
        $separator = '';
        $values = $this->_values;
        $value = '';
        while (count($values) > 1) {
            $operator = array_pop($values);
            if ($operator == '') $operator = ' ';
            $val = array_pop($values);
            if (!is_object($val)) { 
                print($this->getContainer()->getSelector()->__toString());
                print($this->getProperty()); print("\n");
                foreach ($this->_values as $value) {
                    print(gettype($value) . "  ->"); 
                    if (is_object($value)) {
                        print(get_class($value)); 
                        if (method_exists($value, 'getValue')) print(' -> ' . $value->getValue());
                    } else {
                        print($value); 
                    }
                    print("\n");
                }
            }
            $value = $operator . $val->__toString() . $value;
        }
        $val = array_pop($values);
        $result .= $val->__toString() . $value;
        if ($this->getImportant()) $result .= ' !important';
        return $result;
    }
    /* }}} */
    /* GetIterator {{{ */
    /**
     * Return an Iterator for the CSS rules
     *
     * @return Iterator an Iterator for the CSS rules.
     */
    public function getIterator()
    {
        require_once('Structures/CSS/Iterator/DeclarationValues.php');
        return new Structures_CSS_Iterator_DeclarationValues($this);
    }
    /* }}} */
    /* expandValue {{{ */
    /**
     * Expand a single shorthand value into the corresponding property
     *
     * @param Structures_CSS_Value The value
     * @param string Structures_CSS_Value expected subclass
     * @param string Expanded property name
     * @return Structures_CSS_Declaration_|false If the value is of the expected class, returns a declaration, otherwise false
     */
    protected function expandValue(&$values, $property, $type)
    {
        /* Recursive call handling */
        if (is_array($type)) {
            if (is_array($type[0])) { // Alternative types
                foreach ($type[0] as $alternative) {
                    $candidate = $this->expandValue($values, $property, $alternative);
                    if ($candidate) return $candidate;
                }
                return false;
            } else { // Multiple consecutive types
                $valuesCopy = $values;
                $result = array();
                $used = 0;
                $newValues = array();
                foreach ($type as $singleType) {
                    $used++;
                    $candidate = $this->expandValue($valuesCopy, $property, $singleType);
                    if (!$candidate) return false;
                    $newValues = array_merge($newValues, $candidate[0]->getValues());
                }
                $result = array(Structures_CSS_Declaration::create($property, 
                    Structures_CSS_Value::addRPNOperators($newValues, ''), 
                    $this->getImportant()));
                $values = array_slice($values, $used);
                return $result;
            }
        } elseif (reset($values) instanceof $type) { // Single type handling
            $valueCopy = clone reset($values);
            $result = array(Structures_CSS_Declaration::create($property, array($valueCopy), $this->getImportant()));
            unset($values[reset(array_keys($values))]);
            return $result;
        } else {
            return false;
        }

    }
    /* }}} */
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
     * @param array Dictionary of property accepted types indexed by single property names. If a property consumes more than one value, its entry should be an array of value types. If an entry has several type alternatives, its entry should be an array containing value type arrays.
     * @return boolean True if a replacement has ocurred, false otherwise
     */
    public function expandShorthand($deep = true) {
        return false;
    }
    /** _expandShorthand implements a generic expander method. It is the base for subclasses' expandShorthand method */
    public function _expandShorthand($deep = true, $singleProperties = null)
    {
        if (is_null($singleProperties)) return false;
        $expanded = array();
        $values = array_filter($this->_values, 'is_object');
        foreach ($singleProperties as $property => $type) {
            $candidate = $this->expandValue($values, $property, $type);
            if ($candidate) {
                $expanded = array_merge($expanded, $candidate);
            } else {
                break;
            }
        }
        try {
            if (count($values) == 0) {
                $this->_container->replaceDeclaration($this, $expanded);
                if ($deep) foreach ($expanded as $declaration) $declaration->expandShorthand($deep);

            } 
        } catch (Structures_CSS_DeclarationNotFoundException $e) {
            // No problem
        }
        return true;
    }
    /* }}} */
    /* collapseShorthand {{{ */
    /**
     * Collapse single properties in one shorthand property
     *
     * @param Structures_CSS_Rule_Set
     * @param array Dictionary of property defaults indexed by property name. Each property default is an array of Structures_CSS_Value instances or an array of native values that Structures_CSS_Value::create can properly transform
     * @param string Shorthand property name
     * @param boolean Collapse rules with !important set?
     * @param boolean Assume missing values at the end of the declaration are set to the default?
     * @return boolean True iff colapsing ocurred
     */
    public static function collapseShorthand(&$ruleset, $properties = null, $shorthand = null, $important = null, $tailIsDefaults = true)
    {
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

        $defaults = array_values($properties);
        $properties = array_keys($properties);

        // Extract single properties
        $values = array();
        $declarationEmpty = true;
        $insertDefaultIfPropertyMissing = !$tailIsDefaults;
        for ($i = count($properties) - 1; $i >= 0; $i--) {
            $property = $properties[$i];
            $value = $ruleset->getDeclaration($property, $important);
            if ($value) {
                $value = array_values(array_filter($value->getValues(), 'is_object'));
                $declarationEmpty = false;

                foreach ($value as $key => $singleValue) if ($insertDefaultIfPropertyMissing || $singleValue != $defaults[$i][$key]) {
                    $insertDefaultIfPropertyMissing = true;
                    break;
                }

                $values = array_merge($value, $values);
            } elseif ($insertDefaultIfPropertyMissing) {
                $values = array_merge($defaults[$i], $values);
            }
        }

        // If no property was present, no collapsing ocurred
        if (count($values) == 0 || $declarationEmpty) return false;
        // Remove single properties
        foreach ($properties as $property) $ruleset->removeDeclaration($property);
        // Add new declaration
        $ruleset->addDeclaration(Structures_CSS_Declaration::create($shorthand, Structures_CSS_Value::addRPNOperators($values, ''), $important));
        return true;
    }
    /* }}} */
    /* equals {{{ */
    /**
     * Equality tester
     *
     * @param Structures_CSS_Declaration righthand operand for equality test
     * @return boolean True iff this declaration equals the argument declaration
     */
    public function equals($right)
    {
        if ($right->getProperty() != $this->getProperty()) return false;

        if (count($right->getValues()) != count($this->getValues())) return false;

        foreach (array_keys($this->getValues()) as $i) {
            if (!$this->getValue($i)->equals($right->getValue($i))) return false;
        }

        return true;
    }
    /* }}} */
}
?>
