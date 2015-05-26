<?php
namespace app\models;


use Yii;
use yii\base\Model;
use yii\db\Connection;
use yii\db\Query;


class WorkWithTypeLesson extends Model
{
public function GetData() 
{
$db = new Connection([
    'dsn' => 'mysql:host=localhost;dbname=yii2',
    'username' => 'yii2',
    'password' => '19800123',
    'charset' => 'utf8',
]);

return $data =$db->createCommand('SELECT id,(select stydytype from studytype where id=id_type_study) as sec,name,type FROM `lesson_type` ')->queryAll();
}
}

?>