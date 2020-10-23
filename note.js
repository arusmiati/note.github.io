let colors = ['red', 'yellow', 'gray', 'pink', 'purple', 'aliceblue', 'brown', 'blue'];

let button = document.getElementById('btn-save');

button.addEventListener('click', function() {
    var randomColor = colors[Math.floor(Math.random() * colors.length)]

    let container = document.getElementById('note');

    container.style.background = randomColor;
})