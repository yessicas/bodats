<?php
$this->breadcrumbs=array(
	'Spals',
);

$this->menu=array(
array('label'=>'Create SPAL','url'=>array('create')),
array('label'=>'Manage SPAL','url'=>array('admin')),
);
?>
<div id="content">
<h2>Spals</h2>
<hr>
</div>


<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
