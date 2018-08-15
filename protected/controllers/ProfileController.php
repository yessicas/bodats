<?php

class ProfileController extends Controller
{
/**
* @var string the default layout for the views. Defaults to '//layouts/column2', meaning
* using two-column layout. See 'protected/views/layouts/column2.php'.
*/
public $layout='//layouts/triplets';

/**
* @return array action filters
*/
public function filters()
{
return array(
'accessControl', // perform access control for CRUD operations
);
}

/**
* Specifies the access control rules.
* This method is used by the 'accessControl' filter.
* @return array access control rules
*/
public function accessRules()
{
return array(

array('allow', // allow authenticated user to perform 'create' and 'update' actions
'actions'=>array('view'),
'users'=>array('*'),
),
array('deny',  // deny all users
'users'=>array('*'),
),
);
}

public function actionView($customurl)
{

    if(Yii::app()->user->isGuest){
            $this->layout='//layouts/guest';
        }
     if(!Yii::app()->user->isGuest){
            $this->layout='//layouts/triplets';
        }

$modeluser=Users::model()->findByAttributes(array('userid'=>$customurl));

if($modeluser){

    if ($modeluser->type=='IDV'||$modeluser->type=='ADM'){

    $model=DataDiri::model()->findByAttributes(array('userid'=>$customurl));
    $this->render('viewprofileidv',array(
    'model'=>$model,
    ));
    }

    if ($modeluser->type=='ETP'){

    $modeluserperusahaan=UserPerusahaan::model()->findByAttributes(array('userid'=>$customurl));
    $model=DataPerusahaan::model()->findByAttributes(array('id_perusahaan'=>$modeluserperusahaan->id_perusahaan));
    $this->render('viewprofileetp',array(
    'model'=>$model,
    'modeluserperusahaan'=>$modeluserperusahaan,
    ));
    }

    if ($modeluser->type=='SKL'){

    $modelusersekolah=UserSekolah::model()->findByAttributes(array('userid'=>$customurl));
    $model=Sekolah::model()->findByAttributes(array('id_sekolah'=>$modelusersekolah->id_sekolah));
    $this->render('viewprofileskl',array(
    'model'=>$model,
    'modelusersekolah'=>$modelusersekolah,
    ));
    }

}

if($modeluser===null){
    throw new CHttpException(404,'The requested page does not exist.');  
}



}

}
