$(document).ready(function () {
    // console.log("hefkjf");

     
     var input = $(".qty");
    
     
     var count 
    input.on("click", function (e) {
        $("select option").remove();
        var idx = input.index(this);      
    
     var stock = $("input:hidden:eq("+idx+")").val()
     console.log(stock);
     console.log(e);

     for (var i = 0; i < stock; i++) {
         count = i + 1
         $("select").append("<option value="+count+">"+count+"</option>");         
     }
    
    });
    
    input.on("change", function (e) {
        var idx = input.index(this);      
    
        var qty = $(this).val();
         console.log($(this).val())
         $("span.more:eq("+idx+")").text(qty)
  
    });
    
});