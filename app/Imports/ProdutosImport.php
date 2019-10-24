<?php

namespace App\Imports;

use App\Models\Produtos\Produto;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Maatwebsite\Excel\Concerns\ToModel;

class ProdutosImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        if ( $row[0] == 'GGREM') {
            return null;
        }

         $data= [
            'ggrem'             =>  $row[0],
            'avatar'            =>  $row[0] . '.jpg',
            'principio_ativo'   =>  $row[1],
            'nome'              =>  $row[2],
            'laboratorio'       =>  $row[3],
            'apresentacao'      =>  $row[4],
            'valor_unitario'    =>  $row[5],
            'estoque_inicial'   =>  $row[6],
          ];

            $this->writeToFile($data);

      //  return new Produto($data);
    }



     public function writeToFile($data){
        try {
            $file = 'excel-data.json';
            $handle = fopen($file, 'a') or die('Arquivo não encontrado: -> ' . $file);
            fwrite($handle, json_encode($data));
            fclose($handle);
        } catch (FileNotFoundException $e) {
            print($e);
        }
     }


}



