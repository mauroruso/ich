var file_name;

$(document).ready(function() {

    $('#table-pagination').bootstrapTable({data: candidatosSeleccionados});

    

    $('.si').click( function() {  
        $('#table-pagination').bootstrapTable('togglePagination'); 
        $('#table-pagination').tableExport({type:'excel', fileName: file_name});
        $('#table-pagination').bootstrapTable('togglePagination'); 
    })
    
    $("#modalExito").on("show", function() {    // wire up the OK button to dismiss the modal when shown
        $("#modalExito a.btn").on("click", function(e) {
                console.log("button pressed");   // just as an example...
                $("#modalExito").modal('hide');     // dismiss the dialog
            })
    })

    $("#modalExito").on("hide", function() {    // remove the event listeners when the dialog is dismissed
        $("#modalExito a.btn").off("click");
    });

    $("#modalExito").on("hidden", function() {  // remove the actual elements from the DOM when fully hidden
        $("#modalExito").remove();
    });


    $("#modalErrorModelo").on("show", function() {    // wire up the OK button to dismiss the modal when shown
        $("#modalErrorModelo a.btn").on("click", function(e) {
            console.log("button pressed");   // just as an example...
            $("#modalErrorModelo").modal('hide');     // dismiss the dialog
        })
    })
    $("#modalErrorModelo").on("hide", function() {    // remove the event listeners when the dialog is dismissed
        $("#modalErrorModelo a.btn").off("click");
    })

    $("#modalErrorModelo").on("hidden", function() {  // remove the actual elements from the DOM when fully hidden
        $("#modalErrorModelo").remove();
    })



    
    $(document).on('click', '.finalizar', function() {

        $(this).prop('disabled',true);

        $.ajax({
            url : url_evaluacion_step5,
            cache: false,
            success : function(result) {    

                file_name = result;

                $("#modalExito").modal({                    // wire up the actual modal functionality and show the dialog
                    "backdrop"  : "static",
                    "keyboard"  : true,
                "show"      : true                    // ensure the modal is shown immediately
                })

            },

            error: function(result) {   

                if(typeof result.responseJSON == 'string')
                {   
                    $('div.errorModelo').remove();
                    $('.mensaje').append($('<div class="errorModelo"></div>').append(
                        '<h4 align="center">'+ result.responseJSON +'</h4>'));

                    $("#modalErrorModelo").modal({                    // wire up the actual modal functionality and show the dialog
                        "backdrop"  : "static",
                        "keyboard"  : true,
                    "show"      : true                    // ensure the modal is shown immediately
                    })
                }   
                else if(typeof result.responseJSON == 'object'){


                        $('div.errorCandidatos').remove();
                        
                        var result = result.responseJSON;
                        
                        for($i=0, $total = result.length; $i < $total; $i++) {
                            $('.candidatosActivos').append($('<div class="errorCandidatos"></div>').append(
                                '<span class="text-danger"><ul><li>'+result[$i].apellido+', '+result[$i].nombre+'</li></ul></span>'));
                        }
                        
                        $("#modalCandidatosActivos").on("show", function() {    // wire up the OK button to dismiss the modal when shown
                            $("#modalCandidatosActivos a.btn").on("click", function(e) {
                                console.log("button pressed");   // just as an example...
                                $("#modalCandidatosActivos").modal('hide');     // dismiss the dialog
                            })
                        })
                        $("#modalCandidatosActivos").on("hide", function() {    // remove the event listeners when the dialog is dismissed
                            $("#modalCandidatosActivos a.btn").off("click");
                        })

                        $("#modalCandidatosActivos").on("hidden", function() {  // remove the actual elements from the DOM when fully hidden
                            $("#modalCandidatosActivos").remove();
                        })

                        $("#modalCandidatosActivos").modal({                    // wire up the actual modal functionality and show the dialog
                          "backdrop"  : "static",
                          "keyboard"  : true,
                          "show"      : true                     // ensure the modal is shown immediately
                        })
                }
                else {

                    $('div.errorModelo').remove();
                    $('.mensaje').append($('<div class="errorModelo"></div>').append(
                        '<h4 align="center">'+ $(result.responseText).filter('title').text() +'</h4>'));

                    $("#modalErrorModelo").modal({                    // wire up the actual modal functionality and show the dialog
                        "backdrop"  : "static",
                        "keyboard"  : true,
                    "show"      : true                    // ensure the modal is shown immediately
                    })
                }
            }
        })
    })
})   