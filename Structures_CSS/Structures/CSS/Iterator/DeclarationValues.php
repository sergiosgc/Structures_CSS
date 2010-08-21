<?php
/**
 * @package Structures_CSS
 */

/* vim: set expandtab tabstop=4 shiftwidth=4 foldmethod=marker: */
/** */
require_once('Structures/CSS/Iterator/Array.php');
/**
 * Iterator that, given a CSS, iterates through all rules of the CSS
 * @package Structures_CSS
 */
class Structures_CSS_Iterator_DeclarationValues implements Iterator
{
    /* internalIterator field {{{ */
    /** Structures_CSS_Iterator_Array for the elements we iterate from */
    protected $_internalIterator;
    /**
     * InternalIterator Getter
     *
     * @return Structures_CSS_Iterator_Array The internal iterator
     */
    protected function getInternalIterator()
    {
        return $this->_internalIterator;
    }
    /**
     * InternalIterator Setter
     *
     * @param Structures_CSS_Iterator_Array New internal iterator
     */
    protected function setInternalIterator(&$value)
    {
        $this->_internalIterator =& $value;
    }
    /* }}} */

    /* Constructor {{{ */
    /**
     * Constructor
     *
     */
    public function __construct($declaration)
    {
        $this->setInternalIterator(new Structures_CSS_Iterator_Array($declaration->getValues()));
    }
    /* }}} */
    /* Current {{{ */
    public function current()
    {
        return $this->_internalIterator->current();
    }
    /* }}} */
    /* Key {{{ */
    public function key()
    {
        return $this->_internalIterator->key();
    }
    /* }}} */
    /* Next {{{ */
    public function next()
    {
        return $this->_internalIterator->next();
    }
    /* }}} */
    /* Rewind {{{ */
    public function rewind()
    {
        return $this->_internalIterator->rewind();
    }
    /* }}} */
    /* Valid {{{ */
    public function valid()
    {
        return $this->_internalIterator->valid();
    }
    /* }}} */
}
?>
