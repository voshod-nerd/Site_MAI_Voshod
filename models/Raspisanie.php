<?php

namespace app\models;
use Yii;
use yii\base\Model;
use yii\db\Connection;
use yii\db\ActiveRecord;

class Raspisanie extends ActiveRecord
{


public $id_subject;
public $id_professor;
public $cabinet_number;
public $colorid;
public $date;
public $id_lesson_type;
public $idgroup;


public function SaveData($html) 
{
//echo $html;

$db = new Connection([
    'dsn' => 'mysql:host=localhost;dbname=yii2',
    'username' => 'yii2',
    'password' => '19800123',
    'charset' => 'utf8',
]);

$db->createCommand()->insert('raspisanie', [
    'title' => 'first_title',
    'content' => $html,
    'dateadd'=>date("m.d.y")
])->execute();


}

public function RertieveData() 
		{
		 $datarow = Raspisanie::find();
         return $datarow;
		}

}

