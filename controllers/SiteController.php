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
	
 /////////////////////////////////////////   
	public function actionAddcontent() 
{


 $model = new Posts();
       $this->layout='//adminka';
       
        if ($model->load(Yii::$app->request->post())) 
        {
        $form = Yii::$app->request->post('Posts');
       
        //$model->saved($form['text']);
        $model->Save();
        }

               $query = Posts::find();
              
              
               $listpost = $query->orderBy('dateadd')->all();
              
               return  $this->render('addcontent',['model'=>$model,'listpost' => $listpost]);
		
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


// Добавление редактирование расписания 

public function actionAddraspisanie()
{

 $model = new Raspisanie();   
 $this->layout='//adminka';

 return $this->render('addraspisanie',['model'=>$model]);



}

// вывод главного страницы админки
public function actionAdmin() 
{
$this->layout='//adminka';
return $this->render('admin');

}


	
}