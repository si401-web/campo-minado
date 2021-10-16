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

function openBlock(line, column) {
	if (exploded || win)
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
		alert('Você perdeu...');

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
		alert('Você ganhou!');
	}
}

function toggleBombs(icon) {
	for(var l = 0; l < board.length; l++) {
		for(var c = 0; c < board[l].length; c++) {
			if (board[l][c] == "B") {
				var bombId = "cell-" + l + "-" + c;
				var bombBlock = document.getElementById(bombId);
				bombBlock.innerHTML = icon;
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
