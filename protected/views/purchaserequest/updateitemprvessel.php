<?php
$this->breadcrumbs=array(
	'Purchase Request Details'=>array('index'),
	'Create',
);

$this->menu=array(
//array('label'=>'List PurchaseRequestDetail','url'=>array('index')),
//array('label'=>'Manage PurchaseRequestDetail','url'=>array('admin')),
);
?>

<div id="content">
<h2>Update Detail Item Purchase Request (PR)</h2>
<hr>
</div>

<?php echo $this->renderPartial('_formitemprvessel', array('model'=>$model, 'mode'=>$mode)); ?>