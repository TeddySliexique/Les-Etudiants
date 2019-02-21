var mot="";

function Recherche(event){
  var x= event.key;
    mot = mot+x;
  var xhr= new XMLHttpRequest();
  xhr.onreadystatechange = function(){
    if(xhr.readyState == 4 && xhr.status == 200){
    }
  };
  xhr.open('GET','recherche.php?prenom='+mot);

  xhr.send();
}
