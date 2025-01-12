let hoverPlay = document.querySelectorAll(".hover-play");

hoverPlay.forEach(function (iframe) {
  var player = new Vimeo.Player(iframe);

  // Play the video on hover
  iframe.addEventListener("mouseenter", function () {
    player.play();
  });

  // Pause the video when hover ends
  iframe.addEventListener("mouseleave", function () {
    player.pause();
  });
});
