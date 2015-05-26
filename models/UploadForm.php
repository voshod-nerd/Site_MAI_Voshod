<?php
namespace app\models;


use Yii;
use yii\base\Model;
use yii\db\Connection;
use yii\db\Query;


class UploadForm extends Model
{
    /**
     * @var UploadedFile|Null file attribute
     */
    public $file;
    public $destription="Добавьте описание к прикрепляемому документу";
    public $subject="Предмет";


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['file'], 'file', 'maxFiles' => 10], // <--- here!
        ];
    }


    public function onlysave($subject,$destription,$file,$path) 
    {

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

    }



public function GetData() 
{
$db = new Connection([
    'dsn' => 'mysql:host=localhost;dbname=yii2',
    'username' => 'yii2',
    'password' => '19800123',
    'charset' => 'utf8',
]);

//$data =$db->createCommand()->select('subject, destription, filename,path,dateadd')->from('downloadfiles')->queryRow();

return $data =$db->createCommand('select * from downloadfiles')->queryAll();

}


}

 ?>