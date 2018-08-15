<?php
class SalesPlanDB {	
	public static function selectTabel($is_mode="salesplan"){
		switch($is_mode){
			case "salesplan": 
				return "sales_plan";
				
			case "outlook";
				return "sales_plan_outlook";
				
			case "monthly";
				return "sales_plan_month";
		}
	}
	
	public static function selectModel($is_mode="salesplan"){
		switch($is_mode){
			case "salesplan": 
				return "SalesPlan";
				
			case "annual": 
				return "SalesPlan";
				
			case "outlook";
				return "SalesPlanOutlook";
				
			case "monthly";
				return "SalesPlanMonth";
		}
	}
	
	public static function selectModelTabel($is_mode="salesplan"){
		switch($is_mode){
			case "salesplan": 
				return "sales_plan";
				
			case "annual": 
				return "sales_plan";
				
			case "outlook";
				return "sales_plan_outlook";
				
			case "monthly";
				return "sales_plan_month";
		}
	}

	public static function getSalesPlanByTimeAndVessel($id_vessel_tug, $id_vessel_barge, $month, $year,$is_mode="salesplan"){
		$modelname = SalesPlanDB::selectModel($is_mode);
		$sp = $modelname::model()->findAllByAttributes(array(
			'id_vessel_tug'=>$id_vessel_tug,
			'id_vessel_barge'=>$id_vessel_barge,
			'month'=>$month,
			'year'=>$year,
		));
		
		return $sp;
	}	 
	
	/*Ini fitur untuk mendapatkan list sales plan yang sudah mengalami breaking pair
	sehingga untuk mendapatkan adalah yang mencari bukan pasangannya
	kuncinya ada di != id_vessel_barge
	*/
	public static function getSalesPlanByTimeAndVesselException($id_vessel_tug, $id_vessel_barge, $month, $year,$is_mode="salesplan"){		
		$tablename = SalesPlanDB::selectModelTabel($is_mode);
		$modelname = SalesPlanDB::selectModel($is_mode);
		$sql = "
			SELECT * FROM ".$tablename." WHERE id_vessel_tug = '".$id_vessel_tug."' 
			AND id_vessel_barge != '".$id_vessel_barge."'
			AND month = '".$month."' AND year = '".$year."' 
			
			ORDER BY id_vessel_barge ASC
		";
		//echo $sql;
		$listall = $modelname::model()->findAllBySql($sql);
		return $listall;
	}
	
	public static function getSalesPlanByTimeAndVesselTugOnly($id_vessel_tug, $month, $year,$is_mode="salesplan"){
		$modelname = SalesPlanDB::selectModel($is_mode);
		$sp = $modelname::model()->findAllByAttributes(array(
			'id_vessel_tug'=>$id_vessel_tug,
			'month'=>$month,
			'year'=>$year,
		));
		
		return $sp;
	}	
	
	public static function getSalesPlanByTime($month, $year,$is_mode="salesplan"){
		$modelname = SalesPlanDB::selectModel($is_mode);
		$sp = $modelname::model()->findAllByAttributes(array(
			'month'=>$month,
			'year'=>$year,
		),array('order'=>'id_vessel_tug ASC, id_vessel_barge DESC'));
		
		return $sp;
	}	 


	public static function getSummary($field,$id_vessel_tug,$id_vessel_barge){
		//Anti SQL Injection - dipastikan variabel yang integer diubah ke integer.
		$id_vessel_tug = intval($id_vessel_tug*1);
		$id_vessel_barge = intval($id_vessel_barge*1);
		
		$sql ="SELECT SUM( $field ) as jumlah
				FROM  `sales_plan` 
				WHERE id_vessel_tug =$id_vessel_tug
				AND id_vessel_barge =$id_vessel_barge";  
		$command =Yii::app()->db->createCommand($sql); 
		$totaldata =$command->queryRow(); 
		return ($totaldata['jumlah'] > 0 ) ? $totaldata['jumlah']: "-";
		     
	}

	public static function getSalesPlanVoyNo($id_vessel_barge,$year, $is_mode){
		$model = SalesPlanDB::selectModel($is_mode);
		$sp = $model::model()->findAllByAttributes(array(
			'id_vessel_barge'=>$id_vessel_barge,
			'year'=>$year,
		));
		
		return count($sp);
		//$count = count ( $sp );
	}

	public static function getSalesPlanVoyNoNext($id_vessel_barge,$year, $is_mode){
		$max = 0;
		
		$model = SalesPlanDB::selectModel($is_mode);
		$salesplans = $model::model()->findAllByAttributes(array(
			'id_vessel_barge'=>$id_vessel_barge,
			'year'=>$year,
		));
		
		foreach($salesplans as $sp){
			$voyageno = $sp->voyage_no;
			if($voyageno > $max){
				$max = $voyageno;
			}
		}
		
		return ($max+1);
		//$count = count ( $sp );
	}		
	
	

