<?php

class TimesheetController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    
    
    public $layout = '//layouts/triplets';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            /*
              array('allow',  // allow all users to perform 'index' and 'view' actions
              'actions'=>array('index','view'),
              'users'=>array('*'),
              ),
             */
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update', 'insert', 'autoposition', 'index', 'view'),
                //'users'=>array('@'),
                'roles' => array('ADM', 'NAU', 'SOA'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete', 'update_daily', 'report', 'viewreport', 'autoposition', 'findTypeMstActivity'),
                //'users'=>array('@'),
                'roles' => array('ADM', 'NAU', 'SOA'),
            ),
			
			//Timesheet Plan
			 array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('timesheetplan'),
                //'users'=>array('@'),
                'roles' => array('ADM', 'NAU', 'SOA'),
            ),
			
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        if (Yii::app()->request->getIsAjaxRequest()) {
            echo $this->renderPartial('view', array('model' => $this->loadModel($id)), true, true); //This will bring out the view along with its script.
        } else
            $this->render('view', array(
                'model' => $this->loadModel($id),
            ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate($id) {
        $model = new Timesheet;
        $modelvoyage = $this->loadModelvoyage($id);

        $criteria = new CDbCriteria();
        $criteria->condition = 'id_voyage_order =:id_voyage_order';
        $criteria->params = array(':id_voyage_order' => $id);
        $criteria->order = "StartDate desc";
        $criteria->limit = 1;
        $prevActivity = Timesheet::model()->find($criteria);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Timesheet'])) {
            $model->attributes = $_POST['Timesheet'];

            $model->id_voyage_order = $id;
            //$model->updated_user=Yii::app()->user->id;
            $model->updated_date = date("Y-m-d H:i:s");
            $model->ip_user_updated = $_SERVER['REMOTE_ADDR'];
			$model->Duration = 0;
            if ($model->save()) {
				/*
                $criteriaThisTimesheet = new CDbCriteria();
                $criteriaThisTimesheet->condition = 'id_voyage_order =:id_voyage_order';
                $criteriaThisTimesheet->params = array(':id_voyage_order' => $model->id_voyage_order);
                $criteriaThisTimesheet->order = "StartDate asc";
                $ThisTimeSheet = Timesheet::model()->findAll($criteriaThisTimesheet);

                if (count($ThisTimeSheet) == 1) {
                    foreach ($ThisTimeSheet as $listThisTimeSheet) {
                        $listThisTimeSheet->Duration = 0;
                        $listThisTimeSheet->save(false);
                    }
                }

                if (count($ThisTimeSheet) > 1) {
                    foreach ($ThisTimeSheet as $listThisTimeSheet) {

                        if ($listThisTimeSheet->Category->type == 'DURATION') {
                            $listThisTimeSheet->Duration = TimeSheetDB::getsDurationByPreviousData(
                                            $listThisTimeSheet->id_timesheet, $listThisTimeSheet->id_voyage_order, $listThisTimeSheet->StartDate);
                        }
                        if ($listThisTimeSheet->Category->type == 'POINT') {
                            $listThisTimeSheet->Duration = 0;
                        }
                        $listThisTimeSheet->save(false);
                    }
                }
				*/

                //Save Summary
                $this->SaveSummary($model->id_voyage_order); // save sumary
                //Save Actual Data Voyage
                TimeSheetDB::updateActualVoyageDate($id);
                // Update previous data
                //TimeSheetDB::

                Yii::app()->user->setFlash('success', "Data item activity has been saved");

                if (isset($_GET['inVoyageClose'])) {
                    $this->redirect(array('update_daily', 'id' => $model->id_voyage_order, 'inVoyageClose' => 1));
                } else {
                    $this->redirect(array('update_daily', 'id' => $model->id_voyage_order));
                }
            }
        }

        if (Yii::app()->request->getIsAjaxRequest()) {
            echo $this->renderPartial('create', array('model' => $model), true, true); //This will bring out the view along with its script.
        } else
            $this->render('create', array(
                'model' => $model,
                'modelvoyage' => $modelvoyage,
                'prevActivity' => $prevActivity,
            ));
    }

    public function actionInsert($id, $StartDate) {
        $model = new Timesheet;
        $modelvoyage = $this->loadModelvoyage($id);

        $criteria = new CDbCriteria();
        $criteria->condition = 'id_voyage_order =:id_voyage_order AND StartDate = :StartDate';
        $criteria->params = array(':id_voyage_order' => $id, ':StartDate' => $StartDate);
        $criteria->order = "StartDate desc";
        $criteria->limit = 1;
        $prevActivity = Timesheet::model()->find($criteria);

        $criterianext = new CDbCriteria();
        $criterianext->condition = 'id_voyage_order =:id_voyage_order AND StartDate > :StartDate';
        $criterianext->params = array(':id_voyage_order' => $id, ':StartDate' => $StartDate);
        $criterianext->order = "StartDate asc";
        $criterianext->limit = 1;
        $nextActivity = Timesheet::model()->find($criterianext);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Timesheet'])) {
            $model->attributes = $_POST['Timesheet'];


            $model->id_voyage_order = $id;
            //$model->updated_user=Yii::app()->user->id;
            $model->updated_date = date("Y-m-d H:i:s");
            $model->ip_user_updated = $_SERVER['REMOTE_ADDR'];

            if ($model->save()) {

                $criteriaThisTimesheet = new CDbCriteria();
                $criteriaThisTimesheet->condition = 'id_voyage_order =:id_voyage_order';
                $criteriaThisTimesheet->params = array(':id_voyage_order' => $model->id_voyage_order);
                $criteriaThisTimesheet->order = "StartDate asc";
                $ThisTimeSheet = Timesheet::model()->findAll($criteriaThisTimesheet);

                if (count($ThisTimeSheet) == 1) {
                    foreach ($ThisTimeSheet as $listThisTimeSheet) {
                        $listThisTimeSheet->Duration = 0;
                        $listThisTimeSheet->save(false);
                    }
                }

                if (count($ThisTimeSheet) > 1) {
                    foreach ($ThisTimeSheet as $listThisTimeSheet) {
                        if ($listThisTimeSheet->Category->type == 'DURATION') {
                            $listThisTimeSheet->Duration = TimeSheetDB::getsDurationByPreviousData($listThisTimeSheet->id_timesheet, $listThisTimeSheet->id_voyage_order, $listThisTimeSheet->StartDate);
                        }
                        if ($listThisTimeSheet->Category->type == 'POINT') {
                            $listThisTimeSheet->Duration = 0;
                        }
                        $listThisTimeSheet->save(false);
                    }
                }


                $this->SaveSummary($model->id_voyage_order); // save sumary


                Yii::app()->user->setFlash('success', " Data Saved");

                if (isset($_GET['inVoyageClose'])) {
                    $this->redirect(array('update_daily', 'id' => $model->id_voyage_order, 'inVoyageClose' => 1));
                } else {
                    $this->redirect(array('update_daily', 'id' => $model->id_voyage_order));
                }
            }
        }
        if (Yii::app()->request->getIsAjaxRequest()) {
            echo $this->renderPartial('Insert', array('model' => $model), true, true); //This will bring out the view along with its script.
        } else
            $this->render('Insert', array(
                'model' => $model,
                'modelvoyage' => $modelvoyage,
                'prevActivity' => $prevActivity,
                'nextActivity' => $nextActivity,
            ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        $modelvoyage = $this->loadModelvoyage($model->id_voyage_order);

        $criteria = new CDbCriteria();
        $criteria->condition = 'id_voyage_order =:id_voyage_order AND StartDate < :StartDate';
        $criteria->params = array(':id_voyage_order' => $model->id_voyage_order, ':StartDate' => $model->StartDate);
        $criteria->order = "StartDate desc";
        $criteria->limit = 1;
        $prevActivity = Timesheet::model()->find($criteria);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Timesheet'])) {
            $model->attributes = $_POST['Timesheet'];



            $model->updated_date = date("Y-m-d H:i:s");
            $model->ip_user_updated = $_SERVER['REMOTE_ADDR'];
            if ($model->save()) {

                $criteriaThisTimesheet = new CDbCriteria();
                $criteriaThisTimesheet->condition = 'id_voyage_order =:id_voyage_order';
                $criteriaThisTimesheet->params = array(':id_voyage_order' => $model->id_voyage_order);
                $criteriaThisTimesheet->order = "StartDate asc";
                $ThisTimeSheet = Timesheet::model()->findAll($criteriaThisTimesheet);

                if (count($ThisTimeSheet) == 1) {
                    foreach ($ThisTimeSheet as $listThisTimeSheet) {
                        $listThisTimeSheet->Duration = 0;
                        $listThisTimeSheet->save(false);
                    }
                }

                if (count($ThisTimeSheet) > 1) {
                    foreach ($ThisTimeSheet as $listThisTimeSheet) {
                        //$listThisTimeSheet->Duration=TimeSheetDB::getsDurationByPreviousData($listThisTimeSheet->id_timesheet,$listThisTimeSheet->id_voyage_order,$listThisTimeSheet->StartDate);
                        if ($listThisTimeSheet->Category->type == 'DURATION') {
                            $listThisTimeSheet->Duration = TimeSheetDB::getsDurationByPreviousData($listThisTimeSheet->id_timesheet, $listThisTimeSheet->id_voyage_order, $listThisTimeSheet->StartDate);
                        }
                        if ($listThisTimeSheet->Category->type == 'POINT') {
                            $listThisTimeSheet->Duration = 0;
                        }
                        $listThisTimeSheet->save(false);
                    }
                }


                $this->SaveSummary($model->id_voyage_order); // save sumary

                Yii::app()->user->setFlash('success', " Data Updated");

                if (isset($_GET['inVoyageClose'])) {
                    $this->redirect(array('update_daily', 'id' => $model->id_voyage_order, 'inVoyageClose' => 1));
                } else {
                    $this->redirect(array('update_daily', 'id' => $model->id_voyage_order));
                }
            }
        }

        if (Yii::app()->request->getIsAjaxRequest()) {
            echo $this->renderPartial('update', array('model' => $model), true, true); //This will bring out the view along with its script.
        } else
            $this->render('update', array(
                'model' => $model,
                'modelvoyage' => $modelvoyage,
                'prevActivity' => $prevActivity,
            ));
    }

    public function actionFindTypeMstActivity() {
        $id = $_POST['Timesheet']['id_voyage_activity'];

        $criteria = new CDbCriteria();
        $criteria->condition = 'id_voyage_activity=:id_voyage_activity';
        $criteria->params = array(':id_voyage_activity' => $id);
        $MSTVoyageActivity = VoyageMstActivity::model()->find($criteria);


        if ($id != '') {
            if ($MSTVoyageActivity) {
                echo $MSTVoyageActivity->type;
            } else {
                echo '';
            }
        } else {
            echo '';
        }
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id, $id_voyage_order) {
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request


            $this->loadModel($id)->delete();

            $criteriaThisTimesheet = new CDbCriteria();
            $criteriaThisTimesheet->condition = 'id_voyage_order =:id_voyage_order';
            $criteriaThisTimesheet->params = array(':id_voyage_order' => $id_voyage_order);
            $criteriaThisTimesheet->order = "StartDate asc";
            $ThisTimeSheet = Timesheet::model()->findAll($criteriaThisTimesheet);

            if (count($ThisTimeSheet) == 1) {
                foreach ($ThisTimeSheet as $listThisTimeSheet) {
                    $listThisTimeSheet->Duration = 0;
                    $listThisTimeSheet->save(false);
                }
            }

            if (count($ThisTimeSheet) > 1) {
                foreach ($ThisTimeSheet as $listThisTimeSheet) {
                    //$listThisTimeSheet->Duration=TimeSheetDB::getsDurationByPreviousData($listThisTimeSheet->id_timesheet,$listThisTimeSheet->id_voyage_order,$listThisTimeSheet->StartDate);
                    if ($listThisTimeSheet->Category->type == 'DURATION') {
                        $listThisTimeSheet->Duration = TimeSheetDB::getsDurationByPreviousData($listThisTimeSheet->id_timesheet, $listThisTimeSheet->id_voyage_order, $listThisTimeSheet->StartDate);
                    }
                    if ($listThisTimeSheet->Category->type == 'POINT') {
                        $listThisTimeSheet->Duration = 0;
                    }
                    $listThisTimeSheet->save(false);
                }
            }

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        } else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Timesheet');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Timesheet('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Timesheet']))
            $model->attributes = $_GET['Timesheet'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    public function actionUpdate_daily($id) {
        $model = new Timesheet('searchbyvoyage');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Timesheet']))
            $model->attributes = $_GET['Timesheet'];

        $modelvoyage = $this->loadModelvoyage($id);
        
       // $command = Timesheet::model()->getData($id);
        
        $this->render('update_daily', array(
            'model' => $model,
            'modelvoyage' => $modelvoyage,
          //  'command' => $command,
        ));
    }
	
	public function actionTimesheetplan($id) {
        $model = new Timesheet('searchbyvoyage');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Timesheet']))
            $model->attributes = $_GET['Timesheet'];

        $modelvoyage = $this->loadModelvoyage($id);
        
       // $command = Timesheet::model()->getData($id);
        
        $this->render('timesheetplan', array(
            'model' => $model,
            'modelvoyage' => $modelvoyage,
          //  'command' => $command,
        ));
    }

    public function actionViewreport($id) {
        $this->layout = '//layouts/laporan';
        $model = new Timesheet('searchbyvoyage');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Timesheet']))
            $model->attributes = $_GET['Timesheet'];

        $modelvoyage = $this->loadModelvoyage($id);

		/*
        $criteriapark = new CDbCriteria();
        $criteriapark->condition = 'id_voyage_order =:id_voyage_order AND PortCategory=:PortCategory';
        $criteriapark->params = array(':id_voyage_order' => $modelvoyage->id_voyage_order, ':PortCategory' => 'PARK');
        $criteriapark->order = "StartDate asc";
        $park = Timesheet::model()->findAll($criteriapark);
		*/
		$criteriapark = new CDbCriteria();
        $criteriapark->condition = 'id_voyage_order =:id_voyage_order';
        $criteriapark->params = array(':id_voyage_order' => $modelvoyage->id_voyage_order);
        $criteriapark->order = "StartDate asc";
        $park = Timesheet::model()->findAll($criteriapark);

        $criteriastart = new CDbCriteria();
        $criteriastart->condition = 'id_voyage_order =:id_voyage_order AND PortCategory=:PortCategory';
        $criteriastart->params = array(':id_voyage_order' => $modelvoyage->id_voyage_order, ':PortCategory' => 'START');
        $criteriastart->order = "StartDate asc";
        $start = Timesheet::model()->findAll($criteriastart);

        $criteriaend = new CDbCriteria();
        $criteriaend->condition = 'id_voyage_order =:id_voyage_order AND PortCategory=:PortCategory';
        $criteriaend->params = array(':id_voyage_order' => $modelvoyage->id_voyage_order, ':PortCategory' => 'END');
        $criteriaend->order = "StartDate asc";
        $end = Timesheet::model()->findAll($criteriaend);


        $this->render('report', array(
            'model' => $model,
            'modelvoyage' => $modelvoyage,
            'park' => $park,
            'start' => $start,
            'end' => $end,
        ));
    }

    public function actionreport($id) {
        $this->layout = '//layouts/laporan';
        $model = new Timesheet('searchbyvoyage');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Timesheet']))
            $model->attributes = $_GET['Timesheet'];

        $modelvoyage = $this->loadModelvoyage($id);

        $criteriapark = new CDbCriteria();
        $criteriapark->condition = 'id_voyage_order =:id_voyage_order AND PortCategory=:PortCategory';
        $criteriapark->params = array(':id_voyage_order' => $modelvoyage->id_voyage_order, ':PortCategory' => 'PARK');
        $criteriapark->order = "StartDate asc";
        $park = Timesheet::model()->findAll($criteriapark);

        $criteriastart = new CDbCriteria();
        $criteriastart->condition = 'id_voyage_order =:id_voyage_order AND PortCategory=:PortCategory';
        $criteriastart->params = array(':id_voyage_order' => $modelvoyage->id_voyage_order, ':PortCategory' => 'START');
        $criteriastart->order = "StartDate asc";
        $start = Timesheet::model()->findAll($criteriastart);

        $criteriaend = new CDbCriteria();
        $criteriaend->condition = 'id_voyage_order =:id_voyage_order AND PortCategory=:PortCategory';
        $criteriaend->params = array(':id_voyage_order' => $modelvoyage->id_voyage_order, ':PortCategory' => 'END');
        $criteriaend->order = "StartDate asc";
        $end = Timesheet::model()->findAll($criteriaend);

        $mPDF1 = Yii::app()->ePdf->mpdf();
        $mPDF1 = Yii::app()->ePdf->mpdf('c', 'A4');
        $mPDF1 = Yii::app()->ePdf->mpdf('', // mode - default ''
                '', // format - A4, for example, default ''
                0, // font size - default 0
                '', // default font family
                15, // margin_left
                15, // margin right
                15, // margin top
                16, // margin bottom
                9, // margin header
                9, // margin footer
                'L');  // L - landscape, P - portrait
        //$mPDF1->SetHTMLHeader("<hr>");
        //$mPDF1->SetHTMLHeader('header');
        //$mPDF1->SetDisplayMode('fullpage');
        //$mPDF1->Output();
        $mPDF1->WriteHTML(
                $this->render('report', array(
                    'model' => $model,
                    'modelvoyage' => $modelvoyage,
                    'park' => $park,
                    'start' => $start,
                    'end' => $end,
                        ), true)
        );

        $mPDF1->Output();
    }

    public function actionAutoposition() {
        $res = array();
        $row = array();
        if (isset($_GET['search'])) {
            $sql = "SELECT * FROM  jetty WHERE JettyName LIKE :JettyName ";
            $command = Yii::app()->db->createCommand($sql);
            $command->bindValue(":JettyName", '' . '%' . $_GET['search'] . '%', PDO::PARAM_STR);
            $res = $command->queryAll();
            foreach ($res as $value):
                $row[] = array(
                    'id' => $value['JettyId'], // return value from autocomplete 
                    'nama' => $value['JettyName'],
                );
            endforeach;
        }
        echo CJSON::encode($row);
        Yii::app()->end();
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = Timesheet::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    public function SaveSummary($id_voyage_order) {


        $mstTimesheetSummary = MstTimesheetSummary::model()->findAllByAttributes(array('is_active' => 1));

        foreach ($mstTimesheetSummary as $list_mstTimesheetSummary) {

            $existData = TimesheetSummary::model()->findByAttributes(array('id_voyage_order' => $id_voyage_order, 'id_mst_timesheet_summary' => $list_mstTimesheetSummary->id_mst_timesheet_summary));
            if ($existData) {
                $model = $existData;
            } else {
                $model = new TimesheetSummary;
            }

            $model->id_voyage_order = $id_voyage_order;
            $model->id_mst_timesheet_summary = $list_mstTimesheetSummary->id_mst_timesheet_summary;
            $model->value = TimeSheetDB::getTotalSumaryTimesheet($id_voyage_order, $list_mstTimesheetSummary->id_mst_timesheet_summary);
            $model->save();
        }

        return $mstTimesheetSummary;
    }

    public function loadVo($id, $id_voyage_order){
        $model = Timesheet::model()->findByPk($id);
        $existData = Timesheet::model()->findByAttributes(array('id_timesheet' => $id, 'id_voyage_order' => $id_voyage_order));
        
        return $existData;
    }
    
    public function loadModelvoyage($id) {
        $model = VoyageOrder::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }
   
    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'timesheet-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
