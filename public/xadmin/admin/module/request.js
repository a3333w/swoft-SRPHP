layui.define(['jquery'], function(exports){
    var $ = layui.jquery;
    var obj = {
        ajax: function (url, type, dataType, data, callback, errorfunction) {
            $.ajax({
                url: url,
                type: type,
                dataType: dataType,
                data: data,
                // beforeSend: before,
                success: callback,
                error: errorfunction
            });
        }
    };
    //输出接口
    exports('request', obj);
});