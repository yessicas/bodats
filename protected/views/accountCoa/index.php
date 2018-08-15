<?php
$this->breadcrumbs=array(
	'Account COAs',
);

$this->menu=array(
array('label'=>'Create Account COA','url'=>array('create')),
array('label'=>'Manage Account COA','url'=>array('admin')),
);
?>
<div id="content">
<h2>Account COA</h2>
<hr>
</div>


<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
