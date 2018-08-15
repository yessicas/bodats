<?php
$this->breadcrumbs=array(
	'Cpanel Leftmenus'=>array('index'),
	$model->id_leftmenu=>array('view','id'=>$model->id_leftmenu),
	'Update',
);

	$this->menu=array(
	// array('label'=>'List CpanelLeftmenu','url'=>array('index')),
	array('label'=>'Manage CpanelLeftmenu','url'=>array('master/masleft')),
array('label'=>'Create CpanelLeftmenu','url'=>array('master/masleftcreate')),
array('label'=>'View CpanelLeftmenu','url'=>array('view','id'=>$model->id_leftmenu)),
array('label'=>'Update CpanelLeftmenu','url'=>array('update','id'=>$model->id_leftmenu),'active'=>true),

array('label'=>'Delete CpanelLeftmenu','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_leftmenu),'confirm'=>'Are you sure you want to delete this item?')),

	
	);
	?>

	<h3>Update CpanelLeftmenu # <font color=#BD362F> <?php echo $model->value_indo; ?></font></h3>
	<hr>

<?php echo $this->renderPartial('../CpanelLeftmenu/_form_update',array('model'=>$model)); ?>