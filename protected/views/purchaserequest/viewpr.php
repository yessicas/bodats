<?php
$this->breadcrumbs=array(
	'Purchase Requests'=>array('index'),
	$model->id_purchase_request,
);

	//PurchaseDisplayer::displayTabLabelPRApproval($this, 1);
	echo PurchaseDisplayer::displayTabLabelPRApproval($this,  4, "View PR", "purchaserequest/viewpr");
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
<h2>View Purchase Request</h2>
<hr>
</div>

<div class="view">
<?php
	//echo nl2br(PurchaseRequestDB::getDetailPurchaseRequest($model->id_purchase_request));
	echo (PurchaseRequestDB::getDetailPurchaseRequestTableVersion($model->id_purchase_request));
?>
</div>














<?php if(isset($_GET['ma'])){ ?>


<div class="view">

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

<div id='results'></div>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'purchase-request-grid',
'summaryText'=>'',
'emptyText'=>'Approval Not Available',
'dataProvider'=>$modelapprove->search(),
'type' => 'striped bordered condensed',
//'filter'=>$model,
'columns'=>array(
       
        array(  
                'header'=>'Approval Level 1',
				'htmlOptions'=>array('style'=>'text-align:center'),
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
				'htmlOptions'=>array('style'=>'text-align:center'),
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
				'htmlOptions'=>array('style'=>'text-align:center'),
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
		),
		)); ?> 
</div>

<?php } ?>