<?php

class MessageoutboxController extends Controller
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
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','autosent','view','create2','create'),
				'roles'=>array('ADM', 'FIC', 'NAU', 'CRW', 'VPC', 'MKT', 'CCT', 'FCT', 'SOA', 'HEA', 'HOPR', 'PRO'),
				//'roles'=>array('ADM','OPR','FIC','CRW'),
				//'users'=>array('@'),
			),
			array('deny',  // deny all users
			//'roles'=>array('CUS','MKT','NAU'),
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
	$this->render('view',array(
	'model'=>$this->loadModel($id,$c),
	));
	}

	public function actionCreate2($from_inbox, $title)
	{
		$model=new MessageOutbox;
		
		$users=Yii::app()->user->id;
	// Uncomment the following line if AJAX validation is needed
	// $this->performAjaxValidation($model);

	if(isset($_POST['MessageOutbox']))
	{
	$model->attributes=$_POST['MessageOutbox'];
	$model->status="sent";
	$model->date=date("Y-m-d H:i:s");
	if($model->save())

		{
						$update_code_id=MessageOutbox::model()->findByPk($model->id_outbox);
						$update_code_id->code_id=SecurityGenerator::CodeIdGenerate($model->id_outbox);
						$update_code_id->save();
						$c=SecurityGenerator::SecurityDisplay($update_code_id->code_id);

						$modelInbox=new MessageInbox;
						$modelInbox->id_inbox=$model->id_outbox;
						$modelInbox->code_id=$update_code_id->code_id;
						$modelInbox->from_inbox=$model->from_outbox;
						$modelInbox->to_inbox=$model->to_outbox;
						$modelInbox->title=$model->title;
						$modelInbox->message=$model->message;
						$modelInbox->date=$model->date;
						$modelInbox->status="new";
						$modelInbox->save();
	Yii::app()->user->setFlash('success', "Pesan  Telah dikirim.");
	$this->redirect(array('messageoutbox/view','id'=>$model->id_outbox,'c'=>$c));
	}
	}

	$this->render('create2',array(
	'model'=>$model,
	'from_inbox'=>$from_inbox,
	'title'=>$title,
	'users'=>$users,
	));
	}

	/**
	* Creates a new model.
	* If creation is successful, the browser will be redirected to the 'view' page.
	*/
	public function actionCreate()
	{
	$model=new MessageOutbox;

	$users=Yii::app()->user->id;
	// Uncomment the following line if AJAX validation is needed
	// $this->performAjaxValidation($model);

	if(isset($_POST['MessageOutbox']))
	{
	$model->attributes=$_POST['MessageOutbox'];
	$model->status="sent";
	$model->date=date("Y-m-d H:i:s");



	if ($_POST['MessageOutbox']['to_outbox'] ==''){
	$model->addError('to_outbox', 'User Yang Dituju Harus Di isi');
	}


	if ($_POST['MessageOutbox']['to_outbox'] <>'')
	{

	$modeluserswithuserid=Users::model()->findByAttributes(array('userid'=>$_POST['MessageOutbox']['to_outbox'],'full_name'=>$_POST['typehead']));

	$modelusers=Users::model()->findByAttributes(array('userid'=>$_POST['MessageOutbox']['to_outbox']));
				if($modelusers==false||$modeluserswithuserid==false)
						{
					$model->addError('to_outbox', 'User yang anda tuju belum terdaftar!');
					//Yii::app()->user->setFlash('danger', "User yang anda tuju belum terdaftar");
					//$this->redirect(array('messageoutbox/create'));
						}


				if($modelusers==true&&$modeluserswithuserid==true)

					{
						if($model->save())
						{

						$update_code_id=MessageOutbox::model()->findByPk($model->id_outbox);
						$update_code_id->code_id=SecurityGenerator::CodeIdGenerate($model->id_outbox);
						$update_code_id->save();
						$c=SecurityGenerator::SecurityDisplay($update_code_id->code_id);

						$modelInbox=new MessageInbox;
						$modelInbox->id_inbox=$model->id_outbox;
						$modelInbox->code_id=$update_code_id->code_id;
						$modelInbox->from_inbox=$model->from_outbox;
						$modelInbox->to_inbox=$model->to_outbox;
						$modelInbox->title=$model->title;
						$modelInbox->message=$model->message;
						$modelInbox->date=$model->date;
						$modelInbox->status="new";
						$modelInbox->save();

						Yii::app()->user->setFlash('success', "Pesan Telah terkirim.");
						$this->redirect(array('messageoutbox/view','id'=>$model->id_outbox, 'c'=>$c));
						}
					}
	}



	}

	if(Yii::app()->request->getIsAjaxRequest())
			 {
			  echo $this->renderPartial('create',array('model'=>$model,'users'=>$users),true,true);//This will bring out the view along with its script.
			  }

	else 
	$this->render('create',array(
	'model'=>$model,
	'users'=>$users,
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

	if(isset($_POST['MessageOutbox']))
	{
	$model->attributes=$_POST['MessageOutbox'];
	if($model->save())
	$this->redirect(array('view','id'=>$model->id_outbox));
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
	$dataProvider=new CActiveDataProvider('MessageOutbox');
	$this->render('index',array(
	'dataProvider'=>$dataProvider,
	));
	}

	/**
	* Manages all models.
	*/
	public function actionAdmin()
	{
	$model=new MessageOutbox('search');
	$model->unsetAttributes();  // clear any default values
	if(isset($_GET['MessageOutbox']))
	$model->attributes=$_GET['MessageOutbox'];

	$this->render('admin',array(
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
	$criteria->condition = "id_outbox =".$id." AND Substring(code_id,6,10)="."'$c'";
	$model=MessageOutbox::model()->find($criteria);
	//$model=MessageOutbox::model()->findByPk($id);
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
	if(isset($_POST['ajax']) && $_POST['ajax']==='message-outbox-form')
	{
	echo CActiveForm::validate($model);
	Yii::app()->end();
	}
	}

	public function actionAutosent()  
		  {  
			   $res =array();  
			   $row=array();  
			   if (isset($_GET['term'])) {  
					$sql ="SELECT userid FROM  users WHERE userid LIKE :to_outbox LIMIT 0,5";  
					$command =Yii::app()->db->createCommand($sql);  
					$command->bindValue(":to_outbox", ''.'%'.$_GET['term'].'%', PDO::PARAM_STR);  
					$res =$command->queryAll();  
					foreach($res as $value):  
						 $row[]=array(  
							  'label'=>$value['userid'], // label for dropdown list       
							  'value'=>$value['userid'], // value for input field       
							  'id'=>$value['userid'],   // return value from autocomplete  
						 );   
					endforeach;  
			   }  
			   echo CJSON::encode($row);  
			   Yii::app()->end();            
		  }  
}
