<?php
use yii\widgets\ActiveForm;
use app\models\WorkWithSubject;
//var_dump($data);
?>


<h1>Записи электронной библиотеки</h1>
<ul>
<?php foreach ($data as &$element): ?>
    <li>
    	<?php echo $element[subject]; ?>
       	<?php echo $element[destription];?>
        <?php echo $element[filename];?>
       	<a href="<?php echo $element[path]; ?>">Сылка</a>
        <?php echo $element[dateadd]; ?>
    </li>
<?php endforeach; ?>
</ul>