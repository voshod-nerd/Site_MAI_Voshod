<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html; 
use yii\helpers\Url;
use app\models\WorkWithSubject;
use app\models\WorkWithTypeLesson;
use app\models\Professors;
use app\models\Colors;
use app\models\Group;
use yii\jui\DatePicker;
use yii\grid\GridView; 
use app\models\Raspisanie;
use yii\data\ActiveDataProvider;

// получение списка предметов
$md = new WorkWithSubject();
$dataSubject = $md->GetData();
foreach ($dataSubject as &$element): 
$items[$element[id]]=$element[name];
endforeach;

///////////////////

// Получаем список данных типы уроков. 
$md1 = new WorkWithTypeLesson();
$dataLesson = $md1->GetData();
foreach ($dataLesson as &$element): 
$items1[$element[id]]=$element[name].' '.$element[type].' '.$element[sec];
endforeach; 

//// получаем список профессоров
$md2 = new Professors();
$dataPr = $md2->GetData();
foreach ($dataPr as &$element): 
$items2[$element[id]]=$element[surname].' '.$element[name].' '.$element[patronymic];
endforeach; 
// получаем список цветов
$md3 = new Colors();
$dataColor = $md3->GetData();
foreach ($dataColor as &$element): 
$items3[$element[id]]=$element[name_color];
endforeach;
/// получаем список групп
$md4 = new Group();
$dataGroup = $md4->GetData();
foreach ($dataGroup as &$element): 
$items4[$element[id]]=$element[name];
endforeach;



?>



<h4>Редактирование расписания на дд.мм.гггг</h4>
<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]);?>

<?= $form->field($model, 'id_subject')->dropDownList($items)->label('Предмет'); ?>
<?= $form->field($model, 'id_lesson_type')->dropDownList($items1)->label('Тип занятия'); ?>
<?= $form->field($model, 'id_professor')->dropDownList($items2)->label('Преподователь'); ?>
<?= $form->field($model, 'idgroup')->dropDownList($items4)->label('Группа'); ?>
<?= $form->field($model, 'colorid')->dropDownList($items3)->label('Цвет'); ?>
<?= $form->field($model, 'date')->input('date')->label('Дата занятия'); ?>




<button>Добавить</button>
<?php ActiveForm::end(); ?>

<h4>Расписание для #дд.мм.гг</h4>

<?php

$rows=$model->GetData();

// отображение таблицы
echo "<table class='table table-bordered'>";
echo "<tr><th>Пара</th><th>Тип занятия</th><th>Форма обучения</th><th>Предмет</th><th>Преподователь</th><th>Кабинет</th><th>Действие</th></tr>";
foreach ($rows as &$element):
echo "<tr>";
// ссылка для удаления
//$link=Url::to(['site/addraspisanie?id='.$element[id].'']);
//$link = Html::a('action', ['site/addraspisanie', 'id' => $element[id]]);
$url = Url::to(['site/addraspisanie', 'id' => $element[id]]);
echo "<td>".$element[s1]."</td>"."<td>".$element[s2]."</td>"."<td>".$element[s3]."</td>"
."<td>".$element[s4]."</td>"."<td>".$element[s5]."</td>"."<td>".$element[cabinet_number]."</td>"
."<td><a href='".$url."'>Удалить</a></td>";

echo "</tr>";
endforeach;
echo "<table>";

//$query = Raspisanie::find(); Raspisanie::find()
//$listpost = $query->orderBy('id')->all();
///$dataProvider = new ActiveDataProvider([
//    'query' => $rows,
//    'pagination' => [
//        'pageSize' => 20,
//    ],
//]);



//echo  GridView::widget([
//    'dataProvider' => $dataProvider,    
//    ]);


?>



