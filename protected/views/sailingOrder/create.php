<?php
$this->breadcrumbs=array(
	'Sailing Orders'=>array('index'),
	'Create',
);
/*
$this->menu=array(
array('label'=>'New Shipping Order','url'=>array('voyageorder/propose')),
array('label'=>'NEW VO','url'=>array('voyageorder/new_vo')),
array('label'=>'Running VO','url'=>array('voyageorder/running_vo')),
array('label'=>'Finished VO','url'=>array('voyageorder/finished_vo')),
);
*/

VoyageOrderDisplayer::displayTabLabelSailingOrder($this,3,"Create New Sailing Order");
?>
<div id="content">
<h2>Create Sailing Order</h2>
<hr>
</div>

<?php echo $this->renderPartial('../sailingOrder/_prasyarat', array('modelvoyage'=>$modelvoyage,)); ?>
<hr>
<?php echo $this->renderPartial('../sailingOrder/_form', array('model'=>$model,'modelvoyage'=>$modelvoyage,)); ?>