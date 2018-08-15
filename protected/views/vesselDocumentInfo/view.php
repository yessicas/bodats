<?php
$this->breadcrumbs=array(
	'Vessel Document Infos'=>array('index'),
	$model->id_vessel_document_info,
);

$this->menu=array(
//array('label'=>'List VesselDocumentInfo','url'=>array('index')),
array('label'=>'Create VesselDocumentInfo','url'=>array('create')),
array('label'=>'Update VesselDocumentInfo','url'=>array('update','id'=>$model->id_vessel_document_info)),
array('label'=>'View VesselDocumentInfo','url'=>array('view','id'=>$model->id_vessel_document_info)),
array('label'=>'Delete VesselDocumentInfo','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_vessel_document_info),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage VesselDocumentInfo','url'=>array('admin')),
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

<h3>Document Info <font color=#BD362F> # <?php echo $model->idVesselDocument->VesselDocumentName; ?></font></h3>
<hr>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		//'id_vessel_document_info',
		//'id_vessel',
		'DateCreated',
		'ValidUntil',
		array('label'=>'Document Name',
				  'value'=>$model->idVesselDocument->VesselDocumentName),

		array(

		'label'=>'Permanen',
		//'value'=>$model->Status=='1' ? 'Used' : 'Unused',  
		'value'=>VesselDocumentInfo::model()->statusPermanen($model->IsPermanen),  

		),
		//'id_vessel_document',
		array(
			'label'=>'Attachment',
			'type'=>'raw',
			'value'=>CHtml::image(Yii::app()->baseUrl."/repository/vesseldocument/".$model->Attachment,"",
				array(
				"width"=>60)),
			),
		//'Attachment',
		/*'Check1',
		'Check2',
		'Check3',
		'Check4',
		'Check5',
		'Check6',
		'Status',
		'created_date',
		'created_user',
		'ip_user_updated',
		*/
),
)); ?>
