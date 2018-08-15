<?php
$this->breadcrumbs=array(
	'Finding Reports'=>array('index'),
	'Manage',
);

$this->menu=array(

array('label'=>'List Of Vessel Finding Report','url'=>array('repair/listofvessel','mode'=>'FINDING')),
array('label'=>'Manage Finding Report','url'=>array('repair/finding','id'=>$_GET['id'])),
//array('label'=>'Create Finding Report','url'=>array('findingreport/create')),

);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('finding-report-grid', {
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
<h2>Manage Finding Reports <?php echo $VesselName ?></h2>
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
'id'=>'finding-report-grid',
'type' => 'striped bordered condensed',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
 array(
        'header'=>'No',    'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
                ),
		//'id_finding_report',
        'FindingReportNumber',

        /* di ilangin 
        array(   
                'header'=>'Vessel Name',
                'name'=>'VesselName',
                'value'=>'$data->Vessel->VesselName',
                //'filter'=>CHtml::listData(Vessel::model()->findAll(),'VesselName', 'VesselName'),
                'filter'=>false,
                ),
        */
  array(
            'name'=>'Date',
            'value'=>'Yii::app()->dateFormatter->formatDateTime($data->Date, "medium","")',
            'filter'=> CHtml::activeTextField($model, 'Date', array('id'=>'Date_grid')),
            ),

		//'Date',
		//'id_vessel',

         array(
            'name'=>'created_date',
            'value'=>'Yii::app()->dateFormatter->formatDateTime($data->created_date, "medium")',
            'filter'=> CHtml::activeTextField($model, 'created_date', array('id'=>'created_date_grid')),
            ),
		//'created_date',
		'created_user',
        array( 
            'class' => 'editable.EditableColumn',
            'name' => 'Status',
            'header'=>'Status',
            //'filter'=> array("OPEN"=>"OPEN","REPAIRING"=>"REPAIRING","CLOSED"=>"CLOSED"),
            'editable' => array(
                'type'      => 'select',
                //'source'    => Editable::source(DamageReport::model()->findAll(), 'id_damage_report', 'Status'),
                'source'=>Editable::source(array("OPEN"=>"OPEN","PARTIALLY REPAIRED"=>"PARTIALLY REPAIRED","FULL REPAIRED"=>"FULL REPAIRED")),
                'url'       => $this->createUrl('findingreport/editable'),
                'placement' => 'top',
            )
          ),
        //'Status',
		/*
		'ip_user_updated',
		*/
array(
 'class'=>'bootstrap.widgets.TbButtonColumn',
  'template'=>'{update}{delete}',
'buttons'=>array(
                'update'=>
                    array(
                        'url'=> 'Yii::app()->createUrl("findingreport/update",array("id"=>$data->id_finding_report))',
                        'options'=>array(
                            'class'=>'',
                            'rel'=>'',
                        ),
                    ),

                     'view'=>
                    array(

                        'url'=> 'Yii::app()->createUrl("findingreport/view",array("id"=>$data->id_finding_report))',
                        'options'=>array(
                            'class'=>'',
                            'rel'=>'',
                        ),
                    ),

                     'delete'=>
                    array(

                        'url'=> 'Yii::app()->createUrl("findingreport/delete",array("id"=>$data->id_finding_report))',
                       
                    ),
                    ),
),

        array(
            'header'=>'Repair Closed Report',
            'type'=>'raw',
            'value'=>function($data) {
            return  CHtml::link("Create", Yii::app()->controller->createUrl("repair/xx",array("id"=>$data->id_vessel)), array("title"=>"Create"))." ".
                    CHtml::link("Update", Yii::app()->controller->createUrl("repair/xx",array("id"=>$data->id_vessel)), array("title"=>"Create"))." ".
                    CHtml::link("view", Yii::app()->controller->createUrl("repair/xx",array("id"=>$data->id_vessel)), array("title"=>"Create"));
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

