<?php
$this->breadcrumbs=array(
	'Forum Topic'=>array('hottopic'),
	'Hot Topik',
);

$this->menu=array(
array('label'=>'List ForumTopic','url'=>array('index')),
array('label'=>'Create ForumTopic','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('forum-topic-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<center>
<h3 class= "header"><img src="repository/icon/firebig.png"> <?php echo Yii::t('strings','Hot Topic') ?>
<span class="header-line"><img src="repository/icon/headline.png"></span>
</h3>
</center>

<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $box = $this->beginWidget(
    'bootstrap.widgets.TbBox',
    array(
        'title' => Yii::t('strings','Topic'),
        'headerIcon' => 'icon-list-alt',
        'htmlOptions' => array('class' => 'bootstrap-widget-table'),
   
    )
);?>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'forum-topic-grid',
'summaryText'=>'',
'type' => 'striped condensed',
'dataProvider'=>$model->searchhottopic(),
//'filter'=>$model,
'columns'=>array(
		//'id_forum_topic',
		//'id_forum_category',
		array(
        'header'=>'No',    'value'=>'$this->grid->dataProvider->pagination->currentPage*$this->grid->dataProvider->pagination->pageSize + $row+1',
            ),
         /*
          array( 
        'header' => 'Tanggal',
        'name'=>'created_date',
        'value' => '$data->created_date',
        ),
        */
        //'created_date',
		//'judul_topic',
		array(    
                'name'=>'judul_topic',
                'type'=>'raw',
                'value'=>'CHtml::link($data->judul_topic, Yii::app()->controller->createUrl("forumtopic/view",
                                                array("id"=>$data->id_forum_topic,"c"=>SecurityGenerator::SecurityDisplay($data->code_id) )))'
                ),
		//'ForumCategory.forum_category',
		array(	
                'name'=>'forum_category',
                'header'=> Yii::t('strings','Forum Category'),
                'value'=>'$data->ForumCategory->forum_category',
                //'type'=>'raw',
        		/*'value'=>'CHtml::link($data->Mobil->nama_mobil, Yii::app()->controller->createUrl("mobil/view",
                                                array("id"=>$data->id_mobil)))'*/
                ),
        'viewed',
		'number_comment',
		//'last_commented',
		array('name'=>'last_commented', 'type'=>'raw',
            'value'=>function($data) {
            return ($data->last_commented == "0000-00-00 00:00:00") ? "-" : Yii::app()->dateFormatter->formatDateTime($data->last_commented, 'medium')." by ".CHtml::encode($data->userlastcomment($data->last_commented,$data->id_forum_topic));
            },
            ),
		//'deskripsi',
		//'status',
		//'userid_created',
		/*
		'created_date',
		'ip_addr_created',
		'number_comment',
		'last_commented',
		*/
),
)); ?>

<?php $this->endWidget(); ?>
