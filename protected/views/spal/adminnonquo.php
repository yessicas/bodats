<?php
$this->breadcrumbs=array(
	'Spals'=>array('index'),
	'Manage',
);

$this->menu=array(
//array('label'=>'List Spal','url'=>array('index')),
array('label'=>'Manage Agreement Document SPAL','url'=>array('spal/admin')),
array('label'=>'Manage SPAL Without Quotation','url'=>array('spal/adminnonquo')),
array('label'=>'Create SPAL Without Quotation','url'=>array('spalquo/quocreate')),
//array('label'=>'Create Spal','url'=>array('spl/create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('spal-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<div id="content">
	<h2>Agreement Document (SPAL) Without Quotation</h2>
	<hr>
</div>

<div class="alert alert-block alert-info">
	<b>If you want to create new SPAL, please select related quotation (Status: QUOTATION). </b>
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

<?php
/*
 $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'spal-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id_spal',
		'id_quotation',
		'SpalNumber',
		'SpalNo',
		'SpalMonth',
		'SpalYear',
		'SpalDate',
		'JenisMuatan',
		'TotalMaxMuatan',
		'KondisiAngkutan',
		'PengirimanBarang',
		'UangTambang',
		'DemurageCost',
		'KeagenanKapal',
		'AsuransiKapal',
		'AsuransiBarang',
		'PihakKedua1',
		'PihakKedua2',
		'created_date',
		'created_user',
		'ip_user_updated',
		
array(
 'class'=>'bootstrap.widgets.TbButtonColumn',
),
),
)); 

*/
?> 


<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'quotation-grid',
'type' => 'striped bordered condensed',
'dataProvider'=>$quo->searchonspalwithoutquotation(),
'filter'=>$quo,
'columns'=>array(
        //'id_quotation',
        array(
        'header'=>'No',    'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
            ),
        //'QuotationNumber',
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
                'filter'=>CHtml::listData(BussinessTypeOrder::model()->findAll(),'id_bussiness_type_order', 'bussiness_type_order'),
                ),
        array(  
                'name'=>'Status',
                'filter'=>TransactionDB::getStatusTransaction(),
                ),
        //'SignName',
        //'SignPosition',
        //'Status',
        //'Category',
        //'StatusDescription',
        //'attachment',
        //'created_date',
        /*
        array(  
                'name'=>'Status',
                'filter'=>array('OPEN'=>'OPEN','REJECTED'=>'REJECTED','ACCEPTED'=>'ACCEPTED'),
                ),
        'created_user',
        */
        //'ip_user_updated',
        //'spal_created',
        
		array(
		 'class'=>'bootstrap.widgets.TbButtonColumn',
		 //'htmlOptions'=>array('width'=>'60px'),
		 'template'=>'{create}{view}{update}',
		 'header'=>'SPAL',
		'buttons'=>array(
                'create'=>
                    array(
                        'url'=> 'Yii::app()->createUrl("spal/create",array("id"=>$data->id_quotation))',
                        'icon'=>'share',
                        'visible'=>'$data->spal_created==0&&$data->id_bussiness_type_order != 300',
                        'options'=>array(
                            'class'=>'',
                            'rel'=>'',
                            'title'=>'Create SPAL',
                        ),
                    ),

                     'view'=>
                    array(

                        'url'=> 'Yii::app()->createUrl("spal/view",array("id"=>$data->id_quotation))',
                        'visible'=>'$data->spal_created==1',
                        'options'=>array(
                            'class'=>'',
                            'rel'=>'',
                            'title'=>'View SPAL',
                        ),
                    ),

                    'update'=>
                    array(

                        'url'=> 'Yii::app()->createUrl("spal/update",array("id"=>$data->id_quotation))',
                        'icon'=>'pencil',
                        'visible'=>'$data->spal_created==1&&$data->Status=="QUOTATION"',
                        'options'=>array(
                            'class'=>'',
                            'rel'=>'',
                             'title'=>'Update SPAL',
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

