                                       
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
$this->breadcrumbs=array(
		'Dir Items'=>'dir_items','New Item',
);
	?>
<div class="form">
<?php $form=$this->beginWidget('CActiveForm'); ?>
<?php echo $form->errorSummary($model); ?>
<?php if(Yii::app()->user->hasFlash('success')): ?>
	<div class="flash-success">
        <?php echo Yii::app()->user->getFlash('success'); ?>
    </div>    
<?php endif; ?>


<div class="row">
   <?php echo CHtml::activeLabel($model,'Directory Type'); ?>
   <?php echo $form->dropDownList($model, 'dir_type', 
			CHtml::listData(Type::model()->findAll(), 'type_id', 'name'),
			array('class'=>'span4 chosen',
			'maxlength'=>20,
            'prompt' => '---Select Directory Type---',
            ));
 ?>       
</div>
<div class="row">	
	<?php echo $form->labelEx($model,'Name'); ?>
		<?php echo $form->textField($model,'name'); ?>
		<?php echo $form->error($model,'name'); ?>
</div>
<div class="row">	
	<?php echo $form->labelEx($model,'Degree'); ?>
		<?php echo $form->textField($model,'degrees'); ?>
		<?php echo $form->error($model,'degrees'); ?>
</div>
<div class="row">	
	<?php echo $form->labelEx($model,'Description'); ?>
		<?php echo $form->textArea($model,'desc'); ?>
		<?php echo $form->error($model,'desc'); ?>
</div>
<div class="row">	
	<?php echo $form->labelEx($model2,'Address'); ?>
		<?php echo $form->textArea($model2,'address'); ?>
		<?php echo $form->error($model2,'address'); ?>
</div>
<div class="row">	
	<?php echo $form->labelEx($model2,'Pin'); ?>
		<?php echo $form->textField($model2,'pin'); ?>
		<?php echo $form->error($model2,'pin'); ?>
</div>
<div class='row'>
	<?php echo CHtml::activeLabel($model2,'Select State'); ?>
	<?php echo $form->dropDownList($model2, 'state_id', 
			CHtml::listData(State::model()->findAll(), 'state_id', 'state_name'),
			array('class'=>'span4 chosen',
			'maxlength'=>20,
            'prompt' => '---Select State---',
			'ajax' => array('type' => 'POST',
					'url' => CController::createUrl('Mguru/dynamiccities'),
					'update' => '#'.CHtml::activeId($model2,'city_id'),
					'data' => array(
							'stateid' => 'js:this.value',
					),
			)
            ));
 ?>
</div>

<div class='row'>
	<?php echo CHtml::activeLabel($model2,'Select City'); ?>
	<?php echo $form->dropDownList($model2, 'city_id', 
			CHtml::listData(City::model()->findAll(), 'city_id', 'city_name'),
			array('class'=>'span4 chosen',
			'maxlength'=>20,
            'prompt' => '---Select City---',
            ));
 ?>
</div>

<div class="row">
 <?php echo CHtml::submitButton('Add Data'); ?>
</div> 
 
<?php $this->endWidget(); ?>
</div><!-- form -->
	
	<?php 
}
/* Edit dir item */

elseif($_GET['p']=='edit'){
	$this->breadcrumbs=array(
			'Dir Items'=>'dir_items','Edit Item',
	);

}
?>