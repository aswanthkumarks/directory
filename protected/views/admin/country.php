<?php
$this->breadcrumbs=array(
	'Country',
		
);
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$dataProvider,
		
	'columns'=>array(
		array(
			'name'=>'Country',
			'type'=>'raw',
			'value'=>'CHtml::link(CHtml::encode($data->name), array("admin/state" ,"q"=>$data->id) )'
		),
		array(
			'name'=>'iso',
			'value'=>'$data->iso',
			
		),
		array(
			'name'=>'Phonecode',
			'value'=>'$data->phonecode',			
		),
		array(
			'class'=>'CButtonColumn',
			'template'=>'{update}',
		),
	),
)); 

?>