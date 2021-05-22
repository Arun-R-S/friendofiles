<!DOCTYPE html>
<html>
<head>
	<title>FriendoFiles | Share your files with your friends </title>
	<meta charset="utf-8">
	<meta name="description" content="Developed by Anderson for file sharing">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="https://upload.wikimedia.org/wikipedia/commons/thumb/d/da/Google_Drive_logo.png/768px-Google_Drive_logo.png">
	<script type="text/javascript">
		function _(el){
    return document.getElementById(el);
}
function uploadFile(){
    var file = _("file1").files[0];
    // alert(file.name+" | "+file.size+" | "+file.type);
    var formdata = new FormData();
    formdata.append("file1", file);
    var ajax = new XMLHttpRequest();
    ajax.upload.addEventListener("progress", progressHandler, false);
    ajax.addEventListener("load", completeHandler, false);
    ajax.addEventListener("error", errorHandler, false);
    ajax.addEventListener("abort", abortHandler, false);
    ajax.open("POST", "file_upload_parser.php");
    ajax.send(formdata);
}
const units = ['bytes', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];

function niceBytes(x){

  let l = 0, n = parseInt(x, 10) || 0;

  while(n >= 1024 && ++l){
      n = n/1024;
  }
  //include a decimal point and a tenths-place digit if presenting 
  //less than ten of KB or greater units
  return(n.toFixed(n < 10 && l > 0 ? 1 : 0) + ' ' + units[l]);
}
function progressHandler(event){
    _("loaded_n_total").innerHTML = "Uploaded "+niceBytes(event.loaded)+" of "+niceBytes(event.total);
    var percent = (event.loaded / event.total) * 100;
    _("progressBar").value = Math.round(percent);
    _("status").innerHTML = Math.round(percent)+"% uploading... please wait while finish";
}
function completeHandler(event){
    _("status").innerHTML = event.target.responseText;
    _("progressBar").value = 0;
}
function errorHandler(event){
    _("status").innerHTML = "Upload Failed";
}
function abortHandler(event){
    _("status").innerHTML = "Upload Aborted";
}
	</script>
</head>
<body>
  <div class="header">
    <div class="inner-header flex">
        <svg version="1.1" class="logo" baseProfile="tiny" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 500 500" xml:space="preserve">
            <path fill="#FFFFFF" stroke="#000000" stroke-width="10" stroke-miterlimit="10" d="M57,283" />
            <g>
                
            </g>
        </svg>
        <h1>FriendoFiles</h1>
    </div>

    <!--Waves Container-->
    <div>
        <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
            <defs>
                <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
            </defs>
            <g class="parallax">
                <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255,255,255,0.7" />
                <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.5)" />
                <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.3)" />
                <use xlink:href="#gentle-wave" x="48" y="7" fill="#fff" />
            </g>
        </svg>
    </div>
<div class="content flex">
  <center>
  
  <p>Share your files with your friends</p>
  <p>Share any type of file like photo, videos, audios, documents, softwares, etc,.</p>
</center>
</div>
<div class="content flex">

	<center>
	<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/da/Google_Drive_logo.png/768px-Google_Drive_logo.png" style='height: 100px;width: 100px;'></center><br>
<form id="upload_form" enctype="multipart/form-data" method="post" action=>
  
  <input type='file' name='file1' id='file1' required><br><br>
  <input type='button' value='Upload File' onclick='uploadFile()' >
  <progress id='progressBar' value='0' max='100' style='width:250px;'></progress>
  <p id='status'></p>
  <p id='loaded_n_total'></p><br>
  <br>
</form>
</div>





<style type="text/css">
	.container{
		padding:20px;
	width: auto;
	box-shadow: 0px 0px 2px grey;
	border-radius: 20px;
	}
	body{
		align-items: center;
		justify-content: center;
	}
  marquee{
    font-size: 20px;
    padding-top: 15px;
    padding-bottom: 10px;
    width:900px;
  }
.footer {
  position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;
  max-height: 100px;
  background: linear-gradient(60deg, rgba(84, 58, 183, 1) 0%, rgba(0, 172, 193, 1) 100%);
  color: white;
  text-align: center;
  
}
  @import url(//fonts.googleapis.com/css?family=Roboto);
body {
  margin: 0;
  font-family: 'Roboto', sans-serif;
background: #99b6de;
}
h1 {
  font-family: 'Roboto', sans-serif;
  font-weight: 300;
  letter-spacing: 2px;
  font-size: 48px;
}
p {
  font-family: 'Roboto', sans-serif;
  letter-spacing: 1px;
  font-size: 14px;
  color: #333333;
}
.header {
  position: relative;
  text-align: center;
  background: linear-gradient(60deg, rgba(84, 58, 183, 1) 0%, rgba(0, 172, 193, 1) 100%);
  color: white;
}
.logo {
  width: 50px;
  fill: white;
  padding-right: 15px;
  display: inline-block;
  vertical-align: middle;
}
.inner-header {
  height: 70px;
  width: 100%;
  margin: 0;
  padding: 0;
}
.flex {
  /*Flexbox for containers*/
  display: flex;
  justify-content: center;
  align-items: center;
  text-align: center;
}
.waves {
  position: relative;
  width: 100%;
  height: 15vh;
  margin-bottom: -7px;
  /*Fix for safari gap*/
  min-height: 100px;
  max-height: 150px;
}
.content {
  position: relative;
  height: 20vh;
  text-align: center;
background:   #99b6de;
box-shadow: 0px 0px 30px 30px #99b6de;
}
/* Animation */
.parallax>use {
  animation: move-forever 25s cubic-bezier(.55, .5, .45, .5) infinite;
}
.parallax>use:nth-child(1) {
  animation-delay: -2s;
  animation-duration: 7s;
}
.parallax>use:nth-child(2) {
  animation-delay: -3s;
  animation-duration: 10s;
}
.parallax>use:nth-child(3) {
  animation-delay: -4s;
  animation-duration: 13s;
}
.parallax>use:nth-child(4) {
  animation-delay: -5s;
  animation-duration: 20s;
}
@keyframes move-forever {
  0% {
    transform: translate3d(-90px, 0, 0);
  }
  100% {
    transform: translate3d(85px, 0, 0);
  }
}
/*Shrinking for mobile*/
@media (max-width: 768px) {
  .waves {
    height: 40px;
    min-height: 40px;
  }
  .content {
    height: 30vh;

  }
  h1 {
    font-size: 24px;
  }
  h4{
    color:black;
  }
  marquee{
    font-size: 20px;
    padding-top: 15px;
    padding-bottom: 10px;
    width:400px;
  }
}
</style>


<div class="footer">

  <marquee scrollamount="7" >Innovation Technologies Pvt Ltd</marquee>
</div>
</body>
</html>