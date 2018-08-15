<style>
table tr td.oneday {
    background-color:#E8EC58 !important;
}
table tr td.twothreeday {
    background-color:#EA912C !important;
}

table tr td.morethreeday {
    background-color:#F26F68 !important;
}

</style>

<?php
$this->breadcrumbs=array(
	'Purchase Requests'=>array('index'),
	'Manage',
);

/*
$this->menu=array(
array('label'=>'Manage  Purchase Request','url'=>array('purchaserequest/admin')),
array('label'=>'Purchase Request Appproved','url'=>array('purchaserequest/prapproved')),
array('label'=>'Purchase Request Rejected','url'=>array('purchaserequest/prrejected')),
//array('label'=>'Purchase Order','url'=>array('purchaserequest/po')),
array('label'=>'Create Purchase Request','url'=>array('purchaserequest/create')),
);
*/
PurchaseDisplayer::displayTabLabelPRApproval($this, 1);

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

<style>
.labelclass{
color:#cd5934;
}

.labelclass:hover{
text-decoration:underline;
}
</style>


<script type="text/javascript">

	function approve(id_purchase_request)
	{
		//alert(id_purchase_request);
		var text = "<?php echo Yii::t('strings','Are you sure approve this PR data On Level 1 ?')?>";
		var jawab;

		jawab = confirm(text)
		if(jawab)
		{
		jQuery.ajax({'type':'post','success':allFine,
		'error': function(XMLHttpRequest, textStatus, errorThrown) {
					alert('Approve Level 1 ' + XMLHttpRequest.responseText);
				},
		'url':'<?php echo Yii::app()->request->baseUrl; ?>/purchaserequest/approve/id/'+id_purchase_request,'cache':false,'data':jQuery(this).parents("form").serialize()});return false;
		return false;
		}

	}

   function reject(id_purchase_request)
   {
		//alert(id_purchase_request);

		var text = "<?php echo Yii::t('strings','Are you sure reject this PR data  On Level 1?')?>";
		var jawab;

		jawab = confirm(text)
		if(jawab)
		{
			jQuery.ajax({'type':'post','success':allFine,
			'error': function(XMLHttpRequest, textStatus, errorThrown) {
					alert('Approve Level 1 ' + XMLHttpRequest.responseText);
				},
			'url':'<?php echo Yii::app()->request->baseUrl; ?>/purchaserequest/reject/id/'+id_purchase_request,'cache':false,'data':jQuery(this).parents("form").serialize()});return false;
			return false;
		}
    
   }
   
   function approve2(id_purchase_request)
	{
		//alert(id_purchase_request);
		var text = "<?php echo Yii::t('strings','Are you sure approve this PR data On Level 2 ?')?>";
		var jawab;

		jawab = confirm(text)
		if(jawab)
		{
		jQuery.ajax({'type':'post','success':allFine,
		'error': function(XMLHttpRequest, textStatus, errorThrown) {
					alert('Approve Level 2 ' + XMLHttpRequest.responseText);
				},
		'url':'<?php echo Yii::app()->request->baseUrl; ?>/purchaserequest/approve2/id/'+id_purchase_request,'cache':false,'data':jQuery(this).parents("form").serialize()});return false;
		return false;
		}

	}

   function reject2(id_purchase_request)
   {
		//alert(id_purchase_request);

		var text = "<?php echo Yii::t('strings','Are you sure reject this PR data  On Level 2?')?>";
		var jawab;

		jawab = confirm(text)
		if(jawab)
		{
			jQuery.ajax({'type':'post','success':allFine,
			'error': function(XMLHttpRequest, textStatus, errorThrown) {
					alert('Approve Level 2 ' + XMLHttpRequest.responseText);
				},
			'url':'<?php echo Yii::app()->request->baseUrl; ?>/purchaserequest/reject2/id/'+id_purchase_request,'cache':false,'data':jQuery(this).parents("form").serialize()});return false;
			return false;
		}
    
   }
   
   
   function approve3(id_purchase_request)
	{
		//alert(id_purchase_request);
		var text = "<?php echo Yii::t('strings','Are you sure approve this PR data On Level 3 ?')?>";
		var jawab;

		jawab = confirm(text)
		if(jawab)
		{
		jQuery.ajax({'type':'post','success':allFine,
		'error': function(XMLHttpRequest, textStatus, errorThrown) {
					alert('Approve Level 3 ' + XMLHttpRequest.responseText);
				},
		'url':'<?php echo Yii::app()->request->baseUrl; ?>/purchaserequest/approve3/id/'+id_purchase_request,'cache':false,'data':jQuery(this).parents("form").serialize()});return false;
		return false;
		}

	}

   function reject3(id_purchase_request)
   {
		//alert(id_purchase_request);

		var text = "<?php echo Yii::t('strings','Are you sure reject this PR data  On Level 3?')?>";
		var jawab;

		jawab = confirm(text)
		if(jawab)
		{
			jQuery.ajax({'type':'post','success':allFine,
			'error': function(XMLHttpRequest, textStatus, errorThrown) {
					alert('Approve Level 3 ' + XMLHttpRequest.responseText);
				},
			'url':'<?php echo Yii::app()->request->baseUrl; ?>/purchaserequest/reject3/id/'+id_purchase_request,'cache':false,'data':jQuery(this).parents("form").serialize()});return false;
			return false;
		}
    
   }
   
	function allFine(data) {
		$.fn.yiiGridView.update('purchase-request-grid', {
		data: $(this).serialize()
		});

		$("#results").html(data);			
	}
