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
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="css/tick.css">
    </head>
    <body>

<table style="width:100%">
	<tr><td>

<h1>YOU FOUND MY WEBPAGE!<BR>
BOOKMARK IT AND DOWNLOAD IT!<br>
HAVE YOUR OWN YOUTUBE SERVER THAT CAN NOT BE TAKEN DOWN!
</h1>
<!-- CSS  -->
 <link href="https://vjs.zencdn.net/7.2.3/video-js.css" rel="stylesheet">


<!-- HTML -->
<video id='hls-example'  class="video-js vjs-default-skin" controls preload="none">
<source type="application/x-mpegURL" src="live.m3u8">
</video>


<!-- JS code -->
<!-- If you'd like to support IE8 (for Video.js versions prior to v7) -->
<script src="https://vjs.zencdn.net/ie8/ie8-version/videojs-ie8.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/videojs-contrib-hls/5.14.1/videojs-contrib-hls.js"></script>
<script src="https://vjs.zencdn.net/7.2.3/video.js"></script>

<script>
var player = videojs('hls-example');
player.play();
</script>

<h1><a href="http://thepeepshow.ddns.net:8282/pastbroadcasts/2a-caption-gallery.php">Click for: Past Broadcasts</a></h1>

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

<p>Bitcoin: <br>bc1qyddp53asfrg2adsm96fjwxc2k347czgrqqst0j</p>
<script type="text/javascript" src="https://cdnjs.buymeacoffee.com/1.0.0/button.prod.min.js" data-name="bmc-button" data-slug="thepeepshow" data-color="#FFDD00" data-emoji="" data-font="Arial" data-text="Buy me a coffee" data-outline-color="#000000" data-font-color="#000000" data-coffee-color="#ffffff" ></script>
<H1 color="#ff5500">Donate a Coffee and I will play anything @ any time!</h1>


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