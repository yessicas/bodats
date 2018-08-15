<?php
$this->breadcrumbs=array(
	'User Perusahaans'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List UserPerusahaan','url'=>array('index')),
array('label'=>'Manage UserPerusahaan','url'=>array('admin')),
);
?>

<h1>Create UserPerusahaan</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>