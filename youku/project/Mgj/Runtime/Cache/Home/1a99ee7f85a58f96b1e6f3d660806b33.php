<?php if (!defined('THINK_PATH')) exit(); if($l == 1): ?><li class="person-center">
        <a href="<?php echo U('Home/Userinfo/userinfo');?>">个人中心</a>
        <ul class="list-group">
            <li class="list-group-item">
                <a href="<?php echo U('Home/User/loginOut');?>">退出登录</a>
            </li>
        </ul>
    </li>

    <?php else: ?>
    <li><a href="<?php echo U('Home/User/login');?>">登录</a></li>
    <li><a href="<?php echo U('Home/user/register');?>">注册</a></li><?php endif; ?>