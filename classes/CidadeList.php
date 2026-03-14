<?php
require_once 'classes/Cidade.php';

class CidadeList
{
    private $html;
    public function __construct()
    {
        $this->html = file_get_contents('html/cidade/list.html');
    }
    public function delete($param)
    {
        try {
            $id = (int) $param['id'];
            Cidade::delete($id);
        } catch (Exception $e) {
            print $e->getMessage();
        }
    }
    public function load()
    {
        try {
            $cidades = Cidade::all();
            $items = '';
            foreach ($cidades as $cidade) {
                $item = file_get_contents('html/cidade/item.html');
                $item = str_replace('{id}', $cidade['id'], $item);
                $item = str_replace('{nome}', $cidade['nome'], $item);
                $item = str_replace('{nome_estado}', $cidade['nome_estado'], $item);
                $items .= $item;
            }
            $this->html = str_replace('{items}', $items, $this->html);
        } catch (Exception $e) {
            print $e->getMessage();
        }
    }
    public function show()
    {
        $this->load();
        print $this->html;
    }
}
