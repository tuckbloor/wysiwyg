$("#inserttable").click(function(){
		   

    var width=$("#width").val();
	var rows=$("#rows").val();
	var cols=$("#cols").val();
	var border=$("#border").val();
	var tdwidth=(width/cols);
	
var i=0;
var c="<td width="+tdwidth+">&nbsp;</td>"; 
var y="<td width="+tdwidth+">&nbsp;</td>"; 
for (i=2;i<=cols;i++)
{
  c=c+y;
}

var i=0;
var x="<tr>" + c + "</tr>"; 
var y="<tr>" + c + "</tr>"; 
for (i=2;i<=rows;i++)
{
  x=x+y;
}
 var edit = document.getElementById("textEditor").contentWindow;

    edit.focus();

 $('#textEditor').contents().find('body').append("<table width="+width+" border="+border+"><tbody>" + x + "</tbody></table><br>"); 
        $("#addBackUp").click();
        $("#viewBackUp").click();
        tidyhtml();
    edit.focus();
	
$("#hidetable").hide();


    });