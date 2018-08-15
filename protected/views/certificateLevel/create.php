<?php
$this->breadcrumbs=array(
	'Certificate Levels'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Manage Certificate Level','url'=>array('master/mascer')),
array('label'=>'Create Certificate Level','url'=>array('master/mascercreate')),
);
?>
<div id="content">
<h2>Create Certificate Level</h2>
<hr>
</div>


<?php echo $this->renderPartial('../CertificateLevel/_form', array('model'=>$model)); ?>