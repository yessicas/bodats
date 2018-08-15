<?php
$this->breadcrumbs=array(
	'Standard Agencies'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Manage Standard Agency','url'=>array('standardagency/admin')),
array('label'=>'Create Standard Agency','url'=>array('standardagency/create')),
);
?>
<div id="content">
<h2>Create StandardAgency</h2>
<hr>
</div>


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>