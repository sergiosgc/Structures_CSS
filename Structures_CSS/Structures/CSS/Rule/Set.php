<?php
/**
 * @package Structures_CSS
 */

/* vim: set expandtab tabstop=4 shiftwidth=4 foldmethod=marker: */
/** */
require_once('Structures/CSS/Rule.php');
/** */
require_once('Structures/CSS/Exception.php');
/**
 * CSS ruleset class as per CSS2rev1 4.1.7: A rule set (also called "rule") consists of a selector followed by a declaration block.
 * @package Structures_CSS
 */
class Structures_CSS_Rule_Set implements Structures_CSS_Rule, IteratorAggregate
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
    /* selector field {{{ */
    /** Ruleset selector
     */
    protected $_selector;
    /**
     * Selector Getter
     *
     * @return string ruleset selector
     */
    public function getSelector()
    {
        return $this->_selector;
    }
    /**
     * Selector Setter
     *
     * @param string ruleset selector
     */
    public function setSelector($value)
    {
        if (is_string($value)) {    
            require_once('Structures/CSS/Selector.php');
            $value = new Structures_CSS_Selector($value);
        }
        $value->setContainer($this);
        $this->_selector = $value;
    }
    /* }}} */
    /* declarations field {{{ */
    /** Array of declarations within this ruleset */
    protected $_declarations = array();
    /**
     * declarations Getter
     *
     * @return array Declarations current value
     */
    public function &getDeclarations()
    {
        return $this->_declarations;
    }
    /**
     * declarations Getter
     *
     * @param int|string Declaration index or property
     * @return object|false Declaration. False if not existent
     */
    public function &getDeclaration($i, $important = null)
    {
        if (is_string($i)) {
            $property = $i;
            $this->_declarations = array_values($this->_declarations);
            $i = count($this->_declarations) - 1;
            while ($i >= 0) {
                if ($this->_declarations[$i]->getProperty() != $property) { $i--; continue; };
                if (!is_null($important) && $important != $this->_declarations[$i]->getImportant()) { $i--; continue; };
                break;
            }
            if ($i < 0) {
                $foo = false;
                return $foo;
            }
        }

        return $this->_declarations[$i];
    }
    /**
     * removeDeclaration
     *
     * @param int|string Declaration index or property
     * @return boolean True if found and removed, false if not found
     */
    public function removeDeclaration($i)
    {
        if (is_string($i)) {
            $property = $i;
            $this->_declarations = array_values($this->_declarations);
            for ($i=count($this->_declarations) - 1; $i > 0 && $this->_declarations[$i]->getProperty() != $property; $i--) {
            }
            if ($i < 0 || $this->_declarations[$i]->getProperty() != $property) return false;
        }
        if (is_int($i) && ($i<0 || $i >= count($this->_declarations))) return false;
        unset($this->_declarations[$i]);
        $this->_declarations = array_values($this->_declarations);
    }
    /**
     * declarations Setter
     *
     * @param array Declarations new value
     */
    public function setDeclarations($value)
    {
        $this->_declarations = $value;
        foreach (array_keys($this->_declarations) as $key) $this->_declarations[$key]->setContainer($this);
    }
    /**
     * Add a new element to the declarations array
     *
     * @param Structures_CSS_Declaration New value
     */
    public function addDeclaration($value, $prepend = false)
    {
        $property = $value->getProperty();
        $keys = array_keys($this->_declarations);
        for ($i = count($keys) - 1; $i>=0; $i--) {
            if ($this->_declarations[$keys[$i]]->getProperty() == $property) {
                if (
                    ($prepend && ($value->isImportant() && !$this->_declarations[$keys[$i]]->isImportant())) ||
                    (!$prepend && ($value->isImportant() || !$this->_declarations[$keys[$i]]->isImportant()))
                   ) {
                    unset($this->_declarations[$keys[$i]]);
                } else { 
                    return; 
                }
            }
        }
        if ($prepend) {
            $this->_declarations = array_values(array_merge(array($value), $this->_declarations));
        } else {
            $this->_declarations[] = $value;
        }
        $value->setContainer($this);
    }
    /* }}} */

    /* GetDeclarationsAsString {{{ */
    /**
     * Convert the list of declarations to a string that can be inserted in a CSS.
     *
     * @return string Rules as CSS text
     */
    public function getDeclarationsAsString()
    {
        $result = '';
        $separator = "";
        foreach ($this->getDeclarations() as $declaration) {
            $result .= sprintf("%s %s", $separator, $declaration->__toString());
            $separator = ";\n";
        }
        return $result;
    }
    /* }}} */
    /* Constructor {{{ */
    /**
     * Constructor
     *
     */
    public function __construct($selector, $ruleset)
    {
        $this->setSelector($selector);
        $this->setDeclarations($ruleset);
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
        if (count($this->_declarations)==0) return '';
        return sprintf(<<<EOS
%s 
{
%s
}
EOS
        , $this->getSelector()->__toString(), $this->getDeclarationsAsString());
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
        require_once('Structures/CSS/Iterator/RulesetDeclarations.php');
        return new Structures_CSS_Iterator_RulesetDeclarations($this);
    }
    /* }}} */

    /* CombineWith {{{ */
    /**
     * Combines the target declaration's rules into this ruleset's declarations
     *
     * @param Structures_CSS_Rule_Set Target ruleset
     */
    public function combineWith($target) {
        $decs = $target->getDeclarations();
        foreach ($decs as $dec) {
            $this->addDeclaration($dec);
        }
    }
    /* }}} */
    /* removeRedundantDeclarations {{{ */
    /** 
     * Remove redundant declarations. 
     * 
     * A declaration is redundant whenever it is redefined in the same ruleset
     *
     */
    public function removeRedundantDeclarations()
    {
        require_once('Structures/CSS/Rule/Set.php');

        $keys = array_keys($this->_declarations);
        $toRemove = array();
        for ($i=count($keys) - 2; $i >= 0; $i--) {
            $found = false;
            for ($j = count($keys) - 1; $j > $i && !$found; $j--) {
                if ($this->_declarations[$keys[$i]]->getProperty() == $this->_declarations[$keys[$j]]->getProperty()) {
                    $toRemove[] = $i;
                    $found = true;
                }
            }
        }
        foreach ($toRemove as $i) unset($this->_declarations[$keys[$i]]);
        $this->_declarations = array_values($this->_declarations);
    }
    /* }}} */
    /* expandShorthand {{{ */
    /**
     * For shorthand properties, like border or font, replaces the Ruleset declarations with
     * non-shorthand equivalent properties
     *
     * Some shorthand properties resolve onto other shorthand properties. For example:
     *  border: 1px;
     * resolves into:
     *  border-width: 1px;
     * By default, this method performs a /deep/ replacement, so that:
     *  border: 1px;
     * resolves into:
     *  border-top-width: 1px;
     *  border-right-width: 1px;
     *  border-bottom-width: 1px;
     *  border-left-width: 1px;
     * If you wish a shallow replacement, pass false as the first paramenter
     *
     * @param boolean Perform a deep replacement? Defaults to true
     * @return boolean True if a replacement has ocurred, false otherwise
     */
    public function expandShorthand($deep = true)
    {
        require_once('Structures/CSS/Rule/Set.php');

        $result = false;
        foreach ($this->_declarations as $declaration) {
            $result = $declaration->expandShorthand($deep) || $result;
        }
        return $result;
    }
    /* }}} */
    /* collapseShorthand {{{ */
    /**
     * Collapse single properties in one shorthand property
     *
     * @return boolean True iff colapsing ocurred
     */
    public function collapseShorthand()
    {
        $result = false;
        foreach (array(
             'Background',
             'BorderColor',
             'BorderStyle',
             'BorderWidth',
             'Border',
             'BorderTop',
             'BorderRight',
             'BorderBottom',
             'BorderLeft',
             'Cue',
             'Font',
             'ListStyle',
             'Margin',
             'Outline',
             'Padding',
             'Pause') as $dec) {
            require_once(sprintf('Structures/CSS/Declaration/%s.php', $dec));
            $class = sprintf('Structures_CSS_Declaration_%s', $dec);
            $result = call_user_func(array($class, 'collapseShorthand'), $this) || $result;
        }
        return $result;
    }
    /* }}} */
    /* replaceDeclaration {{{ */
    /**
     * Replace one declaration with another declaration or with a set of declarations
     *
     * @param Structures_CSS_Declaration|int Old declaration or old declaration index
     * @param Structures_CSS_Declaration|array Replacement declaration or array of declarations
     */
    public function replaceDeclaration($old, $new)
    {
        if (!is_array($new)) $new = array($new);
        if (!is_int($old)) {
            $candidate = 0;
            $keys = array_keys($this->_declarations);

            for($candidate = 0; !is_int($old) && $candidate < count($keys); $candidate++) {
                if ($this->_declarations[$keys[$candidate]] === $old) $old = $candidate;
            }
            if (!is_int($old)) throw new Structures_CSS_DeclarationNotFoundException('Old declaration not found');
        }
        if ($old < 0 || $old >= count($this->_declarations)) throw new Structures_CSS_Exception('%s is not a valid declaration index', $old);

        $this->_declarations = array_values(
                                array_merge(
                                 array_slice($this->_declarations, 0, $old),
                                 $new,
                                 array_slice($this->_declarations, $old+1)
                                )
                               );
        foreach ($new as $declaration) $declaration->setContainer($this);
    }
    /* }}} */
    /* subtract {{{ */
    /**
     * Remove from this Ruleset all declarations that have identical values in the argument ruleset
     *
     * @param Structures_CSS_Rule_Set The base ruleset
     */
    public function subtract($ruleset)
    {
        foreach ($ruleset as $declaration) {
            for ($i = count($this->_declarations) - 1; $i >= 0; $i--) {
                if ($declaration->equals($this->_declarations[$i])) unset($this->_declarations[$i]);
            }
        }
        $this->_declarations = array_values($this->_declarations);
    }
    /* }}} */
    /* getValues {{{ */
    /**
     * Get a value from the ruleset, given property name
     *
     * @param string Property name
     * @return array Array of values from the property. Null if not found
     */
    public function getValues($property)
    {
        foreach(array_reverse(array_keys($this->getDeclarations())) as $i) 
        {
            if ($this->getDeclaration($i)->getProperty() == $property) return $this->getDeclaration($i)->getValues();
        }
        return null;
    }
    /* }}} */
}
?>
