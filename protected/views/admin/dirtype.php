<?php
$this->breadcrumbs=array(
	'Directory Type',
		
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
    	<?php echo CHtml::activeHiddenField($model,'type_id',array('value'=>$_GET['q'])); ?>
        <?php echo CHtml::activeLabel($model,'Edit Directory Name'); ?>
        <?php $st=Type::model()->findByPk($_GET['q']);
         echo CHtml::activeTextField($model,'name',array('value'=> $st->name)) ?>
        <?php echo CHtml::submitButton('Update Directory Name'); ?>
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
        <?php echo CHtml::activeLabel($model,'Directory Name'); ?>
        <?php echo CHtml::activeTextField($model,'name') ?>
        <?php echo CHtml::submitButton('Add Directory Type'); ?>
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
			'name'=>'Directory Type',
			'value'=>'$data->name'
		),		
		array(
			'class'=>'CButtonColumn',
			'template'=>'{update}',
			'buttons'=>array
			(
					'update' => array
					(
								
							'url'=>'$this->grid->controller->createUrl("/admin/dirtype", array("q"=>$data->primaryKey, "p"=>"edit"))',
					),
			),
		),
	),
)); 

?>