<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Imports\ProdutosImport;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    //



     public function index(){

       //  $this->import();

        return 'All imported';
     }






    public function import()
    {
        try {

            $data =  Excel::import(new ProdutosImport, public_path('\\excel\\lista_medicamentos.xlsx'));

        } catch (FileNotFoundException $e) {

            $file = 'error.log';
            $handle = fopen($file, 'w') or die('Arquivo não encontrado: -> ' . $file);
            $data =   $e;
            fwrite($handle, $data);
            fclose($handle);
        }
    }



}
