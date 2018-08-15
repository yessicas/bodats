<?php
$this->breadcrumbs=array(
	'Message Inbox'=>array('admin'),
	$model->title,
);
/*
$this->menu=array(
array('label'=>'List MessageInbox','url'=>array('index')),
array('label'=>'Create MessageInbox','url'=>array('create')),
array('label'=>'Update MessageInbox','url'=>array('update','id'=>$model->id_inbox)),
array('label'=>'Delete MessageInbox','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_inbox),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage MessageInbox','url'=>array('admin')),
); */
?>

<!--<h3>Pesan Dari <?php echo $model->from_inbox; ?></h3>-->

<center>
<h3 class= "header"><img src="repository/icon/inboxbig.png"> <?php echo Yii::t('strings','Messages From') ?> : <i><?php echo $model->fromuser->full_name." (".$model->from_inbox.")"; ?> </i>
<span class="header-line"><img src="repository/icon/headline.png"></span>
</h3>
</center>

<!--<div class="well">
<h4>Pesan Dari <?php echo $model->from_inbox; ?></h4>
</div>
-->

<?php /* $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		//'id_inbox',
		//'to',
		'from',
		'title',
		'message',
		'date',
		//'status',
),
)); */ ?>

<div class="view">
<table>
	<tr>
	<td style="width:10%;"> <b> <?php echo Yii::t('strings','Title') ?>  </b> </td>
	<td style="width:2%;">:</td>
	<td><?php echo $model->title; ?></td>
	</tr> 

	<tr>
	<td><b> <?php echo Yii::t('strings','Date') ?>  </b> </td>
	<td>:</td>
	<td><?php echo Yii::app()->dateFormatter->formatDateTime($model->date, "medium") ?> </td>
	</tr>
</table>

<p align = "left" style="margin-left:10px;" > <b> <?php echo Yii::t('strings','Message') ?>  </b> <br>
<p align = "left" style="margin-left:10px;"> <?php echo $model->message; ?> </p> <br>

<?php $users=Yii::app()->user->id; ?>

<p align = "right"> <b> <?php echo CHtml::link(Yii::t('strings','Reply'),array("messageoutbox/create2","from_inbox"=>$model->from_inbox,"title"=>$model->title)); ?> </b>
</div>
