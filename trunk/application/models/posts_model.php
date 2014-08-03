<?php
class posts_model extends Model
{
	function __construct()
	{
		$this->getClassName(__CLASS__);
		$this->selectTable('posts');
		$this->selectDb('lonty');
	}

	function getPosts($limitStart, $limit)
	{		$query="SELECT * FROM
			 		(SELECT * FROM posts
				LIMIT $limitStart, $limit) p
			 	LEFT JOIN
			 	(SELECT * FROM
			 		passages
			 	WHERE main IS TRUE) pa
			 		ON p.post_id=pa.post_id
			 	LEFT JOIN postrubrics pr
			 		ON p.post_id=pr.post_id
			 	LEFT JOIN rubrics r
			 		ON pr.rubric_id=r.rubric_id
				ORDER BY p.post_date DESC
			 	";
		$row=$this->getAll($query, true);
		return($row);	}
    function getPost($id)
    {    	$query = '
    	SELECT
    		p.post_name as name,
    		p.post_epilog as epilog,
    		p.post_prolog as prolog,
    		p.post_date as date,
    		pa.passage_id as pa_id,
    		pa.passage_header as header,
    		pa.passage_imgtype as img,
    		pa.passage_text as text,
    		pa.main,
    		pr.rubric_id,
    		r.rubric_name
    	FROM
    		posts p
    	JOIN
    		passages pa
    		ON p.post_id = pa.post_id
    	JOIN
    		postrubrics pr
    		ON p.post_id = pr.post_id
    	JOIN
    		rubrics r
    		ON r.rubric_id = r.rubric_id
 		WHERE p.post_id = "'.$id.'"
    	';
    	$row = $this->getAll($query);
		return($row);    }
	function getRightPosts($not)
	{		$query = '
		SELECT
			p.post_id,
			p.post_name,
			pa.passage_id
		FROM
			posts p
		JOIN
			passages pa
		ON
			p.post_id = pa.post_id
		WHERE
			pa.main = "1"
		AND
			p.post_id NOT IN ('.$not.')
		ORDER BY p.likes
		LIMIT 5
		';
		$row = $this->getAll($query);
		return($row);	}
	/*public function rules()
	{		return array('posts_name'=>array('require'));	} */
}
?>