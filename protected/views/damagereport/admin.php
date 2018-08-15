<?php
$this->breadcrumbs=array(
	'Damage Reports'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List Vessel Damage Report', 'url'=>array('repair/listofvessel','mode'=>'DAMAGE')),
array('label'=>'Manage Damage Report','url'=>array('repair/damage','id'=>$_GET['id'])),
//array('label'=>'Create Damage Report','url'=>array('repair/damagecreate')),

);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('damage-report-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<?php 
    
        $Vessel =  Vessel::model()->findByPk( $_GET['id']);
        if($Vessel){
            $VesselName = $Vessel->VesselName;
        }else{
            $VesselName = '';
            throw new CHttpException(404,'The requested page does not exist.');
            
        }
        

?>


<div id="content">
<h2>Manage Damage Reports <?php echo $VesselName ?></h2>
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
'id'=>'damage-report-grid',
'type' => 'striped bordered condensed',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
 array(
        'header'=>'No',    'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
                ),
		//'id_damage_report',
	   // 'id_vessel',
        'DamageReportNumber',
        array('name'=>'Damage Photo', 'type'=>'raw',
            'filter'=>false,
            'value'=>function($data) {
            return ($data->DamagePhoto == "") ? '<div id="foto" style="width:100px;">'.ImageDisplayer::displayDefaultFileforgrid("repository/damagephoto/" , "defaultuser.jpg").'</div>' : '<div id="foto" style="width:100px;">'.ImageDisplayer::displaySmallFoto("repository/damagephoto/" , $data->DamagePhoto).'</div>' ;
            },
            ),
        /* di ilangin 
       array(   
             'name'=>'id_vessel',
             'value'=>'$data->idVessel->VesselName',
             'filter'=>false,
           ),
        */
        array(
            'name'=>'Date',
            'value'=>'Yii::app()->dateFormatter->formatDateTime($data->Date, "medium","")',
            'filter' => $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'model'=>$model, 
                'attribute'=>'Date', 
                'language' => 'id',
                'i18nScriptFile' => 'jquery.ui.datepicker-ja.js', 
                'htmlOptions' => array(
                    'id' => 'datepicker_Date',
                    'size' => '10',
                ),
                'defaultOptions' => array(  // (#3)
                    'showOn' => 'focus', 
                    'dateFormat' => 'yy-mm-dd',
                    'showOtherMonths' => true,
                    'selectOtherMonths' => true,
                    'changeMonth' => true,
                    'changeYear' => true,
                    //'showButtonPanel' => true,
                )
            ), 
            true), 
        ),
        'DamageTime',
		//'Date',
		//'Description',
		'PIC',
		//'DamageTime',
		//'CausedDamage',
		//'DamagePhoto',
		'Suggestion',
		'Master',
		'ChiefEngineer',
        array( 
            'class' => 'editable.EditableColumn',
            'name' => 'Status',
            'header'=>'Status',
            //'filter'=> array("OPEN"=>"OPEN","REPAIRING"=>"REPAIRING","CLOSED"=>"CLOSED"),
            'editable' => array(
                'type'      => 'select',
                //'source'    => Editable::source(DamageReport::model()->findAll(), 'id_damage_report', 'Status'),
                'source'=>Editable::source(array("OPEN"=>"OPEN","REPAIRING"=>"REPAIRING","CLOSED"=>"CLOSED")),
                'url'       => $this->createUrl('damagereport/editable'),
                'placement' => 'top',
            )
          ),

       // 'Status',
		
array(
 'class'=>'bootstrap.widgets.TbButtonColumn',
 'template'=>'{update}{delete}',
'buttons'=>array(
                'update'=>
                    array(
                        'url'=> 'Yii::app()->createUrl("repair/damageupdate",array("id"=>$data->id_damage_report))',
                        'options'=>array(
                            'class'=>'',
                            'rel'=>'',
                        ),
                    ),

                     'view'=>
                    array(

                        'url'=> 'Yii::app()->createUrl("repair/damageview",array("id"=>$data->id_damage_report))',
                        'options'=>array(
                            'class'=>'',
                            'rel'=>'',
                        ),
                    ),

                     'delete'=>
                    array(

                        'url'=> 'Yii::app()->createUrl("damagereport/delete",array("id"=>$data->id_damage_report))',
                       
                    ),
                    ),
),


     array(
            'header'=>'Repair Closed Report',
            'type'=>'raw',
            'value'=>function($data) {
            return  ($data->Status == "OPEN") ? CHtml::link("Create", Yii::app()->controller->createUrl("damageReportRepair/create",array("id"=>$data->id_damage_report)), array("title"=>"Create")) 
                    : 
                     CHtml::link("Update", Yii::app()->controller->createUrl("damageReportRepair/update",array("id"=>$data->id_damage_report)), array("title"=>"Update"))." ".
                     CHtml::link("view", Yii::app()->controller->createUrl("damageReportRepair/view",array("id"=>$data->id_damage_report)), array("title"=>"View"))
                     ;
            },
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

