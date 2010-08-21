<?php
/**
 * @package Structures_CSS
 */

/* vim: set expandtab tabstop=4 shiftwidth=4 foldmethod=marker: */
/** */
require_once('Structures/CSS/Value/Generic.php');
/**
 * Representation of a CSS function call
 * @package Structures_CSS
 */
class Structures_CSS_Value_Function extends Structures_CSS_Value
{
    /* name field {{{ */
    /** Name represented as in the CSS spec */
    protected $_name;
    public function getName() { 
        return $this->_name;
    }
    public function setName($val) { 
        $this->_name = $val;
    }
    /* }}} */
    /* arguments field {{{ */
    /** Arguments represented as in the CSS spec */
    protected $_arguments;
    public function getArguments() { 
        return $this->_arguments;
    }
    public function setArguments($val) { 
        $this->_arguments = $val;
    }
    /* }}} */
    /* Constructor {{{ */
    /**
     * Create a new CSS Function
     *
     * Receives either one parameter, a datastructure from the parser, or two params: a name and an array of arguments
     *
     * @param string|array Either the definition of the function from the parser, or the function name as a string
     * @param array (optional) If the first parameter is a string, this one should be an array of arguments
     */
    public function __construct($func, $args = null)
    {
        if (is_null($args)) {
            $args = array();
            foreach ($func['args'] as $arg) {
                if ($arg instanceof Structures_CSS_Value) $args[] = $arg;
            }
            $func = $func['name'];
        }
        $this->setName($func);
        $this->setArguments($args);
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
        $result = $this->name;
        $result .= '(';
        foreach ($this->getArguments() as $arg) {
            $result .= $arg->__toString();
        }
        $result .= ')';
        return $result;
        
    }
    /* }}} */
}
?>
