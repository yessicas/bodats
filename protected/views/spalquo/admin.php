<?php
$this->breadcrumbs=array(
	'Quotations'=>array('index'),
	'Manage',
);

$this->menu=array(
  
    array('label'=>'Manage Quotation', 'url'=>array('demand/quo')),
    array('label'=>'Create Quotation', 'url'=>array('demand/quocreate')),  
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
<h2>Manage Quotations</h2>
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
'dataProvider'=>$model->search(),
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
		'QuotationDate',
        array(  
                'name'=>'id_bussiness_type_order',
                'value'=>'$data->BussinessTypeOrder->bussiness_type_order',
                'filter'=>CHtml::listData(BussinessTypeOrder::model()->findAll(),'id_bussiness_type_order', 'bussiness_type_order'),
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
 'template'=>'{view}{update}{updatedetail}{delete}',
'buttons'=>array(
                'update'=>
                    array(
                        'url'=> 'Yii::app()->createUrl("demand/quoupdate",array("id"=>$data->id_quotation))',
                        //'icon'=>'pencil',
                        'visible'=>'$data->Status=="QUOTATION"',
                        'options'=>array(
                            'class'=>'',
                            'rel'=>'',
                            //'title'=>'update',
                        ),
                    ),

                     'view'=>
                    array(

                        'url'=> 'Yii::app()->createUrl("quotation/viewfinish",array("id"=>$data->id_quotation))',
                         'visible'=>'QuotationsDB::getvisiblemanage($data)',
                        'options'=>array(
                            'class'=>'',
                            'rel'=>'',
                        ),
                    ),

                    'updatedetail'=>
                    array(

                        'url'=> 'Yii::app()->createUrl("quotation/view",array("id"=>$data->id_quotation,"#"=>"detail_quotation"))',
                        'icon'=>'share',
                       'visible'=>'QuotationsDB::getvisiblemanage($data)&&($data->id_bussiness_type_order==100||$data->id_bussiness_type_order==200)',
                        'options'=>array(
                            'class'=>'',
                            'rel'=>'',
                            'title'=>'Update Detail',
                        ),
                    ),



                     'delete'=>
                    array(
                        'visible'=>'$data->Status=="QUOTATION"',
                        'url'=> 'Yii::app()->createUrl("quotation/delete",array("id"=>$data->id_quotation))',
                       
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

   