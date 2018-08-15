<?php
/* @var $this ArticleController */
/* @var $model MemberArticle */

$this->breadcrumbs=array(
	'Artikel'=>array('allarticle'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List MemberArticle', 'url'=>array('index')),
	array('label'=>'Create MemberArticle', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#member-article-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<center>
<h3 class= "header"><img src="repository/icon/allartikelbig.png"> <?php echo Yii::t('strings','All Article') ?>
<span class="header-line"><img src="repository/icon/headline.png"></span>
</h3>
</center>
<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->


<script>
       function allFine(data) {
                // refresh your grid
                $.fn.yiiGridView.update('member-article-grid');
                 $("#results").html(data);
        }
</script>
<div id='results'></div>



<?php $box = $this->beginWidget(
    'bootstrap.widgets.TbBox',
    array(
        'title' => 'Data Artikel',
        'headerIcon' => 'icon-file',
		
        'htmlOptions' => array('class' => 'bootstrap-widget-table'),
   
    )
);?>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'member-article-grid',
	'type' => 'striped  condensed',
	'dataProvider'=>$model->allarticle(),
	'htmlOptions'=>array('style'=>'font-size:12px;'),
	'filter'=>$model,
	'columns'=>array(
		//'IDArticle',
		//'IDMember',
		 array('name'=>'foto', 'type'=>'raw',
		 	'filter'=>false,
            'value'=>function($data) {
            return ($data->foto == "") ? '<div id="foto" style="width:50px;">'.ImageDisplayer::displayDefaultFile(StaticPath::getArticlePath() , 'default-B.jpg').'</div>' : '<div id="foto" style="width:50px;">'.ImageDisplayer::displayDefaultFile(StaticPath::getArticlePath() , $data->foto).'</div>' ;
            },
            'htmlOptions'=>array('style'=>'width:40px;'),
            ),
		'Title',
		//'topic.ArticleTopic',
		 array(  
                'name'=>'ArticleTopic',
                 'header'=> Yii::t('strings','Article Topic'),
                //'value'=>'$data->topic->ArticleTopic',
                'value'=>function($data) {
			            return ($data->IDArticleTopic == 0) ? "-": $data->topic->ArticleTopic ;
			            },
                ),
		//'subtitle.SubtitleTopic',
		array(  
                'name'=>'SubtitleTopic',
                 'header'=> Yii::t('strings','Subtitle Topic'),
                'value'=>function($data) {
			            return ($data->IDSubtitle == 0) ? "-": $data->subtitle->SubtitleTopic ;
			            },
                ),
		//'TanggalWaktu',
		'TanggalUpdate',

		//user id diganti dengan authornya
		//'userid',
		array(
		'name'=>'author',
		'header'=>Yii::t('strings','Original Author'),
		'value'=>'$data->userid',
		//'filter'=> CHtml::activeTextField($model, 'author'),
		),



		//'user.fullname',
		/*
		array(  
                'name'=>'fullname',
                'value'=>'$data->user->fullname',
                ),
		*/
		//'isAprroved',
		array(
		'name' => 'isAprroved',
		'type' => 'raw',
		'value' => 'CHtml::encode($data->statusapproval())',
		'filter'=>array('0'=>'Draft', '1'=>'Published',  '2'=>'Rejected', '3'=>'Approved'),
		'filterHtmlOptions'=>array(
			'width'=>'115px'),
		),
		'Kontributor',
		'PublishedDateTime',
		/*
		 array(  
                'header'=>'',
                'type'=>'raw',
                'value'=>'CHtml::ajaxLink("Publish",array("editorial/publish","id"=>$data->IDArticle),
                				array("type"=>"post","success"=>"allFine"),
                				array("id"=>$data->IDArticle,"confirm" => "Anda Yakin Akan Publish Article ini?"))'
                ),
        */
		
		//'IDSubtitle',
		//'Content',
		//'UsingFormat',
		/*
		'IDArticleTopic',
		'IDSubject',
		'articlecode',
		'Tanggal',
		'TanggalWaktu',
		'TanggalUpdate',
		'DayDigit',
		'isDisplayWritter',
		'Kontributor',
		'isDisplayKontributor',
		'Editor',
		'isDisplayEditor',
		'isAprroved',
		'PublishedDate',
		'PublishedDateTime',
		'PublishedDateDayDigit',
		'SumberInformasi',
		'isDeleted',
		'isNotTopView',
		'isNotTopComment',
		'Point',
		'Rating',
		'Hit',
		'CommentHit',
		
		array(
			'class'=>'CButtonColumn',
		),
		*/
		
		array(
		'class'=>'bootstrap.widgets.TbButtonColumn',
		'buttons'=>array(
						'view' => array( 
		                     'url'=>'Yii::app()->createUrl("/editorial/view", array("id"=>$data->IDArticle,"c"=>$data->articlecode))',
		                    ),
		                 'update' => array( 
		                     'url'=>'Yii::app()->createUrl("/editorial/update", array("id"=>$data->IDArticle,"c"=>$data->articlecode))',
		                    ),
		                 'delete' => array(
		                  'url'=>'Yii::app()->createUrl("/editorial/delete", array("id"=>$data->IDArticle,"c"=>$data->articlecode))',
		                    ),
		                
		                ),
		'template'=>'{view}{update}{delete}'
		),

	),
)); ?>

<?php $this->endWidget(); ?>
