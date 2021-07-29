<!DOCTYPE html>
<html>
	<head>
	<link rel="stylesheet" href="style.css">
	<title>Length Calculator</title>
	  
	<script>
	  function calcLen() {
		 var car1 = parseFloat(document.getElementById("car1").value);
		 var car2 = parseFloat(document.getElementById("car2").value);
		 var car3 = parseFloat(document.getElementById("car3").value);
		 
		 var out = "<h2>invalid input</h2>";

		 if  (!isNaN(parseFloat(car1)) && !isNaN(parseFloat(car2)) && !isNaN(parseFloat(car3)))  {
			
			out = "";
			//calc min length required
			var container20ft_M = 5.89;
			var container40ft_M = 12.19;
			
			var totalLength =  car1+car2+car3;
			
			if(totalLength > container20ft_M)
			{
				out += "<h2>Cars will NOT fit Inside a 20FT Container.</h2>";
			}
			else
			{
				out += "<h2>Cars will fit Inside a 20FT Container and you will have padding of "+(container20ft_M-totalLength).toFixed(2); +"</h2>";
			}
			if(totalLength > container40ft_M)
			{
				out += "<br><h2>Cars will NOT fit Inside a 40FT Container.</h2>";
			}
			else
			{
				out += "<br><h2>Cars will fit Inside a 40FT Container and you will have padding of "+(container40ft_M-totalLength).toFixed(2); +"</h2>";
			}
		 }	
		 var obj = document.getElementById("target");
		 obj.innerHTML =  out;
		 
	  }
	</script>
	</head>
	
	<script src="./nav.js"></script>
	<style>
	h3 {
		display:block;
		margin-top: 1.2em;
    	margin-bottom: 1.2em;
		font-weight: bold;
		background-attachment: fixed;
	
	}
	body {
		position: s;
		width :100%
		margin:0 auto;
	}
	</style>
	
	
	<body>
	<h2>Input Car Lengths (in Meters)</h2>
	<h3 id="target">Result</h3>

	<form action="mortgage.pl" method="get">
	  <table>
	  <tbody>
		  <tr>
			<td>car 1</td>
			<td><input size="20" id="car1" value=0 /> </td>
		  </tr>
		  <tr>
		  	<td>car 2</td>
			<td><input size="20" id="car2" value=0 /> </td>
		  </tr>
		  <tr>
		  	<td>car 3</td>
			<td><input size="20" id="car3" value=0 /> </td>
		  </tr>
		</tbody>
	  </table>
	  <input value="reset" type="reset" /> <input type="button" value="Calculate Length Required" onclick="calcLen()">
	</form>

	</body>
</html>
