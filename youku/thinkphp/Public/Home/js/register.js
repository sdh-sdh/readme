$(function ()
{
    //  点击更换验证码
    $('#verifyCode').click(function ()
    {
        $(this).attr('src', 'verify?rand=' + Math.random());
    });

    var checkPwd = 0;
    var checkPhone = 0;

    /**
     *      手机号
     */
    $('#phone').blur(function ()
    {
        checkPhone = 0;
        var that = $(this);
        var reg = /^1\d{10}$/;
        var res = reg.test($(this).val());

        if (that.val() == '' || !res)
        {
            that.next().removeClass('glyphicon glyphicon-ok').addClass('glyphicon glyphicon-remove')
                .parent().parent().removeClass('has-success').addClass('has-error');
            return;
        } else
        {
            that.next().removeClass('glyphicon glyphicon-remove').addClass('glyphicon glyphicon-ok')
                .parent().parent().removeClass('has-error').addClass('has-success');
            checkPhone = 1;
        }

        //ajax 验证手机号是否重复
        $.post(checkPhoneUrl, {phone: that.val()}, function (msg)
        {
            if (msg == '1')
            {
                that.next().removeClass('glyphicon glyphicon-remove').addClass('glyphicon glyphicon-ok')
                    .parent().parent().removeClass('has-error').addClass('has-success');
                checkPhone = 1
            } else
            {
                that.next().removeClass('glyphicon glyphicon-ok').addClass('glyphicon glyphicon-remove')
                    .parent().parent().removeClass('has-success').addClass('has-error');
                checkPhone = 0;
            }
        }, 'html');
    });


    var pwd1 = null;
    $('#password1').bind('keyup blur', function (e)
    {
        checkPwd = 0;
        if (e.which == 9)
        {
            return;
        }
        if ($(this).val() == '')
        {
            $(this).next().removeClass('glyphicon glyphicon-ok').addClass('glyphicon glyphicon-remove')
                .parent().parent().removeClass('has-success').addClass('has-error');
            $('button[type=submit]').attr('disabled', 'disabled').removeClass('btn-warning')
                .addClass('btn-default');
            checkPwd = 0;
        } else
        {
            $(this).next().removeClass('glyphicon glyphicon-remove').addClass('glyphicon glyphicon-ok')
                .parent().parent().removeClass('has-error').addClass('has-success');
            pwd1 = $(this).val();
        }
    });

    $('#password2').bind('keyup blur', function () {
        var that = $(this);
        if (that.val() == pwd1) {
            that.next().removeClass('glyphicon glyphicon-remove').addClass('glyphicon glyphicon-ok')
                .parent().parent().removeClass('has-error').addClass('has-success');
            checkPwd = 1;
            //  调用确定按钮激活函数
            activeSubmit();
        } else if (that.val() != pwd1 || that.val() == '') {
            that.next().removeClass('glyphicon glyphicon-ok').addClass('glyphicon glyphicon-remove')
                .parent().parent().removeClass('has-success').addClass('has-error');
            checkPwd = 0;
        }
    });

    /**
     *  提交按钮被点击
     */
    $('#normalSub').click(function () {
        var info = $('#regForm').serialize();

        $.post(checkRegisterUrl, info, function (msg)
        {
            console.log(typeof msg);
            if (msg == 1) {
            	location.href = UCenterUrl;
            }
        }, 'json');
        return false;
    });


    /*
     * 确定按钮激活函数
     */
    function activeSubmit()
    {
        if (checkPwd && checkPhone)
        {
            $('#normalSub, #companySub').removeAttr('disabled').removeClass('btn-default').addClass('btn-warning');
        }
    }



});