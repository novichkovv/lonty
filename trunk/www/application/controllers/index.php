<?php
class index_Controller extends Controller
{
	public function index($args='')
	{
        $this->title='ЛОНТИ - самые любопытные вещи, явления и истории из веба';
        /*
         * Алгоритм пагинатора
         */
		(isset($args[0]))?$page=$args[0]:$page=1;
        $limit = 2;

        $post_model=new posts_model;
        $count_posts = $post_model->countPosts();
        $limit_start = $page*$limit-$limit;
        $pages_num = ceil($count_posts/$limit);
        $pag = array();
        $pag['page'] = $page;
        $pag['last'] = $pages_num;

        if($page == 1)$pag['unprev'] = true;
        if($page == $pages_num)$pag['unnext'] = true;
        if($page == 1)$pag['unfirst'] = true;
        if($page == $pages_num)$pag['unlast'] = true;
        $pages = array();
        $cp = $page-2;
        switch($page)
        {
            case "1":
                $cp = 1;
            break;
            case "2":
                $cp = 1;
            break;
            case $pages_num:
                $cp = $pages_num-4;
            break;
            case $pages_num-1:
                $cp = $pages_num-4;

        }
        for($i = $cp; $i<=$pages_num && $i<=$cp+4; $i++)
        {
            $pages[] = $i;
        }
        /*
         * Конец алгоритма пагинатора
         */


        $posts = $post_model->getPosts($limit_start, $limit);
        $features = new features();
        $id = array();
        foreach($posts as $k=>$v)
        {
            $posts[$k]['month'] = $features->translateMonth($v['month'], 'genitive');
            $id[] = $v['post_id'];
        }
        if($id)$ids = implode(',', $id);
        $right_posts = $post_model->getRightPosts($ids);
        $this->t->assign('posts', $posts);
        $this->t->assign('pages', $pages);
        $this->t->assign('page', $page);
        $this->t->assign('pag', $pag);
        $this->t->assign('right_posts', $right_posts);


	}

    public function post($args='')
    {
        if(!$args[0])header('Location: '.SITE_DIR);
        $posts_model = new posts_model();
        $post = $posts_model->getPost($args[0]);
        if(!$post)exit;
        $features = new features();
        $post[0]['month'] = $features->translateMonth($post[0]['month'],'genitive');
        $right_posts = $posts_model->getRightPosts($args[0]);
        $this->t->assign('post', $post);
        $this->t->assign('right_posts', $right_posts);
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