var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
    	if (this.readyState == 4 && this.status == 200) {

    		var myObj = JSON.parse(this.responseText);
            // var myObj = this.responseText;
            // document.body.innerHTML = myObj;
    		
    	for(var i=0; i<myObj.length; i++)
    	{
    		var header = document.createElement("h2");
    		header.innerHTML = "Фризьорски салон " + myObj[i].name;
    		document.getElementById("body").appendChild(header);
            var divContainer = document.createElement("div");
            var containerClass = document.createAttribute("class");
            containerClass.value = "container";
            divContainer.setAttributeNode(containerClass);
            var containerID = document.createAttribute("id");
            containerID.value = "hairdressingSalon";
            divContainer.setAttributeNode(containerID);
            document.getElementById("body").appendChild(divContainer);
            for(var j=0; j<4; j++)
            {
                var newImg = document.createElement("img");
                var source = document.createAttribute("src");
                source.value = "img/" + myObj[i].id + "_" + j + "hair.jpg";
                newImg.setAttributeNode(source);
                var imgClass = document.createAttribute("class");
                imgClass.value = "displayImg mySlides";
                newImg.setAttributeNode(imgClass);
                document.getElementById("hairdressingSalon").appendChild(newImg);
            }
            var infDiv = document.createElement("div");
            var infDivClass = document.createAttribute("class");
            infDivClass.value = "information";
            infDiv.setAttributeNode(infDivClass);
            document.getElementById("hairdressingSalon").appendChild(infDiv);

            var addrParagraph = document.createElement("p");
            var addrIcon = document.createElement("i");
            var addrClass = document.createAttribute("class");
            addrClass.value = "fa fa-map-marker";
            addrIcon.setAttributeNode(addrClass);
            var addrStyle = document.createAttribute("style");
            addrStyle.value = "font-size: 32px";
            addrIcon.setAttributeNode(addrStyle);
    
            addrParagraph.appendChild(addrIcon);
            var addrText = document.createTextNode("   " + myObj[i].address);
            addrParagraph.appendChild(addrText);
            infDiv.appendChild(addrParagraph);

            var phoneParagraph = document.createElement("p");
            var phoneIcon = document.createElement("i");
            var phoneClass = document.createAttribute("class");
            phoneClass.value = "fa fa-phone";
            phoneIcon.setAttributeNode(phoneClass);
            var phoneStyle = document.createAttribute("style");
            phoneStyle.value = "font-size: 32px";
            phoneIcon.setAttributeNode(phoneStyle);
            phoneParagraph.appendChild(phoneIcon);
            var phoneText = document.createTextNode("   " + myObj[i].telephone);
            phoneParagraph.appendChild(phoneText);
            infDiv.appendChild(phoneParagraph);

            var mailParagraph = document.createElement("p");
            var mailIcon = document.createElement("i");
            var mailClass = document.createAttribute("class");
            mailClass.value = "fa fa-envelope";
            mailIcon.setAttributeNode(mailClass);
            var mailStyle = document.createAttribute("style");
            mailStyle.value = "font-size: 32px";
            mailIcon.setAttributeNode(mailStyle);
            mailParagraph.appendChild(mailIcon);
            var mailText = document.createTextNode("   " + myObj[i].email);
            mailParagraph.appendChild(mailText);
            infDiv.appendChild(mailParagraph);

            var descrDiv = document.createElement("div");
            var descrID = document.createAttribute("id");
            descrID.value = "description";
            descrDiv.setAttributeNode(descrID);

            var descrPara = document.createElement("p");
            var descrParaClass = document.createAttribute("class");
            descrParaClass.value = "label";
            descrPara.setAttributeNode(descrParaClass);
            var descrParaText = document.createTextNode("Описание:");
            descrPara.appendChild(descrParaText);
            
            descrDiv.appendChild(descrPara);
            var descrDivText = document.createTextNode(myObj[i].description);
            descrDiv.appendChild(descrDivText);
            divContainer.appendChild(descrDiv);
            document.getElementById("body").appendChild(divContainer);

            var slideshowDiv = document.createElement("div");
            var slideshowDivClass = document.createAttribute("class");
            slideshowDivClass.value = "w3-row-padding w3-section";
            slideshowDiv.setAttributeNode(slideshowDivClass);
            var slideshowDivStyle = document.createAttribute("style");
            slideshowDivStyle.value = "float: clear";
            slideshowDiv.setAttributeNode(slideshowDivStyle);
            document.getElementById("body").appendChild(slideshowDiv);

            for(var j=0; j<4; j++)
            {
                var slideDivImg = document.createElement("div");
                var slideDivImgClass = document.createAttribute("class");
                slideDivImgClass.value = "w3-col s3";
                slideDivImg.setAttributeNode(slideDivImgClass);
                slideshowDiv.appendChild(slideDivImg);

                var slideImg = document.createElement("img");
                var slideImgClass = document.createAttribute("class");
                slideImgClass.value = "demo w3-opacity w3-hover-opacity-off";
                slideImg.setAttributeNode(slideImgClass);
                var slideImgStyle = document.createAttribute("style");
                slideImgStyle.value = "border-radius: 10px;height:200px;width:100%;cursor:pointer";
                slideImg.setAttributeNode(slideImgStyle);
                var slideImgSrc = document.createAttribute("src");
                slideImgSrc.value = "img/" + myObj[i].id + "_" + j + "hair.jpg";
                slideImg.setAttributeNode(slideImgSrc);
                var slideImgEvent = document.createAttribute("onclick");
                var current = j + 1;
                slideImgEvent.value = "currentDiv(" + current + ")";
                slideDivImg.setAttributeNode(slideImgEvent);
                slideDivImg.appendChild(slideImg);
                slideshowDiv.appendChild(slideDivImg);
            }

    	}
  	}
	};
	xhttp.open("POST", 'getForViewHairdressing.php', true);
  	xhttp.send();