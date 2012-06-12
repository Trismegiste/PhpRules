<?php

namespace PhpRules;

/**
 * A symbol that represents Date values. DateVariable encapulates {@link http://us2.php.net/manual/en/function.strtotime.php strtotime}, which parses any English textual datetime description into a Unix timestamp.
 * @package Phprules
 */
class DateVariable extends Variable
{

    /**
     * Constructor initializes {@link $name}, and the {@link $value}.
     * @access public
     * @param string $name The name of the DateVariable
     * @param string $value A date/time string in a {@link http://us2.php.net/manual/en/datetime.formats.php valid Date and Time format}.
     */
    function DateVariable($name, $value)
    {
        $v = strtotime($value);
        parent::Variable($name, $v);
    }

    /**
     * Constructor initializes {@link $name}, and the {@link $value}.
     * @access public
     * @param string $name The name of the DateVariable
     * @param string $value A date/time string in a {@link http://us2.php.net/manual/en/datetime.formats.php valid Date and Time format}.
     */
    function __construct($name, $value)
    {
        $v = strtotime($value);
        parent::__construct($name, $v);
    }

    /**
     * Returns DateVariable.
     * @access public
     * @return string
     */
    function getType()
    {
        return "DateVariable";
    }

    /**
     * Returns a human-readable statement and value.
     * @access public
     * @return string
     */
    function toString()
    {
        return "DateVariable name = " . $this->name . ", value = " . $this->value;
    }

}
