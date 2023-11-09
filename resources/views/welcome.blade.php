<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<meta name="csrf-token" content="{{ csrf_token() }}" />    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>AI Solutions</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
       <link href="{{ asset('assets/css/main.css')}}" rel="stylesheet">
       
    </head>
    <body>
    
        <div class="flex-center position-ref full-height">
            <div class="content">
                <img class="card-img-top" src="img/AISolutions.jpeg" alt="dashboard">
                <div class="title m-b-md">                
                    <h3>
                        <b><u>AI Solutions</u></b>
                    </h3>
                    <hr>
                </div>

                    

                    <div id="wrapper">
                    <div id="left">
                    <div class='input-wrapper'>
                    <form enctype="multipart/form-data" id="myform">
                        <label for='input-file'>
                            Importar JSON
                        </label>
                        <input id='input-file' name="input-file" type='file' onchange="verificaExtensao(this)" accept=".json" />
                        <span id='file-name'></span>
                        </div>
                        </div>
                            <div id="right">
                                <button
                                    style="display: none; float: right" 
                                    class="button-input-file" 
                                    id="buttonSendFile"
                                    name="buttonSendFile"
                                    type="button"
                                >Processar Fila
                                </button>
                                
                            </div>
                        </div>
                    </form>
                    <br><br>
                    <table id="fila_processada" class="display" width="100%"></table>
                    <br>
                   
                    <hr>


                <div class="links black">
                   <h3><b>Teste para Vaga PHP - Paulo A. Vital</b></h3>
                </div>
            </div>
        </div>
    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
     <script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>   
    <script src="{{ asset('assets/js/input_file.js')}}"></script>
    
</html>