<!DOCTYPE html>
<html>
  <head>
    <title>Simple PHP Video Gallery</title>
    <link rel="stylesheet" type="text/css" href="1b-gallery.css">
    <script src="1c-gallery.js"></script>
 </head>
  <body>
    <!-- (A) CLOSE FULLSCREEN VIDEO -->
    <div id="vClose" onclick="vplay.toggle(false)">X</div>

    <!-- (B) VIDEO GALLERY -->
    <div class="gallery"><?php
      // (B1) GET VIDEO FILES FROM GALLERY FOLDER
      $dir = __DIR__ . DIRECTORY_SEPARATOR . "gallery" . DIRECTORY_SEPARATOR;
      $vid = glob("$dir*.{webm,mp4,ogg}", GLOB_BRACE);

      // (B2) OUTPUT VIDEOS
      if (count($vid) > 0) { foreach ($vid as $v) {
        printf("<video src='gallery/%s'></video>", rawurlencode(basename($v)));
      }}
    ?></div>
  </body>
</html>