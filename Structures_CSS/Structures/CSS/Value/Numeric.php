<?php
/**
 * @package Structures_CSS
 */

/* vim: set expandtab tabstop=4 shiftwidth=4 foldmethod=marker: */
/** */
require_once('Structures/CSS/Value/Generic.php');
/**
 * Generic CSS value representation. Ideally, should not be used, as 
 * specific value classes provide better handling of value types
 * @package Structures_CSS
 */
class Structures_CSS_Value_Numeric extends Structures_CSS_Value_Generic
{
    /* Constructor {{{ */
    /**
     * Create a new CSS numeric value
     *
     * @param string Value as specified in the CSS
     */
    public function __construct($value)
    {
        if (ceil($value) == $value) $value = (int) $value;
        parent::__construct($value);
    }
    /* }}} */
    /*     getNumericValue {{{ */
    /**
     * alias for getValue
     *
     * @return int|double Current value
     */
    public function getNumericValue()
    {
        return $this->getValue();
    }
    /* }}} */
    /*     setNumericValue {{{ */
    /**
     * alias for setValue
     *
     * @param int|double New value
     */
    public function setNumericValue($val)
    {
        $this->setValue($val);
    }
    /* }}} */
}
?>
