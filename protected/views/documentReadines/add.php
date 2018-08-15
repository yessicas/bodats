<h3>Add Vessel Document</h3>
<hr>

<?php echo $this->renderPartial('../DocumentReadines/_form',
	array(
		'id_vessel'=>$id_vessel,
		'id_vessel_document'=>$id_vessel_document,
		'model'=>$model
	)
); ?>
