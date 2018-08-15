<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->userid,
);

$this->menu=array(
	array('label'=>'Manage Users','url'=>array('master/masusers')),
	array('label'=>'Create Users','url'=>array('master/masuserscreate')),
	array('label'=>'View Users','url'=>array('master/masusersview','id'=>$model->userid),'active'=>true),
	array('label'=>'Update Users','url'=>array('master/masusersupdate','id'=>$model->userid)),
	array('label'=>'Delete Level Access','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->userid),'confirm'=>'Are you sure you want to delete this item?')),
	);
	?>


<h3> View <?php echo Yii::t('strings','User') ?> <font color="#BD362F"> <?php echo $model->userid; ?></font></h3>
<hr>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
//'type' => 'striped condensed',
'attributes'=>array(
		'userid',
		//'code_id',
		'full_name',
		'email',
		'type',
		
		//'password',
		/*
		'security_code',
		'secret_question',
		'answer_secret_question',
		'status_activated',
		'created_date',
		'ip_addr_created',
		'hit_count',
		'last_login',
		'last_logout',
		*/
),
)); ?>
