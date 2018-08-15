<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_perusahaan')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_perusahaan),array('view','id'=>$data->id_perusahaan)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama_perusahaan')); ?>:</b>
	<?php echo CHtml::encode($data->nama_perusahaan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alamat')); ?>:</b>
	<?php echo CHtml::encode($data->alamat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('izin_usaha')); ?>:</b>
	<?php echo CHtml::encode($data->izin_usaha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('deskripsi')); ?>:</b>
	<?php echo CHtml::encode($data->deskripsi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bidang_usaha')); ?>:</b>
	<?php echo CHtml::encode($data->bidang_usaha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('foto_logo')); ?>:</b>
	<?php echo CHtml::encode($data->foto_logo); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('foto_profil')); ?>:</b>
	<?php echo CHtml::encode($data->foto_profil); ?>
	<br />

	*/ ?>

</div>