$(function() {
   $('.modal').modal();
   $('.delete-project').click(function() {
      console.log($(this)[0].dataset.link);
       $('#confirm-delete-project')[0].href = $(this)[0].dataset.link;
   });
});