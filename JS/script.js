$('nav a').click(function(e) {
  e.preventDefault();
  var id = $(this).attr('href'),
  targetOffset = $(id).offset().top,
  menuHeight = $('nav').innerHeight();


  $('html, body').animate({
    scrollTop: targetOffset - menuHeight
  }, 500);
  
});

var select = document.getElementById('cbbSituacaoInsti');
var DtaTermInsti = document.querySelector('input[type="date"][name="DtaTermInsti"]');
select.addEventListener('change', function () {
  DtaTermInsti.disabled = this.value == 'IM';

});
