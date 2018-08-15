<?php
$this->breadcrumbs=array(
	'Currencies',
);

$this->menu=array(
array('label'=>'Create Currency','url'=>array('create')),
array('label'=>'Manage Currency','url'=>array('admin')),
);
?>


<h2>Currencies</h2>
<hr>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
/*
'sortableAttributes'=>array(
		'attribute1',
		'attribute2',
        ),
*/
'itemView'=>'../currency/_view',
)); ?>
