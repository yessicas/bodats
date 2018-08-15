<?php
$this->breadcrumbs=array(
	'Sailing Orders'=>array('index'),
	$model->id_sailing_order=>array('view','id'=>$model->id_sailing_order),
	'Update',
);

	/*
	$this->menu=array(
	array('label'=>'New Shipping Order','url'=>array('voyageorder/propose')),
	array('label'=>'NEW VO','url'=>array('voyageorder/new_vo')),
	array('label'=>'Running VO','url'=>array('voyageorder/running_vo')),
	array('label'=>'Finished VO','url'=>array('voyageorder/finished_vo')),
	);
	*/
	
	VoyageOrderDisplayer::displayTabLabelSailingOrder($this,3,"Update Sailing Order");
	?>
<div id="content">
<h2>Update Sailing Order</h2>
<hr>
</div>

<?php echo $this->renderPartial('../SailingOrder/_form_update',array('model'=>$model,'modelvoyage'=>$modelvoyage,)); ?>