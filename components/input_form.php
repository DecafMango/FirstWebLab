<main>
    <img class="field-image" src="images/field_image.png" alt="field_image">
    <div class="input-from-container">
        <h1 class="form-title">
            Попадите в выделенную область
        </h1>
        <div class="form-fields">
            <fieldset class="form-field">
                <legend>
                    Изменение по X
                </legend>
                <button type="button">-5</button>
                <button type="button">-4</button>
                <button type="button">-3</button>
                <button type="button">-2</button>
                <button type="button">-1</button>
                <button type="button">0</button>
                <button type="button">1</button>
                <button type="button">2</button>
                <button type="button">3</button>
            </fieldset>
            <fieldset class="form-field">
                <legend>
                    Изменение по Y
                </legend>
                <input type="text" placeholder="Введите значение от -3 до 5">
            </fieldset>
            <fieldset class="form-field">
                <legend>
                    Изменение по R
                </legend>
                <div class="radio-button-container">
                    <input id="radio-1" type="radio" name="r" value="1">
                    <label for="radio-1">1</label>
                </div>
                <div class="radio-button-container">
                    <input id="radio-2" type="radio" name="r" value="2">
                    <label for="radio-2">2</label>
                </div>
                <div class="radio-button-container">
                    <input id="radio-3" type="radio" name="r" value="3">
                    <label for="radio-3">3</label>
                </div>
                <div class="radio-button-container">
                    <input id="radio-4" type="radio" name="r" value="4">
                    <label for="radio-4">4</label>
                </div>
                <div class="radio-button-container">
                    <input id="radio-5" type="radio" name="r" value="5">
                    <label for="radio-5">5</label>
                </div>
            </fieldset>
        </div>
        <div class="form-buttons">
            <button class="submit-button" type="submit">Отправить</button>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="scripts/x_value_script.js"></script>
    <script src="scripts/r_value_script.js"></script>
    <script src="scripts/submit_script.js"></script>
</main>