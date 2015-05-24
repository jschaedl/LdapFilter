<?php
namespace Ldap;

use Ldap\AbstractFilterObject;

class FilterOperator extends AbstractFilterObject
{
    const OPERATOR_AND = '&';
    const OPERATOR_OR = '|';
    const OPERATOR_NOT = '!';

    protected $operator;
    protected $filterObjects;

    function __construct($operator, $filterObjects = array())
    {
        $this->operator = $operator;
        $this->filterObjects = $filterObjects;
    }

    protected function getFilterObjects()
    {
        $filterObjectString = '';
        foreach ($this->filterObjects as $filterObject) {
            $filterObjectString .= $filterObject->toString();
        }
        
        return $filterObjectString;
    }

    public function toString()
    {
        return sprintf("(%s%s)", $this->operator, $this->getFilterObjects());
    }
}