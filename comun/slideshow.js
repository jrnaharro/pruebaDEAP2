// JavaScript Document
var dimages=new Array();
var numImages=7;
for(i=0;i<numImages; i++)
{
	dimages[i]=new Image();
	dimages[i].src="Imagenes/slide/image"+(i+1)+".jpg";
}
var curImage=-1;

function swapPicture(){
	var enlace = document.getElementById("hrefslide");		
	if(document.images){
		var nextImage=curImage+1;
		if(nextImage>=numImages) nextImage=0;
		if(dimages[nextImage] && dimages[nextImage].complete){
			var target=0;
			if(document.images.myImage) target=document.images.myImage;
			if(document.all && document.getElementById("myImage")) target=document.getElementById("myImage");
			if(target){
				target.src=dimages[nextImage].src;
				switch(nextImage){
					case 0: enlace.href = "http://www.sinodocoriacaceres.es"; break;
					case 1: enlace.href = "http://www.portantos.es"; break;
					case 2: enlace.href = "https://www.dropbox.com/s/8b9x17jido8k79n/Baldosa%20a%20Baldosa%20reverso.pdf"; break;
					case 3: enlace.href = "http://www.sinodocoriacaceres.es/p/temas-de-trabajo-de-los-grupos-sinodales.html"; break;
					case 4: enlace.href = "http://www.portantos.es"; break;
					case 5: enlace.href = "http://www.unseminarioabierto.org"; break;
					case 6: enlace.href = "https://www.dropbox.com/s/ihvgikqnzh92irv/CadenaOracion.apk"; break;										
				}
				curImage=nextImage;				
			}
			setTimeout("swapPicture()",7000);
		}
		else
		{
			setTimeout("swapPicture()",200);
		}
	}
}

setTimeout("swapPicture()",7000);