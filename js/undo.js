var b_ackup = new Array(); //Store data in Array
var undo_pos= 0;//Position of undo
var flag = false;// shall we start new undo thread and delete obsolete items?
var w_isiwig;//editor interface

function init(){
w_isiwig = document.getElementById("textEditor");
w_isiwig.contentEditable = true;
//w_isiwig.onkeyup = HandleKeys;
b_ackup[0] = w_isiwig.contentWindow.document.body.innerHTML;
backup();
}

function HandleKeys(evt) {//events to write to backup
//backup();
}


function backup(){
if (flag){// action if undo was clicked

var removed= b_ackup.splice(flag,b_ackup.length - flag);
for (var i = 0; i < removed.length; i++) {
delete removed[i];//delete obsolete array items
}

b_ackup[b_ackup.length] = w_isiwig.contentWindow.document.body.innerHTML;
undo_pos = b_ackup.length - 1;
flag = false;


}
else{//write to backup array
w_isiwig = document.getElementById("textEditor");
b_ackup[b_ackup.length] = w_isiwig.contentWindow.document.body.innerHTML;
undo_pos = b_ackup.length - 1;
flag = false;
}
}

function undo(){

if (b_ackup.length){

if(undo_pos==0)//{w_isiwig.contentWindow.document.body.innerHTML.focus();return;}// beginning of backup items

if(flag == false){backup();}// save last state of document

w_isiwig.contentWindow.document.body.innerHTML=b_ackup[undo_pos -1];

undo_pos=undo_pos - 1;

flag = undo_pos +1;

look();

}
}

function redo(){
if(undo_pos == b_ackup.length -1){w_isiwig.contentWindow.document.body.innerHTML;return;}
//end of backup array

w_isiwig.contentWindow.document.body.innerHTML=b_ackup[undo_pos +1];

undo_pos=undo_pos + 1;

flag = undo_pos +1;
look();
w_isiwig = document.getElementById("textEditor");
w_isiwig.contentWindow.document.body.innerHTML;

}

function look(){// monitor our Array data
var e='flag:'+flag+'\r\nundo_pos:'+undo_pos+'\r\n';
e+='b_ackup.length:'+b_ackup.length+'\r\n';
for (i=0; i<b_ackup.length; i++){

e+= 'backup item '+i+':'+b_ackup[i]+'\r\n';
}
document.getElementById('bup_a').value=e;
}