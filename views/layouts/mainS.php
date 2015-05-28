<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;
use app\models\TypePost;
use app\models\Posts;
/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
 
 <header id="header">
            <div class="nav-holder">
    <a href="#" class="link">link</a>
    <nav id="nav">
        <ul>
   
<?php
 //<li>
// Получение всех разделов
// get all the razdeli 
$razdeli =TypePost::find()->asArray()->all();
// show the results


foreach($razdeli as $element) 
{
echo "<li>"; 

$tx = $element['name_type'];
//var_dump($tx);
//die();

echo "<a href=''>".$tx."</a>";
echo "<div class='slide-holder'>";
echo "<div class='slide-frame'>";
// распеечатка подразделов данного раздела
$podrazdeli=Posts::find()->where(['type_post'=>$element['id']])->asArray()->all();
foreach ($podrazdeli as $el) 
{
echo "<ul>";
$link=Url::to(['site/showpost', 'id' => $el['id']]);
$text=$el['title'];
echo "<li><a href=".$link.">".$text."</a></li>"; 
echo "</ul>"; 
}
echo "</div>";
echo "</div>";
echo "</li>";



}
?>

    
</ul>

   
</div>
</div>
</ul>
 </header>

<div class="container">
<div class="row">
            
            <div class="col-md-12">
       <?= Html::img('images/newhead.jpg', ['alt'=>'some', 'class'=>'img-rounded']);?> </div>           
</div>



    
         <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <div class="well">
            <?= $content ?>
            <div>


<div class="row">
 
<div class="col-md-12">
<a href=<?php echo Url::to(['site/shedule']); ?>><?= Html::img('assets/img/bg-index-button1.jpg', ['alt'=>'some', 'class'=>'img-rounded']);?></a>
<?= Html::img('assets/img/bg-index-button2.png', ['alt'=>'some', 'class'=>'img-rounded']);?>  
<a href=<?php echo Url::to(['site/showlibrary']); ?>><?= Html::img('assets/img/bg-index-button3.jpg', ['alt'=>'some', 'class'=>'img-rounded']);?></a> 
<?= Html::img('assets/img/bg-index-button4.png', ['alt'=>'some', 'class'=>'img-rounded']);?>   
</div>
</div>





    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; My Company <?= date('Y') ?></p>
            <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </footer>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
