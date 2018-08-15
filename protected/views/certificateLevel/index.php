<?php
$this->breadcrumbs=array(
	'Certificate Levels',
);

$this->menu=array(
array('label'=>'Create Certificate Level','url'=>array('create')),
array('label'=>'Manage Certificate Level','url'=>array('admin')),
);
?>
<div id="content">
<h2>Certificate Levels</h2>
<hr>
</div>


<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
