<?php
$this->breadcrumbs=array(
	'Brokerage Items'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Manage Brokerage Item','url'=>array('master/masbrok')),
array('label'=>'Create Brokerage Item','url'=>array('master/masbrokcreate')),
);
?>
<div id="content">
<h2>Create Brokerage Item</h2>
<hr>
</div>


<?php echo $this->renderPartial('../brokerageitem/_form', array('model'=>$model)); ?>