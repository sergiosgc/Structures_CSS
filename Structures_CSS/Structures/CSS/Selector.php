<?php
/**
 * @package Structures_CSS
 */

/* vim: set expandtab tabstop=4 shiftwidth=4 foldmethod=marker: */
/**
 * CSS Selector class as per CSS2rev1 4.3
 * @package Structures_CSS
 */
class Structures_CSS_Selector
{
    const A=1000000; // 1024x1024
    const B=1000;
    const C=1;
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
    /* selector field {{{ */
    /** Selector text definition */
    protected $_selector = '';
    /**
     * Selector Getter
     *
     * @return string Selector as text
     */
    public function getSelector()
    {
        return $this->_selector;
    }
    /**
     * Selector Setter
     *
     * @param string Selector text
     */
    public function setSelector($value)
    {
        $this->_selector = $value;
    }
    /* }}} */
    /* specificity field {{{ */
    /** Specificity as per CSS spec */
    protected $_specificity = 0;
    /**
     * Specificity Getter
     *
     * @return int Current specificity
     */
    public function getSpecificity()
    {
        return $this->_specificity;
    }
    /**
     * Specificity Setter
     *
     * @param int Current specificity
     */
    public function setSpecificity($value)
    {
        $this->_specificity = $value;
    }
    /* }}} */
   
    /* AppendSelector {{{ */
    /**
     * Append given selector to this one
     *
     * @param Structures_CSS_Selector
     * @param string Combinator
     */
    public function appendSelector($selector, $combinator)
    {
        $this->_specificity += $selector->getSpecificity();
        $this->_selector .= $combinator . $selector->getSelector();
    }
    /* }}} */
    /*     __construct {{{ */
    /**
     * Constructor
     *
     */
    public function __construct($selector, $specificity = null)
    {
        // @TODO Automatically calculate specificity if it is null
        $this->_selector = $selector;
        $this->_specificity = $specificity;
    }
    /* }}} */
    /* __toString {{{ */
    /**
     * Convert to string
     *
     * @return string String representation of selector
     */
    public function __toString()
    {
        return $this->getSelector();
    }
    /* }}} */
}
?>
