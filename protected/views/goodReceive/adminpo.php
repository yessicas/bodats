<?php
$this->breadcrumbs=array(
	'Purchase Orders'=>array('index'),
	'Manage',
);

	$this->menu=array(
	array('label'=>'GR of PR','url'=>array('goodReceive/adminpo')),
	//array('label'=>'Create GoodReceive','url'=>array('create')),
	);
?>

<div id="content">
<h2>Good Receive of Purchase Order</h2>
<hr>
	<?php
	/*
	<div class="tambah">
	<?php      $this->widget('bootstrap.widgets.TbButton', array(      

                'label' =>Yii::t('strings','Add controllerClass'),
                'icon'=>'plus white',
                'type' => 'danger',// '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                //'url'=>array('create'),   
                'url'=>array('controllerClass/create'),
                'htmlOptions' => array(
                                        'class'=>''
                                        ),
            
                )); 
				?> 
	</div>
	*/
	?>
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
'id'=>'purchase-order-grid',
'type' => 'striped bordered condensed',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		array(
			'header'=>'No',    'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
        ),
		//'id_purchase_order',
		//'id_purchase_request',
		//'id_vendor',
		//'up',
		'PONumber',
		array(
                'name'=>'PODate',
                'value'=>'Yii::app()->dateFormatter->formatDateTime($data->PODate, "medium","")',
                
                ),
		//'PODate',
		'Vendor.VendorName',
		//'PoCategory.category_name',
		//'PurchaseRequest.dedicated_to',
		array('header'=>'Dedicated To',
		   'type'=>'raw',
		   'htmlOptions'=>array('width'=>'240px'),
			'value'=>
			function($data)  {
				if($data->PurchaseRequest->dedicated_to == "VESSEL"){
					return "VESSEL: ".$data->PurchaseRequest->Vessel->VesselName;
				}
				
				if($data->PurchaseRequest->dedicated_to == "VOYAGE"){
					return "VOYAGE: ".VoyageOrderDB::getShortVoyageInfo($data->PurchaseRequest->id_voyage_order);
				}
				
				return "-";
			}
			,
		),
		array(
			'name'=>'RevisionNumber',
			'filter'=>false,
		),
		/*
		'PONo',
		'POMonth',
		'POYear',
		'RevisionNumber',
		'TermOfPayment',
		'id_po_category',
		'amount',
		'id_metric_pr',
		'PriceUnit',
		'id_currency',
		'ppn',
		'pph15',
		'pph23',
		'others',
		'dedicated_to',
		'id_vessel',
		'id_voyage_order',
		'notes',
		'DeliveryDateRangeStart',
		'DeliveryDateRangeEnd',
		'is_mutliple_item',
		'SignName',
		'created_user',
		'created_date',
		'ip_user_created',
		'Status',
		*/
		array(
		'class'=>'bootstrap.widgets.TbButtonColumn',
		'template'=>'{update}{view}',
		'buttons'=>array(
					'update'=>
						array(
							'url'=> 'Yii::app()->createUrl("purchaseorder/view/",array("id"=>$data->id_purchase_order))',
							'options'=>array(
								'class'=>'',
								'rel'=>'',
							),
						),

                    'view'=>
						array(
                        'url'=> 'Yii::app()->createUrl("purchaseorder/view/",array("id"=>$data->id_purchase_order))',
                        'options'=>array(
                            'class'=>'',
                            'rel'=>'',
							),
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

