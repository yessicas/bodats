<?php

class ReportController extends Controller
{
	/**
	* @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	* using two-column layout. See 'protected/views/layouts/column2.php'.
	*/
	public $layout='//layouts/twoplets';

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
			
			//Ini untuk PR Incentive
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('report_po',  'export', 'exportCsv'),
				'roles'=>array('ADM', 'HEA', 'HPRO', 'PRO'),
			),
			
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionReport_po($month="", $year="")
	{
		if(isset($_POST['Month'])){			
			$month = $_POST['Month'];
			$year =  (Timeanddate::getCurrentYear()*1);
			if(isset($_POST['Year'])){
				$year = $_POST['Year'];
			}
			
			$this->redirect(array('report_po', 'month'=>$month,'year'=>$year));
		}
		
		if($month == ""){
			$month = (Timeanddate::getCurrentMonth()*1);
			$year =  (Timeanddate::getCurrentYear()*1);
			$this->redirect(array('report_po', 'month'=>$month,'year'=>$year));
		}
	
		$model=new PurchaseOrderDetail('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['PurchaseOrderDetail']))
			$model->attributes=$_GET['PurchaseOrderDetail'];
			
		$model->POYear = $year;
		$model->POMonth = $month;
			

		$this->render('report_po',array(
			'model'=>$model,
			'month'=>$month,
			'year'=>$year,
		));
	}
	
	
	public function actionExport2()
    {
        $data=PurchaseOrderDetail::model()->findAll();
        $fields=array(
            'field1',
            'field2',
			'field3',
			'field4',
			
        );
   
        ExcelExporter::sendAsXLS('PurchaseOrderDetail', $data, true, $fields);
    }


	public function actionExport()
    {
        $data=PurchaseOrderDetail::model()->findAll();
        $fields=array(
            'field1',
            'field2',
		array (
			'name'=>'field_relasi1',
			'value'=>'$data->namaRelasi->field_relasi1',
		),
		array (
			'name'=>'field_relasi2',
			'value'=>'$data->namaRelasi->field_relasi2',
		),
		array(
			'class'=>'CButtonColumn',
		)
	)
			
        ;
   
        ExcelExporter::sendAsXLS('PurchaseOrderDetail', $data, true, $fields);
    }
	
	public function actionExportcsv($month="", $year="", $downloaded=true)
	{
		if(isset($_POST['Month'])){			
			$month = $_POST['Month'];
			$year =  (Timeanddate::getCurrentYear()*1);
			if(isset($_POST['Year'])){
				$year = $_POST['Year'];
			}
			
			$this->redirect(array('exportCsv', 'month'=>$month,'year'=>$year));
		}
		
		if($month == ""){
			$month = (Timeanddate::getCurrentMonth()*1);
			$year =  (Timeanddate::getCurrentYear()*1);
			$this->redirect(array('exportCsv', 'month'=>$month,'year'=>$year));
		}		
		
		//Header Untuk CSV
		if($downloaded){
			$csvFileName = "ReportPO"."Month".$month."Year".$year.".csv";
			header("Cache-Control: public");
			header("Content-Description: File Transfer");
			header("Content-Disposition: attachment; filename=".$csvFileName);
			header("Content-Type: application/octet-stream");
			header("Content-Transfer-Encoding: binary");
		}
		
		$searchModel = new PurchaseOrderDetail();
		$searchModel->POYear = $year;
		$searchModel->POMonth = $month;
		$dataProvider = $searchModel->searchReportPO();
		
		$datas = $dataProvider->getData() ;
		
		$dataProvider->setPagination(false);
		//$count = $dataProvider->totalItemCount();
		$names = array();
		$separator = ";";
		$endLine = "\r\n";
		$no = 0;
		
		//Label Column
		$LISTCOLUMNHEADER = ReportPO::getColumnLabelReportPO();
		foreach($LISTCOLUMNHEADER as $key=>$header){
			echo $header.$separator;
		}
		echo $endLine;
		
		foreach($datas as $data) {
			//echo $data->PO->PODate.' '.$data->id_purchase_order_detail.'<br>';
			$no++;
			echo $no.$separator;
			$col1 = ReportPO::getPRNumber($data);
			echo $col1.$separator;
			$col1 = ReportPO::getPONumber($data);
			echo $col1.$separator;
			$col1 = ReportPO::getPODate($data);
			echo $col1.$separator;
			$col1 = ReportPO::getVesselOrVoyage($data);
			echo $col1.$separator;
			$col1 = PurchaseRequestDB::getItemDetailPR($data);
			echo $col1.$separator;
			$col1 = ReportPO::getPOCategory($data);
			echo $col1.$separator;
			$col1 = ReportPO::getPONotes($data);
			echo $col1.$separator;
			$col1 = ReportPO::getQuantity($data);
			echo $col1.$separator;
			$col1 = ReportPO::getPrice($data);
			echo $col1.$separator;
			$col1 = ReportPO::getSubTotal($data);
			echo $col1.$separator;
			$col1 = $data->metric;
			echo $col1.$separator;
			$col1 = ReportPO::getPPN($data);
			echo $col1.$separator;
			$col1 = ReportPO::getPPH15($data);
			echo $col1.$separator;
			$col1 = ReportPO::getPPH23($data);
			echo $col1.$separator;
			$col1 = ReportPO::getCurrency($data);
			echo $col1.$separator;
			$col1 = ReportPO::getVendor($data);
			echo $col1.$separator;
			$col1 = ReportPO::getDeliveryDate($data);
			echo $col1.$separator;
			$col1 = ReportPO::getPOMonth($data);
			echo $col1.$separator;
			$col1 = ReportPO::getPODeliveryPlace($data);
			echo $col1.$separator;
			//echo $data->PO->PODate.$separator.$data->id_purchase_order_detail.$separator;
			//echo "<Br><br>";
			/*
			if($no > 5){
				break;
			}
			*/
			echo $endLine;
		}
	}
	
	//menggunakan extension phpexcel
	/*public function actionExport3()
	$hasil=Masukkan nilai array anda disini
    Yii::import('application.extensions.phpexcel.JPhpExcel');
    $xls = new JPhpExcel('UTF-8', false, 'test');
    $xls->addArray($hasil);
    $xls->generateXML('namaFileExcelYangAkanDihasilkan');
	*/
}
