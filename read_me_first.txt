# youtubeServer
a personal streaming server with RTMP/HLS and PHP chat. all centralized on your PC, so no one can take you down!
 
This is the guide to installing a YouTube-like server on your computer you can stream to with Obs. Also, a simple PHP chat and web-counter is included.
I am not a programmer, so all the code was copied from open-source projects. All
What I did was put it all together for the people to fight back against internet censorship.  I also compiled my Raspberry Pi RTMP server image.
It's 3.5 GB, but It's ready to go with no setup. My image is for the Raspberry Pi 3 model. wont work on Pi 4. Let's get after it!



What you need:
1. a Raspberry Pi.
2. 128GB or larger SD card for the Raspberry Pi if you use my .imag file. 32GB or larger if you compile it yourself.
3. A Windows computer to install OBS and the web server
4. Raspberry Pi OS Imager: 'https://www.raspberrypi.com/software'
5. xampp 'https://www.apachefriends.org'
6. Eclipse IDE version: 'https://www.eclipse.org/downloads'
7. Obs: 'https://obsproject.com'
8. multi_stream_pluggin for obs: 'https://github.com/sorayuki/obs-multi-rtmp' (optional but better than restream, 
Don't outsource your stream to a third party! What's the point of this if you do?)
9. 'Rtmp_pi3_server_image.img' (optional)
10. the website files: 'My_youtube_server.zip'
11. a free No-IP account for your website: 'https://www.noip.com' (optional)
 

(skip if using Rtmp_pi3_server_image.img)
step 1:
If you would like to set up the RTMP Pi server yourself (ex: if you have a Raspberry Pi 4) Unzip the 'My_Own_youtube_server.zip' 
and open the Raspberry Pi imager software, put on your SD card and pick the 'raspbain_64 Pi 64 OS image',
and installRasbian 64 version. then go to this address and follow the installation guide.

'https://yenthanh.medium.com/setup-a-rtmp-livestream-server-in-15-minutes-with-srs-1b0046c77267'

Make sure you turn on RTMP and HLS streaming.


Otherwise, use my image file, Rtmp_pi3_server_image.zip, unzip it, and open Rasberry Pi Imager
and copy Rtmp_pi3_srver.img to your SD card for your pi.
The RTMP/HLS server is ready. Plug the PI into your router; do not use WiFi. Go to your
router settings and make the Pi have a static address. For this install, it will be '192.168.1.3'
but you can make it whatever you want. If you want others to stream to your site, then 
Forward port '8080' to '192.168.1.3' (or the IP you chose). Also, forward port '80' to the IP address Your webserver will be hosted.

Your Raspberry PI RTMP/HLS server is up and ready to use.
 

 
step B:
The hard part is over. Now, if you haven't already, install OBS and stream to

server: 'rtmp://192.168.1.3/app' (or the IP you chose)
key: 'live.flv'

The key name can be anything you want as well, but I use live.flv. You can have up to 1000 people on your rtmp/hls server, 
so if you are streaming as live.flv someone else can stream as jake.flv. Think of the key as the stream's username. 
Now start streaming and open videolan (VLC) Go to File > Open Network Source and type this address in: 

'192.168.1.3:8080/app/live.flv'

Your stream should be playing.


Now also check the HLS stream.
'192.168.1.3:8080/app/live.m3u8'
If this is playing, save a playlist of it to 'live.m3u8' into 'c://xampp/htdocs'
Make a playlist like this for every user you have streaming.
 
 
Part III:
installing your web service. They have made installing a web service on Windows easy with the program xampp. 
I would get the latest version of these programs, by the way. install everything except Tomcat. 

then install Eclipse for the Java scrypting part. Your root folder for the website will be 'c://xampp/htdocs'.
Make a folder in here, let's say '/thepeepshow'. Move 'My_youtube_server.zip' contents in folder '/thepeepshow' and unzip it.
Go to '192.168.1.3/thepeepshow' and you should see your content. Choose any name for the chat and start watching and chatting.

Take note that any video files you drop in the 'c://xampp/htdocs/php-video-gallery/gallery' folder will show up inPast Broadcasts Link

Next, I would set up a domain name so people could find you easier. 'https://www.noip.com' it's free.
Don't forget to download the app so your ip address syncs with your new website address. My router has a no-ip, so I use that.




Enjoy your new personalized free speech platform!
If you liked this tutorial, please feel free to click on the buy me a coffee link on your new website and donate before you delete it
(or keep it on your site to help me out). I am a very poor person. thank you! and enjoy.


If this did not work for you, please let me know in my chat on http://thepeepshow.ddns.net and I might be able to help.
 