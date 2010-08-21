<?php
/**
 * @package Structures_CSS
 */

/* vim: set expandtab tabstop=4 shiftwidth=4 foldmethod=marker: */
/** */
require_once('Structures/CSS/Exception.php');
/**
 * Iterator that, given a CSS, iterates through all Values of the CSS
 * @package Structures_CSS
 */
class Structures_CSS_Iterator_CSSValues implements Iterator
{
    /* css field {{{ */
    /** Target CSS for the iteration */
    protected $_css;
    /**
     * Css Getter
     *
     * @return Structures_CSS The CSS
     */
    public function getCss()
    {
        return $this->_css;
    }
    /**
     * Css Setter
     *
     * @param Structures_CSS The CSS
     */
    public function setCss($value)
    {
        $this->_css = $value;
    }
    /* }}} */
    /*     __construct {{{ */
    /**
     * Constructor
     *
     */
    public function __construct($css)
    {
        $this->a = true;
        $this->setCSS($css);
    }
    /* }}} */
    /* Current {{{ */
    public function current()
    {
        return $this->_css->getRule(0)->getDeclaration(0)->getValue(0);
    }
    /* }}} */
    /* Key {{{ */
    public function key()
    {
        throw new Structures_CSS_Exception('This iterator does not implement Iterator::key');
    }
    /* }}} */
    /* Next {{{ */
    public function next()
    {
        if ($this->a) {
            $this->a = false;
            return $this->_css->getRule(0)->getDeclaration(0)->getValue(0);
        }
        return false;
    }
    /* }}} */
    /* Rewind {{{ */
    public function rewind()
    {
    }
    /* }}} */
    /* Valid {{{ */
    public function valid()
    {
        return $this->a;
    }
    /* }}} */
}
?>
