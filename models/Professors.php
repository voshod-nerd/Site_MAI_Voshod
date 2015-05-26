<?php

namespace app\models;
use Yii;
use yii\base\Model;
use yii\db\Connection;
use yii\db\ActiveRecord;

class Professors extends ActiveRecord
{


public $surname;
public $name;
public $patronymic;



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

public function RertieveData() 
		{
		 $datarow = Professors::find();
         return $datarow;
		}

public function GetData() 
{
$db = new Connection([
    'dsn' => 'mysql:host=localhost;dbname=yii2',
    'username' => 'yii2',
    'password' => '19800123',
    'charset' => 'utf8',
]);

return $data =$db->createCommand('select * from professors')->queryAll();
}		
		
		
}

