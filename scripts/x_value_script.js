let xValueButtons = document.querySelectorAll("fieldset:first-child button");

// Обработчик нажатия кнопки задания значения X
for (let xValueButton of xValueButtons) {
    xValueButton.onclick = function () {
        if (xValuePressed()) {
            getXValuePressed().classList.remove("button-pressed");
            xValueButton.classList.add("button-pressed");
        } else
            xValueButton.classList.add("button-pressed");
    }
}

// Функция, проверяющая, выбрано ли значение x
function xValuePressed() {
    for (let xValueButton of xValueButtons) {
        if (xValueButton.classList.contains("button-pressed"))
           return true;
    }
    return false;
}

function getXValuePressed() {
    for (let xValueButton of xValueButtons) {
        if (xValueButton.classList.contains("button-pressed"))
            return xValueButton;
    }
    return null;
}