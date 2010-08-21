<?php
/**
 * @package Structures_CSS
 */

/* vim: set expandtab tabstop=4 shiftwidth=4 foldmethod=marker: */
/** */
require_once('Structures/CSS/Exception.php');
/**
 * CSS value parent class as per CSS2rev1 4.3
 * @package Structures_CSS
 */
abstract class Structures_CSS_Value
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
    /* Create {{{ */
    /**
     * Factory method. Attempts to guess the correct class for the value and returns a new instance of it.
     *
     * @param string value
     * @return Structures_CSS_Value The new CSS value
     */
    public static function &create($value) 
    {
        require_once('Structures/CSS/Value/Color.php');
        if (Structures_CSS_Value_Color::identToRGB($value)) {
            $result = new Structures_CSS_Value_Color($value);
        } elseif (is_int($value)) {
            require_once('Structures/CSS/Value/Unit.php');
            $result = new Structures_CSS_Value_Unit($value);
        } else {
            require_once('Structures/CSS/Value/Generic.php');
            $result = new Structures_CSS_Value_Generic($value);
        }
        return $result;
    }
    /* }}} */
    /*     __construct {{{ */
    /**
     * Constructor
     *
     */
    public function __construct()
    {
    }
    /* }}} */
    /*     __toString {{{ */
    /**
     * Produce a string representation of the value, suitable for inclusion in a CSS text file
     *
     * @return string CSS value as a string
     */
    public function __toString()
    {
        throw new Structures_CSS_Exception('This method should be overriden by child class and was not');
    }
    /* }}} */
    /* equals {{{ */
    /**
     * Equality tester
     *
     * @param Structures_CSS_Value Test target
     * @return boolean True if values are equal
     */
    public function equals($value)
    {
        if (get_class($value) != get_class($this)) return false;
        return $this->__toString() == $value->__toString();
    }
    /* }}} */
    /* addRPNOperators {{{ */
    /**
     * Structures_CSS_Declaration receives value expressions as an RPN stack of values and operators. 
     * This helper method receives an array of Structures_CSS_Value and an operator, and produces an RPN stack
     * representing the values intercalated by the operators.
     *
     * @param array Structures_CSS_Value array of values
     * @param string Operator
     * @return array RPN stack suitable to be used in a Structures_CSS_Declaration
     */
    public static function addRPNOperators($values, $operator)
    {
        if (count($values) == 0) return array();
        foreach($values as $value) if (gettype($value) != 'object') throw new Exception('Operator passed as value to addRPNValues.');

        $values = array_values($values);
        $result = array($values[0]);
        for ($i=1; $i < count($values); $i++) {
            $result[] =& $values[$i];
            $result[] = $operator;
        }
        return $result;
    }
    /* }}} */
}
?>
