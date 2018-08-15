<?php

class SettypetugbargeController extends Controller
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
			/*
			array('allow',  // allow all users to perform 'index' and 'view' actions
			'actions'=>array('index','view'),
			'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
			'actions'=>array('create','update'),
			'users'=>array('@'),
			),
			*/
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array(
				'index','view', 'createsetpair','update',
				//'admin',
				'delete','clone','findtugset','findbargeset','FindBargeVesselByTugVessel','FindBargeVesselByTugVesselondetail',
				'adminsetpair',
				'breakpair'
				),
				//'users'=>array('@'),
				'roles'=>array('ADM', 'VPC'),
			),
			
			// Khusus untuk find saja siapa saja boleh mengakses
			array('allow', 
				'actions'=>array(
					'findtugset','findbargeset','FindBargeVesselByTugVessel','FindBargeVesselByTugVesselondetail',
				),
				'users'=>array('@'),
				//'roles'=>array('ADM', 'VPC'),
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
		if(Yii::app()->request->getIsAjaxRequest())
		{
			echo $this->renderPartial('view',array('model'=>$this->loadModel($id)),true,true);//This will bring out the view along with its script.
		}

		else 
		$this->render('view',array(
		'model'=>$this->loadModel($id),
		));
	}
	
	public function actionCreatesetpair()
	{
		$model=new SettypeTugbarge;
		$datenow=date("Y-m"); // tahun dan bulan saja
		$datecnowsplit = explode("-", $datenow);
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['SettypeTugbarge']))
		{
			$model->attributes=$_POST['SettypeTugbarge'];
			$tug = $model->tug;
			$barge = $model->barge;
			$modelsettype = SetTypeDB::getPair($tug, $barge);
			if($modelsettype != null){
				$model = $modelsettype;
				$model->is_active = 1;
			}

			$model->first_date=$datenow.'-01';
			$model->month=$datecnowsplit[1];
			$model->year=$datecnowsplit[0];
			$model->created_user=Yii::app()->user->id;
			$model->created_date=date("Y-m-d H:i:s");
			$model->ip_user_updated=$_SERVER['REMOTE_ADDR'];
			$model->tug_power='0';
			$model->barge_capacity='0';
			$model->settype_name='0';

			if($model->save()){
				$updatemodel =$this->loadModel($model->id_settype_tugbarge);
				$updatemodel->tug_power=$updatemodel->VesselTug->Power;
				$updatemodel->barge_capacity=$updatemodel->VesselBarge->BargeSize;
				$updatemodel->settype_name=$updatemodel->VesselTug->Power.",".$updatemodel->VesselBarge->BargeSize."ft";
				$updatemodel->save();

				Yii::app()->user->setFlash('success', " Data Saved");
				$this->redirect(array('adminsetpair'));
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
	* Creates a new model.
	* If creation is successful, the browser will be redirected to the 'view' page.
	*/
	public function actionCreate()
	{
		$model=new SettypeTugbarge;
		$datenow=date("Y-m"); // tahun dan bulan saja
		$datecnowsplit = explode("-", $datenow);
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['SettypeTugbarge']))
		{
			$model->attributes=$_POST['SettypeTugbarge'];

			$model->first_date=$datenow.'-01';
			$model->month=$datecnowsplit[1];
			$model->year=$datecnowsplit[0];
			$model->created_user=Yii::app()->user->id;
			$model->created_date=date("Y-m-d H:i:s");
			$model->ip_user_updated=$_SERVER['REMOTE_ADDR'];
			$model->tug_power='0';
			$model->barge_capacity='0';
			$model->settype_name='0';

			if($model->save()){
				$updatemodel =$this->loadModel($model->id_settype_tugbarge);
				$updatemodel->tug_power=$updatemodel->VesselTug->Power;
				$updatemodel->barge_capacity=$updatemodel->VesselBarge->BargeSize;
				$updatemodel->settype_name=$updatemodel->VesselTug->Power.",".$updatemodel->VesselBarge->BargeSize."ft";
				$updatemodel->save();

				Yii::app()->user->setFlash('success', " Data Saved");
				$this->redirect(array('adminsetpair'));
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

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['SettypeTugbarge']))
		{
			$model->attributes=$_POST['SettypeTugbarge'];

			$model->created_user=Yii::app()->user->id;
			$model->created_date=date("Y-m-d H:i:s");
			$model->ip_user_updated=$_SERVER['REMOTE_ADDR'];

			if($model->save())
			{
				$updatemodel =$this->loadModel($model->id_settype_tugbarge);
				$updatemodel->tug_power=$updatemodel->VesselTug->Power;
				$updatemodel->barge_capacity=$updatemodel->VesselBarge->BargeSize;
				$updatemodel->settype_name=$updatemodel->VesselTug->Power.",".$updatemodel->VesselBarge->BargeSize."ft";
				$updatemodel->save();

				Yii::app()->user->setFlash('success', " Data Updated");
				$this->redirect(array('admin'));
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
			Yii::app()->user->setFlash('success', " Data Deleted");
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
		throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	public function actionBreakpair($id)
	{
		//if(Yii::app()->request->isPostRequest)
		//{
			// we only allow deletion via POST request
			$model = $this->loadModel($id);
			$model->is_active = 0;
			$model = LogUserUpdated::setUserCreated($model);
			if($model->validate()){
				$model->save();
			}else{
				//echo "validate fail";
				echo CHtml::errorSummary($model);
			}

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
			Yii::app()->user->setFlash('success', " Set Pair (".$model->VesselTug->VesselName."-".$model->VesselBarge->VesselName.") has been released"); 
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('adminsetpair'));
		//}
		//else
		//	throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	public function actionFindtugset()
	{
		$tug= $_POST['SettypeTugbarge']['tug'];

		$criteria = new CDbCriteria();
		$criteria->condition = 'tug=:tug AND is_active = 1';
		$criteria->order = 'first_date DESC';
		$criteria->limit = 1;
		$criteria->params = array(':tug'=>$tug);
		$tugset=SettypeTugbarge::model()->find($criteria);


		if($tug!=''){
			if($tugset){
				echo "Vessel Tug Ini Sedang Berpasangan Dengan Vessel Barge <strong>".$tugset->VesselBarge->VesselName."</strong>";
			}

			else{
				echo "Vessel Tug Ini Tidak sedang Berpasangan";
			}
		}
	}

	public function actionFindbargeset()
	{
		$barge= $_POST['SettypeTugbarge']['barge'];

		$criteria = new CDbCriteria();
		$criteria->condition = 'barge=:barge AND is_active = 1';
		$criteria->order = 'first_date DESC';
		$criteria->limit = 1;
		$criteria->params = array(':barge'=>$barge);
		$bargeset=SettypeTugbarge::model()->find($criteria);


		if($barge!=''){
			if($bargeset){
				echo "Vessel Barge Ini Sedang Berpasangan Dengan Vessel Tug <strong>".$bargeset->VesselTug->VesselName."</strong>";
			}

			else{
				echo "Vessel Barge Ini Tidak sedang Berpasangan";
			}
		}
	}



	public function actionFindBargeVesselByTugVessel()
	{
		//$tug= $_POST['Quotation']['BargingVesselTug'];
		$tug=isset($_POST['Tug']) ?  $_POST['Tug'] : $_POST['Quotation']['BargingVesselTug'];

		$criteria = new CDbCriteria();
		$criteria->condition = 'tug=:tug  AND is_active = 1';
		$criteria->order = 'first_date DESC';
		$criteria->limit = 1;
		$criteria->params = array(':tug'=>$tug);
		$tugset=SettypeTugbarge::model()->find($criteria);


		if($tug!=''){
			if($tugset){
				
				$data=array();
				$data['id_vessel']=$tugset->VesselBarge->id_vessel;
				$data['VesselName']=$tugset->VesselBarge->VesselName;
				$data['message']=' ';
				echo CJSON::encode($data);
				//echo "Vessel Tug Ini Sedang Berpasangan Dengan Vessel Barge <strong>".$tugset->VesselBarge->VesselName."</strong>";
			}

			else{
				
				$data=array();
				$data['id_vessel']=' ';
				$data['VesselName']=' ';
				$data['message']='Vessel Tug Ini Tidak sedang Berpasangan';
				echo CJSON::encode($data);

				//echo "Vessel Tug Ini Tidak sedang Berpasangan";
			}
		}else{

				$data=array();
				$data['id_vessel']=' ';
				$data['VesselName']=' ';
				$data['message']=' ';
				echo CJSON::encode($data);

		}
	}


	public function actionFindBargeVesselByTugVesselondetail()
	{
		$tug= $_POST['QuotationDetailVessel']['BargingVesselTug'];

		$criteria = new CDbCriteria();
		$criteria->condition = 'tug=:tug AND is_active = 1';
		$criteria->order = 'first_date DESC';
		$criteria->limit = 1;
		$criteria->params = array(':tug'=>$tug);
		$tugset=SettypeTugbarge::model()->find($criteria);


		if($tug!=''){
			if($tugset){
				
				$data=array();
				$data['id_vessel']=$tugset->VesselBarge->id_vessel;
				$data['VesselName']=$tugset->VesselBarge->VesselName;
				$data['BargeSize']= $tugset->VesselBarge->BargeSize;
				$data['Capacity']= $tugset->VesselBarge->Capacity;
				$data['message']=' ';
				echo CJSON::encode($data);
				//echo "Vessel Tug Ini Sedang Berpasangan Dengan Vessel Barge <strong>".$tugset->VesselBarge->VesselName."</strong>";
			}

			else{
				
				$data=array();
				$data['id_vessel']=' ';
				$data['VesselName']=' ';
				$data['BargeSize']= ' ';
				$data['Capacity']=' ';
				$data['message']='Vessel Tug Ini Tidak sedang Berpasangan';
				echo CJSON::encode($data);

				//echo "Vessel Tug Ini Tidak sedang Berpasangan";
			}
		}else{

				$data=array();
				$data['id_vessel']=' ';
				$data['VesselName']=' ';
				$data['BargeSize']= ' ';
				$data['Capacity']=' ';
				$data['message']=' ';
				echo CJSON::encode($data);

		}
	}

	/**
	* Lists all models.
	*/
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('SettypeTugbarge');
		$this->render('index',array(
		'dataProvider'=>$dataProvider,
		));
	}

	/**
	* Manages all models.
	*/
	public function actionAdmin()
	{
		$model=new SettypeTugbarge('search');
		$model->unsetAttributes();  // clear any default values
		/*
		if(isset($_GET['SettypeTugbarge']))
		$model->attributes=$_GET['SettypeTugbarge'];
		*/

		if(isset($_GET['SettypeTugbarge'])){

			if(isset($_GET['SettypeTugbarge']['month'])){
				$model->attributes=$_GET['SettypeTugbarge'];
			}else{
				$model->attributes=$_GET['SettypeTugbarge'];
				$model->month=ltrim(date("m"),'0');
				$model->year=date("Y");
			}


		}else{
			$model->month=ltrim(date("m"),'0');
			$model->year=date("Y");

		}

		$this->render('admin',array(
		'model'=>$model,
		));
	}

	public function actionAdminsetpair()
	{
		$model=new SettypeTugbarge('search');
		$model->unsetAttributes();  // clear any default values
		
		if(isset($_GET['SettypeTugbarge']))
			$model->attributes=$_GET['SettypeTugbarge'];
		
		$model->is_active = 1; //Diambil dan display yang aktif saja
		$this->render('adminsetpair',array(
			'model'=>$model,
		));
	}

	public function actionClone($month,$year)
	{
		$datechoice=$year."-".$month."-01";
		$datechoicesplit = explode("-", $datechoice);

		$prevdate=$this->adddate($datechoice,"- 1 month");
		$datasplit = explode("-", $prevdate);
		$prevmonth=  ltrim($datasplit[1],'0');;
		$prevyear=  $datasplit[0];

		$formatprevdate = new DateTime($prevdate);
		$formatprevmonth = $formatprevdate->format('F');

		$criteria = new CDbCriteria();
		$criteria->condition = 'month=:month AND year=:year';
		$criteria->params = array(':month'=>$prevmonth,':year'=>$prevyear);
		$tugbarge=SettypeTugbarge::model()->findAll($criteria);
		$total_data=count($tugbarge);

		if($total_data==0){
			Yii::app()->user->setFlash('error', "Tidak Bisa Mencopy Data dari Bulan $formatprevmonth Tahun $prevyear dikarenakan data belum ada");
			$this->redirect(array('admin'));
		}else{
			$daterealnow=date("Y-m-d H:i:s");
			foreach($tugbarge as $list_tugbarge){
				//echo $list_tugbarge->id_settype_tugbarge.'<br>';
				$newtugbarge= new SettypeTugbarge;
				$newtugbarge->month=$datechoicesplit[1];
				$newtugbarge->year=$datechoicesplit[0];
				$newtugbarge->first_date=$datechoice;
				$newtugbarge->tug=$list_tugbarge->tug;
				$newtugbarge->barge=$list_tugbarge->barge;
				$newtugbarge->tug_power=$list_tugbarge->tug_power;
				$newtugbarge->barge_capacity=$list_tugbarge->barge_capacity;
				$newtugbarge->settype_name=$list_tugbarge->settype_name;
				$newtugbarge->created_user=Yii::app()->user->id;
				$newtugbarge->created_date=$daterealnow;
				$newtugbarge->ip_user_updated=$_SERVER['REMOTE_ADDR'];
				$newtugbarge->save();
			}

			Yii::app()->user->setFlash('success', "Data Berhasil Di Copy");
			$this->redirect(array('admin'));
		}


	}

	public function adddate($vardate,$added)
	{
		$data = explode("-", $vardate);
		$date = new DateTime();
		$date->setDate($data[0], $data[1], $data[2]);
		$date->modify("".$added."");
		$day= $date->format("Y-m-d");
		return $day;
	}

	/**
	* Returns the data model based on the primary key given in the GET variable.
	* If the data model is not found, an HTTP exception will be raised.
	* @param integer the ID of the model to be loaded
	*/
	public function loadModel($id)
	{
		$model=SettypeTugbarge::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='settype-tugbarge-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
