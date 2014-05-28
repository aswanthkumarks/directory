                                       
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
							
							'url'=>'$this->grid->controller->createUrl("/admin/dir_items", array("filt"=>$data->matfil_id, "p"=>"newitem"))',
					),
			),
		),
	),
)); 

}



/* Register new dir item */

elseif($_GET['p']=='newitem'){
	if(isset($_GET['filt'])){
		$model2->matfil_id=$_GET['filt'];
		$model->dir_type=$model2->get_matter_type($model2->matfil_id);;
	}
	if(isset($model2->matfil_id)){
		$this->breadcrumbs=array(
				'Dir Items'=>'dir_items','New Item','Contact Details'
		);
		?>
		<div class="form">
		<div class='formbox'>
		<h3>Details</h3>
		<?php 
		$item=$model2->get_itemdetails($model2->matfil_id);
		echo "<h2>".$item->name."<span class='desig'> (".$item->degrees.")</span>, <span class='dirtype'>".Type::model()->findByPk($item->dir_type)->name."</span></h2>";
		echo "<p>".$item->desc."</p>";
		
		echo "<p>".$item->address."</p>";
		echo "<p>".$item->pin."</p>";
		
		
		echo "<p>".City::model()->findByPk($item->city_id)->city_name."</p>";
		echo "<p>".State::model()->findByPk($item->state_id)->state_name."</p>";
		?>
		
		</div>
		<?php
		
		if(isset($model->dir_type)&&($model->dir_type=='1')){
		
		?>
		<div class='formbox'>
		<h3>Speciality</h3>
		<div style='float:left; width:300px;'>
		<?php 
		$specilist_form=$this->beginWidget('CActiveForm'); 
		echo $specilist_form->errorSummary($specilistmodel); 
		if(Yii::app()->user->hasFlash('specilist_success')): ?>
			<div class="flash-success">
		        <?php echo Yii::app()->user->getFlash('specilist_success'); ?>
		    </div>    
		<?php endif;  
		
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
		<div style='width:300px; float:left;'>
		<?php 
		$this->widget('zii.widgets.grid.CGridView', array(
				'dataProvider'=>$specilistmodel->get_speciality($model2->matfil_id),
				'id'=>'specilist', 
				'columns'=>array( 
						array(
								'header'=>'Speciality',
								'value'=>'$data->name',
						),
						array(
								'class'=>'CButtonColumn',
								'template'=>'{delete}',
								'buttons'=>array
								(
										'delete' => array
										(
													
												'url'=>'$this->grid->controller->createUrl("/admin/deletespeciality", array("q"=>$data->primaryKey,))',
										),
								),
						),
				),
		));
		
		?>
		</div>
		<div style='clear:both;'></div>
		
		</div>
		
		<?php 
		}
		?>
		
		<div class='formbox'>
		<h3>Phone Number</h3>
		<div style='float:left; width:300px;'>
		<?php 
		$phone_form=$this->beginWidget('CActiveForm');
		echo $phone_form->errorSummary($phone_model);
		if(Yii::app()->user->hasFlash('phonesuccess')): ?>
			<div class="flash-success">
		        <?php echo Yii::app()->user->getFlash('phonesuccess'); ?>
		    </div>    
		<?php endif;
		echo $phone_form->hiddenField($phone_model,'sub_fil_id',array('value'=>$model2->matfil_id));
		echo CHtml::activeLabel($phone_model,'Contact Person / Label');
		echo $phone_form->textField($phone_model,'label');
		
		echo CHtml::activeLabel($phone_model,'Add Phone Number'); 
		echo $phone_form->textField($phone_model,'phno');		
		echo CHtml::submitButton('Add Phone',array('style'=>'margin-left:20px;'));
		$this->endWidget();
		?>
		</div>
		<div style='width:300px; float:left;'>
		<?php 
		
		
		
		$this->widget('zii.widgets.grid.CGridView', array(
				'dataProvider'=>$phone_model->get_phonenos($model2->matfil_id),
				'id'=>'phoneno', 
				'columns'=>array(
					array(
									'header'=>'Phone Label',
									'value'=>'$data->label',
							),
					array(
								'header'=>'Phone Number',
								'value'=>'$data->phno',
						),
						array(
								'class'=>'CButtonColumn',
								'template'=>'{delete}',
								'buttons'=>array
								(
										'delete' => array
										(
											'url'=>'$this->grid->controller->createUrl("/admin/deletephone", array("q"=>$data->primaryKey,))',		
												
										),
								),
						),
				),
		));
		
		?>
		</div>
		<div style='clear:both;'></div>
		
		
		</div>
		
		<div class='formbox'>
		<h3>Email</h3>
		<div style='float:left; width:300px;'>
		<?php 
		$email_form=$this->beginWidget('CActiveForm');
		echo $email_form->errorSummary($email_model);
		if(Yii::app()->user->hasFlash('emailsuccess')): ?>
			<div class="flash-success">
		        <?php echo Yii::app()->user->getFlash('emailsuccess'); ?>
		    </div>    
		<?php endif;
		echo $email_form->hiddenField($email_model,'fiter_id',array('value'=>$model2->matfil_id));
		echo CHtml::activeLabel($email_model,'Contact Person / Label');
		echo $email_form->textField($email_model,'email_label');
		
		echo CHtml::activeLabel($email_model,'Email'); 
		echo $email_form->textField($email_model,'email');		
		echo CHtml::submitButton('Add Email',array('style'=>'margin-left:20px;'));
		$this->endWidget();
		?>
		</div>
		<div style='width:300px; float:left;'>
		<?php 
		
		
		
		$this->widget('zii.widgets.grid.CGridView', array(
				'dataProvider'=>$email_model->get_emails($model2->matfil_id),
				'id'=>'emails', 
				'columns'=>array(
					array(
									'header'=>'Email Label',
									'value'=>'$data->email_label',
							),
					array(
								'header'=>'Email',
								'value'=>'$data->email',
						),
						array(
								'class'=>'CButtonColumn',
								'template'=>'{delete}',
								'buttons'=>array
								(
										'delete' => array
										(
													
												'url'=>'$this->grid->controller->createUrl("/admin/deleteemail", array("q"=>$data->primaryKey,))',
										),
								),
						),
				),
		));
		
		?>
		</div>
		<div style='clear:both;'></div>
		
		
		</div>
		
		<div class='formbox'>
		<h3>Images</h3>
		 
		<?php 
		$image_form=$this->beginWidget('CActiveForm',
		    array(
		        'id' => 'Image-form',
		        'enableAjaxValidation' => false,
		        'htmlOptions' => array('enctype' => 'multipart/form-data'),
		    )
		);
		echo $image_form->errorSummary($image_model);
		if(Yii::app()->user->hasFlash('imagesuccess')): ?>
			<div class="flash-success">
		        <?php echo Yii::app()->user->getFlash('imagesuccess'); ?>
		    </div>    
		    
		<?php endif; ?>
		<div style='float:right;' class='profilepic'><h4 style='text-align:center; margin:2px;'>Profile Pic</h4>
		<?php
		$proimg=$image_model->get_profile_pic($model2->matfil_id);
		
		echo  CHtml::image(Yii::app()->request->baseUrl.'/'."$proimg->img_url",
                                         "$proimg->alt", array("width"=>"100px" ,"height"=>"100px"))
      ?>
		
		</div>
		<?php 
		
		echo $image_form->hiddenField($image_model,'imgof',array('value'=>$model2->matfil_id));
		echo CHtml::activeLabel($image_model,'alt / Caption');
		echo $image_form->textField($image_model,'alt');
		
		echo $image_form->labelEx($image_model, 'image');
		echo $image_form->fileField($image_model, 'image');
		echo $image_form->error($image_model, 'image');
			
		echo CHtml::submitButton('Upload Image',array('style'=>'margin-left:20px;'));
		$this->endWidget();
		?> 
		<?php 
		
		$baseurl=Yii::app()->getBasePath();
		
		$this->widget('zii.widgets.grid.CGridView', array(
				'dataProvider'=>$image_model->get_images($model2->matfil_id),
				'id'=>'images', 
				'columns'=>array(
					array(
									'header'=>'Thumb',
									'type'=>'html',
									'value'=>'CHtml::image(Yii::app()->request->baseUrl."$data->img_url",
                                         "$data->alt",
      array("width"=>"50px" ,"height"=>"50px"))',
							),
					array(
								'header'=>'Caption',
								'value'=>'$data->alt',
						),
					array(
							'header'=>'Set Profile pic',
							'value'=>'$data->alt',
							'type'=>'raw',
							'value'=>'CHtml::link(CHtml::encode("Set as profile pic"), array("admin/setprofilepic" ,"q"=>$data->primaryKey ,"item"=>$data->matfil_id) )'
					),
						array(
								'class'=>'CButtonColumn',
								'template'=>'{delete}',
								'buttons'=>array
								(
										'delete' => array
										(
													
												'url'=>'$this->grid->controller->createUrl("/admin/deletedirpic", array("q"=>$data->primaryKey, "item"=>$data->matfil_id))',
										),
								),
						),
				),
		));
		
		?>
		 
		
		
		</div>
				
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