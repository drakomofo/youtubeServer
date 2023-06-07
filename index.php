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
<!-- website links colors -->
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

<!-- website title -->
		<h1 style="font-size:3vw;text-align:center">YOU FOUND MY WEBPAGE!
		BOOKMARK IT AND DOWNLOAD IT!
		</h1>


<!-- start video code -->

<!-- <script src="https://cdn.jsdelivr.net/npm/hls.js@1"></script> -->
<!-- Or if you want the latest version from the main branch -->
<script src="https://cdn.jsdelivr.net/npm/hls.js@canary"></script>
		<div class="container">
			<video id="video" 
			 controls preload="auto" playsInline width="768" height="432">
			</video>
		</div>
<script>
  var video = document.getElementById('video');
  var videoSrc = 'videostream/live.m3u8';
  if (Hls.isSupported()) {
    var hls = new Hls();
    hls.loadSource(videoSrc);
    hls.attachMedia(video);
  }
  // HLS.js is not supported on platforms that do not have Media Source
  // Extensions (MSE) enabled.
  //
  // When the browser has built-in HLS support (check using `canPlayType`),
  // we can provide an HLS manifest (i.e. .m3u8 URL) directly to the video
  // element through the `src` property. This is using the built-in support
  // of the plain video element, without using HLS.js.
  //
  // Note: it would be more normal to wait on the 'canplay' event below however
  // on Safari (where you are most likely to find built-in HLS support) the
  // video.src URL must be on the user-driven white-list before a 'canplay'
  // event will be emitted; the last video event that can be reliably
  // listened-for when the URL is not on the white-list is 'loadedmetadata'.
  else if (video.canPlayType('application/vnd.apple.mpegurl')) {
    video.src = videoSrc;
  }
</script>


<!-- video gallery -->
<h1><a href="php-video-gallery/2a-caption-gallery.php">Click for: Past Broadcasts</a></h1>

         </td>
         <td>

<!-- chatroom after login -->
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



   </body>
</html>


<!-- close out chat code -->
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
(version 2.0) HLS Server NO raspberry pi needed</u></h4>
<a href="share/My_Youtube_Server_v2.0.zip">"My_Youtube_Server_v2.0.zip" including "read_me_first.txt" for intall instructions.</a>
<br>
<br>
<br>
<p>######Old version_1.0 not needed any more unless you want an RTMP server.########</p>
<h4><u>(version 1.0)RTMP/HLS Server Fully Independant from Censorship!</u></h4>
<a href="share/My_Youtube_Server_v1.0.zip">"My_Youtube_Server_v1.0.zip" including "read_me_first.txt" for intall instructions.</a>

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