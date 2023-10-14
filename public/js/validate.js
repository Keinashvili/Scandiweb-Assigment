const submitButton = document.querySelector('.addProductButton');
const input_sku = document.getElementById('sku'), input_name = document.getElementById('name'),
    input_price = document.getElementById('price'), input_size = document.getElementById('size'),
    input_height = document.getElementById('height'), input_weight = document.getElementById('weight'),
    input_type = document.getElementById('productType');

const sku_error = document.getElementById('sku-error'), name_error = document.getElementById('name-error'),
    price_error = document.getElementById('price-error'), type_error = document.getElementById('type-error');

let new_input_size, new_input_height, new_input_width, new_input_length, new_input_weight;
let new_size_error, new_height_error, new_width_error, new_length_error, new_weight_error;

function isEmpty() {
    if (input_size == null || input_height == null || input_weight == null) {
        new_input_size = document.getElementById('size');
        new_input_height = document.getElementById('height');
        new_input_width = document.getElementById('width');
        new_input_length = document.getElementById('length');
        new_input_weight = document.getElementById('weight');
    }

    if (input_sku.value === "") {
        input_sku.focus();
        return false;
    }
    if (input_sku.value === "") {
        input_sku.focus();
        return false;
    }
    if (input_type.value === "") {
        input_type.focus();
        return false;
    }
    if (input_price.value === "" || isNaN(input_price.value) || input_price.value < 0) {
        input_price.focus();
        return false;
    }
    if (new_input_size !== null) {
        if (new_input_size.value === "" || isNaN(new_input_size.value) || new_input_size.value < 0) {
            new_input_size.focus();
            return false;
        }
    }
    if (new_input_height !== null || new_input_width !== null || new_input_length !== null) {
        if (new_input_height.value === "" || isNaN(new_input_height.value) || new_input_height.value < 0) {
            new_input_height.focus();
            return false;
        }
        if (new_input_width.value === "" || isNaN(new_input_width.value) || new_input_width.value < 0) {
            new_input_width.focus();
            return false;
        }
        if (new_input_length.value === "" || isNaN(new_input_length.value) || new_input_length.value < 0) {
            new_input_length.focus();
            return false;
        }
    }
    if (new_input_weight !== null) {
        if (new_input_weight.value === "" || isNaN(new_input_weight.value) || new_input_weight.value < 0) {
            new_input_weight.focus();
            return false;
        }
    }

    return true;
}

function validateValue(input, error) {
    if (input.value === "") {
        input.focus();
        error.innerHTML = "Please, submit required data";
    }
}

function validatePrice() {
    if (input_price.value === "") {
        input_price.focus();
        price_error.innerHTML = "Please, submit required data"
    } else if (isNaN(input_price.value) || input_price.value < 0) {
        input_price.focus();
        price_error.innerHTML = "Please, provide the data of indicated type"
    }
}

function validateSizes(input, error) {
    if (input != null && error != null) {
        if (input.value === "") {
            input.focus();
            error.innerHTML = "Please, submit required data"
        } else if (isNaN(input.value) || input.value < 0) {
            input.focus();
            error.innerHTML = "Please, provide the data of indicated type"
        } else {
            error.innerHTML = "";
        }
    }
}

function validate() {
    sku_error.innerHTML = "";
    name_error.innerHTML = "";
    price_error.innerHTML = "";
    type_error.innerHTML = "";

    if (input_size == null || input_height == null || input_weight == null) {
        new_size_error = document.getElementById('size-error');
        new_input_size = document.getElementById('size');
        new_height_error = document.getElementById('height-error');
        new_width_error = document.getElementById('width-error');
        new_length_error = document.getElementById('length-error');
        new_input_height = document.getElementById('height');
        new_input_width = document.getElementById('width');
        new_input_length = document.getElementById('length');
        new_weight_error = document.getElementById('weight-error');
        new_input_weight = document.getElementById('weight');
    }

    validateValue(input_sku, sku_error);
    validateValue(input_name, name_error);
    validateValue(input_type, type_error);
    validatePrice();
    validateSizes(new_input_size, new_size_error);
    validateSizes(new_input_height, new_height_error);
    validateSizes(new_input_width, new_width_error);
    validateSizes(new_input_length, new_length_error);
    validateSizes(new_input_weight, new_weight_error);
}

submitButton.addEventListener('click', (e) => {
    if (!isEmpty()) {
        validate();
        e.preventDefault();
    }
    return false;
})
