<?php
$this->breadcrumbs=array(
	'Certificate Levels'=>array('index'),
	$model->id_certificate,
);

$this->menu=array(
//array('label'=>'List CertificateLevel','url'=>array('index')),
array('label'=>'Manage Certificate Level','url'=>array('master/mascer')),
array('label'=>'Create Certificate Level','url'=>array('master/mascercreate')),
array('label'=>'View Certificate Level','url'=>array('master/mascerview','id'=>$model->id_certificate),'active'=>true),
array('label'=>'Update Certificate Level','url'=>array('master/mascerupdate','id'=>$model->id_certificate)),
array('label'=>'Delete Certificate Level','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_certificate),'confirm'=>'Are you sure you want to delete this item?')),

);
?>

<?php
if(Yii::app()->user->hasFlash('success')):?>

<div class = "animated flash">
	<?php
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
<!--- <div id="content"> !---->

<h3>View Certificate Level # <font color="#BD362F"> <?php echo $model->certiface_level; ?> </font></h3>
<hr>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		//'id_certificate',
		'certiface_level',
		'keterangan',
),
)); ?>
