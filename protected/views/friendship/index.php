<?php
$this->breadcrumbs=array(
	'Friendships',
);

$this->menu=array(
array('label'=>'Create Friendship','url'=>array('create')),
array('label'=>'Manage Friendship','url'=>array('admin')),
);
?>

<div class="well">
<h4>Friendships</h4>
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
