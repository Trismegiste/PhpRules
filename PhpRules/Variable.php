<?php

namespace PhpRules;

/**
 * A symbol that represents a value.
 * @package Phprules
 */
class Variable extends RuleElement
{

    var $value;

    /**
     * Constructor initializes {@link $name}, and the {@link $value}.
     * @access public
     */
    function Variable($name, $value)
    {
        $this->value = $value;
        parent::RuleElement($name);
    }

    /**
     * Constructor initializes {@link $name}, and the {@link $value}.
     * @access public
     */
    function __construct($name, $value)
    {
        $this->value = $value;
        parent::__construct($name);
    }

    /**
     * Returns &quot;Variable.&quot;
     * @access public
     * @return string
     */
    function getType()
    {
        return "Variable";
    }

    /**
     * Returns a human-readable statement and value.
     * @access public
     * @return string
     */
    function toString()
    {
        return "Variable name = " . $this->name . ", value = " . $this->value;
    }

    /**
     * Determines whether another Variable's value is equal to its own value.
     * @public
     * @param Variable $variable
     * @return Proposition
     */
    function equalTo($variable)
    {
        $statement = "( " . $this->name . " == " . $variable->name . " )";
        $truthValue = ( $this->value == $variable->value );
        return new Proposition($statement, $truthValue);
    }

    /**
     * Determines whether another Variable's value is <em>not</em> equal to its own value.
     * @public
     * @param Variable $variable
     * @return Proposition
     */
    function notEqualTo($variable)
    {
        $statement = "( " . $this->name . " != " . $variable->name . " )";
        $truthValue = ( $this->value != $variable->value );
        return new Proposition($statement, $truthValue);
    }

    /**
     * Determines whether another Variable's value is less than to its own value.
     * @public
     * @param Variable $variable
     * @return Proposition
     */
    function lessThan($variable)
    {
        $statement = "( " . $this->name . " < " . $variable->name . " )";
        $truthValue = ( $this->value < $variable->value );
        return new Proposition($statement, $truthValue);
    }

    /**
     * Determines whether another Variable's value is less than or equal to to its own value.
     * @public
     * @param Variable $variable
     * @return Proposition
     */
    function lessThanOrEqualTo($variable)
    {
        $statement = "( " . $this->name . " <= " . $variable->name . " )";
        $truthValue = ( $this->value <= $variable->value );
        return new Proposition($statement, $truthValue);
    }

    /**
     * Determines whether another Variable's value is greater than to its own value.
     * @public
     * @param Variable $variable
     * @return Proposition
     */
    function greaterThan($variable)
    {
        $statement = "( " . $this->name . " > " . $variable->name . " )";
        $truthValue = ( $this->value > $variable->value );
        return new Proposition($statement, $truthValue);
    }

    /**
     * Determines whether another Variable's value is greater than or equal to its own value.
     * @public
     * @param Variable $variable
     * @return Proposition
     */
    function greaterThanOrEqualTo($variable)
    {
        $statement = "( " . $this->name . " >= " . $variable->name . " )";
        $truthValue = ( $this->value >= $variable->value );
        return new Proposition($statement, $truthValue);
    }

}