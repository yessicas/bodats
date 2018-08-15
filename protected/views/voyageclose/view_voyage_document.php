
<?php 
$this->menu=array(
array('label'=>'Close Voyage Order','url'=>array('voyageorder/close_voyage')),
array('label'=>'Update Closed Voyage Document','url'=>array('voyageclose/create_voyage_document','id'=>$_GET['id'])),
array('label'=>'View Closed  Voyage Document','url'=>array('voyageclose/view_voyage_document','id'=>$_GET['id'])),
//array('label'=>'Running VO','url'=>array('voyageorder/running_vo')),
//array('label'=>'Finished VO','url'=>array('voyageorder/finished_vo')),
);
?>

<div id="content">
<h2>View Closed  Voyage Document</h2>
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

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'voyage-close-form-info',
)); ?>
<?php echo $this->renderPartial('../Cfile/voyage_info', array('modelvoyage'=>$modelvoyage)); ?>
<?php $this->endWidget(); ?>


<?php //echo $model->CloseVoyageNumber ?>

<div class="view">

<h4 style="color:#BD362F;">Uploaded Document</h4>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'mst-voyage-document-grid',
'type' => 'striped bordered condensed',
'dataProvider'=>$mstdoc->searchbyclosedvoyage(),
'summaryText'=>'',
'enableSorting'=>false,
//'filter'=>$mstdoc,
'columns'=>array(
 array(
        'header'=>'No',    'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
                  'htmlOptions'=>array('width'=>'10px')),
		//'IdVoyageDocument',
		'DocumentName',
		/*
         array(
                'header'=>'CLosed Voyage Documents',
                'name'=>'IsClosedVoyageDocument',
              //  'value'=>function($data) {
            //return ($data->Status == "1") ? "Used" : "Unused";
            //},

                //'value'=>'MstVoyageDocument::model()->isclosed($data->IsClosedVoyageDocument)',
            ),
		//'IsClosedVoyageDocument',
		*/
    /*
		array('header'=>'Upload','type'=>'raw',
			   'value'=>function($data,$row) use ($modelvoyage){
                return CHtml::link("Upload", Yii::app()->controller->createUrl("voyageclosedocument/createdocument",
                       array("id_voyage_order"=>$modelvoyage->id_voyage_order, "IdVoyageDocument"=>$data->IdVoyageDocument)),
                       array("class"=>"various fancybox.ajax"));
              },
              'htmlOptions'=>array('style'=>'text-align:center'),
              ),
     */
		array('header'=>'View','type'=>'raw',
			  'value'=>function($data,$row) use ($modelvoyage){
                return (VoyageCloseDB::Getviewvoyageclosedocument($modelvoyage->id_voyage_order,$data->IdVoyageDocument) == 1) ? CHtml::link("View", Yii::app()->request->baseUrl."/repository/voyage_close_document/".VoyageCloseDB::GetVoyageCloseDocumentName($modelvoyage->id_voyage_order,$data->IdVoyageDocument), array("target"=>"_blank")) : "-" ;
              },

			'htmlOptions'=>array('style'=>'text-align:center'),
			),

),
)); ?> 

</div>



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

