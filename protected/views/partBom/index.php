<?php
$this->breadcrumbs=array(
	'Part Boms',
);

$this->menu=array(
array('label'=>'Create PartBom','url'=>array('create')),
array('label'=>'Manage PartBom','url'=>array('admin')),
);
?>
<div id="content">
<h2>Part Boms</h2>
<hr>
</div>


<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
