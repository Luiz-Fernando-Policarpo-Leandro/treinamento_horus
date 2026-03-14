<?php

class EstadoForm
{
    private $html;
    private array|string $data;
    public function __construct()
    {
        $this->html = file_get_contents('html/estado/form.html');
        $this->data = [
            'id' => null,
            'nome' => null,
            'sigla' => null
        ];
    }
    
    public function edit($param)
    {
        try {
            $id = (int) $param['id'];
            $estado = Estado::find($id);
            $this->data = $estado;
        } catch (Exception $e) {
            print $e->getMessage();
        }
    }

    public function save($param)
    {
        try {
            Estado::save($param);
            $this->data = $param;
            print "Estado salva com sucesso";
            return 201;
        } catch (Exception $e) {
            print $e->getMessage();
        }
    }
    public function show()
    {
        $this->html = str_replace('{id}', $this->data['id'], $this->html);
        $this->html = str_replace('{nome}', $this->data['nome'], $this->html);
        $this->html = str_replace('{sigla}', $this->data['sigla'], $this->html);
        print $this->html;
    }
}