	public static function getcountSalesDBPerYear($month,$year){
		//Anti SQL Injection - dipastikan variabel yang integer diubah ke integer.
		$month = intval($month*1);
		$year = intval($year*1);
		
		$sql ="SELECT COUNT( id_sales_plan ) AS jumlah
		FROM  `sales_plan` 
		WHERE 
		month = $month AND year = $year";  
		$command =Yii::app()->db->createCommand($sql); 
		$totaldata =$command->queryRow(); 
		return $totaldata['jumlah'];
		
	}

	 public static function getTotalSalesCostPerYear($month,$year){
		$sql ="SELECT SUM( TotalSalesCost ) AS jumlah
		FROM  `sales_plan` 
		WHERE 
		month = $month AND year = $year";  
		$command =Yii::app()->db->createCommand($sql); 
		$totaldata =$command->queryRow(); 
		return $totaldata['jumlah'];
		
	      }

	public static function getTotalRavenuePerYear($month,$year){
		$sql ="SELECT SUM( TotalRevenue ) AS jumlah
		FROM  `sales_plan` 
		WHERE 
		month = $month AND year = $year";  
		$command =Yii::app()->db->createCommand($sql); 
		$totaldata =$command->queryRow(); 
		return $totaldata['jumlah'];
		
	      }

	public static function getTotalGPCOGSPerYear($month,$year){
		$sql ="SELECT SUM( GP_COGS ) AS jumlah
		FROM  `sales_plan` 
		WHERE 
		month = $month AND year = $year";  
		$command =Yii::app()->db->createCommand($sql); 
		$totaldata =$command->queryRow(); 

		$jumlahData= SalesPlanDB::getcountSalesDBPerYear($month,$year);

		if($jumlahData>0){
			return $totaldata['jumlah']/$jumlahData;
		}else{
			return $totaldata['jumlah'];
		}
		
	      }




	  // di budget

	public static function addvaluepercented($margin,$standar){
		$data = (($margin*$standar)/100)+$standar;
		return $data;
	}
	 
	public static function getFuelCostPerYear($year){
	  	// jumlah standar 
		$sql ="SELECT SUM( FuelCost ) AS jumlah
		FROM  `sales_plan` 
		WHERE 
		year = $year";  
		$command =Yii::app()->db->createCommand($sql); 
		$totaldata =$command->queryRow(); 
		return $totaldata['jumlah'];

		/*
		// rata rata margin
		$sqlM ="SELECT AVG( MarginFuelCost ) AS jumlah
		FROM  `sales_plan` 
		WHERE 
		year = $year";  
		$commandM =Yii::app()->db->createCommand($sqlM); 
		$totaldataM =$commandM->queryRow(); 
		//return $totaldataM['jumlah'];

		return SalesPlanDB::addvaluepercented($totaldataM['jumlah'],$totaldata['jumlah']);
		*/
		
	}

	  public static function getDepreciationCostPerYear($year){

		$sql ="SELECT SUM( DepreciationCost ) AS jumlah
		FROM  `sales_plan` 
		WHERE 
		year = $year";  
		$command =Yii::app()->db->createCommand($sql); 
		$totaldata =$command->queryRow(); 
		return $totaldata['jumlah'];
		
		/*
		// rata rata margin
		$sqlM ="SELECT AVG( MarginDepreciationCost ) AS jumlah
		FROM  `sales_plan` 
		WHERE 
		year = $year";  
		$commandM =Yii::app()->db->createCommand($sqlM); 
		$totaldataM =$commandM->queryRow(); 
		//return $totaldataM['jumlah'];

		return SalesPlanDB::addvaluepercented($totaldataM['jumlah'],$totaldata['jumlah']);
		*/


	      }


	 public static function getRentPerYear($year){

	 	// standar 
		$sql ="SELECT SUM( Rent ) AS jumlah
		FROM  `sales_plan` 
		WHERE 
		year = $year";  
		$command =Yii::app()->db->createCommand($sql); 
		$totaldata =$command->queryRow(); 
		return $totaldata['jumlah'];

		/*
		// rata rata margin
		$sqlM ="SELECT AVG( MarginRent ) AS jumlah
		FROM  `sales_plan` 
		WHERE 
		year = $year";  
		$commandM =Yii::app()->db->createCommand($sqlM); 
		$totaldataM =$commandM->queryRow(); 
		//return $totaldataM['jumlah'];

		return SalesPlanDB::addvaluepercented($totaldataM['jumlah'],$totaldata['jumlah']);
		*/
		
	    }

