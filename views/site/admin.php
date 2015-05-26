
<?php

use yii\heplers\Html;
use yii\helpers\Url;
?>

<h4>1) Редакцирование содержимого электронной библиотеки</h4>
<a href=<?php echo Url::to(['site/upload']); ?>>Перейти к добавлению материалов электронной библиотеки</a>

<h4>2) Редактирование  материалов сайта</h4>
<a href=<?php echo Url::to(['site/addcontent']); ?>>Перейти к редактирования материлов сайта</a>

<h4>3) Редактирование расписания</h4>
<a href=<?php echo Url::to(['site/addraspisanie']); ?>>Перейти к редактированию расписания</a>