<?php
$this->breadcrumbs=array(
	'So Offhired Orders'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'Manage SO','url'=>array('so/admin')),
array('label'=>'Create SO','url'=>array('so/searchquo')),
array('label'=>'Create SO Without Quotation','url'=>array('soquo/quocreate')),
array('label'=>'Manage TC ','url'=>array('sooffhiredorder/admin')),
array('label'=>'Create TC','url'=>array('sooffhiredorder/create')),
array('label'=>'Approved TC ','url'=>array('sooffhiredorder/approved')),
array('label'=>'Rejected TC ','url'=>array('sooffhiredorder/rejected')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('so-offhired-order-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<div id="content">
<h2>Manage TC</h2>
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
'id'=>'so-offhired-order-grid',
'type' => 'striped bordered condensed',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		//'id_so_offhired_order',
         array(
        'header'=>'No',    'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
            ),
         'OffhiredOrderNumber',
          array(
            'name'=>'SODate',
            'value'=>'Yii::app()->dateFormatter->formatDateTime($data->SODate, "medium","")',
            ),
         //'SODate',
		//'id_quotation',
		//'id_customer',
		//'VesselTug',
		//'VesselBarge',
         array(  'header'=>'Tug',
                'name'=>'VesselTug',
                'value'=>'$data->VesselTugs->VesselName',
                'filter'=>CHtml::listData(Vessel::model()->findAll(array(
                       'condition' => 'VesselType = :VesselType',
                       'params' => array(
                           ':VesselType' => "TUG",
                       ),
                   )), 'id_vessel', 'VesselName'),
                           

             ),

         array(  'header'=>'Barge',
                'name'=>'VesselBarge',
                'value'=>'$data->VesselBarges->VesselName',
                'filter'=>CHtml::listData(Vessel::model()->findAll(array(
                       'condition' => 'VesselType = :VesselType',
                       'params' => array(
                           ':VesselType' => "BARGE",
                       ),
                   )), 'id_vessel', 'VesselName'),
                                       

             ),

    

     array(
            'name'=>'TCStartDate',
            'value'=>'Yii::app()->dateFormatter->formatDateTime($data->TCStartDate, "medium","")',
            ),
        //'TCStartDate',
      array(
            'name'=>'TCEndDate',
            'value'=>'Yii::app()->dateFormatter->formatDateTime($data->TCEndDate, "medium","")',
            ),
        //'TCEndDate',
        'TCPrice',
		/*
		'SONo',
		'SOMonth',
		'SOYear',
		'SODate',
		'period_year',
		'period_month',
		'period_quartal',
		'TCStartDate',
		'TCEndDate',
		'TCPrice',
		'SOQuartal',
		'Marks',
		*/
array(
 'class'=>'bootstrap.widgets.TbButtonColumn',
'buttons'=>array(
                'update'=>
                    array(
                        'url'=> 'Yii::app()->createUrl("sooffhiredorder/update",array("id"=>$data->id_so_offhired_order))',
                        'options'=>array(
                            'class'=>'',
                            'rel'=>'',
                        ),
                    ),

                     'view'=>
                    array(

                        'url'=> 'Yii::app()->createUrl("sooffhiredorder/view",array("id"=>$data->id_so_offhired_order))',
                        'options'=>array(
                            'class'=>'',
                            'rel'=>'',
                        ),
                    ),

                     'delete'=>
                    array(

                        'url'=> 'Yii::app()->createUrl("sooffhiredorder/delete",array("id"=>$data->id_so_offhired_order))',
                       
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
        'width'       => 400,
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

