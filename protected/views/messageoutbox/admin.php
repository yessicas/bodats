<?php
$this->breadcrumbs=array(
	'Message'=>array('sentmail'),
    'Message Outbox',
);

$this->menu=array(
array('label'=>'Create Message','url'=>array('messageoutbox/create')),
array('label'=>'Manage Message Outbox','url'=>array('messageoutbox/admin')),
array('label'=>'Manage Message Inbox','url'=>array('messageinbox/admin')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('message-outbox-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<center>
<h3 class= "header"><img src="repository/icon/outboxbig.png"> <?php echo Yii::t('strings','Outbox Message') ?>
<span class="header-line"><img src="repository/icon/headline.png"></span>
</h3>
</center>

<!-- <div class="well">
<h4><img src="repository/icon/outboxbig.png"> <?php //echo Yii::t('strings','Outbox Message') ?> </h4>
</div>
-->

<?php /*$box = $this->beginWidget(
    'bootstrap.widgets.TbBox',
    array(
        'title' =>Yii::t('strings','Outbox Message'),
        'headerIcon' => 'icon-envelope',
        'htmlOptions' => array('class' => 'bootstrap-widget-table'),
         'headerButtons' => array(
              
        )
   
    )
); */?>


<?php 
$userid=Yii::app()->user->id;
$this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'message-outbox-grid',
	'type' => 'striped bordered condensed',
	'dataProvider'=>$model->search($userid),
	//'filter'=>$model,
	'summaryText'=>'',
	'columns'=>array(
		//'id_outbox',
		//'to_outbox',
		array(
		'name'=>'to_outbox',
		'value'=>'$data->touser->full_name." (".$data->to_outbox.")" ',
		'htmlOptions'=>array(
			'style'=>'text-align:center')
				),
		//'from_outbox',
        //'title',
		array(
        'name'=>'message', 
        'type'  => 'raw',
       'value'=>'Chtml::link($data->title,array("messageoutbox/view","id"=>$data->id_outbox,"c"=>SecurityGenerator::SecurityDisplay($data->code_id)))',
       'htmlOptions'=>array(
			'style'=>'text-align:center')
				),
		/*
		array(
        'name'=>'message', 
        'type'  => 'raw',
       'value'=>'Chtml::link(Yii::t("strings","Open Message"),array("messageoutbox/view","id"=>$data->id_outbox,"c"=>SecurityGenerator::SecurityDisplay($data->code_id)))',
        ),
		*/
		//'message',
		//'date',
         array(
            'name'=>'date',
            'value'=>'Yii::app()->dateFormatter->formatDateTime($data->date, "medium")',
            'htmlOptions'=>array(
			'style'=>'text-align:center')
				),
		//'status',
		
		array(
		'class'=>'bootstrap.widgets.TbButtonColumn',
		
		'template'=>'{delete}',
		'buttons'=>array(
						 'delete' => array(
						  'url'=>'Yii::app()->createUrl("/messageoutbox/delete", array("id"=>$data->id_outbox,"c"=> SecurityGenerator::SecurityDisplay($data->code_id)))',
							),
						
						),

		),
	),
)); ?>

<?php //$this->endWidget(); ?>