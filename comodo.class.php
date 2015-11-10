<?php

# Sirius - Grupo de Pesquisa
# Autor: Gérley Adriano
# Nome do script: comodo.class.php
/* Descrição: Esta classe implementa os atributos e métodos que representarão o núcleo das ações feitas pela interface 
  em conjunto com o microcontrolador arduino
 */

include_once('icomodo.class.php');

class Comodo implements iComodo {

    public $nomeDoComodo;
    public $quantidade;

    public function setNome($nome) {
        $this->nomeDoComodo = $nome;
    }

    public function getQuantidade() {
        return $quantidade;
    }

    private function selecaoDeArquivoSerialLinux() {
        if (file_exists('/dev/ttyUSB0'))
            $arquivo = '/dev/ttyUSB0';
        else {
            if (file_exists('/dev/ttyACM0'))
                $arquivo = '/dev/ttyACM0';
            else
                $arquivo = '/dev/ttyS0';
        }
        return $arquivo;
    }

    public function abreComunicacaoSerial($estado) {
        $arquivo = $this->verficaSistemaOperacionalERetornaArquivo();
        exec("stty -F $arquivo raw speed 9600");
    }

    private function acaoLed($porta, $estado) {
        if ($porta) {
            if ($estado == 1)
                $this->ligarLed($porta);
            else
                $this->desligarLed($porta);
            $this->fechaConexaoSerial($porta);
        }
    }

    private function verficaSistemaOperacionalERetornaArquivo() {
        $sistemaOperacional = PHP_OS;
        $selecao = null;
        if ($sistemaOperacional == 'Linux') {
            $selecao = $this->selecaoDeArquivoSerialLinux();
            return $selecao;
        }
        if ($sistemaOperacional == 'WINNT') {
            $selecao = $this->selecaoDeArquivoSerialWindows();
            return $selecao;
        }
    }

    private function selecaoDeArquivoSerialWindows() { // Melhorar função
        return 'COM3';
    }

    public function ligarLed($porta) {
        fwrite($porta, 'LED1:1');
    }

    public function desligarLed($porta) {
        fwrite($porta, 'LED1:0');
    }

    public function controlarLuz($estado) {
        $arquivo = $this->verficaSistemaOperacionalERetornaArquivo();
        $this->abreComunicacaoSerial($estado);
        $porta = fopen($arquivo, 'w+');
        $this->acaoLed($porta, $estado);
    }

    public function controlarPortaDaGaragem($estado) {
        $arquivo = $this->verficaSistemaOperacionalERetornaArquivo();
        $this->abreComunicacaoSerial($estado);
        $porta = fopen($arquivo, 'w+');
        $this->acaoPortaGaragem($porta, $estado);
    }

    private function fechaConexaoSerial($porta) {
        fclose($porta);
    }

    private function acaoControleDeLuzEmSerie($porta, $estado) {
        if ($porta) {
            if ($estado == 1)
                $this->ligarEmSerie($porta);
            else
                $this->apagarEmSerie($porta);
            $this->fechaConexaoSerial($porta);
        }
    }

    private function ligarEmSerie($porta) {
        fwrite($porta, 1);
    }

    private function apagarEmSerie($porta) {
        fwrite($porta, 2);
    }

    public function controleLuzPorRelogio($estado) {
        $arquivo = $this->verficaSistemaOperacionalERetornaArquivo();
        $this->abreComunicacaoSerial($estado);
        $porta = fopen($arquivo, 'w+');
        $this->acaoControleDeLuzEmSerie($porta, $estado);


        /*
          if (($horarioAtual >= '18:00:00') && ($horarioAtual <= '23:59:59')) {

          } */
    }

    private function acaoPortaGaragem($porta, $estado) {
        if ($porta) {
            if ($estado == 2)
                $this->abrirGaragem($porta);
            else
                $this->fecharGaragem($porta);
            $this->fechaConexaoSerial($porta);
        }
    }

    private function abrirGaragem($porta) {
        fwrite($porta, 2);
    }

    private function fecharGaragem($porta) {
        fwrite($porta, 1);
    }

    public function debug($var) {
        echo '<pre>';
        print_r($var);
        echo '</pre>';
    }

    public function controlarPersiana() {
        
    }

}

?>
