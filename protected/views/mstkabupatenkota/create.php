<?php
$this->breadcrumbs=array(
	'Mst Kabupatenkotas'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List MstKabupatenkota','url'=>array('index')),
array('label'=>'Manage MstKabupatenkota','url'=>array('admin')),
);
?>

<h1>Create MstKabupatenkota</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>