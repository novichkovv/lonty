<?php
class admin_controller extends controller
{
	public function index($vars='')
	{
		$this->styles=array('admin, style');
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
			{
				$postrubrics_model = new postrubrics_model();

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
	{
		$this->styles=array('admin', 'application');
        $this->scripts=array('jquery', 'ajaxUpload', 'application', 'addpost' );
        $temp = rand();
        $this->t->assign('temp', $temp);
        $posts_model = new posts_model();
       	$posts = $posts_model->getAllWithRels($vars[0]);
       	$rubrics_model = new rubrics_model();
       	$res = $rubrics_model->selectAll();
       	$rubrics = array();
       	foreach($res as $k=>$row)
       	{
       		$rubrics[$row['rubric_id']] = $row['rubric_name'];
       	}
        $this->t->assign('rubrics', $rubrics);
        $this->t->assign('posts', $posts[key($posts)]);
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
            //$post_id=$arr[count($arr)-2];
            $new_img  = 'http://'.$_SERVER['HTTP_HOST'].'/images/pictures/big/'.$_POST['superkey'].'/'.$_POST['key'].'.'.$type;
			echo ('
			<img src="http://'.$_SERVER['HTTP_HOST'].'/'.$name.'.'.$type.'?'.rand().'" />
			<input class="loaded_image_name" form-group="img" name="img" type="hidden" value="'.$name.'" />
			<input type="hidden" name="new_img_name" form-group="img" value="'.$new_img.'" />
			<input type="hidden" name="img_type" form-group="img" value="'.$type.'" />
			');
			exit;
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

			case "save_img":
				if(file_exists(SITE_PATH.DS.$_POST['img'].'.'.$_POST['img_type']))
				{
					$new_img = SITE_PATH.DS.'images'.DS.'pictures'.DS.'big'.DS.$_POST['superkey'].DS.$_POST['key'].'.'.$_POST['img_type'];
					if(@copy(SITE_PATH.DS.$_POST['img'].'.'.$_POST['img_type'], $new_img))
					{
						$model = new passages_model();
						$term = "WHERE passage_id='".$_POST['key']."'";
						$_POST['passages']['passage_imgtype'] = $_POST['img_type'];
						$model->update($term);
						echo SITE_DIR.'images/pictures/big/'.$_POST['superkey'].'/'.$_POST['key'].'.'.$_POST['img_type'].'?'.rand();
						($_POST['img_type'] == 'jpg' ? $type = 'gif' : $type = 'jpg');
						if(file_exists(SITE_PATH.DS.'images/pictures/big/'.$_POST['superkey'].'/'.$_POST['key'].'.'.$type))
						{
							unlink(SITE_PATH.DS.'images/pictures/big/'.$_POST['superkey'].'/'.$_POST['key'].'.'.$type);
						}
					}

				}

                exit;
			break;
			case "add_passage":
               // print_r($_POST);
				$model = new passages_model();
				if($_POST['passages']['main'] == 'undefined')$_POST['passages']['main'] = 0;
				if($id = $model->insert())
				{
					$img = SITE_PATH.DS.$_POST['imgname'].'.'.$_POST['passages']['passage_imgtype'];
					$dir = SITE_PATH.DS.'images/pictures/big/'.$_POST['passages']['post_id'].'/';
					if(file_exists($img))
					{
                        if(!file_exists($dir))mkdir($dir, 0777, true);
                        copy($img, $dir.$id.'.'.$_POST['passages']['passage_imgtype']);
                        $file_dir = SITE_DIR.'images/pictures/big/'.$_POST['passages']['post_id'].'/'.$id.'.'.$_POST['passages']['passage_imgtype'];
						($_POST['passages']['passage_imgtype'] == 'jpg' ? $type = 'gif' : $type = 'jpg');
						if(file_exists($dir.$id.'.'.$type))
							unlink($dir.$id.'.'.$type);
						if($_POST['passages']['main'])
						{
							$image = new image();
							$image->load($dir.$id.'.jpg');
							$image->crop(300);
							$image_name = SITE_PATH.DS.'images/pictures/bigCut/';
                            if(!file_exists($image_name))mkdir($image_name,0777,true);
							$image->save($image_name.$_POST['passages']['post_id'].'.jpg');
						}
					}
                    $passage = $model->select_all(array('passage_id'=>$id));
                    $this->t->assign('temp', rand());
                    $this->t->assign('passage', $passage[0]);
                    $this->t->display('admin/ajax_passage.tpl');
				}
				//exit;
			break;
		}
	}

	public function ajaxEditable()
	{
		$table = $_POST['action'];
		$data = key($_POST[$table]).'="'.mysql_real_escape_string($_POST[$table][key($_POST[$table])]).'"';
		$model = $table.'_model';
		$model = new $model;
		$fields = $model->getFields();
		$pk = $fields['pk'];
		$query = 'UPDATE '.$table.' SET '.$data.' WHERE '.$pk.'="'.$_POST['key'].'"';
		$model->query($query);
		echo $_POST[$table][key($_POST[$table])];
		exit;
	}

    public function registrate()
    {
        $this->styles=array('admin');
        $model = new users_model();
        //$model->rules();
        if(isset($_POST['auth']))
        {
            $user = $model->select_all(array('login' => $_POST['login'],'password' => $_POST['password']));
            if($user)
            {
                $_SESSION['user'] = $user;
                header('Location: '.SITE_DIR.'admin/index');
            }
        }
    }
}
?>