<?php
$this->breadcrumbs=array(
	'User Perusahaans',
);

$this->menu=array(
array('label'=>'Create UserPerusahaan','url'=>array('create')),
array('label'=>'Manage UserPerusahaan','url'=>array('admin')),
);
?>

<h1>User Perusahaans</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
