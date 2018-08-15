<?php

class DataDiriController extends Controller
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
array('allow',  // allow all users to perform 'index' and 'view' actions
'actions'=>array('index','view','viewprofile','indexskl'),
'users'=>array('@'),
),
array('allow', // allow authenticated user to perform 'create' and 'update' actions
'actions'=>array('create','update'),
'users'=>array('@'),
),
array('allow', // allow admin user to perform 'admin' and 'delete' actions
'actions'=>array('admin','delete','view','uploadfoto','unggah'),
'users'=>array('@'),
),
array('deny',  // deny all users
'users'=>array('*'),
),
);
}

/**
* Displays a particular model.
* @param integer $id the ID of the model to be displayed
*/


/*
public function actionView($id)
{
$this->render('view',array(
'model'=>$this->loadModel($id),
));
}
*/


public function actionView()
{
$id =  Yii::app()->user->id;
$model=DataDiri::model()->findByAttributes(array('userid'=>$id));
$this->render('view',array(
'model'=>$model,
));
}

/*
public function actionViewprofile($id,$c)
{
//$id nya id_data diri dari DataDiri $c nya codeid substr 10 dari  Users
// contoh url  view profil data diri orang lain  http://localhost/careerpath/datadiri/viewprofile/id/10/c/9262acb2ab
$this->render('view',array(
'model'=>$this->loadModel($id,$c),
));
}
*/
public function actionViewprofile($id,$c)
{
//$id nya id_data diri dari DataDiri $c nya codeid substr 10 dari  Users
// contoh url  view profil data diri orang lain  http://localhost/careerpath/datadiri/viewprofile/id/10/c/9262acb2ab
$this->render('viewprofile',array(
'model'=>$this->loadModelprofile($id,$c),
));
}

/* di nonaktifkan 
public function actionView_master($id)
{
$this->render('view_master',array(
'model'=>$this->loadModel($id),
));
}
*/
/**
* Creates a new model.
* If creation is successful, the browser will be redirected to the 'view' page.
*/
public function actionCreate()
{
$model=new DataDiri;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['DataDiri']))
{
$model->attributes=$_POST['DataDiri'];
if($model->save())
{
Yii::app()->user->setFlash('success', "Data  dengan nama $model->nama_lengkap  telah disimpan.");
$this->redirect(array('view','id'=>$model->id_data_diri));
}
}

$this->render('create',array(
'model'=>$model,
));
}

/**
* Updates a particular model.
* If update is successful, the browser will be redirected to the 'view' page.
* @param integer $id the ID of the model to be updated
*/
public function actionUpdate($id,$c)
{
$model=$this->loadModel($id,$c);

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['DataDiri']))
{
$model->attributes=$_POST['DataDiri'];
if($model->save())
{

$modeluser=Users::model()->findByAttributes(array('userid'=>$model->userid));
$modeluser->full_name=$model->nama_lengkap;
$modeluser->save(false);

Yii::app()->user->setFlash('success', "Data  dengan nama $model->nama_lengkap  telah dirubah.");
$this->redirect(array('view'));
}
}

if(Yii::app()->request->getIsAjaxRequest())
		 {
          echo $this->renderPartial('update',array('model'=>$model),true,true);//This will bring out the view along with its script.
          }

else 
$this->render('update',array(
'model'=>$model,
));
}

