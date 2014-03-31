<?php
include('connection.php');
if((isset($_GET['content']))){
$post =$_GET['content'];
$query = "INSERT INTO `posts`( `userid`,`message`) VALUES ('21','".mysql_real_escape_string($post)."')";
if($query_run = mysql_query($query)){
echo 'query successful <br>';
}

$sql_in= mysql_query("SELECT  `message`,`postid` FROM  `posts` ORDER BY  `postid` DESC ");
$r=mysql_fetch_array($sql_in);
$msg=$r['message'];
$msg_id=$r['postid'];

}

?>


<li class="bar<?php echo $msg_id; ?>">
<div align="left">
<span style=" padding:10px"><?php echo $msg; ?> </span>
<span class="delete_button"><a href="#" id="<?php echo $msg_id; ?>" class="delete_update">X</a></span>
</div>
</li>
<?php	
require 'current_page.php';
require 'connection.php';
?>

<!DOCTYPE html>
<html>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="jquery-1.10.2.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript">
$(function(){
$('#tabs a:first').tab('show');
});

$(".submit").click(function() 
{
var i = 0;
var ques_title = $("#ques_title").val();
var quest = $("#question").val();
var category = $("#category").val();
var post_text = $("#post").val(); 
var dataString = '';
if(ques_title=='' || quest=='' || category=='')
{
alert('Please Give Valid Details');
var dataString = 'ques_title='+ ques_title + '&quest=' + quest + '&category=' + category ;
i=1;
}
else if(post_text=='' || quest=='' || category=='')
{
alert('Please Give Valid Details');
var dataString = 'post_text='+ post_text ;
i=1;
}

if(i==1)
{
$("#flash").show();
$("#flash").fadeIn(400).html('<img src="ajax-loader.gif" />Loading Comment...');
$.ajax({
type: "GET",
url: "post.php",
data: dataString,
cache: false,
success: function(html){
$("ol#update").append(html);
$("ol#update li:last").fadeIn("slow");
$("#flash").hide();
}
});
}return false;
});

</script>
<title>Untitled 1</title>
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
<div class="col-md-8" id="comments">
<ol id="update">

</ol>
</div>
</div>
<div>
</div>

</body>

</html>
