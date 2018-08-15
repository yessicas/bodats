<?php
$this->breadcrumbs=array(
	'Fuel ROB'=>array('index'),
	'Manage',
);


$this->menu=array(
 array('label'=>'Fuel ROB per Vessel', 'url'=>array('fuelconsumptiondaily/vesselfuel'), 'active'=>false),
array('label'=>'Manage Fuel ROB','url'=>array('fuelconsumptiondaily/admin'), 'active'=>true),
//array('label'=>'Create FuelConsumptionDaily','url'=>array('create')),

);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
    $('.search-form').toggle();
    return false;
});
$('.search-form form').submit(function(){
    $.fn.yiiGridView.update('fuel-consumption-daily-grid', {
        data: $(this).serialize()
    });
    return false;
});
");
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
<style>
.btn-primary:hover, .btn-primary:focus, .btn-primary:active, .btn-primary.active, .btn-primary.disabled, .btn-primary[disabled] {
    color: #FFF;
    background-color: #133D92;
    width:60px;
    font-size: 10px;
}

.btn-primary {
    width:60px;
    font-size: 10px;
}
</style>
*/
?>

<?php /* echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
    'model'=>$model,
)); */ ?>
<!-- </div> search-form -->



<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
    'action'=>Yii::app()->createUrl($this->route),
    'type' => 'horizontal',
    'method'=>'get',
)); ?>

<div id="content">
<h2>Fuel ROB (Remind On Board)</h2>
<hr>
</div>


<?php echo $form->dropDownListRow($model,'id_vessel',CHtml::listData(Vessel::model()->findAll(array(
           'condition' => 'VesselType = :VesselType',
           'params' => array(
               ':VesselType' => "TUG",
           ),
       )), 'id_vessel', 'VesselName'),
    array('class'=>'span3'));?>


<div class="form-actions" style="margin-top:10px; padding:10px 60px;">
        <?php $this->widget('bootstrap.widgets.TbButton', array(
            'buttonType' => 'submit',
            'type'=>'primary',
            'label'=>'DISPLAY',
        )); ?>
    </div>
<?php
if($id_vessel > 0) { ?>

<div class="userlistviewall" style="display:inline">

<?php 
	$vessel = Vessel::model()->findByPk($id_vessel);
	echo '<h4 style="font-family:calibri;">'. "Fuel Consumption for" .'&nbsp'. '<font color=#BD362F>'. $vessel->VesselName."</h4>"; 
     
     echo'</font>';
?> 


<?php 

}
else {
?>
    <div class="userlistviewall" style="display:none">
        <?php

}

?>


<div class="tambah" style="float:right;">
    <?php 

    if(
        isset($_GET['FuelConsumptionDaily']['id_vessel'])) {

        $vesel=$_GET['FuelConsumptionDaily']['id_vessel'];

    }
    else
    {
        $vesel="";
    }



    $this->widget('bootstrap.widgets.TbButton', array(      

                'label' =>Yii::t('strings','Add ROB Value'),
                'icon'=>'plus white',
                'type' => 'danger',// '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                //'url'=>array('create'),   
                'url'=>array('fuelconsumptiondaily/create','id_vessel'=>$id_vessel),
                'htmlOptions' => array(
                                        'class'=>'various fancybox.ajax'
                                        ),
            
                ));?>
</div>


