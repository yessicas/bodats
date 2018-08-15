<?php

class TimesheetSummaryController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

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
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete', 'adddata', 'editdata', 'savedata'),
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
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new TimesheetSummary;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

        if (isset($_POST['TimesheetSummary'])) {
            $model->attributes = $_POST['TimesheetSummary'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id_timesheet_summary));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    public function actionAdddata($id_voyage_order, $id_mst_timesheet_summary, $inVoyageClose) {
        $model = new TimesheetSummary;
        $status = 'Add Data';

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

        if (isset($_POST['TimesheetSummary'])) {
            $model->attributes = $_POST['TimesheetSummary'];
            $model->id_voyage_order = $id_voyage_order;
            $model->id_mst_timesheet_summary = $id_mst_timesheet_summary;
            if ($model->save()) {
                Yii::app()->user->setFlash('success', " Data Saved");
                $this->redirect(array('timesheet/update_daily', 'id' => $model->id_voyage_order, 'inVoyageClose' => $inVoyageClose));
            }
        }

        if (Yii::app()->request->getIsAjaxRequest()) {
            echo $this->renderPartial('adddata', array('model' => $model, 'status' => $status), true, true); //This will bring out the view along with its script.
        } else
            $this->render('adddata', array(
                'model' => $model,
                'status' => $status
            ));
    }

    public function actionEditdata($id_voyage_order, $id_mst_timesheet_summary, $inVoyageClose) {
        $model = $this->loadModelByAttributes($id_voyage_order, $id_mst_timesheet_summary);
        $status = 'Edit Data';
// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

        if (isset($_POST['TimesheetSummary'])) {
            $model->attributes = $_POST['TimesheetSummary'];
            $model->id_voyage_order = $id_voyage_order;
            $model->id_mst_timesheet_summary = $id_mst_timesheet_summary;
            if ($model->save()) {
                Yii::app()->user->setFlash('success', " Data Updated");
                $this->redirect(array('timesheet/update_daily', 'id' => $model->id_voyage_order, 'inVoyageClose' => $inVoyageClose));
            }
        }

        if (Yii::app()->request->getIsAjaxRequest()) {
            echo $this->renderPartial('adddata', array('model' => $model, 'status' => $status), true, true); //This will bring out the view along with its script.
        } else
            $this->render('adddata', array(
                'model' => $model,
                'status' => $status
            ));
    }

    public function actionSavedata() {


        if (isset($_POST['yt0'])) {

            $mstTimesheetSummary = MstTimesheetSummary::model()->findAllByAttributes(array('is_active' => 1));

            foreach ($mstTimesheetSummary as $list_mstTimesheetSummary) {

                $existData = TimesheetSummary::model()->findByAttributes(array('id_voyage_order' => $_POST['id_voyage_order'], 'id_mst_timesheet_summary' => $list_mstTimesheetSummary->id_mst_timesheet_summary));
                if ($existData) {
                    $model = $existData;
                } else {
                    $model = new TimesheetSummary;
                }

                $model->id_voyage_order = $_POST['id_voyage_order'];
                $model->id_mst_timesheet_summary = $list_mstTimesheetSummary->id_mst_timesheet_summary;
                $model->value = $_POST['timesheetsummary' . $list_mstTimesheetSummary->id_mst_timesheet_summary];
                $model->save();
            }



            Yii::app()->user->setFlash('success', " Data Saved");
            $this->redirect(array('timesheet/update_daily', 'id' => $_POST['id_voyage_order'], 'inVoyageClose' => 1));
        }
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

        if (isset($_POST['TimesheetSummary'])) {
            $model->attributes = $_POST['TimesheetSummary'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id_timesheet_summary));
        }

        $this->render('update', array(
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
        $dataProvider = new CActiveDataProvider('TimesheetSummary');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new TimesheetSummary('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['TimesheetSummary']))
            $model->attributes = $_GET['TimesheetSummary'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = TimesheetSummary::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    public function loadModelByAttributes($id_voyage_order, $id_mst_timesheet_summary) {
        $model = TimesheetSummary::model()->findByAttributes(array('id_voyage_order' => $id_voyage_order, 'id_mst_timesheet_summary' => $id_mst_timesheet_summary));
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'timesheet-summary-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
