<?php

class InvoicevoyageController extends Controller {

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
                'actions' => array('admin', 'delete', 'report', 'viewreport', 'printfaktur', 'viewfaktur',
                    'invoicepayment', 'addpayment',
                    'create', 'update',
                    'index', 'view',
                    'createinvoicenonVoyage', 'viewNonVoyage', 'updateInvoicenonVoyage',
                    'reportNonVoyage', 'viewreportNonVoyage',
                    'printfakturNonVoyage', 'viewfakturNonVoyage', 'createmultipleinvoice',
                ),
                //'users'=>array('@'),
                'roles' => array('ADM', 'MKT'),
            ),
            //Untuk Pembayaran Invoice
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array(
                    'invoicepayment', 'addpayment',
                ),
                //'users'=>array('@'),
                'roles' => array('ADM', 'MKT', 'FIC'),
            ),
            //Ini untuk payment monitoring (ini sselain MKT, para pemimpin boleh lihat)
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('paymentmonitoring'
                ),
                //'users'=>array('@'),
                'roles' => array('ADM', 'MKT', 'FIC', 'HEA'),
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
        $modelvoyage = $this->loadModelvoyage($id);
        $this->render('view', array(
            'model' => $this->loadModelbyattvoyage($id),
            'modelvoyage' => $modelvoyage,
        ));
    }

    public function actionViewNonVoyage($id) {
        $modelvoyage = $this->loadModelquo($id); // model quotation sebenarnya cuman nama variable nya ga di ubah
        $this->render('viewNonVoyage', array(
            'model' => $this->loadModelbyattquo($id),
            'modelvoyage' => $modelvoyage,
        ));
    }

    public function actionReport($id) {
        $this->layout = '//layouts/laporan';
        $modelvoyage = $this->loadModelvoyage($id);

        $mPDF1 = Yii::app()->ePdf->mpdf();
        //$mPDF1 = Yii::app()->ePdf->mpdf('c', 'A4');
        $mpdf = new mPDF('utf-8', array(216, 304.8)); // dalam mm ukuran Fanfold (21.6 x 30.48 dalam cm)
        $mPDF1 = Yii::app()->ePdf->mpdf('', // mode - default ''
                '', // format - A4, for example, default ''
                0, // font size - default 0
                '', // default font family
                10, // margin_left
                10, // margin right
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
                    'model' => $this->loadModelbyattvoyage($id),
                    'modelvoyage' => $modelvoyage,
                        ), true)
        );

        $mPDF1->Output();
    }

    public function actionReportNonVoyage($id) {
        $this->layout = '//layouts/laporan';
        $modelvoyage = $this->loadModelquo($id);

        $mPDF1 = Yii::app()->ePdf->mpdf();
        //$mPDF1 = Yii::app()->ePdf->mpdf('c', 'A4');
        $mpdf = new mPDF('utf-8', array(216, 304.8)); // dalam mm ukuran Fanfold (21.6 x 30.48 dalam cm)
        $mPDF1 = Yii::app()->ePdf->mpdf('', // mode - default ''
                '', // format - A4, for example, default ''
                0, // font size - default 0
                '', // default font family
                10, // margin_left
                10, // margin right
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
                $this->render('reportNonVoyage', array(
                    'model' => $this->loadModelbyattquo($id),
                    'modelvoyage' => $modelvoyage,
                        ), true)
        );

        $mPDF1->Output();
    }

    public function actionViewreport($id) {
        $this->layout = '//layouts/laporan';
        $modelvoyage = $this->loadModelvoyage($id);
        $this->render('report', array(
            'model' => $this->loadModelbyattvoyage($id),
            'modelvoyage' => $modelvoyage,
        ));
    }

    public function actionViewreportNonVoyage($id) {
        $this->layout = '//layouts/laporan';
        $modelvoyage = $this->loadModelquo($id);
        $this->render('reportNonVoyage', array(
            'model' => $this->loadModelbyattquo($id),
            'modelvoyage' => $modelvoyage,
        ));
    }

    public function actionPrintfaktur($id) {
        $this->layout = '//layouts/laporan';
        $modelvoyage = $this->loadModelvoyage($id);

        $mPDF1 = Yii::app()->ePdf->mpdf();
        //$mPDF1 = Yii::app()->ePdf->mpdf('c', 'A4');
        $mpdf = new mPDF('utf-8', array(216, 304.8)); // dalam mm ukuran Fanfold (21.6 x 30.48 dalam cm)
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

        if ($modelvoyage->id_currency == 1) {
            $views = 'idr_printfaktur';
        } else {
            $views = 'printfaktur';
        }

        $mPDF1->WriteHTML(
                $this->render($views, array(
                    'model' => $this->loadModelbyattvoyage($id),
                    'modelvoyage' => $modelvoyage,
                        ), true)
        );

        $mPDF1->Output();
    }

    public function actionPrintfakturNonVoyage($id) {
        $this->layout = '//layouts/laporan';
        $modelvoyage = $this->loadModelquo($id);

        $mPDF1 = Yii::app()->ePdf->mpdf();
        //$mPDF1 = Yii::app()->ePdf->mpdf('c', 'A4');
        $mpdf = new mPDF('utf-8', array(216, 304.8)); // dalam mm ukuran Fanfold (21.6 x 30.48 dalam cm)
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

        if ($modelvoyage->QuantityPriceCurency == 1) {
            $views = 'idr_printfakturNonVoyage';
        } else {
            $views = 'printfakturNonVoyage';
        }

        $mPDF1->WriteHTML(
                $this->render($views, array(
                    'model' => $this->loadModelbyattquo($id),
                    'modelvoyage' => $modelvoyage,
                        ), true)
        );

        $mPDF1->Output();
    }

    public function actionViewfaktur($id) {
        $this->layout = '//layouts/laporan';
        $modelvoyage = $this->loadModelvoyage($id);

        if ($modelvoyage->id_currency == 1) {
            $views = 'idr_printfaktur';
        } else {
            $views = 'printfaktur';
        }


        $this->render($views, array(
            'model' => $this->loadModelbyattvoyage($id),
            'modelvoyage' => $modelvoyage,
        ));
    }

    public function actionViewfakturNonVoyage($id) {
        $this->layout = '//layouts/laporan';
        $modelvoyage = $this->loadModelquo($id);

        if ($modelvoyage->QuantityPriceCurency == 1) {
            $views = 'idr_printfakturNonVoyage';
        } else {
            $views = 'printfakturNonVoyage';
        }


        $this->render($views, array(
            'model' => $this->loadModelbyattquo($id),
            'modelvoyage' => $modelvoyage,
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate($id) {
        // cek kelengkapan data 
        $modeldoc1 = VoyageCloseDocument::model()->find(array(
            'condition' => 'id_voyage_order = :id_voyage_order AND IdVoyageDocument = :IdVoyageDocument1',
            'params' => array(
                ':id_voyage_order' => $id,
                ':IdVoyageDocument1' => 2,
            ),
        ));

        $modeldoc2 = VoyageCloseDocument::model()->find(array(
            'condition' => 'id_voyage_order = :id_voyage_order AND IdVoyageDocument = :IdVoyageDocument2',
            'params' => array(
                ':id_voyage_order' => $id,
                ':IdVoyageDocument2' => 3,
            ),
        ));

        $VoyageOrderData = VoyageOrder::model()->findByPk($id);
        $SO = So::model()->findByPk($VoyageOrderData->id_so);

        $doc1Name = MstVoyageDocument::model()->findByPk(2)->DocumentName;
        $doc2Name = MstVoyageDocument::model()->findByPk(3)->DocumentName;


        if (!$modeldoc1 || !$modeldoc2 || $SO->SI_is_attach == 0) { // kalo tidak ada   document dengan id 2 dan 3 dan so harus sudah di upload document
            Yii::app()->user->setFlash('error', "Please Upload Closed Voyage Document " . $doc1Name . " and " . $doc2Name . " And Upload Shipping Order Document ");
            $this->redirect(array('voyageorder/finishvoyage'));
        }
        // end cek kelengkapan data 

        $model = InvoiceVoyage::model()->findByAttributes(array('id_voyage_order' => $id));
        if ($model == null)
            $model = new InvoiceVoyage;

        $modelvoyage = $this->loadModelvoyage($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['InvoiceVoyage'])) {
            $model->attributes = $_POST['InvoiceVoyage'];
            $model->id_voyage_order = $id;
            $model->PaymentStatus = 'UNPAID';
            $model->created_user = Yii::app()->user->id;
            $model->created_date = date("Y-m-d H:i:s");
            $model->ip_user_updated = $_SERVER['REMOTE_ADDR'];

            $model->InvoiceNumberInt = InvoiceDB::getLastNumberFromFull($model->InvoiceNumber);

            if ($model->save()) {
                $modelvoyageorder = $this->loadModelvoyage($model->id_voyage_order);
                $modelvoyageorder->invoice_created = 1;
                $modelvoyageorder->status = "INVOICE";
                $modelvoyageorder->save(false);

                InvoiceDB::saveLastInvoiceNumber($model->InvoiceNumber, $model->id_invoice_voyage);
                FakturNumbering::takeNumberAutomatic($model->print_NoFakturPajak, $model->InvoiceNumber);

                Yii::app()->user->setFlash('success', " Data Saved");
                $this->redirect(array('view', 'id' => $model->id_voyage_order));
            }
        }

        $this->render('create', array(
            'model' => $model,
            'modelvoyage' => $modelvoyage,
        ));
    }

    public function actionCreatemultipleinvoice($id) {

        $cid = null;
//        $is_single = false;
        if (isset($_POST['cid']))
            $cid = $_POST['cid'];
//
        if ($id != "") {
            $cid[$id] = 0;
//            $is_single = true;
        }
        // cek kelengkapan data 
        $modeldoc1 = VoyageCloseDocument::model()->find(array(
            'condition' => 'id_voyage_order = :id_voyage_order AND IdVoyageDocument = :IdVoyageDocument1',
            'params' => array(
                ':id_voyage_order' => $id,
                ':IdVoyageDocument1' => 2,
            ),
        ));

        $modeldoc2 = VoyageCloseDocument::model()->find(array(
            'condition' => 'id_voyage_order = :id_voyage_order AND IdVoyageDocument = :IdVoyageDocument2',
            'params' => array(
                ':id_voyage_order' => $id,
                ':IdVoyageDocument2' => 3,
            ),
        ));

        $VoyageOrderData = VoyageOrder::model()->findByPk($id);
        $SO = So::model()->findByPk($VoyageOrderData->id_so);

        $doc1Name = MstVoyageDocument::model()->findByPk(2)->DocumentName;
        $doc2Name = MstVoyageDocument::model()->findByPk(3)->DocumentName;

        if (!$modeldoc1 || !$modeldoc2 || $SO->SI_is_attach == 0) { // kalo tidak ada   document dengan id 2 dan 3 dan so harus sudah di upload document
            Yii::app()->user->setFlash('error', "Please Upload Closed Voyage Document " . $doc1Name . " and " . $doc2Name . " And Upload Shipping Order Document ");
            $this->redirect(array('voyageorder/finishvoyage'));
        }
        // end cek kelengkapan data 

        $model = InvoiceVoyage::model()->findByAttributes(array('id_voyage_order' => $id));
        if ($model == null)
            $model = new InvoiceVoyage;

        $modelvoyage = $this->loadModelvoyage($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['InvoiceVoyage'])) {
            $model->attributes = $_POST['InvoiceVoyage'];
            $model->id_voyage_order = $id;
            $model->PaymentStatus = 'UNPAID';
            $model->created_user = Yii::app()->user->id;
            $model->created_date = date("Y-m-d H:i:s");
            $model->ip_user_updated = $_SERVER['REMOTE_ADDR'];

            $model->InvoiceNumberInt = InvoiceDB::getLastNumberFromFull($model->InvoiceNumber);

            if ($model->save()) {
                $modelvoyageorder = $this->loadModelvoyage($model->id_voyage_order);
                $modelvoyageorder->invoice_created = 1;
                $modelvoyageorder->status = "INVOICE";
                $modelvoyageorder->save(false);

                InvoiceDB::saveLastInvoiceNumber($model->InvoiceNumber, $model->id_invoice_voyage);
                FakturNumbering::takeNumberAutomatic($model->print_NoFakturPajak, $model->InvoiceNumber);

                Yii::app()->user->setFlash('success', " Data Saved");
                $this->redirect(array('view', 'id' => $model->id_voyage_order));
            }
        }

        if ($cid != null) {
            $this->render('createmultipleinvoice', array(
                'cid' => $cid,
                'model' => $model,
                //'is_single' => $is_single,
                'modelvoyage' => $modelvoyage,
            ));
        } else {
            Yii::app()->user->setFlash('success', "You must select one of item first!");
            $this->redirect(array('createmultipleinvoice'));
        }

//        $this->render('create', array(
//            'model' => $model,
//            'modelvoyage' => $modelvoyage,
//        ));
    }

    public function actionCreateinvoicenonVoyage($id) {


        $model = InvoiceVoyage::model()->findByAttributes(array('id_quotation' => $id));
        if ($model == null)
            $model = new InvoiceVoyage;

        $model->Scenario = 'NonVoyage';

        $modelvoyage = $this->loadModelquo($id); // model quotation ini sebenarnya cuman namanya aja ga di ubah
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['InvoiceVoyage'])) {
            $model->attributes = $_POST['InvoiceVoyage'];
            $model->id_quotation = $id;
            $model->PaymentStatus = 'UNPAID';
            $model->created_user = Yii::app()->user->id;
            $model->created_date = date("Y-m-d H:i:s");
            $model->ip_user_updated = $_SERVER['REMOTE_ADDR'];

            if ($model->save()) {
                $modelvoyageorder = $this->loadModelquo($model->id_quotation); // model quotation ini sebenarnya cuman namanya aja ga di ubah
                $modelvoyageorder->Status = "INVOICE";
                $modelvoyageorder->save(false);

                Yii::app()->user->setFlash('success', " Data Saved");
                $this->redirect(array('viewNonVoyage', 'id' => $model->id_quotation));
            }
        }

        $this->render('createNonVoyage', array(
            'model' => $model,
            'modelvoyage' => $modelvoyage, // model quotation ini sebenarnya cuman namanya aja ga di ubah
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModelbyattvoyage($id);
        $modelvoyage = $this->loadModelvoyage($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['InvoiceVoyage'])) {
            $model->attributes = $_POST['InvoiceVoyage'];
            //$model->PaymentStatus='UNPAID';
            if ($model->save()) {
                $modelvoyageorder = $this->loadModelvoyage($model->id_voyage_order);
                $modelvoyageorder->invoice_created = 1;
                $modelvoyageorder->status = "INVOICE";
                $modelvoyageorder->save(false);

                Yii::app()->user->setFlash('success', " Data Updated");
                $this->redirect(array('view', 'id' => $model->id_voyage_order));
            }
        }


        $this->render('update', array(
            'model' => $model,
            'modelvoyage' => $modelvoyage,
        ));
    }

    public function actionupdateInvoicenonVoyage($id) {
        $model = $this->loadModelbyattquo($id);
        $modelvoyage = $this->loadModelquo($id); // ini model quotation cuman ga di ganti nama variable nya

        $model->Scenario = 'NonVoyage';
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['InvoiceVoyage'])) {
            $model->attributes = $_POST['InvoiceVoyage'];
            //$model->PaymentStatus='UNPAID';
            if ($model->save()) {
                $modelvoyageorder = $this->loadModelquo($model->id_quotation); // ini model quotation cuman ga di ganti nama variable nya
                $modelvoyageorder->Status = "INVOICE";
                $modelvoyageorder->save(false);

                Yii::app()->user->setFlash('success', " Data Updated");
                $this->redirect(array('viewNonVoyage', 'id' => $model->id_quotation));
            }
        }


        $this->render('updateNonVoyage', array(
            'model' => $model,
            'modelvoyage' => $modelvoyage,
        ));
    }

    public function actionAddpayment($id) {
        $model = $this->loadModel($id);
        $model->Scenario = 'addpayment';

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['InvoiceVoyage'])) {
            $model->attributes = $_POST['InvoiceVoyage'];
            if ($model->save()) {
                $updateData = $this->loadModel($model->id_invoice_voyage);
                $updateData->PaymentLate = PurchaseRequestDB::countRangeDataByDB($model->invoice_duedate, $model->PaymentDate);
                $updateData->save(false);

                Yii::app()->user->setFlash('success', " Data Saved");
                $this->redirect(array('invoicevoyage/invoicepayment'));
            }
        }

        if (Yii::app()->request->getIsAjaxRequest()) {
            echo $this->renderPartial('addpayment', array('model' => $model), true, true); //This will bring out the view along with its script.
        } else
            $this->render('addpayment', array(
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
        $dataProvider = new CActiveDataProvider('InvoiceVoyage');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new InvoiceVoyage('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['InvoiceVoyage']))
            $model->attributes = $_GET['InvoiceVoyage'];


        $voyage = new VoyageOrder('searchbystatusfinish');
        $voyage->unsetAttributes();  // clear any default values
        if (isset($_GET['VoyageOrder']))
            $voyage->attributes = $_GET['VoyageOrder'];

        $this->render('admin', array(
            'model' => $model,
            'voyage' => $voyage,
        ));
    }

    public function actionInvoicepayment() {
        $model = new InvoiceVoyage('searchbyUnpaid');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['InvoiceVoyage']))
            $model->attributes = $_GET['InvoiceVoyage'];


        $this->render('invoicepayment', array(
            'model' => $model,
        ));
    }

    public function actionPaymentmonitoring() {
        $model = new InvoiceVoyage('');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['InvoiceVoyage']))
            $model->attributes = $_GET['InvoiceVoyage'];


        $this->render('paymentmonitoring', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = InvoiceVoyage::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'Invoice Voyage related does not exist. There is a possibility deleted (ID : ' . $id . ').');
        return $model;
    }

    public function loadModelvoyage($id) {
        $model = VoyageOrder::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'Voyage order related does not exist (ID : ' . $id . ').');
        return $model;
    }

    public function loadModelquo($id) {
        $model = Quotation::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'Quotation related does not exist (ID : ' . $id . ').');
        return $model;
    }

    public function loadModelbyattvoyage($id) {
        $model = InvoiceVoyage::model()->findByAttributes(array('id_voyage_order' => $id));
        if ($model === null)
            throw new CHttpException(404, 'Invoice Voyage related does not exist (ID Voyage Order : ' . $id . '). There is a possibility deleted, please contact your administrator');
        return $model;
    }

    public function loadModelbyattquo($id) {
        $model = InvoiceVoyage::model()->findByAttributes(array('id_quotation' => $id));
        if ($model === null)
            throw new CHttpException(404, 'Invoice Voyage page does not exist (ID Quotation : ' . $id . ').');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'invoice-voyage-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
