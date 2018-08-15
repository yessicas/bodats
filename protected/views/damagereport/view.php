<?php
$this->breadcrumbs=array(
	'Damage Reports'=>array('index'),
	$model->id_damage_report,
);

$this->menu=array(
//array('label'=>'List DamageReport','url'=>array('index')),
	array('label'=>'Manage Damage Report','url'=>array('repair/damage')),
	array('label'=>'Create Damage Report','url'=>array('repair/damagecreate')),
	array('label'=>'View Damage Report','url'=>array('repair/damageview','id'=>$model->id_damage_report)),
	array('label'=>'Update Damage Report','url'=>array('repair/damageupdate','id'=>$model->id_damage_report)),
	array('label'=>'Delete Damage Report','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_damage_report),'confirm'=>'Are you sure you want to delete this item?')),
	
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


<?php
$repo = "repository/crew/";
?>

<div id="content">
<h2>View Damage Report # <font color="#BD362F"> <?php echo $model->idVessel->VesselName; ?></font></h2>
<hr>
</div>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		//'id_damage_report',
		//'id_vessel'
		 array(   
                'name'=>'id_vessel',
                'value'=>$model->idVessel->VesselName,
                ),
		 array(
            'name'=>'Date',
           'value'=>Yii::app()->dateFormatter->formatDateTime($model->Date, "medium",""),
           ),
		//'Date',
		'Description',
		'PIC',
		'Status',
		array(
            'name'=>'DamageTime',
           'value'=>Yii::app()->dateFormatter->formatDateTime($model->DamageTime, "medium",""),
           ),
	//	'DamageTime',
		'CausedDamage',
		array(
			'label'=>'Damage Photo',
			'type'=>'raw',
			'value'=>CHtml::image(Yii::app()->baseUrl."/repository/damagephoto/".$model->DamagePhoto,"",
				array(
				"width"=>50)),
			),
		//'DamagePhoto',
		'Suggestion',
		'Master',
		'ChiefEngineer',
),
)); ?>
