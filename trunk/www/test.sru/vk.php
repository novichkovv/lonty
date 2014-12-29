<?php
echo $_GET['access_token'];
class vk {

	private $token;
	private $app_id;
	//ID группы или страницы пользователя
	private $group_id;
	//вероятность публикации поста на стену
	private $delta;
	public function __construct( $token, $delta, $app_id, $group_id ) {
		$this->token = $token;
		$this->delta = $delta;
		$this->app_id = $app_id;
		$this->group_id = $group_id;
	}
	//постинг на стену
	public function post( $desc, $photo, $link ) {
		if( rand( 0, 99 ) < $this->delta ) {
			$data = json_decode(
						$this->execute(
							'wall.post',
							array(
								'owner_id' => $this->group_id,
								'from_group' => 1,
								'message' => $desc,
								'attachments' => 'photo-' . $this->group_id . '_' . $photo . ',' . $link
							)
						)
					);
			if( isset( $data->error ) ) {
				return $this->error( $data );
			}
			return $data->response->post_id;
		}
		return 0;
	}
	//создание альбома
	public function create_album( $name, $desc ) {
		$data = json_decode(
					$this->execute(
						'photos.createAlbum',
						array(
							'title' => $name,
							'gid' => $this->group_id,
							'description' => $desc,
							'comment_privacy' => 1,
							'privacy' => 1
						)
					)
				);
		if( isset( $data->error ) ) {
			return $this->error( $data );
		}
		return $data->response->aid;
	}
	//получение кол-ва фотографий в альбоме
	public function get_album_size( $id ) {
		$data = json_decode(
					$this->execute(
						'photos.getAlbums',
						array(
							'oid' => -$this->group_id,
							'aids' => $id
						)
					)
				);
		if( isset( $data->error ) ) {
			return $this->error( $data );
		}
		return $data->response['0']->size;
	}
	//загрузка фотографии
	public function upload_photo( $file, $album_id, $desc ) {
		$data = json_decode(
					$this->execute(
						'photos.getUploadServer',
						array(
							'aid' => $album_id,
							'gid' => $this->group_id,
							'save_big' => 1
						)
					)
				);
		if( isset( $data->error ) ) {
			return $this->error( $data );
		}
		$ch = curl_init( $data->response->upload_url );
		curl_setopt ( $ch, CURLOPT_HEADER, false );
		curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
		curl_setopt ( $ch, CURLOPT_SSL_VERIFYPEER, false );
		curl_setopt ( $ch, CURLOPT_POST, true );
		curl_setopt ( $ch, CURLOPT_POSTFIELDS, array( 'file1' => '@' . $file ) );
		$data = curl_exec($ch);
		curl_close($ch);
		$data = json_decode( $data );
		if( isset( $data->error ) ) {
			return $this->error( $data );
		}
		$data = json_decode(
					$this->execute(
						'photos.save',
						array(
							'aid' => $album_id,
							'gid' => $this->group_id,
							'server' => $data->server,
							'photos_list' => $data->photos_list,
							'hash' => $data->hash,
							'caption' => $desc
						)
					)
				);
		if( isset( $data->error ) ) {
			return $this->error( $data );
		}
		return $data->response['0']->pid;
	}
	private function execute( $method, $params ) {
		$ch = curl_init( 'https://api.vk.com/method/' . $method . '?access_token=' . $this->token );
		
		curl_setopt ( $ch, CURLOPT_HEADER, false );
		curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
		curl_setopt ( $ch, CURLOPT_SSL_VERIFYPEER, false );
		curl_setopt ( $ch, CURLOPT_POST, true );
		curl_setopt ( $ch, CURLOPT_POSTFIELDS, $params );
		$data = curl_exec($ch);
		curl_close($ch);
		return $data;
	}
	private function error( $data ) {
		var_dump($data);
		//обработка ошибок
		return false;
	}
}
$token = 'a55e114b9165d943b6ad320b2967fc7f1404aaac6ed09c61f4a7cbc97d6bb08e04fd4b216bbe1c79d2174';
$delta = '97';
$app_id = '4541587';
$group_id = '76820816';
$vk = new vk( $token, $delta, $app_id, $group_id );
//Допустим альбом уже создан, проверим не переполнен ли он
/*$vk_album = '{{ID альбома}}';
if( $vk->get_album_size( $vk_album ) > 400 ) {
	//если переполнен, более 400 фоток
	//то создаём новый
	$vk_album = $vk->create_album( '{{название альбома}}', '{{описание альбома}}' );
}
//загружаем фотографию
$vk_photo = $vk->upload_photo('{{путь до фотографии на сервере}}', $vk_album, '{{описание фотки}}' );
//пишем пост на стену
*/
$vk_post = $vk->post(' Приветик! ','','');
var_dump($vk_post);