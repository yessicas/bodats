<?php
$this->breadcrumbs=array(
	'Job Categories',
);

$this->menu=array(
array('label'=>'Create JobCategory','url'=>array('create')),
array('label'=>'Manage JobCategory','url'=>array('admin')),
);
?>

<div class="well">
<h4>Job Categories</h4>
<hr>
</div>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
/*
'sortableAttributes'=>array(
		'attribute1',
		'attribute2',
        ),
*/
'itemView'=>'_view',
)); ?>
