<?php
$this->breadcrumbs=array(
	'Data Diri',
);

$this->menu=array(
array('label'=>'Create Data Diri','url'=>array('create')),
array('label'=>'Manage Data Diri','url'=>array('admin')),
);
?>

<h3 class= "header"> Data Diri
<span class="header-line"></span>
</h3>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>