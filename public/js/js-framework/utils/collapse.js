var arrowUp    = '<i class="fa fa-angle-up"></i>';
var arrowDown  = '<i class="fa fa-angle-down"></i>';

function AnimateRotate(d, element){
    $({deg: 0}).animate({deg: d}, {
        step: function(now, fx){
            $( element).css({
                 transform: "rotate(" + now + "deg)"
            });
        }
    });
}

$(document).delegate(".collapse-effect", "click", function(){
    var element = $(this);
    var elementToCollapse = element.attr("data-target");
    var elementCollapsed  = element.attr("collapsed"); 
    $(elementToCollapse).slideToggle();
    
    if(elementCollapsed == "true"){
        element.html(arrowDown);
        element.attr("collapsed", "false"); 
        AnimateRotate(360, element);
    }else{
        element.html(arrowUp); 
        element.attr("collapsed", "true"); 
    }
});