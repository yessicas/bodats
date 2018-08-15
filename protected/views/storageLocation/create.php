<?php
$this->breadcrumbs=array(
	'Storage Locations'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Create Storage Location', 'url'=>array('entity/entistorcreate')),
 array('label'=>'Manage Storage Location', 'url'=>array('entity/entistorage')),
);
?>
<div id="content">
<h2>Create StorageLocation</h2>
<hr>
</div>
<?php echo $this->renderPartial('../storageLocation/_form', array('model'=>$model)); ?>