<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use App\Models\ControleCategories;
use App\Models\ControleDocuments;

class ControllerImportDocuments extends Controller
{
    private $categories;
    private $documents;
    
    public function __construct()
    {
        $this->categories = new ControleCategories();
        $this->documents = new ControleDocuments();
    }
    
    public function index(Request $request)
    {
        try {
            $dataJson =  $request->all();
            if (!empty($dataJson['json']['documentos']))
            {
                $ret_process = $this->process_row_documents(
                    $dataJson['json']['documentos']
                );
            }
            $returnProcess = json_decode($ret_process->content(), true);

            if ($returnProcess['success']){
                return response()->json(
                    ['success'=> true,
                     'data' => $dataJson['json']['documentos'],
                     'message => "Sucesso ao realizar o cadastro"']
                );
            } else {
                return response()->json(
                    ['success'=> false,
                     'data' => [],
                     'message => "Erro ao realizar o cadastro"']
                );
            }
        } catch (Exception $e) {
            return response()->json(['error'=> $e->getMessage(), 400]);
        }
    }

    private function process_row_documents($json_documents) {        
        
        try {
            
            foreach ($json_documents as &$valor) {
                // Insert Table Categories
                /*
                * Verifica se a categoria ja está cadastrada
                * evitando duplicidade e mantendo integridade com a
                * tabela documents
                */ 
                $category = ($this->categories::where([
                    ['name', '=', "{$valor['categoria']}"],
                    ['activate', '=', '1']])
                ->get()
                ->toArray() != null);
               
                // Caso positivo recupera o [ ID ]
                if ($category){
                    $id_category = $this->categories::where([
                        ['name', '=', "{$valor['categoria']}"],
                        ['activate', '=', '1']])
                    ->get(['id'])
                    ->toArray()[0];

                    $id_categoria = $id_category['id'];
                } else {
                // Caso não existe cadastra e pega o novo [ ID ]
                    $categories = array(
                        'name' => $valor['categoria'],
                        'activate'  => 1
                    );
                    $retCategories = $this->categories->create($categories);
                    $id_categoria = $retCategories->toArray()['id'];
                }

                // Insert Table Documents
                $documents = array(
                    'id_categories' => $id_categoria,
                    'title'  => $valor['titulo'],
                    'contents'  => $valor['conteúdo'],
                    'activate'  => 1
                );
                /**
                 * Para não haver duplicidade verifica se o
                 *  titulo ja foi inserido na tabela
                 */
                $documentos = ($this->documents::where([
                    ['title', '=', "{$valor['titulo']}"],
                    ['activate', '=', '1']])
                ->get()
                ->toArray() != null);

                if (!$documentos) {
                    $retDocuments = $this->documents->create($documents);
                }
            }
            return response()->json([
                'success'=> true, 
                'message' => 'cadastrado com sucesso',
                200
            ]);
            
        } catch (\Illuminate\Database\QueryException $exception) {
            $errorInfo = $exception->errorInfo;
            return response()->json([
                'success'=> false, 
                'message' => $errorInfo,
                400
            ]);
        }
    }
}
