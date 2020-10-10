$(document).ready(function () {

  /* JS Event Bubbling */
  
  // Language change

  $('#lang-switch').on('change', function (event){
    /* 
      event.target = <select></select>
      event.currentTarget = <form></form>
    */
    event.currentTarget.submit();

  });





  /*  $('#comment-form').on('submit', function (event) {
     event.preventDefault();
 
     const user = $('#name').val().trim();
     const comment = $('#comment').val().trim();
 
     if (user !== '' && comment !== '') {
 
       $.ajax({
         url: 'http://localhost:9000/index.php/api/post',
         type: 'POST',
         contentType: 'application/json',
         data: JSON.stringify({ user, comment }),
         dataType: 'json',
 
         success(result, status, xhr) {
 
           if (status === 'success') {
             alert(result.msg);
           }
 
         },
         error(xhr, status, error) {
           alert(error);
         }
 
       });
 
     }
     else {
       alert('Please enter data.')
     }
 
   }); */

});