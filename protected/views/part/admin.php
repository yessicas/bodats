<?php
$this->breadcrumbs=array(
	'Parts'=>array('index'),
	'Manage',
);

$this->menu=array(

array('label'=>'Manage Part','url'=>array('admin'),'active'=>true),
array('label'=>'Create Part','url'=>array('create')),

);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('part-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<div id="content">
<h2>Manage Parts</h2>
<hr>

</div>

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

<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'part-grid',
'type' => 'striped bordered condensed',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
 array(
        'header'=>'No',    'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
                ),
		/*'id_part',
 array(   
                'header'=>'Vessel',
                'name'=>'id_vessel',
                'value'=>'$data->vess->VesselName',
                'filter'=>CHtml::listData(Vessel::model()->findAll(),'id_vessel', 'VesselName'),

               // 'filter'=>array("GROUP"=>"GROUP","NON-GROUP"=>"NON-GROUP"),
                ),
		//'id_vessel',
 array(   
                'header'=>'Part Structure',
                'name'=>'id_part_structure',
                'value'=>'$data->struc->structure_name',
                'filter'=>CHtml::listData(PartStructure::model()->findAll(),'id_part_structure', 'structure_name'),

               // 'filter'=>array("GROUP"=>"GROUP","NON-GROUP"=>"NON-GROUP"),
              ),  */ 
	//	'id_part_structure',
		'PartNumber',
		'PartName',
	/*	'LifeTime',
		'UsageTime',
		'MinStock',
		'Quantity',
        array(   
                'header'=>'Metric',
                'name'=>'metric',
                'value'=>'$data->met->metric_name',
                'filter'=>CHtml::listData(MstMetric::model()->findAll(),'metric', 'metric_name'),

               // 'filter'=>array("GROUP"=>"GROUP","NON-GROUP"=>"NON-GROUP"),
                ),
	//	'metric',
	//	'ReplaceSchedule',
         array(
            'name'=>'LastReplacementDate',
            'value'=>'Yii::app()->dateFormatter->formatDateTime($data->LastReplacementDate, "medium","")',
            'filter'=> CHtml::activeTextField($model, 'LastReplacementDate', array('id'=>'LastReplacementDate_grid')),
            ),
		//'LastReplacementDate',
		'ReplaceLeadtime', */
		array(
            'name'=>'StandardPriceUnit',
             'value'=>'NumberAndCurrency::formatCurrency($data->StandardPriceUnit)',
            ),

        array(   
                'header'=>'Currency',
                'name'=>'id_currency',
                'value'=>'$data->curr->currency',
                'filter'=>CHtml::listData(Currency::model()->findAll(),'id_currency', 'currency'),

               // 'filter'=>array("GROUP"=>"GROUP","NON-GROUP"=>"NON-GROUP"),
                ),

		//'id_currency',
array(
 'class'=>'bootstrap.widgets.TbButtonColumn',
'buttons'=>array(
                'update'=>
                    array(
                        'url'=> 'Yii::app()->createUrl("Part/update",array("id"=>$data->id_part))',
                        'options'=>array(
                            'class'=>'',
                            'rel'=>'',
                        ),
                    ),

                     'view'=>
                    array(

                        'url'=> 'Yii::app()->createUrl("Part/view",array("id"=>$data->id_part))',
                        'options'=>array(
                            'class'=>'various fancybox.ajax',
                            'rel'=>'',
                        ),
                    ),

                     'delete'=>
                    array(

                        'url'=> 'Yii::app()->createUrl("Part/delete",array("id"=>$data->id_part))',
                       
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
        'width'       => 450,
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

