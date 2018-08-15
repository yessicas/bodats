<?php
$this->breadcrumbs=array(
	'Purchase Orders'=>array('index'),
	'Manage',
);

	$this->menu=array(
	array('label'=>'Consumable Stock GR/GI','url'=>array('goodReceive/admingrcs'), 'active'=>true),
	//array('label'=>'Create GoodReceive','url'=>array('create')),
	);
?>

<div id="content">
<h2>Consumable Stock Good Receive & Good Issue</h2>
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
//'filter'=>$model,
'columns'=>array(
		array(
			'header'=>'No',    'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
        ),
		//'id_purchase_order',
		//'id_purchase_request',
		//'id_vendor',
		//'up',
		'PO.PONumber',
		array(   
                'header'=>'PO DATE',
                'name'=>'PODate',
                'value'=>'Yii::app()->dateFormatter->formatDateTime($data->PO->PODate, "medium","")',
                //'filter'=>CHtml::listData(Owner::model()->findAll(),'id_owner', 'owner_name'),
               // 'filter'=>array("GROUP"=>"GROUP","NON-GROUP"=>"NON-GROUP"),
                ),
		//'PO.PODate',
		'PO.Vendor.VendorName',
		array(  
                'name'=>'PRNumber',
                'header'=>'PR Number',
                'type'=>'raw',
                'value'=>function($data){
					return ReportPO::getPRNumber($data);
				},
        ),
		'PoCategory.category_name',
		'CS.consumable_stock_item',
		 array(
            'name'=>'quantity',
             'value'=>'NumberAndCurrency::formatNumber($data->quantity)',
            ),
		//'quantity',
		'metric',
		//'PurchaseRequest.dedicated_to',
		/*
		array('header'=>'Dedicated To',
		   'type'=>'raw',
		   'htmlOptions'=>array('width'=>'240px'),
			'value'=>
			function($data)  {
				if($data->PO->PurchaseRequest->dedicated_to == "VESSEL"){
					return "VESSEL: ".$data->PO->PurchaseRequest->Vessel->VesselName;
				}
				
				if($data->PO->PurchaseRequest->dedicated_to == "VOYAGE"){
					return "VOYAGE: ".VoyageOrderDB::getShortVoyageInfo($data->PO->PurchaseRequest->id_voyage_order);
				}
				
				return "-";
			}
			,
		),
		*/
		array('header'=>'Cons.Stock Receive (GR) Detail Info',
		   'type'=>'raw',
		   'htmlOptions'=>array('width'=>'240px'),
			'value'=>
			function($data)  {
				return getDetailReceive($data);
			}
			,
		),
		
		array('header'=>'Cons.Stock Issue (GI) Detail Info',
		   'type'=>'raw',
		   'htmlOptions'=>array('width'=>'240px'),
			'value'=>
			function($data)  {
				return getDetailIssued($data);
			}
			,
		),
		
		/*
		array(
			'name'=>'RevisionNumber',
			'filter'=>false,
		),
		
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
		
		/*
		array(
		'header'=>'Fuel Receive',
		'class'=>'bootstrap.widgets.TbButtonColumn',
		'template'=>'{updates}',
		'htmlOptions'=>array('width'=>'100px'),
		'buttons'=>array(
                    'updates'=>
						array(
						'label'=>'Update Fuel Receive',
                        'url'=> 'Yii::app()->createUrl("goodReceive/grfuel/",array("id"=>$data->id_purchase_order_detail))',
                        'options'=>array(
                            'class'=>'',
                            'rel'=>'',
							),
						),
                ),
		),
		*/
),
)); ?> 

<?php

	function getDetailReceive($model){
		$datas = GoodReceive::model()->findAllByAttributes(array('id_purchase_order_detail'=>$model->id_purchase_order_detail));
		$RES = '<table class="items table table-striped table-bordered table-condensed">';
		$TOTAL = 0;
		$METRIC = "";
		foreach($datas as $data){
			$RES .= '<tr>';
			$RES .= '<td>'.Timeanddate::getDisplayStandardDate($data->received_date).'</td>';
			$RES .= '<td>'.$data->quantity.'</td>';
			$TOTAL = $TOTAL + $data->quantity;
			$RES .= '<td>'.$data->metric.'</td>';
			$RES .= '<td>No.'.$data->receive_number.' ('.$data->status_receive.')</td>';
			$RES .= '</tr>';
			
			$METRIC = $data->metric;
		}
		
		$RES .= '</table>';
		if($TOTAL > 0){
			$RES .= "TOTAL RECEIVE : ".$TOTAL." ".$METRIC.'<br>';
		}
		$url = Yii::app()->createUrl("goodReceive/grcs/",array("id"=>$model->id_purchase_order_detail));
		$RES .= '<a href="'.$url.'">Update Cons.Stock Receive</a>';
		
		return $RES;
	}
	
	function getDetailIssued($model){
		$datas = GoodIssue::model()->findAllByAttributes(array('id_purchase_order_detail'=>$model->id_purchase_order_detail));
		$RES = '<table class="items table table-striped table-bordered table-condensed">';
		$TOTAL = 0;
		$METRIC = "";
		foreach($datas as $data){
			$RES .= '<tr>';
			$RES .= '<td>'.Timeanddate::getDisplayStandardDate($data->received_date).'</td>';
			$RES .= '<td>'.$data->Vessel->VesselName.'</td>';
			$RES .= '<td>'.$data->quantity.'</td>';
			$TOTAL = $TOTAL + $data->quantity;
			$RES .= '<td>'.$data->metric.'</td>';
			
			$RES .= '</tr>';
			
			$METRIC = $data->metric;
		}
		
		$RES .= '</table>';
		if($TOTAL > 0){
			$RES .= "TOTAL ISSUED : ".$TOTAL." ".$METRIC.'<br>';
		}
		$url = Yii::app()->createUrl("goodIssue/gics/",array("id"=>$model->id_purchase_order_detail));
		$RES .= '<a href="'.$url.'">Update Cons.Stock Issue</a>';
		
		return $RES;
	}
?>

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

