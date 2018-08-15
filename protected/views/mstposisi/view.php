<?php
$this->breadcrumbs=array(
	'Mst Posisis'=>array('index'),
	$model->id_posisi,
);

$this->menu=array(
array('label'=>'List MstPosisi','url'=>array('index')),
array('label'=>'Create MstPosisi','url'=>array('create')),
array('label'=>'Update MstPosisi','url'=>array('update','id'=>$model->id_posisi)),
array('label'=>'Delete MstPosisi','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_posisi),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage MstPosisi','url'=>array('admin')),
);
?>

<?php if(Yii::app()->user->hasFlash('success')):?>
<div class = "animated flash">
	<?
    $this->widget('bootstrap.widgets.TbAlert', array(
    'block' => true,
    'fade' => true,
    'closeText' => '&times;', // false equals no close link
    'alerts' => array( // configurations per alert type
        // success, info, warning, error or danger
        'success' => array('closeText' => '&times;'), 

    ),
));
    ?>
</div>
<?php endif; ?>

<div class="well">
<h3>Data Posisi
<?php echo $model->nama_posisi; ?></h3>
<hr>
</div>


<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'type' => 'striped bordered condensed',
'attributes'=>array(
		'id_posisi',
		'nama_posisi',
		'userid',
		'time_update',
),
)); ?>
