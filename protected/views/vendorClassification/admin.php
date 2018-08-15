<?php
$this->breadcrumbs=array(
	'Vendor Classifications'=>array('index'),
	'Manage',
);

$this->menu=array(

array('label'=>'Manage Vendor Classification','url'=>array('custvend/klas')),
//array('label'=>'Create VendorClassification','url'=>array('create')),

);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('#VendorClassification_type').change(function(){
$.fn.yiiGridView.update('vendor-classification-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<div id="content">
<h2>Vendor Classifications</h2>
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


  
                  

    <?php echo $this->renderPartial('../vendorclassification/_search', array('model'=>$model)); ?>
  

<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'vendor-classification-grid',
'type' => 'striped bordered condensed',
'dataProvider'=>$model->search(),
//'filter'=>$model,
'columns'=>array(
 array(
			'header'=>'No',    'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
                ),
			//'id_vendor_classification',
			array(   
                'header'=>'Vendor Name',
                'name'=>'id_vendor',
                'value'=>'$data->namavendor->VendorName',
               // 'filter'=>CHtml::listData(Vendor::model()->findAll(),'id_vendor', 'VendorName'),

               // 'filter'=>array("GROUP"=>"GROUP","NON-GROUP"=>"NON-GROUP"),
                ),
			array(   
                'header'=>'Address',
                'name'=>'id_vendor',
                'value'=>'$data->namavendor->Address',
                ),
			//'id_vendor',
			 array(   
					'header'=>'Type',
					'name'=>'type',
				   // 'value'=>'$data->type',
				   // 'filter'=>CHtml::listData(Vendor::model()->findAll(),'id_vendor', 'VendorName'),

				//    'filter'=>array("AGENCY"=>"AGENCY","PRODUCT"=>"PRODUCT"),
					),
	//	'type',
		array(
		 'class'=>'bootstrap.widgets.TbButtonColumn',
		 'template'=>'{view}',
		'buttons'=>array(

                    'view'=>
                    array(

                        'url'=> 'Yii::app()->createUrl("custvend/vendview/",array("id"=>$data->id_vendor))',
                        'options'=>array(
                            //'class'=>'various fancybox.ajax',
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
        'width'       => 450,
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

