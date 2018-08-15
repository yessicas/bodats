<?php
$this->breadcrumbs=array(
	'Agency Items'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Manage Agency Item','url'=>array('master/agen')),
array('label'=>'Create Agency Item','url'=>array('master/agencreate')),
);
?>
<div id="content">
<h2>Create AgencyItem</h2>
<hr>
</div>


<?php echo $this->renderPartial('../agencyitem/_form', array('model'=>$model)); ?>