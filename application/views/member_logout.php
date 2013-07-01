<!DOCTYPE html>
<!--
 PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
    
    <title>Login</title>
    <style type="text/css" >
    body { 
background: #3D3D3D;
    background: url('bgtop.png') #3D3D3D top center;
 background-repeat: no-repeat;
    }
    .logintitle { color:white;background:black;font-weight:bold;font-size:24px;}
    .login { color:white; font-size:15px; text-align:center;}
    #loginpanel{text-align:left; width:450px; height:400px; border:groove; background:#eee;}
a:link,a:visited,a:active { 
color:white; text-decoration: underline;
font-family: verdana, arial, sans;
}
a h4 { 
color:blue;
text-decoration:none;

}
a:hover { 
color:orange;
text-decoration:underline;

}
    </style>  



</head>
  
<body style=" text-align:center;">
    <div align="center">
    <table id="loginpanel" cellspacing="0" cellpadding="0">
    <tr>
        <td class="logintitle" align="center">Mentors Dojo</td>
    </tr>
    <tr>
        <td class="login" style="color:darkgreen">Please login !</td>
    </tr>
    <tr>
        <td colspan="2" align="center">
        
        <form id="loginform" method="post" action="chekr.php">
        Logged out
		</form>
          
        </td>
        </tr>
        </table>
    </div>