<?php
namespace tests;

use Ldap\FilterCriteriaBuilder;
use Ldap\FilterOperatorBuilder;

class FilterTest extends \PHPUnit_Framework_TestCase
{
    private $criteriaBuilder;
    private $operatorBuilder;

    protected function setUp()
    {
        $this->criteriaBuilder = new FilterCriteriaBuilder();
        $this->operatorBuilder = new FilterOperatorBuilder();
    }

    protected function tearDown()
    {
        $this->filter = null;
    }

    public function testFilterCriteriaEquals()
    {
        $filterCriteria = $this->criteriaBuilder->equals('cn', 'jschaedl');
        $this->assertEquals('(cn=jschaedl)', $filterCriteria->toString());
    }

    public function testFilterCriteriaDiffers()
    {
        $filterCriteria = $this->criteriaBuilder->differs('cn', 'jschaedl');
        $this->assertEquals('(cn~jschaedl)', $filterCriteria->toString());
    }

    public function testFilterCriteriaGreaterThan()
    {
        $filterCriteria = $this->criteriaBuilder->greaterThan('fhosCardCount', '10');
        $this->assertEquals('(fhosCardCount>10)', $filterCriteria->toString());
    }

    public function testFilterCriteriaGreaterThanAndEquals()
    {
        $filterCriteria = $this->criteriaBuilder->greaterThanAndEquals('fhosCardCount', '10');
        $this->assertEquals('(fhosCardCount>=10)', $filterCriteria->toString());
    }

    public function testFilterCriteriaLesserThan()
    {
        $filterCriteria = $this->criteriaBuilder->lesserThan('fhosCardCount', '10');
        $this->assertEquals('(fhosCardCount<10)', $filterCriteria->toString());
    }

    public function testFilterCriteriaLesserThanAndEquals()
    {
        $filterCriteria = $this->criteriaBuilder->lesserThanAndEquals('fhosCardCount', '10');
        $this->assertEquals('(fhosCardCount<=10)', $filterCriteria->toString());
    }

    public function testFilterCriteriaPresent()
    {
        $filterCriteria = $this->criteriaBuilder->matchesAll('fhosCardOwnerId');
        $this->assertEquals('(fhosCardOwnerId=*)', $filterCriteria->toString());
    }

    public function testFilterOperatorAND()
    {
        $filterCriteria = $this->criteriaBuilder->equals('cn', 'jschaedl');
        $filterOperator = $this->operatorBuilder->_and(array($filterCriteria));
        $this->assertEquals('(&(cn=jschaedl))', $filterOperator->toString());
    }

    public function testFilterOperatorOR()
    {
        $filterCriteria = $this->criteriaBuilder->equals('cn', 'jschaedl');
        $filterOperator = $this->operatorBuilder->_or(array($filterCriteria));
        $this->assertEquals('(|(cn=jschaedl))', $filterOperator->toString());
    }

    public function testFilterOperatorNOT()
    {
        $filterCriteria = $this->criteriaBuilder->equals('cn', 'jschaedl');
        $filterOperator = $this->operatorBuilder->_not(array($filterCriteria));
        $this->assertEquals('(!(cn=jschaedl))', $filterOperator->toString());
    }

    public function testComplexFilterOne()
    {
        $filterOperator = $this->operatorBuilder->_or(array(
            $this->criteriaBuilder->equals('cn', 'jschaedl'),
            $this->criteriaBuilder->equals('mail', 'J.Schaedlich@hs-osnabrueck.de'),
            $this->operatorBuilder->_and(array(
                $this->criteriaBuilder->equals('fhosGebdat', '29.03.1983')
            ))
        ));
        $this->assertEquals('(|(cn=jschaedl)(mail=J.Schaedlich@hs-osnabrueck.de)(&(fhosGebdat=29.03.1983)))', $filterOperator->toString());
    }

    public function testComplexFilterTwo()
    {
        $filterOperator = $this->operatorBuilder->_and(array(
            $this->criteriaBuilder->matchesAll('cn'),
            $this->criteriaBuilder->matchesAll('id'),
            $this->operatorBuilder->_or(array(
                $this->criteriaBuilder->equals('approved', 'TRUE'),
                $this->criteriaBuilder->equals('printed', 'TRUE')
            ))
        ));
        
        $this->assertEquals('(&(cn=*)(id=*)(|(approved=TRUE)(printed=TRUE)))', $filterOperator->toString()
		);
	}
}