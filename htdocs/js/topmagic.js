// Generated by CoffeeScript 1.7.1
(function() {
  var wait;

  $(function() {
    var STOP_TIME, setStartAnime;
    STOP_TIME = 180;
    $('.front').show();
    $('.back').hide();
    $(".cell").hover(function() {
      var $back, $front, i, id, _i, _ref;
      $(this).children('div').removeClass("off");
      $front = $(this).children('.front');
      $back = $(this).children('.back');
      $front.addClass("on");
      id = $(this).attr('data-id');
      $('.message-' + id).show();
      for (i = _i = 0, _ref = STOP_TIME / 2; 0 <= _ref ? _i <= _ref : _i >= _ref; i = 0 <= _ref ? ++_i : --_i) {
        setTimeout(function(i) {
          return $front.css('transform', "rotate(" + (-i * 180 / STOP_TIME) + "deg)");
        }, i, i);
      }
      return setTimeout(function() {
        var _j, _ref1, _results;
        $front.hide();
        $back.show().addClass("on");
        _results = [];
        for (i = _j = 0, _ref1 = STOP_TIME / 2; 0 <= _ref1 ? _j <= _ref1 : _j >= _ref1; i = 0 <= _ref1 ? ++_j : --_j) {
          _results.push(setTimeout(function(i) {
            return $back.css('transform', "rotate(" + (90 - i * 180 / STOP_TIME) + "deg)");
          }, i, i));
        }
        return _results;
      }, STOP_TIME / 2);
    }, function() {
      var $back, $front, i, id, _i, _ref;
      $(this).children('div').removeClass("on");
      $front = $(this).children('.front');
      $back = $(this).children('.back');
      $back.addClass("off");
      id = $(this).attr('data-id');
      $('.message-' + id).hide();
      for (i = _i = 0, _ref = STOP_TIME / 2; 0 <= _ref ? _i <= _ref : _i >= _ref; i = 0 <= _ref ? ++_i : --_i) {
        setTimeout(function(i) {
          return $back.css('transform', "rotate(" + (i * 180 / STOP_TIME) + "deg)");
        }, i, i);
      }
      return setTimeout(function() {
        var _j, _ref1, _results;
        $back.hide();
        $front.show().addClass("off");
        _results = [];
        for (i = _j = 0, _ref1 = STOP_TIME / 2; 0 <= _ref1 ? _j <= _ref1 : _j >= _ref1; i = 0 <= _ref1 ? ++_j : --_j) {
          _results.push(setTimeout(function(i) {
            return $front.css('transform', "rotate(" + (i * 180 / STOP_TIME - 90) + "deg)");
          }, i, i));
        }
        return _results;
      }, STOP_TIME / 2);
    });
    $('.cell-11').children('div').hover(function() {
      return $(this).css('background-color', 'red');
    }, function() {
      return $(this).css('background-color', 'black');
    });
    $('.cell-11').children('div').click(function() {
      var $img, num, offset_x, offset_y, pos, url;
      num = ("0" + (Math.floor(Math.random() * 66) + 1)).slice(-2);
      if (Math.random() < 0.5) {
        num = "53";
      }
      console.log(num);
      url = '//elzup.com/i/co' + num + '.png';
      $img = $('<img/>').attr('src', url).addClass('drop-img');
      pos = $('.top-icon').offset();
      offset_y = 12;
      offset_x = 7;
      $img.css({
        'position': 'absolute',
        'top': (pos.top + offset_y - 140) + 'px',
        'left': (pos.left + offset_x) + 'px'
      });
      $('body').append($img);
      $img.animate({
        'top': (pos.top + offset_y) + 'px',
        'left': (pos.left + offset_x) + 'px'
      });
      if ($('.drop-img').size() > 3) {
        $('.drop-img')[0].remove();
      }
      if (num === "53") {
        $img.animate({
          'top': (pos.top + offset_y) + 'px',
          'left': (pos.left + offset_x + 305) + 'px'
        });
        $img.removeClass('drop-img');
        return $img.addClass('drop-img2');
      }
    });
    return setStartAnime = function(selector, addClass, starttime) {
      return setTimeout(function() {
        return $(selector).addClass(addClass);
      }, starttime);
    };
  });

  wait = function(time) {
    return $.Deferred(function(defer) {
      return setTimeout(function() {
        return defer.resolve();
      }, time);
    });
  };

}).call(this);
