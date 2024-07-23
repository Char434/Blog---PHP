<?php


/**
 * Summary of Mensagem
 * classe é um modelo para se criar um objeto 
 * atributos são o que a classe tem, se ela fosse uma pessoa, os atributos é o que uma pessoa tem
 */
class Mensagem
{
    private $texto;
    private $css;

    /**
     * Método responsável pela criação da mensagem
     * @param string $mensagem
     * @return Mensagem
     */
    public function sucesso(string $mensagem): Mensagem
    {
        $this->css = 'alert alert-success';
        $this->texto = $this->filtrar($mensagem);
        return $this;
    }
    public function erro(string $mensagem): Mensagem
    {
        $this->css = 'alert alert-danger';
        $this->texto = $this->filtrar($mensagem);
        return $this;
    }
    public function alerta(string $mensagem): Mensagem
    {
        $this->css = 'alert alert-warning';
        $this->texto = $this->filtrar($mensagem);
        return $this;
    }
    public function informa(string $mensagem): Mensagem
    {
        $this->css = 'alert alert-primary';
        $this->texto = $this->filtrar($mensagem);
        return $this;
    }

    /**
     * Método responsável pela renderização da mensagem
     * @return string
     */
    public function renderizar(): string
    {
        return "<div class='{$this->css}'>{$this->texto}</div>";
    }

    /**
     * Método respon´savel por filtrar as mensagens
     * @param string $mensagem
     * @return string
     */
    private function filtrar(string $mensagem): string
    {
        return filter_var($mensagem, FILTER_SANITIZE_SPECIAL_CHARS);
    }
}
