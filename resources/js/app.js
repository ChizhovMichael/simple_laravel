import OverlayScrollbars from 'overlayscrollbars';
import device from 'current-device';
import EXIF from 'exif-js';


/******************************
[Table of Contents]


******************************/

document.addEventListener("DOMContentLoaded", function () {

    if (device.desktop() === true) {
        OverlayScrollbars(document.querySelectorAll('body'), {
            className: "os-theme-light"
        });
    }

    popup('popup-company', 'formcompany');
    popup('popup-doctors', 'formdoctors');
    closePopup('close');
    searchArticle();

})


/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
} catch (e) { }


function popup(el, message) {

    document.addEventListener('click', function (event) {

        event = event || window.event;
        var target = event.target || event.srcElement;

        while (target != this) {
            if (target.classList.contains(el)) break;
            target = target.parentNode;
        }

        if (target == this) return;

        createMessage(message);

    }, true)
}

function closePopup(el) {
    document.addEventListener('click', function (event) {
        event = event || window.event;
        var target = event.target || event.srcElement;

        while (target != this) {
            if (target.classList.contains(el)) break;
            target = target.parentNode;
        }

        if (target == this) return;

        var parent = target.closest('.modal');

        Element.prototype.remove = function () {
            this.parentElement.removeChild(this);
        }
        NodeList.prototype.remove = HTMLCollection.prototype.remove = function () {
            for (var i = this.length - 1; i >= 0; i--) {
                if (this[i] && this[i].parentElement) {
                    this[i].parentElement.removeChild(this[i]);
                }
            }
        }
        parent.remove();

    }, true)
}

function createMessage(param) {

    var container = document.createElement("DIV");
    var window = document.createElement("DIV");
    var close = document.createElement("DIV");

    container.classList.add('modal');
    container.classList.add('d-block');
    window.className = "modal__wrapp col-12 col-md-6 shadow bg-dark rounded-lg hide";
    close.className = "close c-p";

    var myImage = new Image(30, 30);
    myImage.src = '/img/icon/cancel.svg';


    document.body.appendChild(container);
    container.appendChild(window);

    const xhr = new XMLHttpRequest();

    xhr.open('POST', '/' + param, true);

    xhr.setRequestHeader(
        'X-CSRF-TOKEN',
        document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    );
    xhr.onreadystatechange = function () {

        if (xhr.readyState == 4 && xhr.status == 200) {
            // console.log(xhr.responseText);
            window.innerHTML += xhr.responseText;
            window.appendChild(close);
            close.appendChild(myImage);

            handleFiles('photo', 1);
        }
    }
    xhr.send()
}


function handleFiles(el, size) {

    const parent = document.getElementById(el);
    if (!parent) {
        return;
    }
    const fileInput = parent.querySelector('input[type="file"]');
    const preview = parent.querySelector('img.preview');
    const inputPreview = parent.querySelector('input.preview');

    const reader = new FileReader();

    function handleEvent(event) {

        var exif = EXIF.readFromBinaryFile(this.result);

        var imageBase64 = 'data:image/png|jpeg;base64,' + base64ArrayBuffer(this.result);

        if (event.type === "load") {
            resetOrientation(imageBase64, exif.Orientation, size, function (resetBase64Image) {
                preview.src = resetBase64Image;
                inputPreview.value = resetBase64Image;
            })
        }
    }

    function addListeners(reader) {
        // reader.addEventListener('loadstart', handleEvent);
        reader.addEventListener('load', handleEvent);
        // reader.addEventListener('loadend', handleEvent);
        // reader.addEventListener('progress', handleEvent);
        // reader.addEventListener('error', handleEvent);
        // reader.addEventListener('abort', handleEvent);
    }

    function handleSelected(e) {
        const selectedFile = fileInput.files[0];
        if (selectedFile) {
            addListeners(reader);
            // reader.readAsDataURL(selectedFile);
            reader.readAsArrayBuffer(selectedFile);
        }
    }

    fileInput.addEventListener('change', handleSelected);
}


