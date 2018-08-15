<?php
$this->breadcrumbs=array(
	'Survey Items',
);

$this->menu=array(
array('label'=>'Create SurveyItem','url'=>array('create')),
array('label'=>'Manage SurveyItem','url'=>array('admin')),
);
?>
<div id="content">
<h2>Survey Items</h2>
<hr>
</div>


<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
