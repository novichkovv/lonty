<?php
class index_Controller extends Controller
{
	public function index($args='')
	{
		(isset($args[0]))?$page=$args[0]:$page=1;
		$this->title='ЛОНТИ - самые любопытные вещи, явления и истории из веба';
		//$post_model=new posts_model;

		$limit=1;
		$limitStart=$limit*$page-$limit;
		$postsAmount = $post_model->countPosts();;
		$count=1;
		$post=array();
		$post_id=array();
		$posts = $post_model->getPosts($limitStart, $limit);
		$ids=array();
		foreach($posts as $k=>$row)
		{
			foreach($row as $key=>$vol)
			{
				if(($key=='post_id' || $key=='post_date' || $key=='post_epilog' || $key=='post_prolog' || $key=='post_name' || $key=='likes'
				||$key=='passage_id' || $key=='passage_header' || $key=='passage_text' || $key=='passage_imgtype' || $key=='passage_copyright'))
				{
					$post[$row['post_id']][$key]=$vol;
					$ids[$row['post_id']] = $row['post_id'];
				}
				if(($key=='rubric_name' || $key=='rubric_id'))
					$post[$row['post_id']]['rubric'][$count][$key]=$vol;
			}
			$count++;
		}
        $rightPosts = $post_model->getRightPosts(implode(',',$ids));

		$this->view('index', array('posts'=>$post,
								   'rightPosts' => $rightPosts,
								   'page'=>$page,
								   'postsAmount'=>$postsAmount,
								   'limit'=>$limit));
	}
	public function post($args='')
	{
		$id=$page=$args[0];
		$post_model=new posts_model;
		$query="SELECT * FROM
			 		posts p
			 	LEFT JOIN
			 	(SELECT * FROM
			 		passages) pa
			 		ON p.post_id=pa.post_id
			 	LEFT JOIN postrubrics pr
			 		ON p.post_id=pr.post_id
			 	LEFT JOIN rubrics r
			 		ON pr.rubric_id=r.rubric_id
				WHERE p.post_id=$id
			 	";
		$res=mysql_query($query) or die(mysql_error());
		$first=true;
		$first=true;
		$post=array();
		$post_id=array();
		$passage_id=array();
		$rubric_id=array();
		$count=0;
		while($row=mysql_fetch_assoc($res))
		{
			foreach($row as $key=>$vol)
			{
				if(($key==='post_id' || $key=='post_date' || $key=='post_epilog' || $key=='post_prolog' || $key=='post_name' || $key=='likes') && !in_array($row['post_id'], $post_id))
					$post[$key]=$vol;
				if(($key=='passage_id' || $key=='passage_header' || $key=='passage_text' || $key=='passage_imgtype' || $key=='passage_copyright') && !in_array($row['passage_id'], $passage_id))
					$post['passage'][$count][$key]=$vol;
				if(($key=='rubric_name' || $key=='rubric_id') && !in_array($row['rubric_id'], $rubric_id))
					$post['rubric'][$count][$key]=$vol;
			}
			$post_id[]=$row['post_id'];
			$passage_id[]=$row['passage_id'];
			$rubric_id[]=$row['rubric_id'];
			$count++;
			/*echo '<tr>';
			if($first)
			{
				foreach($row as $key=>$vol)
				{
					echo '<td>'.$key.'</td>';
				}
				echo '<tr>';
				foreach($row as $key=>$vol)
				{
					echo '<td>'.mb_substr($vol, 0, 10, 'utf-8').'</td>';
				}
				echo '</tr>';
			}
			else
			{
				foreach($row as $key=>$vol)
				{
					echo '<td>'.mb_substr($vol, 0, 10, 'utf-8').'</td>';
				}
			}
			echo '</tr>'; */
        	//$r[]=$row;
        	//$first=false;
		}
		//print_r($post);
		//echo ('</table>');
        $rightPosts = $post_model->getRightPosts($id);
		$this->view('post', array('post'=>$post,
							      'rightPosts' => $rightPosts,
								  ));
	}
	public function rubric($args='')
	{
    	(isset($args[0]))?$rubric=$args[0]:$rubric=1;
    	(isset($args[1]))?$page=$args[1]:$page=1;
		$this->title='ЛОНТИ - самые любопытные вещи, явления и истории из веба';
		$post=new posts_model;
		$limit=1;
		$limitStart=$limit*$page-$limit;
		$query="SELECT COUNT(*) FROM posts";
		$res=mysql_query($query) or die(mysql_error());
		$row=mysql_fetch_row($res);
		$postsAmount=$row[0];
		$query="SELECT * FROM (
				SELECT * FROM postrubrics pr
				WHERE rubric_id='".$rubric."')
				LEFT JOIN
			 		(SELECT * FROM posts
				LIMIT $limitStart, $limit) p
				ON p.post_id IN pr.post_id
			 	LEFT JOIN
			 	(SELECT * FROM
			 		passages
			 	WHERE main IS TRUE) pa
			 		ON p.post_id=pa.post_id
			 	LEFT JOIN rubrics r
			 		ON pr.rubric_id=r.rubric_id
				ORDER BY p.post_date DESC
			 	";
		$res=mysql_query($query) or die(mysql_error());
		$count=0;
		$post=array();
		$post_id=array();
		$rubric_id=array();
		while($row=mysql_fetch_assoc($res))
		{
			//print_r($row);
			foreach($row as $key=>$vol)
			{
				if(($key==='post_id' || $key=='post_date' || $key=='post_epilog' || $key=='post_prolog' || $key=='post_name' || $key=='likes'
				||$key=='passage_id' || $key=='passage_header' || $key=='passage_text' || $key=='passage_imgtype' || $key=='passage_copyright') && !in_array($row['post_id'], $post_id))
					$post[$row['post_id']][$key]=$vol;
				if(($key=='rubric_name' || $key=='rubric_id') && !in_array($row['rubric_id'], $rubric_id))
					$post[$row['post_id']]['rubric'][$count][$key]=$vol;
			}
			$post_id[]=$row['post_id'];
			$rubric_id[]=$row['rubric_id'];
			$count++;
			//$r[]=$row;
		}
	    //print_r($post);
		$this->view('index', array('posts'=>$post,
								   'page'=>$page,
								   'postsAmount'=>$postsAmount,
								   'limit'=>$limit));
	}
}
?>