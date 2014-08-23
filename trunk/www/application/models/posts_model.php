<?php
class posts_model extends Model
{
	function __construct()
	{
		$this->getClassName(__CLASS__);
		$this->selectTable('posts');
		$this->selectDb('lonty');
		$this->fields = $this->fields();
	}

	function getPosts($limit_start, $limit)
	{
		$query='SELECT
		            p.post_id,
		            p.post_epilog,
		            p.post_prolog,
		            p.post_name,
		            DAY(p.post_date) as day,
		            MONTH(p.post_date) as month,
                    group_concat(distinct concat("<a href=\"'.SITE_DIR.'index/rubrics/",r.rubric_id,"\">",r.rubric_name,"</a>")) rubrics
                FROM
                    posts p
                JOIN
                    postrubrics pr
                ON p.post_id=pr.post_id
                JOIN
                    rubrics r
                    ON r.rubric_id=pr.rubric_id
                GROUP BY p.post_id
                ORDER BY p.post_date
                LIMIT '.$limit_start.', '.$limit.'
			 	';
		$row=$this->getAll($query, true);
		return($row);
	}

    function getPost($id)
    {
        $query = '
        SELECT
            p.post_id,
		            p.post_name as name,
                    p.post_epilog as epilog,
                    p.post_prolog as prolog,
                    pa.passage_id,
                    pa.passage_header,
                    pa.passage_imgtype,
                    pa.passage_text,
		            DAY(p.post_date) as day,
		            MONTH(p.post_date) as month,
                    group_concat(distinct concat("<a href=\"'.SITE_DIR.'index/rubrics/",r.rubric_id,"\">",r.rubric_name,"</a>")) rubrics
                FROM
                    posts p
                JOIN
                    postrubrics pr
                ON p.post_id=pr.post_id
                JOIN
                    rubrics r
                    ON r.rubric_id=pr.rubric_id
                JOIN
                    (SELECT * FROM passages ) pa
                    ON  pa.post_id=p.post_id
                WHERE p.post_id="'.$id.'"
                GROUP BY pa.passage_id
        ';
        $row=$this->getAll($query, true);
        return($row);
    }

    function countPosts()
    {
        $query = '
        SELECT COUNT(*) as count FROM posts
        ';
        $tmp = $this->getRow($query);
        return $tmp[0];
    }

	function getRightPosts($not)
	{
		$query = '
		SELECT
			p.post_id,
			p.post_name
		FROM
			posts p
        WHERE
			p.post_id NOT IN ('.$not.')
		ORDER BY p.likes
		LIMIT 5
		';
		$row = $this->getAll($query);
		return($row);
	}
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
		return $row;
	}
	function getPostsNoPassages()
	{
		$query = '
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
		return $row;
	}
	public function rules()
	{
		return array('post_name'=>array('require'));
	}
	public function attributes()
	{
		return array('post_name'=>'��������� �����');
	}
	public static function fields()
	{
		$fields=array(
			 'post_id'=>'post_id',
			 'post_name'=>'name',
			 'post_epilog'=>'epilog',
			 'post_prolog'=>'prolog',
			 'post_date'=>'date',
			 'likes'=>'likes',
			 'pk'=>'post_id'
			 );
		return $fields;
	}
	public static function relations()
	{
		return array(
			'passages'=>array(
				'type'=>'has_many',
				'key'=>'post_id',
				'foreign_key'=>'post_id'
				),
			'postrubrics'=>array(
				'type'=>'has_many',
				'key'=>'post_id',
				'foreign_key'=>'post_id'
				),
			);
	}

}
?>