<?php
namespace app\models;


use Yii;
use yii\base\Model;
use yii\db\Connection;
use yii\db\Query;


class WorkWithSubject extends Model
{
    

    public function SaveSubject($subjects) 
    {
/*
$db = new Connection([
    'dsn' => 'mysql:host=localhost;dbname=yii2',
    'username' => 'yii2',
    'password' => '19800123',
    'charset' => 'utf8',
]);

$db->createCommand()->insert('downloadfiles', [
    'subject' => $subject,
    'destription' => $destription,
    'filename' =>$file,
    'path'=>$path,
    'dateadd'=>date("m.d.y")
])->execute();
*/
    }



public function GetData() 
{
$db = new Connection([
    'dsn' => 'mysql:host=localhost;dbname=yii2',
    'username' => 'yii2',
    'password' => '19800123',
    'charset' => 'utf8',
]);

return $data =$db->createCommand('select * from subject')->queryAll();

}


}

 ?>