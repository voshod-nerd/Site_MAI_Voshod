<?php

namespace app\models;
use Yii;
use yii\base\Model;
use yii\db\Connection;
use yii\db\ActiveRecord;

class Group extends ActiveRecord
{


public $name;

public function SaveData() 
{


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

return $data=$db->createCommand('select * FROM `group`')->queryAll();
}		
		
		
}

