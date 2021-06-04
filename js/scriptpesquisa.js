
$('#formpesq').submit(function(e){
    e.preventDefault();

    var u_email = $('#email').val();

    console.log(u_email);
/*    $.ajax({
        url: 'http://localhost/guararapesnatacao/admin/consultarAluno',
        method: 'POST',
        data: {email: u_email},
        dataType: 'json'
    }).done(function(result){
        $('#email').val('');
        console.log(result);
    });*/
});
