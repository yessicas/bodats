<?php
$this->breadcrumbs=array(
	'Mst Job Statuses',
);

$this->menu=array(
array('label'=>'Create MstJobStatus','url'=>array('create')),
array('label'=>'Manage MstJobStatus','url'=>array('admin')),
);
?>

<div class="well">
<h3>Mst Job Status
<?php //echo $model->skill; ?></h3>
<hr>
</div>


<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
