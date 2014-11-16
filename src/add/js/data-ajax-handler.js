    $(document).ready(function(){
        var location = window.location.pathname.split('/').slice(-1)[0];
        $('#results').html('<p style="padding:5px;">Adicione um termo para a pesquisa.</p>');
        $('#searchData').keyup(function() {
            var searchVal = $(this).val();
            if(searchVal !== '') {

                $.get('data/busca-entretenimento.php?searchData='+searchVal+ '&location=' + location, function(returnData) {
                    /* If the returnData is empty then display message to user
                     * else our returned data results in the table.  */
                    if (!returnData) {
                        $('#results').html('<p style="padding:5px;">Não achamos nada com esse nome.</p>');
                    } else {
                        $('#results').html(returnData);
                    }
                });
            } else {
                $('#results').html('<p style="padding:5px;">Adicione um termo para a pesquisa.</p>');
            }
        });

    });

function add(value) {
    var location = window.location.pathname.split('/').slice(-1)[0];
    $.get('data/add-entretenimento.php?value='+ value + '&location=' + location, function(returnData) {
        $('#saida').html(returnData);
    });
}

function remover(tabela, value) {
    $.get('add/data/exclui-entretenimento.php?value='+ value + '&tabela=' + tabela, function(returnData) {
        $('#saida').html(returnData);
    });
}

