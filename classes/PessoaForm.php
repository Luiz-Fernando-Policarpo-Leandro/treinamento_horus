<?php
require_once 'classes/Pessoa.php';
require_once 'classes/Estado.php';
require_once 'classes/Cidade.php';
class PessoaForm
{
    private $html;
    private array|string $data;
    public function __construct()
{
    $this->html = file_get_contents('html/pessoa/form.html');

    $this->data = [
        'id' => null,
        'nome' => null,
        'endereco' => null,
        'bairro' => null,
        'telefone' => null,
        'email' => null,
        'id_cidade' => null,
        'id_estado' => null
    ];

    $estados = '';

    foreach (Estado::all() as $estado) {

        $selected = $estado['id'] == $this->data['id_estado'] ? 'selected' : '';

        $estados .= "<option value='{$estado['id']}' $selected>
                        {$estado['nome']}
                     </option>";
    }

    $this->html = str_replace('{estados}', $estados, $this->html);
}

    
    public function edit($param)
    {
        try {
            $id = (int) $param['id'];
            $pessoa = Pessoa::find($id);
            $this->data = $pessoa;
        } catch (Exception $e) {
            print $e->getMessage();
        }
    }
    public function save($param)
    {
        try {
            Pessoa::save($param);
            $this->data = $param;
            print "Pessoa salva com sucesso";
            return 201;
        } catch (Exception $e) {
            print $e->getMessage();
        }
    }
    public function show()
    {
        $this->html = str_replace("option value='{$this->data['id_estado']}'",
        "option selected=1 value='{$this->data['id_estado']}'", $this->html);
        
        $cidades = '';
        if (!empty($this->data['id_estado'])) {

            foreach (Cidade::all_cidades($this->data['id_estado']) as $cidade) {

                $selected = $cidade['id'] == $this->data['id_cidade'] ? 'selected' : '';

                $cidades .= "<option value='{$cidade['id']}' $selected>
                                {$cidade['nome']}
                            </option>";
            }
        }
        $this->html = str_replace('{cidades}', $cidades, $this->html);

        $this->html = str_replace('{id}', $this->data['id'], $this->html);
        $this->html = str_replace('{nome}', $this->data['nome'], $this->html);
        $this->html = str_replace('{endereco}', $this->data['endereco'], $this->html);
        $this->html = str_replace('{bairro}', $this->data['bairro'], $this->html);
        $this->html = str_replace('{telefone}', $this->data['telefone'], $this->html);
        $this->html = str_replace('{email}', $this->data['email'], $this->html);

        print $this->html;
    }

}
