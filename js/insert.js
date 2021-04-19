

document.addEventListener('DOMContentLoaded', inserimentoDatiFattura(), false); 



function inserimentoDatiFattura(){
        let InserimentoFatturaBtn = document.getElementById("insertFattura");
        InserimentoFatturaBtn.addEventListener("click", ()=>{
        let descArt = document.getElementsByClassName("select_desc");
        let descArr = "";
        let qtArr = "";
        for(desc of descArt){
            descArr += `${desc.value} `;
        }
        let qtaArt = document.getElementsByClassName("qtaArt");
        for(qta of qtaArt){
            qtArr += `${qta.value} `;
        }
        descArr = descArr.trim().split(' ');
        qtArr = qtArr.trim().split(' ');
        //chiamata ajax
        let insertFatturaRequest = new XMLHttpRequest();
        insertFatturaRequest.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("contenitoreForm").innerHTML = this.responseText;

            }else{
            }
          };
          insertFatturaRequest.open("POST", "inserimentoAjax.php", true);
          insertFatturaRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          insertFatturaRequest.send(`select_desc=${descArr}&qtaArt=${qtArr}`);
    });
}



















