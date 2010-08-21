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
class Structures_CSS_Iterator_Recursive implements RecursiveIterator,OuterIterator
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
    public function __construct(&$target)
    {
        if ($target instanceof IteratorAggregate) {
            $this->setInternalIterator($target->getIterator());
        } elseif ($target instanceof Iterator) {
            $this->setInternalIterator($target);
        } else {
            $this->setInternalIterator(new EmptyIterator());
        }
    }
    /* }}} */
    // Iterator Interface
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
    // RecursiveIterator Interface
    /* GetChildren {{{ */
    /**
     * Returns the sub iterator for the current element
     *
     * @return RecursiveIterator the sub iterator for the current element
     */
    public function getChildren()
    {
        return new Structures_CSS_Iterator_Recursive($this->current());
    }
    /* }}} */
    /* HasChildren {{{ */
    /**
     * Returns true iff there is a sub iterator for the current element
     *
     * @return boolean  true iff there is a sub iterator for the current element
     */
    public function hasChildren()
    {
        require_once('Structures/CSS.php');
        require_once('Structures/CSS/Declaration.php');
        require_once('Structures/CSS/Rule/Set.php');
        $cur = $this->current();
        return ($cur instanceof Structures_CSS) || 
               ($cur instanceof Structures_CSS_Declaration) ||
               ($cur instanceof Structures_CSS_Rule_Set);
    }
    /* }}} */
    // OuterIterator Interface
    /* GetInnerIterator {{{ */
    /**
     * The inner iterator
     *
     * @return Iterator Inner iterator
     */
    public function getInnerIterator()
    {
        return $this->getInternalIterator();
    }
    /* }}} */
}
?>
