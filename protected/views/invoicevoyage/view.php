<style>

.grid-view table.items tr#report_content td { height: 200px !important; }

</style>

<?php
$this->breadcrumbs=array(
	'Invoice Voyages'=>array('index'),
	$model->id_invoice_voyage,
);
/*
$this->menu=array(
	array('label'=>'Manage Invoice Voyage ','url'=>array('invoicevoyage/admin')),
	array('label'=>'Update Invoice Voyage','url'=>array('invoicevoyage/update','id'=>$model->id_voyage_order)),
	array('label'=>'View Invoice Voyage','url'=>array('invoicevoyage/view','id'=>$model->id_voyage_order)),
	);
	*/
	
	InvoiceDisplayer::displayTabInvoiceVoyage($this,3,"View Invoice", 'invoicevoyage/view/id/'.$model->id_voyage_order);
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
<h2>View Invoice</h2>
<hr>
</div>

<?php
/*
 $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_invoice_voyage',
		'id_voyage_order',
		'id_customer',
		'InvoiceDate',
		'InvoiceNumber',
		'print_CompanyName',
		'print_ShippingAddress',
		'print_NPWP',
		'print_NoFakturPajak',
		'print_top',
		'sales_code',
		'print_CustomerCode',
		'invoice_description',
		'invoice_marks',
		'invoice_termdelivery',
		'invoice_duedate',
		'VoyageNumber',
		'VoyageOrderNumber',
		'VONo',
		'VOMonth',
		'VOYear',
		'id_quotation',
		'id_so',
		'bussiness_type_order',
		'BargingVesselTug',
		'BargingVesselBarge',
		'BargeSize',
		'Capacity',
		'TugPower',
		'BargingJettyIdStart',
		'BargingJettyIdEnd',
		'StartDate',
		'EndDate',
		'ActualStartDate',
		'ActualEndDate',
		'period_year',
		'period_month',
		'period_quartal',
		'Price',
		'id_currency',
		'change_rate',
		'fuel_price',
		'created_date',
		'created_user',
		'ip_user_updated',
),
)); 

*/
?>

<?php echo $this->renderPartial('_view_invoice_base', array('model'=>$model,'modelvoyage'=>$modelvoyage,)); ?>


<?php

$this->widget('bootstrap.widgets.TbButton', array(      

                        'label' =>Yii::t('strings','Print'),
                        'icon'=>'print white',
                        'type' => 'info',// '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                        //'url'=>array('create'), 
                        //'size'=>'small',  
                        'url'=>array('invoicevoyage/report','id'=>$model->id_voyage_order),
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
                        'url'=>array('invoicevoyage/viewreport','id'=>$model->id_voyage_order),
                        'htmlOptions' => array(
                                               'target'=>'_blank',
                                                ),
                    
                        )); 

echo' ';


$this->widget('bootstrap.widgets.TbButton', array(      

                        'label' =>Yii::t('strings','Print / View Without Header'),
                        'icon'=>'print white',
                        'type' => 'inverse',// '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                        //'url'=>array('create'), 
                        //'size'=>'small',  
                        'url'=>array('invoicevoyage/report','id'=>$model->id_voyage_order,'mode'=>'noheader'),
                        'htmlOptions' => array(
                                               'target'=>'_blank',
                                                ),
                    
                        )); 

echo' ';

$this->widget('bootstrap.widgets.TbButton', array(      

                        'label' =>Yii::t('strings','Print Faktur Pajak'),
                        'icon'=>'print white',
                        'type' => 'info',// '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                        //'url'=>array('create'), 
                        //'size'=>'small',  
                        'url'=>array('invoicevoyage/printfaktur','id'=>$model->id_voyage_order),
                        'htmlOptions' => array(
                                               'target'=>'_blank',
                                                ),
                    
                        )); 


echo' ';

$this->widget('bootstrap.widgets.TbButton', array(      

                        'label' =>Yii::t('strings','View Faktur Pajak'),
                        'icon'=>'eye-open white',
                        'type' => 'warning',// '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                        //'url'=>array('create'), 
                        //'size'=>'small',  
                        'url'=>array('invoicevoyage/viewfaktur','id'=>$model->id_voyage_order),
                        'htmlOptions' => array(
                                               'target'=>'_blank',
                                                ),
                    
                        )); 

?>


