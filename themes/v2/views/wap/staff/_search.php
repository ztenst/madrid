 <div class="search">
    <form action="<?php echo $this->createUrl('/wap/staff/list')?>">
        <input type="submit" value="搜索" />
        <div class="search-l">
            <input type="hidden" name="status" value="<?php echo Yii::app()->request->getQuery('status',''); ?>">
            <input id="" type="text" name="kw" placeholder="姓名/电话号码/尾号4位"/>
        </div>
    </form>
</div>
