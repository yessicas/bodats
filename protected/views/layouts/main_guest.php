<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
    <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/css/iconcareerln.png" type="image/x-icon" /> 
	
	<!-- Base HREF -->
	<?php if($_SERVER["SERVER_NAME"] == "203.215.48.86") { ?>
	<base href="http://<?php echo $_SERVER["SERVER_NAME"].":80".Yii::app()->request->baseUrl;?>/index.php">
	<?php } else{ ?>
	<base href="http://<?php echo $_SERVER["SERVER_NAME"].":80".Yii::app()->request->baseUrl;?>/index.php">
	<?php }?>

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/animate.css/animate.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/animate.css/animate.min.css" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap/css/bootstrap-yii.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap/css/jquery-ui-bootstrap.css"/>


	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div  id="page">

	<!-- header -->
    <div id="header">
        <div id="logo">
            <b><?php //echo CHtml::encode(Yii::app()->name); ?></b>
            <img src ="<?php echo Yii::app()->request->baseUrl; ?>/css/logo.png" align = "left" width =250>

            <br>
            <br>
            <?php $currentLang = Yii::app()->language;?>
            <?php echo CHtml::form(); ?>
            <div id="langdrop" align="right" style="font-size:14px; margin-right:15px; color:#555;"> <?php echo Yii::t('strings','Language'); ?> :
            <?php echo CHtml::dropDownList('_lang', $currentLang, array(
                'en' => 'English', 'id' => 'Indonesia'), array('submit' => '' , 'style'=>'width:120px; height:27px; margin-top:9px;')); ?>
            </div>
            <?php echo CHtml::endForm(); ?>
         </div>
    </div>
    <!-- header -->
<!-- navbar menu  -->
<?php
	$this->widget(
    'bootstrap.widgets.TbNavbar',
    array(
        'type' => null, // null or 'inverse'
        'brand' => '',
        'brandUrl' => '#',
        'collapse' => true, // requires bootstrap-responsive.css
        'fixed' => false,
        'items' => array(
            array(
                'class' => 'bootstrap.widgets.TbMenu',
                'items' => array(
                    array('label' => 'Home', 'url'=>Yii::app()->getHomeUrl(), 'icon'=>'home white'),
                   
                ),
            ),
            array(
                'class' => 'bootstrap.widgets.TbMenu',
                'htmlOptions' => array('class' => 'pull-right'),
                'items' => array(
                   
                    array(
                       
                        'label' => Yii::app()->user->isGuest==!'isGuest'?Yii::app()->user->id:'Guest',
                       // 'label'=>'Admin',
                        'url' => '#',
                        'icon'=>'user white',
                        'visible'=>!Yii::app()->user->isGuest,
                        'items' => array(
                
                                        array('label' => 'Logout', 'icon'=>'off', 'url'=>array('/site/logout') ),
                                       
                                        )
                    ),
                    
                    
                  
                ),
            ),
        ),
    )
);

?>
<!-- end navbar menu  -->


	<?php //if(isset($this->breadcrumbs)):?>
		<?php //$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
		//'links'=>$this->breadcrumbs,
	//)); ?><!-- breadcrumbs -->

	<?php //endif?>



    
	
	<?php echo $content; ?>

	<div class="clear"></div>


	<div id="footer">
		<img src ="<?php echo Yii::app()->request->baseUrl; ?>/css/logo2.png" align = "center" width =100 heigth=40>
        <br/>
		Copyright  <?php echo date('Y'); ?> All Rights Reserved.<br/>
       
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
