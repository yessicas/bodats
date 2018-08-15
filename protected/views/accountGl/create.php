<?php
$this->breadcrumbs=array(
	'Account GLs'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Manage Account GL','url'=>array('admin')),
array('label'=>'Create Account GL','url'=>array('create'),'active'=>true),

);
?>
<div id="content">
<h2>Create Account GL</h2>
<hr>
</div>


<?php echo $this->renderPartial('../AccountGl/_form', array('model'=>$model)); ?>