<?php
$this->breadcrumbs=array(
	'Schedules'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Manage Schedule','url'=>array('admin')),
array('label'=>'Create Schedule','url'=>array('create'),'active'=>true),

);
?>
<div id="content">
<h2>Create Schedule</h2>
<hr>
</div>


<?php echo $this->renderPartial('../Schedule/_form', array('model'=>$model)); ?>