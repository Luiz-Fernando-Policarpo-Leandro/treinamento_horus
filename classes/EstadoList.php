<?php
require_once 'classes/Estado.php';

class EstadoList
{
    private $html;
    public function __construct()
    {
        $this->html = file_get_contents('html/estado/list.html');
    }
    public function delete($param)
    {
        try {
            $id = (int) $param['id'];
            Estado::delete($id);
        } catch (Exception $e) {
            print $e->getMessage();
        }
    }
    public function load()
    {
        try {
            $estados = Estado::all();
            $items = '';
            foreach ($estados as $estado) {
                $item = file_get_contents('html/estado/item.html');
                $item = str_replace('{id}', $estado['id'], $item);
                $item = str_replace('{nome}', $estado['nome'], $item);
                $item = str_replace('{sigla}', $estado['sigla'], $item);
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
