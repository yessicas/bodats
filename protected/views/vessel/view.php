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
    array('label'=>'View Vessel', 'url'=>array('vessel/view', 'id'=>$model->id_vessel)),
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
		//'BargeSize',
		'VesselType',
		array('name'=>'Capacity','value'=>NumberAndCurrency::formatNumber($model->Capacity),'visible'=>$model->VesselType=='BARGE'),
		array('name'=>'Power','visible'=>$model->VesselType=='TUG'),
            
             
          
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


<h4 style="color:#1A354F;"> Manage Document Info</h4>
<hr>
<div class="tambah">
<?php      $this->widget('bootstrap.widgets.TbButton', array(      

                'label' =>Yii::t('strings','Add Document Info'),
                'icon'=>'plus white',
                'type' => 'danger',// '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                //'url'=>array('create'),   
                'url'=>array('vessel/documentcreate','id'=>$model->id_vessel),
                'htmlOptions' => array(
                                        'class'=>'various fancybox.ajax',
                                        ),
            
                )); 
?> 
</div>


<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'vessel-document-info-grid',
'type'=>'bordered',
'dataProvider'=>$modeldoc->searchbyvessel($model->id_vessel),
'filter'=>$modeldoc,
'columns'=>array(
 array(
        'header'=>'No',    'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
                ),
       // 'id_vessel_document_info',
  array(   
                'header'=>'Document Name',
                'name'=>'id_vessel_document_info',
                'value'=>'$data->idVesselDocument->VesselDocumentName',
                ),
       // 'id_vessel',
        'DateCreated',
        'ValidUntil',
        'PlaceCreated',
        //'IsPermanen',
        array(
                'header'=>'Permanen',
                'name'=>'IsPermanen',
               'value'=>'VesselDocumentInfo::model()->statusPermanen($data->IsPermanen)',
            ), 
        //'id_vessel_document',
        array('name'=>'Attachment', 

            'type'=>'raw',
            'filter'=>false,
            'value'=>function($data) {
            return ($data->Attachment == "") ? '<div id="Attachment" style="width:100px;">'.ImageDisplayer::displayDefaultFileforgrid("repository/vesseldocument/" , "defaultuser.jpg").'</div>' : '<div id="foto" style="width:100px;">'.ImageDisplayer::displaySmallFoto("repository/vesseldocument/" , $data->Attachment).'</div>' ;
            },
            ),
        /*
        'Check1',
        'Check2',
        'Check3',
        'Check4',
        'Check5',
        'Check6',
        'Status',
        'created_date',
        'created_user',
        'ip_user_updated',
        */
array(
 'class'=>'bootstrap.widgets.TbButtonColumn',
'buttons'=>array(
                'update'=>
                    array(
                        'url'=> 'Yii::app()->createUrl("VesselDocumentInfo/update",array("id"=>$data->id_vessel_document_info))',
                        'options'=>array(
                            'class'=>'various fancybox.ajax',
                            'rel'=>'',
                        ),
                    ),

                     'view'=>
                    array(

                        'url'=> 'Yii::app()->createUrl("VesselDocumentInfo/view",array("id"=>$data->id_vessel_document_info))',
                        'options'=>array(
                            'class'=>'various fancybox.ajax',
                            'rel'=>'',
                        ),
                    ),

                     'delete'=>
                    array(

                        'url'=> 'Yii::app()->createUrl("VesselDocumentInfo/delete",array("id"=>$data->id_vessel_document_info))',
                       
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
