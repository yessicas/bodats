<?php
$this->breadcrumbs=array(
	'Settype Tugbarges'=>array('index'),
	$model->id_settype_tugbarge=>array('view','id'=>$model->id_settype_tugbarge),
	'Update',
);

	$this->menu=array(
	//array('label'=>'List SettypeTugbarge','url'=>array('index')),
	array('label'=>'Manage Set type Tug barge','url'=>array('settypetugbarge/admin')),
	array('label'=>'Create Set type Tug barge','url'=>array('settypetugbarge/create'),'linkOptions'=>array('class'=>'various fancybox.ajax',)),
	array('label'=>'Update Set type Tug barge','url'=>array('settypetugbarge/update','id'=>$model->id_settype_tugbarge)),
	);
	?>

<?php 
$formatdate = new DateTime($model->first_date);
$formatmonth = $formatdate->format('F');
?>

<div id="content">
<h2>Update  Set type Tug barge <?php echo $model->settype_name ?> </h2>
<hr>
</div>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>