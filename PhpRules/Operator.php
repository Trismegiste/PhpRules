<?php

namespace PhpRules;

/**
 * Represents a Boolean operator or a quantifier operator.
 * @package Phprules
 */
class Operator extends RuleElement
{

    /**
     * The name of the RuleElement.
     * @access private
     * @var array
     */
    private $operators;

    const LOGICAL_OR = 'OR';
    const LOGICAL_AND = 'AND';
    const LOGICAL_NOT = 'NOT';
    const LOGICAL_XOR = 'XOR';
    const EQUAL_TO = 'EQUALTO';
    const NOT_EQUAL_TO = 'NOTEQUALTO';
    const LESS_THAN = 'LESSTHAN';
    const LESS_THAN_OR_EQUAL_TO = 'LESSTHANOREQUALTO';
    const GREATER_THAN = 'GREATERTHAN';
    const GREATER_THAN_OR_EQUAL_TO = 'GREATERTHANOREQUALTO';

    /**
     * Constructor initializes {@link $name}, i.e., the operator.
     * @access public
     */
    function Operator($operator)
    {
        $this->operators = array("AND", "OR", "NOT", "XOR", "EQUALTO", "NOTEQUALTO", "LESSTHAN", "GREATERTHAN", "LESSTHANOREQUALTO", "GREATERTHANOREQUALTO");
        if (in_array($operator, $this->operators)) {
            parent::Operator($operator);
        } else {
            throw new Exception($operator . " is not a valid operator.");
        }
    }

    /**
     * Constructor initializes {@link $name}, i.e., the operator.
     * @access public
     */
    function __construct($operator)
    {
        $this->operators = array("AND", "OR", "NOT", "XOR", "EQUALTO", "NOTEQUALTO", "LESSTHAN", "GREATERTHAN", "LESSTHANOREQUALTO", "GREATERTHANOREQUALTO");
        if (in_array($operator, $this->operators)) {
            parent::__construct($operator);
        } else {
            throw new Exception($operator . " is not a valid operator.");
        }
    }

    /**
     * Returns "Operator."
     * @access public
     * @return string
     */
    function getType()
    {
        return "Operator";
    }

}
