
$(function(){
    $('#cadTurmaModal').on('shown.bs.modal', function () {
        $('#nomeTurma').focus();
    });

    listarTurmas();
});

function listarTurmas(){
    $.ajax({
        method: "GET",
        url: base + "/turmas/listar"
    }).done(function(resp) {
        $('#turmas').html(resp);
    });
}

function salvarTurma(){
    
    $.ajax({
        method: "POST",
        url: base + "/turmas/salvar",
        data: $('#carTurmaForm').serialize()
    }).done(function(resp) {
        $('#turmas').html(resp);
    });
}
