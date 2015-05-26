<?php

namespace app\models;
use Yii;
use yii\base\Model;
use yii\db\Connection;
use yii\db\ActiveRecord;

class Type_Post extends ActiveRecord
{


public $name_type;




public function SaveData($html) 
{
//echo $html;

$db = new Connection([
    'dsn' => 'mysql:host=localhost;dbname=yii2',
    'username' => 'yii2',
    'password' => '19800123',
    'charset' => 'utf8',
]);

//$db->createCommand()->insert('raspisanie', [
//    'title' => 'first_title',
//    'content' => $html,
//    'dateadd'=>date("m.d.y")
//])->execute();


}



public function GetData() 
{
$db = new Connection([
    'dsn' => 'mysql:host=localhost;dbname=yii2',
    'username' => 'yii2',
    'password' => '19800123',
    'charset' => 'utf8',
]);

return $data =$db->createCommand('select * from type_post')->queryAll();
}		
		
		
}