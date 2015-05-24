<?php
namespace Ldap;

use Ldap\AbstractFilterObject;

class FilterCriteria extends AbstractFilterObject
{
    const EQUALS = '=';
    const DIFFERS = '~';
    const GREATER_THAN = '>';
    const GREATER_THAN_AND_EQUALS = '>=';
    const LESSER_THAN = '<';
    const LESSER_THAN_AND_EQUALS = '<=';
    const MATCHES_ALL = '*';

    protected $operator;
    protected $attributeName;
    protected $attributeValue;

    function __construct($operator, $attributeName, $attributeValue)
    {
        $this->operator = $operator;
        $this->attributeName = $attributeName;
        $this->attributeValue = $attributeValue;
    }

    public function toString()
    {
        return sprintf("(%s%s%s)", $this->attributeName, $this->operator, $this->attributeValue);
    }
}