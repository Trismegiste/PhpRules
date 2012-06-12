<?php

namespace PhpRules;

/**
 * Contains the informational context for the execution of a Rule. It represents
 * this information as a collection of RuleElements that may be Propositions or
 * Variables but not Operators.
 * @package Phprules
 */
class RuleContext
{

    public $name;
    public $elements;

    function RuleContext($name = '')
    {
        $this->name = $name;
        // elements is a dictionary - a set of {name, value} pairs
        // The names are Proposition or Variable names and
        // the values are the Propositions or Variables themselves
        $this->elements = array();
    }

    function __construct($name = '')
    {
        $this->name = $name;
        // elements is a dictionary - a set of {name, value} pairs
        // The names are Proposition or Variable names and
        // the values are the Propositions or Variables themselves
        $this->elements = array();
    }

    /**
     * Adds a Proposition to the array of {@link $elements}.
     * @access public
     * @param string $statement The Proposition's statement.
     * @param boolean $value Whether the Proposition is TRUE or FALSE.
     */
    function addProposition($statement, $value)
    {
        $this->elements[$statement] = new Proposition($statement, $value);
    }

    /**
     * Adds a Variable to the array of {@link $elements}.
     * @access public
     * @param string $name The Variable's name.
     * @param mixed $value The Variable's value.
     */
    function addVariable($name, $value)
    {
        $this->elements[$name] = new Variable($name, $value);
    }

    /**
     * Find and return a RuleElement by name, if it exists.
     * @access public
     * @param string $name The name (i.e., "key") of the RuleElement.
     * @return RuleElement
     */
    function findElement($name)
    {
        return $this->elements[$name];
    }

    function append($ruleContext)
    {
        foreach ($ruleContext->elements as $e) {
            $this->elements[$e->name] = $e;
        }
    }

    /**
     * Returns an infixed, readable representation of the RuleContext.
     * @access public
     * @return string
     */
    function toString()
    {
        $result = "";
        foreach (array_values($this->elements) as $e) {
            $result = $result . $e->toString() . "\n";
        }
        return $result;
    }

}

/* End of file Rulecontext.php */
/* Location: ./system/application/libraries/php-rules/Rulecontext.php */