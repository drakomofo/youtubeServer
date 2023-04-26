# youtubeServer
a personal streaming server with RTMP/HLS and php chat. all centralized on your PC so no one can take you down!



this is the guide to installing a youtube like server on your computer 
you can stream to with obs. also a simple php chat and webcounter is included.
I am not a programr so all the code was copied from open source projects, all 
i did was put it all together for the people to fight back againsg internet 
cencorship.  i also compiled my rapberry pi RTMP server image. it's 8GB but 
its ready to go with no setup. my image is for the rapberry pi 3 model. wont work 
on pi 4.  thets get after it!


what you need: 
1. a rasperry pi.
2. 128GB or larger sdcard for the raspberry pi if you use my .imag file. 32GB or larger if you compile it yourself.
3. a windows computer to install OBS and the web server.
4. rasperry pi os imager: https://www.raspberrypi.com/software/
5. xampp https://www.apachefriends.org/
6. elclips IDE version https://www.eclipse.org/downloads/
7. obs https://obsproject.com/
8. multi_stream_pluggin for obs https://github.com/sorayuki/obs-multi-rtmp (optional but better than restream, 
dont outsource your stream to a third party! whats the point of this if you do?)
9. Rtmp_pi3_server_image.img (optional)
10. the website files: My_youtube_server.zip
11. a free no-ip account for your website: https://www.noip.com/ (optional)






step 1:
If you would like to set up the rtmp pi server yourself (ex: if you have 
a rasperry pi 4) unzip the My_Own_youtube_server.zip and open the raspberry pi 
imager softwere, put in your sdcard and pick the raspbain_64 os image and install
raspbain 64 version. then go to this address and follow the install guide 

https://yenthanh.medium.com/setup-a-rtmp-livestream-server-in-15-minutes-with-srs-1b0046c77267

make sure you turn on RTMP and HLS streaming.

otherwise use my image file Rtmp_pi3_server_image.zip unzip it, open rasberry pi imager 
and copy Rtmp_pi3_srver.img to your sdcard for your pi. 

RTMP/HLS srerver is ready. Plug the PI into your router, do not use wifi. go to your 
router settings and make the pi have a static address. for this install it will be 192.168.1.3 
but you can make it whatever you want. If you want others to stream to your site, then 
forward port 8080 to 192.168.1.3 (or the ip you chose). also forward pot 80 to the ip address
your webserver will be hoasted.

your Raspberry PI RTMP/HLS server is up and ready to use.






step B:
hard part is over.  now if you havent already, install obs and stream to

server: rtmp://192.168.1.3/app (or the ip you chose)
key: live.flv 

the key name can be anything you want as well but i use live.flv. you can have up to 1000 people on your 
rtmp/hls server so if you are streaming as live.flv someone else can stream as jake.flv. think of the key 
as the streams username.  now start streaming and open video lan go to file open network source and type this 
address in: 

192.168.1.3:8080/app/live.flv  

your stream should be playing.  
now also check the HLS stream

192.168.1.3:8080/app/live.m3u8

if this is playing save a playlist of this to live.m3u8 into c://xampp/htdocs
make a playlist like this for every user you have streaming.






Part III:
installing your web service.  they have made installing a webservice on windows easy with the program 
xampp. i would get the latest version of these programs by the way. install everything except for tomcat. 
then install eclips for the java scrypting part. your root folder for the website will be c://xampp/htdocs
make a folder in here lets say /thepeepshow  move My_youtube_server.zip contents in folder /thepeepshow and unzipit.
go to 192.168.1.3/thepeepshow and you should see your content.  choose any name for the chat and start watching and chatting.

take note that any video files you drop in the c://xampp/htdocs/php-video-gallery/gallery folder will show up in
Past Broadcasts Link.

next i would set up a domain name so people can find you easyer. https://www.noip.com/ its free. don't
forget to download the app so your ip address syncs with your new website address. my router has a no-ip so i use that.
enjoy your new personlised free speach platform!


If you liked this tutorial please feel free to click on the buy me a coffee link on your new website 
and donate before you delete it. I am a very poor person. thank you! and enjoy.  


If this did not work for you please let me know in my chat on http://thepeepshow.ddns.net and i might be able to help.

