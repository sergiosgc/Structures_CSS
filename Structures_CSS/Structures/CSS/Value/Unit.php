<?php
/**
 * @package Structures_CSS
 */

/* vim: set expandtab tabstop=4 shiftwidth=4 foldmethod=marker: */
/** */
require_once('Structures/CSS/Value/Generic.php');
/** */
require_once('Structures/CSS/Exception.php');
/**
 * Representation of a CSS value with an associated unit (ems, exs, %, ...)
 * @package Structures_CSS
 */
class Structures_CSS_Value_Unit extends Structures_CSS_Value_Generic
{
    /* numericValue field {{{ */
    /** NumericValue represented as in the CSS spec */
    protected $_numericValue;
    public function getNumericValue() { 
        return $this->_numericValue;
    }
    public function setNumericValue($val) { 
        $this->_numericValue = $val;
        $this->setValue($this->_numericValue . $this->_unit);
    }
    /* }}} */
    /* unit field {{{ */
    /** Unit represented as in the CSS spec */
    protected $_unit;
    public function getUnit() { 
        return $this->_unit;
    }
    public function setUnit($val) { 
        $this->_unit = $val;
    }
    /* }}} */
    /* Constructor {{{ */
    /**
     * Create a new CSS numeric value
     *
     * @param string Value as specified in the CSS
     */
    public function __construct($value, $unit = null)
    {
        if (is_null($unit)) {
            $matches = array();
            if (!preg_match('/^([0-9]+(\.[0-9]+)?)(.*)$/', $value, $matches)) {
                throw new Structures_CSS_Exception(sprintf('Unable to match value %s with unit value regexp', $value));
            }
            $unit = $matches[3];
            $value = (double) $matches[1];
        }
        if (ceil($value) == $value) $value = (int) $value;
        $this->_numericValue = $value;
        $this->_unit = $unit;
        parent::__construct($value . $unit);
    }
    /* }}} */
}
?>
