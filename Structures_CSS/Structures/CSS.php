<?php
/**
 * @package Structures_CSS
 */

/* vim: set expandtab tabstop=4 shiftwidth=4 foldmethod=marker: */
/**
 * A representation of a Cascading Style Sheet
 * @package Structures_CSS
 */
class Structures_CSS implements IteratorAggregate
{
    /* combineRules field {{{ */
    /** 
     *  Flag that affects transformation to string. If true, consecutive rulesets differring in selector only, are combined 
     *  into one rule with , operatores between the selectors
     */
    protected $_combineRules = true;
    /**
     * CombineRules Getter
     *
     * @return boolean True if identical rules should be combined
     */
    public function getCombineRules()
    {
        return $this->_combineRules;
    }
    /**
     * CombineRules Setter
     *
     * @param boolean New combinerules value
     */
    public function setCombineRules($value)
    {
        $this->_combineRules = $value;
    }
    /* }}} */
    /* rules field {{{ */
    /** List of Structure_CSS_Rule instances that define this CSS */
    protected $_rules = array();
    /**
     * Rules Getter
     *
     * @return array Rules current value
     */
    public function &getRules()
    {
        return $this->_rules;
    }
    public function &getRule($i)
    {
        return $this->_rules[$i];
    }
    /**
     * Rules Setter
     *
     * @param array Rules new value
     */
    public function setRules($value)
    {
        $this->_rules = $value;
        foreach (array_keys($this->_rules) as $key) $this->_rules[$key]->setContainer($this);
    }
    /**
     * Add a new element to the Rules array.
     *
     * @param mixed New value
     */
    public function addRule(&$value)
    {
        $this->_rules[] =& $value;
        $value->setContainer($this);
    }
    /**
     * Add new elements to the Rules array.
     *
     * @param mixed New value
     */
    public function addRulesFromArray(&$values)
    {
        foreach (array_keys($values) as $key) $this->addRule($values[$key]);
    }
    /* }}} */
    /* charset field {{{ */
    /** Character set of this CSS, if defined by @charset */
    protected $_charset;
    /**
     * Charset Getter
     *
     * @return string Character set encoding
     */
    public function getCharset()
    {
        return $this->_charset;
    }
    /**
     * Charset Setter
     *
     * @param string Character set encoding
     */
    public function setCharset($value)
    {
        $this->_charset = $value;
    }
    /* }}} */
    /* baseuri field {{{ */
    /** Base URI for the CSS, used when converting URIs from relative to absolute */
    protected $_baseuri;
    /**
     * Baseuri Getter
     *
     * @return string Base URI
     */
    public function getBaseuri()
    {
        return $this->_baseuri;
    }
    /**
     * Baseuri Setter
     *
     * @param string New base URI
     */
    public function setBaseuri($value)
    {
        $this->_baseuri = $value;
    }
    /* }}} */

/*     __construct {{{ */
    /**
     * Constructor
     *
     */
    public function __construct(&$rules = null, $charset = null)
    {
        if (!is_null($rules)) {
            $this->setRules($rules);
        }
        $this->setCharset($charset);
    }
    /* }}} */
    /* __toString {{{ */
    /**
     * Generate text representation
     *
     * @return string CSS text
     */
    public function __toString()
    {
        require_once('Structures/CSS/Rule/Set.php');

        $result = '';
        if (!is_null($this->getCharset())) $result .= sprintf("@charset %s\n", $this->getCharset());
        $keys = array_keys($this->_rules);
        $i = 0;
        $selector = '';
        while ($i < count($keys)) {
            $key =& $keys[$i];
            if ($this->_rules[$key] instanceof Structures_CSS_Rule_Set && $this->_combineRules) {
                if ($selector == '') {
                    $selector = $this->_rules[$key]->getSelector()->__toString();
                    $declarations = $this->_rules[$key]->getDeclarationsAsString();
                    $i++;
                } else {
                    if ($declarations == $this->_rules[$key]->getDeclarationsAsString()) {
                        $selector .= sprintf(",\n%s", $this->_rules[$key]->getSelector()->__toString());
                        $i++;
                    } else {
                        $result .= sprintf("%s\n{\n%s\n}\n", $selector, $declarations);
                        $selector = $declarations = '';
                    }
                }
            } else {
                $result .= $this->_rules[$key]->__toString() . "\n";
                $i++;
            }
        }
        if ($selector != '' && $declarations != '') {
            $result .= sprintf("%s\n{\n%s\n}\n", $selector, $declarations);
            $selector = $declarations = '';
        }
        return $result;
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
        require_once('Structures/CSS/Iterator/CSSRules.php');
        return new Structures_CSS_Iterator_CSSRules($this);
    }
    /* }}} */

