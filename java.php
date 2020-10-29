<html>
<head>
<script type="text/javascript">
function disp_confirm()
{
var name=confirm("Press a button")

if (name==true)
{
document.write("You pressed the OK button!")
}
else
{
document.write("You pressed the Cancel button!")
}
}
</script>
</head>
<body>
<form>
<input type="button" onclick="disp_confirm()" value="Display a confirm box">
</form>
</body>
</html>