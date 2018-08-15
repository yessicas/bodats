<?php

class ForumtopicController extends Controller
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
'actions'=>array('create','update','alltopic','hottopic','addnewcomment','lastcomment','editable','deletecomment','Update_status',
                'forumcategory','forumcomment','viewall','search'),
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
public function actionView($id,$c)
{

$modelviewedtopic=$this->loadModel($id,$c);
    if($modelviewedtopic){
    $modelviewedtopic->viewed=$modelviewedtopic->viewed+1;
    $modelviewedtopic->save();
    }

$modelforumcoment=new ForumComment;

$criteria = new CDbCriteria();
$criteria->condition = 'id_forum_topic=:id_forum_topic';
$criteria->params = array(':id_forum_topic'=>$id);

$dataProvider=new CActiveDataProvider('ForumComment',array(
'criteria'=>$criteria,
'sort'=>array(
       'defaultOrder'=>'update_date ASC',
            ),
));

$this->render('view',array(
'model'=>$this->loadModel($id,$c),
'modelforumcoment'=>$modelforumcoment,
'dataProvider'=>$dataProvider,
));
}

public function actionAddnewcomment()
        {
                $model=new ForumComment;
                $this->performAjaxValidation($model); // I want to perform validation
                if(isset($_POST['ForumComment'])){
                    $model->attributes=$_POST['ForumComment'];
                    $model->userid=Yii::app()->user->id;
                    $model->update_date=date("Y-m-d H:i:s");
                    $model->ip_address=$_SERVER['REMOTE_ADDR'];

                    if($model->save()){

                    $modelforumtopic=ForumTopic::model()->findByPk($model->id_forum_topic);
                    $modelforumtopic->number_comment=$modelforumtopic->number_comment+1;
                    $modelforumtopic->last_commented=$model->update_date;
                    $modelforumtopic->save();

                     //echo "berhasil";  
					//echo'<div class = "animated flash">';
					echo'<div class="alert in alert-block fade alert-success">';
					echo'<a href="#" class="close" data-dismiss="alert">'.'x'.'</a>';
					echo'Data telah disimpan';
					echo'</div>';
					//echo'</div>';
                    //echo"hapuscomment".$model->id_forum_comment;

                    }
					else
					{
					echo'<div class="alert in alert-block fade alert-danger">';
					echo'<a href="#" class="close" data-dismiss="alert">'.'x'.'</a>';
					echo'Gagal Menyimpan Data, Periksa Lagi Inputan Yang Anda Masukan';
					echo'</div>';
					}
                } 
        }

public function actiondeletecomment($id,$id_forum_topic,$c,$currentPage)
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
                $modelforumtopic=ForumTopic::model()->findByPk($id_forum_topic);
                $modelforumtopic->number_comment=$modelforumtopic->number_comment-1;
                $modelforumtopic->last_commented=$comment->update_date;
                $modelforumtopic->save();
                }
                if($comment==false){
                // replace last comment terakhir di topic
                $modelforumtopic=ForumTopic::model()->findByPk($id_forum_topic);
                $modelforumtopic->number_comment=$modelforumtopic->number_comment-1;
                $modelforumtopic->last_commented="0000-00-00 00:00:00";
                $modelforumtopic->save();
                }
                //Yii::app()->user->setFlash('success', "Komentar Telah Dihapus");
                //$this->redirect(array('view','id'=>$id_forum_topic,'c'=>$c, 'ForumComment_page'=>$currentPage));

                    echo'<div class="alert in alert-block fade alert-success">';
                    echo'<a href="#" class="close" data-dismiss="alert">'.'x'.'</a>';
                    echo'Data telah disimpan';
                    echo'</div>';
                }

        }

