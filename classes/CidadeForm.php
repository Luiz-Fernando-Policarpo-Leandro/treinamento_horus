<?php
require_once 'classes/Estado.php';
require_once 'classes/Cidade.php';
class CidadeForm
{
    private $html;
    private array|string $data;
    public function __construct()
    {
        $this->html = file_get_contents('html/cidade/form.html');
        $this->data = [
            'id' => null,
            'nome' => null,
            'id_estado' => null
        ];

        $estados = '';
        foreach (Estado::all() as $estado) {
            $estados .= "<option value='{$estado['id']}'> {$estado['nome']}
            </option>\n";
        }
        $this->html = str_replace('{estados}', $estados, $this->html);
    }
    
    public function edit($param)
    {
        try {
            $id = (int) $param['id'];
            $cidade = Cidade::find($id);
            $this->data = $cidade;
        } catch (Exception $e) {
            print $e->getMessage();
        }
    }

    public function save($param)
    {
        try {
            Cidade::save($param);
            $this->data = $param;
            print "Cidade salva com sucesso";
            return 201;
        } catch (Exception $e) {
            print $e->getMessage();
        }
    }
    public function show()
    {
        $this->html = str_replace('{id}', $this->data['id'], $this->html);
        $this->html = str_replace('{nome}', $this->data['nome'], $this->html);
        $this->html = str_replace('{id_estado}', $this->data['id_estado'], $this->html);
        $this->html = str_replace(
            "option value='{$this->data['id_estado']}'",
            "option selected=1 value='{$this->data['id_estado']}'",
            $this->html
        );
        print $this->html;
    }
}
