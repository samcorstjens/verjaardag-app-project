$(document).ready(function() {

  $('#search').click(function() {

    var search = $('#searchYT').val();
    var url = "http://www.youtube.com/embed?listType=search&list=";
    var result = url + search;



    console.log(result);
    $('#player').attr('src', result);
    //////////////////////////////////
    // $('#directURL').text('Direct link: '+result);
    $('#resultURL').text('Search result: '+"https://www.youtube.com/results?search_query="+search);


    $('#directURL1').attr('href', result);
    $('#resultURL1').attr('href', "https://www.youtube.com/results?search_query="+search);

  });
  ///////////////////////////////
  //https://www.youtube.com/oembed?url=https://www.youtube.com/watch?v=ymNFyxvIdaM&format=json
  /////////////////////////////
  //freestyler id = ymNFyxvIdaM
  $('#link').click(function() {
    var ytid = $('.ytp-title-link').href;
    $('#directURL').text('Direct link: '+ytid);
  });




  var tag = document.createElement('script');

  tag.src = "https://www.youtube.com/iframe_api";
  var firstScriptTag = document.getElementsByTagName('script')[0];
  firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

  var player;
  function onYouTubeIframeAPIReady() {
    player = new YT.Player('player', {
      height: '390',
      width: '640',
      videoId: 'M7lc1UVf-VE',
      events: {
        'onReady': onPlayerReady,
        'onStateChange': onPlayerStateChange
      }
    });
  }

  function onPlayerReady(event) {
    event.target.playVideo();
  }

  var done = false;
  function onPlayerStateChange(event) {
    if (event.data == YT.PlayerState.PLAYING && !done) {
      setTimeout(stopVideo, 6000);
      done = true;
    }
  }
  function stopVideo() {
    player.stopVideo();
  }
});
