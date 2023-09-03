// Функция, проверяющая и валидирующая все поля

function checkFields() {
    let isValid = true;

    let xValueField = document.querySelector(".form-field:first-child");
    let yValueField = document.querySelector(".form-field:nth-child(2)");
    let rValueField = document.querySelector(".form-field:last-child");

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
            x: getXValuePressed().textContent,
            y: document.querySelector(".form-field:nth-child(2) input").value,
            r: getRValuePressed()
        },
        success: function () {
            window.location.href = "http://localhost:63342/FirstWebLab/results.php?_ijt=g9a5ql0uejfn4pg60b35jujj0u&_ij_reload=RELOAD_ON_SAVE";
        },
        error: function(){
            window.alert("На данный момент сервер не может обработать ваш запрос - попробуйте позже " +
                "(либо занесите в офис банку сгущенки - сразу починим)");
        }
    })
}


