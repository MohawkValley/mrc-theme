jQuery(document).ready(function($) {
  if ($(window).width() > 999) {
    var container = $('#page');
    var oldHeight = container.height();
    var newHeight = oldHeight - 232;
    var newHeightString = newHeight + 'px';
    container.css('overflow', 'hidden');
    container.css('max-height', newHeightString);
  }
});