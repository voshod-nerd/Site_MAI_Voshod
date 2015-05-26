<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;
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
    <li><a href="">Абитуриентам</a>
        <div class="slide-holder">
            <div class="slide-frame">
                  <ul>
                      <li><a href="<?php echo Url::to(['site/add']);?>">График вступительных экзаменов</a></li>
                      <li><a href="">Информация для обладателей образовательных грандов Республики Казахстан</a></li>
                      <li><a href="">Квота приема лиц, имеющих особые права при поступлении</a></li>
                      <li><a href="">План приема на бюджетные места</a></li>
                      <li><a href="">План приема на платные места</a></li>


                  </ul>
                  <ul>
                     <li><a href="">Дополнительное образование</a></li>
                      <li><a href="">Особые права поступающих в МАИ в 2015 году</a></li>
                      <li><a href="">Направления подготовки (специальности)</a></li>
                      <li><a href="">Перечень вступительных испытаний на направления подготовки и специальности филиала «Восход» МАИ</a></li>
                     
                  </ul>
                  <ul>
                     <li><a href="">Документы, предоставляемые в приемную комиссию</a></li>
                      <li><a href="">Нижняя граница ЕГЭ</a></li>
                      <li><a href="">Результаты вступительных экзаменов</a></li>
                  </ul>
            </div>
        </div>
    </li>
    <li><a href="">Студентам</a>
        <div class="slide-holder">
            <div class="slide-frame">
                  <ul>
                      <li><a href="">Успеваемость</a></li>
                      <li><a href="">Расписание дневного отделения</a></li>
                      <li><a href="">Расписание вечернего отделения</a></li>
                      <li><a href="">Электронные ресурсы</a></li>
                      <li><a href="">Факультеты</a></li>
                      
                  </ul>
                  <ul>
                      <li><a href="/5139e522d28558944599453f91de05a8">Творческие коллективы (КВН, музыкальные группы)</a></li>
                      <li><a href="/elektronnye_resursy">Профсоюз студентов </a></li>
                      
                  </ul>
                 
                  
                
            </div>
        </div>
    </li>
    <li><a href="">Сотрудникам </a>
        <div class="slide-holder">
            <div class="slide-frame">
                  <ul>
                      <li><a href="">Администрация филиала</a></li>
                      <li><a href="">Ученый совет</a></li>
                      <li><a href="">Телефонный справочник</a></li>
                      <li><a href="">Реквизиты</a></li>
                      <li><a href="">Материальная база</a></li>
                      <li><a href="">Встречи выпускников</a></li>
                      <li><a href="">Конкурсы и вакансии</a></li>
                      <li><a href="">История</a></li>
                  </ul>
                 
            </div>
        </div>
    </li>
    <li><a href="">Новости</a>
        <div class="slide-holder">
            <div class="slide-frame">
                  <ul>
                      <li><a href="/heads">Новости Филиала</a></li>
                     
                  </ul>
                  
            </div>
        </div>
    </li>
    <li><a href="">Обьявления</a>
        <div class="slide-holder">
            <div class="slide-frame">
                  <ul>
                      <li><a href="/nsudetails">Текущие обьявления</a></li>
                     
                  </ul>
                 
                 
            </div>
        </div>
    </li>
    <li><a href="">Контакты</a>
        <div class="slide-holder">
            <div class="slide-frame">
                  <ul>
                      <li><a href="/press">Контакты дирекции</a></li>
                      <li><a href="/news">Контакты приемной комиссии</a></li>
                     
                  </ul>
                
            </div>
        </div>
    </li>
    <li><a href="">Войти</a>
        <div class="slide-holder">
            <div class="slide-frame">
                  <ul>
                      <li><a href="/press">Войти</a></li>
                      <li><a href="/news">Зарегестрироваться</a></li>
                     
                  </ul>
                
            </div>
        </div>
    </li>
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
            <?= $content ?>
       


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
