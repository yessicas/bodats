<?php
$this->breadcrumbs=array(
	'Vendor Bank Accs'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Manage VendorBankAcc','url'=>array('admin')),
array('label'=>'Create VendorBankAcc','url'=>array('create')),

);
?>
<div id="content">
<h2>Create VendorBankAcc</h2>
<hr>
</div>


<?php echo $this->renderPartial('../VendorBankAcc/_form', array('model'=>$model)); ?>