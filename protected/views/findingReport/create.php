<?php
$this->breadcrumbs=array(
	'Finding Reports'=>array('index'),
	'Create',
);

$this->menu=array(

//array('label'=>'Manage Finding Report','url'=>array('repair/finding')),
//array('label'=>'Create Finding Report','url'=>array('findingreport/create')),
array('label'=>'List of Vessel Finding Report', 'url'=>array('repair/listofvessel','mode'=>'FINDING')),
array('label'=>'Create Finding Report','url'=>array('findingreport/create','id'=>$_GET['id'])),
);
?>

<?php 
	
		$Vessel =  Vessel::model()->findByPk( $_GET['id']);
		if($Vessel){
			$VesselName = $Vessel->VesselName;
		}else{
			$VesselName = '';
			throw new CHttpException(404,'The requested page does not exist.');
			
		}
		

?>


<div id="content">
<h2>Create Finding Report <?php echo $VesselName ?></h2>
<hr>
</div>


<?php echo $this->renderPartial('../findingReport/_form', array('model'=>$model)); ?>