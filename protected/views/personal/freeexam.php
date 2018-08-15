<?php
$this->breadcrumbs=array(
	'Free Exam'=>array('freeexam'),
	'List Exam',
);

$this->menu=array(
array('label'=>'List Exam','url'=>array('index')),
array('label'=>'Create Exam','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('exam-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<center>
<h3 class= "header"><img src="repository/icon/exambig.png"> <?php echo Yii::t('strings','Select Available Exam') ?>
<span class="header-line"><img src="repository/icon/headline.png"></span>
</h3>
</center>

<!-- <div class="well">
<h4><img src="repository/icon/exambig.png"> <?php //echo Yii::t('strings','Select Available Exam');  ?> </h4>
<hr>

</div>
-->
<?php
if(Yii::app()->user->hasFlash('error')):?>

<div class = "animated flash">
    <?php
    $this->widget('bootstrap.widgets.TbAlert', array(
    'block' => true,
    'fade' => true,
    'closeText' => '&times;', // false equals no close link
    'alerts' => array( // configurations per alert type
        // success, info, warning, error or danger
        'error' => array('closeText' => '&times;'), 

    ),
    ));
    ?>
</div>

<?php endif; ?>


<?php
if(Yii::app()->user->hasFlash('info')):?>

<div class = "animated flash">
    <?php
    $this->widget('bootstrap.widgets.TbAlert', array(
    'block' => true,
    'fade' => true,
    'closeText' => '&times;', // false equals no close link
    'alerts' => array( // configurations per alert type
        // success, info, warning, error or danger
        'info' => array('closeText' => '&times;'), 

    ),
    ));
    ?>
</div>

<?php endif; ?>
<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
	<?php //$this->renderPartial('_search',array(
	//'model'=>$model,
//)); ?>
</div><!-- search-form -->



<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'exam-grid',
'dataProvider'=>$model->freeexam(),
'type' => 'striped bordered condensed', 
//'summaryText'=>'',
'enableSorting' => false,
//'htmlOptions'=>array('style'=>'font-size:12px;'),
//'afterAjaxUpdate' => 'reinstallDatePicker', 
//'filter'=>$model,
'columns'=>array(
		
        array(
        'header'=>'No',    'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
            ),
		//'id_exam',
		'exam_title',
        array(
            'header'=>'Take Exam',
            'type'=>'raw',
            'value'=>'CHtml::link("Take", Yii::app()->controller->createUrl("personal/viewexam",
                                                array("id"=>$data->id_exam)))',
        ),
        
        array(
            'header'=>'Previous Result',
            'type'=>'raw',
            //'value' => 'CHtml::encode($data->lastscore(Yii::app()->user->id)).CHtml::encode($data->lastexamdate(Yii::app()->user->id))',
            'value'=>function($data) {
            return ($data->lastscore(Yii::app()->user->id) == "-" && $data->lastexamdate(Yii::app()->user->id) =='0000-00-00' ) ? "-" : 
            CHtml::encode($data->lastscore(Yii::app()->user->id)).' on '.CHtml::encode(Yii::app()->dateFormatter->formatDateTime($data->lastexamdate(Yii::app()->user->id), 'long', false));
            },
        ),

		//'question_number',
		//'duration_second',
		//'is_time_limited',
        /*
        array(
        'name' => 'is_time_limited',
        'value' => 'CHtml::encode($data->limitedtime())',
        'filter'=>array('0'=>'NO', '1'=>'YES'),
        ),
        'number_try',
        'validation_expired',
        'next_try_expired', 
        'number_participant',
        */
/*      
array(
'class'=>'bootstrap.widgets.TbButtonColumn',

'header'=>'',	
'htmlOptions'=>array('width'=>'50px', 'style'=>'text-align: center'),
'template'=>'{update}{delete}',
'buttons'=>array(
                'update'=>
                    array(
                    	'url'=> 'Yii::app()->createUrl("exam/update",array("id"=>$data->id_exam))',
						//'visible' => 'Yii::app()->user->hak_akses=="1"',
						//'visible'=>'($data->userid_created == Yii::app()->user->id && $data->number_comment ==0  )',
						//'imageUrl'=>Yii::app()->theme->baseUrl.'/css/print.jpg',
                        'options'=>array(
                            'class'=>'various fancybox.ajax',
                            'rel'=>'',
                        ),
                    ),
                    
                  'view'=>
                    array(
						
						'url'=> 'Yii::app()->createUrl("controler/action",array("id"=>$data->attribute))',
                    	'options'=>array(
                            'class'=>'',
                            'rel'=>'',
                        ),
                    ),
                     

                    'delete'=>
                    array(
                    	'url'=> 'Yii::app()->createUrl("exam/delete",array("id"=>$data->id_exam))',
						
                    ),
                ),

				
				

),
*/
),
)); 


/*
Yii::app()->clientScript->registerScript('re-install-date-picker', "
function reinstallDatePicker(id, data) {
    $('#datepicker_for_due_date').datepicker();
}
");
*/

?>


<h4 class= "header"> <?php echo Yii::t('strings','Your Prevoius Exam Result') ?>
<span class="header-line"></span>
</h4>



<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'exam-grid',
'dataProvider'=>$model->hasexam(Yii::app()->user->id),
'type' => 'striped bordered condensed', 
'summaryText'=>'',
'enableSorting' => false,
//'htmlOptions'=>array('style'=>'font-size:12px;'),
//'afterAjaxUpdate' => 'reinstallDatePicker', 
//'filter'=>$modelhasexam,
'columns'=>array(
        
        array(
        'header'=>'No',    'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
            ),
        //'id_exam',
        'exam_title',
        array(
            'header'=>'Result',
            'type'=>'raw',
            'value' => 'CHtml::encode($data->lastscore(Yii::app()->user->id))',
           // 'visible' =>CHtml::encode('$data->hasexam(Yii::app()->user->id)'),
        ),

        array(
            'header'=>'Last Exam',
            'type'=>'raw',
            'value' => 'CHtml::encode(CHtml::encode(Yii::app()->dateFormatter->formatDateTime($data->lastexamdate(Yii::app()->user->id), "long", false)))',
        ),

         array(
            'header'=>'Valid Until',
            'type'=>'raw',
            //'value' => 'CHtml::encode($data->validationexam(Yii::app()->user->id))',
            'value' => 'CHtml::encode(CHtml::encode(Yii::app()->dateFormatter->formatDateTime($data->validationexam(Yii::app()->user->id), "long", false)))',
        ),
  
),
)); 




?>

<?php
$this->widget('application.extensions.fancybox.EFancyBox', array(
    'target'=>'.popup_foto',
    'config'=>array(
        'maxWidth'    => 800,
        'maxHeight'   => 600,
        'fitToView'   => false,
        'width'       => 'auto',
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
        'width'       => '400',
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

