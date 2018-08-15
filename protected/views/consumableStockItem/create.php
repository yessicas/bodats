<?php
$this->breadcrumbs=array(
	'Consumable Stock Items'=>array('index'),
	'Create',
);

$this->menu=array(	
	array('label'=>'Manage CS/Part/Asset','url'=>array('admin')),
	array('label'=>'Create CS/Part/Asset','url'=>array('create'),'active'=>true),
);
?>



<div id="content">
<h2>Create Consumable Stock Item </h2>
<hr>
</div>


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>