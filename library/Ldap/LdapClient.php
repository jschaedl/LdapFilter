<?php

namespace Ldap;

class LDAPCLient
{
	public $connection = null;
	
	function __construct($server)
	{
		if (isset($server))
		{
			$this->connect($server);
			
			if (!$this->connection)
			{
				throw new Exception("ldap connection could not established");
			}
		}
		else
		{
			throw new Exception("please define a ldap server address");
		}
	}

	public function bind($bindDN, $bindPassword)
	{
		return ldap_bind($this->connection, $bindDN, $bindPassword);
	}
	
	public function search($bindDN, $filter, $returningValues=array(), $sizeLimit=0)
	{
		return ldap_search($this->connection, $bindDN, $filter, $returningValues, 0, $sizeLimit);
	}
	
	public function getEntries($result)
	{
		return ldap_get_entries($this->connection, $result);
	}
	
	private function connect($server)
	{
		$this->connection = ldap_connect(LDAP_SERVER);
	}
}

?>
