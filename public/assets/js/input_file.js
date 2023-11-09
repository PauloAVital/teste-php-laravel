/* Modelo Javascript */
let $input    = document.getElementById('input-file');
let $fileName = document.getElementById('file-name');
let $buttonSendFile = document.getElementById('buttonSendFile');

$input.addEventListener('change', function(){
  $fileName.textContent = this.value;
  $buttonSendFile.style.display = "block";
});

function verificaExtensao($input) {
    var extPermitidas = ['json', 'JSON', 'Json'];
    var extArquivo = $input.value.split('.').pop();

    if(typeof extPermitidas.find(function(ext){ return extArquivo == ext; }) == 'undefined') {
        alert('Extensão "' + extArquivo + '" não permitida!');
    } 
}


/* Modelo Jquery */
$(document).ready(function(){
    $("#buttonSendFile").click(function(event) {
        let _token = $('meta[name="csrf-token"]').attr('content');
        let _json =  $('input[name="input-file"]').get(0).files[0];
        let host = window.location.host;
        
        $.getJSON('http://'+host+'/data/'+_json['name'], function(json) {
            $.ajax({
                type: 'POST',
                url: "../../../../importDocuments",
                headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                data: {
                    _token: _token,
                    'json': json
                },
                success: function(data) {
                    let dataSet = [];                    
                    $.each(data['data'], function(index,dados){
                        conteudo = dados.conteúdo.substring(0, 30)+'...';
                        dataSet.push([dados.categoria, dados.titulo, conteudo]);
                    });
                    if (data['success']){
                        $('#fila_processada').DataTable({
                            data: dataSet,
                            columns: [
                                { title: 'categoria' },
                                { title: 'titulo' },
                                { title: 'conteúdo' }
                            ]
                        });

                        $buttonSendFile.style.display = "none";
                        $('#input-file').empty();
                        $('#file-name').empty();
                        
                    }
                }
            });
        });
    })
});


