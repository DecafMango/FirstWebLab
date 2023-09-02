let rValueRadios = document.querySelectorAll("fieldset:last-child input");

function getRValuePressed() {
    for (let rValueRadio of rValueRadios) {
        if (rValueRadio.checked)
            return rValueRadio.value;
    }
    return null;
}