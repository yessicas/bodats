<?php
$this->breadcrumbs=array(
	'Finding Reports'=>array('index'),
	$model->id_finding_report,
);

$this->menu=array(
//array('label'=>'List FindingReport','url'=>array('index')),
array('label'=>'Manage Finding Report','url'=>array('repair/finding')),
array('label'=>'Create Finding Report','url'=>array('create')),
array('label'=>'View Finding Report', 'url'=>array('findingreport/view', 'id'=>$model->id_finding_report)),
array('label'=>'Update Finding Report','url'=>array('update','id'=>$model->id_finding_report)),
array('label'=>'Delete Finding Report','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_finding_report),'confirm'=>'Are you sure you want to delete this item?')),

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
<h2>View Finding Report<font color="#BD362F"> #<?php echo $model->id_finding_report; ?></font></h2>
<hr>
</div>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		//'id_finding_report',
    array(
            'name'=>'Date',
           'value'=>Yii::app()->dateFormatter->formatDateTime($model->Date, "medium",""),
           ),
	//	'Date',
		'Vessel.VesselName',
		'Status',
		//'created_date',
		'created_user',
		//'ip_user_updated',
),
)); ?>

<h4 style="color:#BD362F;"> Manage Finding Report Detail</h4>
<hr>
<div class="tambah">
<?php      $this->widget('bootstrap.widgets.TbButton', array(      

                'label' =>Yii::t('strings','Add Finding Report Detail'),
                'icon'=>'plus white',
                'type' => 'danger',// '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                //'url'=>array('create'),   
                'url'=>array('findingreportdetail/create','id'=>$model->id_finding_report),
                'htmlOptions' => array(
                                        'class'=>'various fancybox.ajax',
                                        ),
            
                )); 
?> 
</div>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'finding-report-detail-grid',
'type'=>'bordered',
'dataProvider'=>$modeldetail->searchbyfinding($model->id_finding_report),
'filter'=>$modeldetail,
'columns'=>array(
 array(
        'header'=>'No',    'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
                ),
		//'id_finding_report_detail',
		//'id_finding_report',

 //array(	
         //       'name'=>'id_part',
         //       'value'=>'$data->idPart->PartName',
          //      'filter'=>CHtml::listData(Part::model()->findAll(),'id_part', 'PartName'),
               
         //       ),
 		 
 		'Location',
		'ProblemIdentification',
		
		//'ImageLink',
		
		'PIC',
		//'CorrectiveAction',
        array(
            'name'=>'DueDate',
            'value'=>'Yii::app()->dateFormatter->formatDateTime($data->DueDate, "medium","")',
            'filter'=> CHtml::activeTextField($modeldetail,'DueDate', array('id'=>'DueDateGrid')),
            ),
		
		//'DueDate',
		//'Status',
		//'PreventiveAction',
		/*'created_date',
		'created_user',
		'ip_user_updated',
		*/
array(
 'class'=>'bootstrap.widgets.TbButtonColumn',
'buttons'=>array(
                'update'=>
                    array(
                        'url'=> 'Yii::app()->createUrl("findingreportdetail/update",array("id"=>$data->id_finding_report_detail))',
                        'options'=>array(
                            'class'=>'various fancybox.ajax',
                            'rel'=>'',
                        ),
                    ),

                     'view'=>
                    array(

                        'url'=> 'Yii::app()->createUrl("findingreportdetail/view",array("id"=>$data->id_finding_report_detail))',
                        'options'=>array(
                            'class'=>'various fancybox.ajax',
                            'rel'=>'',
                        ),
                    ),

                     'delete'=>
                    array(

                        'url'=> 'Yii::app()->createUrl("findingreportdetail/delete",array("id"=>$data->id_finding_report_detail))',
                       
                    ),
                    ),
),
),
)); ?> 

<?php 
$this->widget('application.extensions.fancybox.EFancyBox', array(
    'target'=>'.popup_foto',
    'config'=>array(
        'maxWidth'    => 800,
        'maxHeight'   => 600,
        'fitToView'   => false,
        'width'       => 400,
        'height'      => 'auto',
        'autoSize'    => false,
        'closeClick'  => false,
        'closeBtn'    =>true,  
      
       //'title'=>'dfsf',
        
        'helpers'=>array(
            'title'=>array( 'type' => 'inside' ), // inside or outside
            'overlay'=>array( 'closeClick' => false ), 
         
        ),
        'openEffect'  => 'elastic',
        'closeEffect' => 'elastic',
      

    ),
));
?>

<?php

$this->widget('application.extensions.fancybox.EFancyBox', array(
    'target'=>'.various',
    'config'=>array(
        'maxWidth'    => 800,
        'maxHeight'   => 600,
        'fitToView'   => false,
        'width'       => 500,
        'height'      => 'auto',
        'autoSize'    => false,
        'closeClick'  => false,
        'closeBtn'    =>true,  
      
       //'title'=>'dfsf',
        
        'helpers'=>array(
            'title'=>false, // inside or outside
            'overlay'=>array( 'closeClick' => false ), 
         
        ),
        'openEffect'  => 'elastic',
        'closeEffect' => 'elastic',
      

    ),
));
?>



