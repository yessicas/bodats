<?php
$this->breadcrumbs=array(
	'Mst Timesheet Summaries'=>array('index'),
	'Manage',
);

$this->menu=array(

array('label'=>'Manage Timesheet Summary','url'=>array('master/times')),
array('label'=>'Create Timesheet Summary','url'=>array('master/timescreate')),

);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('mst-timesheet-summary-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<div id="content">
<h2>Manage Timesheet Summaries</h2>
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
'id'=>'mst-timesheet-summary-grid',
'type' => 'striped bordered condensed',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
 array(
        'header'=>'No',    'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
                ),
		//'id_mst_timesheet_summary',
		'timesheet_summary',
         array(
                'header'=>'Is Active',
                'name'=>'is_active',
               'value'=>'MstTimesheetSummary::model()->statusAktiv($data->is_active)',
            ), 
		//'is_active',
array(
 'class'=>'bootstrap.widgets.TbButtonColumn',
'buttons'=>array(
                'update'=>
                    array(
                        'url'=> 'Yii::app()->createUrl("MstTimesheetSummary/update",array("id"=>$data->id_mst_timesheet_summary))',
                        'options'=>array(
                            'class'=>'various fancybox.ajax',
                            'rel'=>'',
                        ),
                    ),

                     'view'=>
                    array(

                        'url'=> 'Yii::app()->createUrl("MstTimesheetSummary/view",array("id"=>$data->id_mst_timesheet_summary))',
                        'options'=>array(
                            'class'=>'various fancybox.ajax',
                            'rel'=>'',
                        ),
                    ),

                     'delete'=>
                    array(

                        'url'=> 'Yii::app()->createUrl("MstTimesheetSummary/delete",array("id"=>$data->id_mst_timesheet_summary))',
                       
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

