<?php
$this->breadcrumbs=array(
	'Finding Report Details'=>array('index'),
	$model->id_finding_report_detail,
);

$this->menu=array(
//array('label'=>'List FindingReportDetail','url'=>array('index')),
array('label'=>'Create FindingReportDetail','url'=>array('create')),
array('label'=>'Update FindingReportDetail','url'=>array('update','id'=>$model->id_finding_report_detail)),
array('label'=>'Delete FindingReportDetail','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_finding_report_detail),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage FindingReportDetail','url'=>array('admin')),
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
<h2>View FindingReportDetail<font color=#BD362F> #<?php echo $model->id_finding_report_detail; ?></font></h2>
<hr>
</div>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		//'id_finding_report_detail',
		//'id_finding_report',
		//'TrInventoryTreeId',
		array('label'=>'Part Name',
				  'value'=>$model->idPart->PartName),
		//'id_part',
		'ProblemIdentification',
		'Location',
		//'ImageLink',
		'PIC',
		'CorrectiveAction',
		 array(
            'name'=>'DueDate',
           'value'=>Yii::app()->dateFormatter->formatDateTime($model->DueDate, "medium",""),
           ),
	//	'DueDate',
		//'Status',
		'PreventiveAction',
		//'created_date',
		//'created_user',
		//'ip_user_updated',
		array(
			'label'=>'Image',
			'type'=>'raw',
			'value'=>CHtml::image(Yii::app()->baseUrl."/repository/imagelink/".$model->ImageLink,"",
				array(
				"width"=>60)),
			),
),
)); ?>
