<?php
$this->breadcrumbs=array(
	'Request For Schedules'=>array('index'),
	'Create',
);

$titleMenu=isset($_GET['mode']) ? $_GET['mode'] : 'DOCKING';
$this->menu=array(

array('label'=>'Manage RFS '.$titleMenu,'url'=>array('requestForSchedule/admin','mode'=>isset($_GET['mode']) ? $_GET['mode'] : 'DOCKING' )),
array('label'=>'Create RFS '.$titleMenu,'url'=>array('requestForSchedule/create','mode'=>isset($_GET['mode']) ? $_GET['mode'] : 'DOCKING')),
array('label'=>'Approved RFS '.$titleMenu,'url'=>array('requestForSchedule/approved','mode'=>isset($_GET['mode']) ? $_GET['mode'] : 'DOCKING')),
array('label'=>'Rejected RFS '.$titleMenu,'url'=>array('requestForSchedule/rejected','mode'=>isset($_GET['mode']) ? $_GET['mode'] : 'DOCKING')),


);
?>

<?php 
	if(isset($_GET['idv'])) {
		$Vessel =  Vessel::model()->findByPk( $_GET['idv']);
		if($Vessel){
			$VesselName = $Vessel->VesselName;
		}else{
			$VesselName = '';
			throw new CHttpException(404,'The requested page does not exist.');
			
		}
		
	}else{
		$VesselName = '';
	}
?>


<div id="content">
<h2>Create Request For Schedule <?php echo isset($_GET['mode']) ? $_GET['mode'] : 'DOCKING' ?> <?php echo $VesselName ?> </h2>
<hr>
</div>

<?php
if(Yii::app()->user->hasFlash('success')):?>

<div class = "animated flash">
	<?php
    $this->widget('bootstrap.widgets.TbAlert', array(
    'block' => true,
    'fade' => true,
    'closeText' => '&times;', // false equals no close link
    'alerts' => array( // configurations per alert type
        // success, info, warning, error or danger
        'success' => array('closeText' => '&times;'), 

    ),
	));
	?>
</div>

<?php endif; ?>

<?php echo $this->renderPartial('../RequestForSchedule/_form', array('model'=>$model)); ?>