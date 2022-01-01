



function init2(canvas,ctx){
	var mainImage2 = new Image();
	mainImage2.onload = function(){
		ctx.drawImage(mainImage2,0,0);
		ctx.stroke();
	};
	mainImage2.src="./test2.jpg";


}
function init(){
	var canvas = document.getElementById('is');
	var ctx = canvas.getContext('2d');

	var mainImage = new Image();
	canvas.width = 85*window.innerWidth/100;
	canvas.height = 50*window.innerHeight/100;
	mainImage.onload = function(){
		ctx.drawImage(mainImage,0,0);
		ctx.stroke();
	};
	mainImage.src="./test.jpg";


	setTimeout(function(){init2(canvas,ctx);},2500);
}




//fillstyle
//fillrect

