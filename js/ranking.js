function criaArray(){
  let table = document.createElement('table');
  let thead = document.createElement('thead');
  let tbody = document.createElement('tbody');

  table.appendChild(thead);
  table.appendChild(tbody);

// Adding the entire table to the body tag
  document.getElementById('tabela-padrao').appendChild(table);
  var array = ["Username","Duração","Dimensões","Nº de bombas","Modo de Jogo"]
  var arrayValor = [["Bob","01:01","20x20","20","Clássico"],
                    ["Jitters","02:02","19x19","19","Clássico"],
                    ["Buck","04:04","18x18","18","Clássico"],
                    ["Broccolo","06:30","17x17","17","Rivotril"],
                    ["Audie","08:31","16x16","16","Rivotril"],
                    ["Marshal","09:29","15x15","15","Clássico"],
                    ["Raymond","10:10","14x14","14","Rivotril"],
                    ["Bam","12:10","13x13","13","Clássico"],
                    ["Chief","12:19","12x12","12","Rivotril"],
                    ["Rosie","23:10","11x11","11","Clássico"],]

  let row_1 = document.createElement('tr');
  for(var i = 0; i < array.length;i++){
    let heading_1 = document.createElement('th');
    heading_1.innerHTML = array[i];
    row_1.appendChild(heading_1);
    thead.appendChild(row_1);    
  }

  for(var j = 0;j < 10;j++){
    let row_2 = document.createElement('tr');
    for(var k = 0; k < 5;k++){
      let heading_2 = document.createElement('td');
      heading_2.innerHTML = arrayValor[j][k];
      row_2.appendChild(heading_2);
      tbody.appendChild(row_2);
    }
  }
}