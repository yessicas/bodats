<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>


<div class="title-front"><?php echo Yii::t('strings','Welcome to').' '.CHtml::encode(Yii::app()->name); ?></div>
<br>
    <p class="content-index"> 
    </p>
    <div class="keterangan"><?php echo CHtml::encode(Yii::app()->name).' '.Yii::t('strings','a media and discussion forums to share information on education, employment,')?><br>
                           <?php echo Yii::t('strings','and job information that can make any person connected with the others.')?>
    </div>



<div>
 <img src ="<?php echo Yii::app()->request->baseUrl; ?>/css/relasi.png" class = "img-index"> 
</div>


<div class="container-fluid content-index" style="margin-bottom:120px">
    <div class="row-fluid">

         <div class="service span3">
            <?php $box = $this->beginWidget(
            'bootstrap.widgets.TbBox',
            array(
                'title' => Yii::t('strings','Job Seekers'),
                'headerIcon' => 'icon-search',
                'htmlOptions' => array('class' => 'bootstrap-widget-table'),
           
            )
        );?>

        <div class="content-box"> <?php echo Yii::t('strings','What You Will Get :') ?> </div>
        <div class="content-index">
        <i class="icon-ok"></i>  <span class ="keterangan"><?php echo Yii::t('strings','Curiculum Vitae')?></span><br>
        <i class="icon-ok"></i>  <span class ="keterangan"><?php echo Yii::t('strings','Job Vacancy Info')?></span><br>
        <i class="icon-ok"></i>  <span class ="keterangan"><?php echo Yii::t('strings','Social friends')?></span><br>
        </div>

        <br>
        <?php echo CHtml::link(Yii::t('strings','Register'),array('users/create')); ?>
        <?php $this->endWidget(); ?>
        </div>


         <div class="service span3">
            <?php $box = $this->beginWidget(
            'bootstrap.widgets.TbBox',
            array(
                'title' => Yii::t('strings','Company'),
                'headerIcon' => 'icon-th-large',
                'htmlOptions' => array('class' => 'bootstrap-widget-table'),
           
            )
        );?>

        <div class="content-box"> <?php echo Yii::t('strings','What You Will Get :') ?> </div>
        <div class="content-index">
        <i class="icon-ok"></i>  <span class ="keterangan"><?php echo Yii::t('strings','Post Job Vacancy')?></span><br>
        <i class="icon-ok"></i>  <span class ="keterangan"><?php echo Yii::t('strings','Info Job Applicants')?></span><br>
        <i class="icon-ok"></i>  <span class ="keterangan"><?php echo Yii::t('strings','Social friends')?></span><br>
        </div>

        <br>
        <?php echo CHtml::link(Yii::t('strings','Register'),array('users/createcompany')); ?>
        <?php $this->endWidget(); ?>
        </div>


         <div class="service span3">
            <?php $box = $this->beginWidget(
            'bootstrap.widgets.TbBox',
            array(
                'title' => Yii::t('strings','University'),
                'headerIcon' => 'icon-tasks',
                'htmlOptions' => array('class' => 'bootstrap-widget-table'),
           
            )
        );?>

        <div class="content-box"> <?php echo Yii::t('strings','What You Will Get :') ?> </div>
        <div class="content-index">
        <i class="icon-ok"></i>  <span class ="keterangan"><?php echo Yii::t('strings','University Info')?></span><br>
        <i class="icon-ok"></i>  <span class ="keterangan"><?php echo Yii::t('strings','Job Vacancy Info')?></span><br>
        <i class="icon-ok"></i>  <span class ="keterangan"><?php echo Yii::t('strings','Social friends')?></span><br>
        </div>

        <br>
        <?php echo CHtml::link(Yii::t('strings','Register'),array('users/createschool')); ?>
        <?php $this->endWidget(); ?>
        </div>



    </div>
</div>

<?php /*
  <div class="what-we-do container">
            <div class="row">
                <div class="service span3">
<h2> PENCARI KERJA </h2><br>
<a href="">Registrasi</a>
</div>
<div class="service span3">
<h2> PERUSAHAAN</h2><br>
<a href="">Registrasi</a>
</div>
<div class="service span3">
<h2> UNIVERSITAS </h2><br>
<a href="">Registrasi</a>
</div>
</div>
</div>
*/
?>

<?php if(Yii::app()->user->hasFlash('success')):?>

<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
                        'id'=>'confirmaton',
                        'options'=>array(
                            'show' => 'blind',
                            'hide' => 'explode',
                            'modal' => 'true',
                            'title' => 'Confirmation',
                            'resizable' => false,
                            'width'=>300,
                            'autoOpen'=>true,
                            ),
                        ));
 
           echo Yii::app()->user->getFlash('success');
         
 
            $this->endWidget('zii.widgets.jui.CJuiDialog');
        
?>
<?php endif; ?>
