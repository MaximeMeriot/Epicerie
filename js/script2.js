function deroulTxt(){

    console.log("mon cul sur la commode");

    $("tbody",this).slideToggle("slow");
    $(".thead-light",this).slideToggle("slow");

    $("tbody").not($("tbody",this)).slideUp();
    $(".thead-light").not($(".thead-light",this)).slideUp();
}
//--------------------------------------------------------------------------------------
$(".listeCommandes").click(deroulTxt);