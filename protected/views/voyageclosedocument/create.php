<?php
$this->breadcrumbs=array(
	'Voyage Close Documents'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Close Voyage Order','url'=>array('voyageorder/close_voyage')),
array('label'=>'Closed  Voyage Document','url'=>array('voyageclose/create_voyage_document','id'=>$_GET['id_voyage_order'])),
//array('label'=>'List VoyageCloseDocument','url'=>array('index')),
//array('label'=>'Manage VoyageCloseDocument','url'=>array('admin')),
);
?>
<div id="content">
<h2>Create Voyage Close Document <br> <?php echo $modelVoyageDocument->DocumentName ?> </h2>
<hr>
</div>

<?php if(!$model->isNewRecord){
		echo '<div class="alert alert-block alert-error">File sebelumnya sudah ada, 
			Silahkan lanjut jika anda yakin ingin menggantikan file tersebut!</div>'."\n";
	}
	?>


<?php echo $this->renderPartial('_form', array('model'=>$model,'modelVoyageDocument'=>$modelVoyageDocument,)); ?>