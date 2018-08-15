<?php
$this->breadcrumbs=array(
	'Damage Reports',
);

$this->menu=array(
array('label'=>'Create Damage Report','url'=>array('create')),
array('label'=>'Manage Damage Report','url'=>array('admin')),
);
?>
<div id="content">
<h2>Damage Reports</h2>
<hr>
</div>


<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
