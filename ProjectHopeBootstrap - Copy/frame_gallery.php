<!DOCTYPE html>
<html>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>Frame Gallery</title>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<style type="text/css">
.img{
	border-image-source:url('../../../Users/abhinav/Desktop/fTrial.png');
}
#borders {
   position: relative;
   z-index: 1;
   padding: 10px;
   border:url('images/backImg.png')  0px 25px;
   background-image:url('images/back2.png');
   background-repeat:repeat;
}
#borders2 {
   position: relative;
   z-index: 1;
   padding: 20px;
   border:url('images/back2.png')  0px 25px;
   background-image:url('images/backImg.png');
   background-repeat:repeat;
}

</style>
<script type="text/javascript" src="jquery.magnifier.js">

/***********************************************
* jQuery Image Magnify- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for this script and 100s more
***********************************************/

</script>
</head>

<body>
<?php
$dirname = "images/";
$images = glob($dirname."*.*");
foreach($images as $image) {
echo '
    <div class="thumbnail col-md-4">
     <div id="borders2"><img id = "borders" src="'.$image.'" style="min-height:120px;height:170px;  border-bottom-color:blueviolet;border-bottom-width:medium;"></div>
      <div class="caption">
              <p>...</p>
        <p><a id = "'.$image.'" href="#" class="btn btn-primary btn-xs" role="button" onclick="preview()">Preview</a> <a href="#" class="btn btn-success btn-xs" role="button">Add to cart</a></p>

  </div>
</div>';


}
?>
  

<script type="text/javascript">
function preview(){
alert("<?php echo $image; ?>");
}
</script>
</body>

</html>