	    public static function getAgencyCostPerYear($year){

		$sql ="SELECT SUM( AgencyCost ) AS jumlah
		FROM  `sales_plan` 
		WHERE 
		year = $year";  
		$command =Yii::app()->db->createCommand($sql); 
		$totaldata =$command->queryRow(); 
		return $totaldata['jumlah'];
		
		/*
		// rata rata margin
		$sqlM ="SELECT AVG( MarginAgencyCost ) AS jumlah
		FROM  `sales_plan` 
		WHERE 
		year = $year";  
		$commandM =Yii::app()->db->createCommand($sqlM); 
		$totaldataM =$commandM->queryRow(); 
		//return $totaldataM['jumlah'];

		return SalesPlanDB::addvaluepercented($totaldataM['jumlah'],$totaldata['jumlah']);
		*/


	      }

	    public static function getSubconCostPerYear($year){

		$sql ="SELECT SUM( SubconCost ) AS jumlah
		FROM  `sales_plan` 
		WHERE 
		year = $year";  
		$command =Yii::app()->db->createCommand($sql); 
		$totaldata =$command->queryRow(); 
		return $totaldata['jumlah'];
		
		/*
		// rata rata margin
		$sqlM ="SELECT AVG( MarginSubconCost ) AS jumlah
		FROM  `sales_plan` 
		WHERE 
		year = $year";  
		$commandM =Yii::app()->db->createCommand($sqlM); 
		$totaldataM =$commandM->queryRow(); 
		//return $totaldataM['jumlah'];

		return SalesPlanDB::addvaluepercented($totaldataM['jumlah'],$totaldata['jumlah']);
		*/

	      }


	    public static function getBrokerageCostPerYear($year){

		$sql ="SELECT SUM( BrokerageCost ) AS jumlah
		FROM  `sales_plan` 
		WHERE 
		year = $year";  
		$command =Yii::app()->db->createCommand($sql); 
		$totaldata =$command->queryRow(); 
		return $totaldata['jumlah'];
		
		/*
		// rata rata margin
		$sqlM ="SELECT AVG( MarginBrokerageCost ) AS jumlah
		FROM  `sales_plan` 
		WHERE 
		year = $year";  
		$commandM =Yii::app()->db->createCommand($sqlM); 
		$totaldataM =$commandM->queryRow(); 
		//return $totaldataM['jumlah'];

		return SalesPlanDB::addvaluepercented($totaldataM['jumlah'],$totaldata['jumlah']);
		*/


	      }


	     public static function getOthersCostPerYear($year){

		$sql ="SELECT SUM( OthersCost ) AS jumlah
		FROM  `sales_plan` 
		WHERE 
		year = $year";  
		$command =Yii::app()->db->createCommand($sql); 
		$totaldata =$command->queryRow(); 
		return $totaldata['jumlah'];
		
		/*
		// rata rata margin
		$sqlM ="SELECT AVG( MarginOthersCost ) AS jumlah
		FROM  `sales_plan` 
		WHERE 
		year = $year";  
		$commandM =Yii::app()->db->createCommand($sqlM); 
		$totaldataM =$commandM->queryRow(); 
		//return $totaldataM['jumlah'];

		return SalesPlanDB::addvaluepercented($totaldataM['jumlah'],$totaldata['jumlah']);
		*/


	      }






	  public static function getCrewCostPerYear($year){
		$sql ="SELECT SUM( CrewCost ) AS jumlah
		FROM  `sales_plan` 
		WHERE 
		year = $year";  
		$command =Yii::app()->db->createCommand($sql); 
		$totaldata =$command->queryRow(); 
		return $totaldata['jumlah'];

		/*
		// rata rata margin
		$sqlM ="SELECT AVG( MarginCrewCost ) AS jumlah
		FROM  `sales_plan` 
		WHERE 
		year = $year";  
		$commandM =Yii::app()->db->createCommand($sqlM); 
		$totaldataM =$commandM->queryRow(); 
		//return $totaldataM['jumlah'];

		return SalesPlanDB::addvaluepercented($totaldataM['jumlah'],$totaldata['jumlah']);
		*/
	      }


	  public static function getDockingCostPerYear($year){
		$sql ="SELECT SUM( DockingCost ) AS jumlah
		FROM  `sales_plan` 
		WHERE 
		year = $year";  
		$command =Yii::app()->db->createCommand($sql); 
		$totaldata =$command->queryRow(); 
		return $totaldata['jumlah'];

		/*
		// rata rata margin
		$sqlM ="SELECT AVG( MarginDockingCost ) AS jumlah
		FROM  `sales_plan` 
		WHERE 
		year = $year";  
		$commandM =Yii::app()->db->createCommand($sqlM); 
		$totaldataM =$commandM->queryRow(); 
		//return $totaldataM['jumlah'];

		return SalesPlanDB::addvaluepercented($totaldataM['jumlah'],$totaldata['jumlah']);
		*/
		
	      }


