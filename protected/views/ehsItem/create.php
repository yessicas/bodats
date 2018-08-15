<?php
$this->breadcrumbs=array(
	'EHS Items'=>array('index'),
	'Create',
);

$this->menu=array(	
	array('label'=>'Manage EHS','url'=>array('admin')),
	array('label'=>'Create EHS','url'=>array('create'),'active'=>true),
);
?>



<div id="content">
<h2>Create EHS Item </h2>
<hr>
</div>


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>