    /* _mergeConsecutiveRulesets {{{ */
    /**
     * Search consecutive rulesets with the same selector, and merge them
     */
    public function _mergeConsecutiveRulesets()
    {
        $keys = array_keys($this->_rules);
        $i = 0;
        $selector = '';
        while ($i+1 < count($keys)) {
            if ($this->_rules[$keys[$i]] instanceof Structures_CSS_Rule_Set &&
                $this->_rules[$keys[$i + 1]] instanceof Structures_CSS_Rule_Set &&
                $this->_rules[$keys[$i]]->getSelector()->__toString() == $this->_rules[$keys[$i + 1]]->getSelector()->__toString()) {

                $this->_rules[$keys[$i]]->combineWith($this->_rules[$keys[$i + 1]]);
                unset($this->_rules[$keys[$i + 1]]);
                $keys = array_keys($this->_rules);
            } else {
                $i++;
            }
        }
    }
    /* }}} */
    /* _mergeNonconsecutiveRulesets {{{ */
    /**
     * Search for rulesets with the same selector, and merge them
     */
    public function _mergeNonconsecutiveRulesets()
    {
        $keys = array_keys($this->_rules);
        $i = 0;
        while ($i < count($keys)) {
            if (!$this->_rules[$keys[$i]] instanceof Structures_CSS_Rule_Set) {
                $i++;
                continue;
            }
            $j = $i + 1;
            while ($j < count($keys)) {
                if (!$this->_rules[$keys[$j]] instanceof Structures_CSS_Rule_Set) {
                    $j++;
                    continue;
                }
                if ($this->_rules[$keys[$i]]->getSelector()->__toString() == $this->_rules[$keys[$j]]->getSelector()->__toString()) {
                    $this->_rules[$keys[$i]]->combineWith($this->_rules[$keys[$j]]);
                    unset($this->_rules[$keys[$j]]);
                    $keys = array_keys($this->_rules);
                    $j--;
                }
                $j++; 
            }
            $i++;
        }
        $this->_rules = array_values($this->_rules);
    }
    /* }}} */
    /* mergeRulesets {{{ */
    /**
     * Search rulesets with the same selector, and merge them
     * 
     * @param boolean True iff only consecutive rulesets should be merged. Note that if this parameter is false, the operation may functionally change the CSS
     */
    public function mergeRulesets($consecutive = true)
    {
        return $consecutive ? $this->_mergeConsecutiveRulesets() : $this->_mergeNonconsecutiveRulesets();
    }
    /* }}} */
    /* sortBySpecificity {{{ */
    /**
     * Sort rulesets by specificity
     */
    public function sortBySpecificity()
    {
        require_once('Structures/CSS/Rule/Set.php');

        for ($i=0; $i<count($this->_rules); $i++) { // Yep, it's a mere bubblesort. Write a quicksort here if you feel lucky
            if ($this->_rules[$i] instanceof Structures_CSS_Rule_Set) {
                for ($j=$i+1; $j<count($this->_rules); $j++) {
                    if ($this->_rules[$j] instanceof Structures_CSS_Rule_Set &&
                        $this->_rules[$i]->getSelector()->getSpecificity() > $this->_rules[$j]->getSelector()->getSpecificity() ||
                        ($this->_rules[$i]->getSelector()->getSpecificity() == $this->_rules[$j]->getSelector()->getSpecificity() &&
                         $this->_rules[$i]->getSelector()->__toString() > $this->_rules[$j]->getSelector()->__toString())
                    ) {
                        $a = $this->_rules[$j];
                        $this->_rules[$j] = $this->_rules[$i];
                        $this->_rules[$i] = $a;
                    }
                }
            }
        }
        
    }
    /* }}} */
    /* expandShorthand {{{ */
    /**
     * For shorthand properties, like border or font, replaces the CSS declarations with
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
        foreach ($this->_rules as $rule) {
            if ($rule instanceof Structures_CSS_Rule_Set) {
                $result = $rule->expandShorthand($deep) || $result;
            }
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
        require_once('Structures/CSS/Rule/Set.php');

        $result = false;
        foreach ($this->_rules as $rule) {
            if ($rule instanceof Structures_CSS_Rule_Set) {
                $result = $rule->collapseShorthand() || $result;
            }
        }
        return $result;
    }
    /* }}} */
    /* collapseBoxModelValues {{{ */
    /**
     * Collapse box model values in as few values as possible
     */
    public function collapseBoxModelValues()
    {
        require_once('Structures/CSS/Declaration/BoxModel.php');

        $result = false;
        foreach ($this->_rules as $rule) {
            foreach ($rule as $declaration) {
                if ($declaration instanceof Structures_CSS_Declaration_BoxModel) $declaration->collapseBoxModelValues();
            }
        }
        return $result;
    }
    /* }}} */
    /* removeRedundantDeclarations {{{ */
    /** 
     * Remove redundant declarations on every ruleset.
     * 
     * A declaration is redundant whenever it is redefined in the same ruleset
     *
     */
    public function removeRedundantDeclarations()
    {
        require_once('Structures/CSS/Rule/Set.php');

        foreach ($this->_rules as $rule) {
            if ($rule instanceof Structures_CSS_Rule_Set) {
                $rule->removeRedundantDeclarations();
            }
        }
    }
    /* }}} */
    /* expandBoxModelValues {{{ */
    /**
     * Collapse box model values in as few values as possible
     */
    public function expandBoxModelValues()
    {
        require_once('Structures/CSS/Declaration/BoxModel.php');

        $result = false;
        foreach ($this->_rules as $rule) {
            foreach ($rule as $declaration) {
                if ($declaration instanceof Structures_CSS_Declaration_BoxModel) $declaration->expandBoxModelValues();
            }
        }
        return $result;
    }
    /* }}} */
    
