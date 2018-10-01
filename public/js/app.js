var alert = new Alert();
jQuery(function($){
    getBiddings();
})

function getBiddings(){
    alert.setMessage("Verificando base de dados...");
    alert.setType("info");
    alert.setContainer(".bidding-list");
    alert.show();

    request("/getbiddings", CallBackBiddingsRequest)
}

function CallBackBiddingsRequest(response){
    showContent(response.responseText);
}

function extractBiddings(){
    alert.setMessage("Efetuando varredura...");
    alert.setType("info");
    alert.setContainer(".bidding-list");
    alert.show();

    request("/extract", CallBackBiddingsExtract)
}

function CallBackBiddingsExtract(response){
    
    if(response.message == "ok"){
        getBiddings();
    }else{
        alert.setMessage(response.error);
        alert.setType("error");
        alert.setContainer(".bidding-list");
        alert.show();
    }
}

function request(url, callback){
    $("#loading").show();

    var http = new Http(url);
    http.setMethod(http.Method.GET);
    http.setDataType("json");
    http.Request(callback);
}

function showContent(content){
    $('.bidding-list').html(content);
    $('#loading').hide();
}