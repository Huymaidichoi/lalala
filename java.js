var index = 1;
changImg = function(){
    var imgs = ["./IMG/Anhchuyen/1.png","./IMG/Anhchuyen/2.gif","./IMG/Anhchuyen/3.jpg","./IMG/Anhchuyen/4.jpg","./IMG/Anhchuyen/5.png","./IMG/Anhchuyen/6.jpg"];
    document.getElementById('anhcchuyen').scr = imgs[index];
    index++;
    if(index==6){
        index = 0;
    }
}
setInterval(changImg,2000);