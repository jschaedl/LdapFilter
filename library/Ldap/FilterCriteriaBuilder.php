<?php

namespace Ldap;


class FilterCriteriaBuilder
{
	public function equal($attributeName, $attributeValue) {
		return new FilterCriteria(FilterCriteria::EQUAL, $attributeName, $attributeValue);
	}
	
	public function gt($attributeName, $attributeValue) {
		return new FilterCriteria(FilterCriteria::GT, $attributeName, $attributeValue);
	}
	
	public function lt($attributeName, $attributeValue) {
		return new FilterCriteria(FilterCriteria::LT, $attributeName, $attributeValue);
	}
	
	public function present($attributeName) {
		return new FilterCriteria(FilterCriteria::EQUAL, $attributeName, FilterCriteria::PRESENT);
	}
}