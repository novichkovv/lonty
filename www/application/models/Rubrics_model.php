<?php
class rubrics_model extends Model
{
	function __construct()
	{
		$this->getClassName(__CLASS__);
		$this->selectTable('rubrics');
		$this->selectDb('lonty');
		$this->fields = $this->fields();
	}

	function deletePostRubric($post_id, $rubric_id)
	{		$query = 'DELETE FROM postrubrics WHERE post_id = "'.$post_id.'" AND rubric_id = "'.$rubric_id.'"';
		mysql_query($query) or die($this->error());	}

    static function fields()
	{		$fields = array(
			'rubric_id'=>'rubric_id',
			'rubric_name'=>'rubric',
			'pk'=>'rubric_id'
			);
        return $fields;	}
}
?>