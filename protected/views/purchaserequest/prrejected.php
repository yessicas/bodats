<?php
$this->breadcrumbs=array(
	'Purchase Requests'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'Manage  Purchase Request','url'=>array('purchaserequest/admin')),
array('label'=>'Purchase Request Appproved','url'=>array('purchaserequest/prapproved')),
array('label'=>'Purchase Request Rejected','url'=>array('purchaserequest/prrejected')),
//array('label'=>'Purchase Order','url'=>array('purchaserequest/po')),
array('label'=>'Create Purchase Request','url'=>array('purchaserequest/create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('purchase-request-grid', {
data: $(this).serialize()
});
return false;
});
");
?>



<div id="content">
<h2>Rejected  Purchase Requests</h2>
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
'id'=>'purchase-request-grid',
'dataProvider'=>$model->searchstatusrejected(),
'type' => 'striped bordered condensed',
'filter'=>$model,
'columns'=>array(
		//'id_purchase_request',
         array(
        'header'=>'No',    'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
            ),
		'PRNumber',
        array(
                'name'=>'PRDate',
                'value'=>'Yii::app()->dateFormatter->formatDateTime($data->PRDate, "medium","")',
                ),
		//'PRDate',
		//'PRNo',
		//'PRMonth',
		//'PRYear',
		
		//'id_po_category',

        array(  
                'name'=>'id_po_category',
                'value'=>'$data->PoCategory->category_name',
                        'filter'=>CHtml::listData(PoCategory::model()->findAll(array(
                               'condition' => 'id_parent = :id_parent',
                               'params' => array(
                                   ':id_parent' => "10400",
                               ),
                           )), 'id_po_category', 'category_name'),
                           

             ),

		'amount',
		//'metric',
        array(  
                'name'=>'metric',
                'value'=>'$data->MetricPr->metric_name',
                        'filter'=>CHtml::listData(MstMetricPr::model()->findAll(), 'metric', 'metric_name'),                                       

             ),
		//'dedicated_to',
		//'id_vessel',
        array(  
                'name'=>'id_vessel',
                'value'=>'$data->Vessel->VesselName',
                        'filter'=>CHtml::listData(Vessel::model()->findAll(array(
                               'condition' => 'VesselType = :VesselType',
                               'params' => array(
                                   ':VesselType' => "TUG",
                               ),
                           )), 'id_vessel', 'VesselName'),
                                               

             ),
		//'id_voyage_order',
		'notes',

		//'is_mutliple_item',
		//'requested_user',
		//'requested_date',
		//'ip_user_requested',
		//'Status',
        array(  
                'name'=>'Status',
                'filter'=>false,
                ),
       
		//'approved_user',
		//'approval_date',
		//'ip_user_approved',
	
/*	
    array(
 'class'=>'bootstrap.widgets.TbButtonColumn',
 //'htmlOptions'=>array('width'=>'60px'),
 //'template'=>'{create}{view}{update}',
  'template'=>'{create}{view}{update}',
 'header'=>'PO',
'buttons'=>array(
                'create'=>
                    array(
                        'url'=> 'Yii::app()->createUrl("purchaseorder/create",array("id"=>$data->id_purchase_request))',
                        //'icon'=>'share',
                         'label'=>'Create PO ',
                        'visible'=>'$data->Status=="PR APPROVED"',
                        'options'=>array(
                            'class'=>'',
                            'rel'=>'',
                            'title'=>'Create PO',
                        ),
                    ),

                     'view'=>
                    array(

                        'url'=> 'Yii::app()->createUrl("purchaseorder/view",array("id"=>$data->id_purchase_request))',
                        'visible'=>'$data->Status=="PO"',
                        'options'=>array(
                            'class'=>'',
                            'rel'=>'',
                            'title'=>'View PO',
                        ),
                    ),

                    'update'=>
                    array(

                        'url'=> 'Yii::app()->createUrl("purchaseorder/update",array("id"=>$data->id_purchase_request))',
                        'icon'=>'pencil',
                       'visible'=>'$data->Status=="PO"',
                        'options'=>array(
                            'class'=>'',
                            'rel'=>'',
                             'title'=>'Update PO',
                        ),
                    ),

                    ),
),

*/

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

