<?php
class MasterTemplateController extends Controller {
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
                'actions' => array('msttemplate'
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

    public function actionMstTemplate(){
    	$model = new MasterTemplate;
    	$nameMst = isset($_GET['nameMst']) ? $_GET['nameMst'] : '';
        // $this->render('list-activity-form',array('model'=>$modeel));
        $this->render('list-activity-form', array(
            'viewer' => true,
			// 'editschedule' => false,
			'model' => $model,
			'nameMst' => $nameMst,
        ));
    }

}
?>