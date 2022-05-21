let numberImage = 2;
let numberLeftImage = 1;
let numberRightImage = 3;
const countImage = 4;
const countDiv = 90;
const speed = 20;
const litleSpeed = 10;

function generateImage()
{
	let widthDiv = 500 /countDiv
	let image = "Img/Me"+numberImage+".jpg"
	let miniWithDiv = 250/countDiv
	for(let i =0; i<countDiv; i++)
	{
		let item=$("<div></div>");
		item.addClass("me");
		item.css("width",widthDiv+"px");
		item.css("background-image", 'url('+image+')');
		item.css("background-size",'500px');
		item.css("background-position-x", - i * widthDiv + "px");

		$("#mainImage").append(item);
	}

	for(let i =0; i<countDiv; i++)
	{
		let item=$("<div></div>");
		item.addClass("leftMe");
		item.css("width",miniWithDiv+"px");
		item.css("background-image", 'url('+"Img/Me"+numberLeftImage+".jpg"+')');
		item.css("background-size",'250px');
		item.css("background-position-x", - i * miniWithDiv + "px");

		$("#leftImage").append(item);
	}

	for(let i =0; i<countDiv; i++)
	{
		let item=$("<div></div>");
		item.addClass("rightMe");
		item.css("width",miniWithDiv+"px");
		item.css("background-image", 'url('+"Img/Me"+numberRightImage+".jpg"+')');
		item.css("background-size",'250px');
		item.css("background-position-x", - i * miniWithDiv + "px");

		$("#rightImage").append(item);
	}
}

function cangeImageReverse () {
    
    let image = "Img/Me"+numberImage+".jpg"
    let i = 1;
        
    $($("#mainImage div").get().reverse()).each(function(){

    	$(this).fadeOut(speed*i, function() {
        	$(this).css("background-image",'url('+image+')');
        	$(this).fadeIn(speed*i);
        });
        i++;

    });

    $($("#rightImage div").get().reverse()).each(function(){

    	$(this).fadeOut(litleSpeed*i, function() {
        	$(this).css("background-image",'url('+"Img/Me"+numberRightImage+".jpg"+')');
        	$(this).fadeIn(litleSpeed*i);
        });
        i++;

    });

    $($("#leftImage div").get().reverse()).each(function(){

    	$(this).fadeOut(litleSpeed*i, function() {
        	$(this).css("background-image",'url('+"Img/Me"+numberLeftImage+".jpg"+')');
        	$(this).fadeIn(litleSpeed*i);
        });
        i++;

    });
}

function cangeImage () {
    
    let image = "Img/Me"+numberImage+".jpg"
    let i = 1;
        
    $("#mainImage div").each(function(){

    	$(this).fadeOut(speed*i, function() {
        	$(this).css("background-image",'url('+image+')');
        	$(this).fadeIn(speed*i);
        });
        i++;

    });

    $("#leftImage div").each(function(){

    	$(this).fadeOut(litleSpeed*i, function() {
        	$(this).css("background-image",'url('+"Img/Me"+numberLeftImage+".jpg"+')');
        	$(this).fadeIn(litleSpeed*i);
        });
        i++;

    });

    $("#rightImage div").each(function(){

    	$(this).fadeOut(litleSpeed*i, function() {
        	$(this).css("background-image",'url('+"Img/Me"+numberRightImage+".jpg"+')');
        	$(this).fadeIn(litleSpeed*i);
        });
        i++;

    });
}

function leftCangeImage() 
{
	if(numberImage > 1)
		numberImage--;
	else
		numberImage = countImage;

	if(numberLeftImage > 1)
		numberLeftImage--;
	else
		numberLeftImage = countImage;

	if(numberRightImage > 1)
		numberRightImage--;
	else
		numberRightImage = countImage;

	cangeImageReverse ()
}

function rightCangeImage()
{
	if(numberImage < countImage)
		numberImage++;
	else
		numberImage = 1;

	if(numberLeftImage < countImage)
		numberLeftImage++;
	else
		numberLeftImage = 1;

	if(numberRightImage < countImage)
		numberRightImage++;
	else
		numberRightImage = 1;

	cangeImage ()
}

$( document ).ready(function() {
    generateImage();
});
