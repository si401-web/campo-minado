var board = [
	[  0 ,  0 ,  0 ,  0 ,  0 ,  0 ,  0 ,  0 ,  0  ],
	[  0 ,  0 ,  0 ,  0 ,  0 ,  0 ,  0 ,  0 ,  0  ],
	[  1 ,  2 ,  2 ,  1 ,  0 ,  0 ,  0 ,  0 ,  0  ],
	[  2 , "B", "B",  1 ,  0 ,  0 ,  0 ,  0 ,  0  ],
	[ "B",  5 ,  3 ,  2 ,  0 ,  0 ,  0 ,  0 ,  0  ],
	[ "B",  3 , "B",  1 ,  0 ,  1 ,  2 ,  2 ,  1  ],
	[  1 ,  3 ,  2 ,  2 ,  0 ,  1 , "B", "B",  2  ],
	[  0 ,  1 , "B",  1 ,  0 ,  1 ,  4 , "B",  3  ],
	[  0 ,  1 ,  1 ,  1 ,  0 ,  0 ,  2 , "B",  2  ],
]

var exploded = false;
var win = false;
var timeout = false;

function finished() {
	return win || exploded || timeout;
}

function openBlock(line, column) {
	if (finished())
		return;

	var id = "cell-" + line + "-" + column;
	var block = document.getElementById(id);

	if (!block)
		return;

	var value = board[line][column];

	if (value == 9)
		return;

	block.classList.add("vazio")
	board[line][column] = 9;

	console.log(line, column, value);
	if (value == "B") {
		block.innerHTML = "&#x1f4a3;";
		block.classList.add("explodiu")

		toggleBombs("&#x1f4a3;");
		exploded = true;
		alert("Você perdeu...");

	} else if (value == 0) {
		openBlock(line-1, column-1);
		openBlock(line-1, column);
		openBlock(line-1, column+1);
		openBlock(line, column+1);
		openBlock(line+1, column+1);
		openBlock(line+1, column);
		openBlock(line+1, column-1);
		openBlock(line, column-1);
	} else {
		block.innerHTML = value;
		block.classList.add("casa" + value)
	}

	win = checkWin();

	if (win) {
		toggleBombs("&#9873;");
		alert("Você ganhou!");
	}
}

function toggleBombs(icon, explode) {
	for(var l = 0; l < board.length; l++) {
		for(var c = 0; c < board[l].length; c++) {
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
	for(var l = 0; l < board.length; l++) {
		for(var c = 0; c < board[l].length; c++) {
			if (board[l][c] != "B" && board[l][c] != 9) {
				return false;
			}
		}
	}

	return true;
}

var spentTime = 0;
var limitTime = 0;

function timer() {
	var params = new URLSearchParams(window.location.search);
	if (params.get("modalidade") == "rivotril") {
		document.getElementById("decorrido").classList.add("decorrido");
		document.getElementById("restante").classList.add("restante");
		document.getElementById("modalidade").innerHTML = "Modalidade Rivotril";

		limitTime = 180;
	}

	adjustTimers();
}

function adjustTimers() {
	adjustTimer("decorrido", spentTime);

	if (limitTime > 0) {
		adjustTimer("restante", limitTime - spentTime);

		if (spentTime == limitTime) {
			toggleBombs("&#x1f4a3;", true);
			timeout = true;
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
