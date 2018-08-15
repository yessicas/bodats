<?php
$this->breadcrumbs=array(
	'Parts'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Manage Part','url'=>array('admin')),
array('label'=>'Create Part','url'=>array('create'),'active'=>true),

);
?>
<div id="content">
<h2>Create Part</h2>
<hr>
</div>


<?php echo $this->renderPartial('../Part/_form', array('model'=>$model)); ?>