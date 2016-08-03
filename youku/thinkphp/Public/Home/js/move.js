function startMove (obj, json, fn)
{
    $(obj).stop();
    clearInterval(timer);
    var timer = setInterval(function ()
    {
        var bStop = true;
        $.each(json, function (name, value)
        {
            var iSpeed;
            if (name == 'opacity') {
                var opaValue = $(obj).css(name);
                iSpeed=(value - opaValue)*100/8;
            } else {
                var nowValue = parseInt($(obj).css(name));
                iSpeed=(value - nowValue)/5;
                //  速度
                iSpeed=iSpeed>0?Math.ceil(iSpeed):Math.floor(iSpeed);
            }

            //3.检测停止
            if(nowValue != value)
            {
                bStop=false;
            }
            //  设置 值
            if (name == 'opacity') {
                $(obj).css(name, (opaValue + iSpeed)/100);
            }else {
                $(obj).css(name, nowValue + iSpeed);
            }
        });

        if(bStop)
        {
            clearInterval(timer);
            if(fn)
            {
                fn();
            }
        }
    }, 30)
}