function tidyhtml() {
  var html=$("#textEditor").contents().find("body").html();
  $("#textEditor").contents().find("h1:empty").replaceWith("");
  $("#textEditor").contents().find("h2:empty").replaceWith("");
  $("#textEditor").contents().find("h3:empty").replaceWith("");
  $("#textEditor").contents().find("h4:empty").replaceWith("");
  $("#textEditor").contents().find("h5:empty").replaceWith("");
  $("#textEditor").contents().find("h6:empty").replaceWith("");
  $("#textEditor").contents().find("p:empty").replaceWith("");
  $("#textEditor").contents().find("strike:empty").replaceWith("");
  $("#textEditor").contents().find("strong:empty").replaceWith("");
  $("#textEditor").contents().find("em:empty").replaceWith("");
  $("#textEditor").contents().find("sup:empty").replaceWith("");
  $("#textEditor").contents().find("sub:empty").replaceWith("");
  $("#textEditor").contents().find("q:empty").replaceWith("");
  $("#textEditor").contents().find("u:empty").replaceWith("");  


  $("#textEditor").contents().find("h1:has(br)").find("br").replaceWith("");  
  $("#textEditor").contents().find("h1:has(p)").find("p").contents().unwrap();
  $("#textEditor").contents().find("h1:has(h1)").find("h1").contents().unwrap();
  $("#textEditor").contents().find("h1:has(h2)").find("h2").contents().unwrap();
  $("#textEditor").contents().find("h1:has(h3)").find("h3").contents().unwrap();
  $("#textEditor").contents().find("h1:has(h4)").find("h4").contents().unwrap();
  $("#textEditor").contents().find("h1:has(h5)").find("h5").contents().unwrap();
  $("#textEditor").contents().find("h1:has(h6)").find("h6").contents().unwrap();

  $("#textEditor").contents().find("h2:has(br)").find("br").replaceWith(""); 
  $("#textEditor").contents().find("h2:has(p)").find("p").contents().unwrap();
  $("#textEditor").contents().find("h2:has(h1)").find("h1").contents().unwrap();
  $("#textEditor").contents().find("h2:has(h2)").find("h2").contents().unwrap();
  $("#textEditor").contents().find("h2:has(h3)").find("h3").contents().unwrap();
  $("#textEditor").contents().find("h2:has(h4)").find("h4").contents().unwrap();
  $("#textEditor").contents().find("h2:has(h5)").find("h5").contents().unwrap();
  $("#textEditor").contents().find("h2:has(h6)").find("h6").contents().unwrap();
  
  $("#textEditor").contents().find("h3:has(br)").find("br").replaceWith(""); 
  $("#textEditor").contents().find("h3:has(p)").find("p").contents().unwrap();
  $("#textEditor").contents().find("h3:has(h1)").find("h1").contents().unwrap();
  $("#textEditor").contents().find("h3:has(h2)").find("h2").contents().unwrap();
  $("#textEditor").contents().find("h3:has(h3)").find("h3").contents().unwrap();
  $("#textEditor").contents().find("h3:has(h4)").find("h4").contents().unwrap();
  $("#textEditor").contents().find("h3:has(h5)").find("h5").contents().unwrap();
  $("#textEditor").contents().find("h3:has(h6)").find("h6").contents().unwrap();
  
  $("#textEditor").contents().find("h4:has(br)").find("br").replaceWith(""); 
  $("#textEditor").contents().find("h4:has(p)").find("p").contents().unwrap();
  $("#textEditor").contents().find("h4:has(h1)").find("h1").contents().unwrap();
  $("#textEditor").contents().find("h4:has(h2)").find("h2").contents().unwrap();
  $("#textEditor").contents().find("h4:has(h3)").find("h3").contents().unwrap();
  $("#textEditor").contents().find("h4:has(h4)").find("h4").contents().unwrap();
  $("#textEditor").contents().find("h4:has(h5)").find("h5").contents().unwrap();
  $("#textEditor").contents().find("h4:has(h6)").find("h6").contents().unwrap();

  $("#textEditor").contents().find("h5:has(br)").find("br").replaceWith(""); 
  $("#textEditor").contents().find("h5:has(p)").find("p").contents().unwrap();
  $("#textEditor").contents().find("h5:has(h1)").find("h1").contents().unwrap();
  $("#textEditor").contents().find("h5:has(h2)").find("h2").contents().unwrap();
  $("#textEditor").contents().find("h5:has(h3)").find("h3").contents().unwrap();
  $("#textEditor").contents().find("h5:has(h4)").find("h4").contents().unwrap();
  $("#textEditor").contents().find("h5:has(h5)").find("h5").contents().unwrap();
  $("#textEditor").contents().find("h5:has(h6)").find("h6").contents().unwrap();
  
  $("#textEditor").contents().find("h6:has(br)").find("br").replaceWith(""); 
  $("#textEditor").contents().find("h6:has(p)").find("p").contents().unwrap();
  $("#textEditor").contents().find("h6:has(h1)").find("h1").contents().unwrap();
  $("#textEditor").contents().find("h6:has(h2)").find("h2").contents().unwrap();
  $("#textEditor").contents().find("h6:has(h3)").find("h3").contents().unwrap();
  $("#textEditor").contents().find("h6:has(h4)").find("h4").contents().unwrap();
  $("#textEditor").contents().find("h6:has(h5)").find("h5").contents().unwrap();
  $("#textEditor").contents().find("h6:has(h6)").find("h6").contents().unwrap();
  
  $("#textEditor").contents().find("p:has(p)").find("p").contents().unwrap();
  $("#textEditor").contents().find("p:has(h1)").find("h1").contents().unwrap();
  $("#textEditor").contents().find("p:has(h2)").find("h2").contents().unwrap();
  $("#textEditor").contents().find("p:has(h3)").find("h3").contents().unwrap();
  $("#textEditor").contents().find("p:has(h4)").find("h4").contents().unwrap();
  $("#textEditor").contents().find("p:has(h5)").find("h5").contents().unwrap();
  $("#textEditor").contents().find("p:has(h6)").find("h6").contents().unwrap();
  
  $("#textEditor").contents().find("li:has(p)").find("p").contents().unwrap();
  $("#textEditor").contents().find("li:has(h1)").find("h1").contents().unwrap();
  $("#textEditor").contents().find("li:has(h2)").find("h2").contents().unwrap();
  $("#textEditor").contents().find("li:has(h3)").find("h3").contents().unwrap();
  $("#textEditor").contents().find("li:has(h4)").find("h4").contents().unwrap();
  $("#textEditor").contents().find("li:has(h5)").find("h5").contents().unwrap();
  $("#textEditor").contents().find("li:has(h6)").find("h6").contents().unwrap();  
  

   if($.browser.msie)
 {
var IE1=document.frames['textEditor'].document.body.innerHTML;
document.frames['textEditor'].document.body.innerHTML=IE1.replace("<p>&nbsp;</p>","");
 }
 else
 {
var ff=window.frames['textEditor'].document.body.innerHTML;
window.frames['textEditor'].document.body.innerHTML=ff.replace("<p>&nbsp;</p>","");
}
  $("#addBackUp").click();
  $("#viewBackUp").click();
}

function findreplace(findword, replaceword) {

var findword=(findword);
var replaceword=(replaceword);

 if($.browser.msie)
 {
var IE1=document.frames['textEditor'].document.body.innerHTML;
document.frames['textEditor'].document.body.innerHTML=IE1.replace(findword,replaceword);
 }
 else
 {
var ff=window.frames['textEditor'].document.body.innerHTML;
window.frames['textEditor'].document.body.innerHTML=ff.replace(findword,replaceword);
}
  $("#addBackUp").click();
  $("#viewBackUp").click();
}