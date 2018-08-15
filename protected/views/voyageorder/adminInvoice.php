<?php
$this->breadcrumbs=array(
	'Quotations'=>array('index'),
	'Manage',
);

$this->menu=array(
  
    array('label'=>'Manage Non Voyage Invoice ', 'url'=>array('voyageorder/invoiceNotVoyage')),  
);


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('quotation-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<div id="content">
<h2>Manage Non Voyage Invoice</h2>
<hr>
<div class="tambah">
<?php     
 /*$this->widget('bootstrap.widgets.TbButton', array(      

                'label' =>Yii::t('strings','Add Quotation'),
                'icon'=>'plus white',
                'type' => 'danger',// '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                //'url'=>array('create'),   
                'url'=>array('quotation/create'),
                'htmlOptions' => array(
                                        //'class'=>''
                                        ),
            
                )); 
*/?> 
</div>
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
'id'=>'quotation-grid',
'type' => 'striped bordered condensed',
'dataProvider'=>$model->searchInvoice(),
'filter'=>$model,
'columns'=>array(
		//'id_quotation',
        array(
        'header'=>'No',    'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
            ),
		'QuotationNumber',
		//'id_customer',
        array(   
                'name'=>'customername',
                'value'=>'$data->Customer->CompanyName',
                ),
         array(
            'name'=>'QuotationDate',
            'value'=>'Yii::app()->dateFormatter->formatDateTime($data->QuotationDate, "medium","")',
            ),
		
        array(  
                'name'=>'id_bussiness_type_order',
                'value'=>'$data->BussinessTypeOrder->bussiness_type_order',
                'filter'=>CHtml::listData(BussinessTypeOrder::model()->findAll(array(
                       'condition' => 'id_bussiness_type_order =:id_bussiness_type_order1 OR id_bussiness_type_order =:id_bussiness_type_order2',
                       'params' => array(
                           ':id_bussiness_type_order1'=>250,
                           ':id_bussiness_type_order2'=>300
                       ),
                   )),'id_bussiness_type_order', 'bussiness_type_order'),
                ),
		//'SignName',
		//'SignPosition',
		//'Status',
		//'Category',
		//'StatusDescription',
		//'attachment',
		//'created_date',
        array(  
                'name'=>'Status',
                'filter'=>TransactionDB::getStatusTransaction(),
                ),
		'created_user',
		//'ip_user_updated',
		
array(
 'class'=>'bootstrap.widgets.TbButtonColumn',
 'htmlOptions'=>array('width'=>'60px'),
 'template'=>'{view}{update}{createInvoice}',
'buttons'=>array(
                'update'=>
                    array(
                        'url'=> 'Yii::app()->createUrl("invoicevoyage/updateInvoicenonVoyage",array("id"=>$data->id_quotation))',
                        //'icon'=>'pencil',
                        'visible'=>'$data->Status=="INVOICE"',
                        'options'=>array(
                            'class'=>'',
                            'rel'=>'',
                            'title'=>'Update Invoice',
                        ),
                    ),

                     'view'=>
                    array(

                        'url'=> 'Yii::app()->createUrl("invoicevoyage/viewNonVoyage",array("id"=>$data->id_quotation))',
                        'visible'=>'$data->Status=="INVOICE"',
                        'options'=>array(
                            'class'=>'',
                            'rel'=>'',
                            'title'=>'View Invoice',
                        ),
                    ),

                    'createInvoice'=>
                    array(

                        'url'=> 'Yii::app()->createUrl("invoicevoyage/createinvoicenonVoyage",array("id"=>$data->id_quotation))',
                        'icon'=>'share',
                        'visible'=>'$data->Status!="INVOICE"',
                        'options'=>array(
                            'class'=>'',
                            'rel'=>'',
                            'title'=>'Create Invoice',
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

   