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
 * Representation of a CSS URI value
 * @package Structures_CSS
 */
class Structures_CSS_Value_URI extends Structures_CSS_Value
{
    /* uri field {{{ */
    /** URI address */
    protected $_uri;
    /**
     * Uri Getter
     *
     * @return string Uri value
     */
    public function getUri()
    {
        return $this->_uri;
    }
    /**
     * Uri Setter
     *
     * @param string New Uri value
     */
    public function setUri($value)
    {
        $this->_uri = $value;
    }
    /* }}} */
    
    /* Constructor {{{ */
    /**
     * Create a new URI value
     *
     * @param string Address of the uri
     */
    public function __construct($uri)
    {
        $this->setUri($uri);
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
        return sprintf('url("%s")', strtr($this->getUri(), array('\\' => '\\\\', '"' => '\\"')));
    }
    /* }}} */
    /* GetAbsoluteUri {{{ */
    /**
     * Convert the URI from relative to absolute, if needed, and return the full uri text
     *
     * To convert from relative to absolute, this method needs the URI to be already part of a CSS, and 
     * needs the CSS to have its baseurl field set.
     *
     * @return string Absolute uri
     */
    public function getAbsoluteUri()
    {
        if (preg_match('/^[a-zA-Z]+:\/\//', $this->getUri())) return $this->getUri();
        $base = $this->getCSS()->getBaseURI();
        $relative = $this->getUri();
        if (is_null($base)) throw new Structures_CSS_Exception('CSS has no base uri, cannot convert relative uri to absolute');
        if ($relative[0] == '/') {
            $base = preg_replace('_^([a-zA-Z]+://[^/]+)/.*_', '\1', $base);
        } else {
            $base = preg_replace('_(.*\/)[^/]*_', '\1', $base);
        }
        return $base . $relative;
         
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
        return $this->getUri() == $value->getUri();
    }
    /* }}} */
}
?>
