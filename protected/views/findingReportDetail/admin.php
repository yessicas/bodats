<?php
$this->breadcrumbs=array(
	'Finding Report Details'=>array('index'),
	'Manage',
);

$this->menu=array(

array('label'=>'Manage FindingReportDetail','url'=>array('admin')),
array('label'=>'Create FindingReportDetail','url'=>array('create')),

);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('finding-report-detail-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<div id="content">
<h2>Manage Finding Report Details</h2>
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
'id'=>'finding-report-detail-grid',
'type' => 'striped bordered condensed',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
 array(
        'header'=>'No',    'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
                ),
		//'id_finding_report_detail',
		'id_finding_report',
		//'TrInventoryTreeId',
       /* array(   
                'name'=>'id_part',
                'value'=>'$data->idPart->PartName',
                ), */
		'ProblemIdentification',
		'Location',
		//'ImageLink',
		'PIC',
		'CorrectiveAction',
        array(   
                'header'=>'Due Date',
                'name'=>'DueDate',
                'value'=>'Yii::app()->dateFormatter->formatDateTime($data->DueDate, "medium","")',
                ),
	//	'DueDate',
		//'Status',
		'PreventiveAction',
		/*'created_date',
		'created_user',
		'ip_user_updated',
		*/
         array('name'=>'Image', 'type'=>'raw',
            'filter'=>false,
            'value'=>function($data) {
            return ($data->ImageLink == "") ? '<div id="foto" style="width:100px;">'.ImageDisplayer::displayDefaultFileforgrid("repository/imagelink/" , "defaultuser.jpg").'</div>' : '<div id="foto" style="width:100px;">'.ImageDisplayer::displaySmallFoto("repository/imagelink/" , $data->ImageLink).'</div>' ;
            },
            ),
array(
 'class'=>'bootstrap.widgets.TbButtonColumn',
'buttons'=>array(
                'update'=>
                    array(
                        'url'=> 'Yii::app()->createUrl("findingreportdetail/update",array("id"=>$data->id_finding_report_detail))',
                        'options'=>array(
                            'class'=>'',
                            'rel'=>'',
                        ),
                    ),

                     'view'=>
                    array(

                        'url'=> 'Yii::app()->createUrl("findingreportdetail/view",array("id"=>$data->id_finding_report_detail))',
                        'options'=>array(
                            'class'=>'',
                            'rel'=>'',
                        ),
                    ),

                     'delete'=>
                    array(

                        'url'=> 'Yii::app()->createUrl("findingreportdetail/delete",array("id"=>$data->id_finding_report_detail))',
                       
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

