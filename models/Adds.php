<?php

namespace app\models;


use Yii;
use yii\base\Model;
use yii\db\Connection;
use yii\db\ActiveRecord;

class Posts extends ActiveRecord
{

public $text="Adds";

public function Save($html) 
{
//echo $html;

$db = new Connection([
    'dsn' => 'mysql:host=localhost;dbname=yii2',
    'username' => 'yii2',
    'password' => '19800123',
    'charset' => 'utf8',
]);

$db->createCommand()->insert('posts', [
    'title' => 'first_title',
    'content' => $html,
    'dateadd'=>date("m.d.y")
])->execute();


}

public function RertieveData() 
		{
		$countries = Posts::find()

		}

}

