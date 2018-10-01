/**
 * Created by Cypher on 6/12/2017.
 */
var TypeAlert = {
    SUCCESS: "success",
    ERROR: "danger",
    INFO: "info",
    WARNING: "warning"
};

function Alert(){

    var select       = null;
    var typeAlert    = null;
    var messageAlert = null;

    this.setType = function(type){
        typeAlert = type;
    };

    this.setMessage = function(message){
        messageAlert = message;
    };

    this.setContainer = function (where) {
        select = where;
    };

    this.show = function () {
        var alert = "<div class='alert alert-"+typeAlert+"'>"+messageAlert+"</div>";
        $(select).html(alert);
    };

    this.clear = function () {
        $(select).html("");
    };
}