<?php

namespace app\models;


use Yii;
use yii\base\Model;
use yii\db\Connection;
use yii\db\ActiveRecord;

class Posts extends ActiveRecord
{

public $content="Adds";
public $title;
public $dateadd;
public $type_post;




public function saved($html) 
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
	'type_post'=>'Cтудентам',
    'dateadd'=>date("m.d.y")
])->execute();

}

}