	   public static function getRepairCostPerYear($year){
		$sql ="SELECT SUM( RepairCost ) AS jumlah
		FROM  `sales_plan` 
		WHERE 
		year = $year";  
		$command =Yii::app()->db->createCommand($sql); 
		$totaldata =$command->queryRow(); 
		return $totaldata['jumlah'];

		/*
		// rata rata margin
		$sqlM ="SELECT AVG( MarginRepairCost ) AS jumlah
		FROM  `sales_plan` 
		WHERE 
		year = $year";  
		$commandM =Yii::app()->db->createCommand($sqlM); 
		$totaldataM =$commandM->queryRow(); 
		//return $totaldataM['jumlah'];

		return SalesPlanDB::addvaluepercented($totaldataM['jumlah'],$totaldata['jumlah']);
		*/
		
	      }


	   public static function getIncuranceCostPerYear($year){
		$sql ="SELECT SUM( IncuranceCost ) AS jumlah
		FROM  `sales_plan` 
		WHERE 
		year = $year";  
		$command =Yii::app()->db->createCommand($sql); 
		$totaldata =$command->queryRow(); 
		return $totaldata['jumlah'];

		/*
		// rata rata margin
		$sqlM ="SELECT AVG( MarginIncuranceCost ) AS jumlah
		FROM  `sales_plan` 
		WHERE 
		year = $year";  
		$commandM =Yii::app()->db->createCommand($sqlM); 
		$totaldataM =$commandM->queryRow(); 
		//return $totaldataM['jumlah'];

		return SalesPlanDB::addvaluepercented($totaldataM['jumlah'],$totaldata['jumlah']);
		*/
		
	      }




	    public static function getTotalSalesCostPerYearOnly($year){
		$sql ="SELECT SUM( TotalSalesCost ) AS jumlah
		FROM  `sales_plan` 
		WHERE 
		year = $year";  
		$command =Yii::app()->db->createCommand($sql); 
		$totaldata =$command->queryRow(); 
		return $totaldata['jumlah'];
		
	      }



	   public static function getGrossProfitMarginPerYear($year){
		

		// rata rata margin
		$sqlM ="SELECT AVG( GP_COGS ) AS jumlah
		FROM  `sales_plan` 
		WHERE 
		year = $year";  
		$commandM =Yii::app()->db->createCommand($sqlM); 
		$totaldataM =$commandM->queryRow(); 
		return $totaldataM['jumlah'];

		
		
	      }





	public static function getTotalRavenueAffcoPerYear($year){
		$sql =" SELECT SUM( sales_plan.TotalRevenue ) AS jumlah
		FROM sales_plan, customer
		WHERE year = $year
		AND customer.id_customer = sales_plan.id_customer
		AND customer.GroupCategory =  'GROUP' ";  
		$command =Yii::app()->db->createCommand($sql); 
		$totaldata =$command->queryRow(); 
		return $totaldata['jumlah'];
	}


	   public static function getTotalRavenue3PPerYear($year){
		$sql =" SELECT SUM( sales_plan.TotalRevenue ) AS jumlah
		FROM sales_plan, customer
		WHERE year = $year
		AND customer.id_customer = sales_plan.id_customer
		AND customer.GroupCategory =  'NON-GROUP' ";  
		$command =Yii::app()->db->createCommand($sql); 
		$totaldata =$command->queryRow(); 
		return $totaldata['jumlah'];
		
	      }

	/*Ini Summary untuk Outlook*/
	public static function getStandardOutlookSummaryValue($field, $year, $outlook, $tablename="sales_plan_outlook"){
		$outlook = intval($outlook*1);
		$year = intval($year*1);
	
	  	// jumlah standar 
		$sql ="SELECT SUM( ".$field." ) AS jumlah
		FROM  ".$tablename." 
		WHERE 
		year = '".$year."' AND outlook = '".$outlook."'";  
		$command =Yii::app()->db->createCommand($sql); 
		$totaldata =$command->queryRow(); 
		return $totaldata['jumlah'];		
	}

	public static function getOutlookRevenue($year, $outlook, $status="GROUP"){
		$outlook = intval($outlook*1);
		$year = intval($year*1);
	
		$sql =" SELECT SUM( sales_plan_outlook.TotalRevenue ) AS jumlah
		FROM sales_plan_outlook
		LEFT JOIN customer ON customer.id_customer = sales_plan_outlook.id_customer
		WHERE year = '".$year."' AND outlook = '".$outlook."'
		AND customer.GroupCategory =  '".$status."' ";  
		
		$command =Yii::app()->db->createCommand($sql); 
		$totaldata =$command->queryRow(); 
		return $totaldata['jumlah'];
	}

}

?>