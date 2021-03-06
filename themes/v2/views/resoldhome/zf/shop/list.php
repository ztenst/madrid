<?php
Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl.'/static/resoldhome/style/list.css');
?>
<div class="wapper-out search-wrap clearfix">
    <div class="search-box clearfix">
        <div class="search-input fl">
            <input class="input" placeholder="输入区域、小区名称、学校名称找二手房">
        </div>
        <a class="btn fl" href="javascript:;">搜索</a>
        <div class="search-list-box">
            <ul>
                <li>
                    <span>大名城<em>新北三井</em></span>
                    <span class="right">约469条房源</span>
                </li>
                <li>
                    <span>大名城别墅<em>新北三井</em></span>
                    <span class="right">约469条房源</span>
                </li>
            </ul>
        </div>
        <?php $this->widget('CommonWidget',['type'=>1])?>
    </div>
</div>
<?php $this->widget('HomeBreadcrumbs',array('links'=>[SM::urmConfig()->cityName().'二手房','商铺出租列表']));?>
<div class="wapper">
     <div class="big-filter">
        <div class="tabs clearfix">
            <div class="btn-right">
                <a href="<?=$this->createUrl('/resoldhome/myesf/sellinput')?>">免费发布房源</a>
            </div>
            <ul class="clearfix">
              <li><a href="<?=$this->createUrl('list')?>" >按区域查询</a></li>
              <li><a href="" >按学校查询</a></li>
              <li><a href="" >切换到地图搜索</a></li>
              <li><a href="<?=$this->createUrl('list',['type'=>2])?>" class="on">商铺</a></li>
              <li><a href="<?=$this->createUrl('list',['type'=>3])?>">写字楼</a></li>
            </ul>
        </div>
        <div class="category-select">
            <dl class="clearfix">
              <dt>区域：</dt>
              <dd>
                <?php $this->widget('TagInfoWidget',['cate'=>'area','id'=>$get['area']?$get['area']:$get['street'],'get'=>$_GET,'url'=>'/resoldhome/zf/list'])?>
              </dd>
            </dl>
            <dl class="clearfix">
              <dt>面积：</dt>
              <dd>
                <?php $this->widget('TagInfoWidget',['cate'=>'zfspsize','id'=>$get['size'],'get'=>$_GET,'url'=>'/resoldhome/zf/list']);?>
              </dd>
            </dl>
            <dl class="clearfix">
              <dt>租金：</dt>
              <dd>
                  <?php $this->widget('TagInfoWidget',['cate'=>'zfspprice','id'=>$get['price'],'get'=>$_GET,'url'=>'/resoldhome/zf/list']);?>
              </dd>
            </dl>
            <dl class="clearfix">
              <dt>类型：</dt>
              <dd>
                <?php $this->widget('TagInfoWidget',['cate'=>'esfzfsptype','id'=>$get['cate'],'get'=>$_GET,'url'=>'/resoldhome/zf/list']);?>
              </dd>
            </dl>
            <dl class="clearfix">
              <dt>类别：</dt>
              <dd>
                <ul>
                  <li><a class="on">不限</a></li>
                  <li><a>商铺出租</a></li>
                </ul>
              </dd>
            </dl>
            <dl class="clearfix">
              <dt>特色：</dt>
              <dd>
                  <?php $this->widget('TagInfoWidget',['cate'=>'zfspts','id'=>$get['ts'],'get'=>$_GET,'url'=>'/resoldhome/zf/list']);?>
              </dd>
            </dl>
            <dl class="hascheck">
              <dt>当前选择条件：</dt>
              <dd>
                    <ul class="clearfix">
                        <?php if(array_filter($get))
                        foreach (array_filter($get) as $key => $value) {?>
                            <?php if($key=='area'||$key=='street'):
                                $tag = AreaExt::model()->findByPk($value);
                                $tmpGets = array_filter($get);
                                unset($tmpGets['area']);
                                unset($tmpGets['street']);
                            ?>
                            <li><a href="<?=$this->createUrl('list',array_filter($tmpGets))?>" class="k-select-1"><?=$tag->name?><i class="list-icon icon-12"></i></a></li>
                            <?php elseif($key=='source'):
                                $tag = Yii::app()->params['source'];
                                $tmpGets = array_filter($get);
                                unset($tmpGets['source']);
                            ?>
                            <li><a href="<?=$this->createUrl('list',array_filter($tmpGets))?>" class="k-select-1"><?=$tag[$value]?><i class="list-icon icon-12"></i></a></li>
                            <?php elseif($key=='kw'):
                                $tmpGets = array_filter($get);
                                unset($tmpGets['kw']);
                            ?>
                            <li><a href="<?=$this->createUrl('list',array_filter($tmpGets))?>" class="k-select-1"><?=$get[$key]?><i class="list-icon icon-12"></i></a></li>
                            <?php elseif($key=='hid'):
                                $tmpGets = array_filter($get);
                                unset($tmpGets['hid']);
                            ?>
                            <li><a href="<?=$this->createUrl('list',array_filter($tmpGets))?>" class="k-select-1"><?=$plot?$plot->title:'未知楼盘'?><i class="list-icon icon-12"></i></a></li>
                        <?php elseif($key != 'saletime' && $key != 'sort' && $key != 'type'):
                                $tag = TagExt::getNameByTag($value);
                                $tmpGets = array_filter($get);
                                unset($tmpGets[$key]);
                            ?>
                            <li><a href="<?=$this->createUrl('list',array_filter($tmpGets))?>" class="k-select-1"><?=$tag?><i class="list-icon icon-12"></i></a></li>
                            <?php endif;?>
                        <?php }?>
                            <li><a href="<?=$this->createUrl('list')?>" class="k-select-2"><i class="list-icon icon-clear"></i>清空所有条件</a></li>
                    </ul>
              </dd>
            </dl>

        </div>
    </div>
        <div class="blank20"></div>
        <div class="main-left">
            <div class="next-tabs clearfix">
                <div class="page-right">
                    <p><a href="/plot?page=3" title="下一页"><</a><span class="page"><em>2</em>/150</span><a href="/plot?page=1" title="上一页">></a></p>
                </div>
                <ul class="clearfix">
                  <li><a href="<?=$this->createUrl('/resoldhome/esf/list',['type'=>2])?>" >在售商铺</a></li>
                  <li><a href="<?=$this->createUrl('/resoldhome/zf/list',['type'=>2])?>" <?php if($get['type']==2 && !$get['source'] && !$get['hurry']):?>class="active"<?php endif;?>>在租商铺</a></li>
                  <li><a href="<?=$this->createUrl('list',['source'=>1,'type'=>2])?>" <?php if($get['source']==1):?>class="active"<?php endif;?> >个人房源</a></li>
                  <li><a href="<?=$this->createUrl('list',['source'=>2,'type'=>2])?>" <?php if($get['source']==2):?>class="active"<?php endif;?>>急售房源</a></li>
                </ul>
            </div>
            <div class="sort">
                <span>找到<em class="c-main"><?=$zfcount?></em>套商铺</span>

                <div class="filter fr mt8">
                    <div class="fl filter_sel dropdown open">
                        <a class="dropdown_toggle" data-toggle="dropdown"><?=$get['saletime']?$get['saletime'].'天内':'发布时间'?><span class="caret list-icon"></span></a>
                        <ul class="filter_sel_box dropdown-menu dn">
                            <?php $saleGet = array_filter($get);unset($saleGet['saletime'])?>
                            <?php $sortGet = array_filter($get);unset($sortGet['sort'])?>
                            <li><a href="<?=$this->createUrl('list',$saleGet)?>">不限</a></li>
                            <li><a href="<?=$this->createUrl('list',['saletime'=>1]+$saleGet)?>" >1天内</a></li>
                            <li><a href="<?=$this->createUrl('list',['saletime'=>3]+$saleGet)?>" >3天内</a></li>
                            <li><a href="<?=$this->createUrl('list',['saletime'=>7]+$saleGet)?>">7天内</a></li>
                        </ul>
                    </div>

                    <div class="pr fl">
                        <a href="<?=$this->createUrl('list',['sort'=>'2']+$sortGet)?>" class="sort-btn sort-<?=$get['sort']==2?'up':'down'?>">租金<i></i></a>
                        <div class="tips-notice">
                            <div class="tips-box"><?=$get['sort']==2?'点击按租金从低到高排序':'点击按租金从高到低排序'?></div>
                            <span class="bottom-arrow"><span></span></span>
                        </div>
                    </div>
                    <div class="pr fl">
                        <a href="<?=$this->createUrl('list',['sort'=>'6']+$sortGet)?>" class="sort-btn sort-<?=$get['sort']==6?'up':'down'?> fr">面积<i></i></a>
                        <div class="tips-notice">
                            <div class="tips-box"><?=$get['sort']==6?'点击按面积从小到大排序':'点击按面积从大到小排序'?></div>
                            <span class="bottom-arrow"><span></span></span>
                        </div>
                    </div>


                </div>
            </div>
            <ul class="item-list">
                <?php
                    if($zfs):
                        foreach($zfs as $k=>$v):
                ?>
                    <li class="item clearfix">
                        <div class="pic fl">
                            <a href="<?=$this->createUrl('info',['id'=>$v->id])?>"><img src="<?=ImageTools::fixImage($v->image)?>" alt="" /></a>
                            <span class="num">
                                <span class="img-count"><?=$v->image_count?></span>
                                <span class="list-icon"></span>
                            </span>
                        </div>
                        <div class="content fl">
                            <p class="title"><a href="<?=$this->createUrl('info',['id'=>$v->id])?>"><?=$v->title?></a></p>
                            <p class="area"><a href=""><?=$v->area?$v->areaInfo->name:''?></a><span class="maps"><?=$v->street?$v->streetInfo->name:''?></span></p>
                            <p class="detail"><span>类型：
                                <?php
                                    $conf = CJSON::decode($v->data_conf);
                                    echo isset($conf['esfsplevel'])?TagExt::getNameByTag($conf['esfsplevel']):'';
                                ?>
                            </span><em>|</em><span><?=isset($conf['esffloorcate'])?TagExt::getNameByTag($conf['esffloorcate']):''?></span></p>
                            <p class="agents">
                                <a href=""><?=$v->username?></a><span><?=Tools::friendlyDate($v->refresh_time)?></span>
                            </p>
                            <?php $zfts = [1=>'zfzzts',2=>'zfspts',3=>'zfxzlts']; $colorArr = ['green','pink','blue','green','pink','blue','green','pink','blue'];$data_conf = json_decode($v->data_conf,true);$ts = [];
                                if(isset($data_conf[$zfts[$get['type']]])){
                                    $ts = TagExt::getNameByTag($data_conf[$zfts[$get['type']]]);
                                }

                            ?>
                            <p class="tags">
                                <?php
                                    if($ts):
                                        $i = 0;
                                        foreach($ts as $key=>$value):
                                ?>
                                <span class="<?=$colorArr[$i]?>"><?=$value?></span>
                                <?php
                                        $i++;
                                        endforeach;

                                    endif;
                                ?>
                            </p>

                            <div class="area-detail"><p><?=$v->size?>㎡</p><p class="tag">建筑面积</p></div>
                            <div class="about-price">
                                  <p class=""><em class="prices"><?=$v->wuye_fee?></em>元/㎡·天</p>
                                  <p class="tag"><?=$v->price?>元/月</p>
                             </div>
                        </div>
                    </li>
                    <?php
                            endforeach;
                        endif;
                    ?>


                </ul>
                <div class="blank20"></div>
                <div class="page-box">
                    <?php $this->widget('HomeLinkPager', array('pages'=>$pager)) ?>
                </div>
        </div>
        <div class="main-right">
            <div class="frame side-box">
                <div class="stitle">
                    <span>二手房资讯</span>
                </div>
                <?php $this->widget('RightWidget',['type'=>'news','limit'=>8])?>
            </div>

            <div class="blank20"></div>

            <div class="gg-type80">
                <ul>
                    <li><a href=""><img src="images/gg1.jpg" data-bd-imgshare-binded="1"></a></li>
                </ul>
            </div>
            <div class="gg-type210">
                <ul>
                    <li><a href=""><img src="images/gg2.jpg" data-bd-imgshare-binded="1"></a></li>
                    <li><a href=""><img src="images/gg2.jpg" data-bd-imgshare-binded="1"></a></li>
                    <li><a href=""><img src="images/gg2.jpg" data-bd-imgshare-binded="1"></a></li>
                </ul>
            </div>
        </div>

            </div>

        </div>
      </div>
</div>
