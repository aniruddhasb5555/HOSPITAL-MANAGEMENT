a=Array();
m="mainP/";
var i,n=7;
for(i=0;i<n;i++){
    a[i]=m+(i+1)+".jpg";
}
var current=0;
function imageChanger(va){
    if (va==1) {
        if(current==0){
            current=6;
        }
        else{
            current=current-1;
        }
    }
    else{
        if(current==6){
            current=0;
        }
        else{
            current=current+1;
        }

    } 
    document.getElementById("MID").src=a[current];
    return
}