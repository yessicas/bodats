<?php
$this->breadcrumbs=array(
	'Authitems'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Manage Level Access','url'=>array('master/maslev')),
array('label'=>'Create Level Access','url'=>array('master/maslevcreate')),
);
?>

<div id="content">
<h2>Create Level Access</h2>
<hr>
</div>
<?php echo $this->renderPartial('../authitem/_form', array('model'=>$model)); ?>
