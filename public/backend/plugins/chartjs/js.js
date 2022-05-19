const xmlhttp = new XMLHttpRequest();
const url = "{{route('api.browser')}}";
xmlhttp.open("GET",url, true);
xmlhttp.send();
xmlhttp.onreadystatechange = function(){
   if(this.readyState == 4 && this.status == 200){
   const dataapi = JSON.parse(this.responseText);
  //  console.log(data)
const browser = dataapi.map(function(elem){
    return elem.browser;
});
// console.log(browser)
const sessions = dataapi.map(function(elem){
    return elem.sessions;
});


    }
}