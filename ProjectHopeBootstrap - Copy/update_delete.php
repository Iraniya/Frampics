<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Update and Delete with Slide Effect.....</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="jquery-1.10.2.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<link href="frame.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="jquery.min.js"></script>
  <script type="text/javascript" src="jquery.js"></script>
  

 
 <script type="text/javascript">

$(function(){
$('#tabs a:first').tab('show');
});

$(function() {
$(".comment_button").click(function() 
{


var element = $(this);
   
    var boxval = $("#content").val();
	
    var dataString = 'content='+ boxval;
	
	if(boxval=='')
	{
	alert("Please Enter Some Text");
	
	}
	else
	{
	$("#flash").show();
	$("#flash").fadeIn(400).html('<img src="ajax.gif" align="absmiddle">&nbsp;<span class="loading">Loading Update...</span>');
$.ajax({
		type: "GET",
  url: "update_data.php",
   data: dataString,
  cache: false,
  success: function(html){
 //alert(html);
  $("ol#update").append(html);
  $("ol#update li").slideDown("slow");
   document.getElementById('content').value='';
  $("#flash").hide();
	
  }
 });
}
return false;
	});


$('.delete_update').live("click",function() 
{
var ID = $(this).attr("id");
 var dataString = 'msg_id='+ ID;
 
if(confirm("Sure you want to delete this update? There is NO undo!"))
{

$.ajax({
type: "POST",
 url: "delete_data.php",
  data: dataString,
 cache: false,
 success: function(html){
 $(".bar"+ID).slideUp('slow', function() {$(this).remove();});
 }
});

}

return false;
});




});


</script>


<style type="text/css">
body
{
font-family:Arial, Helvetica, sans-serif;
font-size:14px;
}
.comment_box
{
background-color:#D3E7F5; border-bottom:#ffffff solid 1px; padding-top:3px
}
a
	{
	text-decoration:none;
	color:#d02b55;
	}
	a:hover
	{
	text-decoration:underline;
	color:#d02b55;
	}
	*{margin:0;padding:0;}
	
	
	ol.timeline
	{list-style:none;font-size:1.2em;}ol.timeline li{ display:none;position:relative;padding:.7em 0 .6em 0;border-bottom:1px dashed #000;line-height:1.1em; background-color:#D3E7F5; height:55px; width:499px}ol.timeline li:first-child{border-top:1px dashed #000;}
	.delete_button
	{
	float:right; margin-right:10px; width:20px; height:20px
	}
	.feed_link
	{
	font-style:inherit; font-family:Georgia; font-size:13px;padding:10px; float:left; width:350px
	}
	.feed_a
	{
	color:#0000CC; text-decoration:underline
	}
	.delete_update
	{
	font-weight:bold;
	
	}
</style>
</head>

<body>
<div class="row">
<div class="col-md-4">
<ul class="nav nav-tabs" id="tabs">
	<li><a href="#tab1" data-toggle="tab">Ask Others</a></li>
	<li><a href="#tab2" data-toggle="tab">Say Something</a></li>

</ul> 
<div class="tab-content">
	<div id="tab1" class="tab-pane col-md-12">
		 <form class="form-horizontal" role="form" action="" method="get"> <br/>  
		    <div class="form-group">
              <input name="question_title" id="ques_title" type="text" placeholder="Please give a precise heading to your question here!" class="form-control" required>
            </div>

            <div class="form-group">
             <textarea id="question" name="question" class="form-control " rows="3" placeholder="Please write what you want to ask" required></textarea>
            </div>
            <div class="form-group">         
            <select id="category" name="category" class="form-control">
			  <option>Choose a relevant category for your question</option>
              <option>Cancer</option>
              <option>Oral Cancer</option>
              <option>Breast Cancer</option>
              <option>Cervical Cancer</option>
              <option>Penile Cancer</option>
              <option>Blood Cancer</option>
              </select>
			</div>
			<div class="form-group">         
            <button type="submit" name="buttonQuestion" class="btn btn-success" value="1">Post your question</button></div>
          </form> 

	</div>
	<div id="tab2" class="tab-pane col-md-12">
		 <form class="form-horizontal" role="form" action="post.php" method="get"> <br/>  
            <div class="form-group">
             <textarea id="post" name="post" class="form-control " rows="5" placeholder="Please write what you want to ask" required></textarea>
            </div>
			<div class="form-group">         
            <button type="submit" name="buttonPost" class="btn btn-success" value="1">Tell this to others</button></div>
          </form> 
	</div>
</div>
</div>
<!--
<div style="background:#FFFFFF url('feedbirdl.jpg') no-repeat right 50%; height:90px; border-bottom:#006699 solid 2px; padding-left:10px; ">
  <h2>More tutorials <a href="http://9lessons.blogspot.com" style="color:#0099CC">
  9lessons.blogspot.com</a></h2><br />
  <span style="float:right; padding-right:70px"><h3><a href="http://feeds2.feedburner.com/9lesson">
	Subscribe to my feeds</a></h3></span> <span style="float:left; "><h3><a href="http://9lessons.blogspot.com/2009/05/insert-record-with-animation-slide-down.html"> 
	Original Tutorial Link</a>&nbsp;&nbsp;&nbsp;Follow me on <a href="http://twitter.com/9lessons" target="_blank">
	Twitter</a></h3></span>     </div>
  <div style="padding:10px; background-color:#ffffcc">
  <h2>Update and Delete with Slide Effect.....</h2>
  </div>

<div align="center">
<table cellpadding="0" cellspacing="0" width="500px">
<tr>
<td>


<div align="left">
<form  method="get" name="form" action="">
<table cellpadding="0" cellspacing="0" width="500px">

<tr><td align="left"><div align="left"><h3>What are you doing?</h3></div></td></tr>
<tr>
<td style="padding:4px; padding-left:10px;" class="comment_box">
<textarea cols="30" rows="2" style="width:480px;font-size:14px; font-weight:bold" name="content" id="content" maxlength="145" ></textarea><br />
<input type="submit"  value="Update"  id="v" name="submit" class="comment_button"/>
</td>

</tr>

</table>
</form>

</div>

<div style="height:7px"></div>
<div id="flash" align="left"  ></div>
<ol  id="update" class="timeline">
</ol>
<div id="old_updates">

</div>

</td>
</tr>
</table>




</div>
-->
</div>
</body>
</html>
