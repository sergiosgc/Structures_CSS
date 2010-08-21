<?php
/**
 * @package Structures_CSS
 */

/* vim: set expandtab tabstop=4 shiftwidth=4 foldmethod=marker: */
/** */
require_once('Structures/CSS/Value.php');
/** */
require_once('Structures/CSS/Exception.php');
/**
 * Generic CSS value representation. Ideally, should not be used, as 
 * specific value classes provide better handling of value types
 * @package Structures_CSS
 */
class Structures_CSS_Value_Color extends Structures_CSS_Value
{
    /* IdentToRGB {{{ */
    /**
     * Convert and ident to the equivalent RGB. Idents that correspond to 
     * RGB colors are: aqua, black, blue, fuchsia, gray, green, lime, maroon, navy, olive, purple, red, silver, teal, white, and yellow
     * defined in HTML 4.0
     *
     * @param string Ident as produced by the CSS parser
     * @return array|false Either the color RGB components or false if the ident is not a color
     */
    public static function identToRGB($ident) {
        $identMap = array(
            'aqua'    => array(0,255,255),
            'black'   => array(0,0,0),
            'blue'    => array(0,0,255),
            'fuchsia' => array(255,0,255),
            'gray'    => array(128,128,128),
            'green'   => array(0,128,0),
            'lime'    => array(0,255,0),
            'maroon'  => array(128,0,0),
            'navy'    => array(0,0,128),
            'olive'   => array(128,128,0),
            'purple'  => array(128,0,128),
            'red'     => array(255,0,0),
            'silver'  => array(192,192,192),
            'teal'    => array(0,128,128),
            'white'   => array(255,255,255),
            'yellow'  => array(255,255,0));
        return array_key_exists($ident, $identMap) ? $identMap[$ident] : false;    
    }
    /* }}} */
    /* color field {{{ */
    /** Array with the current color as RGB components
     */
    protected $_color;
    /**
     * color Getter
     *
     * @return array Associative array with RGB color components
     */
    public function getColor()
    {
        return $this->_color;
    }
    /**
     * color Setter
     *
     * @param array Associative array with RGB color components
     */
    protected function setColor($value)
    {
        $this->_color = $value;
    }
    /* }}} */
    /* Constructor {{{ */
    /**
     * Create a new CSS color value
     *
     * @param string Value as specified in the CSS
     */
    public function __construct($value, $green = null, $blue = null)
    {
        if (!is_null($green)) { // Color is given as separate components
            $value = (int) $value;
            $green = (int) $green;
            $blue = (int) $blue;
        } else {
            if (preg_match('/^#([0-9,A-F,a-f]){3}$/', $value)) {
                $value = preg_replace('/^#([0-9,A-F,a-f])([0-9,A-F,a-f])([0-9,A-F,a-f])$/', '#\1\1\2\2\3\3', $value);
            }
            if (preg_match('/^#([0-9,A-F,a-f]){6}$/', $value)) {
                $value = eval(sprintf('return 0x%s;', strtr($value, array('#' => ''))));
            }
            if (is_int($value)) {
                $blue = $value & 0xFF;
                $green = ($value & 0xFF00) >> 8;
                $value = ($value & 0xFF0000) >> 16;
            } elseif (self::identToRGB($value)) {
                $value = self::identToRGB($value);
                $blue = $value[2];
                $green = $value[1];
                $value = $value[0];
            } else {
                throw new Structures_CSS_Exception('Color value is not in a format I can understand: ' . $value);
            }
        }
        $this->setColor(array('r' => $value, 'g' => $green, 'b' => $blue));
    }
    /* }}} */
    /* __toString {{{ */
    public function __toString()
    {
        return sprintf('rgb(%d, %d, %d)', $this->_color['r'], $this->_color['g'], $this->_color['b']);
    }
    /* }}} */
}
?>
