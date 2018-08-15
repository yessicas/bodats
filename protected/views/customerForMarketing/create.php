<?php
$this->breadcrumbs=array(
	'Customers'=>array('index'),
	'Create',
);

$this->menu=array(
	 array('label'=>'Manage Customer', 'url'=>array('custvend/custformarketing')),
    array('label'=>'Create Customer', 'url'=>array('custvend/custcreateformarketing')),
);
?>
<div id="content">
<h2>Create Customer</h2>
<hr>
</div>


<?php echo $this->renderPartial('../customerForMarketing/_form', array('model'=>$model)); ?>