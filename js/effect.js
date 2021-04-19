document.addEventListener('DOMContentLoaded', ()=>{

    let navs = document.getElementsByClassName("nav");

    
    for(nav of navs){
        nav.addEventListener("mouseover", (e)=>{
            e.target.style.backgroundColor = "rgb(31, 88, 194)";
            e.target.style.color = "white";
        });
        nav.addEventListener("mouseout", (e)=>{
            e.target.style.backgroundColor = "cornflowerblue";
            e.target.style.color = "black";
        });
    }
    
    /*
    document.getElementById("registra").addEventListener("mouseover", (e)=>{
        e.target.style.backgroundColor = "rgb(167, 156, 156)";
        e.target.style.color = "white";
    });
    
    document.getElementById("registra").addEventListener("mouseout", (e)=>{
        e.target.style.backgroundColor = "white";
        e.target.style.color = "black";
    });
*/

    console.log(document.getElementsByClassName("inviaModulo")[0]);

    document.getElementsByClassName("inviaModulo")[0].addEventListener("mouseover", (e)=>{
        e.target.style.backgroundColor = "rgb(167, 156, 156)";
        e.target.style.color = "white";
    });

    document.getElementsByClassName("inviaModulo")[0].addEventListener("mouseout", (e)=>{
        e.target.style.backgroundColor = "white";
        e.target.style.color = "black";
    });




}); 

