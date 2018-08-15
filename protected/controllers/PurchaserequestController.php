<?php

class PurchaserequestController extends Controller {

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

            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('autoconsumablestock','autoehs', 'deleteitemprvessel', 'manyaction'),
                'users' => array('@'),
            ),
            array('allow',
                'actions' => array('create', 'update', 'admin', 'prapproved', 'prrejected', 'po', 'view'),
                'roles' => array('ADM'),
            ),
            // approve ADM
            /*
              array('allow',
              'actions'=>array('approve','reject','approve2','reject2','approve3','reject3'),
              'roles'=>array('ADM'),
              ),
             */
            array('allow',
                'actions' => array('approve', 'reject'),
                'roles' => array('HOPR'),
            ),
            array('allow',
                'actions' => array('approve2', 'reject2'),
                'roles' => array('GMO', 'ADM'),
            ),
            array('allow',
                'actions' => array('approve3', 'reject3'),
                'roles' => array('DRO', 'ADM'),
            ),
            //
            //Vessel
            array('allow',
                'actions' => array('prbunkering', 'prvessel', 'admvessel', 'delete', 'updateprvessel',
                    'viewprvessel', 'updateprvessel', 'admvesselapproved', 'download',
                ),
                'roles' => array('ADM', 'CCT', 'TEC', 'FCT', 'VPC', 'NAU', 'CRW'),
            ),
            //PR Vessel
            array('allow',
                'actions' => array(
                    'createitemprvessel', 'updateitemprvessel', 'deleteitemprvoyage',
                ),
                'roles' => array('ADM', 'CCT', 'TEC', 'NAU', 'CRW'),
            ),
            //PR Others
            array('allow',
                'actions' => array(
                    'prothers', 'updateitempprothers', 'deleteitemprothers', 'viewprothers', 'admothers', 'admothersapproved'
                ),
                'roles' => array('ADM', 'CCT', 'TEC', 'NAU'),
            ),
            //Ini untuk PR Voyage
            array('allow',
                'actions' => array(
                    'prvoyage', 'viewprvoyage', 'additemprvoyage', 'createitemprvoyage', 'updateitemprvoyage', 'deleteitemprvoyage',
                    'admvoyageapproved'
                ),
                'roles' => array('ADM', 'CCT', 'NAU'),
            ),
            //Ini untuk Approval PR
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array(
                    'adminapproval', 'approve', 'reject',
                    'adminapproved', 'adminrejected', 'viewpr'
                ),
                'roles' => array('ADM', 'HEA', 'HOPR', 'PRO', 'DRO', 'GMO'),
            ),
            //PR Monitoring
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array(
                    'prapprovalmonitoring', 'prtopomonitoring', 'prmonitoring'
                ),
                'roles' => array('ADM', 'HEA', 'HOPR', 'PRO', 'TEC'),
            ),
            //PR Part Monitoring
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array(
                    'prpartmonitoring'
                ),
                'roles' => array('ADM', 'HEA', 'HOPR', 'PRO', 'TEC', 'NAU'),
            ),
            //PR PICA
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array(
                    'adminprpica',
                ),
                'roles' => array('ADM', 'PRO'),
            ),
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('prvessel', 'viewpr'),
                'roles' => array('TEC'),
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

    public function actionViewpr($id) {


        $modelapprove = new PurchaseRequest('search');
        $modelapprove->unsetAttributes();  // clear any default values
        if (isset($_GET['PurchaseRequest'])) {
            $modelapprove->attributes = $_GET['PurchaseRequest'];
        }
        $modelapprove->id_purchase_request = $id;
        //$modelapprove->Status='PR';
        $modelapprove->approval_level = '<3';



        if (Yii::app()->request->getIsAjaxRequest()) {
            echo $this->renderPartial('viewpr', array('model' => $this->loadModel($id), 'modelapprove' => $modelapprove), true, true); //This will bring out the view along with its script.
        } else
            $this->render('viewpr', array(
                'model' => $this->loadModel($id),
                'modelapprove' => $modelapprove,
            ));
    }

    public function actionViewprvessel($id, $mode = "bunkering", $action = "create") {
        $this->render('viewprvessel', array(
            'model' => $this->loadModel($id),
            'label' => $mode,
            'mode' => $mode,
        ));
    }

    public function actionViewprvoyage($id, $mode) {
        $model = PurchaseRequest::model()->findByAttributes(array('id_voyage_order' => $id));
        $this->render('viewprvoyage', array(
            'model' => $model,
            'label' => $mode,
        ));
    }

    public function actionAdditemprvoyage($id, $mode, $action = "add") {
        $modelpr = $this->loadModel($id);

        Yii::app()->user->setState('pageSize', 50);
        $modeldetail = new PurchaseRequestDetail('search');
        $modeldetail->unsetAttributes();  // clear any default values
        if (isset($_GET['PurchaseRequestDetail']))
            $modeldetail->attributes = $_GET['PurchaseRequestDetail'];

        //$modeldetail->id_voyage_order = $modelpr->id_voyage_order;
        $modeldetail->id_purchase_request = $id;
        $totalDataItem = $modeldetail->search()->getItemCount();
        //$totalDataItem = PurchaseRequestDetail::model()->countByAttributes(array('id_purchase_request'=>$id));
        // insert data apabila masih kosong 
        $model = $modelpr;
        if ($totalDataItem == 0) {
            $vo = VoyageOrder::model()->findByAttributes(array('id_voyage_order' => $model->id_voyage_order));
            $JettyIdStart = $vo->BargingJettyIdStart;
            $JettyIdEnd = $vo->BargingJettyIdEnd;

            $mode = "agency";
            $agency = StandardAgency::model()->findByAttributes(array('JettyIdStart' => $JettyIdStart, 'JettyIdEnd' => $JettyIdEnd));
            if ($agency) {
                $agencyIten = StandardAgencyItem::model()->findAllByAttributes(array('id_standard_agency' => $agency->id_standard_agency));
                foreach ($agencyIten as $list_agencyIten) {
                    //echo $list_agencyIten->id_agency_item." - ". $list_agencyIten->AgencyItem->agency_item."<br>";

                    $modelPRDetail = new PurchaseRequestDetail;
                    $modelPRDetail->id_purchase_request = $id;
                    $modelPRDetail->status = 'PR';
                    switch ($mode) {
                        case "agency":
                            $modelPRDetail->id_vessel = 0;
                            $modelPRDetail->dedicated_to = "VOYAGE";
                            $modelPRDetail->metric = "packet";
                            $modelPRDetail->id_voyage_order = $model->id_voyage_order;
                            break;
                    }

                    $modelPRDetail = LogUserUpdated::setUserRequested($modelPRDetail);
                    $modelPRDetail->purchase_item_table = 'AgencyItem';
                    $modelPRDetail->id_item = $list_agencyIten->id_agency_item;
                    $modelPRDetail->quantity = $list_agencyIten->quantity;
                    $modelPRDetail->metric = $list_agencyIten->metric;
                    $modelPRDetail->notes = $list_agencyIten->description;
                    $modelPRDetail->item_add_info = $list_agencyIten->type;

                    $modelPRDetail->save(false);
                }
            }
        }

        // end insert data apabila masih kosong 


        $this->render('additemprvoyage', array(
            'model' => $modelpr,
            'modeldetail' => $modeldetail,
            'label' => $mode,
            'id' => $id,
            'action' => $action,
            'totalDataItem' => $totalDataItem,
        ));
    }

    public function actionCreateitemprvoyage($id, $mode, $action = "create") {
        $model = new PurchaseRequestDetail;
        $model->id_purchase_request = $id;
        $model->status = 'PR';
        switch ($mode) {
            case "agency":
                $modelpr = $this->loadModel($id);
                $model->id_vessel = 0;
                $model->dedicated_to = "VOYAGE";
                $model->metric = "packet";
                $model->id_voyage_order = $modelpr->id_voyage_order;
                break;
        }

        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);

        if (isset($_POST['PurchaseRequestDetail'])) {
            $model->attributes = $_POST['PurchaseRequestDetail'];
            $model = LogUserUpdated::setUserRequested($model);
            if ($model->save()) {
                Yii::app()->user->setFlash('success', "Data Has been Saved");
                $this->redirect(array('additemprvoyage', 'id' => $id, 'mode' => $mode, 'action' => $action));
            }
        }

        if (Yii::app()->request->getIsAjaxRequest()) {
            echo $this->renderPartial('createitempragency', array(
                'model' => $model,
                'mode' => $mode,
                    ), true, true); //This will bring out the view along with its script.
        } else
            $this->render('createitempragency', array(
                'model' => $model,
                'mode' => $mode,
            ));
    }

    public function actionCreateitemprvessel($id, $mode, $action = "create") {
        $model = new PurchaseRequestDetail;
        $modelpr = PurchaseRequest::model()->findByPk($id);
        $model->id_purchase_request = $id;
        $model->id_po_category = $modelpr->id_po_category;
        $model->status = 'PR';
        switch ($mode) {
            case "consumable_stock":
                $modelpr = $this->loadModel($id);
                $model->id_vessel = 0;
                $model->dedicated_to = "VESSEL";
                $model->metric = "packet";
                $model->id_voyage_order = $modelpr->id_voyage_order;
                $model->Scenario = 'insertconsumable';
                break;
            
            case "ehs":
                $modelpr = $this->loadModel($id);
                $model->id_vessel = 0;
                $model->dedicated_to = "VESSEL";
                $model->metric = "packet";
                $model->id_voyage_order = $modelpr->id_voyage_order;
                $model->Scenario = 'insertehs';
                break;

            case "survey_class":
                $modelpr = $this->loadModel($id);
                $model->id_vessel = 0;
                $model->dedicated_to = "VESSEL";
                $model->metric = "packet";
                $model->id_voyage_order = $modelpr->id_voyage_order;
                $model->Scenario = 'insertsurvey';
                break;

            case "service":
                $modelpr = $this->loadModel($id);
                $model->id_vessel = 0;
                $model->dedicated_to = "VESSEL";
                $model->metric = "packet";
                $model->id_voyage_order = $modelpr->id_voyage_order;
                $model->Scenario = 'insertservice';
                break;
				
			case "ehs":
				$modelpr = $this->loadModel($id);
				$model->id_vessel = 0;
				$model->dedicated_to = "VESSEL";
				$model->metric = "packet";
				$model->id_voyage_order = $modelpr->id_voyage_order;
				$model->Scenario='insertehs';
				break;	
				
			
        }

        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);
        if (isset($_POST['PurchaseRequestDetail'])) {
            $model->attributes = $_POST['PurchaseRequestDetail'];
            $model = LogUserUpdated::setUserRequested($model);
            if ($model->save()) {
                Yii::app()->user->setFlash('success', "Data Item PR has been saved");
                $this->redirect(array('viewprvessel', 'id' => $id, 'mode' => $mode, 'action' => $action));
            }
        }
        if (Yii::app()->request->getIsAjaxRequest()) {
            echo $this->renderPartial('createitemprvessel', array(
                'model' => $model,
                'mode' => $mode,
                    ), true, true); //This will bring out the view along with its script.
        } else
            $this->render('createitemprvessel', array(
                'model' => $model,
                'mode' => $mode,
            ));
    }

    public function actionUpdateitemprvoyage($id_purchase_request_detail, $mode, $action = "create") {
        $model = $this->loadModelDetail($id_purchase_request_detail);


        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);

        if (isset($_POST['PurchaseRequestDetail'])) {
            $model->attributes = $_POST['PurchaseRequestDetail'];
            $model = LogUserUpdated::setUserRequested($model);
            if ($model->save()) {
                Yii::app()->user->setFlash('success', "Data Has been Updated");
                $this->redirect(array('additemprvoyage', 'id' => $model->id_purchase_request, 'mode' => $mode, 'action' => $action));
            }
        }

        if (Yii::app()->request->getIsAjaxRequest()) {
            echo $this->renderPartial('updateitempragency', array(
                'model' => $model,
                'mode' => $mode,
                    ), true, true); //This will bring out the view along with its script.
        } else
            $this->render('updateitempragency', array(
                'model' => $model,
                'mode' => $mode,
            ));
    }

    public function actionUpdateitemprvessel($id_purchase_request_detail, $mode, $action = "create") {
        $model = $this->loadModelDetail($id_purchase_request_detail);

        switch ($mode) {
            case "consumable_stock":
                $model->Scenario = 'updateconsumable';
                break;

            case "ehs":
                $model->Scenario = 'updateehs';
                break;

            case "survey_class":
                $model->Scenario = 'updatesurvey';
                break;
        }


        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);

        if (isset($_POST['PurchaseRequestDetail'])) {
            $model->attributes = $_POST['PurchaseRequestDetail'];
            $model = LogUserUpdated::setUserRequested($model);
            if ($model->save()) {
                Yii::app()->user->setFlash('success', "Data Has been Updated");
                $this->redirect(array('viewprvessel', 'id' => $model->id_purchase_request, 'mode' => $mode, 'action' => $action));
            }
        }

        if (Yii::app()->request->getIsAjaxRequest()) {
            echo $this->renderPartial('updateitemprvessel', array(
                'model' => $model,
                'mode' => $mode,
                    ), true, true); //This will bring out the view along with its script.
        } else
            $this->render('updateitemprvessel', array(
                'model' => $model,
                'mode' => $mode,
            ));
    }

    public function actionPrvoyage($id, $mode, $action = "") {
        $model = PurchaseRequest::model()->findByAttributes(array('id_voyage_order' => $id));
        if ($model == null) {
            $model = new PurchaseRequest();
        }
        $label = "Purchase Request";

        $model = PurchaseRequestDB::selectorModel($mode, $model, 'create');

        if (isset($_POST['PurchaseRequest'])) {
            $model->attributes = $_POST['PurchaseRequest'];
            $model->Status = 'PR';
            //$model->dedicated_to='VESSEL';

            $model = DataLogger::setUserRequested($model);

            if ($model->save()) {

                if ($model->isNewRecord) {
                    // insert nomornya
                    $updateModel = PurchaseRequest::model()->findByPK($model->id_purchase_request);
                    $dataformatnumber = NumberingDocumentDBPurchase::getFormatNumber($model, 'id_purchase_request', 'PRNo', 'PRMonth', 'PRYear', $model->id_purchase_request);
                    $updateModel->PRNumber = $dataformatnumber['NumberFormat'];
                    $updateModel->PRNo = $dataformatnumber['NoOrder'];
                    $updateModel->PRMonth = NumberingDocumentDBPurchase::getMonthNow();
                    $updateModel->PRYear = NumberingDocumentDBPurchase::getYearNow();
                    $updateModel->save(false);
                }


                Yii::app()->user->setFlash('success', "First Step has been saved. Please fill for detail item.");
                $this->redirect(array('additemprvoyage', 'id' => $model->id_purchase_request, 'mode' => $mode, 'action' => 'create',));
            }
        }

        $this->render('createprvoyage', array(
            'model' => $model,
            'label' => $mode,
            'id' => $id,
            'action' => $action,
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new PurchaseRequest;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['PurchaseRequest'])) {
            $model->attributes = $_POST['PurchaseRequest'];
            $model->Status = 'PR';
            $model->dedicated_to = 'VESSEL';
            $model->requested_user = Yii::app()->user->id;
            $model->requested_date = date("Y-m-d H:i:s");
            $model->ip_user_requested = $_SERVER['REMOTE_ADDR'];

            //$model->namaAttribute=CUploadedFile::getInstance($model,'namaAttribute');			
            $updatemodel = CUploadedFile::getInstance($model, 'requested_user');
            if ($model->save()) {

                // insert nomornya
                $updateModel = PurchaseRequest::model()->findByPK($model->id_purchase_request);
                $dataformatnumber = NumberingDocumentDBPurchase::getFormatNumber($model, 'id_purchase_request', 'PRNo', 'PRMonth', 'PRYear', $model->id_purchase_request);
                $updateModel->PRNumber = $dataformatnumber['NumberFormat'];
                $updateModel->PRNo = $dataformatnumber['NoOrder'];
                $updateModel->PRMonth = NumberingDocumentDBPurchase::getMonthNow();
                $updateModel->PRYear = NumberingDocumentDBPurchase::getYearNow();
                $updateModel->save(false);

                Yii::app()->user->setFlash('success', " Data Saved");

                //$model->namaAttribute->saveAs('path/to/localFile');
                $updatemodel->saveAs(Yii::app()->basePath . '/../erppmlbucket/' . $model->id . '.pdf, .jpg, .png');

                $this->redirect(array('view', 'id' => $model->id_purchase_request));
            }
        }
        if (Yii::app()->request->getIsAjaxRequest()) {
            echo $this->renderPartial('create', array('model' => $model), true, true); //This will bring out the view along with its script.
        } else
            $this->render('create', array(
                'model' => $model,
            ));
    }

    public function actionPrvessel($mode = "", $idv = 0, $idvo = 0, $ids = 0) {
        $model = new PurchaseRequest;
        $modelPurchaseRequestDetail = new PurchaseRequestDetail;
        $label = "Purchase Request";

        $model = PurchaseRequestDB::selectorModel($mode, $model, 'create');
        if ($idv > 0) {
            $model->id_vessel = $idv;
        }
        if ($idvo > 0) {
            $model->id_voyage_order = $idvo;
        }
        if ($ids > 0) {
            $sched = Schedule::model()->findByPk($ids);
            if ($sched != null) {
                $model->notes = $sched->SchNumber;
            }
        }

        if (isset($_POST['PurchaseRequest'])) {
            $model->attributes = $_POST['PurchaseRequest'];
            $model->Status = 'PR';

            //$model->dedicated_to='VESSEL';

            $model = DataLogger::setUserRequested($model);
            if ($model->save()) {
                // insert nomornya
                $updateModel = PurchaseRequest::model()->findByPK($model->id_purchase_request);
                $dataformatnumber = NumberingDocumentDBPurchase::getFormatNumber($model, 'id_purchase_request', 'PRNo', 'PRMonth', 'PRYear', $model->id_purchase_request);
                $updateModel->PRNumber = $dataformatnumber['NumberFormat'];
                $updateModel->PRNo = $dataformatnumber['NoOrder'];
                $updateModel->PRMonth = NumberingDocumentDBPurchase::getMonthNow();
                $updateModel->PRYear = NumberingDocumentDBPurchase::getYearNow();
                $updateModel->save(false);

                //Duplicate Into PR Detail Item
                if ($mode == "bunkering" || $mode == "fresh_water" || $mode == "survey_bunker")
                    PurchaseRequestDB::cloneDuplicatePRtoDetail($model, $mode);

                Yii::app()->user->setFlash('success', " Data Saved");
                $this->redirect(array('viewprvessel', 'id' => $model->id_purchase_request, 'mode' => $mode));
            }
        }
        if (Yii::app()->request->getIsAjaxRequest()) {
            echo $this->renderPartial('createprvessel', array(
                'model' => $model,
                'modelPurchaseRequestDetail' => $modelPurchaseRequestDetail,
                'label' => $mode,
                'mode' => $mode,
                    )
                    , true, true);
        } else
            $this->render('createprvessel', array(
                'model' => $model,
                'modelPurchaseRequestDetail' => $modelPurchaseRequestDetail,
                'label' => $mode,
                'mode' => $mode,
            ));
    }

    public function actionUpdateprvessel($id, $mode = "") {
        $model = new PurchaseRequest;
        $modelPurchaseRequestDetail = new PurchaseRequestDetail;
        $label = "Purchase Request";

        $model = PurchaseRequestDB::selectorModel($mode, $model);
        $model = $this->loadModel($id);
        if ($model->Status == "PR") {
            if (isset($_POST['PurchaseRequest'])) {
                $model->attributes = $_POST['PurchaseRequest'];

                //$model->dedicated_to='VESSEL';

                $model = DataLogger::setUserRequested($model);

                if ($model->save()) {

                    //Edit Duplicate Into PR Detail Item
                    if ($mode == "bunkering" || $mode == "fresh_water" || $mode == "survey_bunker")
                        PurchaseRequestDB::cloneDuplicatePRtoDetailUpdate($model, $mode);

                    Yii::app()->user->setFlash('success', " Data Updated.");
                    $this->redirect(array('viewprvessel', 'id' => $model->id_purchase_request, 'mode' => $mode));
                }
            }
            if (Yii::app()->request->getIsAjaxRequest()) {
                echo $this->renderPartial('updateprvessel', array(
                    'model' => $model,
                    'modelPurchaseRequestDetail' => $modelPurchaseRequestDetail,
                    'label' => $mode,
                    'mode' => $mode,
                        )
                        , true, true);
            } else
                $this->render('updateprvessel', array(
                    'model' => $model,
                    'modelPurchaseRequestDetail' => $modelPurchaseRequestDetail,
                    'label' => $mode,
                    'mode' => $mode,
                ));
        }else {
            Yii::app()->user->setFlash('success', "You can't changed this data again. It has status : " . $model->Status);
            $this->redirect(array('viewprvessel', 'id' => $model->id_purchase_request, 'mode' => $mode));
        }
    }

    /* PR Others */

    public function actionProthers($mode = "", $action = "") {
        $model = new PurchaseRequest;
        $modelPurchaseRequestDetail = new PurchaseRequestDetail;
        $label = "Purchase Request";

        $model = PurchaseRequestDB::selectorModel($mode, $model, 'create');

        if (isset($_POST['PurchaseRequest'])) {
            $model->attributes = $_POST['PurchaseRequest'];
            $model->Status = 'PR';

            //$model->dedicated_to='VESSEL';

            $model = DataLogger::setUserRequested($model);
            if ($model->save()) {
                // insert nomornya
                $updateModel = PurchaseRequest::model()->findByPK($model->id_purchase_request);
                $dataformatnumber = NumberingDocumentDBPurchase::getFormatNumber($model, 'id_purchase_request', 'PRNo', 'PRMonth', 'PRYear', $model->id_purchase_request);
                $updateModel->PRNumber = $dataformatnumber['NumberFormat'];
                $updateModel->PRNo = $dataformatnumber['NoOrder'];
                $updateModel->PRMonth = NumberingDocumentDBPurchase::getMonthNow();
                $updateModel->PRYear = NumberingDocumentDBPurchase::getYearNow();
                $updateModel->save(false);

                //Duplicate Into PR Detail Item
                if ($mode == "transport_fuel")
                    PurchaseRequestDB::cloneDuplicatePRtoDetail($model, $mode);

                Yii::app()->user->setFlash('success', " Data Saved");
                $this->redirect(array('viewprothers', 'idpr' => $model->id_purchase_request, 'mode' => $mode));
            }
        }
        if (Yii::app()->request->getIsAjaxRequest()) {
            echo $this->renderPartial('createprothers', array(
                'model' => $model,
                'modelPurchaseRequestDetail' => $modelPurchaseRequestDetail,
                'label' => $mode,
                'mode' => $mode,
                'action' => $action,
                    )
                    , true, true);
        } else
            $this->render('createprothers', array(
                'model' => $model,
                'modelPurchaseRequestDetail' => $modelPurchaseRequestDetail,
                'label' => $mode,
                'mode' => $mode,
                'action' => $action,
            ));
    }

    public function actionViewprothers($idpr, $mode) {
        $model = PurchaseRequest::model()->findByPk($idpr);
        $this->render('viewprothers', array(
            'model' => $model,
            'label' => $mode,
            'idpr' => $idpr,
        ));
    }

    public function actionAdmothers($mode = "") {

        $model = new PurchaseRequest('searchothers');
        $model->unsetAttributes();  // clear any default values

        if (isset($_GET['PurchaseRequest'])) {
            $model->attributes = $_GET['PurchaseRequest'];
        } else {
            $model->Status = 'PR';
        }

        $model = PurchaseRequestDB::selectorModel($mode, $model);

        $this->render('adminprothers', array(
            'model' => $model,
            'label' => $mode,
        ));
    }

    public function actionAdmothersapproved($mode = "", $approved = 1) {
        $model = new PurchaseRequest('search');
        $model->unsetAttributes();  // clear any default values

        if (isset($_GET['PurchaseRequest'])) {
            $model->attributes = $_GET['PurchaseRequest'];
        } else {
            
        }

        if ($approved == 1)
            $model->Status = 'PR APPROVED';

        if ($approved == 0)
            $model->Status = 'PR REJECTED';

        $model = PurchaseRequestDB::selectorModel($mode, $model);

        $this->render('adminprothersapproved', array(
            'model' => $model,
            'label' => $mode,
            'approved' => $approved,
        ));
    }

    /* END OF PR OTHERS */

    public function actionDownload($id) {
        $model = PurchaseRequestDetail::model()->findByAttributes(array('id_purchase_request' => $id));
        $file = Yii::app()->basePath . '/../repository/prdetail/' . $model->attachment;
        $pos = strrpos($file, '.');
        $extensions = substr($file, $pos + 1);

        if (file_exists($file)) {
            Yii::app()->getRequest()->sendFile($model->PurchaseRequest->PRNumber . "." . $extensions, file_get_contents($file));
        } else {
            throw new CHttpException(404, 'The requested page does not exist.');
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

        if ($model->Status == "PR") {
            if (isset($_POST['PurchaseRequest'])) {
                $model->attributes = $_POST['PurchaseRequest'];
                $model->Status = 'PR';
                $model->requested_user = Yii::app()->user->id;
                $model->requested_date = date("Y-m-d H:i:s");
                $model->ip_user_requested = $_SERVER['REMOTE_ADDR'];
                if ($model->save()) {
                    Yii::app()->user->setFlash('success', " Data Updated");
                    $this->redirect(array('view', 'id' => $model->id_purchase_request));
                }
            }
            if (Yii::app()->request->getIsAjaxRequest()) {
                echo $this->renderPartial('update', array('model' => $model), true, true); //This will bring out the view along with its script.
            } else
                $this->render('update', array(
                    'model' => $model,
                ));
        }else {
            Yii::app()->user->setFlash('success', "You can't changed this data again");
            $this->redirect(array('view', 'id' => $model->id_purchase_request));
        }
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            $model = $this->loadModel($id);
            $modelPrDetail = PurchaseRequestDetail::model()->findByAttributes(array('id_purchase_request' => $model->id_purchase_request));
            if (file_exists(Yii::app()->basePath . '/../repository/prdetail/' . $modelPrDetail->attachment)) {
                unlink(Yii::app()->basePath . '/../repository/prdetail/' . $modelPrDetail->attachment);
            }

            $this->loadModel($id)->delete();
            $modelPrDetail->delete();

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
        $dataProvider = new CActiveDataProvider('PurchaseRequest');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new PurchaseRequest('search');
        $model->unsetAttributes();  // clear any default values

        if (isset($_GET['PurchaseRequest'])) {
            $model->attributes = $_GET['PurchaseRequest'];
        } else {
            $model->Status = 'PR';
        }

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /* Untuk Monitoring */

    public function actionPrapprovalmonitoring() {
        $model = new PurchaseRequest('search');
        $model->unsetAttributes();  // clear any default values

        if (isset($_GET['PurchaseRequest'])) {
            $model->attributes = $_GET['PurchaseRequest'];
        }

        $model->Status = 'PR';

        $this->render('prapprovalmonitoring', array(
            'model' => $model,
        ));
    }

    public function actionPrtopomonitoring() {
        $model = new PurchaseRequest('search');
        $model->unsetAttributes();  // clear any default values

        if (isset($_GET['PurchaseRequest'])) {
            $model->attributes = $_GET['PurchaseRequest'];
        }

        //$model->Status='PR APPROVED';

        $this->render('prtopomonitoring', array(
            'model' => $model,
        ));
    }

    public function actionPrpartmonitoring() {
        $model = new PurchaseRequestDetail('search');
        $model->unsetAttributes();  // clear any default values

        if (isset($_GET['PurchaseRequestDetail'])) {
            $model->attributes = $_GET['PurchaseRequestDetail'];
        }

        $model->id_po_category = '10400';

        $this->render('prpartmonitoring', array(
            'model' => $model,
        ));
    }

    public function actionAdminprpica() {
        $model = new PurchaseRequest('search');
        $model->unsetAttributes();  // clear any default values

        if (isset($_GET['PurchaseRequest'])) {
            $model->attributes = $_GET['PurchaseRequest'];
        }

        $model->Status = 'PR APPROVED';

        $this->render('adminprpica', array(
            'model' => $model,
        ));
    }

    public function actionAdminapproval($mode = "") {
        $model = new PurchaseRequest('search');
        $model->unsetAttributes();  // clear any default values

        if (isset($_GET['PurchaseRequest'])) {
            $model->attributes = $_GET['PurchaseRequest'];
        }

        $model = PurchaseRequestDB::getPRFilterByMode($model, $mode);

        //$model->Status='PR';
        $model->approval_level = '<3';

        $this->render('adminapproval', array(
            'model' => $model,
            'mode' => $mode,
        ));
    }

    public function actionAdminapproved($approved = 1, $mode = "") { //1=approved ; 2=rejected
        $model = new PurchaseRequest('search');
        $model->unsetAttributes();  // clear any default values

        if (isset($_GET['PurchaseRequest'])) {
            $model->attributes = $_GET['PurchaseRequest'];
        }

        $model = PurchaseRequestDB::getPRFilterByMode($model, $mode);
        $status = "";
        if ($approved == 1) {
            $model->Status = 'PR APPROVED';
            $status = "approved";
        }

        if ($approved == 2) {
            $model->Status = 'PR REJECTED';
            $status = "rejected";
        }

        $this->render('adminapproved', array(
            'model' => $model,
            'status' => $status,
            'mode' => $mode,
        ));
    }

    public function actionAdmvessel($mode = "") {
        $model = new PurchaseRequest('search');
        $model->unsetAttributes();  // clear any default values

        if (isset($_GET['PurchaseRequest'])) {
            $model->attributes = $_GET['PurchaseRequest'];
        } else {
            $model->Status = 'PR';
        }

        $model = PurchaseRequestDB::selectorModel($mode, $model);

        $this->render('adminprvessel', array(
            'model' => $model,
            'label' => $mode,
        ));
    }

    public function actionAdmvesselapproved($mode = "", $approved = 1) {
        $model = new PurchaseRequest('search');
        $model->unsetAttributes();  // clear any default values

        if (isset($_GET['PurchaseRequest'])) {
            $model->attributes = $_GET['PurchaseRequest'];
        } else {
            
        }

        if ($approved == 1)
            $model->Status = 'PR APPROVED';

        if ($approved == 0)
            $model->Status = 'PR REJECTED';

        $model = PurchaseRequestDB::selectorModel($mode, $model);

        $this->render('adminprvesselapproved', array(
            'model' => $model,
            'label' => $mode,
            'approved' => $approved,
        ));
    }

    public function actionAdmvoyageapproved($mode = "", $approved = 1) {
        $model = new PurchaseRequest('search');
        $model->unsetAttributes();  // clear any default values

        if (isset($_GET['PurchaseRequest'])) {
            $model->attributes = $_GET['PurchaseRequest'];
        } else {
            
        }
        //$model->Status='PR APPROVED';

        if ($approved == 1)
            $model->Status = 'PR APPROVED';

        if ($approved == 0)
            $model->Status = 'PR REJECTED';


        $model = PurchaseRequestDB::selectorModel($mode, $model);

        $this->render('adminprvoyageapproved', array(
            'model' => $model,
            'label' => $mode,
            'approved' => $approved,
        ));
    }

    public function actionPrapproved() {
        $model = new PurchaseRequest('searchstatusapproved');
        $model->unsetAttributes();  // clear any default values

        if (isset($_GET['PurchaseRequest']))
            $model->attributes = $_GET['PurchaseRequest'];


        $this->render('prapproved', array(
            'model' => $model,
        ));
    }

    public function actionPrrejected() {
        $model = new PurchaseRequest('searchstatusrejected');
        $model->unsetAttributes();  // clear any default values

        if (isset($_GET['PurchaseRequest']))
            $model->attributes = $_GET['PurchaseRequest'];


        $this->render('prrejected', array(
            'model' => $model,
        ));
    }

    public function actionPo() {
        $model = new PurchaseRequest('searchstatuspo');
        $model->unsetAttributes();  // clear any default values

        if (isset($_GET['PurchaseRequest']))
            $model->attributes = $_GET['PurchaseRequest'];

        $this->render('po', array(
            'model' => $model,
        ));
    }

    public function actionApprove($id) {
        $model = $this->loadModel($id);
        $model->approval_level = 1;
        $model->is_approved = 1;
        //$model->Status='PR APPROVED';
        $model = LogUserUpdated::setUserApproved($model);
        $model->save();

        //NotificationDB::sendApprovedNotificationPR($model,1);

        echo'<div class="alert in alert-block fade alert-success">';
        echo'<a href="#" class="close" data-dismiss="alert">' . 'x' . '</a>';
        echo'PR has been approved On Level 1.';
        echo'</div>';
    }

    public function actionReject($id) {
        $model = $this->loadModel($id);
        $model->approval_level = 99;
        $model->is_approved = -1;
        $model->Status = 'PR REJECTED';
        $model = LogUserUpdated::setUserApproved($model);
        $model->save();

        NotificationDB::sendApprovedNotificationPR($model, 0);

        echo'<div class="alert in alert-block fade alert-error">';
        echo'<a href="#" class="close" data-dismiss="alert">' . 'x' . '</a>';
        echo'PR has been rejected On Level 1.';
        echo'</div>';
    }

    public function actionApprove2($id) {
        $model = $this->loadModel($id);
        $model->approval_level = 2;
        $model->is_approved2 = 1;
        $model->Status = 'PR APPROVED';
        $model->approved_user2 = Yii::app()->user->id;
        $model->ip_user_approved2 = IPAddressFunction::getUserIPAddress();
        $model->approval_date2 = Timeanddate::getCurrentDateTime();
        $model->save();

        //NotificationDB::sendApprovedNotificationPR($model,1);
        //Ketika di-approve maka item anak-anaknya otomatis juga akan berubah statusnya menjadi approve
        $modeldetails = PurchaseRequestDetail::model()->findAllByAttributes(array('id_purchase_request' => $id));
        foreach ($modeldetails as $detail) {
            $detail->status = 'PR APPROVED';
            $detail->save();
        }

        echo'<div class="alert in alert-block fade alert-success">';
        echo'<a href="#" class="close" data-dismiss="alert">' . 'x' . '</a>';
        echo'PR has been approved On Level 2.';
        echo'</div>';
    }

    public function actionReject2($id) {
        $model = $this->loadModel($id);
        $model->approval_level = 99;
        $model->is_approved2 = -1;
        $model->Status = 'PR REJECTED';
        $model->approved_user2 = Yii::app()->user->id;
        $model->ip_user_approved2 = IPAddressFunction::getUserIPAddress();
        $model->approval_date2 = Timeanddate::getCurrentDateTime();
        $model->save();

        NotificationDB::sendApprovedNotificationPR($model, 0);

        echo'<div class="alert in alert-block fade alert-error">';
        echo'<a href="#" class="close" data-dismiss="alert">' . 'x' . '</a>';
        echo'PR has been rejected On Level 2.';
        echo'</div>';
    }

    public function actionApprove3($id) {
        $model = $this->loadModel($id);
        $model->approval_level = 99;
        $model->is_approved3 = 1;
        $model->Status = 'PR APPROVED';
        $model->approved_user3 = Yii::app()->user->id;
        $model->ip_user_approved3 = IPAddressFunction::getUserIPAddress();
        $model->approval_date3 = Timeanddate::getCurrentDateTime();
        $model->save();

        NotificationDB::sendApprovedNotificationPR($model, 1);

        echo'<div class="alert in alert-block fade alert-success">';
        echo'<a href="#" class="close" data-dismiss="alert">' . 'x' . '</a>';
        echo'PR has been approved On Level 3.';
        echo'</div>';
    }

    public function actionReject3($id) {
        $model = $this->loadModel($id);
        $model->approval_level = 3;
        $model->is_approved3 = -1;
        $model->Status = 'PR REJECTED';
        $model->approved_user3 = Yii::app()->user->id;
        $model->ip_user_approved3 = IPAddressFunction::getUserIPAddress();
        $model->approval_date3 = Timeanddate::getCurrentDateTime();
        $model->save();

        NotificationDB::sendApprovedNotificationPR($model, 0);

        echo'<div class="alert in alert-block fade alert-error">';
        echo'<a href="#" class="close" data-dismiss="alert">' . 'x' . '</a>';
        echo'PR has been rejected On Level 3.';
        echo'</div>';
    }

    public function actionManyaction() {

        $vari = array();

        if (isset($_POST['mode'])) {
            $mode = $_POST['mode'];
        } else {
            $mode = '';
        }

        if (isset($_POST['pilihan'])) {
            $all = $_POST['pilihan'];


            if (isset($_POST['approvebutton'])) {

                foreach ($all as $a => $val) {
                    $model = $this->loadModel($val);
                    if ($model->approval_level == 0) {
                        //$vari[$a]=array('id'=>$model->id_purchase_request);
                        //$model->Status='PR APPROVED';
                        $model->approval_level = 1;
                        $model->is_approved = 1;
                        $model = LogUserUpdated::setUserApproved($model);
                        $model->save();

                        //NotificationDB::sendApprovedNotificationPR($model,1);
                    }
                }

                Yii::app()->user->setFlash('success', "PR has been Approved On Level 1");
                $this->redirect(array('purchaserequest/adminapproval', 'mode' => $mode));
            } else if (isset($_POST['rejectbutton'])) {

                foreach ($all as $a => $val) {
                    $model = $this->loadModel($val);
                    if ($model->approval_level == 0) {
                        //$vari[$a]=array('id'=>$model->id_purchase_request);
                        $model->approval_level = 99;
                        $model->is_approved = -1;
                        $model = LogUserUpdated::setUserApproved($model);
                        $model->Status = 'PR REJECTED';
                        $model->save();

                        NotificationDB::sendApprovedNotificationPR($model, 0);
                    }
                }

                Yii::app()->user->setFlash('success', "PR has been Rejected On Level 1");
                $this->redirect(array('purchaserequest/adminapproval', 'mode' => $mode));
            } else if (isset($_POST['approvebutton2'])) {

                foreach ($all as $a => $val) {
                    $model = $this->loadModel($val);
                    if ($model->approval_level == 1) {
                        //$vari[$a]=array('id'=>$model->id_purchase_request);
                        $model->approval_level = 2;
                        $model->is_approved2 = 1;
                        $model->Status = 'PR APPROVED';
                        $model->approved_user2 = Yii::app()->user->id;
                        $model->ip_user_approved2 = IPAddressFunction::getUserIPAddress();
                        $model->approval_date2 = Timeanddate::getCurrentDateTime();
                        $model->save();

                        //NotificationDB::sendApprovedNotificationPR($model,0);
                    }
                }

                Yii::app()->user->setFlash('success', "PR has been Approved On Level 2");
                $this->redirect(array('purchaserequest/adminapproval', 'mode' => $mode));
            } else if (isset($_POST['rejectbutton2'])) {

                foreach ($all as $a => $val) {
                    $model = $this->loadModel($val);
                    if ($model->approval_level == 1) {
                        //$vari[$a]=array('id'=>$model->id_purchase_request);
                        $model->approval_level = 99;
                        $model->is_approved2 = -1;
                        $model->Status = 'PR REJECTED';
                        $model->approved_user2 = Yii::app()->user->id;
                        $model->ip_user_approved2 = IPAddressFunction::getUserIPAddress();
                        $model->approval_date2 = Timeanddate::getCurrentDateTime();
                        $model->save();

                        NotificationDB::sendApprovedNotificationPR($model, 0);
                    }
                }

                Yii::app()->user->setFlash('success', "PR has been Rejected On Level 2");
                $this->redirect(array('purchaserequest/adminapproval', 'mode' => $mode));
            } else if (isset($_POST['approvebutton3'])) {

                foreach ($all as $a => $val) {
                    $model = $this->loadModel($val);
                    if ($model->approval_level == 2) {
                        //$vari[$a]=array('id'=>$model->id_purchase_request);
                        $model->approval_level = 3;
                        $model->is_approved3 = 1;
                        $model->Status = 'PR APPROVED';
                        $model->approved_user3 = Yii::app()->user->id;
                        $model->ip_user_approved3 = IPAddressFunction::getUserIPAddress();
                        $model->approval_date3 = Timeanddate::getCurrentDateTime();
                        $model->save();

                        NotificationDB::sendApprovedNotificationPR($model, 1);
                    }
                }

                Yii::app()->user->setFlash('success', "PR has been Approved On Level 3");
                $this->redirect(array('purchaserequest/adminapproval', 'mode' => $mode));
            } else if (isset($_POST['rejectbutton3'])) {

                foreach ($all as $a => $val) {
                    $model = $this->loadModel($val);
                    if ($model->approval_level == 2) {
                        //$vari[$a]=array('id'=>$model->id_purchase_request);
                        $model->approval_level = 99;
                        $model->is_approved3 = -1;
                        $model->Status = 'PR REJECTED';
                        $model->approved_user3 = Yii::app()->user->id;
                        $model->ip_user_approved3 = IPAddressFunction::getUserIPAddress();
                        $model->approval_date3 = Timeanddate::getCurrentDateTime();
                        $model->save();

                        NotificationDB::sendApprovedNotificationPR($model, 0);
                    }
                }

                Yii::app()->user->setFlash('success', "PR has been Rejected On Level 3");
                $this->redirect(array('purchaserequest/adminapproval', 'mode' => $mode));
            }



            /*
              $hasil=new CArrayDataProvider($vari, array(
              'keyField'=>'id',
              ));

              $this->render('coba',array(
              'dataProvider'=>$hasil,
              ));

             */
        } else {

            Yii::app()->user->setFlash('success', "You Have to select PR");
            $this->redirect(array('purchaserequest/adminapproval', 'mode' => $mode));
        }
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = PurchaseRequest::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    public function actionDeleteitemprvoyage($id_purchase_request_detail) {
        if (Yii::app()->request->isPostRequest) {
            $model = $this->loadModelDetail($id_purchase_request_detail);
            // we only allow deletion via POST request
            $this->loadModelDetail($id_purchase_request_detail)->delete();
            $totalDataItem = PurchaseRequestDetail::model()->countByAttributes(array('id_purchase_request' => $model->id_purchase_request));


            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        } else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    public function actionDeleteitemprvessel($id_purchase_request_detail, $mode) {
        if (Yii::app()->request->isPostRequest) {
            //$model=$this->loadModelDetail($id_purchase_request_detail);
            // we only allow deletion via POST request
            $this->loadModelDetail($id_purchase_request_detail)->delete();
            //$totalDataItem = PurchaseRequestDetail::model()->countByAttributes(array('id_purchase_request'=>$model->id_purchase_request));
            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax'])) {
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
            } else {
                //if($totalDataItem==0){
                //echo "<div class='alert alert-block alert-info' > Reload Standard Data</div>";
                //}
            }
        } else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    public function loadModelDetail($id) {
        $model = PurchaseRequestDetail::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'purchase-request-detail-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionAutoconsumablestock() {
        $return = array();
        $term = $_GET['term'];
        // Buat objek user baru (Instantiasi) dan lakukan pencarian nama berdasar keyword yang dimasukkan
        $items = ConsumableStockItem::model()->findAll(array(
            'condition' => 'consumable_stock_item LIKE :consumable_stock_item',
            'order' => 'consumable_stock_item ASC',
            'limit' => 5,
            'params' => array(
                ':consumable_stock_item' => "%$term%",
            ),
        ));

        $no = 0;
        foreach ($items as $item) {
            $no++;
            $return[] = array(
                'no' => $no,
                'id' => $item->id_consumable_stock_item,
                'nama' => $item->consumable_stock_item,
                'value' => $item->consumable_stock_item,
                'serial_number' => $item->serial_number,
                'impa' => $item->impa,
                'parent_level1' => $item->parent_level1,
                'parent_level2' => $item->parent_level2,
            );
        }
        echo CJSON::encode($return);
    }

    public function actionAutoEhs() {
        $return = array();
        $term = $_GET['term'];
        // Buat objek user baru (Instantiasi) dan lakukan pencarian nama berdasar keyword yang dimasukkan
        $items = EhsItem::model()->findAll(array(
            'condition' => 'ehs_item LIKE :ehs_item',
            'order' => 'ehs_item ASC',
            'limit' => 5,
            'params' => array(
                ':ehs_item' => "%$term%",
            ),
        ));

        $no = 0;
        foreach ($items as $item) {
            $no++;
            $return[] = array(
                'no' => $no,
                'id' => $item->id_ehs_item,
                'nama' => $item->ehs_item,
                'value' => $item->ehs_item,
                'serial_number' => $item->serial_number,
                'impa' => $item->impa,
                'parent_level1' => $item->parent_level1,
                'parent_level2' => $item->parent_level2,
            );
        }
        echo CJSON::encode($return);
    }
}
