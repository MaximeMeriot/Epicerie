$(document).ready(function () {
    // console.log("hefkjf");
var qty  = 1
$(".more").on("click",function (e) { 
    // console.log("more");
    var idx = $(".more").index(this);
    var stock = $("input:hidden:eq(" + idx + ")").val()
    // qty = $(".qty:eq("+idx+")").val();
    if (qty<stock) {
        qty++
        $(".qty:eq("+idx+")").val(qty)
    }
    
});

$(".more").on("mouseenter",function (e) {
    // console.log("hover");
    var idx = $(".more").index(this);
    // console.log("this is hover index",idx);
    // console.log("this is hover value",$(".qty:eq("+idx+")").val());
    
    if ($(".qty:eq("+idx+")").val() ==1) {
       qty = 1   
    }
    
})


$(".less").on("click",function (e) { 
    // console.log("less");
    var idx = $(".less").index(this);
    var qty = $(".qty:eq("+idx+")").val();    
    console.log(qty);
    
    var idx = $(".less").index(this);
    if (qty > 1) {
        qty--
        $(".qty:eq("+idx+")").val(qty)
    }
    
});
    
$(".order").on("click",function (e) { 
    e.preventDefault()
    var input = $(".qty");
    var values  = []
    for (var i = 0; i < input.length; i++) {
        //
        // console.log("this is value", $(".qty:eq("+i+")").val());
        values.push($(".qty:eq("+i+")").val())
        
        
    }
    
    console.log("this is array", values);
var value = 5
    $.ajax({
        type: "POST",
        url: "Model/CartModelajax.php",
        data:{value: value},
        success: function (response) {
            
        }
        
    });
    // $.ajax({
    //     type: "POST",
    //     url: "../Model/CartModelajax.php",
    //     data:{values:values},
    //     success: function (response) {
    //         $("span").append(response);
    //     }
        
    // });
  
   
});
    // var input = $(".qty");

    // var count
    // input.on("click", function (e) {
    //     console.log(e);
        
    //     $("select option").remove();
    //     var idx = input.index(this);

    //     var stock = $("input:hidden:eq(" + idx + ")").val()

    //     for (var i = 0; i < stock; i++) {
    //         count = i + 1
    //         $("select").append("<option value=" + count + ">" + count + "</option>");
    //     }

    // });

    // input.on("change", function (e) {
    //     console.log(e);
        
    //     var idx = input.index(this);
    //     console.log("ID : " + idx);
        

    //     var qty = $(this).val();
    //     var price = $("h5.price:eq(" + idx + ")").text().slice(1)
    //     // console.log($("h5.price:eq(" + idx + ")").text().slice(1))
    //     var subtotal = qty * price
    //     console.log(subtotal);
        
    //     console.log($(this).val())
    //     $("span.more:eq(" + idx + ")").text("qty: "+qty+" ")
    //     $("span.subtotal:eq(" + idx + ")").text("total: $"+subtotal)

    // });

});