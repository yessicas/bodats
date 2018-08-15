<?php
$this->breadcrumbs=array(
	'Currencies'=>array('index'),
	$model->id_currency=>array('view','id'=>$model->id_currency),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Currency','url'=>array('index')),
	array('label'=>'Create Currency','url'=>array('create')),
	array('label'=>'View Currency','url'=>array('view','id'=>$model->id_currency)),
	array('label'=>'Manage Currency','url'=>array('admin')),
	);
	?>

<!--- <div id="content"> !---->

<h3>Update Currency # <font color="#BD362F"> <?php echo $model->currency; ?></font></h3>
<hr>

<?php echo $this->renderPartial('../currency/_form_currency',array('model'=>$model)); ?>