<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8" />
<title>Ajax Image Upload</title>
<link href="css/layout.css" style="text/css" rel="stylesheet" />
<link href="css/editor.css" style="text/css" rel="stylesheet" />
<script type="text/javascript" src="scripts/jquery.min.js"></script>
<script type="text/javascript" src="scripts/jquery.form.js"></script>
<script src="js/undo.js"></script>

</head>
<div id="container">
<body id = "body" onload= "init();">
  <script type="text/javascript" >
 $(document).ready(function() { 
 
  document.getElementById('textEditor').contentWindow.document.designMode="on";
  document.getElementById('textEditor').contentWindow.document.close();
    
  $('#photoimg').live('change', function(){ //upload an image
  $("#preview").html('');
  $("#preview").html('<img src="images/loader.gif" alt="Uploading...."/>');
  $("#imageform").ajaxForm({
  target: '#preview'
  }).submit();

   loadedDirectory=$(".active p").attr("id");
   

setTimeout(function() {  
  $("#"+loadedDirectory+"").dblclick();
  $("#preview").hide();

 },5000);//gives us a delay for image to be uploaded



});//ends the image uploader

//add the border around the image if clicked so that we know where uploaded images will be going
  $(".media_images").click(function() {
  dir_name = $(this).text();
  $("#directory").attr("value", dir_name);
  $(".media_images").children().removeClass("active");
  $(this).children().addClass("active");
});


//if we double click on the folder images then display all images in the folder
  $(".media_images").live("dblclick" ,function() {
    $("#images").fadeIn(1000);
    $(".media_images").fadeIn(1000);
  dir_name = $(this).text();

  $.ajax({
    type: "POST",
    url: "ajaxshowimage.php",
    data: { directory: dir_name }
   }).done(function( data ) {
   // alert( "Data Saved: " + data );
    $(".images").html(data);
  });
   
});

  $("#close").click(function() {
    $("#images").fadeOut(1000);
  });

$("#uploadImage").click(function(){
  $("#media").fadeIn(1000);
});

$("#closemedia").click(function() {
  $("#media").fadeOut(1000); 
});

//get the attributes from the inputs
  $(".image").live("click",function() {//if we click on an image
  src = ($(this).attr("src"));
   width = $(this).closest('tr').find('.width').val();
   height = $(this).closest('tr').find('.height').val();
   directory = $(this).closest('tr').find('.directory').val();
   style = $(this).closest('tr').find('.style').val();
   style = style.replace(/\s/g, "");
   alt = $(this).closest('tr').find('.alt').val();
   alt = alt.replace(/\s/g, "-");
  
   $("#textEditor").contents().find('body').append("<img src="+src+" alt="+alt+" width="+width+" height="+height+" style="+style+" />"); 
   $("#addBackUp").click();
   $("#viewBackUp").click();
   tidyhtml();
});

// if we click on the delete folder icon then delete the image after we confirm
  $(".delete").live("click",function() {
  data = $(this).attr('alt');
  if (confirm('Are You Sure You Want To Delete This Image')) {
  $.ajax({
    type: "POST",
    url: "delete.php",
    data: { deleteimage: data }
   }).done(function( data ) {
//after we click the delete and confirm we reload the directory
    dir_name = $(".directory").val();

    $.ajax({
    type: "POST",
    url: "ajaxshowimage.php",
    data: { directory: dir_name }
   }).done(function( data ) {
   // alert( "Data Saved: " + data );
    $(".images").html(data);
  });

  });
  }
 });  

//insert into text editor


$("#boldIt").click(function(){
    var edit = document.getElementById("textEditor").contentWindow;
    edit.focus();
    edit.document.execCommand("bold", false, "");
    $("#addBackUp").click();
    $("#viewBackUp").click();
    tidyhtml();
    edit.focus();
});

$("#link").click(function(){
    var mylink = prompt("Enter a URL:", "http://");
    if ((mylink != null) && (mylink != "")) {
    document.getElementById('textEditor').contentWindow.document.execCommand("CreateLink",false,mylink);
    $("#addBackUp").click();
    $("#viewBackUp").click();
  }
});

$("#unlink").click(function() {
    document.getElementById('textEditor').contentWindow.document.execCommand("unlink", false , "");
    $("#addBackUp").click();
    $("#viewBackUp").click();
    tidyhtml();
});

$("#doImage").click(function() {
    myimg = prompt('Enter Image URL:', 'http://');
    if(myimg !='')
    {
      var edit = document.getElementById('textEditor').contentWindow;
      edit.focus();
      edit.document.execCommand('InsertImage', false, myimg);
      $("#addBackUp").click();
      $("#viewBackUp").click();
      tidyhtml();
      edit.focus();
 }
});

$("#justifyright").click(function(){
     var edit = document.getElementById("textEditor").contentWindow;
     edit.focus();
     edit.document.execCommand("justifyright", false, "");
    $("#addBackUp").click();
    $("#viewBackUp").click();
    tidyhtml();
    edit.focus();
});

$("#justifycenter").click(function(){
    var edit = document.getElementById("textEditor").contentWindow; 
    edit.focus();
    edit.document.execCommand("justifycenter", false, "");
    $("#addBackUp").click();
    $("#viewBackUp").click();
    tidyhtml();
    edit.focus();
});

$("#justifyleft").click(function(){
    var edit = document.getElementById("textEditor").contentWindow;
    edit.focus();
    edit.document.execCommand("justifyleft", false, "");
    $("#addBackUp").click();
    $("#viewBackUp").click();
    tidyhtml();
    edit.focus();
});

$("#insertorderedlist").click(function(){
    var edit = document.getElementById("textEditor").contentWindow;
    edit.focus();
    edit.document.execCommand("insertorderedlist", false, "");
    $("#addBackUp").click();
    $("#viewBackUp").click();
    tidyhtml();
    edit.focus();
});//ends ol


$("#insertunorderedlist").click(function(){
    var edit = document.getElementById("textEditor").contentWindow;
    edit.focus();
    edit.document.execCommand("insertunorderedlist", false, "");
    $("#addBackUp").click();
    $("#viewBackUp").click();
    tidyhtml();
    edit.focus();
});

$("#ItalicIt").click(function(){ 
   var edit = document.getElementById("textEditor").contentWindow;
   edit.focus();
   edit.document.execCommand("italic", false, "");
   $("#addBackUp").click();
   $("#viewBackUp").click(); 
   tidyhtml();
   edit.focus();
});

$("#underlineIt").click(function(){ 
   var edit = document.getElementById("textEditor").contentWindow;
   edit.focus();
   edit.document.execCommand("underline", false, "");
   $("#addBackUp").click();
   $("#viewBackUp").click();
   tidyhtml();
   edit.focus();
});

 $("#tidyhtml").click(function(){
  tidyhtml();
 });

  $("#table").click(function(){
  $("#hidetable").fadeIn(1000);
  $("#addBackUp").click();
  $("#viewBackUp").click();
  tidyhtml();
 });


  $("#close2").click(function(){
    $("#hidetable").fadeOut(1000);
  })

 $("#savehtml").click(function(){
 var html = $("#textEditor").contents().find("body").html();
 alert(html);
 })
$("#removemarkup").click(function() {
    var edit = document.getElementById("textEditor").contentWindow;
        edit.focus();
        edit.document.execCommand ("RemoveFormat", false, ""); 
        $("#addBackUp").click();
        $("#viewBackUp").click();
        tidyhtml();
        edit.focus();
});


function changeFont(font)
{
     var edit = document.getElementById("textEditor").contentWindow;
     edit.focus();
     edit.document.execCommand("FontName", false, font);
     $("#addBackUp").click();
     $("#viewBackUp").click();
     tidyhtml();
     edit.focus();
}

function changeColor(color)
{
    var edit = document.getElementById("textEditor").contentWindow;
    edit.focus();
    edit.document.execCommand("ForeColor", false, color);
    $("#addBackUp").click();
    $("#viewBackUp").click();
    tidyhtml();
    edit.focus();
}


function fsize(fsize)
{
    var edit = document.getElementById("textEditor").contentWindow;
    edit.focus();
    edit.document.execCommand("fontsize",false, fsize);
    $("#addBackUp").click();
    $("#viewBackUp").click();
    tidyhtml();
    edit.focus();
}

function removemarkup() {
    var edit = document.getElementById("textEditor").contentWindow;
    edit.focus();
    edit.document.execCommand ("RemoveFormat", false, ""); 
    $("#addBackUp").click();
    $("#viewBackUp").click();
    tidyhtml();
    edit.focus();
}


    
    $("#textEditor").contents().find("body").keydown(function(e){
     if (e.keyCode == '32') {
          $("#addBackUp").click();
          $("#viewBackUp").click();
       
        HandleKeys();
          }
       if (e.keyCode == '20') {
        alert("Caps Lock Was Pressed");
          }
          if (e.keyCode == '8') {
         $("#addBackUp").click();
         $("#viewBackUp").click();
         
        HandleKeys();
          }   
          if (e.keyCode == '9') {
         $("#addBackUp").click();
         $("#viewBackUp").click();
        
        HandleKeys();
          }
          if (e.keyCode == '16') {
        $("#addBackUp").click();
        $("#viewBackUp").click();
      
        HandleKeys();
          }    
          if (e.keyCode == '46') {
        $("#addBackUp").click();
        $("#viewBackUp").click();
        tidyhtml();
        HandleKeys();
          }   
          if (e.keyCode == '13') {
        $("#addBackUp").click();
        $("#viewBackUp").click();
       
        HandleKeys();
          }                   
});
 //drop downs

  $("#fonts").change(function(){
    changeFont($("#fonts").val());
  });  

   $("#color").change(function(){
     changeColor($("#color").val());
  });

   $("#heading").change(function(){
     changeHeading($("#heading").val());
  });

   $("#fsize").change(function(){
     fsize($("#fsize").val());
   });

   $("#tag").change(function(){
     tag($("#tag").val());
   });

   //drop down functions
   function fsize(fsize) {
   var edit = document.getElementById("textEditor").contentWindow;
   edit.focus();
   edit.document.execCommand("fontsize",false, fsize);
   $("#addBackUp").click();
   $("#viewBackUp").click();
   tidyhtml();
   edit.focus();
  }

  function changeColor(color) {
  var edit = document.getElementById("textEditor").contentWindow;
  edit.focus();
  edit.document.execCommand("ForeColor", false, color);
  $("#addBackUp").click();
  $("#viewBackUp").click();
  tidyhtml();
  edit.focus();
  }



function fsize(fsize) {
    var edit = document.getElementById("textEditor").contentWindow;
    edit.focus();
    edit.document.execCommand("fontsize",false, fsize);
    $("#addBackUp").click();
    $("#viewBackUp").click();
    tidyhtml();
    edit.focus();
 }

function changehead() {
  var heading=$("#heading").val();
  changeHeading(heading);
}

function changeHeading(heading) {
  
var browser=navigator.appName;

if(browser=="Opera")
{
var needle  = window.frames['textEditor'].getSelection().getRangeAt(0);
    var haystack = $('#textEditor').contents().find("body").html();
    var newText = haystack.replace(needle,"<"+heading+">"+needle+"</"+heading+">");
    $('#textEditor').contents().find("body").html(newText);
}

 else  if($.browser.version == 9 ){
 //added meta tag to make it thin it its ie 8
        } 
 else  if($.browser.msie && $.browser.version == 7 || $.browser.version == 8)
  {
        Selection = window.frames['textEditor'].document.selection.createRange().htmlText.replace(/<(?:.|\n)*?>/gm, '');

      window.frames['textEditor'].document.selection.createRange().pasteHTML("<"+heading+">"+Selection+"</"+heading+">");
    
        $("#textEditor").contents().find(heading).unwrap();
        }
  else
      {
      var range = window.frames['textEditor'].getSelection().getRangeAt(0);
        var newNode = document.createElement(heading);
        range.surroundContents(newNode);
    $("#textEditor").contents().find(heading).unwrap();
    }
      
      $("#textEditor").contents().find(heading+":has(p)").find("p").contents().unwrap();
      $("#textEditor").contents().find(heading+":has(h1)").find("h1").contents().unwrap();
      $("#textEditor").contents().find(heading+":has(h2)").find("h2").contents().unwrap();
      $("#textEditor").contents().find(heading+":has(h3)").find("h3").contents().unwrap();
      $("#textEditor").contents().find(heading+":has(h4)").find("h4").contents().unwrap();
      $("#textEditor").contents().find(heading+":has(h5)").find("h5").contents().unwrap();
      $("#textEditor").contents().find(heading+":has(h6)").find("h6").contents().unwrap();

       // document.getElementById('heading').outerHTML = '<select id="heading" class="select" onChange="changehead();" ><option value="">Heading</option><option value="p">Paragraph</option><option value="h1">H1</option><option value="h2">H2</option><option value="h3">H3</option><option value="h4">H4</option><option value="h5">H5</option><option value="h6">H6</option></select>';  
    
  $("#addBackUp").click();
  $("#viewBackUp").click();
  tidyhtml();
}

////////////////////////////////////////change tags
function tag(tag) {

  if($.browser.msie && $.browser.version == 7 || $.browser.version == 8 || $.browser.version == 9)
  {
       Selection = window.frames['textEditor'].document.selection.createRange().htmlText.replace(/<(?:.|\n)*?>/gm, '');

       window.frames['textEditor'].document.selection.createRange().pasteHTML("<"+tag+">"+Selection+"</"+tag+">");

  }
  else
      {
      var range = window.frames['textEditor'].getSelection().getRangeAt(0);
        var newNode = document.createElement(tag);
        range.surroundContents(newNode);
      }
  //   document.getElementById('tag').outerHTML = '<select id="tag" class="select" onChange="changetag();"><option value="Markup">Markup</option><option value="strong" class="strong">Strong</option><option value="strike" class="strike">Strike</option><option value="em" class="em">Emphasise</option><option value="u" class="underline">Underline</option><option value="sub" class="sub">Sub</option><option value="sup" class="sup">Sup</option><option value="q">&quot;Quote&quot;</option><option value="mark" class="mark">Mark</option></select>';
     // backup();
  $("#addBackUp").click();
  $("#viewBackUp").click();
  tidyhtml();
}


 $("#code").click(function () {
    var ret = $('#textEditor').contents().find('body').html();
    $('#textEditor').contents().find('body').text(ret);
    $("#code").hide();
    $("#design").show();
    $('input').attr("disabled", true);
    $('select').attr("disabled", true);
});

$("#design").click(function () {
   var ret = $('#textEditor').contents().find('body').text();
   $('#textEditor').contents().find('body').html(ret);
   $("#code").show();
   $("#design").hide();
   $('input').attr("disabled", false); 
   $('select').attr("disabled", false);
 });

 $(".media_images").first().click();

}); 
</script>
<div style="display: none;">
<a href="#" id="addBackUp" onclick='backup(); return false' >[add to backup]</a> 
<a href="#" id="viewBackUp" onclick='look();' >[view backup-data]</a>
</div>
<div id="container">
	<?php
