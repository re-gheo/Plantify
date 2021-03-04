$(function(){
  $('.datepicker').datepicker({
      format: 'mm-dd-yyyy',
      endDate: '+0d',
      autoclose: true
  });
});

$("#menu-toggle").click(function (e) {
  e.preventDefault();
  $("#wrapper").toggleClass("toggled");
});
