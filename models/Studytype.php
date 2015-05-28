<?php

namespace app\models;


use Yii;
use yii\base\Model;
use yii\db\Connection;
use yii\db\ActiveRecord;


class Studytype extends ActiveRecord
{

public $stydytype;




public static function tableName()
    {
        return 'studytype';
    }



public function rules()
    {

    	return 
    	[
    	['id', 'unique'],
    	[['id', 'stydytype'], 'required'],
    	];

	}

public function SaveData($stydytype) 
{

$db = new Connection([
    'dsn' => 'mysql:host=localhost;dbname=yii2',
    'username' => 'yii2',
    'password' => '19800123',
    'charset' => 'utf8',
]);

$db->createCommand()->insert('Studytype', [
    'stydytype' => $stydytype   
])->execute();


}

public function GetData() 
{
$db = new Connection([
    'dsn' => 'mysql:host=localhost;dbname=yii2',
    'username' => 'yii2',
    'password' => '19800123',
    'charset' => 'utf8',
]);
$sqltext="select * from studytype";
return $data =$db->createCommand($sqltext)->queryAll(); 


}


}

