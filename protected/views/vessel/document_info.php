

<?php
$data=array(
    array('label'=>'Document', 'url'=>array('vessel/document_info')),
    array('label'=>'Crew', 'url'=>array('crew/admin')),
);
?>


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
'dataProvider'=>$modeldocument->searchbyvessel($model->id_vessel),
//'filter'=>$model,
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

