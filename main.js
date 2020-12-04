const people = [
  {name: 'haha ha'},
  {name: '애타'},
  {name: 'Emily mit Ypsilon'},
  {name: '수탉'},
  {name: 'Fury'},
  {name: 'JIGONG지공'},
  {name: '방앗간 비둘기'},
  {name: 'EO'},
  {name: '땅팜'},
  {name: 'OchiDO'},
  {name: 'not Otzdarva'},
  {name: 'Ohmywreker'},
  {name: 'DAZBEE official'}
];

const list = document.getElementById('list');

function setList(group){
  clearList();
  for (const person of group) {
    const item = document.createElement('li');
    item.classList.add('list-group-item');
    const text = document.createTextNode(person.name);
    item.appendChild(text);
    list.appendChild(item);
  }
  if(group.length === 0){
    setNoResult();
  }
}

function clearList(){
  while(list.firstChild){
    list.removeChild(list.firstChild);
  }
}

function setNoResult() {
  const item = document.createElement('li');
  item.classList.add('list-group-item');
  const text = document.createTextNode('No results found');
  item.appendChild(text);
  list.appendChild(item);
}

function computeRelevancy(name, searchTerm) {
let value = name.trim().toLowerCase();
  if (value === searchTerm) {
    return 2;
  } else if (value.startsWith(searchTerm)){
    return 1;
  } else if (value.includes(searchTerm)){
    return 0;
  } else {
    return -1;
  }
}

var mysql = require('mysql');

var connection = mysql.createConnection({
	host:'127.0.0.1',
  user:'root',
  password:'madsulie06',
  database: 'youtube_info'
});
connection.connect();

var sql= 'SELECT * FROM channels';
const name_list = [];
connection.query(sql, (err, rows, fields) => {
  if (err) {
    console.log(err);
  } else {
    for (var i=0; i<rows.length; i++) {
      name_list.push(rows[i].name);
    }
  }
});
connection.end();

const searchInput = document.getElementById('keyword');
searchInput.addEventListener('input', (event) => {
  let value = event.target.value;
  if (value && value.trim().length > 0) {
    value = value.trim().toLowerCase();
    setList(people.filter(person => {
      return person.name.toLowerCase().includes(value);
    }).sort((person1, person2) => {
      return computeRelevancy(person2.name, value) - computeRelevancy(person1.name, value);
    }));
  } else {
    clearList();
  }
})
