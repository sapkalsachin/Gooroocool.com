

function upload_status(){
	 try{ 
   // Opera 8.0+, Firefox, Safari 
   ajaxRequest = new XMLHttpRequest(); 
 }catch (e){ 
   // Internet Explorer Browsers 
   try{ 
      ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP"); 
   }catch (e) { 
      try{ 
         ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP"); 
      }catch (e){ 
         // Something went wrong 
         alert("Your browser broke!"); 
         return false; 
      } 
  	 } 
 }

 ajaxRequest.onreadystatechange = function(){
 	if (ajaxRequest.readyState == 4 && ajaxRequest.status == 200) {
 		var ajaxDisplay = document.getElementById('response_alert'); 
      	ajaxDisplay.innerHTML = ajaxRequest.responseText; 
 	}
 }

 	var status_inp = document.getElementById('status_input').value;
   if (! status_inp == null) {
      alert('Please write something...');
   }
   else{
 	parameter = 'status_input='+status_inp;
 	ajaxRequest.open('POST', 'insert_data.php', true);
 	ajaxRequest.setRequestHeader('Content-type','application/x-www-form-urlencoded');
 	ajaxRequest.send(parameter);
  document.getElementById('status_input').value = null;
 }
}






function update_data(){
   try{ 
   // Opera 8.0+, Firefox, Safari 
   ajaxRequest = new XMLHttpRequest(); 
 }catch (e){ 
   // Internet Explorer Browsers 
   try{ 
      ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP"); 
   }catch (e) { 
      try{ 
         ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP"); 
      }catch (e){ 
         // Something went wrong 
         alert("Your browser broke!"); 
         return false; 
      } 
     } 
 }

 ajaxRequest.onreadystatechange = function(){
  if (ajaxRequest.readyState == 4 && ajaxRequest.status == 200) {
    var ajaxDisplay = document.getElementById('data_target'); 
        ajaxDisplay.innerHTML = ajaxRequest.responseText; 
        ajaxRequest.open('POST', 'load_data.php', true);
        ajaxRequest.setRequestHeader('Content-type','application/x-www-form-urlencoded');
  ajaxRequest.send(null);
  }
 }
}

