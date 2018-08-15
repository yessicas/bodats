<?php
$this->breadcrumbs=array(
	'Spals'=>array('index'),
	'Create',
);

$this->menu=array(
//array('label'=>'Manage Spal','url'=>array('admin')),
array('label'=>'Manage Agreement Document SPAL','url'=>array('spal/admin')),
array('label'=>'Create Agreement Document SPAL','url'=>array('spal/create','id'=>$_GET['id'])),
);
?>
<div id="content">
<h2>Create SURAT PERJANJIAN ANGKUTAN LAUT</h2>
<hr>
</div>


<?php echo $this->renderPartial('_form', array('model'=>$model,'modelquo'=>$modelquo)); ?>