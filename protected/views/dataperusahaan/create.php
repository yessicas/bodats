<?php
$this->breadcrumbs=array(
	'Data Perusahaans'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List DataPerusahaan','url'=>array('index')),
array('label'=>'Manage DataPerusahaan','url'=>array('admin')),
);
?>

<h1>Create DataPerusahaan</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>