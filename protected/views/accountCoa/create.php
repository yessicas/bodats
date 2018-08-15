<?php
$this->breadcrumbs=array(
	'Account COAs'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Manage Account COA','url'=>array('accountcoa/admin')),
array('label'=>'Create Account COA','url'=>array('accountcoa/create')),

);
?>
<div id="content">
<h2>Create Account COAs</h2>
<hr>
</div>


<?php echo $this->renderPartial('../AccountCoa/_form', array('model'=>$model)); ?>