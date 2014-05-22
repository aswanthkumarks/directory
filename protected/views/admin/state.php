<?php
$this->breadcrumbs=array(
	'Country'=>'country','State',
		
);
?>

<?php if(!empty($_GET['q'])): ?>
<h1>Country : <i>
<?php
$country=Country::model()->findByPk($_GET['q']); 
echo $country->name;
?>
</i></h1>

<div class="form">
<?php echo CHtml::beginForm(); ?>
 <?php if(Yii::app()->user->hasFlash('success')): ?>
    <div class="flash-success">
        <?php echo Yii::app()->user->getFlash('success'); ?>
    </div>
<?php endif; ?>

    <?php echo CHtml::errorSummary($model); ?>
 
    <div class="row">
        <?php echo CHtml::activeLabel($model,'State Name'); ?>
        <?php echo CHtml::activeHiddenField($model,'country_id',array('value'=>$_GET['q'])); ?>
        <?php echo CHtml::activeTextField($model,'state_name') ?>
        <?php echo CHtml::submitButton('Add State'); ?>
    </div>
 
 
<?php echo CHtml::endForm(); ?>
</div><!-- form -->


<?php endif; ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$dataProvider,		
	'columns'=>array(
		array(
			'name'=>'State',
			'type'=>'raw',
			'value'=>'CHtml::link(CHtml::encode($data->state_name), array("admin/city" ,"q"=>$data->state_id) )'
		),		
		array(
			'class'=>'CButtonColumn',
			'template'=>'{update}',
		),
	),
)); 

?>