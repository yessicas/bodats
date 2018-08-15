<?php
$this->breadcrumbs=array(
	'Voyage Orders'=>array('index'),
	$model->id_voyage_order=>array('view','id'=>$model->id_voyage_order),
	'Update',
);

	$this->menu=array(
array('label'=>'Create Voyage Order','url'=>array('voyageorder/create_vo','id'=>$model->id_voyage_order),'active'=>true),
array('label'=>'New Shipping Order','url'=>array('voyageorder/propose')),
array('label'=>'NEW VO','url'=>array('voyageorder/new_vo')),
array('label'=>'Running VO','url'=>array('voyageorder/running_vo')),
array('label'=>'Finished VO','url'=>array('voyageorder/finished_vo')),
	);
	?>

<div id="content">
<h2>Create  Voyage Order #<?php echo $model->id_voyage_order; ?></h2>
<hr>
</div>


<?php echo $this->renderPartial('_form_create_vo',array('model'=>$model)); ?>