/**
* Creates a new model.
* If creation is successful, the browser will be redirected to the 'view' page.
*/
public function actionCreate()
{
$model=new ForumTopic;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['ForumTopic']))
{
$model->attributes=$_POST['ForumTopic'];
$model->userid_created= Yii::app()->user->id;
$model->created_date=date("Y-m-d H:i:s");
$model->ip_addr_created=$_SERVER['REMOTE_ADDR'];
$model->status='OPEN';
if($model->save()){

    $update_code_id=ForumTopic::model()->findByPk($model->id_forum_topic);
    $update_code_id->code_id=SecurityGenerator::CodeIdGenerate($model->id_forum_topic);
    $update_code_id->save();

    $c=SecurityGenerator::SecurityDisplay($update_code_id->code_id);
    Yii::app()->user->setFlash('success', "Topik Anda Telah Di posting ");
    $this->redirect(array('view','id'=>$model->id_forum_topic,'c'=>$c));
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

if(isset($_POST['ForumTopic']))
{
$model->attributes=$_POST['ForumTopic'];
if($model->save()){

$c=SecurityGenerator::SecurityDisplay($model->code_id);
Yii::app()->user->setFlash('success', "Topik Anda Telah Di dirubah ");
$this->redirect(array('view','id'=>$model->id_forum_topic,'c'=>$c));
}
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
public function actionDelete($id,$c)
{
if(Yii::app()->request->isPostRequest)
{
// we only allow deletion via POST request
$this->loadModel($id,$c)->delete();

// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
if(!isset($_GET['ajax']))
$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
}
else
throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
}

/**
* Lists all models.
*/
public function actionIndex()
{

$criteria = new CDbCriteria();
$criteria->condition = 'status=:status';
$criteria->params = array(':status'=>'OPEN');

$dataProvider=new CActiveDataProvider('ForumTopic',array(
'criteria'=>$criteria,
'sort'=>array(
       'defaultOrder'=>'number_comment DESC',
            ),
        'pagination'=>array(
                        'pageSize'=>4,
                ),
));


$criteriarecentforum = new CDbCriteria();
$criteriarecentforum->limit=4;
$criteriarecentforum->order="created_date DESC";
$recentrorum=ForumTopic::model()->findAll($criteriarecentforum);

$criteriarecentcomment = new CDbCriteria();
$criteriarecentcomment->with=array('ForumTopic');
$criteriarecentcomment->together=true;
$criteriarecentcomment->compare('ForumTopic.status','OPEN');
$criteriarecentcomment->limit=4;
$criteriarecentcomment->order="update_date DESC";
$recentcomment=ForumComment::model()->findAll($criteriarecentcomment);

$this->render('index',array(
'dataProvider'=>$dataProvider,
'recentrorum'=>$recentrorum,
'recentcomment'=>$recentcomment,
));
}

public function actionViewall()
{

$criteria = new CDbCriteria();
$criteria->condition = 'status=:status';
$criteria->params = array(':status'=>'OPEN');

$dataProvider=new CActiveDataProvider('ForumTopic',array(
'criteria'=>$criteria,
'sort'=>array(
       'defaultOrder'=>'created_date DESC',
            ),
        'pagination'=>array(
                        'pageSize'=>10,
                ),
));



$this->render('index_viewall',array(
'dataProvider'=>$dataProvider,
));
}


public function actionSearch($q)
{

$criteria = new CDbCriteria();
$criteria->condition = 'status=:status AND judul_topic Like :q ';
$criteria->params = array(':status'=>'OPEN',':q'=>'%'.trim($q).'%');

$dataProvider=new CActiveDataProvider('ForumTopic',array(
'criteria'=>$criteria,
'sort'=>array(
       'defaultOrder'=>'created_date DESC',
            ),
        'pagination'=>array(
                        'pageSize'=>10,
                ),
));



$this->render('index_search',array(
'dataProvider'=>$dataProvider,
));
}

/**
* Manages all models.
*/
public function actionAdmin()
{
$model=new ForumTopic('search');
$model->unsetAttributes();  // clear any default values
if(isset($_GET['ForumTopic']))
$model->attributes=$_GET['ForumTopic'];

$this->render('admin',array(
'model'=>$model,
));
}

public function actionUpdate_status($id_forum_topic)
{
      
        $parameter_status='status'.$id_forum_topic;
        $status = $_POST[$parameter_status];

        $data=ForumTopic::model()->findByPk($id_forum_topic); 
        $data->status=$status;
        $data->save();
                    echo'<div class="alert in alert-block fade alert-success">';
                    echo'<a href="#" class="close" data-dismiss="alert">'.'x'.'</a>';
                    echo'Topic telah dirubah';
                    echo'</div>';
        
                
}

public function actionAlltopic()
{
$model=new ForumTopic('search');
$model->unsetAttributes();  // clear any default values
if(isset($_GET['ForumTopic']))
$model->attributes=$_GET['ForumTopic'];

$this->render('alltopic',array(
'model'=>$model,
));
}

public function actionHottopic()
{
$model=new ForumTopic('searchhottopic');
$model->unsetAttributes();  // clear any default values
if(isset($_GET['ForumTopic']))
$model->attributes=$_GET['ForumTopic'];

$this->render('hottopic',array(
'model'=>$model,
));
}

public function actionLastcomment()
{

$criteriarecentcomment = new CDbCriteria();
$criteriarecentcomment->with=array('ForumTopic');
$criteriarecentcomment->together=true;
$criteriarecentcomment->compare('ForumTopic.status','OPEN');


$dataProvider=new CActiveDataProvider('ForumComment',array(
'criteria'=>$criteriarecentcomment,
'sort'=>array(
       'defaultOrder'=>'update_date DESC',
            ),
));
$this->render('../forumcomment/index',array(
'dataProvider'=>$dataProvider,
));
}

public function actionForumcategory()
{
$model=new ForumCategory('search');
$model->unsetAttributes();  // clear any default values
if(isset($_GET['ForumCategory']))
$model->attributes=$_GET['ForumCategory'];

$this->render('../forumcategory/admin',array(
'model'=>$model,
));
}

public function actionForumcomment()
{
$model=new ForumComment('search');
$model->unsetAttributes();  // clear any default values
if(isset($_GET['ForumComment']))
$model->attributes=$_GET['ForumComment'];

$this->render('../forumcomment/admin',array(
'model'=>$model,
));
}


/**
* Returns the data model based on the primary key given in the GET variable.
* If the data model is not found, an HTTP exception will be raised.
* @param integer the ID of the model to be loaded
*/
public function loadModel($id,$c)
{

$criteria = new CDbCriteria();
$criteria->condition = "id_forum_topic =".$id." AND Substring(code_id,6,10)="."'$c'";
$model=ForumTopic::model()->find($criteria);
//$model=ForumTopic::model()->findByPk($id);
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
if(isset($_POST['ajax']) && $_POST['ajax']==='forum-topic-form')
{
echo CActiveForm::validate($model);
Yii::app()->end();
}
}

/*
public function actionEditable(){
        Yii::import('bootstrap.widgets.TbEditableSaver'); 
        $es = new TbEditableSaver('ForumTopic');      
        $es->update();
    }
*/

public function actionEditable()
{
    $es = new EditableSaver('ForumComment');
    try {
        $es->update();
    } catch(CException $e) {
        echo CJSON::encode(array('success' => false, 'msg' => $e->getMessage()));
        return;
    }
    echo CJSON::encode(array('success' => true));
}

}
