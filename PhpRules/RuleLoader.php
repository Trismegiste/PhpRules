<?php

namespace PhpRules;

/**
 * Loads a Rule from a file. RuleLoader uses the Strategy pattern so you define custom algorithms for loading Rules and RuleContexts.
 * @package Phprules
 */
class RuleLoader
{

    /**
     * The algorithm used to retrieve a Rule or RuleContext.
     * @access private
     * @var RuleContextLoaderStrategy
     */
    private $strategy = NULL;

    /**
     * @access public
     * @var Rule
     */
    public $rule = NULL;

    /**
     * @access public
     * @var RuleContext
     */
    public $ruleContext = NULL;

    public function __construct()
    {
        $this->rule = new Rule();
        $this->ruleContext = new RuleContext();
    }

    public function setStrategy($strategy)
    {
        $this->strategy = $strategy;
        $strategy->rule = $this->rule;
        $strategy->ruleContext = $this->ruleContext;
    }

    public function loadRule($fileName)
    {
        return $this->strategy->loadRule($fileName);
    }

    public function loadRuleContext($fileName, $id)
    {
        return $this->strategy->loadRuleContext($fileName, $id);
    }

}

/* End of file Ruleloader.php */
/* Location: ./system/application/libraries/php-rules/Ruleloader.php */