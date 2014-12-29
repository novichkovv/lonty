<?php
class index_Controller extends Controller
{
	public function index($args='')
	{
        $this->title='ЛОНТИ - самые любопытные вещи, явления и истории из веба';
        $this->t->assign('title', $this->title);
        /*
         * Алгоритм пагинатора
         */
		(isset($args[0]))?$page=$args[0]:$page=1;
        $limit = 10;

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
        $this->title='ЛОНТИ - '.$post[0]['name'];
        if(!$post)exit;
        $features = new features();
        $post[0]['month'] = $features->translateMonth($post[0]['month'],'genitive');
        $description = nl2br($post[0]['epilog']);
        $description = str_replace('<br />','\\',$description);
        $right_posts = $posts_model->getRightPosts($args[0]);
        $this->t->assign('post', $post);
        $this->t->assign('right_posts', $right_posts);
        $this->t->assign('description', $description);
    }

	public function rubrics($args='')
	{
    	(isset($args[0]))?$rubric=$args[0]:$rubric=1;
    	(isset($args[1]))?$page=$args[1]:$page=1;
		$this->title='ЛОНТИ - самые любопытные вещи, явления и истории из веба';
        $posts_model = new posts_model();
		/*
         * Алгоритм пагинатора
         */
        $limit = 10;

        $count_posts = $posts_model->countRubricPosts($rubric);
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
        $posts = $posts_model->getPostsByRubrics($rubric,$limit,$limit_start);
        $features = new features();
        $id = array();
        foreach($posts as $k=>$v)
        {
            $posts[$k]['month'] = $features->translateMonth($v['month'], 'genitive');
            $id[] = $v['post_id'];
        }
        if($id)$ids = implode(',', $id);
        $right_posts = $posts_model->getRightPosts($ids);
        $this->t->assign('posts', $posts);
        $this->t->assign('pages', $pages);
        $this->t->assign('page', $page);
        $this->t->assign('pag', $pag);
        $this->t->assign('right_posts', $right_posts);

    }
}
?>