</h4>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'fuel-consumption-daily-grid',
'type' => 'striped bordered condensed',
'summaryText'=>'',
'afterAjaxUpdate' => 'reloaddata', 
'enableHistory'=>true,
'dataProvider'=>$model->search(),
//'filter'=>$model,
'columns'=>array(
		array(
			'header'=>'No',   
			'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
        ),
        //'id_fuel_consumption_daily',
		 array(
			'name'=>'log_date',
			//'value'=>'Yii::app()->dateFormatter->formatDateTime(strtotime($data->log_date), "medium")',
			'value'=>'Timeanddate::getDisplayStandardDatetime($data->log_date)',
			//'value'=>'$data->log_date',
		),
        //'log_date',
        //'id_vessel',
        array(
            'header'=>'Last Fuel Remain',
			'htmlOptions'=>array('style'=>'width:100px; text-align: right;'),
            'value'=>'NumberAndCurrency::formatCurrency($data->last_fuel_remain)',
        ),
		//  'last_fuel_remain',
        'status_remain',
        //'last_longitude',
        
        //'last_latitude',
        array(  
                'header'=>'Position',
                'name'=>'NearestJettyId',
				'type'=>'raw',
                'value'=>
				function($data)  {			
					return "Near ".$data->idJetty->JettyName." ".$data->NearestDistancePoint." nm";
				}
			,
		),
		'pic',

         array(
            'header'=>'File Attachment',
            'type'=>'raw',
            'value'=>function($data) {
            return ($data->file_attachment == null) ? CHtml::link("Add File Attachment", Yii::app()->controller->createUrl("fuelconsumptiondaily/updateattch",array("id"=>$data->id_fuel_consumption_daily)), array("class"=>"various fancybox.ajax","title"=>"add attachment"))
             : CHtml::link("View", Yii::app()->request->baseUrl."/repository/fuelrob/".$data->file_attachment, array("target"=>"_blank" ,"title"=>"View Attachment"))." | ".
                CHtml::link("Download", Yii::app()->controller->createUrl("fuelconsumptiondaily/download",array("id"=>$data->id_fuel_consumption_daily)), array("target"=>"_blank","title"=>"Download Attachment"))." | ".
                CHtml::link("Edit", Yii::app()->controller->createUrl("fuelconsumptiondaily/updateattch",array("id"=>$data->id_fuel_consumption_daily)), array("class"=>"various fancybox.ajax","title"=>"Edit Attachment")) ;
            },
            ),

     /*   array(
            'name'=>'file_attachment',
            'value'=> 'CHtml::link("View", Yii::app()->request->baseUrl."/repository/fuelrob/".$data->file_attachment, array("target"=>"_blank" ,"title"=>"View Attachment"))',
            'type'=>'raw',
            ),
    */
        /* array(        
                 'name'=>'file_attachment',
                 'value'=> CHtml::image(Yii::app()->request->baseUrl.'/repository/fuelrob'.$model->file_attachment),
                 'type'=>'raw',
            ), */

        // 'file_attachment',
        //'NearestJettyId',
        //'NearestDistancePoint',
        /*'created_date',
        'created_user',
        'ip_user_updated',
        */
		array(
		 'class'=>'bootstrap.widgets.TbButtonColumn',
		'buttons'=>array(
                'update'=>
                    array(
                        'url'=> 'Yii::app()->createUrl("FuelConsumptionDaily/update",array("id"=>$data->id_fuel_consumption_daily,"id_vessel"=>$data->id_vessel))',
                        'options'=>array(
                            'class'=>'various fancybox.ajax',
                            'rel'=>'',
                        ),
                    ),

                     'view'=>
                    array(

                        'url'=> 'Yii::app()->createUrl("FuelConsumptionDaily/view",array("id"=>$data->id_fuel_consumption_daily))',
                        'options'=>array(
                            'class'=>'various fancybox.ajax',
                            'rel'=>'',
                        ),
                    ),

                     'delete'=>
                    array(

                        'url'=> 'Yii::app()->createUrl("FuelConsumptionDaily/delete",array("id"=>$data->id_fuel_consumption_daily))',
                       
                    ),
                    ),
),
),
)); ?> 

</div>

<?php 
$this->widget('application.extensions.fancybox.EFancyBox', array(
    'target'=>'.popup_foto',
    'config'=>array(
        'maxWidth'    => 800,
        'maxHeight'   => 600,
        'fitToView'   => false,
        'width'       => 500,
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

<?php $this->endWidget(); ?>


<script>
function reloaddata(id, data) {
     $('.userlistviewall').show(300);
}
</script>