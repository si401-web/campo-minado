var params = new URLSearchParams(window.location.search);
var lines = parseInt(params.get("linhas"));
var columns = parseInt(params.get("colunas"));
var bombs = parseInt(params.get("bombas"));
var limitedTime = params.get("modalidade") == "rivotril";
var aux = 0;

var board = []

var win = false;
var exploded = false;
var timeout = false;

var spentTime = 0;
var limitTime = 0;

function createGame() {
	adjustNumbers();
	createBoard();
	addBombs();
	timer();
}

function adjustNumbers() {
	if (isNaN(lines))
		lines = 10;

	if (lines < 1)
		lines = 1;

	if (lines > 50)
		lines = 50;

	if (isNaN(columns))
		columns = 10;

	if (columns < 1)
		columns = 1;

	if (columns > 50)
		columns = 50;

	if (isNaN(bombs))
		bombs = Math.floor(Math.sqrt(size));

	var size = lines * columns;
	if (bombs >= size) bombs = size - 1;

	if (limitedTime)
		limitTime = Math.floor(bombs / size * 1000) + 1;
}
//Cria o Tabuleiro
function createBoard() {
	var table = "<table>";

	for(var l = 0; l < lines; l++) {
		var row = []
		table += "<tr>"
		for(var c = 0; c < columns; c++) {
			row.push(0);
			table += "<td id='cell-" + l + "-" + c + "' onclick='openBlock(" + l + ", " + c + ", true)'></td>"
		}
		table += "</tr>"
		board.push(row);
	}

	table += "</table>";

	var element = document.getElementById("tabuleiro");
	element.innerHTML = table;
}
//Seleciona locais aleatorios para as bombas
function addBombs() {
	while (bombs > 0) {
		var l = Math.floor(Math.random() * lines);
		var c = Math.floor(Math.random() * columns);

		if (l < lines && c < columns && board[l][c] != "B") {
			board[l][c] = "B";

			plusOne(l-1,c-1);
			plusOne(l-1,c);
			plusOne(l-1,c+1);
			plusOne(l,c+1);
			plusOne(l+1,c+1);
			plusOne(l+1,c);
			plusOne(l+1,c-1);
			plusOne(l,c-1);
			bombs--;
		}
	}
}
//Função que adiciona as bombas
function plusOne(l, c) {
	if (l >= 0 && l < lines && c >= 0 && c < columns && board[l][c] != "B") {
		board[l][c]++;
	}
}

function timer() {
	if (limitedTime) {
		document.getElementById("decorrido").classList.add("decorrido");
		document.getElementById("restante").classList.add("restante");
		document.getElementById("modalidade").innerHTML = "Modalidade Rivotril";
	}

	adjustTimers();
}

function adjustTimers() {
	var qtd = document.getElementById("qtd");
	adjustTimer("decorrido", spentTime);

	if (limitTime > 0) {
		adjustTimer("restante", limitTime - spentTime);

		if (spentTime == limitTime) {
			toggleBombs("&#x1f4a3;", true);
			timeout = true;
			qtd.innerHTML = "Quantidade de Celulas: " + aux;
			alert("Você perdeu...");
			return;
		}
	}

	setTimeout(() => {
		if (!finished()) {
			spentTime++;
			adjustTimers();
		}
	}, 1000)
}

function adjustTimer(id, number) {
	var seconds = number % 60;
	if (seconds < 10) {
		seconds = "0" + seconds;
	}

	var minutes = (number - seconds) / 60;
	if (minutes < 10) {
		minutes = "0" + minutes;
	}

	var element = document.getElementById(id);
	element.innerHTML = "&nbsp;&nbsp;&nbsp;" + minutes + ":" + seconds + "&nbsp;&nbsp;&nbsp;";
	element.style.width = number * 100 / limitTime + "%";
}

function openBlock(line, column, userClicked) {
	if (finished())
		return;

	var id = "cell-" + line + "-" + column;
	var block = document.getElementById(id);
	var qtd = document.getElementById("qtd");

	if (!block){
		return;
	}


	var value = board[line][column];

	if (value == 9){
		return;
	}

	block.classList.add("vazio")
	board[line][column] = 9;

	if (value == "B") {
		block.innerHTML = "&#x1f4a3;";
		block.classList.add("explodiu")

		toggleBombs("&#x1f4a3;");
		exploded = true;
		qtd.innerHTML = "Quantidade de Celulas: " + aux;
		alert("Você perdeu...");

	} else if (value == 0) {
		openBlock(line-1, column-1);
		openBlock(line-1, column  );
		openBlock(line-1, column+1);
		openBlock(line  , column+1);
		openBlock(line+1, column+1);
		openBlock(line+1, column  );
		openBlock(line+1, column-1);
		openBlock(line  , column-1);
	} else {
		block.innerHTML = value;
		block.classList.add("casa" + value)
	}

	if (userClicked) {
		win = checkWin();
		if (win) {
			toggleBombs("&#9873;");
			qtd.innerHTML = "Quantidade de Celulas: " + aux;
			alert("Você ganhou!");
		}
	}
	aux++;
}

function toggleBombs(icon, explode) {
	for(var l = 0; l < lines; l++) {
		for(var c = 0; c < columns; c++) {
			if (board[l][c] == "B") {
				var bombId = "cell-" + l + "-" + c;
				var bombBlock = document.getElementById(bombId);
				bombBlock.innerHTML = icon;

				if (explode) {
					bombBlock.classList.add("explodiu");
				}
			}
		}
	}

	if (icon == "X") {
		setTimeout(() => {
			toggleBombs(win ? "&#9873;" : "")
		}, 5000);
	}
}

function checkWin() {
	if (finished()) return false;

	for(var l = 0; l < lines; l++) {
		for(var c = 0; c < columns; c++) {
			if (board[l][c] != "B" && board[l][c] != 9) {
				return false;
			}
		}
	}

	return true;
}

function finished() {
	return win || exploded || timeout;
}
