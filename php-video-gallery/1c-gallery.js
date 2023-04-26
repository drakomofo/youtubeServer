var vplay = {
  // (A) INIT - CLICK VIDEO TO GO FULL SCREEN
  init : () => { for (let v of document.querySelectorAll(".gallery video")) {
    v.onclick = () => {
      if (!v.classList.contains("full")) { vplay.toggle(v); }
    };
  }},

  // (B) TOGGLE FULLSCREEN
  toggle : e => {
    // (B1) TOGGLE CLOSE BUTTON
    document.getElementById("vClose").classList.toggle("show");

    // (B2) TOGGLE VIDEO
    let v = e===false ? document.querySelector(".gallery .full") : e ;
    v.classList.toggle("full");
    v.controls = e===false ? false : true ;
    if (e===false) { v.pause(); }
  }
};
window.onload = vplay.init;