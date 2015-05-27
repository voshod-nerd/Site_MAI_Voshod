<?php

namespace app\models;
use Yii;
use yii\base\Model;
use yii\db\Connection;
use yii\db\ActiveRecord;

class TypePost extends ActiveRecord
{


public $name_type;

public static function tableName()
    {
        return 'typepost';
    }

public function rules()
    {

        return 
        [
        ['id', 'unique'],
        [['id', 'name_type'], 'required'],
        ];

    }



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

return $data =$db->createCommand('select * from typepost')->queryAll();
}		
		
		
}