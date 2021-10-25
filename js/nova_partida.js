function criarPartida() {
    var form = document.forms["partida"];

    var colunas = form["colunas"].value;
    var linhas = form["linhas"].value;
    var bombas = form["bombas"].value;
    var modalidade = form["modalidade"].value;

    if (colunas * linhas <= bombas) {
        alert('Não é possível ter ' + bombas + ' bombas em um tabuleiro de ' + colunas + 'x' + linhas + '.');
        return false;
    }

    return colunas != "" && linhas != "" && bombas != "" && modalidade != "";
}