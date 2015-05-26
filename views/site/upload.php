<?php
use yii\widgets\ActiveForm;
use app\models\WorkWithSubject;
//var_dump($data);
?>
<h4>Добавление материалов в электронную библиотеку</h4>
<?php
if ($iSsuccess==true) 
	{
      echo '<p>Материалы успешно добавленны</p>';
      echo '<p>Если вы желаетете вы можете добавить материалы еще</p>';
	} else 
	{
		echo '<p>Добавьте данные по электронной библиотеке</p>';
	} 
?>

<?php

$md = new WorkWithSubject();
$dataSubject = $md->GetData();


foreach ($dataSubject as &$element): 
$items[$element[id]]=$element[name];
endforeach;

     
$form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]);
?>



<?= $form->field($model, 'subject')->dropDownList($items); ?>
<?= $form->field($model, 'destription')->textArea(['rows' => 2]) ?>
<?= $form->field($model, 'file[]')->fileInput(['multiple' => true]) ?>

 <button>Добавить материал</button>

<?php ActiveForm::end(); ?>