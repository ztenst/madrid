<?php 
	$this->pageTitle = '马德里公馆-酒庄详情';
    $this->keyword = '西班牙进口红酒，里奥哈酒庄'.'-'.$info->name.'-'.$info->eng.'。';
    $this->description = '马德里公馆-'.$info->name.'更多红酒资讯请持续关注马德里公馆。';
?>
<div id="sitecontent">
	<div class="npagePage " id="npagePage" style="width: 100%">
	    <div class="content">
	        <div id="projectwrap" class="fw">
	            <div id="projectbody" style="width: 70%">
	                <ul id="projectimages">
	                    <li><img src="<?=ImageTools::fixImage($info->image)?>" /></li>
	                </ul>
	                <div class="clear"></div>
	                <div class="postbody">
	                    <p><?=$info->content?></p>
	                </div>
	            </div>
	            <div id="projectinfo">
	                <div id="projectih">
	                    <div class="header">
	                        <p class="title"><?=$info->name?></p>
	                        <p class="subtitle"><?=$info->eng?></p>
	                        <p class="subtitle"><?=TagExt::getNameByTag($info->place)?></p>
	                        <div class="description">
	                            <p>等级: <?=TagExt::getNameByTag($info->level)?></p>
	                            <p>酒款数量: <?=count($info->products)?>款</p>
	                            <p>
	                                <br />
	                            </p>
	                            <p><a href="<?=$this->createUrl('/home/product/list',['house'=>$info->id])?>">查看全部酒款</a></p>
	                            <p>
	                                <br />
	                            </p>
	                        </div>
	                    </div>
	                </div>
	                <div class="clear"></div>
	            </div>
	            <div id="projectshow">
	                <div id="projecttags">
	                <!-- 此处是酒庄等级 -->
	                <?php $xls = TagExt::getTagArrayByCate('jzdj'); if($xls) foreach ($xls as $key => $value) {?>
	                	<a href="<?=$this->createUrl('list',['level'=>$key])?>" target="_blank"><?=$value?></a>
	                <?php } ?></div>
	                <div id="projectib" style="width: 25%">
	                <!-- 酒庄酒款 -->
	                <?php if($wines = $info->products) foreach (array_slice($wines, 0, 8) as $key => $value) {?>
	                	<div class="projectitem" style="width: 150px">
	                        <a href="<?=$this->createUrl('/home/product/info',['id'=>$value->id])?>" target="_blank">
	                            <span class="propost_img"><img src="<?=ImageTools::fixImage($value->image,150,200)?>"/></span>
	                            <div class="project_info">
	                                <div>
	                                    <p class="title"><?=$value->name?></p>
	                                    <p class="subtitle">￥<?=$value->price?></p>
	                                </div>
	                            </div>
	                        </a>
	                    </div>
	                <?php }?>
	                </div>
	            </div>
	            <div class="clear"></div>
	        </div>
	        <div id="pages"></div>
	        <div id="pageswitch">
	            <a href="http://mo004_376.mo4.line1.jsmo.xin/project/post/6946/" class="prev">
	                <!--img src="预留"/-->
	                <div>
	                    <h3 class="title">鲜柠香煎银鳕鱼</h3>
	                    <p class="subtitle">bacon-ranchero</p>
	                </div>
	            </a>
	            <a href="http://mo004_376.mo4.line1.jsmo.xin/project/post/6944/" class="next">
	                <!--img src="预留"/-->
	                <div>
	                    <h3 class="title">友禅什锦啫喱配美味汁</h3>
	                    <p class="subtitle">甜品</p>
	                </div>
	            </a>
	            <div class="clear"></div>
	        </div>
	    </div>
	</div>
</div>