 	var box = document.querySelector('.imageWall');
    var lenth = 24;
    var count = 0;
    var imglist = [];
    var line = 3;
    function initImg(i){
    	
        var img = document.createElement('img');
        img.src = ' ../img/pics/pics('+i+').jpg';
        imglist.push(img);
        box.appendChild(img);
        img.onload = function(){
              //图片乱序加载
            img.pst = img.width/img.height;
            count++;
            console.log(img.pst);
            if(count == lenth){
                fomate();
            }
        }
   }
    for(var i=1;i<lenth+1;i++){
        initImg(i);
    }
    function fomate(){
        var row = Math.floor(lenth/line);
        for(var i = 0; i<row;i++){
            var w = 0;
            for(var j=0;j<line;j++){
                w+=imglist[i*line+j].pst*300;//单张以300为高度
                console.log(imglist[i*line+j]);
            }
            
            var h = 1200*300/w;
            console.log(w);
            console.log(h);
            for(var j=0;j<line;j++){
                imglist[i*line+j].style.height = h +'px';
                imglist[i*line+j].style.width = h * imglist[i*3+j].pst + 'px'; 
            }
        }
    }	