function base64ArrayBuffer(arrayBuffer) {
    var base64 = ''
    var encodings = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/'

    var bytes = new Uint8Array(arrayBuffer)
    var byteLength = bytes.byteLength
    var byteRemainder = byteLength % 3
    var mainLength = byteLength - byteRemainder

    var a, b, c, d
    var chunk

    // Main loop deals with bytes in chunks of 3
    for (var i = 0; i < mainLength; i = i + 3) {
        // Combine the three bytes into a single integer
        chunk = (bytes[i] << 16) | (bytes[i + 1] << 8) | bytes[i + 2]

        // Use bitmasks to extract 6-bit segments from the triplet
        a = (chunk & 16515072) >> 18 // 16515072 = (2^6 - 1) << 18
        b = (chunk & 258048) >> 12 // 258048   = (2^6 - 1) << 12
        c = (chunk & 4032) >> 6 // 4032     = (2^6 - 1) << 6
        d = chunk & 63               // 63       = 2^6 - 1

        // Convert the raw binary segments to the appropriate ASCII encoding
        base64 += encodings[a] + encodings[b] + encodings[c] + encodings[d]
    }

    // Deal with the remaining bytes and padding
    if (byteRemainder == 1) {
        chunk = bytes[mainLength]

        a = (chunk & 252) >> 2 // 252 = (2^6 - 1) << 2

        // Set the 4 least significant bits to zero
        b = (chunk & 3) << 4 // 3   = 2^2 - 1

        base64 += encodings[a] + encodings[b] + '=='
    } else if (byteRemainder == 2) {
        chunk = (bytes[mainLength] << 8) | bytes[mainLength + 1]

        a = (chunk & 64512) >> 10 // 64512 = (2^6 - 1) << 10
        b = (chunk & 1008) >> 4 // 1008  = (2^6 - 1) << 4

        // Set the 2 least significant bits to zero
        c = (chunk & 15) << 2 // 15    = 2^4 - 1

        base64 += encodings[a] + encodings[b] + encodings[c] + '='
    }

    return base64
}


function resetOrientation(srcBase64, srcOrientation, srcSiza, callback) {
    var img = new Image();

    img.onload = function () {
        var width = img.width,
            height = img.height,
            canvas = document.createElement('canvas'),
            ctx = canvas.getContext("2d");


        // resize 500px
        var scale = Math.min((500 / width), (500 / height));

        width = width * scale;
        height = height * scale;



        // set proper canvas dimensions before transform & export
        if (4 < srcOrientation && srcOrientation < 9) {
            canvas.width = height;
            canvas.height = width;
        } else {
            canvas.width = width;
            canvas.height = height;
        }


        if (canvas.width >= srcSiza * canvas.height) {
            canvas.height = canvas.height;
            canvas.width = srcSiza * canvas.height;
        } else {
            canvas.width = canvas.width;
            canvas.height = 1 / srcSiza * canvas.width;
        }



        // transform context before drawing image
        switch (srcOrientation) {
            case 2: ctx.transform(-1, 0, 0, 1, width, 0); break;
            case 3: ctx.transform(-1, 0, 0, -1, width, height); break;
            case 4: ctx.transform(1, 0, 0, -1, 0, height); break;
            case 5: ctx.transform(0, 1, 1, 0, 0, 0); break;
            case 6: ctx.transform(0, 1, -1, 0, height, 0); break;
            case 7: ctx.transform(0, -1, -1, 0, height, width); break;
            case 8: ctx.transform(0, -1, 1, 0, 0, width); break;
            default: break;
        }

        // draw image
        ctx.drawImage(img, 0, 0, width, height);

        // export base64
        callback(canvas.toDataURL("image/jpeg", 0.7));
    };

    img.src = srcBase64;
}

/**
 * Ajax функция поиска в header. Смотри SearchController
 * Если удастся из хардкода убрать свитч то будет очень здоров
 * @return {[type]} [description]
 */
function searchArticle() {

    const search = document.getElementById('search');
    if (!search) {
        return;
    }

    // Блокируем отправку input через enter
    search.addEventListener('keydown', function (event) {
        if (event.keyCode == 13) {
            event.preventDefault();
        }
    });


    function getContent() {

        const searchValue = search.value;

        const xhr = new XMLHttpRequest();


        xhr.open('GET', '/search/list?search=' + searchValue, true);

        xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
        xhr.onreadystatechange = function () {

            if (xhr.readyState == 4 && xhr.status == 200) {
                listContainer.innerHTML = xhr.responseText;
            }
        }
        xhr.send()
    }
    try {
        search.addEventListener('input', getContent);
    } catch (err) { }

}








