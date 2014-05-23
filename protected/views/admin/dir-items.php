                                       
<?php

if(!isset($_GET['p'])){
$this->breadcrumbs=array(
		'Dir Items',
);
echo CHtml::link('Add New Item',array('admin/dir_items','p'=>'newitem'), array('class' => 'myButton','style'=>'float:right;'));
 
Yii::app()->clientScript->registerScript('ajaxupdate', "
$('#selStatus').live('change', function() {
		 $('#matterit').yiiGridView('update', {
            data: {'cat' : $(this).val()}
        });
});
");

$data = CHtml::listData(Type::model()->findAll(), 'type_id', 'name');

$select = key($data);

echo CHtml::dropDownList(
		'dropDownStatus',
		$select,            // selected item from the $data
		$data,
		array(
				'style'=>'margin-bottom:10px;',
				'id'=>'selStatus',
				'prompt'=>'Select Directory Type:',
		)
);

 $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$dataProvider,
	'id'=>'matterit',
	'ajaxUpdate' => true,
	'columns'=>array(
		
		array(
			'header'=>'Sl No.',
      		'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
		),	
		array(
			'header'=>'Name',
			'value'=>'$data->name',
			),
		array(
					'header'=>'Desc..',
					'value'=>'$data->desc',
			),
		array(
					'header'=>'Dir Type',
					'value'=>'$data->typ',  
			),
		array(
			'class'=>'CButtonColumn',
			'template'=>'{update}',
			'buttons'=>array
			(
					'update' => array
					(
							
							'url'=>'$this->grid->controller->createUrl("/admin/dir_items", array("q"=>$data->primaryKey, "p"=>"edit"))',
					),
			),
		),
	),
)); 

}
/* Register new dir item */

elseif($_GET['p']=='newitem'){

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
   <?php echo CHtml::activeLabel($model,'Directory Type'); ?>
   <?php $data = CHtml::listData(Type::model()->findAll(), 'type_id', 'name');
$select = key($data);
echo CHtml::dropDownList(
		'Matter[dir_type]',
		$select,            // selected item from the $data
		$data,
		array(
				'style'=>'margin-bottom:10px;',
				'id'=>'dirtype',
				'prompt'=>'Select Directory Type:',
		)
); ?> 
       
</div>
<div class="row">
	<?php echo CHtml::activeLabel($model,'Name'); ?>
	<?php echo CHtml::activeTextField($model,'name') ?>
</div>

<div class="row">
	<?php echo CHtml::activeLabel($model,'Description'); ?>
	<?php echo CHtml::activeTextArea($model, 'desc'); ?>
</div>

<div class="row">
 <?php echo CHtml::submitButton('Add Data'); ?>
</div> 
 
<?php echo CHtml::endForm(); ?>
</div><!-- form -->
	
	<?php 
}
?>