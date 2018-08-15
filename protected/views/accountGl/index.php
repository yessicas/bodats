<?php
$this->breadcrumbs=array(
	'Account GLs',
);

$this->menu=array(
array('label'=>'Create Account GL','url'=>array('create')),
array('label'=>'Manage Account GL','url'=>array('admin')),
);
?>
<div id="content">
<h2>Account GLs</h2>
<hr>
</div>


<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
