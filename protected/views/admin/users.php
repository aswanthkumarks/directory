<?php


if(isset($_GET['p'])){
		$this->breadcrumbs=array(
				'Users'=>'users','Edit User',
	
		);	
if($_GET['p']=='edit'){
echo CHtml::link('Add New User', $this->createAbsoluteUrl('admin/users',array('p'=>'newuser')),array('class'=>'myButton','style'=>'float:right;'));
?>
<br/>
		
<div class="form">
<h1>Edit User</h1>

<?php
$usr=Users::model()->findByPk($_GET['q']); 
?>
<?php echo CHtml::beginForm(); ?>
<?php if(Yii::app()->user->hasFlash('success')): ?>
    <div class="flash-success">
        <?php echo Yii::app()->user->getFlash('success'); ?>
    </div>
<?php endif; ?>

    <?php echo CHtml::errorSummary($model); ?>
 
    <table style='width:auto;'>
    <tr><td><label>Name</label></td><td><?php echo CHtml::activeLabel($model,'First Name'); ?>
        <?php echo CHtml::activeHiddenField($model,'uid',array('value'=>$_GET['q'])); ?>
        <?php echo CHtml::activeTextField($model,'first_name',array('value'=>$usr->first_name)) ?></td>
        <td><?php echo CHtml::activeLabel($model,'last Name'); ?>
        <?php echo CHtml::activeTextField($model,'last_name',array('value'=>$usr->last_name)) ?></td></tr>
        
    <tr><td><?php echo CHtml::activeLabel($model,'Email'); ?></td>
        <td><?php echo CHtml::activeTextField($model,'email',array('value'=>$usr->email)) ?></td></tr>        
    
    <tr>
        <td><?php echo CHtml::activeLabel($model,'Password'); ?></td>
        <td><?php echo CHtml::activeTextField($model,'password',array('value'=>$usr->password)) ?></td>        
    </tr>
      <tr>
        <td><?php echo CHtml::activeLabel($model,'User Privelage'); ?></td>
        <td><?php echo CHtml::dropDownList('Users[user_type]',$model, array(0=>'Super Admin',1=>'Admin',2=>'User'), array('options' => array($usr->user_type =>array('selected'=>true))));  ?></td>        
    </tr>
    
    <tr>
    <td colspan='2'><?php echo CHtml::submitButton('Update User'); ?></td>    
    </tr>
 </table>
 
<?php echo CHtml::endForm(); ?>
</div><!-- form -->
		
		
		<?php
			
}
elseif($_GET['p']=="newuser"){
?>

<div class="form">
<h1>Add New User</h1>
<?php echo CHtml::beginForm(); ?>
<?php if(Yii::app()->user->hasFlash('success')): ?>
    <div class="flash-success">
        <?php echo Yii::app()->user->getFlash('success'); ?>
    </div>
<?php endif; ?>

    <?php echo CHtml::errorSummary($model); ?>
 
    <table style='width:auto;'>
    <tr><td><label>Name</label></td><td><?php echo CHtml::activeLabel($model,'First Name'); ?>
        <?php echo CHtml::activeTextField($model,'first_name') ?></td>
        <td><?php echo CHtml::activeLabel($model,'last Name'); ?>
        <?php echo CHtml::activeTextField($model,'last_name') ?></td></tr>
        
    <tr><td><?php echo CHtml::activeLabel($model,'Email'); ?></td>
        <td><?php echo CHtml::activeTextField($model,'email') ?></td></tr>        
    
    <tr>
        <td><?php echo CHtml::activeLabel($model,'Password'); ?></td>
        <td><?php echo CHtml::activeTextField($model,'password') ?></td>        
    </tr>
      <tr>
        <td><?php echo CHtml::activeLabel($model,'User Privelage'); ?></td>
        <td><?php echo CHtml::dropDownList('Users[user_type]',$model, array(0=>'Super Admin',1=>'Admin',2=>'User'), array('options' => array('2' =>array('selected'=>true))));  ?></td>        
    </tr>
    
    <tr>
    <td colspan='2'><?php echo CHtml::submitButton('Add User'); ?></td>    
    </tr>
 </table>
 
<?php echo CHtml::endForm(); ?>
</div><!-- form -->


<?php 
}
	
	
}
else{

$this->breadcrumbs=array('Users',);

echo CHtml::link('Add New User', $this->createAbsoluteUrl('admin/users',array('p'=>'newuser')),array('class'=>'myButton','style'=>'float:right;'));
?>
<br/>
<?php 
$this->widget('zii.widgets.grid.CGridView', array(
		'dataProvider'=>$dataProvider,
		'columns'=>array(
				array(
						'header'=>'Sl No.',
						'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
				),
				array(
						'header'=>'Name',
						'value'=>'$data->first_name." ". $data->last_name',
				),
				array(
						'header'=>'Email',
						'value'=>'$data->email',
				),
				array(
						'header'=>'User Type',
						'value'=> '$data->get_usertype($data->user_type)',
				),
				array(
						'class'=>'CButtonColumn',
						'template'=>'{update}',
						'buttons'=>array
						(
								'update' => array
								(
											
										'url'=>'$this->grid->controller->createUrl("/admin/users", array("q"=>$data->primaryKey, "p"=>"edit"))',
								),
						),
				),
		),
));


}
?>