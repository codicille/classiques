function Tabs($wrapper){
  this.$wrapper = $wrapper;
  this.$tabs = this.$wrapper.find('.js-tabs a');
  this.$content = this.$wrapper.find('.js-tabs-content');
  this.init();
}

Tabs.prototype = {
  init: function(){
    this.$tabs.each(function(i, el){
      var $el = $(el),
          $content = $($el.attr('href')).parents('.js-tabs-content');
      $el.data('content', $content);
      $content.toggleClass('hidden', !$el.hasClass('active'))
    });
    this.$tabs.on('click', this.handleTabClick.bind(this));

    this.handleHash();
    $(window).on('hashchange', this.handleHash.bind(this));
  },
  handleHash: function(){
    var hash = window.location.hash;
    if(hash) {
      this.removeAllActives();
      this.$tabs.filter('[href="' + hash + '"]').trigger('click');
    }
  },
  handleTabClick: function(e){
    e.preventDefault();

    this.hideAllContents();
    this.removeAllActives();

    var $el = $(e.currentTarget),
        loc = document.location,
        newUrl = loc.origin + loc.pathname + $el.attr('href');

    $el.data('content').removeClass('hidden');
    $el.addClass('active');

    if(e.originalEvent) history.pushState({}, document.title, newUrl);
  },
  hideAllContents: function(){
    this.$content.not('.hidden').addClass('hidden');
  },
  removeAllActives: function(){
    this.$tabs.filter('.active').removeClass('active');
  }
}

$(document).ready(function(){
  var tabs = new Tabs($('.js-tabs-wrap'));
});
