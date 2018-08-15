<?php
$this->breadcrumbs=array(
	'Damage Reports'=>array('index'),
	'Create',
);

$this->menu=array(
//array('label'=>'Manage Damage Report','url'=>array('repair/damage')),
array('label'=>'List of Vessel Damage Report', 'url'=>array('repair/listofvessel','mode'=>'DAMAGE')),
array('label'=>'Create Damage Report','url'=>array('repair/damagecreate','id'=>$_GET['id'])),

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
<h2>Create Damage Report <?php echo $VesselName ?></h2>
<hr>
</div>



<?php echo $this->renderPartial('../DamageReport/_form', array('model'=>$model)); ?>