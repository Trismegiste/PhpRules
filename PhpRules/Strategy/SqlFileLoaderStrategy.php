<?php
/**
 * Strategy pattern for loading a RuleContext from a file in the format
 * <pre>Rule_Element_Type|Rule_Element_Name|SQL_Statement|Expected_Return_Data_Type_from_SQL_Query</pre>
 * @author Greg Swindle <greg@swindle.net>
 * @version 0.2
 * @package Phprules
 */
class SqlFileLoaderStrategy extends RuleContextLoaderStrategy {
/**
 * @access public
 * @var Rule
 */
	public $rule;
/**
 * @access public
 * @var RuleContext
 */
	public $ruleContext;
/**
 * Constructor.
 * @access public
 */
	function SqlFileLoaderStrategy() {
		parent::RuleContextLoaderStrategy();
	}
/**
 * Load a RuleContext based on the elements listed in {@link $fileName}
 * @access public
 * @param string $fileName The path to a *.sql.con file.
 * @param int $id
 * @return RuleContext
 */
	public function loadRuleContext( $fileName, $id ) {
		$STATEMENT = 4;
		// $statements = $this->getStatements( $fileName );
		$statements = $this->getStatements( $fileName );
		foreach( $statements as $statement ) {
			$tokens = preg_split( '/[\|]+/', $statement );
			// Every statement in the RuleContext file should have
			// four (4) tokens. If not, ignore it.
			if( count( $tokens ) == $STATEMENT ) {
				$this->processRuleContextStatement( $tokens, $id );
			}
		}
		return $this->ruleContext;
	}

	protected function getRuleElementValue( $tokens, $args ) {
		$ruleElementType      = $tokens[ 0 ];
		$ruleElementName      = $tokens[ 1 ];
		$sql                  = $tokens[ 2 ];
		$ruleElementValueType = trim( $tokens[ 3 ] );
		$ruleElementValue     = null;
		// Query the database
		require_once BASEPATH.'database/DB'.EXT;
		$db = DB('', false);
		$query = $db->query( $sql, $args );
		$result = $query->result_array();
		// Get the value
		$ruleElementValue = array_pop( array_values( $result[ 0 ] ) );
		// Set the data type
		settype( $ruleElementValue, $ruleElementValueType );
		return $ruleElementValue;
	}

	protected function processRuleContextStatement( $tokens, $args ) {
		$ruleElementName      = $tokens[ 1 ];
		$ruleElementValue     = null;

		$ruleElementValue = $this->getRuleElementValue( $tokens, $args );
		$this->ruleContext->addVariable( $ruleElementName, $ruleElementValue );
	}
}
?>