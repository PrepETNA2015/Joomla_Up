function showResult(str)
{
if (str.length == 0)
  { 
  document.getElementById("livesearch").innerHTML="";
  return;
  }
xmlhttp=new XMLHttpRequest();
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("livesearch").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","search.php?q="+str,true);
xmlhttp.send();
}