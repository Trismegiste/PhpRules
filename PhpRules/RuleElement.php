<?php

namespace PhpRules;

/**
 * Represents an element of a Rule or RuleContext.
 * @package Phprules
 */
abstract class RuleElement
{

    /**
     * The name of the RuleElement.
     * @access public
     * @var string
     */
    public $name;

    /**
     * Constructor initializes {@link $name}.
     * @access public
     */
    public function RuleElement($name)
    {
        $this->name = $name;
    }

    /**
     * Constructor initializes {@link $name}.
     * @access public
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * Returns the type of RuleElement.
     * @access public
     * @return string
     */
    public function getType()
    {

    }

    /**
     * Returns the name of the RuleElement.
     * @access public
     * @return string
     */
    public function toString()
    {
        return $this->name;
    }

}