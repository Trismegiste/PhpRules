<?php

namespace PhpRules;

/**
 * Override
 */
class RuleOverride
{

    var $ruleName;
    var $value;
    var $who;
    var $why;
    var $when;

    function RuleOverride($ruleName, $value, $who, $why, $when)
    {
        $this->ruleName = $ruleName;
        $this->value = $value;
        $this->who = $who;
        $this->why = $why;
        $this->when = $when;
    }

    function __construct($ruleName, $value, $who, $why, $when)
    {
        $this->ruleName = $ruleName;
        $this->value = $value;
        $this->who = $who;
        $this->why = $why;
        $this->when = $when;
    }

}

/* End of file Ruleoverride.php */
/* Location: ./system/application/libraries/php-rules/Ruleoverride.php */