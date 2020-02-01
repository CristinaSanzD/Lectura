$.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });

$('#search').on('keyup',function(){

    $valor = $(this).val();

    $.ajax({
        type : 'get',
        url : '/search',
        dataType: 'json',
        data: {'busca': $valor},

        success:function(datos) {
            
            salida = $("tbody").empty();
            
            if ( datos.id === 'n')          
               $('tbody').append('No hay datos');
            else
            { 
                for (var i=0; i<datos.length; i++) {
                    salida += '<tr>';
                    salida += '<td>'+datos[i].id+'</td>';
                    salida += '<td>'+datos[i].nombre+'</td>';
                    salida += '<td>'+datos[i].descripcion+'</td>';
                    salida += '<td>'+datos[i].genero+'</td>';
                    salida += '<td>'+datos[i].numpag+'</td>';
                    salida += '<td>'+datos[i].autor+'</td>';
                    salida += '</tr>';
                }
                       
                $('tbody').append(salida);   
            }    
        }
    });
})


$(document).on('click', '.button', function (e) {
    e.preventDefault();
    var id = $(this).data('id');
    swal({
            title: "Are you sure!",
            type: "error",
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes!",
            showCancelButton: true,
        },
        function() {
            $.ajax({
                type: "POST",
                url: "{{url('/libros.destroy')}}",
                data: {id:id},
                success: function (data) {
                              //
                    }         
            });
    });
});



