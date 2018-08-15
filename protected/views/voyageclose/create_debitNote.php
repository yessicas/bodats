
<?php 
$this->menu=array(
array('label'=>'Close Voyage Order','url'=>array('voyageorder/close_voyage')),
array('label'=>' Debit Note ','url'=>array('voyageclose/listDN','id'=>$_GET['id'])),
//array('label'=>'Running VO','url'=>array('voyageorder/running_vo')),
//array('label'=>'Finished VO','url'=>array('voyageorder/finished_vo')),
);
?>

<div id="content">
<h2>Closed  Voyage Debit Note</h2>
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

<h4 style="color:#BD362F;">Debit Note</h4>
<br>

<div>
<?php      
              if(!isset($_GET['mode'])){
                $view=true;
                $this->widget('bootstrap.widgets.TbButton', array(      

                  'label' =>Yii::t('strings','Add Data'),
                  'icon'=>'plus white',
                  'type' => 'danger',// '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                  //'url'=>array('create'),   
                  'url'=>array('debitNote/createDN','id'=>$modelvoyage->id_voyage_order),
                  'htmlOptions' => array(
                                          //'class'=>'various fancybox.ajax',
                                          ),
              
                  )); 
            }else{
                $view=false;
            }
?> 
</div>


<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'debit-note-grid',
'dataProvider'=>$modelDN->searchbyvoyage($modelvoyage->id_voyage_order),
'type' => 'striped bordered condensed',
'summaryText'=>'',
'enableSorting'=>false,
//'filter'=>$$modelDN,
'columns'=>array(
    //'id_debit_note',
    //'id_voyage_order',
     array(
        'header'=>'No',    'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
            ),
     array(
            'name'=>'transaction_date',
            'value'=>'Yii::app()->dateFormatter->formatDateTime($data->transaction_date, "medium","")',
            ),
    //'transaction_date',
    'MstDebitNoteCategory.debit_note_category',
    'description',
    array(
        'name'=>'amount',
        
       // 'value'=>'NumberAndCurrency::formatCurrency($data->Currency->currency.". ".$data->amount)',
        'value'=>'$data->Currency->currency.". ".NumberAndCurrency::formatCurrency($data->amount)',
        'htmlOptions'=>array(
        'style'=>'text-align:right')
      ),
    'omitted_status',

    /*
    'created_date',
    'created_user',
    'ip_user_updated',
    */

    array(
           'header'=>'',
           'type'=>'raw',
           'visible'=>$view,
           'value'=>'CHtml::link("PROCEED",
          array("debitNote/prosess","id"=>$data->id_debit_note,"someProsess"=>"PROCEED"),
          array("class" => "proceed")
          )." | ".
          CHtml::link("OMIT",
          array("debitNote/prosess","id"=>$data->id_debit_note,"someProsess"=>"OMIT"),
           array("class"=>"omit")
          )

        ',
         ),


array(
'class'=>'bootstrap.widgets.TbButtonColumn',
'template'=>'{update}{delete}',
'visible'=>$view,
'buttons'=>array(
                'update'=>
                    array(
                        'url'=> 'Yii::app()->createUrl("debitNote/updateDN",array("id"=>$data->id_debit_note))',
                        'options'=>array(
                            // 'class'=>'various fancybox.ajax',
                            'rel'=>'',
                        ),
                    ),


                     'delete'=>
                    array(

                        'url'=> 'Yii::app()->createUrl("debitNote/delete",array("id"=>$data->id_debit_note))', 
                    ),
                    ),
),
),
)); ?>

</div>


<script type="text/javascript">
/*<![CDATA[*/
jQuery(function($) {

$(".proceed").click(function(){
    if(confirm("Are you sure you want to PROCEED this ?")){
        $(".reject").attr(jQuery(this).attr('href'));
    }
    else{
        return false;
    }
});

$(".omit").click(function(){
    if(confirm("Are you sure you want to OMIT this ?")){
        $(".reject").attr(jQuery(this).attr('href'));
    }
    else{
        return false;
    }
});

});

</script>



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

