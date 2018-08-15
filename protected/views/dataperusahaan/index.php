<?php
$this->breadcrumbs=array(
	'Data Perusahaans',
);

$this->menu=array(
array('label'=>'Create DataPerusahaan','url'=>array('create')),
array('label'=>'Manage DataPerusahaan','url'=>array('admin')),
);
?>

<h1>Data Perusahaans</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
