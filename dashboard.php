<style>
.div_top{
    height:40%;
    width:100%;
    margin-left:-10px;
    margin-top:-10px;
    padding:10px;
    color:#ffffff;
    font-family: Verdana, Geneva, sans-serif;
    font-size:40px;
    background-image:-webkit-linear-gradient(47deg,#1d55f1 0,#1d8af1d8 100%);
    box-shadow: 0 40px 150px 0 #1d92f1b9;
}
.div_bottom{
    margin-top:100px;
}

.span_date{
    font-size:70px;
}
</style>

<div class="div_top">
<br><?php

switch(date('D')){
    case "Sun": 
    echo"<span class='span_date'>Sunday<br></span>";
    break;
    case "Mon":
    echo"<span class='span_date'>Monday<br></span>";
    break;
    case "Tue":
    echo"<span class='span_date'>TuesSSday<br></span>";
    break;
    case "Wed":
    echo"<span class='span_date'>Wednesday<br></span>";
    break;
    case "Thu":
    echo"<span class='span_date'>Thursday<br></span>";
    break;
    case "Fri":
    echo"<span class='span_date'>Friday<br></span>";
    break;
    case "Sat":
    echo"<span class='span_date'>Saturday<br></span>";
    break;
    default:
    break;

        
}
//current Date, i.e. 2013-08-01  
   echo date("d-M-Y");
   echo"<br>";  
?>
<span>Hello User</span>
</div>

<div class="div_bottom">

</div>