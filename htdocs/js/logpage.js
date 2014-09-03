// Generated by CoffeeScript 1.7.1
(function() {
  $(function() {
    var $async_birthday, $async_dsyogi, $async_tweetlog;
    $async_tweetlog = $('#async-tweetlog');
    $async_dsyogi = $('#async-dsyogi');
    $async_birthday = $('#async-birthday');
    $.ajax({
      type: "GET",
      url: "./log/tweetlogplain",
      success: function(plain) {
        $async_tweetlog.html(plain);
        $async_tweetlog.removeClass('hidden');
        return $async_tweetlog.click(function() {
          if ($('.svg-panel').css('display') === 'none') {
            $('.svg-line').hide();
            return $('.svg-panel').show();
          } else {
            $('.svg-line').show();
            return $('.svg-panel').hide();
          }
        });
      },
      error: function() {
        return $async_tweetlog.html('読み込みに失敗しました');
      }
    });
    $.ajax({
      type: "GET",
      url: "./log/dsyogiplain",
      data: "",
      success: function(plain) {
        return $async_dsyogi.html(plain);
      },
      error: function() {
        return $async_dsyogi.html('読み込みに失敗しました');
      }
    });
    return $.ajax({
      type: "GET",
      url: "./log/birthdayplain",
      success: function(plain) {
        return $async_birthday.html(plain);
      },
      error: function() {
        return $async_birthday.html('読み込みに失敗しました');
      }
    });
  });

}).call(this);
