window.onload = function() {
  if (jQuery(window).width() > 999) {
    var container = jQuery('#page');
    var oldHeight = container.height();
    var newHeight = oldHeight - 232;
    var newHeightString = newHeight + 'px';
    container.css('overflow', 'hidden');
    container.css('max-height', newHeightString);
  }
}