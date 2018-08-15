<?php

class inventController extends Controller
{
public $layout='//layouts/triplets';

public function actionpart()
	{
		$model=new Part('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Part']))
		$model->attributes=$_GET['Part'];	
		$this->render('../part/admin',array(
		'model'=>$model,
		));
	}

public function actionpartupdate($id)
	{
		
		$model=$this->loadModel($id,'Part');

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['Part']))
{
$model->attributes=$_POST['Part'];
if($model->save())
{
Yii::app()->user->setFlash('success', " Data Updated");
$this->redirect(array('part','id'=>$model->id_part));
}
}
if(Yii::app()->request->getIsAjaxRequest())
{
          echo $this->renderPartial('update',array('model'=>$model),true,true);//This will bring out the view along with its script.
          }

else 
$this->render('../part/update',array(
'model'=>$model,
));
	}

public function actionpartcreate()
	{
		$model=new Part;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['Part']))
{
$model->attributes=$_POST['Part'];
if($model->save()){
Yii::app()->user->setFlash('success', " Data Saved");
$this->redirect(array('part','id'=>$model->id_part));
}
}
if(Yii::app()->request->getIsAjaxRequest())
{
          echo $this->renderPartial('create',array('model'=>$model),true,true);//This will bring out the view along with its script.
          }

else 
$this->render('../part/create',array(
'model'=>$model,
));
	}

public function actionpartview($id)
{
if(Yii::app()->request->getIsAjaxRequest())
		 {
          echo $this->renderPartial('view',array('model'=>$this->loadModel($id)),true,true);//This will bring out the view along with its script.
          }

else 
$this->render('../part/view',array(
'model'=>$this->loadModel($id,'Part'),
));
}


public function actioncatpart()
	{
		$model=new PartCategory('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['PartCategory']))
		$model->attributes=$_GET['PartCategory'];	
		$this->render('../partcategory/admin',array(
		'model'=>$model,
		));
	}

public function actioncatpartupdate($id)
	{
		
		$model=$this->loadModel($id,'PartCategory');

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['PartCategory']))
{
$model->attributes=$_POST['PartCategory'];
if($model->save())
{
Yii::app()->user->setFlash('success', " Data Updated");
$this->redirect(array('catpart','id'=>$model->id_part_category));
}
}
if(Yii::app()->request->getIsAjaxRequest())
{
          echo $this->renderPartial('update',array('model'=>$model),true,true);//This will bring out the view along with its script.
          }

else 
$this->render('../partcategory/update',array(
'model'=>$model,
));
	}

public function actioncatpartcreate()
	{
		$model=new PartCategory;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['PartCategory']))
{
$model->attributes=$_POST['PartCategory'];
if($model->save()){
Yii::app()->user->setFlash('success', " Data Saved");
$this->redirect(array('catpart','id'=>$model->id_part_category));
}
}
if(Yii::app()->request->getIsAjaxRequest())
{
          echo $this->renderPartial('create',array('model'=>$model),true,true);//This will bring out the view along with its script.
          }

else 
$this->render('../partcategory/create',array(
'model'=>$model,
));
	}

public function actioncatpartview($id)
{
if(Yii::app()->request->getIsAjaxRequest())
		 {
          echo $this->renderPartial('view',array('model'=>$this->loadModel($id)),true,true);//This will bring out the view along with its script.
          }

else 
$this->render('../partcategory/view',array(
'model'=>$this->loadModel($id,'PartCategory'),
));
}


public function loadModel($id,$modelname)
{
$model=$modelname::model()->findByPk($id);
if($model===null)
throw new CHttpException(404,'The requested page does not exist.');
return $model;
}

}
