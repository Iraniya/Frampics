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
<div class="col-md-8"></div>
</div>
<div>
<?php

if((isset($_GET['question']) && isset($_GET['question_title']) && isset($_GET['buttonQuestion']))&& (!empty($_GET['question']) && !empty($_GET['question_title']) && !empty($_GET['buttonQuestion']))){
$question = $_GET['question'];
$question_title = $_GET['question_title'];
}


if((isset($_GET['post'])) && (!empty($_GET['post']) && !empty($_GET['buttonPost']))){
$post =$_GET['post'];
$query = "INSERT INTO `posts`( `userid`,`message`) VALUES ('4','".mysql_real_escape_string("baab")."')";
if($query_run = mysql_query($query)){
echo 'query successful <br>';
}
}
//echo $question_title;
//echo $question;
//*/
?>
Hello
</div>

</body>

</html>
