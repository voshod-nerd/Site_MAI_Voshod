<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use app\models\Group;
use yii\helpers\ArrayHelper;
use app\models\Studytype;



$groups=Group::find()->asArray()->all();
$typeStudy=Studytype::find()->asArray()->all();

///
foreach ($groups as &$element): 
$itemsGr[$element[id]]=$element[name];
endforeach; 


foreach ($typeStudy as &$element): 
$itemsStudy[$element[id]]=$element[stydytype];
endforeach; 


$model=  new Studytype;
//$dd= Studytype::find()->all();
//var_dump($dd);
//die();

echo 'Отделение '.Html::DropDownList('stydytype',null,$itemsStudy).' группа '. Html::DropDownList('groups',null,$itemsGr);







?>
<br>
<br>
<div class="row">
	<div class="col-md-6">
<table border="1"  style="width:500px">
	
		<tr>
			<td>пн</td>
			<td>дд.мм</td>
			<td>дд.мм</td>
			<td>дд.мм</td>
			<td>дд.мм</td>
			<td>дд.мм</td>
			<td>дд.мм</td>
		</tr>
		<tr>
			<td>1-2</td>
			<td rowspan="2" background="assets/img/laba-green.jpg" >&nbsp;</td>
			<td background="assets/img/praktika-green.jpg">&nbsp;</td>
			<td background="assets/img/lection-green.jpg">&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>3-4</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>5-6</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>7-8</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
	
</table>
</div>

<div class="col-md-6">
<table border="1" cellpadding="1" cellspacing="1" style="width:500px">
	<tbody>
		<tr>
			<td>Дисциплины</td>
			<td>Преподователи</td>
			<td>Цвет</td>
		</tr>
		<tr>
			<td>АЦВУ</td>
			<td>Просочкин А.С</td>
			<td background="assets/img/lection-green.jpg">&nbsp;</td>
		</tr>
		<tr>
			<td >&nbsp;</td>
			<td >&nbsp;</td>
			<td>&nbsp;</td>
		</tr>
	</tbody>
</table>

</div>
</div>