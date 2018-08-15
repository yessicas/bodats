<?php
$this->breadcrumbs=array(
	'Bussiness Type Orders',
);

$this->menu=array(
array('label'=>'Create Bussiness Type Order','url'=>array('create')),
array('label'=>'Manage Bussiness Type Order','url'=>array('admin')),
);
?>
<div id="content">
<h2>Bussiness Type Orders</h2>
<hr>
</div>


<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
