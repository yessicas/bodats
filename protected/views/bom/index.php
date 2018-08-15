<?php
$this->breadcrumbs=array(
	'Boms',
);

$this->menu=array(
array('label'=>'Create Bom','url'=>array('create')),
array('label'=>'Manage Bom','url'=>array('admin')),
);
?>
<div id="content">
<h2>Boms</h2>
<hr>
</div>


<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
