<?php
$this->breadcrumbs=array(
	'Data Diri'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Data Diri','url'=>array('index')),
array('label'=>'Manage Data Diri','url'=>array('admin')),
);
?>

<div class="well">
<h4>Tambah data Diri </h4>
<hr>
<p>
	Anda Dapat Menambahkan Data disini 
</p>
</div>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>