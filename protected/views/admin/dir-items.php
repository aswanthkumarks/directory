                                       
<?php

if(!isset($_GET['p'])){
$this->breadcrumbs=array(
		'Dir Items',
);
echo CHtml::link('Add New Item',array('admin/dir_items','p'=>'newitem'), array('class' => 'myButton','style'=>'float:right;'));
 
Yii::app()->clientScript->registerScript('ajaxupdate', "
$('#Type_type_id').live('change', function() {
		 $('#matterit').yiiGridView('update', {
            data: {'cat' : $(this).val()}
        });
});
");

$model2= new Type();
echo CHtml::activeDropDownList($model2, 'type_id',
		Chtml::listData(Type::model()->findAll(), 'type_id', 'name'),
		array('empty'=>'Select Directory Type'));

		
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
	if(isset($model2->matfil_id)){
		$this->breadcrumbs=array(
				'Dir Items'=>'dir_items','New Item','Contact Details'
		);
		?>
		<div class="form">
		
		<?php

		if($model->dir_type=='1'){
		?>
		<div class='formbox'>
		<h3>Speciality</h3>
		
		<?php 
		$specilistmodel=new Specilistdr();
		
		$this->widget('zii.widgets.grid.CGridView', array(
				'dataProvider'=>$specilistmodel->get_speciality($model2->matfil_id),
				'id'=>'specilist', 
				'columns'=>array(
		
						array(
								'header'=>'Sl No.',
								'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
						),
						array(
								'header'=>'Speciality',
								'value'=>'$data->name',
						),
						array(
								'class'=>'CButtonColumn',
								'template'=>'{delete}',
								'buttons'=>array
								(
										'update' => array
										(
													
												'url'=>'$this->grid->controller->createUrl("/admin/dir_items", array("q"=>$data->primaryKey, "p"=>"delete"))',
										),
								),
						),
				),
		));
		
		
		$specilist_form=$this->beginWidget('CActiveForm'); ?>
		<?php echo $specilist_form->errorSummary($specilistmodel); ?>
		<?php if(Yii::app()->user->hasFlash('success')): ?>
			<div class="flash-success">
		        <?php echo Yii::app()->user->getFlash('success'); ?>
		    </div>    
		<?php endif; ?>
		<?php 
		
		echo $specilist_form->hiddenField($specilistmodel,'dr_id',array('value'=>$model2->matfil_id));
		echo CHtml::activeLabel($specilistmodel,'Add Speciality'); 
		echo $specilist_form->dropDownList($specilistmodel, 'specilist_id', 
					CHtml::listData(Specilist::model()->findAll(), 'spid', 'sp_name'),
					array('class'=>'span4 chosen',
					'maxlength'=>20,
		            'prompt' => '---Choose Speciality---',
		            ));
		
		echo CHtml::submitButton('Add Speciality',array('style'=>'margin-left:20px;'));
		$this->endWidget();
		?>
		
		</div>
		<?php 
		}
		
		
		?>
		
				
		</div>
<?php 		
	}
else{
	
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


<table>
<tr><td colspan='2'>

<?php 
if(isset($model2->mat_id)&&$model2->mat_id!=0) {
echo $form->hiddenField($model,'id',array('value'=>$model2->mat_id));
}
if(isset($model2->matfil_id)) {
	echo $form->hiddenField($model2,'matfil_id',array('value'=>$model2->matfil_id));
}


?>


   <?php echo CHtml::activeLabel($model,'Directory Type'); ?>
   <?php echo $form->dropDownList($model, 'dir_type', 
			CHtml::listData(Type::model()->findAll(), 'type_id', 'name'),
			array('class'=>'span4 chosen',
			'maxlength'=>20,
            'prompt' => '---Select Directory Type---',
            ));
 ?>       
</td></tr>
<tr><td>	
	<?php echo $form->labelEx($model,'Name'); ?>
		<?php echo $form->textField($model,'name'); ?>
		<?php echo $form->error($model,'name'); ?>
</td><td>	
	<?php echo $form->labelEx($model,'Degree'); ?>
		<?php echo $form->textField($model,'degrees'); ?>
		<?php echo $form->error($model,'degrees'); ?>
</td></tr>
<tr><td colspan='2'>	
	<?php echo $form->labelEx($model,'Description'); ?>
		<?php echo $form->textArea($model,'desc',array('style'=>'width:85%;')	); ?>
		<?php echo $form->error($model,'desc'); ?>
</td></tr>
<tr><td>	
	<?php echo $form->labelEx($model2,'Address'); ?>
		<?php echo $form->textArea($model2,'address'); ?>
		<?php echo $form->error($model2,'address'); ?>
</td><td>	
	<?php echo $form->labelEx($model2,'Pin'); ?>
		<?php echo $form->textField($model2,'pin'); ?>
		<?php echo $form->error($model2,'pin'); ?>
</td></tr>
<tr><td>
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
</td><td>
	<?php echo CHtml::activeLabel($model2,'Select City'); ?>
	<?php echo $form->dropDownList($model2, 'city_id', 
			CHtml::listData(City::model()->findAll(), 'city_id', 'city_name'),
			array('class'=>'span4 chosen',
			'maxlength'=>20,
            'prompt' => '---Select City---',
            ));
 ?>
</td></tr>

<tr><td colspan="2">
 <?php echo CHtml::submitButton('Add Data'); ?>
</td></tr> 
</table>
<?php $this->endWidget(); ?>
</div><!-- form -->
	
	<?php 
}
}
/* Edit dir item */

elseif($_GET['p']=='edit'){
	$this->breadcrumbs=array(
			'Dir Items'=>'dir_items','Edit Item',
	);

}
?>