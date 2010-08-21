<?php
/**
 * @package Structures_CSS
 */

/* vim: set expandtab tabstop=4 shiftwidth=4 foldmethod=marker: */
/** */
require_once('Structures/CSS/Exception.php');
/**
 * Helper iterator, used by delegation by the other iterators in Structures_CSS
 * @package Structures_CSS
 */
class Structures_CSS_Iterator_Array implements Iterator
{
    protected $array;
    protected $arrayKeys;
    protected $index;
    /* __construct {{{ */
    /**
     * Constructor
     *
     */
    public function __construct($array)
    {
        $this->array = $array;
        $this->arrayKeys = array_keys($array);
        $this->rewind();
    }
    /* }}} */
    /* Current {{{ */
    public function current()
    {
        if (!$this->valid()) throw new Structures_CSS_Exception('Current called with invalid current value');
        return $this->array[$this->key()];
    }
    /* }}} */
    /* Key {{{ */
    public function key()
    {
        if (!$this->valid()) throw new Structures_CSS_Exception('Current called with invalid current value');
        return $this->arrayKeys[$this->index];
    }
    /* }}} */
    /* Next {{{ */
    public function next()
    {
        $this->index++;
    }
    /* }}} */
    /* Rewind {{{ */
    public function rewind()
    {
        $this->index = 0;
    }
    /* }}} */
    /* Valid {{{ */
    public function valid()
    {
        return $this->index >= 0 && $this->index < count($this->arrayKeys);
    }
    /* }}} */
}
?>
