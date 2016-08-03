<?php if (!defined('THINK_PATH')) exit();?><div class="row" style="margin: 0">
    <?php if(is_array($good)): foreach($good as $key=>$vo): ?><div class="media" style="background: white;padding: 4px">
            <a class="pull-left" href="#">
                <img class="media-object" src="<?php echo ($vo["goodpic"]); ?>" style="width: 64px; height: 64px;">
            </a>
            <div class="media-body">
                <b class="media-heading"><?php echo ($vo["goodname"]); ?></b><br>
                颜色：<?php echo ($vo["颜色"]); ?>，尺码：<?php echo ($vo["尺码"]); ?> <br>
                <span style="color: #C81623">¥<?php echo ($vo["Price"]); ?></span>
                ×
                <span><?php echo ($vo["num"]); ?></span>
                <span skuid="<?php echo ($vo["skuid"]); ?>" data-url="<?php echo U('Home/Cart/delCart');?>" class="glyphicon glyphicon-trash pull-right hover-pointer"></span>
            </div>
        </div><?php endforeach; endif; ?>
</div>
<a href="<?php echo U('Home/Cart/index');?>" id="rcPayBtn" type="button" class="btn btn-danger col-xs-12" style="margin-top: 10px">
    去购物车结算
</a>
<script>
    /**
     * 	购物车删除按钮
     *
     */
    $('.glyphicon-trash').on('click', function() {
        var skuid =$(this).attr('skuid');
        var url = $(this).attr('data-url');
        var that = $(this);
        $.get(url, {skuid: skuid}, function(msg) {

            if (msg == '1') {
                var a = that.prev().text();
                $('.numCircle').text(function(i, v){
                    return parseInt(v)-a;
                });
                that.parent().parent().fadeOut().remove();
                CartNum();
            }
        }, 'html');
    });
    var CartNum = function(){
        $('#rcPayBtn').text(function(){
            var num = $('.numCircle').text();
            if (num == '0') {
                return '购物车有个神马啊';
            }
        });
    };
    CartNum();
</script>