<?php
namespace Ldap;

class FilterCriteriaBuilder
{
    public function equals($attributeName, $attributeValue)
    {
        return new FilterCriteria(FilterCriteria::EQUALS, 
            $attributeName, $attributeValue);
    }
    
    public function differs($attributeName, $attributeValue)
    {
        return new FilterCriteria(FilterCriteria::DIFFERS,
            $attributeName, $attributeValue);
    }

    public function greaterThan($attributeName, $attributeValue)
    {
        return new FilterCriteria(FilterCriteria::GREATER_THAN, 
            $attributeName, $attributeValue);
    }

    public function greaterThanAndEquals($attributeName, $attributeValue)
    {
        return new FilterCriteria(FilterCriteria::GREATER_THAN_AND_EQUALS, 
            $attributeName, $attributeValue);
    }

    public function lesserThan($attributeName, $attributeValue)
    {
        return new FilterCriteria(FilterCriteria::LESSER_THAN, 
            $attributeName, $attributeValue);
    }

    public function lesserThanAndEquals($attributeName, $attributeValue)
    {
        return new FilterCriteria(FilterCriteria::LESSER_THAN_AND_EQUALS, 
            $attributeName, $attributeValue);
    }

    public function matchesAll($attributeName)
    {
        return new FilterCriteria(FilterCriteria::EQUALS, 
            $attributeName, FilterCriteria::MATCHES_ALL);
    }
}