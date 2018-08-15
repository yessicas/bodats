<?php
$this->breadcrumbs=array(
	'Sos'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Manage SO ','url'=>array('so/admin')),
array('label'=>'Create SO','url'=>array('so/searchquo')),
array('label'=>'Create SO Without Quotation','url'=>array('soquo/quocreate')),
array('label'=>'Manage TC ','url'=>array('sooffhiredorder/admin')),
array('label'=>'Create TC','url'=>array('sooffhiredorder/create')),
);
?>
<div id="content">
<h2>Create Shipping Order</h2>
<hr>
</div>

<div class="alert alert-block alert-info">
<b><?php echo Yii::t('strings','Step 1 of 3 ') ?></b> :
<?php echo Yii::t('strings','Select / Search Quotation') ?>
</div>

<?php
if(Yii::app()->user->hasFlash('error')):?>

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

<?php echo $this->renderPartial('_form_searchquo', array('model'=>$model)); ?>