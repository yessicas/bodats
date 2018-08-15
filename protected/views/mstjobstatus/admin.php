<?php
$this->breadcrumbs=array(
	'Mst Job Statuses'=>array(''),
	'Manage',
);

$this->menu=array(
array('label'=>'List MstJobStatus','url'=>array('mstjobstatus/index')),
array('label'=>'Create MstJobStatus','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('cv-edu-history-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<?php
/*

<h1>Manage Cv Edu Histories</h1>

<p>
	You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
		&lt;&gt;</b>
	or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
*/ ?>

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

<center>
<h3 class= "header"><img src="repository/icon/dasibig.png"> <?php echo Yii::t('strings','Manage Job Status') ?>
<span class="header-line"><img src="repository/icon/headline.png"></span>
</h3>
</center>

<?php $box = $this->beginWidget(
    'bootstrap.widgets.TbBox',
    array(
        'title' =>Yii::t('strings','List Job Status'),
        'headerIcon' => 'icon-list-alt',
        'htmlOptions' => array('class' => 'bootstrap-widget-table'),
         'headerButtons' => array(

            array(
                'label' => Yii::t('strings','Add Job Status'),
                'class' => 'bootstrap.widgets.TbButton',
                'icon'=>'plus white',
                'type' => 'primary',// '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                //'url'=>array('create'),   
                'url'=>array('mstjobstatus/create','id_mst_job_status'=>$model->id_mst_job_status),
                'htmlOptions' => array(
                                        'class'=>'various fancybox.ajax'
                                        ),
                
                
                ),
           
        )
   
    )
);?>


<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'mst-job-status-grid',
'type' => 'striped bordered condensed',
'summaryText'=>'',
'enableSorting' => false,
'dataProvider'=>$model->search(),
//'filter'=>$modelcv,
'columns'=>array(
      
        //'id_data_diri',
         array(
        'header'=>'No',    'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
                ),
    'id_mst_job_status',
    'status',
        'keterangan',
        'is_active',
    array(
'class'=>'bootstrap.widgets.TbButtonColumn',
'buttons'=>array(
               'update'=>
                    array(
                        'url'=> 'Yii::app()->createUrl("mstjobstatus/update",array("id"=>$data->id_mst_job_status))',
                        'options'=>array(
                            'class'=>'various fancybox.ajax',
                            'rel'=>'',
                        ),
                    ),

                     'view'=>
                    array(

                        'url'=> 'Yii::app()->createUrl("mstjobstatus/view",array("id"=>$data->id_mst_job_status))',
                        'options'=>array(
                            'class'=>'various fancybox.ajax',
                            'rel'=>'',
                        ),
                    ),

                     'delete'=>
                    array(

                        'url'=> 'Yii::app()->createUrl("mstjobstatus/delete",array("id"=>$data->id_mst_job_status))',
                       
                    ),
                    ),
),
),
)); ?>

<?php $this->endWidget(); ?>

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

