$(document).ready(function () {
    // console.log("hefkjf");
    
    var qty = $(".qty").val();
    // console.log(qty);
    
    var phpQty = 10;
    $(".less").on("click", function () {
        // console.log("less");
        
        if (qty > 1) {
            qty--;
        }
        console.log( $(".qty").val(qty));
    });
    
    $(".more").on("click", function () {
        // console.log("more");
          if (qty < phpQty) {
              qty++;
          }
        console.log( $(".qty").val(qty));
    });
    
});