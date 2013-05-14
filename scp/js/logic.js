function limitChars(limit){

var text = $('#message').val(); 
var textlength = text.length;

$('#count').html(textlength);

if(textlength > limit){
return false;
}else{
return true;
}

}


function postData(){

var name = $('#name').val();
var message = $('#message').val();


 var dataString = 'name='+ name + '&message=' + message ;  
 $("#error").html("Processing...");
 $.ajax({  
   type: "POST",  
   url: "post.php",  
   data: dataString,  
   error: function(){
     //alert('Error loading document');
	 return false; 
   },
   success: function() {
     //place something here
   }
 });
return true;
}

function loadMessages(offset){
$("#messages").html("Loading...").hide().fadeIn("slow");
$('#messages').load('messages.php?offset='+offset).hide().fadeIn("slow");
return false;
}

$(document).ready(function(){

  loadMessages(0);
  $("#cap").html("<img id=captcha src=captcha/securimage_show.php alt=CAPTCHA Image />");
//$("#cap").html("<img src=CaptchaSecurityImages.php?width=100&amp;height=26&amp;characters=5>");


  $("#message").keyup(function() {
     limitChars(20);
  });
  
  $(".refresh").click(function() {
  loadMessages(0);
  //alert('refresh!');
  return false;
  });
  
  //$("form").submit(function() {
  $(".button").click(function() {
  
var sec_code = $.ajax({
  url: "get_session.php",
  async: false
 }).responseText;

  
     if($('#message').val()==''||$('#name').val()==''){
        $('#error').html("Name and Message cannot be empty").addClass('error').hide().fadeIn("slow");
        return false; 
	 };	 
	
	
	 if($('#message').val().length>300){
	 $('#error').html("Message must not exceed 300 characters.").addClass('error').hide().fadeIn("slow");
	 return false; 
	 };
	 
	 if(postData()){
	 $('#error').html("Processing.....").removeClass('error').hide().fadeIn("slow");
	 $.timer(3000,function(){
	 $('#error').html("Message inserted!").addClass('success').hide().fadeIn("slow");
	 loadMessages(0);
	 //$('input[@type="text"]').val("");
	 $('#name').val(""); 
	 $('#message').val("");

	 });
	 }else{
	 $('#error').html("Database Error.").fadeIn("slow");
	 return false; 
	 }
	 return false;

  });
  
  
});
