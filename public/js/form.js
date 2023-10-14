const type = document.getElementById('productType');
const switcher = document.getElementById('type-switcher');
const b = document.createElement('b');

function createInputs()
{
    switch (type.options[type.selectedIndex].value) {
        case '1':
            removeElement(['height2', 'width2', 'length2', 'weight3']);
            createElement({
                "label_content": "Size (MB)",
                "label_id": "size",
                "b_text_content": "Please, provide disc space in MB",
                "div_id": "weight1",
                "input_name": "size",
                'p_text_content': '',
                "error_id": "size-error",
            });
            break;
        case '2':
            removeElement(['weight1', 'weight3']);
            createElement({
                "label_content": "Height (CM)",
                "label_id": "height",
                "b_text_content": "",
                "div_id": "height2",
                "input_name": "size[]",
                'p_text_content': '',
                "error_id": "height-error",
            });
            createElement({
                "label_content": "Width (CM)",
                "label_id": "width",
                "b_text_content": "",
                "div_id": "width2",
                "input_name": "size[]",
                'p_text_content': '',
                "error_id": "width-error",
            });
            createElement({
                "label_content": "Length (CM)",
                "label_id": "length",
                "b_text_content": "Please, provide furniture dimensions HxWxL format",
                "div_id": "length2",
                "input_name": "size[]",
                'p_text_content': '',
                "error_id": "length-error",
            });
            break;
        case '3':
            removeElement(['weight1', 'height2', 'width2', 'length2']);
            createElement({
                "label_content": "Weight (KG)",
                "label_id": "weight",
                "b_text_content": "Please, provide book weight in KG",
                "div_id": "weight3",
                "input_name": "size",
                'p_text_content': '',
                "error_id": "weight-error",
            });
            break;
        default:
            removeElement(['weight1', 'height2', 'width2', 'length2', 'weight3']);
            b.remove();
    }
}

function createElement(contentJson)
{
    const outerDiv = document.createElement('div');
    const label = document.createElement('label');
    const input = document.createElement('input');
    const p = document.createElement('p');
    outerDiv.classList = 'cus-input1';
    outerDiv.appendChild(label);
    outerDiv.id = contentJson.div_id;
    label.textContent = contentJson.label_content;
    label.htmlFor = 'size';
    outerDiv.appendChild(input);
    input.name = contentJson.input_name;
    input.type = 'text';
    input.id = contentJson.label_id;
    switcher.appendChild(outerDiv);
    p.id = contentJson.error_id;
    p.textContent = contentJson.p_text_content;
    outerDiv.appendChild(p);
    if (contentJson.b_text_content.length > 0) {
        b.classList = 'text';
        b.textContent = contentJson.b_text_content;
        switcher.appendChild(b);
    }
}

function removeElement(array)
{
    for (let i = 0; i < array.length; i++) {
        if (document.getElementById(array[i])) {
            const element = document.getElementById(array[i]);
            element.remove();
        }
    }
}
