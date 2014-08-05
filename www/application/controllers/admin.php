<?php
class admin_controller extends controller
{
	public function index($vars='')
	{
		$this->styles=array('admin','ewefrfwf','efwarg');
        $this->scripts=array('admin','ewefrfwf','efwarg');
		$this->title='ЛОНТИ - самые любопытные вещи, явления и истории из веба';
  		$model = new posts_model;
  		$posts = $model->getPostsList();
  		$this->t->assign('posts', $posts);
	}
	public function addpost($vars = '')
	{
		$post_model = new posts_model();
		if(isset($vars[0]))$id = $vars[0];
		if(isset($id))
		{
			$item = $post_model->getPost($id);
			$post = array();
			foreach($item as $k=>$row)
			{
				foreach($row as $key => $vol)
				{
					if($key=='name' || $key=='epilog' || $key=='prolog' || $key=='date')
						$post[$key] = $vol;
					if($key=='header' || $key=='img' || $key=='text' || $key=='pa_id' || $key=='main')
					 {
					 	$post['passage'][$row['pa_id']][$key] = $vol;
	                 }
					if($key=='rubric_id')
						$post['rubric'][$row['rubric_id']] = $row['rubric_name'];

				}
			}
		}
		$this->scripts=array('jquery', 'ajaxUpload', 'addpost');
		$this->styles=array('admin');
		$rubrics=new rubrics_model();
		if(isset($_POST['addPostButton']))
		{
			$passage=new passages_model();
			$postrubrics=new postrubrics_model();
			if(!$id)
			{
				$_POST['posts']['post_date']=date('Y-m-d H:i:s');
				$post_model->insert();
				$id=mysql_insert_id();
			}
			else
			{
				$query = $post_model->update("WHERE post_id = '$id'");
			}
			$passages=$_POST['passages'];
			foreach($passages as $key=>$vol)
			{
				$_POST['passages']=$vol;
				$_POST['passages']['post_id']=$id;
				if(!isset($vol['passage_id']))
				{
					$passage->insert();
					$passage_id=mysql_insert_id();
				}
				else
				{
					$passage_id = $vol['passage_id'];
					$passage->update("WHERE passage_id = '$passage_id'");
				}

				$file=SITE_PATH. DS. 'images'.DS.'pictures'.DS.'temp'.DS.'temp'.$_POST['temp'].$key.'.'.$_POST['passages']['passage_imgtype'];
				if(file_exists($file))
				{
					$image=new image;
					$image->load($file);
					$folder=SITE_PATH.DS.'images'.DS.'pictures'.DS.'big'.DS.$id.DS.'';

					if(!file_exists($folder))
						mkdir($folder, 0777, true);
					copy($file, $folder.$passage_id.'.'.$_POST['passages']['passage_imgtype']);
					$folder=SITE_PATH.DS.'images'.DS.'pictures'.DS.'cut'.DS.$id.DS.'';
					if(!file_exists($folder))
						mkdir($folder, 0777, true);
					if($_POST['passages']['passage_imgtype'] == 'jpg')
					{
						$image->resizeToWidth(570);
						$image->crop(192);
						$image->save($folder.$passage_id.'.'.$_POST['passages']['passage_imgtype']);
					}


				}
			}
			$rubs=$_POST['postrubrics'];
			if($vars[0])
			{
				foreach($post['rubric'] as $rubric_id=>$vol)
				{
					if(!in_array($rubric_id, $_POST['postrubrics']))
						$postrubrics->deletePostRubric($vars[0], $rubric_id);

				}
			}
			foreach($rubs as $key=>$vol)
			{
				$_POST['postrubrics']=$vol;
				$_POST['postrubrics']['post_id']=$id;
				if(!array_key_exists($vol['rubric_id'], $post['rubric']))
				$postrubrics->insert();
			}
			header('location: ');
		}
		$rubs=$rubrics->selectAll();
		$postInfo = array();
		if(isset($id))
		$this->view('addpost', array('rubrics'=>$rubs,
									 'post' => $post,
									 'id' => $id
									 ));
		else $this->view('addpost', array('rubrics'=>$rubs));
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
}
?>