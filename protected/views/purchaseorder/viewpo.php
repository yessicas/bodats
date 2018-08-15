<?php
$this->breadcrumbs=array(
	'Purchase Orders'=>array('index'),
	$model->id_purchase_order,
);
	PurchaseDisplayer::displayTabLabelPOFromPR($this,3, "View PO","purchaseorder/view/id/".$model->id_purchase_order);

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
<h2>View Purchase Order #<?php echo $model->PONumber; ?></h2>
<hr>
</div>


<?php echo $this->renderPartial('/purchaseorder/_poview', array('model'=>$model)); ?>

<?php /* $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_purchase_order',
		'id_purchase_request',
		'id_vendor',
		'up',
		'PONumber',
		'PODate',
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
		'PONotes',
		'created_user',
		'created_date',
		'ip_user_created',
		'Status',
),
)); 

*/

?>

	
<?php

if ($model->Status_approval==1) { // approved 


$this->widget('bootstrap.widgets.TbButton', array(      

                        'label' =>Yii::t('strings','Print'),
                        'icon'=>'print white',
                        'type' => 'info',// '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                        //'url'=>array('create'), 
                        //'size'=>'small',  
                        'url'=>array('purchaseorder/report','id'=>$model->id_purchase_order),
                        'htmlOptions' => array(
                                               'target'=>'_blank',
                                                ),
                    
                        )); 

echo' ';

$this->widget('bootstrap.widgets.TbButton', array(      

                        'label' =>Yii::t('strings','View'),
                        'icon'=>'eye-open white',
                        'type' => 'warning',// '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                        //'url'=>array('create'), 
                        //'size'=>'small',  
                        'url'=>array('purchaseorder/viewreport','id'=>$model->id_purchase_order),
                        'htmlOptions' => array(
                                               'target'=>'_blank',
                                                ),
                    
                        )); 


echo' ';

$this->widget('bootstrap.widgets.TbButton', array(      

                        'label' =>Yii::t('strings','Print / View without Header'),
                        'icon'=>'print white',
                        'type' => 'inverse',// '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                        //'url'=>array('create'), 
                        //'size'=>'small',  
                        'url'=>array('purchaseorder/report','id'=>$model->id_purchase_order,'mode'=>'noheader'),
                        'htmlOptions' => array(
                                               'target'=>'_blank',
                                                ),
                    
                        )); 

}else{

		echo'<div class="alert in alert-block fade alert-danger">';
		//echo'<a href="#" class="close" data-dismiss="alert">'.'x'.'</a>';
		echo'Purchase Order Cannot be print because not approved yet or Purchase Order has been rejected.';
		echo'</div>';
}


?>