</script>


<div id="content">
<h2>Manage Purchase Request (PR) Approval - <?php echo TextDisplayHelper::displayLabelFromMode($mode); ?></h2>
<hr>

</div>

<div id='results'></div>

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
    'action'=>array('purchaserequest/manyaction'), // ganti dengan del juga bisa
    'enableAjaxValidation'=>false,
)); ?>

<?php echo CHtml::hiddenField('mode',$_GET['mode'],array('class'=>'span4','maxlength'=>32,'readonly'=>'readonly')); ?>
<!--form -->


<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'purchase-request-grid',
'dataProvider'=>$model->search(),
'enableHistory'=>true,
'type' => 'striped bordered condensed',
'selectableRows'=>2,
'filter'=>$model,
'columns'=>array(
		//'id_purchase_request',
         array(
        'header'=>'No',    'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
            ),
         array('class'=>'CCheckBoxColumn',    'id'=>'pilihan' ),
		    'PRNumber',
        array(
                'name'=>'PRDate',
                'value'=>'Yii::app()->dateFormatter->formatDateTime($data->PRDate, "medium","")',
                ),
		//'PRDate',
		 array(
        'header'=>'Lead Time',    
        		//'value'=>'PurchaseRequestDB::getLeadTime($data->PRDate,date("Y-m-d"))',
        		'value'=>function($data) {
				return (PurchaseRequestDB::getLeadTime($data->PRDate,date("Y-m-d")) > 0) ? PurchaseRequestDB::getLeadTime($data->PRDate,date("Y-m-d"))." day" : "-";
				},
				'cssClassExpression' => 'PurchaseRequestDB::getLeadTimeColor($data->PRDate,date("Y-m-d"))',
        		'htmlOptions'=>array('style'=>'width:50px;text-align:center;'),
            ),
		//'PRNo',
		//'PRMonth',
		//'PRYear',
		
		//'id_po_category',
		/*
        array(  
                'name'=>'id_po_category',
                'value'=>'$data->PoCategory->category_name',
                        'filter'=>CHtml::listData(PoCategory::model()->findAll(
							   //array(
                               //'condition' => 'id_parent = :id_parent',
                               //'params' => array(
                               //    ':id_parent' => "10400",
                               //)),
                           
						   ), 'id_po_category', 'category_name'),
                           

             ),
		*/	 
		array(  
			'name'=>'id_po_category',
			//'value'=>'$data->PoCategory->category_name',
			'value'=>function($data) {
					if(isset($data->PoCategory)){
                        return $data->PoCategory->category_name;
					}else{
						return " -- CATEGORY NOT FOUND -- (".$data->id_po_category.")";
					}
                },
			//'filter'=>PurchaseRequestDB::getPRCategory(),
			'filter'=>false,
		),

		'amount',
		//'metric',
        array(  
			'name'=>'metric',
			//'value'=>'$data->MetricPr->metric_name',
			'value'=>function($data) {
					if(isset($data->MetricPr)){
                        return $data->MetricPr->metric_name;
					}else{
						return " -- METRIC NOT FOUND -- (".$data->metric.")";
					}
                },
			'filter'=>CHtml::listData(MstMetricPr::model()->findAll(), 'metric', 'metric_name'),                                       

             ),
		//'dedicated_to',
		//'id_vessel',
		/*
        array(  
                'name'=>'id_vessel',
                'value'=>'CHtml::encode($data->Vessel->VesselName)',
                        'filter'=>CHtml::listData(Vessel::model()->findAll(array(
                               'condition' => 'VesselType = :VesselType',
                               'params' => array(
                                   ':VesselType' => "TUG",
                               ),
                           )), 'id_vessel', 'VesselName'),
                                               

             ),
			*/
		//'id_voyage_order',
		'notes',
		array(
		 'header'=>'View Detail PR',
		 'class'=>'bootstrap.widgets.TbButtonColumn',
		 'template'=>'{views}',
		 'buttons'=>array(
                    'views'=>
						array(
							//'icon'=>'share',
							'url'=> 'Yii::app()->createUrl("purchaserequest/viewpr",array("id"=>$data->id_purchase_request,"mode"=>$_GET["mode"],"ma"=>"approval"))',
							'label'=>'View PR',
							'options'=>array(
							   // 'class'=>'various fancybox.ajax',
								'class'=>'',
								'rel'=>'',
								'title'=>'View PR',
							),
						),
					/*
					'update'=> array('visible'=>'$data->Status=="PR"'),
					'delete'=>array('visible'=>'$data->Status=="PR"'),
					*/
					),

			),
		//'is_mutliple_item',
		'requested_user',
		//'requested_date',
		//'ip_user_requested',
		//'Status',
        array(  
                'name'=>'Status',
				'value'=>'PurchaseDisplayer::getStatusPurchaseRequest($data->Status)',
				'filter'=>false,
                //'filter'=>array('PR'=>'PR','PR APPROVED'=>'PR APPROVED', 'PR REJECTED'=>'PR REJECTED', 'PO'=>'PO','GOOD RECEIVE','GOOD RECEIVE'),
                ),
        array(  
                'header'=>'Approval Level 1',
                'type'=>'raw',
                'value'=>function($data) {
				
						if($data->approval_level==0){
						
							if ($data->is_approved==0) {
								return 
								CHtml::Label("Approve","#",array("class"=>"labelclass", "onClick" => "javascript:approve($data->id_purchase_request)")).
								CHtml::Label("Reject","#",array("class"=>"labelclass", "onClick" => "javascript:reject($data->id_purchase_request)"));
							}
							if ($data->is_approved==1) {
								return 'has been Approved';
							}
							if ($data->is_approved==-1) {
								return 'has been Rejected';
							}
						}
						
						if($data->approval_level==1){
						
							if ($data->is_approved==0) {
								return 
								CHtml::Label("Approve","#",array("class"=>"labelclass", "onClick" => "javascript:approve($data->id_purchase_request)")).
								CHtml::Label("Reject","#",array("class"=>"labelclass", "onClick" => "javascript:reject($data->id_purchase_request)"));
							}
							if ($data->is_approved==1) {
								return 'has been Approved';
							}
							if ($data->is_approved==-1) {
								return 'has been Rejected';
							}
						}else{
							return 'has been Approved';
						}
						/*
                        return ($data->Status != 'PR') ? "-": 
                        CHtml::Label("Approve","#",array("class"=>"labelclass", "onClick" => "javascript:approve($data->id_purchase_request)")).
                        CHtml::Label("Reject","#",array("class"=>"labelclass", "onClick" => "javascript:reject($data->id_purchase_request)"));
						*/
					}
						
                ),
				
				array(  
                'header'=>'Approval Level 2',
                'type'=>'raw',
                'value'=>function($data) {
						
						if($data->approval_level==0){
						
							if ($data->is_approved2==0) {
								return  'Must Approve Level 1 ';
							}
							if ($data->is_approved2==1) {
								return 'has been Approved';
							}
							if ($data->is_approved2==-1) {
								return 'has been Rejected';
							}
						}
						
						
						if($data->approval_level==1){
						
							if ($data->is_approved2==0) {
								return 
								CHtml::Label("Approve","#",array("class"=>"labelclass", "onClick" => "javascript:approve2($data->id_purchase_request)")).
								CHtml::Label("Reject","#",array("class"=>"labelclass", "onClick" => "javascript:reject2($data->id_purchase_request)"));
							}
							if ($data->is_approved2==1) {
								return 'has been Approved';
							}
							if ($data->is_approved2==-1) {
								return 'has been Rejected';
							}
						}
						
						if($data->approval_level==2){
						
							if ($data->is_approved2==0) {
								return 
								CHtml::Label("Approve","#",array("class"=>"labelclass", "onClick" => "javascript:approve2($data->id_purchase_request)")).
								CHtml::Label("Reject","#",array("class"=>"labelclass", "onClick" => "javascript:reject2($data->id_purchase_request)"));
							}
							if ($data->is_approved2==1) {
								return 'has been Approved';
							}
							if ($data->is_approved2==-1) {
								return 'has been Rejected';
							}
						}else{
							return 'has been Approved';
						}
					}
						
						
                ),
				
				array(  
                'header'=>'Approval Level 3',
                'type'=>'raw',
                'value'=>function($data) {
						
						if($data->approval_level==0){
						
							if ($data->is_approved3==0) {
								return  'Must Approve Level 1 ';
							}
							if ($data->is_approved3==1) {
								return 'has been Approved';
							}
							if ($data->is_approved3==-1) {
								return 'has been Rejected';
							}
						}
						
						if($data->approval_level==1){
						
							if ($data->is_approved3==0) {
								return  'Must Approve Level 2 ';
							}
							if ($data->is_approved3==1) {
								return 'has been Approved';
							}
							if ($data->is_approved3==-1) {
								return 'has been Rejected';
							}
						}
						
						if($data->approval_level==2){
						
							if ($data->is_approved3==0) {
								return 
								CHtml::Label("Approve","#",array("class"=>"labelclass", "onClick" => "javascript:approve3($data->id_purchase_request)")).
								CHtml::Label("Reject","#",array("class"=>"labelclass", "onClick" => "javascript:reject3($data->id_purchase_request)"));
							
							}
							if ($data->is_approved3==1) {
								return 'has been Approved';
							}
							if ($data->is_approved3==-1) {
								return 'has been Rejected';
							}
						}
						
						
						if($data->approval_level==3){
						
							if ($data->is_approved3==0) {
								return 
								CHtml::Label("Approve","#",array("class"=>"labelclass", "onClick" => "javascript:approve3($data->id_purchase_request)")).
								CHtml::Label("Reject","#",array("class"=>"labelclass", "onClick" => "javascript:reject3($data->id_purchase_request)"));
							}
							if ($data->is_approved3==1) {
								return 'has been Approved';
							}
							if ($data->is_approved3==-1) {
								return 'has been Rejected';
							}
						}
						else{
							return 'has been Approved';
						}
					}
						
						
                ),
		//'approved_user',
		//'approval_date',
		//'ip_user_approved',
		

				
		),
		)); ?> 

