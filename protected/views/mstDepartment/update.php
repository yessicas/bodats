<?php
$this->breadcrumbs=array(
	'Mst Departments'=>array('index'),
	$model->DepartmentId=>array('view','id'=>$model->DepartmentId),
	'Update',
);

	$this->menu=array(
	array('label'=>'Manage  Department','url'=>array('master/masdept')),
	array('label'=>'Create  Department','url'=>array('master/masdeptcreate')),
	array('label'=>'View    Department','url'=>array('view','id'=>$model->DepartmentId)),
	array('label'=>'Update  Department','url'=>array('update','id'=>$model->DepartmentId),'active'=>true),
	array('label'=>'Delete  Department','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->DepartmentId),'confirm'=>'Are you sure you want to delete this item?')),

	);
	?>

<!--- <div id="content"> !---->
	<h3>Update Mst Department # <font color="#BD362F"> <?php echo $model->DepartmentName; ?></font></h3>
	<hr>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>