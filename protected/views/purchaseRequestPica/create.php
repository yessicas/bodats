<?php
$this->breadcrumbs=array(
	'Purchase Request Picas'=>array('index'),
	'Create',
);

$this->menu=array(

array('label'=>'Manage  Pica','url'=>array('purchaserequest/adminprpica')),
array('label'=>'Create  Pica','url'=>array('create'),'active'=>true),
);
?>



<div id="content">
<h2>Create Pica</h2>
<hr>
</div>

<h3><font color=#BD362F> PR INFO </font></h3>

<?php echo $this->renderPartial('viewrequest'); ?>

<hr>

<h3><font color=#BD362F> PICA </font></h3>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>