<?php

class ExampleController extends Controller
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
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('getfuelstandard',''),
				'roles'=>array('ADM'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionGetfuelstandard()
	{
		$id_vessel_tug = 1770001; //PATRIA 1 - Hp 2200
		$id_vessel_barge = 1601004; //ALMAK - Size 300 ft
		$id_start_jetty = 20002; //BINTANG NINGGI
		$id_end_jety = 130003; //MERAK
		$STANDARD = StandardFuelDB::getStandardFuel($id_vessel_tug, $id_vessel_barge, $id_start_jetty, $id_end_jety);
		echo 'Standard Fuel: '.$STANDARD->fuel.' ltr ';
		echo '<br>';
		echo 'Standard Sailing Time: '.$STANDARD->cycle_time.' days';
	}

}
