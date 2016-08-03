<?php if (!defined('THINK_PATH')) exit();?><div id="navber" style="position: relative; top: 0; height: auto;">
    <div class="wheader">
        <div class="header_b">
            <ul class="nav_new">
                
                    <li class="home"><a class="r_d" href="<?php echo U('Home/Index/index');?>">首页</a></li>
                
                <?php if(is_array($sort)): foreach($sort as $key=>$vo): if($_GET['id']== $vo['asortid']): ?><li><a class="r_d" href="<?php echo ($vo["url"]); ?>"><?php echo ($vo["aname"]); ?></a></li>
                        <?php else: ?>
                        <li><a href="<?php echo ($vo["url"]); ?>"><?php echo ($vo["aname"]); ?></a></li><?php endif; endforeach; endif; ?>
            </ul>
        </div>
    </div>
</div>