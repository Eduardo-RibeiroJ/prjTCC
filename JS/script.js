$('nav a').click(function(e) {
  e.preventDefault();
  var id = $(this).attr('href'),
  targetOffset = $(id).offset().top,
  menuHeight = $('nav').innerHeight();


  $('html, body').animate({
    scrollTop: targetOffset - menuHeight
  }, 500);
  
});

var select = document.getElementById('cmbSituacaoInsti');
var DataTermInsti = document.querySelector('input[type="date"][name="DataTermInsti"]');
select.addEventListener('change', function () {
  DataTermInsti.disabled = this.value == 'IM';

});

var select = document.getElementById('cmbSituacaoCurso');
var DataTermCurso = document.querySelector('input[type="date"][name="DataTermCurso"]');
select.addEventListener('change', function () {
  DataTermCurso.disabled = this.value != 'FI' && this.value != 'EM';

});