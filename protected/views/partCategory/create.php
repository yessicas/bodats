<?php
$this->breadcrumbs=array(
	'Part Categories'=>array('index'),
	'Create',
);


$this->menu=array(

array('label'=>'Create Part Category','url'=>array('invent/catpartcreate')),
array('label'=>'Manage Part Category','url'=>array('invent/catpart')),
);
?>
<div id="content">
<h2>Create Part Category</h2>
<hr>
</div>


<?php echo $this->renderPartial('../partcategory/_form', array('model'=>$model)); ?>