<?php
$this->breadcrumbs=array(
	'Mst Kabupatenkotas',
);

$this->menu=array(
array('label'=>'Create MstKabupatenkota','url'=>array('create')),
array('label'=>'Manage MstKabupatenkota','url'=>array('admin')),
);
?>

<h1>Mst Kabupatenkotas</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
