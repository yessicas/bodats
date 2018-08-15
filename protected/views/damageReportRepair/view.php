<?php
$this->breadcrumbs=array(
	'Damage Report Repairs'=>array('index'),
	$model->id_damage_report_repair,
);

$this->menu=array(
//array('label'=>'List DamageReportRepair','url'=>array('index')),
array('label'=>'List Vessel Damage Report', 'url'=>array('repair/listofvessel','mode'=>'DAMAGE')),
array('label'=>'Manage Damage Report','url'=>array('repair/damage','id'=>$model->id_vessel)),
//array('label'=>'Create Damage Report Repair','url'=>array('create','id'=>$model->id_damage_report)),
array('label'=>'Update Damage Report Repair','url'=>array('update','id'=>$model->id_damage_report)),
array('label'=>'View Damage Report Repair','url'=>array('damageReportRepair/view','id'=>$model->id_damage_report)),
//array('label'=>'Delete DamageReportRepair','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_damage_report_repair),'confirm'=>'Are you sure you want to delete this item?')),
//array('label'=>'Manage DamageReportRepair','url'=>array('admin')),
);
?>


<div id="content">
<h2>
View Damage Report Repair  No  <?php echo $model->DamageReportNumber ?>
<br> 
of Damage Report no <?php echo $modelDamage->DamageReportNumber.' - '.$modelDamage->idVessel->VesselName ?>
 </h2>

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

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		//'id_damage_report_repair',
		//'id_damage_report',
		//'id_request_for_schedule',
		//'id_vessel',
		'StartRepair',
		'EndRepair',
		//'DamageReportNumber',
		//'NoReport',
		//'NoMonth',
		//'NoYear',
		'CausedDamage',
		'Description',
		'PIC',
		//'Status',
		//'RepairPhoto1',
		array(
			'name'=>'RepairPhoto1',
			'type'=>'raw',
			'value'=>($model->RepairPhoto1 !='') ? ImageDisplayer::displaySmallFoto("repository/damagerepairphoto/" , $model->RepairPhoto1) :
					 "-" 
			),

		//'RepairPhoto2',
		//'RepairPhoto3',
		array(
			'name'=>'RepairPhoto2',
			'type'=>'raw',
			'value'=>($model->RepairPhoto2 !='') ? ImageDisplayer::displaySmallFoto("repository/damagerepairphoto/" , $model->RepairPhoto2) :
					 "-"
			),
		array(
			'name'=>'RepairPhoto3',
			'type'=>'raw',
			'value'=>($model->RepairPhoto3 !='') ? ImageDisplayer::displaySmallFoto("repository/damagerepairphoto/" , $model->RepairPhoto3) :
					 "-"
			),
		'Master',
		'ChiefEngineer',
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