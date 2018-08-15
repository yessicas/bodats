<?php
$this->breadcrumbs=array(
	'Vendor Bank Accs',
);

$this->menu=array(
array('label'=>'Create VendorBankAcc','url'=>array('create')),
array('label'=>'Manage VendorBankAcc','url'=>array('admin')),
);
?>
<div id="content">
<h2>Vendor Bank Accs</h2>
<hr>
</div>


<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
