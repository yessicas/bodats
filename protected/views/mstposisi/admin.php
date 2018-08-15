<?php
$this->breadcrumbs=array(
	'Mst Posisis'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List MstPosisi','url'=>array('index')),
array('label'=>'Create MstPosisi','url'=>array('create')),
);


if(Yii::app()->user->hasFlash('success')):?>
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
<h3 class= "header"><img src="repository/icon/posisibig.png"> <?php echo Yii::t('strings','Manage Data Position') ?>
<span class="header-line"><img src="repository/icon/headline.png"></span>
</h3>
</center>

<?php

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('country-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<?php $box = $this->beginWidget(
    'bootstrap.widgets.TbBox',
    array(
        'title' => Yii::t('strings','List Position'),
        'headerIcon' => 'icon-list-alt',
        'htmlOptions' => array('class' => 'bootstrap-widget-table'),
         'headerButtons' => array(

            array(
                'label' => Yii::t('strings','Add Position'),
                'class' => 'bootstrap.widgets.TbButton',
                'icon'=>'plus white',
                'type' => 'primary',// '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                //'url'=>array('create'),   
                'url'=>array('mstposisi/create','id_posisi'=>$model->id_posisi),
                'htmlOptions' => array(
                                        'class'=>'various fancybox.ajax'
                                        ),
               
                ),
           
        )
   
    )
);?>


<?php /*echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form --> */ ?>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'mst-posisi-grid',
'type' => 'striped bordered condensed',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id_posisi',
		'nama_posisi',
		'userid',
		'time_update',
array(
'class'=>'bootstrap.widgets.TbButtonColumn',
'buttons'=>array(
                'update'=>
                    array(
                    
                        'url'=> 'Yii::app()->createUrl("mstposisi/update",array("id"=>$data->id_posisi))',
                        'options'=>array(
                            'class'=>'various fancybox.ajax',
                            'rel'=>'',
                        ),
                    ),
                  'view'=>
                    array(

                        'url'=> 'Yii::app()->createUrl("mstposisi/view",array("id"=>$data->id_posisi))',
                        'options'=>array(
                            'class'=>'various fancybox.ajax',
                            'rel'=>'',
                        ),
                    ),

                    'delete'=>
                    array(

                        'url'=> 'Yii::app()->createUrl("mstposisi/delete",array("id"=>$data->id_posisi))',
                        
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

