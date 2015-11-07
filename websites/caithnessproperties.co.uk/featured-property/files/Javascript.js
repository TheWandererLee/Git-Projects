function Search()
{

    var minbeds, minprice, maxprice, department, location
    minbeds = document.getElementById("MinBeds").value
    minprice = document.getElementById("MinPrice").value
    maxprice = document.getElementById("MaxPrice").value
    department = document.getElementById("Department").value
    location = document.getElementById("Location").value
	var pg;
    if (department == 5)
    	pg = "/lettings";
    else
    	pg = "/sales";
    document.location = pg + ".html?dep=" + department + "&minprice=" + minprice + "&maxprice=" + maxprice + "&Areas=" + location + "&minbeds=" + minbeds
}
function Lettings_Prices()
{
	document.getElementById("MinPrice").options.length = 0
	var oItem
	
	oItem = document.createElement("Option");                
	oItem.text = "No Minimum";  //Textbox's value
	oItem.value = "";  //Textbox's value
	document.getElementById("MinPrice").options.add(oItem);	

	oItem = document.createElement("Option");                
	oItem.text = "100PCM";  //Textbox's value
	oItem.value = 100;  //Textbox's value
	document.getElementById("MinPrice").options.add(oItem);
	oItem = document.createElement("Option");                
	oItem.text = "200PCM";  //Textbox's value
	oItem.value = 200;  //Textbox's value
	document.getElementById("MinPrice").options.add(oItem);
	oItem = document.createElement("Option");                
	oItem.text = "300PCM";  //Textbox's value
	oItem.value = 300;  //Textbox's value
	document.getElementById("MinPrice").options.add(oItem);
	oItem = document.createElement("Option");                
	oItem.text = "400PCM";  //Textbox's value
	oItem.value = 400;  //Textbox's value
	document.getElementById("MinPrice").options.add(oItem);
	oItem = document.createElement("Option");                
	oItem.text = "500PCM";  //Textbox's value
	oItem.value = 500;  //Textbox's value
	document.getElementById("MinPrice").options.add(oItem);
	oItem = document.createElement("Option");                
	oItem.text = "600PCM";  //Textbox's value
	oItem.value = 600;  //Textbox's value
	document.getElementById("MinPrice").options.add(oItem);
	oItem = document.createElement("Option");                
	oItem.text = "700PCM";  //Textbox's value
	oItem.value = 700;  //Textbox's value
	document.getElementById("MinPrice").options.add(oItem);
	oItem = document.createElement("Option");                
	oItem.text = "800PCM";  //Textbox's value
	oItem.value = 800;  //Textbox's value
	document.getElementById("MinPrice").options.add(oItem);
	oItem = document.createElement("Option");                
	oItem.text = "900PCM";  //Textbox's value
	oItem.value = 900;  //Textbox's value
	document.getElementById("MinPrice").options.add(oItem);
	oItem = document.createElement("Option");                
	oItem.text = "1000PCM";  //Textbox's value
	oItem.value = 1000;  //Textbox's value
	document.getElementById("MinPrice").options.add(oItem);
	oItem = document.createElement("Option");                
	oItem.text = "1250PCM";  //Textbox's value
	oItem.value = 1250;  //Textbox's value
	document.getElementById("MinPrice").options.add(oItem);
	oItem = document.createElement("Option");                
	oItem.text = "1500PCM";  //Textbox's value
	oItem.value = 1500;  //Textbox's value
	document.getElementById("MinPrice").options.add(oItem);
	oItem = document.createElement("Option");                
	oItem.text = "1750PCM";  //Textbox's value
	oItem.value = 1750;  //Textbox's value
	document.getElementById("MinPrice").options.add(oItem);
	oItem = document.createElement("Option");                
	oItem.text = "2000PCM";  //Textbox's value
	oItem.value = 2000;  //Textbox's value
	document.getElementById("MinPrice").options.add(oItem);	
	
	document.getElementById("MaxPrice").options.length = 0

	oItem = document.createElement("Option");                
	oItem.text = "No Maximum";  //Textbox's value
	oItem.value = "";  //Textbox's value
	document.getElementById("MaxPrice").options.add(oItem);	

	oItem = document.createElement("Option");                
	oItem.text = "100PCM";  //Textbox's value
	oItem.value = 100;  //Textbox's value
	document.getElementById("MaxPrice").options.add(oItem);
	oItem = document.createElement("Option");                
	oItem.text = "200PCM";  //Textbox's value
	oItem.value = 200;  //Textbox's value
	document.getElementById("MaxPrice").options.add(oItem);
	oItem = document.createElement("Option");                
	oItem.text = "300PCM";  //Textbox's value
	oItem.value = 300;  //Textbox's value
	document.getElementById("MaxPrice").options.add(oItem);
	oItem = document.createElement("Option");                
	oItem.text = "400PCM";  //Textbox's value
	oItem.value = 400;  //Textbox's value
	document.getElementById("MaxPrice").options.add(oItem);
	oItem = document.createElement("Option");                
	oItem.text = "500PCM";  //Textbox's value
	oItem.value = 500;  //Textbox's value
	document.getElementById("MaxPrice").options.add(oItem);
	oItem = document.createElement("Option");                
	oItem.text = "600PCM";  //Textbox's value
	oItem.value = 600;  //Textbox's value
	document.getElementById("MaxPrice").options.add(oItem);
	oItem = document.createElement("Option");                
	oItem.text = "700PCM";  //Textbox's value
	oItem.value = 700;  //Textbox's value
	document.getElementById("MaxPrice").options.add(oItem);
	oItem = document.createElement("Option");                
	oItem.text = "800PCM";  //Textbox's value
	oItem.value = 800;  //Textbox's value
	document.getElementById("MaxPrice").options.add(oItem);
	oItem = document.createElement("Option");                
	oItem.text = "900PCM";  //Textbox's value
	oItem.value = 900;  //Textbox's value
	document.getElementById("MaxPrice").options.add(oItem);
	oItem = document.createElement("Option");                
	oItem.text = "1000PCM";  //Textbox's value
	oItem.value = 1000;  //Textbox's value
	document.getElementById("MaxPrice").options.add(oItem);
	oItem = document.createElement("Option");                
	oItem.text = "1250PCM";  //Textbox's value
	oItem.value = 1250;  //Textbox's value
	document.getElementById("MaxPrice").options.add(oItem);
	oItem = document.createElement("Option");                
	oItem.text = "1500PCM";  //Textbox's value
	oItem.value = 1500;  //Textbox's value
	document.getElementById("MaxPrice").options.add(oItem);
	oItem = document.createElement("Option");                
	oItem.text = "1750PCM";  //Textbox's value
	oItem.value = 1750;  //Textbox's value
	document.getElementById("MaxPrice").options.add(oItem);
	oItem = document.createElement("Option");                
	oItem.text = "2000PCM";  //Textbox's value
	oItem.value = 2000;  //Textbox's value
	document.getElementById("MaxPrice").options.add(oItem);	
}
function Sales_Prices()
{
	document.getElementById("MinPrice").options.length = 0
	var oItem
	
	oItem = document.createElement("Option");                
	oItem.text = "No Minimum";  //Textbox's value
	oItem.value = "";  //Textbox's value
	document.getElementById("MinPrice").options.add(oItem);	

	oItem = document.createElement("Option");                
	oItem.text = "100,000";  //Textbox's value
	oItem.value = 100000;  //Textbox's value
	document.getElementById("MinPrice").options.add(oItem);
	oItem = document.createElement("Option");                
	oItem.text = "125,000";  //Textbox's value
	oItem.value = 125000;  //Textbox's value
	document.getElementById("MinPrice").options.add(oItem);
	oItem = document.createElement("Option");                
	oItem.text = "150,000";  //Textbox's value
	oItem.value = 150000;  //Textbox's value
	document.getElementById("MinPrice").options.add(oItem);
	oItem = document.createElement("Option");                
	oItem.text = "175,000";  //Textbox's value
	oItem.value = 175000;  //Textbox's value
	document.getElementById("MinPrice").options.add(oItem);
	oItem = document.createElement("Option");                
	oItem.text = "200,000";  //Textbox's value
	oItem.value = 200000;  //Textbox's value
	document.getElementById("MinPrice").options.add(oItem);
	oItem = document.createElement("Option");                
	oItem.text = "225,000";  //Textbox's value
	oItem.value = 225000;  //Textbox's value
	document.getElementById("MinPrice").options.add(oItem);
	oItem = document.createElement("Option");                
	oItem.text = "250,000";  //Textbox's value
	oItem.value = 250000;  //Textbox's value
	document.getElementById("MinPrice").options.add(oItem);
	oItem = document.createElement("Option");                
	oItem.text = "275,000";  //Textbox's value
	oItem.value = 275000;  //Textbox's value
	document.getElementById("MinPrice").options.add(oItem);
	oItem = document.createElement("Option");                
	oItem.text = "300,000";  //Textbox's value
	oItem.value = 300000;  //Textbox's value
	document.getElementById("MinPrice").options.add(oItem);
	oItem = document.createElement("Option");                
	oItem.text = "400,000";  //Textbox's value
	oItem.value = 400000;  //Textbox's value
	document.getElementById("MinPrice").options.add(oItem);
	oItem = document.createElement("Option");                
	oItem.text = "425,000";  //Textbox's value
	oItem.value = 425000;  //Textbox's value
	document.getElementById("MinPrice").options.add(oItem);
	oItem = document.createElement("Option");                
	oItem.text = "450,000";  //Textbox's value
	oItem.value = 450000;  //Textbox's value
	document.getElementById("MinPrice").options.add(oItem);
	oItem = document.createElement("Option");                
	oItem.text = "475,000";  //Textbox's value
	oItem.value = 475000;  //Textbox's value
	document.getElementById("MinPrice").options.add(oItem);
	oItem = document.createElement("Option");                
	oItem.text = "500,000";  //Textbox's value
	oItem.value = 500000;  //Textbox's value
	document.getElementById("MinPrice").options.add(oItem);	
		oItem = document.createElement("Option");                
	oItem.text = "525,000";  //Textbox's value
	oItem.value = 525000;  //Textbox's value
	document.getElementById("MinPrice").options.add(oItem);
		oItem = document.createElement("Option");                
	oItem.text = "550,000";  //Textbox's value
	oItem.value = 550000;  //Textbox's value
	document.getElementById("MinPrice").options.add(oItem);
		oItem = document.createElement("Option");                
	oItem.text = "575,000";  //Textbox's value
	oItem.value = 575000;  //Textbox's value
	document.getElementById("MinPrice").options.add(oItem);
		oItem = document.createElement("Option");                
	oItem.text = "600,000";  //Textbox's value
	oItem.value = 600000;  //Textbox's value
	document.getElementById("MinPrice").options.add(oItem);
		oItem = document.createElement("Option");                
	oItem.text = "700,000";  //Textbox's value
	oItem.value = 700000;  //Textbox's value
	document.getElementById("MinPrice").options.add(oItem);
		oItem = document.createElement("Option");                
	oItem.text = "800,000";  //Textbox's value
	oItem.value = 800000;  //Textbox's value
	document.getElementById("MinPrice").options.add(oItem);
		oItem = document.createElement("Option");                
	oItem.text = "900,000";  //Textbox's value
	oItem.value = 900000;  //Textbox's value
	document.getElementById("MinPrice").options.add(oItem);
		oItem = document.createElement("Option");                
	oItem.text = "1,000,000";  //Textbox's value
	oItem.value = 1000000;  //Textbox's value
	document.getElementById("MinPrice").options.add(oItem);
		
	
	document.getElementById("MaxPrice").options.length = 0

	oItem = document.createElement("Option");                
	oItem.text = "No Maximum";  //Textbox's value
	oItem.value = "";  //Textbox's value
	document.getElementById("MaxPrice").options.add(oItem);	

	
	
	oItem = document.createElement("Option");                
	oItem.text = "100,000";  //Textbox's value
	oItem.value = 100000;  //Textbox's value
	document.getElementById("MaxPrice").options.add(oItem);
	oItem = document.createElement("Option");                
	oItem.text = "125,000";  //Textbox's value
	oItem.value = 125000;  //Textbox's value
	document.getElementById("MaxPrice").options.add(oItem);
	oItem = document.createElement("Option");                
	oItem.text = "150,000";  //Textbox's value
	oItem.value = 150000;  //Textbox's value
	document.getElementById("MaxPrice").options.add(oItem);
	oItem = document.createElement("Option");                
	oItem.text = "175,000";  //Textbox's value
	oItem.value = 175000;  //Textbox's value
	document.getElementById("MaxPrice").options.add(oItem);
	oItem = document.createElement("Option");                
	oItem.text = "200,000";  //Textbox's value
	oItem.value = 200000;  //Textbox's value
	document.getElementById("MaxPrice").options.add(oItem);
	oItem = document.createElement("Option");                
	oItem.text = "225,000";  //Textbox's value
	oItem.value = 225000;  //Textbox's value
	document.getElementById("MaxPrice").options.add(oItem);
	oItem = document.createElement("Option");                
	oItem.text = "250,000";  //Textbox's value
	oItem.value = 250000;  //Textbox's value
	document.getElementById("MaxPrice").options.add(oItem);
	oItem = document.createElement("Option");                
	oItem.text = "275,000";  //Textbox's value
	oItem.value = 275000;  //Textbox's value
	document.getElementById("MaxPrice").options.add(oItem);
	oItem = document.createElement("Option");                
	oItem.text = "300,000";  //Textbox's value
	oItem.value = 300000;  //Textbox's value
	document.getElementById("MaxPrice").options.add(oItem);
	oItem = document.createElement("Option");                
	oItem.text = "400,000";  //Textbox's value
	oItem.value = 400000;  //Textbox's value
	document.getElementById("MaxPrice").options.add(oItem);
	oItem = document.createElement("Option");                
	oItem.text = "425,000";  //Textbox's value
	oItem.value = 425000;  //Textbox's value
	document.getElementById("MaxPrice").options.add(oItem);
	oItem = document.createElement("Option");                
	oItem.text = "450,000";  //Textbox's value
	oItem.value = 450000;  //Textbox's value
	document.getElementById("MaxPrice").options.add(oItem);
	oItem = document.createElement("Option");                
	oItem.text = "475,000";  //Textbox's value
	oItem.value = 475000;  //Textbox's value
	document.getElementById("MaxPrice").options.add(oItem);
	oItem = document.createElement("Option");                
	oItem.text = "500,000";  //Textbox's value
	oItem.value = 500000;  //Textbox's value
	document.getElementById("MaxPrice").options.add(oItem);	
		oItem = document.createElement("Option");                
	oItem.text = "525,000";  //Textbox's value
	oItem.value = 525000;  //Textbox's value
	document.getElementById("MaxPrice").options.add(oItem);
		oItem = document.createElement("Option");                
	oItem.text = "550,000";  //Textbox's value
	oItem.value = 550000;  //Textbox's value
	document.getElementById("MaxPrice").options.add(oItem);
		oItem = document.createElement("Option");                
	oItem.text = "575,000";  //Textbox's value
	oItem.value = 575000;  //Textbox's value
	document.getElementById("MaxPrice").options.add(oItem);
		oItem = document.createElement("Option");                
	oItem.text = "600,000";  //Textbox's value
	oItem.value = 600000;  //Textbox's value
	document.getElementById("MaxPrice").options.add(oItem);
		oItem = document.createElement("Option");                
	oItem.text = "700,000";  //Textbox's value
	oItem.value = 700000;  //Textbox's value
	document.getElementById("MaxPrice").options.add(oItem);
		oItem = document.createElement("Option");                
	oItem.text = "800,000";  //Textbox's value
	oItem.value = 800000;  //Textbox's value
	document.getElementById("MaxPrice").options.add(oItem);
		oItem = document.createElement("Option");                
	oItem.text = "900,000";  //Textbox's value
	oItem.value = 900000;  //Textbox's value
	document.getElementById("MaxPrice").options.add(oItem);
		oItem = document.createElement("Option");                
	oItem.text = "1,000,000";  //Textbox's value
	oItem.value = 1000000;  //Textbox's value
	document.getElementById("MaxPrice").options.add(oItem);
}
function switchPrices(value)
{
	if (value=="1")
	{
		//Sales Prices
		Sales_Prices()
	}
	else
	{
		//Lettings Prices
		Lettings_Prices()
	}
}