<?php $url=$data->name;  $url=$this->geturl($url); ?>

<li data-id="web print" class="clearfix">
 <h3><?php echo CHtml::link(CHtml::encode($data->name), array('site/directory','d'=>$url) ); ?></h3>
</li>