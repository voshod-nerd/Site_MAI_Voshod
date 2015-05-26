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
		
		
$sqltext ='SELECT id,date,(SELECT name FROM lesson_type WHERE id=id_type_study) as s1,
(SELECT type FROM lesson_type WHERE id=id_type_study) as s2,
(SELECT (select stydytype from studytype where id=id_type_study) AS sec FROM lesson_type WHERE id=id_type_study) as s3,
 (SELECT name FROM subject s WHERE id=id_subject) as s4,
 (SELECT surname FROM professors  WHERE id=id_professor) as s5,
 (SELECT name_color FROM colors  WHERE id=colorid) as s6,
  (SELECT name FROM `group`  WHERE id=idgroup) as s7,cabinet_number 
  FROM raspisanie'; 		

$db = new Connection([
    'dsn' => 'mysql:host=localhost;dbname=yii2',
    'username' => 'yii2',
    'password' => '19800123',
    'charset' => 'utf8',
]);

		return $data =$db->createCommand($sqltext)->queryAll();  
		
		
		
		}

}

