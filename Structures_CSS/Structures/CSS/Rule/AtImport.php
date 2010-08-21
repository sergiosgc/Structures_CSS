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
class Structures_CSS_Rule_AtImport implements Structures_CSS_Rule
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
    /* uri field {{{ */
    /** URI of the imported stylesheet
     */
    protected $_uri;
    /**
     * Uri Getter
     *
     * @return string URI current value
     */
    public function getUri()
    {
        return $this->_uri;
    }
    /**
     * Uri Setter
     *
     * @param string Uri new value
     */
    public function setUri($value)
    {
        $this->_uri = $value;
    }
    /* }}} */
    
    /* Constructor {{{ */
    /**
     * Create a new @import rule
     *
     * @param string Import uri
     * @param string Media this import applies to (optional)
     */
    public function __construct($uri, $media = null)
    {
        $this->setURI($uri);
        $this->setMedia($media);
    }
    /* }}} */
}
?>
