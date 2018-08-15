<?php
$this->breadcrumbs=array(
	'Settype Tugbarges',
);

$this->menu=array(
array('label'=>'Create SettypeTugbarge','url'=>array('create')),
array('label'=>'Manage SettypeTugbarge','url'=>array('admin')),
);
?>
<div id="content">
<h2>Settype Tugbarges</h2>
<hr>
</div>


<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
