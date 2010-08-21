<?php
/**
 * @package Structures_CSS
 */

/* vim: set expandtab tabstop=4 shiftwidth=4 foldmethod=marker: */
/** */
require_once('Structures/CSS/Rule.php');
/**
 * CSS ruleset class as per CSS2rev1 4.1.7: A rule set (also called "rule") consists of a selector followed by a declaration block.
 * @package Structures_CSS
 */
class Structures_CSS_Rule_AtMedia implements Structures_CSS_Rule,IteratorAggregate
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
    /* media field {{{ */
    /** Media definition for this @media rule
     */
    protected $_media;
    /**
     * Media Getter
     *
     * @return string Media current value
     */
    protected function getMedia()
    {
        return $this->_media;
    }
    /**
     * Media Setter
     *
     * @param string Media new value
     */
    protected function setMedia($value)
    {
        $this->_media = $value;
    }
    /* }}} */
    /* rules field {{{ */
    /** Array of CSS rules inside this @media rule
     */
    protected $_rules = array();
    /**
     * Rules Getter
     *
     * @return array Rules current value
     */
    protected function getRules()
    {
        return $this->_rules;
    }
    /**
     * Rules Setter
     *
     * @param array Rules new value
     */
    protected function setRules($value)
    {
        $this->_rules = $value;
        foreach (array_keys($this->_rules) as $key) $this->_rules[$key]->setContainer($this);
    }
    /**
     * Add a new element to the Rules array.
     *
     * @param Structures_CSS_Rule New value
     */
    protected function addRules(&$value)
    {
        $this->_rules[] = $valueOrKey;
        $value->setContainer($this);
    }
    /* }}} */
    
    /* Constructor {{{ */
    /**
     * Create a new @media rule
     *
     * @param string Media type
     * @param array CSS Rules inside this @media
     */
    public function __construct($media, $rules)
    {
        $this->setMedia($media);
        $this->setRules($rules);
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
        require_once('Structures/CSS/Iterator/AtMediaRules.php');
        return new Structures_CSS_Iterator_AtMediaRules($this);
    }
    /* }}} */
}
?>
