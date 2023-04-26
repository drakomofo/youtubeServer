<!DOCTYPE html>
<html>
  <head>
    <title>Simple PHP Video Gallery</title>
    <link rel="stylesheet" type="text/css" href="2b-gallery.css">
    <script src="1c-gallery.js"></script>
 </head>
  <body>

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-CLEM5GXSVN"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-CLEM5GXSVN');
</script>


    <!-- (A) CLOSE FULLSCREEN VIDEO -->
    <div id="vClose" onclick="vplay.toggle(false)">X</div>

    <!-- (B) VIDEO GALLERY -->
    <div class="gallery"><?php
      // (B1) GET VIDEO FILES FROM GALLERY FOLDER
      $dir = __DIR__ . DIRECTORY_SEPARATOR . "gallery" . DIRECTORY_SEPARATOR;
      $vid = glob("$dir*.{webm,mp4,ogg}", GLOB_BRACE);

      // (B2) OUTPUT VIDEOS
      if (count($vid) > 0) { foreach ($vid as $v) {
        $file = basename($v);
        $caption = substr($file, 0, strrpos($file, "."));        
        printf("<div class='vWrap'>
          <video src='gallery/%s'></video>
          <div class='vCaption'>%s</div>
        </div>", rawurlencode($file), $caption);
      }}
    ?></div>
  </body>
</html>