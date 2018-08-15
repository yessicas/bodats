<?php
$this->breadcrumbs=array(
	'Survey Items'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Manage Survey Item','url'=>array('admin')),
array('label'=>'Create Survey Item','url'=>array('create'),'active'=>true),

);
?>
<div id="content">
<h2>Create Survey Item</h2>
<hr>
</div>


<?php echo $this->renderPartial('../SurveyItem/_form', array('model'=>$model)); ?>