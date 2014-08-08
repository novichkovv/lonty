<?php
class posts_model extends Model
{
	function __construct()
	{
		$this->getClassName(__CLASS__);
		$this->selectTable('posts');
		$this->selectDb('lonty');
		//$this->setPseudonyms();
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
    	LEFT JOIN
    		passages pa
    		ON p.post_id = pa.post_id
    	LEFT JOIN
    		postrubrics pr
    		ON p.post_id = pr.post_id
    	LEFT JOIN
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
	public function getPostsList()
	{
		$query = '
		SELECT
			p.post_id as id,
			p.post_date as date,
			p.post_name as name,
            GROUP_CONCAT(DISTINCT r.rubric_name ORDER BY r.rubric_name ASC SEPARATOR ", ") AS rubrics,
            COUNT(pa.passage_id) as amount
			FROM
				posts p
			JOIN
				passages pa
				ON pa.post_id = p.post_id
			JOIN
				postrubrics pr
				ON pr.post_id = p.post_id
			JOIN
				rubrics r
				ON pr.rubric_id = r.rubric_id
			GROUP BY p.post_id

		';
		$row = $this->getAll($query);
		return $row;	}
	function getPostsNoPassages()
	{		$query = '
		SELECT p.post_id, p.post_name, p.post_date, GROUP_CONCAT( DISTINCT r.rubric_name
		ORDER BY r.rubric_name ASC
		SEPARATOR ", " ) as rubric_name
		FROM posts p
		JOIN postrubrics pr
			ON p.post_id = pr.post_id
		JOIN rubrics r
			ON pr.rubric_id = r.rubric_id
		LEFT JOIN passages pa
			ON pa.post_id = p.post_id
		GROUP BY
			p.post_id,
			pa.passage_id HAVING COUNT( pa.passage_id ) = 0
		ORDER BY p.post_date
		';
		$row = $this->getAll($query);
		return $row;	}
	public function rules()
	{		return array('post_name'=>array('require'));	}
	public function attributes()
	{		return array('post_name'=>'Заголовок поста');	}
	public static function setPseudonyms()
	{		self::$pseudonyms=array( 'post_id'=>'post_id',
								 'post_name'=>'name',
								 'post_epilog'=>'epilog',
								 'post_prolog'=>'prolog',
								 'post_date'=>'date',
								 'post_likes'=>'likes'
								 );
		return self::$pseudonyms;	}
}
?>