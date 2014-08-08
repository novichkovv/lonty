<?php
class admin_controller extends controller
{
	public function index($vars='')
	{
		$this->styles=array('admin');
        $this->scripts=array();
		$this->title='ЛОНТИ - самые любопытные вещи, явления и истории из веба';
  		$model = new posts_model;
  		$posts = $model->getPostsList();
  		$no_pas_posts = $model->getPostsNoPassages();
  		$this->t->assign('posts', $posts);
  		$this->t->assign('no_pas_posts', $no_pas_posts);
	}
	public function addpost()
	{
		$this->styles=array('admin');
        $this->scripts=array('jquery', 'addpost');

		$rubrics_model=new rubrics_model();
		$rubrics = $rubrics_model->selectAll();
		$this->t->assign('rubrics', $rubrics);

		$post_model = new posts_model();
		if(isset($_POST['addPostButton']))
		{
			$_POST['posts']['post_date']=date('Y-m-d H:i:s');
			$post_model->insert();
			$id=mysql_insert_id();
			$rubrics=$_POST['postrubrics'];
			foreach($rubrics as $key=>$vol)
			{				$postrubrics_model = new postrubrics_model();

				$_POST['postrubrics']=$vol;
				$_POST['postrubrics']['post_id'] = $id;
				$postrubrics_model->insert();
			}
			header('location: '.SITE_DIR.'admin/editpost/'.$id);
		}
		$postInfo = array();
		//		if(isset($id))
//		{
//			$item = $post_model->getPost($id);
//			$post = array();
//			foreach($item as $k=>$row)
//			{
//				foreach($row as $key => $vol)
//				{
//					if($key=='name' || $key=='epilog' || $key=='prolog' || $key=='date')
//						$post[$key] = $vol;
//					if($key=='header' || $key=='img' || $key=='text' || $key=='pa_id' || $key=='main')
//					 {
//					 	$post['passage'][$row['pa_id']][$key] = $vol;
//	                 }
//					if($key=='rubric_id')
//						$post['rubric'][$row['rubric_id']] = $row['rubric_name'];
//
//				}
//			}
//		}
//			else
//			{
//				$query = $post_model->update("WHERE post_id = '$id'");
//			}
//			$passages=$_POST['passages'];
//			foreach($passages as $key=>$vol)
//			{
//				$_POST['passages']=$vol;
//				$_POST['passages']['post_id']=$id;
//				if(!isset($vol['passage_id']))
//				{
//					$passage->insert();
//					$passage_id=mysql_insert_id();
//				}
//				else
//				{
//					$passage_id = $vol['passage_id'];
//					$passage->update("WHERE passage_id = '$passage_id'");
//				}
//
//				$file=SITE_PATH. DS. 'images'.DS.'pictures'.DS.'temp'.DS.'temp'.$_POST['temp'].$key.'.'.$_POST['passages']['passage_imgtype'];
//				if(file_exists($file))
//				{
//					$image=new image;
//					$image->load($file);
//					$folder=SITE_PATH.DS.'images'.DS.'pictures'.DS.'big'.DS.$id.DS.'';
//
//					if(!file_exists($folder))
//						mkdir($folder, 0777, true);
//					copy($file, $folder.$passage_id.'.'.$_POST['passages']['passage_imgtype']);
//					$folder=SITE_PATH.DS.'images'.DS.'pictures'.DS.'cut'.DS.$id.DS.'';
//					if(!file_exists($folder))
//						mkdir($folder, 0777, true);
//					if($_POST['passages']['passage_imgtype'] == 'jpg')
//					{
//						$image->resizeToWidth(570);
//						$image->crop(192);
//						$image->save($folder.$passage_id.'.'.$_POST['passages']['passage_imgtype']);
//					}
//
//
//				}
//			}
//			if($vars[0])
//			{
//				foreach($post['rubric'] as $rubric_id=>$vol)
//				{
//					if(!in_array($rubric_id, $_POST['postrubrics']))
//						$postrubrics->deletePostRubric($vars[0], $rubric_id);
//
//				}
//			}

	}
	public function editpost($vars='')
	{		$this->styles=array('admin');
        $this->scripts=array('jquery', 'ajaxUpload', 'addpost');
        $posts_model = new posts_model();
        $posts = $posts_model->getPost($vars[0]);
       // $rubrics_model = new rubrics_model();
        $post = array();
        foreach($posts as $k=>$row)
        {        	foreach($row as $key=>$vol)
        	{        	 	if(in_array($key, $posts_model->pseudonyms))
        	 		$post[$key] = $vol;
        		if(in_array($key, rubrics_model::$pseudonyms))
        			$post['rubric'] = $vol;        	}        }
        print_r($post);
	}
	public function loadpic($vars = '')
	{
		$type = $vars[0];
		if($_FILES)
		{
			foreach($_FILES as $files=>$vol)
		   	{
		   		$name=$files;
		   		if($_FILES[$name]['error']==1)
		   		{
		   			echo '<img alt="Превышен максимальный размер файла!" />';
		   			exit;
		   		}

		        if($type == 'jpg')
		        {
		     		$image = new image();
					$image->load($_FILES[$name]['tmp_name']);
					$img_name=$name.'.jpg';
					$name=$files;
					$image->save($img_name);
				}
				//$image->crop(200, $_FILES[$name]['tmp_name']);
				//$image->resizeToHeight(300);

				if($type == 'gif')
				{
					$img_name=$name.'.GIF';
	                $nGif = new gif($_FILES[$name]['tmp_name'], 0);
					$nGif->resize($img_name,'500','500',1,0);
				}

				//$image->crop(200, $_FILES[$name]['tmp_name']);
				//$image->resizeToHeight(300);
				//$image->crop(200, $_FILES[$name]['tmp_name']);
				//$image->resizeToHeight(300);
			}
			$arr=explode('/', $name);
			$id=$arr[count($arr)-1];
			echo ('
			<img src="http://'.$_SERVER['HTTP_HOST'].'/'.$name.'.'.$type.'?'.rand().'" />
			<input name="imgName['.$id.']" type="hidden" value="'.$name.'">
			');
		}
	}
	public function crop()
	{
		$height=200;
        $file=SITE_PATH. DS. 'images'.DS.'pictures'.DS.'big'.DS.'21'.DS.'42.jpg';
		list($w_i, $h_i, $type) = getimagesize($file);
		if($height>$h_i)
			return;
		echo $w_i.'*'.$h_i;
		$img=imagecreatefromjpeg($file);
		$y=($w_i-$height)/2;
		echo $y;
		$img_o = imagecreatetruecolor($w_i, $height);
		imagecopy($img_o, $img, 0, 0, 0, $y, $w_i, $height);
		imagejpeg($img_o, SITE_PATH. DS. 'images'.DS.'pictures'.DS.'big'.DS.'21'.DS.'48.jpg');

	}

	public function ajax()
	{
		switch($_REQUEST['action'])
		{
			case "addRubrics":
                $model = new rubrics_model();
                $model -> insert();
                $id = mysql_insert_id();
                echo ('
                <tr>
                    <td>
                        <input name="postrubrics[][rubric_id]" type="checkbox" value="'.$id.'">
                    </td>
                    <td>
                        '.$_POST['rubrics']['rubric_name'].'
                    </td>
                </tr>
                ');
                exit;
			break;
		}
	}
}
?>