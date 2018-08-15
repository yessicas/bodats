

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

<?php if($modelso->isNewRecord){ ?>

<div class="tambah" id="detail_quotation" align="right">
<?php      $this->widget('bootstrap.widgets.TbButton', array(      

                'label' =>Yii::t('strings','Vessel & Capacity'),
                'icon'=>'pencil white',
                'type' => 'danger',// '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                //'url'=>array('create'),   
                'url'=>array('demand/quocreate2/','id'=>$model->id_quotation,'inso'=>1,'sostat'=>'create'),
                'htmlOptions' => array(
                                        'class'=>'various fancybox.ajax',
                                        ),
            
                )); 
?> 
</div>

<?php } ?>


<?php if(!$modelso->isNewRecord){ ?>

<div class="tambah" id="detail_quotation" align="right">
<?php      $this->widget('bootstrap.widgets.TbButton', array(      

                'label' =>Yii::t('strings','Vessel & Capacity'),
                'icon'=>'pencil white',
                'type' => 'danger',// '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                //'url'=>array('create'),   
                'url'=>array('demand/quocreate2/','id'=>$model->id_quotation,'inso'=>1,'sostat'=>'update','soid'=>$modelso->id_so),
                'htmlOptions' => array(
                                        'class'=>'various fancybox.ajax',
                                        ),
            
                )); 
?> 
</div>

<?php } ?>

</div>


<?php if($modelso->isNewRecord){ ?>

<div class="tambah" id="detail_quotation">
<?php      $this->widget('bootstrap.widgets.TbButton', array(      

                'label' =>Yii::t('strings','Add Detail Quotation'),
                'icon'=>'plus white',
                'type' => 'danger',// '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                //'url'=>array('create'),   
                'url'=>array('quotationdetailvessel/create','id'=>$model->id_quotation,'inso'=>1,'sostat'=>'create'),
                'htmlOptions' => array(
                                        'class'=>'various fancybox.ajax',
                                        ),
            
                )); 
?> 
</div>

<?php } ?>


<?php if(!$modelso->isNewRecord){ ?>

<div class="tambah" id="detail_quotation">
<?php      $this->widget('bootstrap.widgets.TbButton', array(      

                'label' =>Yii::t('strings','Add Detail Quotation'),
                'icon'=>'plus white',
                'type' => 'danger',// '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                //'url'=>array('create'),   
                'url'=>array('quotationdetailvessel/create','id'=>$model->id_quotation,'inso'=>1,'sostat'=>'update','soid'=>$modelso->id_so),
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
'enableSorting'=>false,
'summaryText'=>'',
'dataProvider'=>$modeldetail->searchbyquotation($model->id_quotation),
//'filter'=>$modeldetail,
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

       array('header'=>'Action',
             'type'=>'raw',
             'value'=>function($data,$row) use ($modelso){
                return ($modelso->isNewRecord) ? CHtml::link("Edit", Yii::app()->createUrl("quotationdetailvessel/update",array("id"=>$data->id_quotation_detail,"inso"=>1,"sostat"=>"create")), array("class"=>"various fancybox.ajax")) : 
                                                CHtml::link("Edit", Yii::app()->createUrl("quotationdetailvessel/update",array("id"=>$data->id_quotation_detail,"inso"=>1,"sostat"=>"update","soid"=>$modelso->id_so)), array("class"=>"various fancybox.ajax")) ;
              },
        )
		
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



