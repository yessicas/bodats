<?php
$this->breadcrumbs=array(
	'Finding Reports'=>array('index'),
	$model->id_finding_report=>array('view','id'=>$model->id_finding_report),
	'Update',
);

	$this->menu=array(
		
//array('label'=>'Manage Finding Report','url'=>array('repair/finding')),
//array('label'=>'Create Finding Report','url'=>array('create')),
//array('label'=>'View Finding Report', 'url'=>array('findingreport/view', 'id'=>$model->id_finding_report)),
array('label'=>'List of Vessel Finding Report', 'url'=>array('repair/listofvessel','mode'=>'FINDING')),
array('label'=>'Manage Finding Report','url'=>array('repair/finding','id'=>$model->id_vessel)),
array('label'=>'Create Finding Report','url'=>array('findingreport/view','id'=>$model->id_vessel)),
array('label'=>'Update Finding Report','url'=>array('findingreport/update','id'=>$model->id_finding_report),'active'=>true),
//array('label'=>'Delete FindingReport','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_finding_report),'confirm'=>'Are you sure you want to delete this item?')),
);
?>
<div id="content">
	<h2>Update Finding Report # <font color=#BD362F> <?php echo $model->id_finding_report; ?></font></h2>
	<hr>
</div>
<?php echo $this->renderPartial('../FindingReport/_form',array('model'=>$model)); ?>