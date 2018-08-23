<?php

class MasterScheduleController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/twoplets';

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
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('master', 'display', 'docking', 'displayMaster',
                    'addschedule',
                    'rejectschedule', 'rejectscheduleoffhired', 'rejectscheduleplan',
                    'mastervessel','msttemplate'
                ),
                'roles' => array('VPC', 'ADM'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('displaytimesheet', 'mastervieweredit'
                ),
                'roles' => array('VPC', 'ADM'),
            ),
            array('allow', // Master Viewer bisa dilihat siapa saja asal sudah login
                'actions' => array('masterviewer', 'displayMasterviewer', 'viewdetail', 'viewdetailOnly',
                    'mastervesselviewer', 'deletevoyageplan', 'deleteschedulerepairdocking',
                ),
                'users' => array('@'),
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
    public function actionDisplayMaster($month = "", $year = "", $viewer = false) {
        if (isset($_GET['yt0'])) {
            $month = isset($_GET['Month']) ? $_GET['Month'] : 0;
            $year = isset($_GET['Year']) ? $_GET['Year'] : 0;
            $this->redirect(array('displayMaster', 'month' => $month, 'year' => $year, 'viewer' => $viewer));
        }

        if ($month > 0 && $year > 0) {
            $this->render('schedule', array(
                'month' => $month,
                'year' => $year,
                'viewer' => $viewer,
            ));
        }
    }

    public function actionDisplayMasterviewer($month = "", $year = "", $viewer = true, $mode = "active_pair") {
        if (isset($_GET['yt0'])) {
            $month = isset($_GET['Month']) ? $_GET['Month'] : 0;
            $year = isset($_GET['Year']) ? $_GET['Year'] : 0;
            if (isset($_GET['mode_pair'])) {
                $mode = $_GET['mode_pair'];
            }
            $this->redirect(array('displayMasterviewer', 'month' => $month, 'year' => $year, 'viewer' => $viewer, 'mode' => $mode));
        }

        if ($month > 0 && $year > 0) {
            $this->render('schedule', array(
                'month' => $month,
                'year' => $year,
                'viewer' => $viewer,
                'mode' => $mode,
            ));
        }
    }

    public function actionMaster() {
        $month = isset($_GET['monthseacrh']) ? $_GET['monthseacrh'] : date("m");
        $year = isset($_GET['yearseacrh']) ? $_GET['yearseacrh'] : date("Y");

        if (isset($_GET['yt0'])) {
            $month = isset($_GET['Month']) ? $_GET['Month'] : 0;
            $year = isset($_GET['Year']) ? $_GET['Year'] : 0;
            $this->redirect(array('displayMaster', 'month' => $month, 'year' => $year, 'viewer' => false));
        }

        $this->render('schedule', array(
            'month' => $month,
            'year' => $year,
            'viewer' => false,
        ));
    }

    public function actionMasterviewer($mode = "active_pair") {
        $month = isset($_GET['monthseacrh']) ? $_GET['monthseacrh'] : date("m");
        $year = isset($_GET['yearseacrh']) ? $_GET['yearseacrh'] : date("Y");

        if (isset($_GET['yt0'])) {
            $month = isset($_GET['Month']) ? $_GET['Month'] : 0;
            $year = isset($_GET['Year']) ? $_GET['Year'] : 0;
            $this->redirect(array('displayMasterviewer', 'month' => $month, 'year' => $year, 'viewer' => true));
        }

        $this->render('schedule', array(
            'month' => $month,
            'year' => $year,
            'viewer' => true,
            'mode' => $mode,
			'editschedule' => false,
        ));
    }
	
	public function actionMastervieweredit($mode = "active_pair") {
        $month = isset($_GET['monthseacrh']) ? $_GET['monthseacrh'] : date("m");
        $year = isset($_GET['yearseacrh']) ? $_GET['yearseacrh'] : date("Y");

        if (isset($_GET['yt0'])) {
            $month = isset($_GET['Month']) ? $_GET['Month'] : 0;
            $year = isset($_GET['Year']) ? $_GET['Year'] : 0;
            $this->redirect(array('displayMasterviewer', 'month' => $month, 'year' => $year, 'viewer' => true));
        }

        $this->render('schedule', array(
            'month' => $month,
            'year' => $year,
            'viewer' => true,
            'mode' => $mode,
			'editschedule' => true,
        ));
    }

    public function actionMastervessel($month = "", $year = "", $viewer = true) {
        if ($month == "")
            $month = isset($_GET['monthseacrh']) ? $_GET['monthseacrh'] : date("m");

        if ($year == "")
            $year = isset($_GET['yearseacrh']) ? $_GET['yearseacrh'] : date("Y");

        if (isset($_GET['yt0'])) {
            $month = isset($_GET['Month']) ? $_GET['Month'] : 0;
            $year = isset($_GET['Year']) ? $_GET['Year'] : 0;
            $this->redirect(array('mastervessel', 'month' => $month, 'year' => $year, 'viewer' => false));
        }

        $this->render('schedulevessel', array(
            'month' => $month,
            'year' => $year,
            'viewer' => false,
        ));
    }

    public function actionMastervesselviewer($month = "", $year = "", $viewer = true) {
        if ($month == "")
            $month = isset($_GET['monthseacrh']) ? $_GET['monthseacrh'] : date("m");

        if ($year == "")
            $year = isset($_GET['yearseacrh']) ? $_GET['yearseacrh'] : date("Y");

        if (isset($_GET['yt0'])) {
            $month = isset($_GET['Month']) ? $_GET['Month'] : 0;
            $year = isset($_GET['Year']) ? $_GET['Year'] : 0;
            $this->redirect(array('mastervessel', 'month' => $month, 'year' => $year, 'viewer' => true));
        }

        $this->render('schedulevessel', array(
            'month' => $month,
            'year' => $year,
            'viewer' => true,
        ));
    }

    public function actionDisplay() {
        $this->render('jadwal', array(
        ));
    }

    public function actionDisplaytimesheet($id_vo) {
        $this->render('viewtimesheet', array(
            'id_voyage_order' => $id_vo,
        ));
    }

    public function actionAddschedule($id_tug, $id_barge, $status, $menu = "master") {
        $model = new Schedule;

        if (isset($_POST['Schedule'])) {
            $model->attributes = $_POST['Schedule'];
            $model->created_user = Yii::app()->user->id;
            $model->created_date = date("Y-m-d H:i:s");
            $model->ip_user_updated = $_SERVER['REMOTE_ADDR'];

            if ($model->save()) {

                if ($model->id_vessel_status == 20) { // REPAIR
                    if (isset($_POST['id_request_for_schedule'])) {

                        $modelUpdateScheduleRepair = Schedule::model()->findByPk($model->id_schedule);
                        // insert no nya 
                        $dataformatnumber = NumberingDocumentRepairScheduleDB::getFormatNumber($modelUpdateScheduleRepair, 'id_schedule', 'SchNo', 'SchMonth', 'SchYear', $model->id_schedule);
                        $modelUpdateScheduleRepair->SchNumber = $dataformatnumber['NumberFormat'];
                        $modelUpdateScheduleRepair->SchNo = $dataformatnumber['NoOrder'];
                        $modelUpdateScheduleRepair->SchMonth = NumberingDocumentRepairScheduleDB::getMonthNow();
                        $modelUpdateScheduleRepair->SchYear = NumberingDocumentRepairScheduleDB::getYearNow();
                        $modelUpdateScheduleRepair->save(false);

                        $modelScheduleRequset = RequestForSchedule::model()->findByPk($_POST['id_request_for_schedule']);
                        $modelScheduleRequset->status_rfs = 'APPROVED';
                        $modelScheduleRequset = LogUserUpdated::setUserApproved($modelScheduleRequset);
                        $modelScheduleRequset->save(false);

                        NotificationDB::sendApprovedNotificationRepairAndDocking($modelScheduleRequset, 1);
                    }
                }

                if ($model->id_vessel_status == 30) { //DOCKING
                    if (isset($_POST['id_request_for_schedule'])) {
                        $modelUpdateScheduleRepair = Schedule::model()->findByPk($model->id_schedule);
                        // insert no nya 
                        $dataformatnumber = NumberingDocumentRepairScheduleDB::getFormatNumber($modelUpdateScheduleRepair, 'id_schedule', 'SchNo', 'SchMonth', 'SchYear', $model->id_schedule);
                        $modelUpdateScheduleRepair->SchNumber = $dataformatnumber['NumberFormat'];
                        $modelUpdateScheduleRepair->SchNo = $dataformatnumber['NoOrder'];
                        $modelUpdateScheduleRepair->SchMonth = NumberingDocumentRepairScheduleDB::getMonthNow();
                        $modelUpdateScheduleRepair->SchYear = NumberingDocumentRepairScheduleDB::getYearNow();
                        $modelUpdateScheduleRepair->save(false);
                        
                        $modelScheduleRequset = RequestForSchedule::model()->findByPk($_POST['id_request_for_schedule']);
                        $modelScheduleRequset->status_rfs = 'APPROVED';
                        $modelScheduleRequset = LogUserUpdated::setUserApproved($modelScheduleRequset);
                        $modelScheduleRequset->save(false);

                        NotificationDB::sendApprovedNotificationRepairAndDocking($modelScheduleRequset, 1);
                    }
                }

                if ($model->id_vessel_status == 50) {
                    if (isset($_POST['Schedule']['id_so_offhired_order'])) {
                        $modelScheduleRequset = SoOffhiredOrder::model()->findByPk($_POST['Schedule']['id_so_offhired_order']);
                        $modelScheduleRequset->status = 'APPROVED';
                        $modelScheduleRequset->save(false);
                        NotificationDB::sendApprovedNotificationscheduleOffHired($modelScheduleRequset, 1);
                    }
                }

                if ($model->id_vessel_status == 60) {
                    if (isset($_POST['id_vessel_maintenance_plan'])) {
                        $modelPlan = VesselMaintenancePlan::model()->findByPk($_POST['id_vessel_maintenance_plan']);
                        $modelPlan->status = 'APPROVED';

                        // insert repair no nya 
                        $dataformatnumber = NumberingDocumentRepairNoDB::getFormatNumber($modelPlan, 'id_vessel_maintenance_plan', 'No', 'NoMonth', 'NoYear', $modelPlan->id_vessel_maintenance_plan);
                        $modelPlan->repair_no = $dataformatnumber['NumberFormat'];
                        $modelPlan->No = $dataformatnumber['NoOrder'];
                        $modelPlan->NoMonth = NumberingDocumentRepairNoDB::getMonthNow();
                        $modelPlan->NoYear = NumberingDocumentRepairNoDB::getYearNow();
                        //$modelPlan->repair_no='Repair123'; 

                        $modelPlan = LogUserUpdated::setUserApproved($modelPlan);
                        $modelPlan->save(false);

                        // update data id_vessel_plannya
                        $modelupdateschedule = $this->loadModel($model->id_schedule);
                        $modelupdateschedule->id_vessel_maintenance_plan = $_POST['id_vessel_maintenance_plan'];
                        $modelupdateschedule->save(false);

                        NotificationDB::sendApprovedNotificationMaintenance($modelPlan, 1);
                    }
                }

                $monthsel = Timeanddate::getMonthOnlyString($model->StartDate);
                $yearsel = Timeanddate::getYearOnlyString($model->StartDate);
                Yii::app()->user->setFlash('success', " Data Saved");
                //Set Break jika BreakDown
                if ($model->id_vessel_status == 20) {

                    if (isset($_POST['TypeBreakDown'])) {
                        $STATUS_BREAKDOWN = isset($_POST['TypeBreakDown']) ? $_POST['TypeBreakDown'] : "";
                        if ($STATUS_BREAKDOWN == "BREAKDOWN") {

                            $model->status_breakdown = "BREAKDOWN";
                            $model->save();

                            //BREAK PAIR
                            SetTypeDB::setBreakpair($model->VesselTugId, $model->VesselBargeId);
                            Yii::app()->user->setFlash('success', " Data Saved. Pair has broken");
                            $this->redirect(array("mastervessel", 'monthseacrh' => $monthsel, 'yearseacrh' => $yearsel));
                        }
                    }
                    //echo $_POST['TypeBreakDown']; exit();
                }

                //$this->redirect(array('master'));				
                $this->redirect(array($menu, 'monthseacrh' => $monthsel, 'yearseacrh' => $yearsel));
                //$this->redirect(array($menu));
            }
        }

        if (Yii::app()->request->getIsAjaxRequest()) {
            echo $this->renderPartial('addschedule', array(
                'model' => $model,
                'id_tug' => $id_tug,
                'id_barge' => $id_barge,
                'status' => $status,
                    ), true, true);
        } else
            $this->render('addschedule', array(
                'model' => $model,
                'id_tug' => $id_tug,
                'id_barge' => $id_barge,
                'status' => $status,
            ));
    }

    /*
      public function actionRepair()
      {
      if(Yii::app()->request->getIsAjaxRequest())
      {
      echo $this->renderPartial('RepairAE',true,true);//This will bring out the view along with its script.
      }
      else
      $this->render('RepairAE',array(
      ));
      }
     */

    public function actionDocking() {
        if (Yii::app()->request->getIsAjaxRequest()) {
            echo $this->renderPartial('docking', true, true); //This will bring out the view along with its script.
        } else
            $this->render('docking', array(
            ));
    }

    public function actionrejectschedule($id_request_for_schedule, $id_tug, $id_barge, $status) {

        $modelScheduleRequset = RequestForSchedule::model()->findByPk($id_request_for_schedule);
        $modelScheduleRequset->status_rfs = 'REJECTED';
        $modelScheduleRequset = LogUserUpdated::setUserApproved($modelScheduleRequset);
        $modelScheduleRequset->save(false);

        NotificationDB::sendApprovedNotificationRepairAndDocking($modelScheduleRequset, 0);

        Yii::app()->user->setFlash('success', " Data Request Schedule has been Rejected");
        //$this->redirect(array('admin','id'=>$model->id_schedule));
        $this->redirect(array('master'));
    }

    public function actionrejectscheduleoffhired($id_so_offhired_order, $id_tug, $id_barge, $status) {

        $modelScheduleRequset = SoOffhiredOrder::model()->findByPk($id_so_offhired_order);
        $modelScheduleRequset->status = 'REJECTED';
        $modelScheduleRequset = LogUserUpdated::setUserApproved($modelScheduleRequset);
        $modelScheduleRequset->save(false);

        NotificationDB::sendApprovedNotificationscheduleOffHired($modelScheduleRequset, 0);


        Yii::app()->user->setFlash('success', " Data Request Schedule has been Rejected");
        //$this->redirect(array('admin','id'=>$model->id_schedule));
        $this->redirect(array('master'));
    }

    public function actionrejectscheduleplan($id_vessel_maintenance_plan, $id_tug, $id_barge, $status) {

        $modelPlan = VesselMaintenancePlan::model()->findByPk($id_vessel_maintenance_plan);
        $modelPlan->status = 'REJECTED';
        $modelPlan = LogUserUpdated::setUserApproved($modelPlan);
        $modelPlan->save(false);

        NotificationDB::sendApprovedNotificationMaintenance($modelPlan, 0);

        Yii::app()->user->setFlash('success', " Data Request Schedule Maintenance has been Rejected");
        //$this->redirect(array('admin','id'=>$model->id_schedule));
        $this->redirect(array('master'));
    }

    public function actionViewdetail($id) {

        $model = $this->loadModel($id);

        if (isset($_POST['Schedule'])) {
            $model->attributes = $_POST['Schedule'];
            $model->created_user = Yii::app()->user->id;
            $model->created_date = date("Y-m-d H:i:s");
            $model->ip_user_updated = $_SERVER['REMOTE_ADDR'];

            if ($model->save()) {
                Yii::app()->user->setFlash('success', " Data Schedule has been Updated");
                $this->redirect(array('master'));
            }
        }


        if (Yii::app()->request->getIsAjaxRequest()) {
            echo $this->renderPartial('viewdetail', array('model' => $this->loadModel($id)), true, true); //This will bring out the view along with its script.
        } else
            $this->render('viewdetail', array(
                'model' => $this->loadModel($id),
            ));
    }

    public function actionViewdetailOnly($id) {



        if (Yii::app()->request->getIsAjaxRequest()) {
            echo $this->renderPartial('viewdetailOnly', array('model' => $this->loadModel($id)), true, true); //This will bring out the view along with its script.
        } else
            $this->render('viewdetailOnly', array(
                'model' => $this->loadModel($id),
            ));
    }

    public function loadModel($id) {
        $model = Schedule::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    public function actionDeletevoyageplan($id, $id_voyage_order_plan) {
        $schedule = Schedule::model()->findByPk($id);
        $schedule->delete();

        $voyageorder = VoyageOrderPlan::model()->findByPk($id_voyage_order_plan);
        $voyageorder->status = 'HIDE';
        $voyageorder->save(false);


        Yii::app()->user->setFlash('success', " Data Schedule has been Deleted");
        $this->redirect(array('master'));
    }

    public function actionDeleteschedulerepairdocking($id) {



        $schedule = Schedule::model()->findByPk($id);
        $schedule->delete();


        Yii::app()->user->setFlash('success', " Data Schedule has been Deleted");
        $this->redirect(Yii::app()->request->urlReferrer);
    }

}
