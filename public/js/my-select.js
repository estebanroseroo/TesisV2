 $(document).ready(function() {
        $('select[name="idfacultad"]').on('change', function(){
        var ID = $(this).val();
        if(ID) {
            $.ajax({
                url: '/get/'+ID ,
                type:"GET",
                dataType:"json",
                beforeSend: function(){
                    $('#loader').css("visibility", "visible");
                    },
                success:function(data) {
                    $('select[name="idcarrera"]').empty();
                    document.getElementById("idcarrera").insertBefore(new Option('--- Seleccione una carrera ---', ''), document.getElementById("idcarrera").firstChild);
                    $.each(data, function(key, value){
                        $('select[name="idcarrera"]').append('<option value="'+ key +'">' + value + '</option>');
                        });
                    },
                complete: function(){ 
                    $('#loader').css("visibility", "hidden"); 
                    }
                    });
                } 
        else { 
            $('select[name="idcarrera"]').empty(); 
            document.getElementById("idcarrera").insertBefore(new Option('--- Seleccione una carrera ---', ''), document.getElementById("idcarrera").firstChild);
            }
         });

    
        $('select[name="idfacultadedit"]').on('change', function(){
        var ID = $(this).val();
        $('#idcarreraedit').removeAttr('disabled');
        if(ID) {
            $.ajax({
                url: '/get/'+ID ,
                type:"GET",
                dataType:"json",
                beforeSend: function(){
                    $('#loader').css("visibility", "visible");
                    },
                success:function(data) {
                    $('select[name="idcarreraedit"]').empty();
                    $.each(data, function(key, value){
                        $('select[name="idcarreraedit"]').append('<option value="'+ key +'">' + value + '</option>');
                        });
                    },
                complete: function(){ 
                    $('#loader').css("visibility", "hidden"); 
                    }
                    });
                } 
        else { 
            $('select[name="idcarreraedit"]').empty(); 
            }
        });
});