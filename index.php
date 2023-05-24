<?php
session_start();
if(isset($_GET['logout'])){    
	
	//Simple exit message 
    $logout_message = "<div class='msgln'><span class='left-info'>User <b class='user-name-left'>". $_SESSION['name'] ."</b> has left the chat session.</span><br></div>";
    file_put_contents("log.html", $logout_message, FILE_APPEND | LOCK_EX);
	
	session_destroy();
	header("Location: index.php"); //Redirect the user 
}
if(isset($_POST['enter'])){
    if($_POST['name'] != ""){
        $_SESSION['name'] = stripslashes(htmlspecialchars($_POST['name']));
    }
    else{
        echo '<span class="error">Please type in a name</span>';
    }
}
function loginForm(){
    echo 
    '<div id="loginform"> 
<p>Choose any name to Chat. No Sign-up Needed!</p> 
<form action="index.php" method="post"> 
<label for="name">Name &mdash;</label> 
<input type="text" name="name" id="name" /> 
<input type="submit" name="enter" id="enter" value="Enter" /> 
</form> 
</div>';
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>ThePeepShow.DDNS.net</title>
        <meta name="description" content="ThePeepShow.DDNS.net" />

        <link rel="stylesheet" href="css/style.css" />
        <link rel="stylesheet" href="css/tick.css">
	<link rel='stylesheet' href='css/video-js.min.css'>

    <!-- Style to create button -->
    <style>
        .GFG {
            background-color: #c1272d;
            border: 2px solid black;
            color: white;
            padding: 10px 20px;
            text-align: center;
            display: inline-block;
            font-size: 20px;
            margin: 10px 30px;
            cursor: pointer;
        }
    </style>
    </head>
    <body>
<style>
a:link {
  color: blue;
  background-color: transparent;
  text-decoration: none;
}

a:visited {
  color: blue;
  background-color: transparent;
  text-decoration: none;
}

a:hover {
  color: blue;
  background-color: transparent;
  text-decoration: underline;
}

a:active {
  color: red;
  background-color: transparent;
  text-decoration: underline;
}
</style>




<table style="width:100%">
	<tr><td>

<h1>YOU FOUND MY WEBPAGE!<BR>
BOOKMARK IT AND DOWNLOAD IT!<br>
<a href="http://thepeepshow.ddns.net/share/index.php">HAVE YOUR OWN YOUTUBE SERVER THAT CAN NOT BE TAKEN DOWN!</a>
</h1>


<div class="container">
      <video id="my-video" class="video-js vjs-theme-sea vjs-default-skin vjs-big-play-centered vjs-fluid" controls preload="auto" playsInline width="768" height="432" poster=""></video>
</div>
      <script src='js/video.min.js'></script>




        <script  >

        let hls = {
      src:
      "live.m3u8",
      type: "application/x-mpegURL" };


        let options = {
          liveui: true,
          //liveTracker: true,
          userActions: {
            hotkeys: function (event) {
              console.log(event);
            } } };



        videojs.log.history.disable();
        videojs.log.history.clear();
        let readyPlayer = function () {
          this.src(hls);
        };

        let player = videojs("my-video", options, readyPlayer);

        console.log(player, player.liveTracker, player.liveTracker.startTracking());

        player.on("error", e => {
          console.log(
          "error:",
          player.error().MEDIA_ERR_SRC_NOT_SUPPORTED,
          player.error().code,
          player.error().message);

        });

        </script>

<h1><a href="php-video-gallery/gallery/2a-caption-gallery.php">Click for: Past Broadcasts</a></h1>

         </td>
         <td>

    <?php
    if(!isset($_SESSION['name'])){
        loginForm();
    }
    else {
    ?>
        <div id="wrapper">
            <div id="menu">
                <p class="welcome">Welcome to AOL Chat:<br> <b><?php echo $_SESSION['name']; ?></b></p>
                <p class="logout"><a id="exit" href="#">Exit Chat</a></p>
            </div>
            <div id="chatbox">
            <?php
            if(file_exists("log.html") && filesize("log.html") > 0){
                $contents = file_get_contents("log.html");          
                echo $contents;
            }
            ?>
            </div>
            <form name="message" action="">
                <input name="usermsg" type="text" id="usermsg" />
                <input name="submitmsg" type="submit" id="submitmsg" value="Send" />
            </form>
        </div>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type="text/javascript">
            // jQuery Document 
            $(document).ready(function () {
                $("#submitmsg").click(function () {
                    var clientmsg = $("#usermsg").val();
                    $.post("post.php", { text: clientmsg });
                    $("#usermsg").val("");
                    return false;
                });
                function loadLog() {
                    var oldscrollHeight = $("#chatbox")[0].scrollHeight - 20; //Scroll height before the request 
                    $.ajax({
                        url: "log.html",
                        cache: false,
                        success: function (html) {
                            $("#chatbox").html(html); //Insert chat log into the #chatbox div 
                            //Auto-scroll 
                            var newscrollHeight = $("#chatbox")[0].scrollHeight - 20; //Scroll height after the request 
                            if(newscrollHeight > oldscrollHeight){
                                $("#chatbox").animate({ scrollTop: newscrollHeight }, 'normal'); //Autoscroll to bottom of div 
                            }	
                        }
                    });
                }
                setInterval (loadLog, 2500);
                $("#exit").click(function () {
                    var exit = confirm("Are you sure you want to end the session?");
                    if (exit == true) {
                    window.location = "index.php?logout=true";
                    }
                });
            });
        </script>

         </td></tr>
        </table>

<iframe src="counter/index.php>



   </body>
</html>
<?php
}
?>



	</td></tr>
	<tr><td>

<p>Bitcoin:<br>
bc1qyddp53asfrg2adsm96fjwxc2k347czgrqqst0j</p>
<script type="text/javascript" src="https://cdnjs.buymeacoffee.com/1.0.0/button.prod.min.js" data-name="bmc-button" data-slug="thepeepshow" data-color="#00aaff" data-font="Arial" data-emoji="" data-text="Peep's Coffee" data-outline-color="#000000" data-font-color="#000000" data-coffee-color="#ffffff" ></script>

    <!-- Adding link to the button on the onclick event -->
    <button class="GFG" 
    onclick="window.location.href = 'https://thepeepshow.locals.com';">
        Peep's Locals
    </button>


<h4><u>Download a Clone of this Webpage!<br>
and RTMP/HLS Server!<br>
Fully Independant from Censorship!</u></h4>


<a href="My_Youtube_Server.zip">"My_Youtube_Server.zip" including "read_me_first.txt" for intall instructions.</a>
<h3><u>RTMP/HLS Server rasperry PI 3 image, split in 2 zip files(optional but simple):</u></h3>
<a href="https://github.com/drakomofo/youtubeServer/releases/download/My_youtube_server/Rtmp_pi3_server_image.zip">"Rtmp_pi3_server_image.zip": part 1</a><br>
<a href="https://github.com/drakomofo/youtubeServer/releases/download/My_youtube_server/Rtmp_pi3_server_image.z01">"Rtmp_pi3_server_image.z01": part 2</a>
<h3><u>Mirrors:</u></h3>
<a href="https://github.com/drakomofo/youtubeServer">https://github.com/drakomofo/youtubeServer</a><br>
<a href="https://web.archive.org/web/20230427015638/http://thepeepshow.ddns.net/">also on wayback machine</a>

	</td></tr>
        </table>
</body>
</html>