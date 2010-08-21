<?php
/**
 * @package Structures_CSS
 */

/* vim: set expandtab tabstop=4 shiftwidth=4 foldmethod=marker: */
/** */
require_once('Structures/CSS/Value.php');
/**
 * Generic CSS value representation. Ideally, should not be used, as 
 * specific value classes provide better handling of value types
 * @package Structures_CSS
 */
class Structures_CSS_Value_Generic extends Structures_CSS_Value
{
    /* value field {{{ */
    /** Value represented as in the CSS spec */
    protected $_value;
    public function getValue() { 
        return $this->_value;
    }
    public function setValue($val) { 
        $this->_value = $val;
    }
    /* }}} */
    /* Constructor {{{ */
    /**
     * Create a new CSS generic value
     *
     * @param string Value as specified in the CSS
     */
    public function __construct($value)
    {
        $this->_value = $value;
        parent::__construct();
    }
    /* }}} */
    /* __toString {{{ */
    public function __toString()
    {
        return (string) $this->_value;
    }
    /* }}} */
}
?>
