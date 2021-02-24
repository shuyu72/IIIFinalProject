var msg="                                   自種自營、嚴選果物                                   ";
var interval = 100;
var space10="";
var seq=0;
function Scroll() { 
    document.tmForm.tmText.value = msg.substring(seq, msg.length) + space10 + msg.substring(0, msg.length);
    seq++; seq++; 
    if(seq >msg.length) { 
        seq=0 
    }
    window.setTimeout("Scroll();", interval )
} 