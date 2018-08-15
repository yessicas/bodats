<?php
$this->breadcrumbs=array(
	'Customer Bank Accs',
);

$this->menu=array(
array('label'=>'Create CustomerBankAcc','url'=>array('create')),
array('label'=>'Manage CustomerBankAcc','url'=>array('admin')),
);
?>
<div id="content">
<h2>Customer Bank Accs</h2>
<hr>
</div>


<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
