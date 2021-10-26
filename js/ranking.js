function criaArray(){
  let table = document.createElement('table');
  let thead = document.createElement('thead');
  let tbody = document.createElement('tbody');

  table.appendChild(thead);
  table.appendChild(tbody);

// Adding the entire table to the body tag
  document.getElementById('ranking').appendChild(table);
  var array = ["Username","Duração","Dimensões","Nº de bombas","Modo de Jogo"]
  var arrayValor = ["Bob","01:01","20x20","20","Clássico"]

  let row_1 = document.createElement('tr');
  for(var i = 0; i < array.length;i++){
    let heading_1 = document.createElement('th');
    heading_1.innerHTML = array[i];
    row_1.appendChild(heading_1);
    thead.appendChild(row_1);    
  }

 

  for(var j = 0;j < 10;j++){
    let row_2 = document.createElement('tr');
    for(var k = 0; k < arrayValor.length;k++){
      let heading_2 = document.createElement('td');
      heading_2.innerHTML = arrayValor[k];
      row_2.appendChild(heading_2);
      tbody.appendChild(row_2);
    }
  }
}