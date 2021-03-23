
function myFunction() {
    if(document.getElementById("dropbox").style.display=="block"){
        document.getElementById("dropbox").style.display="none";
        }
    else{document.addEventListener('mouseup', function(e) {
        var container = document.getElementById('dropbox');
        if (!container.contains(e.target)) {
          container.style.display = 'none';
        }
      });
      document.getElementById("dropbox").style.display="block";
        document.getElementById("logout").setAttribute('class', 'bouton');
    }}
  
    function homeover0(){
      document.getElementById("homeicon").src ='images/home1.png';
      document.getElementById("home").style.color="#a16795";
    }
    
    function homeout0(){
      document.getElementById("homeicon").src ='images/home.png';
      document.getElementById("home").style.color="black";
    }
  
  function homeover1(){
    document.getElementById("explorericon").src ='images/dieze1.png';
    document.getElementById("explorer").style.color="#a16795";
  }
  
  function homeout1(){
    document.getElementById("explorericon").src ='images/dieze.png';
    document.getElementById("explorer").style.color="black";
  }
  function homeover2(){
    document.getElementById("notificon").src ='images/notification1.png';
    document.getElementById("notif").style.color="#a16795";
  }
  
  function homeout2(){
    document.getElementById("notificon").src ='images/notification.png';
    document.getElementById("notif").style.color="black";
  }
  function homeover3(){
    document.getElementById("mesgicon").src ='images/messages1.png';
    document.getElementById("mesg").style.color="#a16795";
  }
  
  function homeout3(){
    document.getElementById("mesgicon").src ='images/messages.png';
    document.getElementById("mesg").style.color="black";
  }
  function homeover4(){
    document.getElementById("signicon").src ='images/bookmarks1.png';
    document.getElementById("sign").style.color="#a16795";
  }
  
  function homeout4(){
    document.getElementById("signicon").src ='images/bookmarks.png';
    document.getElementById("sign").style.color="black";
  }
  function homeover5(){
    document.getElementById("listicon").src ='images/lists1.png';
    document.getElementById("list").style.color="#a16795";
  }
  
  function homeout5(){
    document.getElementById("listicon").src ='images/lists.png';
    document.getElementById("list").style.color="black";
  }
  function homeover6(){
    document.getElementById("profilicon").src ='images/profil1.png';
    document.getElementById("profil").style.color="#a16795";
  }
  
  function homeout6(){
    document.getElementById("profilicon").src ='images/profil.png';
    document.getElementById("profil").style.color="black";
  }
  
  function homeover8(){
    document.getElementById("paramicon").src ='images/settings.png';
    document.getElementById("param").style.color="#a16795";
  }
  
  function homeout8(){
    document.getElementById("paramicon").src ='images/settings2.png';
    document.getElementById("param").style.color="black";
  }
  
  function check_length(my_form)
  {document.getElementById("counter").style.visibility="visible";
  maxLen = 255;
  if (my_form.tweetbox.value.length >= maxLen) {
  var msg = "You have reached your maximum limit of characters allowed";
  alert(msg);
  my_form.tweetbox.value = my_form.tweetbox.value.substring(0, maxLen);
   }
  else{ 
      my_form.counter.value = maxLen - my_form.tweetbox.value.length;
  }
  if(my_form.tweetbox.value.length>0){
    document.getElementById("tweet2").style.backgroundColor="#bc64ff";
  }
  else{document.getElementById("tweet2").style.backgroundColor="";}
  }
  
  
  function show() {
    var element = document.getElementById('derniers');
    element.style.display = '';
  }
  function show1() {
    var element1 = document.getElementById('emojis');
    element1.style.display = '';
  }
  function hide() {
    var element = document.getElementById('derniers');
    element.style.display = 'none';
  }
  function hide1() {
    var element = document.getElementById('emojis');
    element.style.display = 'none';
  }
  function init() {
    var view= document.getElementById('view');
    var view1= document.getElementById('emoji');
    view.onmouseover = show;
    view.onmouseout=hide;  
    view1.onmouseover = show1;
    view1.onmouseout=hide1;  
  }
  window.onload = init;  
  
  
  
  var today = new Date();
  var dd = today.getDate();
  var mm = today.getMonth()+1; //January is 0!
  var yyyy = today.getFullYear();
   if(dd<10){
          dd='0'+dd
      } 
      if(mm<10){
          mm='0'+mm
      } 
  
  today = yyyy+'-'+mm+'-'+dd;
  document.getElementById("datetweet").setAttribute("min", today);
  
  
  function myFunction1() {
    if(document.getElementById("datetweet").style.display=="inline-block"){
        document.getElementById("datetweet").style.display="none";
        }
    else{document.addEventListener('mouseup', function(e) {
        var container = document.getElementById('datetweet');
        if (!container.contains(e.target)) {
          container.style.display = 'none';
        }
      });
      document.getElementById("datetweet").style.display="inline-block";
    }}
  