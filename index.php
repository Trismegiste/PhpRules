<?php

use PhpRules\Strategy\TxtFileLoaderStrategy;
use PhpRules\RuleLoader;

spl_autoload_register(function($className) {
            $sub = str_replace('\\', '/', $className);
            include $sub . '.php';
        });

class Command
{

    /**
     * execute
     *
     * @param type $fileRule
     * @param type $fileCtxt
     */
    public function execute($fileRule, $fileCtxt)
    {
        $strategy = new TxtFileLoaderStrategy();
        $loader = new RuleLoader();
        $loader->setStrategy($strategy);
        $rule = $loader->loadRule($fileRule);
        $ruleContext = $loader->loadRuleContext($fileCtxt, 123);
        $result = $rule->evaluate($ruleContext);

        print_r($result);
    }

}

$cmd = new Command();
$cmd->execute($argv[1], $argv[2]);