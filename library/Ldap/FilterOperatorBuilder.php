<?php

namespace Ldap;

use Ldap\FilterOperator;

class FilterOperatorBuilder
{
	public function _and($filterObjects) {
		return new FilterOperator(FilterOperator::OPERATOR_AND, $filterObjects);
	}
	
	public function _or($filterObjects) {
		return new FilterOperator(FilterOperator::OPERATOR_OR, $filterObjects);
	}
}