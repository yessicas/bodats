<style>
.labelclass{
color:#cd5934;
}

.labelclass:hover{
text-decoration:underline;
}
</style>

<?php
$this->breadcrumbs=array(
	'Purchase Orders'=>array('index'),
	'Manage',
);

//PurchaseDisplayer::displayTabLabelPOFromPR($this,2);

$this->menu=array(
array('label'=>'Purchase Order Approval','url'=>array('purchaseorder/adminapproval','mode'=>$_GET['mode'])),
array('label'=>'Approved PO','url'=>array('purchaseorder/adminapproved/approved/1','mode'=>$_GET['mode'])),
array('label'=>'Rejected PO','url'=>array('purchaseorder/adminapproved/approved/2','mode'=>$_GET['mode'])),
//array('label'=>'Manage Purchase Order (PO)','url'=>array('purchaseorder/admin')), // ini di hide dulu 
);
?>


<script type="text/javascript">

	function approve(id_purchase_order)
	{
		//alert(id_purchase_order);
		var text = "<?php echo Yii::t('strings','Are you sure approve this PO data?')?>";
		var jawab;

		jawab = confirm(text)
		if(jawab)
		{
		jQuery.ajax({'type':'post','success':allFine,'url':'<?php echo Yii::app()->request->baseUrl; ?>/purchaseorder/approve/id/'+id_purchase_order,'cache':false,'data':jQuery(this).parents("form").serialize()});return false;
		return false;
		}

	}

   function reject(id_purchase_order)
   {
		//alert(id_purchase_order);

		var text = "<?php echo Yii::t('strings','Are you sure reject this PO data?')?>";
		var jawab;

		jawab = confirm(text)
		if(jawab)
		{
			jQuery.ajax({'type':'post','success':allFine,'url':'<?php echo Yii::app()->request->baseUrl; ?>/purchaseorder/reject/id/'+id_purchase_order,'cache':false,'data':jQuery(this).parents("form").serialize()});return false;
			return false;
		}
    
   }
   
   function rollback(id_purchase_order)
   {
		//alert(id_purchase_order);

		var text = "<?php echo Yii::t('strings','Are you sure rollback this PO data?')?>";
		var jawab;

		jawab = confirm(text)
		if(jawab)
		{
			jQuery.ajax({'type':'post','success':allFine,'url':'<?php echo Yii::app()->request->baseUrl; ?>/purchaseorder/rollback/id/'+id_purchase_order,'cache':false,'data':jQuery(this).parents("form").serialize()});return false;
			return false;
		}
    
   }
   
	function allFine(data) {
		$.fn.yiiGridView.update('purchase-order-grid', {
		data: $(this).serialize()
		});

		$("#results").html(data);			
	}
</script>

<div id='results'></div>

<div id="content">
<h2>Manage Purchase Order Approval - <?php echo TextDisplayHelper::displayLabelFromMode($mode); ?></h2>
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


<!--form -->
<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'anggota_pilihan-form',
    'action'=>array('purchaseorder/manyaction'), // ganti dengan del juga bisa
    'enableAjaxValidation'=>false,
)); ?>

<?php echo CHtml::hiddenField('mode',$_GET['mode'],array('class'=>'span4','maxlength'=>32,'readonly'=>'readonly')); ?>
<!--form -->


<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'purchase-order-grid',
'type' => 'striped bordered condensed',
'selectableRows'=>2,
'dataProvider'=>$model->searchbycategory(),
'filter'=>$model,
'columns'=>array(
		array(
			'header'=>'No',    'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
        ),
        array('class'=>'CCheckBoxColumn',    'id'=>'pilihan' ),
		//'id_purchase_order',
		//'id_purchase_request',
		//'id_vendor',
		//'up',
		'PONumber',
		array(
                'name'=>'PODate',
                'value'=>'Yii::app()->dateFormatter->formatDateTime($data->PODate, "medium","")',
                ),
		array(
			'header'=>'Vessel/ Voyage',       
			'name'=>'VesselName_VoyageOrderNumber',
			'value'=>'PurchaseRequestDB::getDedicatedToVesselOrVoyageFromPO($data)',
			'type'=>'raw',
			//'filter'=>false,
			'htmlOptions'=>array('style'=>'width:100px;'),
			//'visible'=>false,
        ),
		//'PODate',
		'Vendor.VendorName',
		'PoCategory.category_name',
		//'PurchaseRequest.dedicated_to',
		/*
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
		*/
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
                'name'=>'Status_approval',
				'value'=>function ($data){
					if ($data->Status_approval==0) {
						return 'CREATED';
					} 	

					if ($data->Status_approval==1) {
						return 'APPROVED';
					} 	

					if ($data->Status_approval==2) {
						return 'REJECTED';
					} 			
				},
				'filter'=>false,
				 ),

		 array(  
                'header'=>'Approval Option',
                'type'=>'raw',
                'value'=>function($data) {
                        return 
                        CHtml::Label("Approve","#",array("class"=>"labelclass", "onClick" => "javascript:approve($data->id_purchase_order)")).
                        CHtml::Label("Reject","#",array("class"=>"labelclass", "onClick" => "javascript:reject($data->id_purchase_order)")).
						CHtml::Label("RollBack","#",array("class"=>"labelclass", "onClick" => "javascript:rollback($data->id_purchase_order)"));
                        },
                ),


		array(
		'class'=>'bootstrap.widgets.TbButtonColumn',
		'template'=>'{view}',
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


<div style="margin:0px; padding-left: 30px; padding-top:0px;">
<img src="repository/icon/arrow_ltr.png"> Select Multiple PO
</div>


<!--form -->

<div class="form-actions" style="margin-top:10px; padding:10px 75px;">
<?php echo CHtml::submitButton('Approve Selected PO',array('id'=>'approvebutton', 'name'=>'approvebutton','class'=>'btn btn-primary')); ?>
<?php echo ' '; ?>
<?php echo CHtml::submitButton('Rejecet Selected PO',array('id'=>'rejectbutton', 'name'=>'rejectbutton','class'=>'btn btn-danger')); ?>
<?php $this->endWidget(); ?>
</div>

<!-- form -->

<script type="text/javascript">
/*<![CDATA[*/
jQuery(function($) {
jQuery('body').on('click','#approvebutton',function(){
	//alert('ok');
		var text = "<?php echo Yii::t('strings','Are you sure approve this PO data?')?>";
		var jawab;

		jawab = confirm(text)
		if(jawab){
			return true;
		}else{
			return false;
		}
	
});


jQuery('body').on('click','#rejectbutton',function(){
	//alert('ok');
		var text = "<?php echo Yii::t('strings','Are you sure reject this PO data?')?>";
		var jawab;

		jawab = confirm(text)
		if(jawab){
			return true;
		}else{
			return false;
		}
	
});

});
/*]]>*/
</script>



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

