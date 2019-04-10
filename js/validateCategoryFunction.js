function validateCat()
			{
				var catArray = ["Приятели" ,"Младоженци" , "Кумове", "сем.Петрови" ];
				var selectCode="";
				var selectHTML="";
				var temp=document.getElementById("catInput").value;
				if(temp=="")
				{
					alert("Името на категорията е задължително!");
					for(var i=0; i<catArray.length; ++i)
					{
						selectHTML= '<option value="">' +
						catArray[i] + 
						'</option>';
						
						selectCode=selectCode+selectHTML;
					}
				}
				else
				{
					catArray.push(temp);
					for(var i=0; i<catArray.length; ++i)
					{
						selectHTML= '<option value="">' +
						catArray[i] + 
						'</option>';
						
						selectCode=selectCode+selectHTML;
					}
					alert("Категорията е добавена успешно!");
				}
				document.getElementById("group").innerHTML=selectCode;
			}