if(isset($_POST['submit'])) {//if we press create directory
$dir=trim($_POST['directory']);//get the posted directory to create name
if(file_exists("uploads/$dir")) {// if that directory already exists
   echo "That Directory Exists";// tell us it exists
 }
else {
     mkdir("uploads/$dir");//ok so its a a directory that does not exist so lets create it
     chmod("uploads/$dir", 0775);
   }
} 
?>



<div class="imageWrapper">
<?php 
  include "includes/media.php";//include the  folders
?>
</div>
<div class="clearing"></div>
<div id="rel">
<div id="images">
<img src="images/icons/close.png" alt="close" id="close" width="60" style="float: right;"/>
<div class="images"></div><!--load images-->
</div>
</div>
<img src="images/icons/ol.jpg" alt="ol" id="insertorderedlist" width="40" height="40" />
<img src="images/icons/ul.jpg" alt="ul" id="insertunorderedlist" width="40" height="40" />
<img src="images/icons/bold.jpg" alt="bold" id="boldIt" width="40" height="40" />
<img src="images/icons/link.jpg" alt="link" id="link" width="40" height="40" />
<img src="images/icons/unlink.jpg" alt="un-link" id="unlink" width="40" height="40" />
<img src="images/icons/image.jpg" alt="image" id="doImage" width="40" height="40" />
<img src="images/icons/upload.jpg" alt="upload" id="uploadImage" width="40" height="40" />

