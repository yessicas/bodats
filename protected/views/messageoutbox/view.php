<?php
$this->breadcrumbs=array(
	'Message Outbox'=>array('admin'),
	$model->title,
);

$this->menu=array(
//array('label'=>'List MessageOutbox','url'=>array('index')),
array('label'=>'Create New Message','url'=>array('create')),
array('label'=>'Manage Message Outbox','url'=>array('admin')),
array('label'=>'View Message Outbox','url'=>Yii::app()->request->url,'active'=>true),
//array('label'=>'Delete MessageOutbox','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_outbox),'confirm'=>'Are you sure you want to delete this item?')),

);
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

<!--<h3> Pesan yang Dikirim Kepada : <?php echo $model->to_outbox; ?> </p></h3></font>-->
<center>
<h3 class= "header"><img src="repository/icon/outboxbig.png"> <?php echo Yii::t('strings','Messages that have been sent to') ?> : <i><?php echo $model->touser->full_name." (".$model->to_outbox.")"; ?> </i>
<span class="header-line"><img src="repository/icon/headline.png"></span>
</h3>
</center>

<!--<div class="well">
<h4><?php //echo Yii::t('strings','Messages that have been sent to') ?> <?php echo $model->to_outbox; ?></h4>
</div>
-->

<?php /* $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		//'id_outbox',
		
		'from_outbox',
		'to_outbox',
		'title',
		'message',
		'date',
		'status',
),
)); */ ?>

<div class="view">
<table>
	<tr>
	<td style="width:10%;"> <b> <?php echo Yii::t('strings','Title') ?>   </b> </td>
	<td style="width:2%;">:</td>
	<td><?php echo $model->title; ?></td>
	</tr> 

	<tr>
	<td><b> <?php echo Yii::t('strings','Date') ?>  </b> </td>
	<td>:</td>
	<td><?php echo Yii::app()->dateFormatter->formatDateTime($model->date, "medium") ?> </td>
	</tr>
</table>

<p align = "left" style="margin-left:10px;"> <b> <?php echo Yii::t('strings','Message') ?>  </b> <br>
<p align = "left" style="margin-left:10px;"> <?php echo $model->message; ?> </p> <br>

<?php $users=Yii::app()->user->id; ?>

</div>
