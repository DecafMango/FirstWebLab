let xValueButtons = document.querySelectorAll("fieldset:first-child button");

// Обработчик нажатия кнопки задания значения X
for (let xValueButton of xValueButtons) {
    xValueButton.onclick = function () {
        if (xValuePressed()) {
            if (xValueButton.classList.contains("button-pressed"))
                xValueButton.classList.remove("button-pressed");
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
            return xValueButton.textContent;
    }
    return null;
}