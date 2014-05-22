<?php
$this->breadcrumbs=array(
	'Country'=>'country','State'=>'state','City',
		
);
?>

<?php if(!empty($_GET['q'])): ?>
<h1><i>
<?php
$st=State::model()->findByPk($_GET['q']); 
echo $st->state_name;
?>
</i> / 
<?php 
$count=Country::model()->findByPk($st->country_id); 
echo $count->name; ?>
</h1>

<div class="form">
<?php echo CHtml::beginForm(); ?>
 <?php if(Yii::app()->user->hasFlash('success')): ?>
    <div class="flash-success">
        <?php echo Yii::app()->user->getFlash('success'); ?>
    </div>
<?php endif; ?>

    <?php echo CHtml::errorSummary($model); ?>
 
    <div class="row">
        <?php echo CHtml::activeLabel($model,'City Name'); ?>
        <?php echo CHtml::activeHiddenField($model,'state_id',array('value'=>$_GET['q'])); ?>
        <?php echo CHtml::activeTextField($model,'city_name') ?>
        <?php echo CHtml::submitButton('Add City'); ?>
    </div>
 
 
<?php echo CHtml::endForm(); ?>
</div><!-- form -->


<?php endif; ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$dataProvider,		
	'columns'=>array(
		array(
			'name'=>'City',
			'type'=>'raw',
			'value'=>'$data->city_name'
		),		
		array(
			'class'=>'CButtonColumn',
			'template'=>'{update}',
			'buttons'=>array
			(
					'update' => array
					(
								
							'url'=>'$this->grid->controller->createUrl("/admin/city", array("q"=>$data->primaryKey, "p"=>"edit"))',
					),
			),
		),
	),
)); 

?>