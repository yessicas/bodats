<?php

class BackdoorController extends Controller
{
	/*
	ini hanya bisa diakses oleh ADMIN atau yang mengerti sistem. Tolong gunakan sebaik mungkin
	*/

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
				'actions'=>array('admin','repairpr', 'checkPOStatus', 'workordernumbering'
					
				),
				'roles'=>array('ADM'),
			),
			
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
					'actions'=>array('rollbackpo',
				),
				'roles'=>array('ADM'),
			),
			
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	
	/*
	Cara mengakses : backdoor/rollbackpo/idpo/693/delete/1   
	*/
	public function actionRollbackpo($idpo, $delete=0)
	{
		echo "IDPO:".$idpo." <br>";
		$modelpo = PurchaseOrder::model()->findByPk($idpo);
		if($modelpo != null){
			$podetails = PurchaseOrderDetail::model()->findAllByAttributes(array('id_purchase_order'=>$idpo));
			$i=0;
			foreach($podetails as $podetail){
				$i++;
				echo $i."IDPODETAIL=".$podetail->id_purchase_order_detail.". IDPR=".$podetail->id_purchase_request." | PO.ITEM:".$podetail->purchase_item_table." | IDITEM=".$podetail->id_item."<br>";
				
				$pr = PurchaseRequest::model()->findByPk($podetail->id_purchase_request);
				if($pr != null){
					$pr->Status='PR APPROVED';
					$pr->save(false);
					
					//Get The Child
					$prdetails = PurchaseRequestDetail::model()->findAllByAttributes(array('id_purchase_request'=>$pr->id_purchase_request));
					foreach($prdetails as $prdetail){
						echo " &nbsp; &nbsp;  DETAIL : idperdetail=".$prdetail->id_purchase_request_detail." | ITEM:".$prdetail->purchase_item_table." | ".$prdetail->notes."<br>";
						$prdetail->status='PR APPROVED';
						$prdetail->save(false);
					}
				}
				
				//Jika sudah dihapus
				if($delete==1){
					$podetail->delete();
				}
			}
			
			//Jika sudah dihapus
			if($delete==1){
				$modelpo->delete();
			}
		}else{
			echo 'PO Not found';
		}
	}

	/**
	* Displays a particular model.
	* @param integer $id the ID of the model to be displayed
	*/
	public function actionRepairpr()
	{
		echo 'Repair PR<br><br>';
		$no = 0;
		$modeldetails = PurchaseRequestDetail::model()->findAll();
		foreach($modeldetails as $detail){
			if($detail->purchase_item_table == "ConsumableStockItem"){
				if(isset($detail->PurchaseRequest)){
					if($detail->PurchaseRequest->Status == "PR APPROVED"){
						
						if($detail->status != 'PO'){
							
							echo "PR:".$detail->PurchaseRequest->Status.' Item:'.$detail->status.'<br>';
							echo $detail->id_purchase_request_detail."<br>";
							$no++;
							$detail->status = 'PR APPROVED';
							$detail->save();
							echo "status sekarang:".$detail->status.'<br>';
						}
					}
				}
			}
		}
		
		echo "TOTAL: ".$no;
	}
	
	public function actionCheckPOStatus(){
		$models = PurchaseOrder::model()->findAll();
		foreach($models as $po){
			echo $po->PONumber." ".$po->id_purchase_request." ";
			$pr = $po->PurchaseRequest;
			if(isset($pr)){
				echo $pr->Status;
				$pr->Status = "PO";
				$pr->save();
				echo " Now become : ".$pr->Status;
			}else{
				echo 'PR Not found';
			}			
			
			echo '<br>';
		}
	}
	
	public function actionWorkordernumbering(){
		$datas = Schedule::model()->findAllByAttributes(array("id_vessel_status"=>20), array('order'=>"created_date ASC"));
		foreach($datas as $data){
			echo $data->created_date.'<br>';
			/*
			$dataformatnumber=NumberingDocumentRepairScheduleDB::getFormatNumber($data,'id_schedule','SchNo','SchMonth','SchYear',$data->id_schedule);
			$data->SchNumber= $dataformatnumber['NumberFormat']; 
			$data->SchNo= $dataformatnumber['NoOrder']; 
			*/
			
			$dates = explode("-", $data->created_date);
			$year = $dates[0]; 
			$month = $dates[1]*1; 
			
			$data->SchMonth = NumberingDocumentRepairScheduleDB::getMonthNow(); 
			$data->SchYear= NumberingDocumentRepairScheduleDB::getYearNow(); 
			
			$data->SchMonth = $month; 
			$data->SchYear= $year;
			
			$newnoorder=1;  
			$single = Schedule::model()->findByAttributes(array("id_vessel_status"=>20, 'SchMonth'=>$month, "SchYear"=>$year), array('order'=>"SchNo DESC"));
			if($single != null){
				echo $single->SchNo."<br>";
				$newnoorder=(($single->SchNo)*1)+1;  
			}else{
				$newnoorder=1;  
			}
			$DocumentCode= NumberingDocumentRepairScheduleDB::getDocumentCode();			
			$RomawiMonth= NumberingDocumentRepairScheduleDB::getRomawiMonth($month);
			$NumberFormat=$DocumentCode.'/'.sprintf("%04s",$newnoorder).'/PML/'.$RomawiMonth.'/'.$year;
			
			$data->SchNumber = $NumberFormat;
			$data->SchNo = $newnoorder;
			/*
			$data->SchNumber = "";
			$data->SchNo = 0;
			$data->SchMonth = 0;
			$data->SchYear = 0;
			*/
			$data->save();
			
			echo '<br>';
			echo $data->SchNumber."<br>";
			echo "=============<br>";
		}
	}
}