<img src="images/icons/left.jpg" alt="left" id="justifyleft" width="40" height="40" />
<img src="images/icons/center.jpg" alt="center" id="justifycenter" width="40" height="40" />
<img src="images/icons/right.jpg" alt="right" id="justifyright" width="40" height="40" />
<img src="images/icons/italic.jpg" alt="italic" id="ItalicIt" width="40" height="40" />
<img src="images/icons/table.png" alt="table" id="table" width="40" height="40" />
<img src="images/icons/underline.jpg" alt="underline" id="underlineIt" width="40" height="40"/>
<img src="images/icons/undo.png" alt="undo" width="40" height="40" id="undo" onclick='setTimeout("undo()",1)' />
<img src="images/icons/redo.png" alt="redo" width="40" height="40" id="redo" onclick='setTimeout("redo()",1)' />
<img src="images/icons/remove.png" alt="remove markup" width="40" height="40" id="removemarkup" />
<img src="images/icons/tidy.png" alt="tidy html" width="40" height="40" id="tidyhtml" />
<img src="images/icons/save.png" alt="save html" width="40" height="40" id="savehtml" />
<img src="images/icons/html.png" alt="html" width="40" height="40" id="code" title="view in code view" />
<img src="images/icons/text.png" alt="design" width="40" height="40" id="design" title="view in design view" />
<div class="clearing"></div>


