<style>
.notifdate
{
	font-size: 80%;
	margin-bottom:0px;
	margin-right:5px;
	color: #336699;
}

.notiftitle
{
	font-size: 14px;
	font-weight:bold;
	margin-bottom:0px;
	color: #ff0000;
}
</style>

<?php
$this->breadcrumbs=array(
	'Notifications'=>array('index'),
	$model->id_notification,
);
/*
$this->menu=array(
array('label'=>'List Notification','url'=>array('index')),
array('label'=>'Create Notification','url'=>array('create')),
array('label'=>'Update Notification','url'=>array('update','id'=>$model->id_notification)),
array('label'=>'Delete Notification','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_notification),'confirm'=>'Are you sure you want to delete this item?')),
//array('label'=>'Delete Notification','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_notification),'confirm'=>'Apakah anda yakin akan menghapus data ini?')),
array('label'=>'Manage Notification','url'=>array('admin')),
);
*/
?>


<?php
if(Yii::app()->user->hasFlash('success')):?>

<div class = "animated flash">
	<?php
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
<h3 class= "header"><img src="repository/icon/notifbig.png"> <?php echo Yii::t('strings','Notifications') ?>
<span class="header-line"><img src="repository/icon/headline.png"></span>
</h3>
</center>

<div id="content">
<h2>Detail Notification</h2>
<hr>
</div>
<div class="view">
	<p align ="left" class="notifdate">
	<?php echo Yii::app()->dateFormatter->formatDateTime($model->notif_date, 'medium'); ?>
	</p>
	<div class="notiftitle">
	<?php echo nl2br($model->notif_tittle); ?>
	</div>
</div>
<div class="view">
<?php echo nl2br($model->notif_message); ?>
</div>


<?php 
/*
$this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
//'type'=>'striped bordered condensed',
'attributes'=>array(
	//array('label'=>'Label','name'=>'attribute','value'=>'value'),
		'id_notification',
		'userid',
		'notif_date',
		'notif_message',
		'notif_tittle',
		'notif_status',
		'grade',
),
)); 
*/
?>
