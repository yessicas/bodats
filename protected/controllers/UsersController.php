<?php

class UsersController extends Controller
{
	/**
	* @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	* using two-column layout. See 'protected/views/layouts/column2.php'.
	*/
	public $layout='//layouts/column1';

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
				'actions'=>array('index','view','create','update','forgotpass','secquest','resetpass','admin','delete','cpass'),
				'roles'=>array('ADM'),
			),

			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('cpass','secquest','forgotpass','resetpass'),
				'roles'=>array('CUS','MKT','OPR','FIC','CRW','NAU'),
			),
			
			
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('cpass','secquest','forgotpass','resetpass'),
				'users'=>array('@'),
			),

			array('deny',  // deny all users
				'roles'=>array('CUS','MKT','OPR','FIC','CRW','NAU'),
				'users'=>array('*'),
			),
		);
	}

	/**
	* Displays a particular model.
	* @param integer $id the ID of the model to be displayed
	*/

	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
			'class'=>'CCaptchaAction',
			'backColor'=>0xFFFFFF,
			'foreColor'=>0xEB5454
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
			'class'=>'CViewAction',
			),
		);
	}

	public function actionView($id)
	{
		if(Yii::app()->request->getIsAjaxRequest())
		{
		echo $this->renderPartial('view',array('model'=>$this->loadModel($id)),true,true);//This will bring out the view along with its script.
		}

		else 
			$this->render('view',array(
			'model'=>$this->loadModel($id),
			));
	}

	/**
	* Creates a new model.
	* If creation is successful, the browser will be redirected to the 'view' page.
	*/
	public function actionCreate() // register individual
	{
		$model=new Users;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Users'])){
			$model->attributes=$_POST['Users'];
				
				/*
					if($_POST['Users']['password']<>''){
						$model->password = $model->hashPassword($_POST['Users']['password']);
						$model->repeatpassword = $model->hashPassword($_POST['Users']['repeatpassword']);
					}
				*/
						$model->ip_addr_created=$_SERVER['REMOTE_ADDR'];
						$model->created_date=date("Y-m-d H:i:s");
				//		$model->last_login=date("Y-m-d H:i:s");
						$model->status_activated=0;
				//		$model->security_code= $model->hashPassword($model->password);

				if($model->save()){
					$pass=Users::model()->findByPk($model->userid);
					$pass->code_id=SecurityGenerator::CodeIdGenerate($model->userid); //encryp code_id
					$enkripted_password=SecurityGenerator::CodeIdGenerate($model->password); // mengenkripsi password
					$pass->password=$enkripted_password;
					$pass->security_code=SecurityGenerator::CodeIdGenerate($enkripted_password); // mengenkripsi password yang sudah di enkripsi
					$pass->save(false);

					$modelauthassigment= new Authassignment;
					$modelauthassigment->itemname=$model->type;
					$modelauthassigment->userid=$model->userid;
					$modelauthassigment->bizrule='';
					$modelauthassigment->data='';
					if($modelauthassigment->validate()){
						$modelauthassigment->save();
					}
							
					Yii::app()->user->setFlash('success', "Data $model->userid Created");
					$this->redirect(array('view','id'=>$model->userid));
				}
		}

		if(Yii::app()->request->getIsAjaxRequest())
		{
			echo $this->renderPartial('create',array('model'=>$model),true,true);//This will bring out the view along with its script.
		}

		else 
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
		$model->unsetAttributes(array('password'));

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Users']))
		{
			$model->attributes=$_POST['Users'];
			if($model->save())
			{
				$pass=Users::model()->findByPk($model->userid);
				$pass->code_id=SecurityGenerator::CodeIdGenerate($model->userid); //encryp code_id
				$enkripted_password=SecurityGenerator::CodeIdGenerate($model->password); // mengenkripsi password
				$pass->password=$enkripted_password;
				$pass->save(false);

				//Update Assignment
				$modelauthassigment= Authassignment::model()->findByAttributes(array('userid'=>$model->userid));
				$modelauthassigment->itemname=$model->type;
				//$modelauthassigment->userid=$model->userid;
				$modelauthassigment->bizrule='';
				$modelauthassigment->data='';
				$modelauthassigment->save();
				
				Yii::app()->user->setFlash('success', "Data $model->userid Updated");
				$this->redirect(array('admin','id'=>$model->userid));
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

	/**
	* Lists all models.
	*/
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Users');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	* Manages all models.
	*/
	public function actionAdmin()
	{
		$model=new Users('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Users']))
			$model->attributes=$_GET['Users'];

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
		$model=Users::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	* Performs the AJAX validation.
	* @param CModel the model to be validated
	*/
	protected function performAjaxValidation($model,$modeldataperusahaan)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='users-form')
		{
			echo CActiveForm::validate($model,$modeldataperusahaan);
			Yii::app()->end();
		}
	}

	public function actionUpdatepropinsi()
 	 {
        $id_country = $_POST['id_country'];
       

     	if( $id_country<>0){
			if( $id_country==1){
			$criteria = new CDbCriteria();
			$criteria->condition = 'id_country=:id_country';
			$criteria->params = array(':id_country'=>$id_country);
			echo"<label for='id_propinsi' class='required'>Provinsi <span class='required'>*</span></label>";
			echo CHtml::dropDownList('id_propinsi','',CHtml::listData(MstPropinsi::model()->findAll($criteria), 'id_propinsi', 'nama'),
								array('prompt'=>'--Select Provinsi --', 'id' => 'id_propinsi','disabled'=>false,
									'ajax' => array('type'=>'POST', 'url'=>CController::createUrl('Updatekabkota') /*, 'update'=>'#Sekolah_id_kota'*/,'success'=>'changekabkota')
									)
								);	
			echo"<div id='Sekolah_id_kota_ajax'>";
			echo"<label for='Sekolah_id_kota' class='required'>Kota <span class='required'>*</span></label>";	
			echo CHtml::dropDownList('Sekolah[id_kota]','',array(),array('prompt'=>'-- No Items --', 'id' => 'Sekolah_id_kota_ajax','disabled'=>false));	
			echo"</div>";
			}
			
			if( $id_country<>1){
			echo '<script>hide();</script>';
			echo"<label for='id_propinsi' class='required'>Provinsi <span class='required'>*</span></label>";
			echo CHtml::textField('id_propinsi_non_indo','',array('class'=>'span3','id'=>'id_propinsi_ajax'));
			echo"<br>";
			echo"<label for='Sekolah_id_kota' class='required'>Kota <span class='required'>*</span></label>";
			echo CHtml::textField('Sekolah[id_kota]','',array('class'=>'span3','id'=>'Sekolah_id_kota_ajax'));
			}
		}
        if( $id_country==0){
			echo"<label for='id_propinsi' class='required'>Provinsi <span class='required'>*</span></label>";
			echo CHtml::dropDownList('id_propinsi','',array(),array('prompt'=>'-- No Items --', 'id' => 'id_propinsi_ajax','disabled'=>false));	
			echo"<div id='Sekolah_id_kota_ajax'>";
			echo"<label for='Sekolah_id_kota' class='required'>Kota <span class='required'>*</span></label>";	
			echo CHtml::dropDownList('Sekolah[id_kota]','',array(),array('prompt'=>'-- No Items --', 'id' => 'Sekolah_id_kota_ajax','disabled'=>false));	
			echo"</div>";
   		
        }

     
	 }

	public function actionUpdatekabkota()
 	 {
        $id_propinsi = $_POST['id_propinsi'];
       

     	if( $id_propinsi<>0){
		
        $criteria = new CDbCriteria();
		$criteria->condition = 'id_propinsi=:id_propinsi';
		$criteria->params = array(':id_propinsi'=>$id_propinsi);
		echo"<label for='Sekolah_id_kota' class='required'>Kota <span class='required'>*</span></label>";
		echo CHtml::dropDownList('Sekolah[id_kota]','',CHtml::listData(MstKabupatenkota::model()->findAll($criteria), 'id', 'nama'),
   							array('prompt'=>'--Select Kabupaten/Kota --', 'id' => 'Sekolah_id_kota','disabled'=>false,
   								)
   							);		
		}
        if($id_propinsi==0){
        echo"<label for='Sekolah_id_kota' class='required'>Kota <span class='required'>*</span></label>";	
		echo CHtml::dropDownList('Sekolah[id_kota]','',array(),array('prompt'=>'-- No Items --', 'id' => 'Sekolah_id_kota','disabled'=>false));	
   		
        }

     
	 }

	public function actionforgotpass()
	{
		$model=new Users;
		$this->layout='//layouts/triplets';

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Users']))
		{
			$model->attributes=$_POST['Users'];
			$input_email=$_POST['Users']['email'];
			$email=Users::model()->findByAttributes(array('email'=>$input_email));
			if($email){
				$c=SecurityGenerator::SecurityDisplay($email->code_id);
				$this->redirect(array('secquest','e'=>$email->email,'c'=>$c));
			}else{
				$model->addError('email', Yii::t('strings','Email Not Registered'));
			}
			
		}

		$this->render('forgotpass',array(
		'model'=>$model,
		));
	}


	public function actionsecquest($e,$c)
	{
		$this->layout='//layouts/triplets';
		$model=$this->loadresetpassquestions($e,$c);
		if($model){
			$model->unsetAttributes(array('answer_secret_question'));
			$model->Scenario='secquest';	
		}

		if(isset($_POST['Users']))
		{
			$model->attributes=$_POST['Users'];
			$input_answer=$_POST['Users']['answer_secret_question'];
			$answer=Users::model()->findByAttributes(array('answer_secret_question'=>$input_answer));

			if($answer){
				$c=SecurityGenerator::SecurityDisplay($answer->security_code);

				$updatedatauser=$answer;
				$updatedatauser->is_reset=1;
				$updatedatauser->reset_code=$this->gen_random_string();
				$updatedatauser->save(false);

				$this->redirect(array('resetpass','rc'=>$updatedatauser->reset_code,'c'=>$c));
				//kirim email
				//Yii::app()->user->setFlash('success', "link Reset Password http://localhost/careerpath/users/resetpass/rc/".$updatedatauser->reset_code."/c/".$c);
				//$this->redirect(array('site/index'));
			}else{
				$model->addError('answer_secret_question', Yii::t('strings','Wrong Answer'));
			}
		}

		$this->render('secquest',array(
		'model'=>$model,
		));
	}


	public function actionresetpass($rc,$c)
	{
		$this->layout='//layouts/triplets';
		$model=$this->loadresetpass($rc,$c);
		if($model){
			$model->unsetAttributes(array('password'));
			$model->Scenario='resetpass';	
		}
		
		if(isset($_POST['Users']))
		{
			$model->attributes=$_POST['Users'];
			if($model->save())
			{
				$updatedatauser=Users::model()->findByPk($model->userid);
				$enkripted_password=SecurityGenerator::CodeIdGenerate($model->password); // mengenkripsi password
				$updatedatauser->password=$enkripted_password;
				$updatedatauser->is_reset=0;
				$updatedatauser->reset_code='';
				$updatedatauser->save(false);

				Yii::app()->user->setFlash('success', Yii::t('strings','Selamat Reset Password Berhasil Silahkan Login'));
				$this->redirect(array('site/index'));
			}
		}

		$this->render('resetpass',array(
			'model'=>$model,
		));
	}



	public function loadresetpassquestions($e,$c)
	{
		$criteria = new CDbCriteria();
		$criteria->condition = "email ='".$e."' AND Substring(code_id,6,10)="."'$c'";
		$model=Users::model()->find($criteria);
		//$model=ForumTopic::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function loadresetpass($rc,$c)
	{
		$criteria = new CDbCriteria();
		$criteria->condition = "is_reset =1 AND reset_code="."'$rc' AND Substring(security_code,6,10)="."'$c'";
		$model=Users::model()->find($criteria);
		//$model=ForumTopic::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function gen_random_string($length=16)
	{
		$chars ="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";//length:36
		$final_rand='';
		for($i=0;$i<$length; $i++)
		{
			$final_rand .= $chars[ rand(0,strlen($chars)-1)];
		}
		return $final_rand;
	}


	public function actioncpass()
	{
		$this->layout='//layouts/triplets';
		$model=$this->loadModel(Yii::app()->user->id);
		if($model){
			$model->unsetAttributes(array('password'));
			$model->Scenario='cpass';	
		}

		if(isset($_POST['Users']))
		{
			$model->attributes=$_POST['Users'];
			if($model->save())
			{
				$updatedatauser=Users::model()->findByPk($model->userid);
				$enkripted_password=SecurityGenerator::CodeIdGenerate($model->password); // mengenkripsi password
				$updatedatauser->password=$enkripted_password;
				$updatedatauser->save(false);

				Yii::app()->user->setFlash('success', "Selamat ganti Password Berhasil");
				$this->redirect(array('users/cpass'));
			}
		}

		$this->render('cpass',array(
			'model'=>$model,
		));
	}



}
