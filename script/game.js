var game = document.getElementById('game');
var cards = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18]; // массив с числами для карточек
var resultsArray = [];
var counter = 0;
var Interval ;
var tries = 0;

// перемешивание чисел в массиве
function shuffle(array){
  array.sort(() => Math.random() - 0.5);
  return array;
}
shuffle(cards);
// создание карточек на странице сайта
for (var i = 0; i < cards.length; i++) {
  var card = document.createElement('div');
  card.dataset.item = cards[i];
  card.dataset.view = "card"; //добавляем класс
  card.innerHTML = cards[i];  //создаём число внитри дива
  game.appendChild(card);     //ставим див в конец


  //функция нажатия на карточку
  card.onclick = function () {
    if (this.className != 'flipped' && this.className != 'correct'){ //проверка на первый клик
        this.className = 'flipped';   //переворот карточки на сторону с числом
        var result = this.dataset.item;
        resultsArray.push(result);  //ввод в переменную числа для сравнения
        clearInterval(Interval);
        Interval = setInterval(startTimer, 10);
    }

    if (resultsArray.length > 1) { //проверка на поднятую карточку
      if (resultsArray[0] === resultsArray[1]) { //сравнение карточек
        check("correct");
        counter ++;
        win();
        resultsArray = [];
        tries++;
        trie();
      } else {
        check("reverse");
        resultsArray = [];
        tries++;
        trie();
      }
    }
  }
};

//функция проверки победы
var win = function () {
  if(counter === 18) {
    clearInterval(Interval);
    location.replace("gameans.php?id="+tries);
  }
}

var seconds = 00;
var tens = 00;
var appendTens = document.getElementById("tens");
var appendSeconds = document.getElementById("seconds");

//функция таймера
function startTimer () {
  tens++;

  if(tens < 9){
    appendTens.innerHTML = "0" + tens;
  }

  if (tens > 9){
    appendTens.innerHTML = tens;
  }

  if (tens > 99) {
    seconds++;
    appendSeconds.innerHTML = "0" + seconds;
    tens = 0;
    appendTens.innerHTML = "0" + 0;
  }

  if (seconds > 9){
    appendSeconds.innerHTML = seconds;
  }
}

// функция изменения класса с задержкой
var check = function(className) {
  var x = document.getElementsByClassName("flipped");

  setTimeout(function() {

    for(var i = (x.length - 1); i >= 0; i--) {
      x[i].className = className;
    }

  },700);
}

// счёт попыток
var trie = function() {
    span = document.getElementById('triesid');
    span.innerHTML = tries;
}