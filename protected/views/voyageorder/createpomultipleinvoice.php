<?php
$this->breadcrumbs=array(
	'Voyage Orders'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List VoyageOrder','url'=>array('index')),
array('label'=>'Manage VoyageOrder','url'=>array('admin')),
);
?>
<div id="content">
<h2>Create VoyageOrder</h2>
<hr>
</div>


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>