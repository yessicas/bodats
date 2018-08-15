<?php
$this->breadcrumbs=array(
	'Numbering Fakturs',
);

$this->menu=array(
array('label'=>'Create NumberingFaktur','url'=>array('create')),
array('label'=>'Manage NumberingFaktur','url'=>array('admin')),
);
?>

<h1>Numbering Fakturs</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
