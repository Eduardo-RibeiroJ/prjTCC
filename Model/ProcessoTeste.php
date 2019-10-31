<?php
class ProcessoTeste {
    private $processo;
    private $testeOnline;

    function inserirProcessoTeste($processo, $testeOnline) {
        $this->processo = $processo;
        $this->testeOnline = $testeOnline;
    }

    function getProcesso() {
        return $this->processo;
    }

    function getTesteOnline() {
        return $this->testeOnline;
    }

    function setProcesso($processo) {
        $this->processo = $processo;
    }

    function setTesteOnline($testeOnline) {
        $this->testeOnline = $testeOnline;
    }
}
