<style>
.typeahead_wrapper { display: block; height: 30px; }
.typeahead_photo { float: left; max-width: 230px; max-height: 30px; margin-right: 5px; border-radius: 6px;}
.typeahead_labels { float: left; height: 30px;}
.typeahead_primary { font-weight: bold; }
.typeahead_secondary { font-size: .8em; margin-top: -5px; }
.ui-autocomplete.ui-front.ui-menu.ui-widget.ui-widget-content.ui-corner-all {
         z-index: 10000 !important;
     }

</style>




<?php
$this->breadcrumbs=array(
	'Rfq Vendors'=>array('index'),
	$model->id_rfq_vendor,
);

$this->menu=array(
//array('label'=>'List RfqVendor','url'=>array('index')),
array('label'=>'Create RfqVendor','url'=>array('proc/vendcreate')),
array('label'=>'Update RfqVendor','url'=>array('rfqvendor/update','id'=>$model->id_rfq_vendor)),
array('label'=>'View RfqVendor','url'=>array('rfqvendor/view','id'=>$model->id_rfq_vendor)),
array('label'=>'Delete RfqVendor','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_rfq_vendor),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage RfqVendor','url'=>array('proc/vend')),
);
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
<h2>View RfqVendor<font color=#BD362F> #<?php echo $model->RFQNumber; ?></font></h2>
<hr>
</div>
<br>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		//'id_rfq_vendor',
		'RFQNumber',
		//'NoOrder',
		//'NoMonth',
		//'NoYear',
		//'id_vendor',
		array('label'=>'To',
				  'value'=>$model->Vendor->VendorName),
		'From',
		'QuotationDate',
		//'created_date',
		//'created_user',
		//'ip_user_updated',
),
)); ?>
<br>

<h4 style="color:#BD362F;"> Manage RFQ Vendor Detail</h4>
<hr>
<br>
<div class="tambah">
<?php      $this->widget('bootstrap.widgets.TbButton', array(      

                'label' =>Yii::t('strings','Add RFQ Detail'),
                'icon'=>'plus white',
                'type' => 'danger',// '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                //'url'=>array('create'),   
                'url'=>array('rfqvendordetail/create','id'=>$model->id_rfq_vendor),
                'htmlOptions' => array(
                                        'class'=>'',
                                        ),
            
                )); 
?> 
</div>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'rfq-vendor-detail-grid',
'type'=>'bordered',
'dataProvider'=>$modeldetail->searchbyrfq($model->id_rfq_vendor),
'filter'=>$modeldetail,
'columns'=>array(
 array(
        'header'=>'No',    'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
                ),
		//'id_rfq_vendor_detail',
		//'id_rfq_vendor',
          array(   
                'header'=>'Inventory Name',
                'name'=>'id_part',
                'value'=>'$data->idPart->PartName',
                ),
		//'id_part',
		'quantity',
		//'created_date',
		//'created_user',
		/*
		'ip_user_updated',
		*/
array(
 'class'=>'bootstrap.widgets.TbButtonColumn',
'buttons'=>array(
                'update'=>
                    array(
                        'url'=> 'Yii::app()->createUrl("RfqVendorDetail/update",array("id"=>$data->id_rfq_vendor_detail))',
                        'options'=>array(
                            'class'=>'',
                            'rel'=>'',
                        ),
                    ),

                     'view'=>
                    array(

                        'url'=> 'Yii::app()->createUrl("RfqVendorDetail/view",array("id"=>$data->id_rfq_vendor_detail))',
                        'options'=>array(
                            'class'=>'various fancybox.ajax',
                            'rel'=>'',
                        ),
                    ),

                     'delete'=>
                    array(

                        'url'=> 'Yii::app()->createUrl("RfqVendorDetail/delete",array("id"=>$data->id_rfq_vendor_detail))',
                       
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