/**
* Deletes a particular model.
* If deletion is successful, the browser will be redirected to the 'admin' page.
* @param integer $id the ID of the model to be deleted
*/
public function actionDelete($id)
{
$model=$this->loadModel($id);
		if(Yii::app()->request->isPostRequest)
		{

				
			$this->loadModel($id)->delete();
			if(!isset($_GET['ajax']))
				Yii::app()->user->setFlash('success', "Data  dengan nama $model->nama_lengkap  telah dihapus.");
				$this->redirect(isset($_POST['returnUrl']) 
                                 ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,
                        'Invalid request. Please do not repeat this request again.');
}

/**
* Lists all models.
*/
public function actionIndex()
{
$dataProvider=new CActiveDataProvider('DataDiri');
$this->render('index',array(
'dataProvider'=>$dataProvider,
));
}

public function actionIndexskl()
{
$dataProvider=new CActiveDataProvider('DataDiri');
$this->render('indexskl',array(
'dataProvider'=>$dataProvider,
));
}

/**
* Manages all models.
*/
public function actionAdmin()
{
$model=new DataDiri('search');
$model->unsetAttributes();  // clear any default values
if(isset($_GET['DataDiri']))
$model->attributes=$_GET['DataDiri'];

$this->render('admin',array(
'model'=>$model,
));
}

/**
* Returns the data model based on the primary key given in the GET variable.
* If the data model is not found, an HTTP exception will be raised.
* @param integer the ID of the model to be loaded
*/
public function loadModel($id,$c) // $id nya id_data diri $c nya codeid 10 dari data users
{


// cek untuk mendapatkan userid dari datadiri tersebut dengan kondisi berdasarkan $id
$model=DataDiri::model()->findByPk($id);

// cek  data users dengan kondisi userid yg telah didapat  dan codeid subsr 10 yg didapat di $c
$criteria = new CDbCriteria();
$criteria->condition = "userid ='".$model->userid."' AND Substring(code_id,6,10)="."'$c'";
$modelusers=Users::model()->find($criteria);

if($model===null || $modelusers===null)
throw new CHttpException(404,'The requested page does not exist.');
return $model;
}

public function loadModelprofile($id,$c) // $id nya id_data diri $c nya codeid 10 dari data users
{


// cek untuk mendapatkan userid dari datadiri tersebut dengan kondisi berdasarkan $id
//$model=DataDiri::model()->findByPk($id);

// cek  data users dengan kondisi userid yg telah didapat  dan codeid subsr 10 yg didapat di $c
$criteria = new CDbCriteria();
$criteria->condition = "id_data_diri ='".$id."' AND Substring(code_id,6,10)="."'$c'";
$model=DataDiri::model()->find($criteria);

if($model===null)
throw new CHttpException(404,'The requested page does not exist.');
return $model;
}

/**
* Performs the AJAX validation.
* @param CModel the model to be validated
*/
protected function performAjaxValidation($model)
{
if(isset($_POST['ajax']) && $_POST['ajax']==='data-warga-form')
{
echo CActiveForm::validate($model);
Yii::app()->end();
}
}

public function actionUploadfoto(){
		$id =  Yii::app()->user->id;
		$model=DataDiri::model()->findByAttributes(array('userid'=>$id));

		if(Yii::app()->request->getIsAjaxRequest()){
			 //Yii::app()->clientScript->scriptMap['*.js'] = false;
	          echo $this->renderPartial('unggahfile',array(
	          	'id'=>$id,
	          	'model'=>$model,
	          	),true,true);
          }

        else
		$this->render('unggahfile',array(
			'id'=>$id,
			'model'=>$model,
		));
	}
	
	public function actionUnggah()
	{
		$id =  Yii::app()->user->id;
		$model=DataDiri::model()->findByAttributes(array('userid'=>$id));
		$modelname = "DataDiri";
		$fieldname = "foto";
		$path = "repository/users/";
		$PK = "id_data_diri";
		$user=Users::model()->findByPK($id);
		$c=SecurityGenerator::SecurityDisplay($user->code_id);
		$newname = "usr_".$c."_".date("YmdHis")."_";
		//echo$model->nama_lengkap;
		$ui = new UploadImage();
		$ui->FC_WIDTH = 200;
		$ui->FC_HEIGHT = 200;
		if($ui->uploadSingleImage($model, $modelname, $fieldname, $path, $PK, $newname)){
			//$this->render('view', array('id'=>$id, 'model'=>$model, 'sukses'=>'ok'));
			$this->redirect(array('datadiri/view'));
			exit();
		}
		
		$this->render('unggahfile',array(
			'id'=>$id,
			'model'=>$model,
		));
	}

}
