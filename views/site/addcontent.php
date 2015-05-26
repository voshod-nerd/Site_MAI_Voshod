<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use dosamigos\ckeditor\CKEditor; 
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditorInline; 
use app\models\Type_Post;
?>


<h4>Добавление статей на сайт</h4>
<ul>
<?php foreach ($listpost as $element): ?>
    <li>
        <?= 
             $element->content;  
        
        ?>
       
    </li>
<?php endforeach; ?>
</ul>




<?php 
// получение списка разделов
$md = new Type_Post();
$data = $md->GetData();

//var_dump($data);
//die();


foreach ($data as &$element): 
$items[$element[id]]=$element[name_type];
endforeach;

//echo $model->name;

 $form = new ActiveForm();
 $form = ActiveForm::begin(); 

?>

<?= $form->field($model, 'title')->input('text')->label('Наименование подраздела'); ?>


<?= $form->field($model, 'type_post')->dropDownList($items)->label('Выбирите раздел'); ?>
<?= $form->field($model, 'content')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'full'
    ])->label('Содержимое заметки'); 
    ?>
<?php 


 ActiveForm::end(); 


?>

