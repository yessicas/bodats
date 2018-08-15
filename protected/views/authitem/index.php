<?php
$this->breadcrumbs=array(
	'Authitems',
);

$this->menu=array(
array('label'=>'Create Authitem','url'=>array('create')),
array('label'=>'Manage Authitem','url'=>array('admin')),
);
?>

<div id="content">
<h2>Authitem</h2>
<hr>
</div>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'../authitem/_view',
)); ?>
