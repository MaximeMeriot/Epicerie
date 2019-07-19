function deroulTxt(){

    console.log("mon cul sur la commode");

    $("tbody",this).slideToggle(1);
    $(".thead-light",this).slideToggle(1);

    // $("tbody").not($("tbody",this)).slideUp();
    // $(".thead-light").not($(".thead-light",this)).slideUp();
}
//--------------------------------------------------------------------------------------
$(".listeCommandes").click(deroulTxt);