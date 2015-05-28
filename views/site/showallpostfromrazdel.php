<?php

use yii\helpers\Html; 
use yii\helpers\Url;
use app\models\WorkWithSubject;
use app\models\Posts;
use app\models\Typepost;



//Вывод название подраздела
$theme=Typepost::find()->where(['id'=>$id])->asArray()->all();
$pr=$theme[0];

echo "<br>";
echo "<h4> Все статьи раздела ".$pr['name_type']."</h4>";


//var_dump($arts);
//die();

foreach ($arts as $el) 
{
//$ids=el["id"];
$pid=$el["id"];	
$title =$el["title"];
$content=$el["content"];
$type_post=$el["type_post"];

$link=Url::to(['site/showpost', 'id' => $pid]);
echo "<p><a href=".$link.">".$title."</a></p>";

}


//$theme=Typepost::find()->where(['id'=>$type_post])->asArray()->all();
//$pr=$theme[0];

//echo "<br>";
//echo "<form class='well'>";
//echo "<h4>".$title."</h4>";
//$link=Url::to(['site/showallpostfromrazdel', 'id' => $pr['id']]);
//echo "<a href=".$link.">Все статьи раздела: ".$pr["name_type"]."</a></li>";
//echo "<p>".$content."</p>";
//echo "</form>";

?>