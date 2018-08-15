<?php
$this->breadcrumbs=array(
	'Purchase Requests'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Manage  Purchase Request','url'=>array('purchaserequest/admin')),
array('label'=>'Create Purchase Request','url'=>array('purchaserequest/create')),
);
?>

<div id="content">
<h2>Create Purchase Request</h2>
<hr>
</div>


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>