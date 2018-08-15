<?php
$this->breadcrumbs=array(
	'Friend Invitations'=>array('index'),
	$model->id_invitation,
);

$this->menu=array(
array('label'=>'List FriendInvitation','url'=>array('index')),
array('label'=>'Create FriendInvitation','url'=>array('create')),
array('label'=>'Update FriendInvitation','url'=>array('update','id'=>$model->id_invitation)),
array('label'=>'Delete FriendInvitation','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_invitation),'confirm'=>'Are you sure you want to delete this item?')),
//array('label'=>'Delete FriendInvitation','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_invitation),'confirm'=>'Apakah anda yakin akan menghapus data ini?')),
array('label'=>'Manage FriendInvitation','url'=>array('admin')),
);
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
<div class="well">
<h4>View FriendInvitation  <?php echo $model->id_invitation; ?></h4>
<hr>
</div>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
//'type'=>'striped bordered condensed',
'attributes'=>array(
	//array('label'=>'Label','name'=>'attribute','value'=>'value'),
	/*
	array(
		'name' => 'hak_akses',
		'type' => 'raw',
		'value' => CHtml::encode($model->ubahAkses()),
		),
	*/
		'id_invitation',
		'invitation_date',
		'is_user',
		'email_target',
		'userid_target',
		'status',
		'userid_sender',
		'ipaddress_sender',
),
)); ?>
