<?php
$this->breadcrumbs=array(
	'Part Categories'=>array('index'),
	$model->id_part_category=>array('view','id'=>$model->id_part_category),
	'Update',
);

	$this->menu=array(
//array('label'=>'List PartCategory','url'=>array('index')),
array('label'=>'Create Part Category','url'=>array('invent/catpartcreate')),
array('label'=>'Update Part Category','url'=>array('invent/catpartupdate','id'=>$model->id_part_category)),
array('label'=>'View Part Category','url'=>array('invent/catpartview','id'=>$model->id_part_category)),
array('label'=>'Manage Part Category','url'=>array('invent/catpart')),
array('label'=>'Delete Part Category','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_part_category),'confirm'=>'Are you sure you want to delete this item?')),
);
?>
<div id="content">
	<h2>Update PartCategory<font color=#BD362F> <?php echo $model->id_part_category; ?></font></h2>
	<hr>
</div>
<?php echo $this->renderPartial('../partcategory/_form',array('model'=>$model)); ?>