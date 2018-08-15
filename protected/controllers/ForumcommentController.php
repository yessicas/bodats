<?php

class ForumcommentController extends Controller
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
'actions'=>array('index','view'),
'users'=>array('@'),
),
array('allow', // allow authenticated user to perform 'create' and 'update' actions
'actions'=>array('create','update'),
'users'=>array('@'),
),
array('allow', // allow admin user to perform 'admin' and 'delete' actions
'actions'=>array('admin','delete'),
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
public function actionView($id)
{
$this->render('view',array(
'model'=>$this->loadModel($id),
));
}

/**
* Creates a new model.
* If creation is successful, the browser will be redirected to the 'view' page.
*/
public function actionCreate()
{
$model=new ForumComment;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['ForumComment']))
{
$model->attributes=$_POST['ForumComment'];
if($model->save())
$this->redirect(array('view','id'=>$model->id_forum_comment));
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
public function actionUpdate($id)
{
$model=$this->loadModel($id);

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['ForumComment']))
{
$model->attributes=$_POST['ForumComment'];
if($model->save())
$this->redirect(array('view','id'=>$model->id_forum_comment));
}

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
				$model=ForumComment::model()->findByPk($id);
                if($model->delete()){

                // pencarian comment terakhir per topic
                $criteria = new CDbCriteria();
                $criteria->condition = "id_forum_topic =".$model->id_forum_topic;
                $criteria->order="id_forum_comment desc";
                $comment = ForumComment::model()->find($criteria);

                if($comment==true){
                // replace last comment terakhir di topic
                $modelforumtopic=ForumTopic::model()->findByPk($model->id_forum_topic);
                $modelforumtopic->number_comment=$modelforumtopic->number_comment-1;
                $modelforumtopic->last_commented=$comment->update_date;
                $modelforumtopic->save();
                }
                if($comment==false){
                // replace last comment terakhir di topic
                $modelforumtopic=ForumTopic::model()->findByPk($model->id_forum_topic);
                $modelforumtopic->number_comment=$modelforumtopic->number_comment-1;
                $modelforumtopic->last_commented="0000-00-00 00:00:00";
                $modelforumtopic->save();
                }
                //Yii::app()->user->setFlash('success', "Komentar Telah Dihapus");
                //$this->redirect(array('view','id'=>$id_forum_topic,'c'=>$c, 'ForumComment_page'=>$currentPage));
                }

}				

/*
public function actionDelete($id)
{
if(Yii::app()->request->isPostRequest)
{
// we only allow deletion via POST request
$this->loadModel($id)->delete();

// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
if(!isset($_GET['ajax']))
$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
}
else
throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
}
*/
/**
* Lists all models.
*/
public function actionIndex()
{
$dataProvider=new CActiveDataProvider('ForumComment',array(
'sort'=>array(
       'defaultOrder'=>'update_date DESC',
            ),
));
$this->render('index',array(
'dataProvider'=>$dataProvider,
));
}

/**
* Manages all models.
*/
public function actionAdmin()
{
$model=new ForumComment('search');
$model->unsetAttributes();  // clear any default values
if(isset($_GET['ForumComment']))
$model->attributes=$_GET['ForumComment'];

$this->render('admin',array(
'model'=>$model,
));
}

/**
* Returns the data model based on the primary key given in the GET variable.
* If the data model is not found, an HTTP exception will be raised.
* @param integer the ID of the model to be loaded
*/
public function loadModel($id)
{
$model=ForumComment::model()->findByPk($id);
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
if(isset($_POST['ajax']) && $_POST['ajax']==='forum-comment-form')
{
echo CActiveForm::validate($model);
Yii::app()->end();
}
}
}
