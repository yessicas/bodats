<?php
$this->breadcrumbs=array(
	'Customer Voices'=>array('index'),
	$model->id_customor_voice,
);

$this->menu=array(
//array('label'=>'List CustomerVoice','url'=>array('index')),
array('label'=>'Manage Customer Voice','url'=>array('zone/voice')),
//array('label'=>'Create CustomerVoice','url'=>array('create')),
//array('label'=>'Update CustomerVoice','url'=>array('update','id'=>$model->id_customor_voice)),
array('label'=>'View Customer Voice','url'=>array('zone/voiceview','id'=>$model->id_customor_voice)),
//array('label'=>'Delete CustomerVoice','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_customor_voice),'confirm'=>'Are you sure you want to delete this item?')),

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
<div id="content">
<h2>View Customer Voice<font color=#BD362F> #<?php echo $model->id_customor_voice; ?></font></h2>
<hr>
</div>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		//'id_customor_voice',
		array('label'=>'Customer Company',
				  'value'=>$model->idCustomer->CompanyName),
		//'id_customer',
		'userid',
		'voyage_number',
		'voice',
		//'is_view',
		//'created_date',
		'created_user',
		'ip_user_updated',
),
)); ?>
