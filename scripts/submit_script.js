// Функция, проверяющая и валидирующая все поля
let xValueField = document.querySelector(".form-field:first-child");
let yValueField = document.querySelector(".form-field:nth-child(2)");
let rValueField = document.querySelector(".form-field:last-child");
function checkFields() {
    let isValid = true;

    // Проверка значения x
    if (!xValuePressed()) {
        xValueField.classList.add("red-border");
        isValid = false;
    } else
        xValueField.classList.remove("red-border");

    // Проверка значения y
    let yInput = document.querySelector(".form-field:nth-child(2) input")
    let yValue = yInput.value;
    yValue = yValue.replace(",", ".");
    yValue = Number.parseFloat(yValue);

    if (!isNaN(yValue)) {
        if (!(yValue >= -3 && yValue <= 5)) {
            yValueField.classList.add("red-border");
            isValid = false;
        } else
            yValueField.classList.remove("red-border")
    } else {
        yValueField.classList.add("red-border")
        isValid = false;
    }

    // Проверка значения r
    let rCheckedRadio = document.querySelector('input[name="r"]:checked');
    if (rCheckedRadio == null) {
        rValueField.classList.add("red-border");
        isValid = false;
    } else
        rValueField.classList.remove("red-border");

    return isValid;
}

// Функция отправки формы на сервер
document.querySelector(".submit-button").onclick = function (e) {
    e.preventDefault();

    if (!checkFields())
        return;

    $.ajax({
        url: 'check_hit.php',
        type: 'POST',
        data: {
            x: getXValuePressed(),
            y: document.querySelector(".form-field:nth-child(2) input").value,
            r: getRValuePressed()
        },
        error: function(){
            console.log('ERROR');
        }
    })
}


