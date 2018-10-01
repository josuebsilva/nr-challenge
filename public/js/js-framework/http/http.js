function Http(url){
    var method = null;
    var host = url;
    var body = null;
    var headers = null;
    var dataType = null;

    this.setMethod = function(param){
        method = param;
    };

    this.GoTo = function(url){
        window.location.href = url;
    };

    this.setHost = function(param){
        host = param;
    };

    this.setBody = function(param){
        body = param;
    };

    this.setDataType = function(param){
        dataType = param;
    };

    this.setHeaders = function(param){
        headers = param;
    };

    this.Request = function(callback){
        $.ajax({
            url: host,
            data: body,
            type: method,
            headers: headers,
            dataType: dataType,
            success: function (dadaRest) {
                callback(dadaRest, null);
            },
            error: function (jqXHR, exception) {
                callback(jqXHR, exception);
            }
        });
    };

    this.Method = {
        POST: "POST",
        GET: "GET",
        DLETE: "DELETE",
        PUT: "PUT"
    }

    this.Status = {
        ERROR: 400,
        OK: 200,
        INTERNAL_ERROR:500
    }
}