<div style="margin:0px; padding-left: 30px; padding-top:0px;">
<img src="repository/icon/arrow_ltr.png"> Select Multiple PR
</div>


<!--form -->

<div class="form-actions" style="margin-top:10px; padding:10px 75px;">

<?php if (UsersDB::getRoless(Yii::app()->user->id) == "HOPR"){ ?>
	<?php echo CHtml::submitButton('Approve Selected PR Level 1',array('id'=>'approvebutton', 'name'=>'approvebutton','class'=>'btn btn-primary')); ?>
	<?php echo ' '; ?>
	<?php echo CHtml::submitButton('Rejecet Selected PR Level 1',array('id'=>'rejectbutton', 'name'=>'rejectbutton','class'=>'btn btn-danger')); ?>
<?php } ?>

<?php if (UsersDB::getRoless(Yii::app()->user->id) == "GMO"){ ?>
	<?php echo CHtml::submitButton('Approve Selected PR Level 2',array('id'=>'approvebutton2', 'name'=>'approvebutton2','class'=>'btn btn-primary')); ?>
	<?php echo ' '; ?>
	<?php echo CHtml::submitButton('Rejecet Selected PR Level 2',array('id'=>'rejectbutton2', 'name'=>'rejectbutton2','class'=>'btn btn-danger')); ?>
<?php } ?>

