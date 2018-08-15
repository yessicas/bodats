<?php
$this->breadcrumbs=array(
	'Forum Comment'=>array('admin'),
	'Manage',
);

$this->menu=array(
array('label'=>'List ForumComment','url'=>array('index')),
array('label'=>'Create ForumComment','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('forum-comment-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<center>
<h3 class= "header"><img src="repository/icon/commentbig.png"> <?php echo Yii::t('strings','Manage Forum Comment') ?>
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
        'title' =>Yii::t('strings','List Comment'),
        'headerIcon' => 'icon-list-alt',
        'htmlOptions' => array('class' => 'bootstrap-widget-table'),
         'headerButtons' => array(

           
        )
   
    )
);?>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'forum-comment-grid',
'type' => 'striped condensed',
//'template'=>"{pager}\n{items}\n{pager}",
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		//'id_forum_comment',
		array(
        'header'=>'No',    'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
            ),
		//'id_forum_topic',
		array(  
                'name'=>'judul_topic',
                'header'=>'Judul Topic ',
                'value'=>'$data->ForumTopic->judul_topic',
                 ),
		'comment',
		'userid',
		'update_date',
		'ip_address',
array(
'class'=>'bootstrap.widgets.TbButtonColumn',
'template'=>'{delete}',
'buttons'=>array(
                    'delete'=>
                    array(

                        'url'=> 'Yii::app()->createUrl("forumcomment/delete",array("id"=>$data->id_forum_comment))',
                        
                    ),
                ),
),
),
)); ?>

<?php $this->endWidget(); ?>
