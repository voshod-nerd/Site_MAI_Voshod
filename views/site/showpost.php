<?php

use yii\helpers\Html; 
use yii\helpers\Url;
use app\models\WorkWithSubject;
use app\models\Posts;
use app\models\Typepost;


foreach ($podrazdel as $el) 
{

$title =$el["title"];
$content=$el["content"];
$type_post=$el["type_post"];
}

$theme=Typepost::find()->where(['id'=>$type_post])->asArray()->all();
$pr=$theme[0];

echo "<br>";
echo "<form class='well'>";
echo "<h4>".$title."</h4>";
$link=Url::to(['site/showallpostfromrazdel', 'id' => $pr['id']]);
echo "<a href=".$link.">Все статьи раздела: ".$pr["name_type"]."</a>";
echo "<p>".$content."</p>";
echo "</form>";

?>