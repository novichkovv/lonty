<?php
class passages_model extends Model
{
	function __construct()
	{
		$this->getClassName(__CLASS__);
		$this->selectTable('passages');
		$this->selectDb('lonty');
	}
}
?>