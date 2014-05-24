<?php $this->beginContent('//layouts/admin_main'); ?>
<div class="container">
	<div class="span-6">
		
			<h2>Sidebar</h2>
			<?php 
			
			$this->widget('zii.widgets.CMenu',array(
					'items'=>array(
							array('label'=>'Home', 'url'=>array('/admin/index')),
							array('label'=>'Basic Items', 'url'=>array('/admin/index'),'items'=>array(
									array('label'=>'Country', 'url'=>array('/admin/country')),
									array('label'=>'Directory Type', 'url'=>array('/admin/dirtype')),
									array('label'=>'Specilists', 'url'=>array('/admin/specilist'))
									
							)),
							array('label'=>'Items', 'url'=>array('/admin/dir_items')),
							array('label'=>'Users', 'url'=>array('/admin/users')),
							array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
					),
			)); 
			?>
			
		

	</div>
	<div id="content" class="span-16">
		<?php echo $content; ?>
	</div><!-- content -->
</div>
<?php $this->endContent(); ?>
