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
						'value'=>'$data->first_name $data->last_name',
				),
				array(
						'header'=>'Email',
						'value'=>'$data->email',
				),
				array(
						'header'=>'User Type',
						'value'=>'$data->user_type',
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

?>