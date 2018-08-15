<?php
$this->breadcrumbs=array(
	'Good Receives'=>array('index'),
	'Create',
);

	$this->menu=array(
	array('label'=>'Cons.Stock Good Receive & Good Issue','url'=>array('goodReceive/admingrcs')),
	array('label'=>'Cons.Stock Good Receive - Detail','url'=>array('goodReceive/grcs/id/'.$id_purchase_order_detail)),
	array('label'=>'Update Detail Cons.Stock GR','url'=>array('goodReceive/creategrcs/id/'.$id_purchase_order_detail), 'active'=>true),
	);
?>

<div id="content">
<h2>Update Cons.Stock Good Receive (GR)</h2>
<hr>
</div>

<?php echo $this->renderPartial('_view_po_detail', array('id_purchase_order_detail'=>$id_purchase_order_detail)); ?>

<?php if(Yii::app()->user->hasFlash('error')):?>
<div class = "animated flash">
	<?php
    $this->widget('bootstrap.widgets.TbAlert', array(
    'block' => true,
    'fade' => true,
    'closeText' => '&times;', // false equals no close link
    'alerts' => array( // configurations per alert type
        // success, info, warning, error or danger
        'error' => array('closeText' => '&times;'), 

    ),
));
    ?>
</div>
<?php endif; ?>

<?php echo $this->renderPartial('_formgrcs', array('model'=>$model, 'id_purchase_order_detail'=>$id_purchase_order_detail)); ?>