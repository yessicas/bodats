<?php
$this->breadcrumbs=array(
	'Currencies'=>array('index'),
	$model->id_currency=>array('view','id'=>$model->id_currency),
	'Update',
);

	$this->menu=array(
	//array('label'=>'List Currency','url'=>array('index')),
	array('label'=>'Manage Currency','url'=>array('master/mascurr')),
	array('label'=>'Create Currency','url'=>array('master/mascurrcreate')),
	array('label'=>'View Currency','url'=>array('master/mascurrview','id'=>$model->id_currency)),
	array('label'=>'Update Currency','url'=>array('update','id'=>$model->id_currency),'active'=>true),
	
	);
	?>

<!--- <div id="content"> !---->

<h3>Update Currency # <font color="#BD362F"> <?php echo $model->currency; ?></font></h3>
<hr>

<?php echo $this->renderPartial('../currency/_form',array('model'=>$model)); ?>