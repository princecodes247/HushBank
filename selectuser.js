var xmlHttp

function showUser(str)
{
xmlHttp= GetXmlHttpObject()

if(xmlHttp==null)
{
alert("Browser does not support Http Request")
return
}

var url="getuser.php"
url=url+"?q="+str
url=url+"&sid="+Math.random()
xmlHttp.open("GET",url,true)
xmlHttp.send(null)
}


function GetXmlHttpObject()
{
var xmlHttp=null;
try
{
xmlHttp=new XMLHttpRequest();
}

catch(e)
{
try
{
xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
}
catch(e)
{
xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
}
}
return xmlHttp;
}
