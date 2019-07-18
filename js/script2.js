function deroulTxt(){

    console.log("mon cul sur la commode");

    $("tbody",this).slideToggle("slow");

    $("tbody").not($("tbody",this)).slideUp();
}
//--------------------------------------------------------------------------------------
$(".listeCommandes").click(deroulTxt);