<div class="selectdiv styled-select">
<select id="fonts" class="select" title="select font">
 <option value="">Font</option>
 <option value="Arial" class="arial">Arial</option>

 <option value="Comic Sans MS" class="cosmic">Comic Sans MS</option>

 <option value="Courier New" class="courier">Courier New</option>

 <option value="Monotype Corsiva" class="monotype">Monotype</option>

 <option value="Tahoma" class="tahoma">Tahoma</option>

 <option value="Times">Times</option>

 </select>

</div>
<div class="selectdiv styled-select">

<select id="color" class="select" title="select font colour">
 <option value="">Colour</option>
 <option value="blue" class="blue">Blue</option>

 <option value="red" class="red">red</option>

 <option value="black">black</option>

 <option value="yellow" class="yellow">yellow</option>

 <option value="green" class="green">green</option>

 <option value="purple" class="purple">purple</option>

 </select>
</div>

<div class="selectdiv styled-select">
<select id="heading" class="select" title="select heading" >
 <option value="" >Heading</option>
 <option value="p">Paragraph</option>

 <option value="h1">H1</option>

 <option value="h2">H2</option>

 <option value="h3">H3</option>

 <option value="h4">H4</option>

 <option value="h5">H5</option>
 
  <option value="h6">H6</option>

 </select>
 </div>

