<?php

namespace tests;

use Ldap\FilterCriteriaBuilder;
use Ldap\FilterOperatorBuilder;
use Ldap\Filter;


class FilterTest extends \PHPUnit_Framework_TestCase
{	    
    private $criteriaBuilder;
    private $operatorBuilder;
    
	protected function setUp() {
		$this->criteriaBuilder = new FilterCriteriaBuilder();
		$this->operatorBuilder = new FilterOperatorBuilder();	
	}
	
	protected function tearDown() {
		$this->filter = null;
	}
	
	public function testFilterCriteriaEqual() {
		$filterCriteria = $this->criteriaBuilder->equal('cn', 'jschaedl');
		$this->assertEquals('(cn=jschaedl)', $filterCriteria->toString());
	}
	
	public function testFilterCriteriaGreaterThan() {
		$filterCriteria = $this->criteriaBuilder->gt('fhosCardCount', '10');
		$this->assertEquals('(fhosCardCount>10)', $filterCriteria->toString());
	}
	
	public function testFilterCriteriaLesserThan() {
		$filterCriteria = $this->criteriaBuilder->lt('fhosCardCount', '10');
		$this->assertEquals('(fhosCardCount<10)', $filterCriteria->toString());
	}
	
	public function testFilterCriteriaPresent() {
		$filterCriteria = $this->criteriaBuilder->present('fhosCardOwnerID');
		$this->assertEquals('(fhosCardOwnerID=*)', $filterCriteria->toString());
	}
	
	public function testFilterOperatorAND() {
		$filterCriteria = $this->criteriaBuilder->equal('cn', 'jschaedl');
		$filterOperator = $this->operatorBuilder->_and(array($filterCriteria));
		$this->assertEquals('(&(cn=jschaedl))', $filterOperator->toString());
	}
	
	public function testFilterOperatorOR() {
		$filterCriteria = $this->criteriaBuilder->equal('cn', 'jschaedl');
		$filterOperator = $this->operatorBuilder->_or(array($filterCriteria));
		$this->assertEquals('(|(cn=jschaedl))', $filterOperator->toString());
	}
	
	public function testComplexFilterOne() {
		$filterOperator = $this->operatorBuilder->_or(array(
			$this->criteriaBuilder->equal('cn', 'jschaedl'), 
			$this->criteriaBuilder->equal('mail', 'J.Schaedlich@hs-osnabrueck.de'),
			$this->operatorBuilder->_and(array(
				$this->criteriaBuilder->equal('fhosGebdat', '29.03.1983'), 
			))
		));
		$this->assertEquals(
			'(|(cn=jschaedl)(mail=J.Schaedlich@hs-osnabrueck.de)(&(fhosGebdat=29.03.1983)))', 
			$filterOperator->toString()
		);
		
	}
	
	public function testComplexFilterTwo() {
		$filterOperator = $this->operatorBuilder->_and(array(
			$this->criteriaBuilder->present('cn'),
			$this->criteriaBuilder->present('id'),
			$this->operatorBuilder->_or(array(
				$this->criteriaBuilder->equal('approved', 'TRUE'),
				$this->criteriaBuilder->equal('printed', 'TRUE')
			))
		));
		
		$this->assertEquals(
			'(&(cn=*)(id=*)(|(approved=TRUE)(printed=TRUE)))', 
			$filterOperator->toString()
		);
	}
}