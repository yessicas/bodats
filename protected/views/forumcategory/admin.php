<?php
$this->breadcrumbs=array(
	'Forum Categories'=>array('admin'),
	'Manage',
);

$this->menu=array(
array('label'=>'List ForumCategory','url'=>array('index')),
array('label'=>'Create ForumCategory','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('forum-category-grid', {
data: $(this).serialize()
});
return false;
});
");
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


<center>
<h3 class= "header"><img src="repository/icon/thumbbig.png"> <?php echo Yii::t('strings','Manage Forum Category') ?>
<span class="header-line"><img src="repository/icon/headline.png"></span>
</h3>
</center>


<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
	<?php //$this->renderPartial('_search',array(
	//'model'=>$model,
//)); ?>
</div><!-- search-form -->

<?php $box = $this->beginWidget(
    'bootstrap.widgets.TbBox',
    array(
        'title' =>Yii::t('strings','List Category'),
        'headerIcon' => 'icon-list-alt',
        'htmlOptions' => array('class' => 'bootstrap-widget-table'),
         'headerButtons' => array(

            array(
                'label' =>Yii::t('strings','Add Category'),
                'class' => 'bootstrap.widgets.TbButton',
                'icon'=>'plus white',
                'type' => 'primary',// '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                //'url'=>array('create'),   
                'url'=>array('forumcategory/create'),              
                 'htmlOptions' => array(
                                        'class'=>'various fancybox.ajax'
                                        ),
                ),
           
        )
   
    )
);?>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'forum-category-grid',
'type' => 'striped condensed',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id_forum_category',
		'forum_category',
array(
'class'=>'bootstrap.widgets.TbButtonColumn',
'buttons'=>array(
                'update'=>
                    array(
                    
                        'url'=> 'Yii::app()->createUrl("forumcategory/update",array("id"=>$data->id_forum_category))',
                        'options'=>array(
                            'class'=>'various fancybox.ajax',
                            'rel'=>'',
                        ),
                    ),
                  'view'=>
                    array(

                        'url'=> 'Yii::app()->createUrl("forumcategory/view",array("id"=>$data->id_forum_category))',
                        'options'=>array(
                            'class'=>'various fancybox.ajax',
                            'rel'=>'',
                        ),
                    ),

                    'delete'=>
                    array(

                        'url'=> 'Yii::app()->createUrl("forumcategory/delete",array("id"=>$data->id_forum_category))',
                        
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

