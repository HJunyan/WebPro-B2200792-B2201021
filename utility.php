<html>
	<head>
		<link rel="stylesheet" href="utility.css">
		<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'> 
</head>
<script>
var fontSize = 1;
function zoomIn() {
	fontSize += 0.1;
	document.body.style.fontSize = fontSize + "em";
}
function zoomOut() {
	fontSize -= 0.1;
	document.body.style.fontSize = fontSize + "em";
}
</script>
<button class="utility" value="++" onClick="zoomIn()"><i class='bx bx-plus'></i></button>
<button class="utility" value="--" onClick="zoomOut()"><i class='bx bx-minus'></i></button>
<button class="utility" id="color"><i class='bx bxs-color-fill'></i></button>

<script>
document.getElementById('color').onclick = changeColor;
var currentColor = "red";
function changeColor() {
		if(currentColor == "#F14173"){
			document.body.style.color = "#CF75A7";
			currentColor = "#CF75A7";
		} else {
			document.body.style.color = "#F14173";
			currentColor = "#F14173";
		}
	}
</script>
</html>