<?php
$this->breadcrumbs=array(
	'Mst Voyage Documents'=>array('index'),
	$model->IdVoyageDocument=>array('view','id'=>$model->IdVoyageDocument),
	'Update',
);

	$this->menu=array(
	// array('label'=>'List MstVoyageDocument','url'=>array('index')),
	array('label'=>'Manage Voyage Document','url'=>array('master/voydoc')),
	array('label'=>'Create Voyage Document','url'=>array('master/voydoccreate')),
	array('label'=>'View Voyage Document','url'=>array('master/voydocview','id'=>$model->IdVoyageDocument)),
	array('label'=>'Update Voyage Document','url'=>array('master/voydocupdate','id'=>$model->IdVoyageDocument),'active'=>true),

	array('label'=>'Delete Voyage Document','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->IdVoyageDocument),'confirm'=>'Are you sure you want to delete this item?')),

	);
	?>

<div id="content">
	<h2>Update Voyage Document<font color=#BD362F> <?php echo $model->IdVoyageDocument; ?></font></h2>
	<hr>
</div>
<?php echo $this->renderPartial('../MstVoyageDocument/_form',array('model'=>$model)); ?>