    /* normalize {{{ */
    /**
     * Rearrange the CSS to a standard layout.
     * 
     * The resulting CSS will be: 
     *  - Sorted by specificity
     *  - Using shorthand notation whenever possible
     *  - Without duplicate property definitions
     */
    public function normalize()
    {
        $this->expandShorthand();
        $this->expandBoxModelValues();
        $this->sortBySpecificity();
        $this->_mergeNonconsecutiveRulesets();
        $this->removeRedundantDeclarations();
        $this->collapseShorthand();
        $this->collapseBoxModelValues();
    }
    /* }}} */

    /* getRulesetBySelector {{{ */
    /**
     * Get a ruleset given its selector
     *
     * @param string selector
     * @return string|null The ruleset if it exists, null otherwise
     */
    public function getRulesetBySelector($selector)
    {
        require_once('Structures/CSS/Rule/Set.php');

        if (is_object($selector)) $selector = $selector->__toString();
        $result = null;
        foreach ($this->_rules as $rule) {
            if ($rule instanceof Structures_CSS_Rule_Set && $rule->getSelector()->__toString() == $selector) $result = $rule;
        }
        return $result;
    }
    /* }}} */
    /* subtract {{{ */
    /**
     * Remove from this CSS all declarations and rulesets that have identical values in the argument CSS
     *
     * This method gurantees that this CSS describes only the additions to the argument CSS, and does not
     * repeat any information already defined in the argument CSS.
     *
     * Please note that this method changes the argument CSS. Functionally, the CSS will remain the same,
     * but the rulesets will become ordered by specificity and will be merged wherever possible. Shorthand 
     * notation will be collapsed before returning.
     *
     * @param Structures_CSS The base CSS
     */
    public function subtract($css)
    {
        require_once('Structures/CSS/Rule/Set.php');
        $this->expandShorthand();
        $this->sortBySpecificity();
        $this->_mergeNonconsecutiveRulesets();
        $css->expandShorthand();
        $css->sortBySpecificity();
        $css->_mergeNonconsecutiveRulesets();

        $waterline = 0;
        foreach ($css->getRules() as $baseRule) {
            if (!$baseRule instanceof Structures_CSS_Rule_Set) continue;

            $baseRuleSelector = $baseRule->getSelector()->__toString();
            for ($i = $waterline; $i < count($this->_rules); $i++) {
                if (! $this->_rules[$i] instanceof Structures_CSS_Rule_Set) {
                    $waterline++;
                    continue;
                }
                if ( $this->_rules[$i]->getSelector()->getSpecificity() < $baseRule->getSelector()->getSpecificity() ||
                     $this->_rules[$i]->getSelector()->__toString() < $baseRule->getSelector()->__toString()) {
                    $waterline++;
                    continue;
                }
                if ($this->_rules[$i]->getSelector()->__toString() == $baseRule->getSelector()->__toString()) $this->_rules[$i]->subtract($baseRule);
            }
        }
        $this->collapseShorthand();
        $css->collapseShorthand();
    }
    /* }}} */
    /* getValues {{{ */
    /**
     * Get a value from the CSS, given the ruleset selector and property name
     *
     * @param string Selector
     * @param string Property name
     * @return array Array of values from the property. Null if not found
     */
    public function getValues($selector, $property)
    {
        foreach(array_reverse(array_keys($this->getRules())) as $i) 
        {
            if ($this->getRule($i)->getSelector()->__toString() == $selector) {
                $candidate = $this->getRule($i)->getValues($property);
                if (!is_null($candidate)) return $candidate;
            }
        }
        return null;
    }
    /* }}} */
    /* getValue {{{ */
    /**
     * Get a value from a property that has only one value
     *
     * @param string Selector
     * @param string Property name
     * @return Structures_CSS_Value The value, null if not found
     */
    public function getValue($selector, $property, $default = null)
    {
        $result = $this->getValues($selector, $property);
        return is_null($result) ? $default : $result[0];
    }
    /* }}} */
}
?>
