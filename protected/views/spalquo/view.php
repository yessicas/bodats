<?php
$this->breadcrumbs=array(
	'Quotations'=>array('index'),
	$model->id_quotation,
);

$this->menu=array(
    array('label'=>'Manage Quotation', 'url'=>array('demand/quo')),
     array('label'=>'Create Quotation', 'url'=>array('demand/quocreate')),
	// array('label'=>'Back to Step 2', 'url'=>array('demand/quocreate2','id'=>$model->id_quotation)),
    //array('label'=>'Back to step 1 ', 'url'=>array('demand/quoupdate','id'=>$model->id_quotation)),
    array('label'=>'Create Quotation Step 3 ', 'url'=>array('quotation/view','id'=>$model->id_quotation)),
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

<?php /*
<div id="content">
<h2>View Quotation # <font color="#BD362F"><?php echo $model->QuotationNumber; ?></font></h2>
<hr>
</div>
*/ ?>

<div class="alert alert-block alert-info">
<?php if($model->id_bussiness_type_order==100){ ?>
<h4 style="color:#BD362F;"> Barging </h4>
<?php } ?>
<?php if($model->id_bussiness_type_order==200){ ?>
<h4 style="color:#BD362F;"> Transhipment </h4>
<?php } ?>
<b><?php echo Yii::t('strings','Step 3 Of 3') ?> : </b>
<?php echo Yii::t('strings','Detail Route') ?>
<br>
You Can 
<?php echo CHtml::link('Back to Step 2',array('demand/quocreate2','id'=>$model->id_quotation)); ?> or <?php echo CHtml::link('Back to step 1 ',array('demand/quoupdate','id'=>$model->id_quotation)); ?>
</div>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		//'id_quotation',
		'QuotationNumber',
		//'id_customer',
		//'Customer.ContactName',
		'QuotationDate',
        array('label'=>'Type Order', 'value'=>$model->BussinessTypeOrder->bussiness_type_order),
        // 'BussinessTypeOrder.bussiness_type_order',
		//'SignName',
		//'SignPosition',
        //'attn',
		//'Status',
		//'Category',
		//'StatusDescription',
		//'attachment',
		//'created_date',
		//'created_user',
		//'ip_user_updated',
),
)); ?>



<div class="view">
<h4 style="color:#BD362F;"> Costumer Info </h4>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
        'Customer.CompanyName',
        'Customer.Address',
        'attn',
),
)); ?>

</div>


<div class="view">
<h4 style="color:#BD362F;"> Vessel & Capacity</h4>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
        //array('label'=>'Port Of Loading', 'value'=>$model->JettyOrigin->JettyName),
        //array('label'=>'Port Of Unloading', 'value'=>$model->JettyDestination->JettyName),
        array('label'=>'Mother Vessel', 'value'=>($model->Mothervessel) ? $model->Mothervessel->MV_Name : '-' ,'visible'=>$model->id_bussiness_type_order==200),
        array('label'=>'Tug ', 'value'=>$model->VesselTug->VesselName),
        array('label'=>'Barge ', 'value'=>$model->VesselBarge->VesselName),
        'LoadingDate',
        array('label'=>'Total Quantity', 'value'=>$model->TotalQuantity.' '.$model->QuantityUnit),
        'StatusDescription',

),
)); ?>

</div>


<?php if($model->IsSingleRoute==0) { ?>

<div class="tambah" id="detail_quotation">
<?php      $this->widget('bootstrap.widgets.TbButton', array(      

                'label' =>Yii::t('strings','Add Detail Quotation'),
                'icon'=>'plus white',
                'type' => 'danger',// '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                //'url'=>array('create'),   
                'url'=>array('quotationdetailvessel/create','id'=>$model->id_quotation),
                'htmlOptions' => array(
                                        'class'=>'various fancybox.ajax',
                                        ),
            
                )); 
?> 
</div>

<?php } ?>



<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'quotation-detail-vessel-grid',
'type' => 'bordered',
'dataProvider'=>$modeldetail->searchbyquotation($model->id_quotation),
'filter'=>$modeldetail,
'columns'=>array(
		//'id_quotation_detail',
		 array(
        'header'=>'No',    'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
            ),
		//'id_quotation',
		//'IdNodeOrigin',
		array(	'header'=>'Port Of Loading',
                'name'=>'IdJettyOrigin',
                'value'=>'$data->JettyOrigin->JettyName',
                'filter'=>CHtml::listData(Jetty::model()->findAll(),'JettyId', 'JettyName'),
                ),
		//'IdNodeDestination',
		array(	'header'=>'Port Of Unloading',
                'name'=>'IdJettyDestination',
                'value'=>'$data->JettyDestination->JettyName',
                'filter'=>CHtml::listData(Jetty::model()->findAll(),'JettyId', 'JettyName'),
                ),
		'BargeSize',
		'Capacity',
		//'Price',
        //'id_currency',
        array(  
                'name'=>'Price',
                'value'=>'$data->Price." ".$data->Currency->currency',
                ),
		//'id_currency',
        /*
		array(	
                'name'=>'id_currency',
                'value'=>'$data->Currency->currency',
                'filter'=>CHtml::listData(Currency::model()->findAll(),'id_currency', 'currency'),
                ),
        */
		//'change_rate',
       'fuel_price',
		
array(
 'class'=>'bootstrap.widgets.TbButtonColumn',
 'visible'=>$model->Status=='QUOTATION',
'buttons'=>array(
                'update'=>
                    array(
                        'url'=> 'Yii::app()->createUrl("quotationdetailvessel/update",array("id"=>$data->id_quotation_detail))',
                        'options'=>array(
                             'class'=>'various fancybox.ajax',
                            'rel'=>'',
                        ),
                    ),

                     'view'=>
                    array(

                        'url'=> 'Yii::app()->createUrl("quotationdetailvessel/view",array("id"=>$data->id_quotation_detail))',
                        'options'=>array(
                            'class'=>'various fancybox.ajax',
                            'rel'=>'',
                        ),
                    ),

                     'delete'=>
                    array(

                        'url'=> 'Yii::app()->createUrl("quotationdetailvessel/delete",array("id"=>$data->id_quotation_detail))',
                       
                    ),
                    ),
),
),
)); ?> 

<?php
$total_detail=$modeldetail->searchbyquotation($model->id_quotation)->getItemCount();
if($total_detail>0 && $model->Status=='QUOTATION'){

$this->widget('bootstrap.widgets.TbButton', array(      

                        'label' =>Yii::t('strings','Save & Finish'),
                        'icon'=>'ok white',
                        'type' => 'info',// '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                        //'url'=>array('create'), 
                        //'size'=>'small',  
                        'url'=>array('quotation/viewfinish','id'=>$model->id_quotation),
                        'htmlOptions' => array(
                                               //'target'=>'_blank',
                                                ),
                    
                        )); 

echo' ';
/*
$this->widget('bootstrap.widgets.TbButton', array(      

                        'label' =>Yii::t('strings','Print'),
                        'icon'=>'print white',
                        'type' => 'info',// '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                        //'url'=>array('create'), 
                        //'size'=>'small',  
                        'url'=>array('quotation/report','id'=>$model->id_quotation),
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
                        'url'=>array('quotation/viewreport','id'=>$model->id_quotation),
                        'htmlOptions' => array(
                                               'target'=>'_blank',
                                                ),
                    
                        )); 
*/
}
?>

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



