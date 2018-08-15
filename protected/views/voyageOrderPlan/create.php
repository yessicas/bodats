<?php
$this->breadcrumbs=array(
	'Voyage Order Plans'=>array('index'),
	'Create',
);
/*
$this->menu=array(
array('label'=>'List VoyageOrderPlan','url'=>array('index')),
array('label'=>'Manage VoyageOrderPlan','url'=>array('admin')),
);
*/
?>

<h3>Add Schedule - <?php echo $status; ?></h3>
<hr>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'id_tug'=>$id_tug,'id_barge'=>$id_barge,'status'=>$status,)); ?>