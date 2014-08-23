<?php
/**
 * Created by PhpStorm.
 * User: пк
 * Date: 22.08.14
 * Time: 17:15
 */
class users_model extends Model
{
    function __construct()
    {
        $this->getClassName(__CLASS__);
        $this->selectTable('users');
        $this->selectDb('lonty');
        $this->fields = $this->fields();
    }
    public function rules()
    {
//        return array(
//            'login'=>array('require',
//            array('max'=>'10'),
//            array('min'=>'3'),
//            array('preg'=>array('engInt')),
//            ),
//            'password'=>array(
//                array('max'=>'20'),
//                array('min'=>'6'),
//                'password',
//            ),
//            );
    }
    public function attributes()
    {
        return array(
            'login'=>'Логин',
            'password' => 'Пароль',
            'name' => 'Имя',
            'surnmae' => 'Фамилия',
            'email' => 'E-mail',
        );
    }
    public static function fields()
    {
        $fields=array(
            'id'=>'id',
            'login'=>'login',
            'password'=>'password',
            'name'=>'name',
            'surname'=>'surname',
            'email'=>'email',
            'cdate'=>'cdate'
        );
        return $fields;
    }
    public static function relations()
    {
    }
}
?>