<?php
class postrubrics_model extends Model
{
	function __construct()
	{
		$this->getClassName(__CLASS__);
		$this->selectTable('postrubrics');
		$this->selectDb('lonty');
	}

	function deletePostRubric($post_id, $rubric_id)
	{
		$query = 'DELETE FROM postrubrics WHERE post_id = "'.$post_id.'" AND rubric_id = "'.$rubric_id.'"';
		mysql_query($query) or die($this->error());
	}
}
?>