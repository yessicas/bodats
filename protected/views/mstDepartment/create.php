<?php
$this->breadcrumbs=array(
	'Mst Departments'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Manage Department','url'=>array('master/masdept')),
array('label'=>'Create Department','url'=>array('master/masdeptcreate')),
);
?>

<div id="content">
<h2>Create Mst Department</h2>
<hr>
</div>
<?php echo $this->renderPartial('../mstDepartment/_form', array('model'=>$model)); ?>