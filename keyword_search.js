const Searching = search.prototype;

function filter(){
  var value, name, item, i;

  value = document.getElementByid("search_word").value.toUpperCase(); //검색값을 모두 대문자로 변환, 대소문자 구분 없애기
  item = document.getElementByClassName("item");
  //item 안에 channel name 넣기
  //html code
  //<div class = "item">
  //
  //<span class = "name">Mandarin</span>
  //</div>

  for(i=0; i<item.length; i++){
    name = item[i].getElementByClassName("channel_name");
    if(name[0].innerHTML.toUpperCase().indexOf(value) > -1){
      item[i].style.display = "flex";
    } else{
      item[i].style.display = "none";
    }
  }
}

function Search(){
  this.search_word = document.querySelector('input[name = "keyword"]');
  this.search_btn = document.querySelector('.search_btn');
  this.form = document.querySelector('.search');
}

new Search();

function createCSV(){
  var array[];
  array.push({});
}

function search_youtube(){
  this.search_word = document.querySelector('input[name = "keyword"]');
  let keyword = this.search_word.value;
  location.href = 'https://www.youtube.com/results?search_query=' + keyword;
}

$(document).ready(function(){
  $("#search").keyup(function{
    var input_word = $(this).val();

    $("#search_result_table>tbody>tr").hide();
    var channel_name = $("#search_result_table>tbody>tr>td:nth-child(7n+3):contains(''"+input_word+"')");
    var channel_cate = $("#search_result_table>tbody>tr>td:nth-child(7n+5):contains(''"+input_word+"')");

    $(channel_name).parent.show();
    $(channel_cate).parent.show();
  })
});
