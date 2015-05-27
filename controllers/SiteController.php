<?php
namespace app\controllers;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Posts;
use yii\web\UploadedFile;
use app\models\UploadForm;
use app\models\Raspisanie;
use app\controllers\DateTime;
use yii\helpers;



class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
    public function actionIndex()
    {
        $this->layout='//mainS';
        return $this->render('index');
    }
    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }
    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');
            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }
    public function actionAbout()
    {
        return $this->render('about');
    }
	
/////////////////////////////////////////////
public function actionAdd()
    { 
        $model = new Posts();
       $this->layout='//adminka';
       
        if ($model->load(Yii::$app->request->post())) 
        {
        $form = Yii::$app->request->post('Posts');
       
        $model->saved($form['text']);
        }
               $query = Posts::find();
              
              
               $listpost = $query->orderBy('dateadd')->all();
              
               return  $this->render('add',['model'=>$model,'listpost' => $listpost]);
         
    }
//////////////////////////////////////////
////////////// Показ расписания
public function actionShedule() 
{
$this->layout='//mainS';
return $this->render('showshedule');
}
/////////////
/////// Показ библиотеки///////////////////////////////////////
public function actionShowlibrary() 
{
  $this->layout='//mainS';
  $model = new UploadForm();
  $data=$model->GetData();
return $this->render('showlibrary', ['model' => $model,'data'=>$data]);
}
////////////////////////////////////////////////////////////////
/// Части посвященные Админки
 public function actionUpload()
    {
        $model = new UploadForm();
         $this->layout='//adminka';
        if (Yii::$app->request->isPost) {
            $model->file = UploadedFile::getInstances($model, 'file');
            
            if ($model->file && $model->validate()) {
              
                foreach ($model->file as $file) {
                        
                        $randValue=mt_rand(); 
                        $form = Yii::$app->request->post('UploadForm');
                        $filename=$randValue.'.'. $file->extension;
                       // $pathfile='uploads/' . $file->baseName . '.' . $file->extension;
                         $pathfile='uploads/' .$randValue. '.' . $file->extension;
                        $model->onlysave($form['subject'],$form['destription'],$filename,$pathfile);
                    $file->saveAs('uploads/' .$randValue.'.'. $file->extension);
                }
            }
            $data=$model->GetData();         
            return $this->render('upload', ['model' => $model,'data'=>$data,'iSsuccess'=>true]); 
        } 
        else 
            {
         
            $data=$model->GetData();         
            return $this->render('upload', ['model' => $model,'data'=>$data]); 
            }
    }
 //   Добавление материалов сайта
    public function actionAddcontent() 
{
        $model = new Posts();
        $this->layout='//adminka';
       
        if ($model->load(Yii::$app->request->post())) 
        {
        $model = new Posts();
        $form = Yii::$app->request->post('Posts');
        $model->title=$form['title'];
        $model->content=$form['content'];
        /// получение текущей даты
        $date = new \DateTime();
        $model->dateadd=$date;

      
        $model->type_post=$form['type_post'];
        // сохранение которое не работает
        $model->save();
        // Изза того что Save не работает пишу это 
        $model->SaveData($form['title'],$form['content'],$form['type_post'],$date->format('Y-m-d'));
//$newDate->format('d/m/Y');
        }
               $query = Posts::find();
              
              
               $listpost = $query->orderBy('dateadd')->all();
              
               return  $this->render('addcontent',['model'=>$model,'listpost' => $listpost]);
        
    }
// Добавление редактирование расписания 
public function actionAddraspisanie()
{
 //$model = new Raspisanie();   
 //$this->layout='//adminka';
 //return $this->render('addraspisanie',['model'=>$model]);
        $model = new Raspisanie();
        $this->layout='//adminka';
       
        if ($model->load(Yii::$app->request->post())) 
        {
        $form = Yii::$app->request->post('Raspisanie');
        $model->date=$form['date'];
        $model->id_lesson_type=$form['id_lesson_type'];
        $model->id_subject=$form['id_subject'];
        $model->id_professor=$form['id_professor'];
        $model->id_subject=$form['id_subject']; 
        $model->colorid=$form['colorid']; 
        $model->idgroup=$form['idgroup']; 
        $model->Save();    
        }
        else   
                    {
                           $id = Yii::$app->request->get('id');
                           //var_dump($id);
                           //die();
                           if ($id>0)  
                           {
                            // удаление записи 
                            $deleteitem = Raspisanie::find()->where(['id' => $id])->one();
                            $deleteitem->delete(); // удаляем строку из таблицы
                           } 

                    }
               $query = Raspisanie::find();
               $dataRasp = $query->orderBy('id')->all();
             return  $this->render('addraspisanie',['model'=>$model,'dataRasp' => $dataRasp]);
}
// вывод главного страницы админки
public function actionAdmin() 
{
$this->layout='//adminka';
return $this->render('admin');
}
	
}