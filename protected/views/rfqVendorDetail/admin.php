<?php
$this->breadcrumbs=array(
	'Rfq Vendor Details'=>array('index'),
	'Manage',
);

$this->menu=array(

array('label'=>'Create RfqVendorDetail','url'=>array('create')),
array('label'=>'Manage RfqVendorDetail','url'=>array('admin')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('rfq-vendor-detail-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<div id="content">
<h2>Manage Rfq Vendor Details</h2>
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
'id'=>'rfq-vendor-detail-grid',
'type' => 'striped bordered condensed',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
 array(
        'header'=>'No',    'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
                ),
		//'id_rfq_vendor_detail',
		//'id_rfq_vendor',
        array(   
                'header'=>'RFQ Number',
                'name'=>'id_rfq_vendor',
                'value'=>'$data->idRfqVendor->RFQNumber',
                ),
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
                            'class'=>'',
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

