function getParam(param){
  var result = window.location.search.match(new RegExp("(\\?|&)" + param + "(\\[\\])?=([^&]*)"));
  return result ? result[3] : false
}

//var view = getParam("view")
//$("#contenido").load(`views/${view}.php`);