<div class="selectdiv styled-select">
 <select id="fsize" class="select" title="select font size">

 
 <option value="1" class="one">Font Size 8pt</option>

 <option value="2" class="two">Font Size 10pt</option>

 <option value="3" class="three">Font Size 12pt</option>

 <option value="4" class="four">Font Size 14pt</option>

 <option value="5" class="five">Font Size 18pt</option>

 <option value="6" class="six">Font Size 24pt</option>

 <option value="7" class="seven">Font Size 36pt</option>
 </select>
 </div>


<div class="selectdiv styled-select">
 <select id="tag" class="select" title="select markup">
 <option value="">Markup</option>
 <option value="strong" class="strong">Strong</option>
 <option value="strike" class="strike">Strike</option>
 <option value="em" class="em">Emphasise</option>
 <option value="u" class="underline">Underline</option>
 <option value="sub" class="sub">Sub</option>
 <option value="sup" class="sup">Sup</option>           
 </select>
</div>

     <iframe name="textEditor" id="textEditor" width="980" height="300" ></iframe>
    
<div id="bup">
  <textarea id="bup_a" name="bup_a" cols="80" rows="6"></textarea>
</div>
<div style="position: relative">
  <div id="hidetable">
      <p>
        <label>Width</label>
        <input type="text" name="width" id="width" value="300" />
      </p>
      <p>
        <label>Border</label>
        <input type="text" name="border" id="border" value="1" />
      </p>
      <p>
        <label>Rows</label>
        <input type="text" name="rows" id="rows" value="3" />
      </p>
      <p>
        <label>Cols</label>
        <input type="text" name="cols" id="cols" value="4" />
      </p>
      <p>
        <label>Insert Table</label>
        <input type="submit" name="inserttable" id="inserttable" value="Add Table" title="click to add the table" />
      </p>
      </form>
     <img src="images/icons/close.png" alt="close" id="close2" width="60" style="float: right;"/>
    </div>
   </div> 
    <!--hide table-->
    <script>
 //<![CDATA[    
	   $("#design").hide();
     $("#images").hide();
     $("#bup").hide();
     $("#media").hide();
     $("#hidetable").hide();
//]]>
    </script>
    <script src="js/tidyHTML.js"></script>
    <script src="js/table.js"></script>
</div>
</div><!--ends container-->
</body>
</html>