<?php if (UsersDB::getRoless(Yii::app()->user->id) == "DRO"){ ?>
	<?php echo CHtml::submitButton('Approve Selected PR Level 3',array('id'=>'approvebutton3', 'name'=>'approvebutton3','class'=>'btn btn-primary')); ?>
	<?php echo ' '; ?>
	<?php echo CHtml::submitButton('Rejecet Selected PR Level 3',array('id'=>'rejectbutton3', 'name'=>'rejectbutton3','class'=>'btn btn-danger')); ?>
<?php } ?>
<?php $this->endWidget(); ?>
</div>

<!-- form -->

<script type="text/javascript">
/*<![CDATA[*/
jQuery(function($) {
jQuery('body').on('click','#approvebutton',function(){
  //alert('ok');
    var text = "<?php echo Yii::t('strings','Are you sure approve this PR data?')?>";
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
    var text = "<?php echo Yii::t('strings','Are you sure reject this PR data?')?>";
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



<table style="border: 0px solid black;">
 <tr>
  <td width=7% bgcolor="#E8EC58" style="border:0px solid white;"> </td>
  <td style="border: 1px solid white; text-align:left;"> 1 day </td>
</tr>

<tr>
  <td width=7% bgcolor="#EA912C" style="border:0px solid white;"> </td>
  <td style="border: 1px solid white; text-align:left;"> 2 - 3 days</td>
</tr>

<tr>
  <td width=7% bgcolor="#F26F68" style="border:0px solid white;"> </td>
  <td style="border: 1px solid white; text-align:left;"> > 3 days </td>
</tr>


  </table>


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
