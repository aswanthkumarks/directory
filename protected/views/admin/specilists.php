<?php
$this->breadcrumbs=array(
	'Specilists',
		
);
?>

<?php 
if(isset($_GET['p'])){ ?>
 

<div style='background:#ECFBD4; padding:10px;' class="form">
<?php echo CHtml::beginForm(); ?>
 <?php if(Yii::app()->user->hasFlash('success')): ?>
    <div class="flash-success">
        <?php echo Yii::app()->user->getFlash('success'); ?>
    </div>
<?php endif; ?>

    <?php echo CHtml::errorSummary($model); ?>
 
    <div class="row">
    	<?php echo CHtml::activeHiddenField($model,'spid',array('value'=>$_GET['q'])); ?>
        <?php echo CHtml::activeLabel($model,'Edit Specilist Name'); ?>
        <?php $st=Specilist::model()->findByPk($_GET['q']);
         echo CHtml::activeTextField($model,'sp_name',array('value'=> $st->sp_name)) ?>
        <?php echo CHtml::submitButton('Update Specilist'); ?>
    </div>
 
 
<?php echo CHtml::endForm(); ?>
</div><!-- form -->


<?php 
}
else {
	
?>

<div class="form">
<?php echo CHtml::beginForm(); ?>
 <?php if(Yii::app()->user->hasFlash('success')): ?>
    <div class="flash-success">
        <?php echo Yii::app()->user->getFlash('success'); ?>
    </div>
<?php endif; ?>

    <?php echo CHtml::errorSummary($model); ?>
 
    <div class="row">
        <?php echo CHtml::activeLabel($model,'Specilist Name'); ?>
        <?php echo CHtml::activeTextField($model,'sp_name') ?>
        <?php echo CHtml::submitButton('Add Specilist'); ?>
    </div>
 
 
<?php echo CHtml::endForm(); ?>
</div><!-- form -->
<?php 
}
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$dataProvider,		
	'columns'=>array(
		array(
			'name'=>'Specilist Type',
			'value'=>'$data->sp_name'
		),		
		array(
			'class'=>'CButtonColumn',
			'template'=>'{update}',
			'buttons'=>array
			(
					'update' => array
					(
							
							'url'=>'$this->grid->controller->createUrl("/admin/specilist", array("q"=>$data->primaryKey, "p"=>"edit"))',
					),
			),
		),
	),
)); 

?>