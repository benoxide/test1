<html>
<head>
    <title>Testing Options</title>
	

</head>
<script src = "jquery.min.js"></script>
<tr> <td>click here for testing</td> </tr> 
<body>
<script>
$(document).ready(function(){
alert("1");
  $.ajax({
                type:"POST",
                url: "api_1.php",
				datatype: "JSON",
                data : {
                    sub_id : <?php  session_start(); echo $_SESSION["user"];?>,
					
                },
                success:function (data){
					var nam  = "";
					var next1=0;
					var pos = 0;
					var links = "";
					var first = 0;
					
					while(data.indexOf(",",pos)!= -1 && pos != -1)
					{
						
						first = data.indexOf(",",pos);
						if(pos == 0)
						nam = data.slice(pos+3, first-1);
						else
						nam = data.slice(pos+2, first-1);
						//alert(nam);
						next1 = data.indexOf("]",first+1);
						links = data.slice(first+2,next1-1);
						alert(links);
						pos = next1+2;
						document.writeln("<a href="+links+">"+nam+"</a>");
						
					}
					
                    alert("success");
					alert(data);
					//location.href = "hello.html";
					$("#output").html(data);
					
					
                    console.log(data);

                },


            }
        )
});
    

</script>
</body>
</html>