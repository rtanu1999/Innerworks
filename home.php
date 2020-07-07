<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
  <title>Welcome to Innerwork</title>
  <link rel="icon" href="css/logo.png" type="image/icon type">
  <link rel="icon" type="png" href="images/profile.png">
  <!--google fonts-->
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700;900&family=Ubuntu&display=swap" rel="stylesheet">
  <!--bootstrap cdn-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <!--styles.css-->
  <link rel="stylesheet" href="css1/styles.css">
  <!--fontawesome-->
  <script src="https://kit.fontawesome.com/62c6b753c2.js" crossorigin="anonymous"></script>
  <!--javascpt-->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </head>
  <body>
    <button class="open-button btn btn-secondary" onclick="openForm()"><i class="fas fa-comment-dots"></i></button>
    <div class="container" id="containerr">
      <div class="msg-header-img1">
        <img src="css1/logo.png" alt="">
      </div>
      <div class="msg-header">
        <div class="active">
          <h4>Welcome to Innerchat</h4>
        </div>

      </div>
      <div class="chat-page" id="chatpage">
        <div class="msg-inbox" id="msginbox">
          <div class="chats">
            <div class="msg-page" id= "msgpage">
              <div class="received-chats">
                <div class="received-chats-img">
                <img src="css1/logo.png" alt="">
                </div>
                <div class="received-msg">
                  <div class="received-msg-inbox">
                  <p>Hey! Welcome to Innerwork Solutions. How may I help you?</p>
                  <span class ="time" id="time"></span>
                  </div>
                </div>
                </div>
                <!-- <div class="outgoing-chats">
                  <div class="outgoing-chats-msg">
                      <p>Hii!! This is message from</p>
                      <span class ="time">11:01 pm | October 11</span>
                  </div>
                  <div class="outgoing-chats-img">
                  <img src="user.jpg" alt="">
                  </div>
              </div> -->





            </div>
          </div>
        </div>
      </div>
      <div class="msg-bottom">

            <div class="input-group">
              <input type="text" class="form-control" placeholder="write a message....." id="result">
              <div class="input-group-append">
                <span class="input-group-text"><button type="submit" name="button" onclick="results()"><i class="fas fa-paper-plane paper"></i></button> <button type="button" onclick="closeForm()"><i class="fas fa-power-off"></i></button></span>
              </div>
            </div>

      </div>
    </div>
    <script type="text/javascript">
    var time = getCurrentTime();
    document.getElementById("time").innerHTML = time;
    function getCurrentTime(){
    var now=new Date();
    var hh=now.getHours();
    var min=now.getMinutes();
    var ampm=(hh>=12)?'PM':'AM';
    hh=hh%12;
    hh=hh?hh:12;
    hh=hh<10?'0'+hh:hh;
    min=min<10?'0'+min:min;
    var time=hh+":"+min+" "+ampm;
    return time;
    }
    function results() {
    var txt=jQuery('.form-control').val();
    if( txt != ''){
    var html='<div style="overflow: hidden; margin: 0;"><div style="float: left; width: 46%; margin-left: 45%;"><p style = "background-color: #000000;  color: #fff; font-size: 14px; border-radius: 10px; padding: 5px 10px 5px 12px; margin: 0; width: 100%;">'+txt+'</p><span style = "color: #777; font-size: 12px; margin: 8px 0 0; display: block;">'+getCurrentTime()+'</span></div><div style = "width: 20px; float: right;"><img src="user.jpg" alt="" style = "border-radius: 50%;"></div></div>';
    var html1 = '<div><div style = "display: inline-block; width: 20px; float: left;"><img src="css/logo.png" alt="" style = "border-radius: 50%;"></div><div style="display: inline-block; padding: 0 0 0 10px; vertical-align: top; width: 92%;"><div style= "width: 70%;"><form id="frm" name="myForm" method="post" action="save1.php"><p style = "background-color: #f0a500;  color: black; font-size: 14px; border-radius: 10px; padding: 5px 10px 5px 12px; margin: 0; width: 100%;"><a href="login.php" style = "color: black">Click here to chat Further</a><br><br></p></form><span style = "color: #777; font-size: 12px; margin: 8px 0 0; display:block;">'+getCurrentTime()+'</span></div></div></div>';
    	jQuery('.msg-page').append(html);
      jQuery('.msg-page').append(html1);
    document.getElementById('result').value = ''};
    // var btn = document.createElement("div");
    // btn.innerHTML = result;
    // document.getElementById("msgpage").appendChild(btn);
  }
  document.addEventListener("keydown", function(event){if(event.keyCode == 13){ results(); }})
  function openForm() {
  document.getElementById("containerr").style.display = "block";
  document.getElementById("open-button").style.display = "none";
}

function closeForm() {
  document.getElementById("containerr").style.display = "none";
  document.getElementById("open-button").style.display = "block";
}

    </script>


  </body>

</html>
