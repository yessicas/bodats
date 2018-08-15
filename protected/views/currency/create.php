<?php
$this->breadcrumbs=array(
	'Currencies'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Manage Currency','url'=>array('master/mascurr')),
array('label'=>'Create Currency','url'=>array('master/mascurrcreate')),
);
?>

<div id="content">
<h2>Create Currency</h2>
<hr>
</div>

<?php echo $this->renderPartial('../currency/_form', array('model'=>$model)); ?>
