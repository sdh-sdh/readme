<?php if (!defined('THINK_PATH')) exit();?><div id="rightCart" class="rightCart" style="display: none">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-1 clear-padding font-16" style="text-align: center;background: black">
                <ul class="list-group">
                    <li class="list-group-item"></li>
                    <li data-url="<?php echo U('Home/Cart/ajaxRequestCart');?>" class="list-group-item showCart hover-pointer">
                        <span class="glyphicon glyphicon-shopping-cart" style="margin-top: 10px"></span>
                        购物车
                        <div class="numCircle"><?php echo ($cartnum); ?></div>
                    </li>
                    <li class="list-group-item"></li>
                    <li class="list-group-item"></li>
                    <li class="list-group-item">
                        <span id="toTop" class="glyphicon glyphicon-plane hover-pointer" style="margin-top: 10px">
                            <span class="font-8">TOP</span>
                        </span>
                    </li>
                </ul>
            </div>
            <div id="CartInfo" class="col-xs-11" style="margin-top: 50px;">

            </div>
        </div>
    </div>
</div>