<?php

class VoyageorderController extends Controller {

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
                'actions' => array('index', 'view', 'create', 'update',
                    'admin', 'delete', 'propose', 'create_vo', 'new_vo', 'running_vo',
                    'finished_vo', 'close_voyage', 'voyage_timesheet', 'shownew_vo_partial',
                    'showallnew_vo_partial', 'reject_vo', 'monitoring', 'invoiceNotVoyage', 'multipleInvoiceVoyage'),
                'roles' => array('ADM', 'VPC', 'TEC', 'CCT'),
            ),
            //Ini untuk Update Timesheet
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('voyage_timesheet'),
                'roles' => array('ADM', 'NAU', 'SOA'),
            ),
            //Ini untuk Nautical
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('close_voyage', 'new_vo'),
                'roles' => array('NAU'),
            ),
            //Ini untuk PR Voyage
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('prvoyage', 'pragency'),
                'roles' => array('ADM', 'CCT', 'NAU'),
            ),
            //Ini untuk Sailing order
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('voyageorderlist', 'sailingorderlist'),
                'roles' => array('ADM', 'CCT', 'NAU'),
            ),
            //Ini untuk Invoicing
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('finishvoyage', 'invoicevoyage'),
                'roles' => array('ADM', 'MKT'),
            ),
            //Ini untuk Monitoring
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('monitoring'),
                'roles' => array('PRO', 'TEC', 'FCT', 'NAU', 'DRO', 'GMO', 'CRW'),
            ),
            //Ini untuk PR Incentive
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('close_voyage'),
                'roles' => array('CRW'),
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
     * Manages all models.
     */
    public function actionPrvoyage($mode = "") {
        $model = new VoyageOrder('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['VoyageOrder']))
            $model->attributes = $_GET['VoyageOrder'];

        $model->status = "VO CREATE";

        $this->render('adminprvoyage', array(
            'model' => $model,
            'mode' => $mode,
        ));
    }

    public function actionPragency() {
        $model = new VoyageOrder('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['VoyageOrder']))
            $model->attributes = $_GET['VoyageOrder'];

        $model->status = "VO CREATE";

        $this->render('adminpragency', array(
            'model' => $model,
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new VoyageOrder;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['VoyageOrder'])) {
            $model->attributes = $_POST['VoyageOrder'];
            if ($model->save()) {
                Yii::app()->user->setFlash('success', " Data Saved");
                $this->redirect(array('view', 'id' => $model->id_voyage_order));
            }
        }
        if (Yii::app()->request->getIsAjaxRequest()) {
            echo $this->renderPartial('create', array('model' => $model), true, true); //This will bring out the view along with its script.
        } else
            $this->render('create', array(
                'model' => $model,
            ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['VoyageOrder'])) {
            $model->attributes = $_POST['VoyageOrder'];
            if ($model->save()) {
                Yii::app()->user->setFlash('success', " Data Updated");
                $this->redirect(array('admin', 'id' => $model->id_voyage_order));
            }
        }
        if (Yii::app()->request->getIsAjaxRequest()) {
            echo $this->renderPartial('update', array('model' => $model), true, true); //This will bring out the view along with its script.
        } else
            $this->render('update', array(
                'model' => $model,
            ));
    }

    public function actionCreate_vo($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['VoyageOrder'])) {
            $model->attributes = $_POST['VoyageOrder'];
            $model->status_schedule = 'APPROVED';
            $model->status = 'VO CREATE';
            $model->approved_user = Yii::app()->user->id;
            $model->ip_user_approved = $_SERVER['REMOTE_ADDR'];
            $model->approved_date = date("Y-m-d H:i:s");
            if ($model->save()) {

                // insert nomornya
                $modelNew = new VoyageOrder;
                $updateModel = VoyageOrder::model()->findByPK($model->id_voyage_order);
                $dataformatnumber = NumberingDocumentDBVO::getFormatNumber($modelNew, 'id_voyage_order', 'VONo', 'VOMonth', 'VOYear', $model->id_voyage_order);
                $updateModel->VoyageOrderNumber = $dataformatnumber['NumberFormat'];
                $updateModel->VONo = $dataformatnumber['NoOrder'];
                $updateModel->VOMonth = NumberingDocumentDBVO::getMonthNow();
                $updateModel->VOYear = NumberingDocumentDBVO::getYearNow();
                $updateModel->save(false);

                $quoupdate = Quotation::model()->findByPk($model->id_quotation);
                $quoupdate->Status = 'VO CREATE';
                $quoupdate->save(false);

                $modelschedule = new Schedule;
                $modelschedule->created_user = Yii::app()->user->id;
                $modelschedule->created_date = date("Y-m-d H:i:s");
                $modelschedule->ip_user_updated = $_SERVER['REMOTE_ADDR'];
                $modelschedule->VesselTugId = $model->BargingVesselTug;
                $modelschedule->VesselBargeId = $model->BargingVesselBarge;
                $modelschedule->id_vessel_status = 10;
                $modelschedule->status_plan = 'PLAN';
                $modelschedule->StartDate = $model->StartDate;
                $modelschedule->EndDate = $model->EndDate;
                $modelschedule->is_voyage = 1;
                $modelschedule->id_voyage_order = $model->id_voyage_order;
                $modelschedule->save(false);

                NotificationDB::sendApprovedNotificationVoyageOrderSchedule($model, 1);

                Yii::app()->user->setFlash('success', " Data Saved");

                if (isset($_GET['status'])) {
                    $this->redirect(array('masterschedule/master'));
                } else {
                    $this->redirect(array('new_vo', 'id' => $model->id_voyage_order));
                }
            }
        }

        //Jika voyage number belum diset, maka diambilkan voyage number yang dari sales plan month (bulanan)
        if ($model->VoyageNumber == "") {
            if (isset($model->So)) {
                if (isset($model->So->SalesPlanMonth)) {
                    $model->VoyageNumber = $model->So->SalesPlanMonth->voyage_no;
                }
            }
        }

        if (Yii::app()->request->getIsAjaxRequest()) {
            echo $this->renderPartial('create_vo', array(
                'model' => $model,
                    ), true, true);
        } else
            $this->render('create_vo', array(
                'model' => $model,
            ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            $this->loadModel($id)->delete();

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
        $dataProvider = new CActiveDataProvider('VoyageOrder');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new VoyageOrder('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['VoyageOrder']))
            $model->attributes = $_GET['VoyageOrder'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    public function actionPropose() {
        $model = new VoyageOrder('searchbystatuspropose');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['VoyageOrder']))
            $model->attributes = $_GET['VoyageOrder'];

        $model->status = 'SHIPPING ORDER';

        $this->render('propose', array(
            'model' => $model,
        ));
    }

    public function actionRunning_vo() {
        $model = new VoyageOrder('searchbystatusrunning');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['VoyageOrder']))
            $model->attributes = $_GET['VoyageOrder'];

        $model->status = "VO SAILING";

        $this->render('running_vo', array(
            'model' => $model,
        ));
    }

    public function actionSailingorderlist() {
        $model = new VoyageOrder('searchbystatusrunning');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['VoyageOrder']))
            $model->attributes = $_GET['VoyageOrder'];

        $model->status = "VO SAILING";

        $this->render('sailingorderlist', array(
            'model' => $model,
        ));
    }

    public function actionVoyage_timesheet() {
        $model = new VoyageOrder('searchbystatusrunning');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['VoyageOrder']))
            $model->attributes = $_GET['VoyageOrder'];

        $model->status = "VO SAILING";

        $this->render('voyage_timesheet', array(
            'model' => $model,
        ));
    }

    public function actionNew_vo() {
        $model = new VoyageOrder('searchbystatucreate');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['VoyageOrder']))
            $model->attributes = $_GET['VoyageOrder'];

        $model->status = "VO CREATE";

        $this->render('new_vo', array(
            'model' => $model,
        ));
    }

    public function actionVoyageorderlist() {
        $model = new VoyageOrder('searchbystatucreate');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['VoyageOrder']))
            $model->attributes = $_GET['VoyageOrder'];

        $model->status = "VO CREATE";

        $this->render('voyageorderlist', array(
            'model' => $model,
        ));
    }

    public function actionShownew_vo_partial() {
        $id_tug = $_GET['id_tug'];
        $id_barge = $_GET['id_barge'];

        $model = new VoyageOrder('searchbystatusproposebyvessel');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['VoyageOrder']))
            $model->attributes = $_GET['VoyageOrder'];

        $this->renderPartial('new_vo_partial_porpose', array(
            'model' => $model,
            'id_tug' => $id_tug,
            'id_barge' => $id_barge,
                ), false, true);

        Yii::app()->end();

        /*
          $model=new VoyageOrder('searchbystatuspropose');
          $model->unsetAttributes();  // clear any default values
          if(isset($_GET['VoyageOrder']))
          $model->attributes=$_GET['VoyageOrder'];

          $this->renderPartial('new_vo_partial_porpose',array(
          'model'=>$model,
          ),false,true);

          Yii::app()->end();
         */
    }

    public function actionShowallnew_vo_partial() {

        $model = new VoyageOrder('searchbystatuspropose');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['VoyageOrder']))
            $model->attributes = $_GET['VoyageOrder'];

        $this->renderPartial('new_all_vo_partial_porpose', array(
            'model' => $model,
                ), false, true);

        Yii::app()->end();

        /*
          $model=new VoyageOrder('searchbystatuspropose');
          $model->unsetAttributes();  // clear any default values
          if(isset($_GET['VoyageOrder']))
          $model->attributes=$_GET['VoyageOrder'];

          $this->renderPartial('new_all_vo_partial_porpose',array(
          'model'=>$model,
          ),false,true);

          Yii::app()->end();
         */
    }

    public function actionReject_vo($id) {
        $modelVoyageOrder = VoyageOrder::model()->findByPk($id);
        $modelVoyageOrder->approved_user = Yii::app()->user->id;
        $modelVoyageOrder->ip_user_approved = $_SERVER['REMOTE_ADDR'];
        $modelVoyageOrder->approved_date = date("Y-m-d H:i:s");
        $modelVoyageOrder->status_schedule = 'REJECTED';
        $modelVoyageOrder->save(false);

        NotificationDB::sendApprovedNotificationVoyageOrderSchedule($modelVoyageOrder, 0);

        Yii::app()->user->setFlash('success', " Data Request Voyage Order has been Rejected");
        $this->redirect(array('masterschedule/master'));
    }

    public function actionFinished_vo() {
        $model = new VoyageOrder('searchbystatusrunningANDfinish');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['VoyageOrder']))
            $model->attributes = $_GET['VoyageOrder'];

        $model->status = "VO FINISH";

        $this->render('finished_vo', array(
            'model' => $model,
        ));
    }

    public function actionClose_voyage() {
        $this->layout = '//layouts/column2';
        $model = new VoyageOrder('searchbystatusrunningANDfinish');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['VoyageOrder']))
            $model->attributes = $_GET['VoyageOrder'];

        $model->status = "VO FINISH";

        $this->render('close_voyage', array(
            'model' => $model,
        ));
    }

    public function actionFinishvoyage() {
        $this->layout = '//layouts/column2';
        $model = new VoyageOrder('searchbyFinishVogare');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['VoyageOrder']))
            $model->attributes = $_GET['VoyageOrder'];

        $model->status = "VO FINISH";

        $this->render('finishvoyage', array(
            'model' => $model,
        ));
    }

    public function actionInvoicevoyage() {
        $this->layout = '//layouts/column2';
        $model = new VoyageOrder('');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['VoyageOrder']))
            $model->attributes = $_GET['VoyageOrder'];

        $model->status = "INVOICE";

        $this->render('invoicevoyage', array(
            'model' => $model,
        ));
    }

    public function actionMonitoring() {
        $model = new VoyageOrder('searchMonitoring');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['VoyageOrder']))
            $model->attributes = $_GET['VoyageOrder'];


        $this->render('monitoring', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
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
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'voyage-order-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionInvoiceNotVoyage() {
        $model = new Quotation('searchInvoice');
        $model->unsetAttributes();  // clear any default values

        if (isset($_GET['Quotation'])) {
            $model->attributes = $_GET['Quotation'];
        } else {
            //$model->Status='QUOTATION';
        }


        $this->render('../voyageorder/adminInvoice', array(
            'model' => $model,
        ));
    }

    public function actionMultipleInvoiceVoyage() {
        $this->layout = '//layouts/column2';

        $model = new VoyageOrder('searchbyFinishVogare');
        $model->unsetAttributes();  // clear any default values

        if (isset($_GET['VoyageOrder']))
            $model->attributes = $_GET['VoyageOrder'];

        /// page size nya
        if (isset($_GET['pageSize'])) {
            Yii::app()->user->setState('pageSize', (int) $_GET['pageSize']);
            unset($_GET['pageSize']);
        }

//        if ($mode != "") {
//            switch ($mode) {
//                case "multiple_invoice":
//                    $model->invoice_created = '0'; // Ini belum create invoice
//                    break;
//            }
//        }
        $model->status = "VO DOC COMPLETE";

        $this->render('multipleInvoiceVoyage', array(
            'model' => $model,
                //'mode'=>$mode,
        ));
    }

//    public function actionMultipleInvoiceVoyage($mode) {
//        $this->layout = '//layouts/column2';
//
//        $model = new VoyageOrder('searchbyFinishVogare');
//        $model->unsetAttributes();  // clear any default values
//
//        if (isset($_GET['VoyageOrder']))
//            $model->attributes = $_GET['VoyageOrder'];
//
//        /// page size nya
//        if (isset($_GET['pageSize'])) {
//            Yii::app()->user->setState('pageSize', (int) $_GET['pageSize']);
//            unset($_GET['pageSize']);
//        }
//
//        if ($mode != "") {
//            switch ($mode) {
//                case "multiple_invoice":
//                    $model->invoice_created = '0'; // Ini belum create invoice
//                    break;
//            }
//        }
//        $model->status = "VO DOC COMPLETE";
//
//        $this->render('multipleInvoiceVoyage', array(
//            'model' => $model,
//            'mode'=>$mode,
//        ));
//    }

    public function actionMulti() {
        $model = new VoyageOrder('searchbyFinishVogare');

        if (isset($_POST['VoyageOrder'])) {
            $model->attributes = $_POST['VoyageOrder'];
//            if($model->save())
//                $this->redirect(array(''))
        }
    }

}
