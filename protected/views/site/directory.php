<?php
if(isset($_GET['d'])&&isset($_GET['s'])&&isset($_GET['c'])){
	$typ=Type::model()->findByAttributes(array('name'=>$_GET['d']));;
	
	$this->widget('zii.widgets.CListView', array(
			'dataProvider'=>Singlefill::model()->list_items($_GET['c'],$typ->type_id),
			'id'=>'matterit',
			'ajaxUpdate' => true,
			'itemView'=>'_profilelist',
			'itemsTagName'=>'ul',
			'itemsCssClass'=>'listdir port-det port-thumb',
	));

}
elseif(isset($_GET['d'])&&isset($_GET['s'])){
	
	$this->widget('zii.widgets.CListView', array(
			'dataProvider'=>$city->get_cities($_GET['s']),
			'id'=>'matterit',
			'ajaxUpdate' => true,
			'itemView'=>'_cities',
			'itemsTagName'=>'ul',
			'itemsCssClass'=>'listdir port-det port-thumb',
	));
	
}
elseif(isset($_GET['d'])){	
	$dataProvider = new CActiveDataProvider($state);
	$this->widget('zii.widgets.CListView', array(
			'dataProvider'=>$dataProvider,
			'id'=>'matterit',
			'ajaxUpdate' => true,
			'itemView'=>'_states',
			'itemsTagName'=>'ul',
			'itemsCssClass'=>'listdir port-det port-thumb',
	));	
	

}
else{
	$this->redirect(Yii::app()->homeUrl);


}
?>
<div style='clear:both;'></div>