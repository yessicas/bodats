<?php
$this->breadcrumbs=array(
	'Sos',
);

$this->menu=array(
array('label'=>'Create So','url'=>array('create')),
array('label'=>'Manage So','url'=>array('admin')),
);
?>
<div id="content">
<h2>SOs</h2>
<hr>
</div>


<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
