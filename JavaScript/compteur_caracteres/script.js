var counter = document.getElementById('counter-block');
var textarea = document.getElementById('tweet-content');

console.log(counter);
console.log(textarea);

function count(){
    var result = 140-textarea.value.length
    counter.textContent = result;
    if(result<0){
        counter.classList.add('negatif');
    }
    else{
        counter.classList.remove('negatif');
    }
}
textarea.addEventListener('keydown', count);
