function submitEvent(){
    var select = document.getElementById("numFattura");
    select.addEventListener("change", (e)=>{
    e.target.parentElement.submit();
});
}

document.addEventListener('DOMContentLoaded', submitEvent(), false); 
