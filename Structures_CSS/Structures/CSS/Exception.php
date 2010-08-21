<?php
/**
 * @package Structures_CSS
 */

/* vim: set expandtab tabstop=4 shiftwidth=4 foldmethod=marker: */
/**
 * Generic Structures_CSS_Exception
 * @package Structures_CSS
 */
class Structures_CSS_Exception extends Exception
{
}
/**
 * Thrown when replacing a non-existant declaration
 * @package Structures_CSS
 */
class Structures_CSS_DeclarationNotFoundException extends Structures_CSS_Exception
{
}
?>
