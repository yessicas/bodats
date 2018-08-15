<style>
tr.highlight
{
background: #EAEFFF;
font-weight:bold;
}
tr.white
{
background: #FFFFFF;
}
</style>
<?php
$this->breadcrumbs=array(
	'Message'=>array('admin'),
	'Message inbox',
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
$.fn.yiiGridView.update('message-inbox-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<center>
<h3 class= "header"><img src="repository/icon/inboxbig.png"> <?php echo Yii::t('strings','Inbox Message') ?>
<span class="header-line"><img src="repository/icon/headline.png"></span>
</h3>
</center>


<!-- <div class="well">
<h4><img src="repository/icon/inboxbig.png"> <?php //echo Yii::t('strings','Inbox Message') ?> </h4>
</div>
-->

<?php /*$box = $this->beginWidget(
    'bootstrap.widgets.TbBox',
    array(
        'title' =>Yii::t('strings','Inbox Message'),
        'headerIcon' => '<img src="repository/icon/messagebig.png">',
        'htmlOptions' => array('class' => 'bootstrap-widget-table'),
         'headerButtons' => array(
              
        )
    )
); */?>


<?php 
$userid=Yii::app()->user->id;
$this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'message-inbox-grid',
	'summaryText'=>'',
	'type' => 'striped bordered condensed',
	'dataProvider'=>$model->search($userid),
	'rowCssClassExpression' => '$data->cssReason()', 
	//'filter'=>$model,
	'columns'=>array(
		//'id_inbox',
		//'to_inbox',
		//'from_inbox',
		array(
		'name'=>'from_inbox',
		'value'=>'$data->fromuser->full_name." (".$data->from_inbox.")" ',
		'htmlOptions'=>array(
			'style'=>'text-align:center')
				),
		//'title',
		array(
        'name'=>'message',
  
        'type'  => 'raw',
       'value'=>'Chtml::link($data->title,array("messageinbox/view","id"=>$data->id_inbox,"c"=>SecurityGenerator::SecurityDisplay($data->code_id)))',
     
        'htmlOptions'=>array(
			'style'=>'text-align:center')
        ),
				

		/*
		array(
        'name'=>'message', 
        'type'  => 'raw',
       'value'=>'Chtml::link(Yii::t("strings","Open Message"),array("messageinbox/view","id"=>$data->id_inbox,"c"=>SecurityGenerator::SecurityDisplay($data->code_id)))',
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
			'url'=>'Yii::app()->createUrl("/messageinbox/delete", array("id"=>$data->id_inbox,"c"=> SecurityGenerator::SecurityDisplay($data->code_id)))',
			),

		),
	),
),
)); ?>
<?php //$this->endWidget(); ?>