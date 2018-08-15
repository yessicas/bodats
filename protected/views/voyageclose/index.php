<?php
$this->breadcrumbs=array(
	'Voyage Closes',
);

$this->menu=array(
array('label'=>'Create VoyageClose','url'=>array('create')),
array('label'=>'Manage VoyageClose','url'=>array('admin')),
);
?>
<div id="content">
<h2>Voyage Closes</h2>
<hr>
</div>


<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
