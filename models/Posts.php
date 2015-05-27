<?php

namespace app\models;


use Yii;
use yii\base\Model;
use yii\db\Connection;
use yii\db\ActiveRecord;


class Posts extends ActiveRecord
{

public $title;
public $content;
public $dateadd;
public $type_post;



public static function tableName()
    {
        return 'posts';
    }



public function rules()
    {

    	return 
    	[
    	['id', 'unique'],
    	[['id', 'title', 'content', 'dateadd','type_post'], 'required'],
    	];

	}

public function SaveData($title,$content,$type_post,$dateadd) 
{


$db = new Connection([
    'dsn' => 'mysql:host=localhost;dbname=yii2',
    'username' => 'yii2',
    'password' => '19800123',
    'charset' => 'utf8',
]);

$db->createCommand()->insert('posts', [
    'title' => $title,
    'content' => $content,
    'dateadd'=>$dateadd,
    'type_post'=>$type_post
])->execute();


}


}

