<?php
$this->breadcrumbs=array(
	'Voyage Orders'=>array('index'),
	'Monitoring',
);

$this->menu=array(
array('label'=>'Voyage Order Monitoring','url'=>array('voyageorder/monitoring')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('voyage-order-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<div id="content">
<h2>Voyage Order Monitoring </h2>
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







<!-- pencarian Data -->

<?php
    //SET Default Value
    $DEFAULT_YEAR = (Timeanddate::getCurrentYear()*1);
    $DEFAULT_MONTH = '1'; //Defaultnya dimulai dari Januari
    
    if(isset($_GET['Month']))
        $DEFAULT_MONTH = $_GET['Month'];
        
    if(isset($_GET['Year']))
        $DEFAULT_YEAR = $_GET['Year'];
?>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
    'action'=>Yii::app()->createUrl($this->route),
    'type' => 'horizontal',
    'method'=>'get',
)); ?>

<div class="view">
    <div class="form-horiz ">
    <?php //echo $form->labelEx($model,'customername'); ?>
    <label class="control-label required" for="SalesPlan_Month"><?php echo "Month &nbsp"  ?><span class="required">*</span></label> <!-- label manual -->

    <div class="controls">
        <?php echo CHtml::dropDownList('Month',$DEFAULT_MONTH,Timeanddate::getlistmonthforsettypetugbarge(),
            array('class'=>'span4'));?>
    </div>
    </div>

    <div class="form-horiz ">
    <?php //echo $form->labelEx($model,'customername'); ?>
    <label class="control-label required" for="SalesPlan_Year"><?php echo "Year &nbsp"  ?><span class="required">*</span></label> <!-- label manual -->

    <div class="controls">
        <?php echo CHtml::dropDownList('Year',$DEFAULT_YEAR,Timeanddate::getlistyear(),
            array('class'=>'span4'));?>
    </div>
    </div>

    <div class="form-actions" style="margin-top:10px; padding:10px 75px;">
        <?php $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType' => 'submit',
            'type'=>'primary',
            'label'=>'Display',
        )); ?>
    </div>

</div>

<?php $this->endWidget(); ?>

<?php
$monthFormated = sprintf("%02s",$DEFAULT_MONTH); // formated mont (1 jadi 01)
$maxDayinDefaultMonth = sprintf("%02s",Timeanddate::getMaximumDateEachMonth($DEFAULT_MONTH,$DEFAULT_YEAR)); // maximum tanggal yang di foemat 
$StartDateAwal=$DEFAULT_YEAR.'-'.$monthFormated.'-01';
$StartDateAkhir=$DEFAULT_YEAR.'-'.$monthFormated.'-'.$maxDayinDefaultMonth ;
?>

<!-- end pencarian Data -->






<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'voyage-order-grid',
'type' => 'striped bordered condensed',
'dataProvider'=>$model->searchMonitoring($StartDateAwal,$StartDateAkhir),
'filter'=>$model,
'columns'=>array(
		//'id_voyage_order',
		//'VoyageNumber',
		//'VoyageOrderNumber',
		//'VONo',
		//'VOMonth',
		//'VOYear',
		
		//'id_quotation',
		//'id_so',
		//'id_voyage_order_plan',
		//'status',
         array(
        'header'=>'No',    'value'=>'$row+1',
            ),
         'VoyageOrderNumber',
		//'bussiness_type_order',
         array(  
                'name'=>'bussiness_type_order',
                'value'=>'$data->BussinessTypeOrder->bussiness_type_order',
                'filter'=>CHtml::listData(BussinessTypeOrder::model()->findAll(),'id_bussiness_type_order', 'bussiness_type_order'),
                ),
		array(  
                'header'=>'Customer',
                'name'=>'CompanyName',
                //'name'=>'',
                //'value'=>'$data->Quotation->Customer->CompanyName',
                'value'=>function($data) {
                        return ($data->Quotation->Customer) ? $data->Quotation->Customer->CompanyName : "-";
                },
                'filter'=>CHtml::listData(Customer::model()->findAll(array('order'=>'CompanyName ASC')), 'id_customer', 'CompanyName'),
                ),
		//'BargingVesselTug',
		//'BargingVesselBarge',

        array(  'header'=>'Tug',
                'name'=>'BargingVesselTug',
                //'value'=>'$data->VesselTug->VesselName',
				'value'=>function($data) {
                        if(isset($data->VesselTug)){
							return $data->VesselTug->VesselName;
						}else{
							return "VESSEL TUG NOT FOUND (ID.".$data->BargingVesselTug.")";
						}
                },
                'filter'=>CHtml::listData(Vessel::model()->findAll(array(
                       'condition' => 'VesselType = :VesselType',
                       'params' => array(
                           ':VesselType' => "TUG",
                       ),
                   )), 'id_vessel', 'VesselName'),
                           

             ),

         array(  'header'=>'Barge',
                'name'=>'BargingVesselBarge',
                //'value'=>'$data->VesselBarge->VesselName',
				'value'=>function($data) {
                        if(isset($data->VesselBarge)){
							return $data->VesselBarge->VesselName;
						}else{
							return "VESSEL BARGE NOT FOUND (ID.".$data->BargingVesselBarge.")";
						}
                },
                'filter'=>CHtml::listData(Vessel::model()->findAll(array(
                       'condition' => 'VesselType = :VesselType',
                       'params' => array(
                           ':VesselType' => "BARGE",
                       ),
                   )), 'id_vessel', 'VesselName'),
                                       

             ),

        //'IdNodeDestination',
    

        array(  'header'=>'Port Of Loading',
                'name'=>'BargingJettyIdStart',
                'value'=>'$data->JettyOrigin->JettyName',
                'filter'=>CHtml::listData(Jetty::model()->findAll(),'JettyId', 'JettyName'),
                ),
        //'IdNodeDestination',
        array(  'header'=>'Port Of Unloading',
                'name'=>'BargingJettyIdEnd',
                'value'=>'$data->JettyDestination->JettyName',
                'filter'=>CHtml::listData(Jetty::model()->findAll(),'JettyId', 'JettyName'),
                ),
		//'BargeSize',
		//'Capacity',
        array(  
				'header'=>'Capacity (MT)',
                'name'=>'Capacity',
                'value'=>'NumberAndCurrency::formatNumber($data->Price)',
                ),
		//'TugPower',
		//'BargingJettyIdStart',
		//'BargingJettyIdEnd',
		/*
        array(  
                'name'=>'Price',
                'value'=>'$data->Price." ".$data->Currency->currency',
                ),
			*/
		array(  'header'=>'Loading Date',
                'name'=>'StartDate',
                'value'=>'Timeanddate::getDisplayStandardDate($data->StartDate)',
                ),
        array('name'=>'status','filter'=>array(
                                                'SHIPPING ORDER'=>'SHIPPING ORDER',
                                                'VO CREATE'=>'VO CREATE',
                                                'VO SAILING'=>'VO SAILING',
                                                'VO FINISH'=>'VO FINISH',
                                                'VO DOC COMPLETE'=>'VO DOC COMPLETE',
                                                'VO DOC COMPLETE'=>'VO DOC COMPLETE',
                                                'INVOICE'=>'INVOICE',
                                                'PAY'=>'PAY',

                                                )),
        /*
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
		*/
		
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

