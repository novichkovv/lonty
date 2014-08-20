<?php
class passages_model extends Model
{
	function __construct()
	{
		$this->getClassName(__CLASS__);
		$this->selectTable('passages');
		$this->selectDb('lonty');
		//$this->$fields = $this->fields();
	}
	static function fields()
	{		$fields = array(
			'passage_id'=>'passage_id',
			'passage_header'=>'header',
			'passage_imgtype'=>'img_type',
			'passage_text'=>'text',
			'main'=>'main',
			'pk'=>'passage_id'
		);
		return $fields;	}
}
?>