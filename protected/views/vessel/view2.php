<?php
/* @var $this VesselController */
/* @var $model Vessel */

$this->breadcrumbs=array(
	'Vessels'=>array('index'),
	$model->id_vessel,
);

$this->menu=array(

    array('label'=>'Manage Vessel', 'url'=>array('entity/entivess')),
	array('label'=>'Create Vessel', 'url'=>array('entity/entivesscreate')),
	array('label'=>'View Vessel', 'url'=>array('vessel/view2', 'id'=>$model->id_vessel)),
    array('label'=>'Update Vessel', 'url'=>array('entity/entivessupdate', 'id'=>$model->id_vessel)),
	array('label'=>'Delete Vessel', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_vessel),'confirm'=>'Are you sure you want to delete this item?')),
	
);
?>

<?php if(Yii::app()->user->hasFlash('success')):?>
<div class = "animated flash">
	<?
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

<div id="content">
<h2>View Vessel # <font color="#BD362F"> <?php echo $model->VesselName; ?></font></h2>
<hr>
</div>

<div class ="view">
<table width="100%">
	<tr>
		<td width = "210" style="vertical-align:top;">
		<?php
			$repo = "repository/vessel/";
			$DEF_FILE = ImageDisplayer::displayDefaultFile($repo , "defaultuser.jpg");
			if($model->foto_vessel != ""){
				$file = $repo.$model->foto_vessel;
				
				if(file_exists($file)){
					//echo ImageDisplayer::displaySmallFotoWithConditional($repo, $model->foto, $model->userid, $model->userid);
					echo ImageDisplayer::displayformFile($repo , $model->foto_vessel);
				}else{
					echo $DEF_FILE;
				}
			}else{
				echo $DEF_FILE;
			}	

			//$url = Yii::app()->createUrl("datadiri/uploadfoto");
			//echo '<a href="'.$url .'" class="various fancybox.ajax"><span class="menu_icon icon-edit"></span> Ubah Foto Profil</a>';
		?>
		</td>

		<td style="vertical-align:top;">
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
//'type' => 'striped bordered condensed',
'type' => 'striped  condensed',
'cssFile' => Yii::app()->baseUrl .'/css/left_label_detil_view.css',
'data'=>$model,
'attributes'=>array(
		
		'VesselName',
		
		'Status',
		'BargeSize',
		'VesselType',
		array(
            'name'=>'Capacity',
             'value'=>NumberAndCurrency::formatNumber($model->Capacity),
            ),
		//'VesselDate',
		//'RunningHour',
		//'LastDateMaintenance',
		//'LastRHMaintenance',
		//'inventoryid',
		'VesselChecklist',
	),
)); ?>

</td>
	</tr>
</table>

</div>

<?php
$data=array(
    array('label'=>'Document', 'url'=>array('vessel/view', 'id'=>$model->id_vessel)),
   array('label'=>'Crew', 'url'=>array('vessel/view2','id'=>$model->id_vessel)),
);
?>

<?php
     $this->widget('bootstrap.widgets.TbMenu', array(
        'type'=>'tabs', // '', 'tabs', 'pills' (or 'list')
        'stacked'=>false, // whether this is a stacked menu
        'items'=>$data,
        )); 
    ?>

<?php /*
    $modeldocument=new VesselDocumentInfo;
    $this->renderPartial('document_info',array(
    'model'=>$model,
    'modeldocument'=>$modeldocument,
)); */ ?>

<?php /*

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
    $('.search-form').toggle(300);
    return false;
});

$('.search-form form').submit(function(){

    $.fn.yiiListView.update('userlistview', { 
        data: $(this).serialize()
    });

    return false;
});
");

*/ ?>

<?php /* echo CHtml::link(Yii::t('strings','Document'),'#',array('class'=>'search-button btn btn-inverse btn-medium')); ?>
<div class="search-form" style="display:none">
<?php  
$modeldocument=new VesselDocumentInfo;
$this->renderPartial('document_info',array(
    'model'=>$model,
    'modeldocument'=>$modeldocument,

)); */ ?>
</div>

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

