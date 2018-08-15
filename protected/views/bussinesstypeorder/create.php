<?php
$this->breadcrumbs=array(
	'Bussiness Type Orders'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Manage Bussiness Type Order','url'=>array('master/mastype')),
array('label'=>'Create Bussiness Type Order','url'=>array('master/mastypecreate')),

);
?>
<div id="content">
<h2>Create Bussiness Type Order</h2>
<hr>
</div>


<?php echo $this->renderPartial('../BussinessTypeOrder/_form', array('model'=>$model)); ?>