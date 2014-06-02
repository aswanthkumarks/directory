<?php $url=$data->state_name;  $url=$this->geturl($url); ?>

<li data-id="web print" class="clearfix">
 <h3><?php echo CHtml::link(CHtml::encode($data->state_name), array('site/directory','d'=>$_GET['d'],'s'=>$data->state_id) ); ?></h3>
</li>