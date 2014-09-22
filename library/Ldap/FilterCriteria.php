<?php

namespace Ldap;

use Ldap\FilterObject;

class FilterCriteria extends FilterObject
{
	const EQUAL = '=';
	const GT = '>';
	const LT = '<';
	const PRESENT = '*';
	
	protected $operator;
	protected $attributeName;
	protected $attributeValue;
	
	function __construct($operator, $attributeName, $attributeValue) {
		$this->operator = $operator;
		$this->attributeName = $attributeName;
		$this->attributeValue = $attributeValue;
	}
	
	public function toString() {
		return sprintf("(%s%s%s)", $this->attributeName, $this->operator, $this->attributeValue);
	}
}