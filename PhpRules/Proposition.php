<?php

namespace PhpRules;

/**
 * Represents a Proposition in formal logic, a statement with at truth value.
 * @package Phprules
 */
class Proposition extends RuleElement
{

    /**
     * The Boolean truth value of the Proposition.
     * @access public
     * @var boolean
     */
    public $value;

    /**
     * Constructor initializes {@link $name}, and the {@link $value}.
     * @access public
     */
    function Proposition($name, $truthValue)
    {
        $this->value = $truthValue;
        parent::RuleElement($name);
    }

    /**
     * Constructor initializes {@link $name}, and the {@link $value}.
     * @access public
     */
    function __construct($name, $truthValue)
    {
        $this->value = $truthValue;
        parent::RuleElement($name);
    }

    /**
     * Returns &quot;Proposition.&quot;
     * @access public
     * @return string
     */
    function getType()
    {
        return "Proposition";
    }

    /**
     * Returns a human-readable statement and value.
     * @access public
     * @return string
     */
    function toString()
    {
        $truthValue = "FALSE";
        if ($this->value == true) {
            $truthValue = "TRUE";
        }
        return "Proposition statement = " . $this->name . ", value = " . $truthValue;
    }

    /**
     * Performs a Boolean AND operation on another {@link Proposition}
     * @access public
     * @param Proposition $proposition
     * @return Proposition
     */
    function logicalAnd($proposition)
    {
        $resultName = "( " . $this->name . " AND " . $proposition->name . " )";
        $resultValue = ( $this->value and $proposition->value );
        return new Proposition($resultName, $resultValue);
    }

    /**
     * Performs a Boolean OR operation on another {@link Proposition}
     * @access public
     * @param Proposition $proposition
     * @return Proposition
     */
    function logicalOr($proposition)
    {
        $resultName = "( " . $this->name . " OR " . $proposition->name . " )";
        $resultValue = ( $this->value or $proposition->value );
        return new Proposition($resultName, $resultValue);
    }

    /**
     * Performs a Boolean NOT operation its own value
     * @access public
     * @return Proposition
     */
    function logicalNot()
    {
        $resultName = "( NOT " . $this->name . " )";
        $resultValue = (!$this->value );
        return new Proposition($resultName, $resultValue);
    }

    /**
     * Performs a Boolean XOR operation on another {@link Proposition}
     * @access public
     * @param Proposition $proposition
     * @return Proposition
     */
    function logicalXor($proposition)
    {
        $resultName = "( " . $this->name . " XOR " . $proposition->name . " )";
        $resultValue = ( $this->value xor $proposition->value );
        return new Proposition($resultName, $resultValue);
    }

}