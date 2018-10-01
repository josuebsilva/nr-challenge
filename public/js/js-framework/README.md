# js-framework

Http

Example

    var http = new Http(url);
    http.setMethod(http.Method.POST);
    http.setDataType("json");
    http.setHeaders({
        "Accept":"application/json",
        "Content-Type":"application/json"
    });
    http.setBody(body);
    http.Request(callback);
    
Alert

    var alert = new Alert();
    alert.setMessage("Hi! :)");
    alert.setType(AlertType.SUCCESS);
    alert.setContainer("#my-div");
    alert.show();
    
    // if you need clear alert, call clear(), look. 
    alert.clear();


Util/Collapse

    How use. 
    Import script in html and import font-awesome 
    <script defer src="assets/js-framework/collapse.js"></script>

    Add in tags
    <div class="collapse-effect" data-target="#panel" collapsed="true"><i class="fa fa-angle-up"></i></div>

    <div id="panel"></div>
