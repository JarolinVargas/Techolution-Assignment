const makeDropmenu = document.querySelector('#makes');
const modelsDropmenu = document.querySelector('#models');
const makeItems = makeDropmenu.querySelectorAll('li');
const modelsItems = modelsDropmenu.querySelectorAll('li');
const modelImage = document.querySelector('#model-image');
const modelText = document.querySelector('#model-text');
const modelLabelText = document.querySelector('#model-label-text');
const makeLabelText = document.querySelector('#make-label-text');


// add click event to 'make' dropmenu items and get models.
for( var i = 0; i < makeItems.length; i++ ) {
    makeItems[i].addEventListener('click', function(event) {
        modelsDropmenu.classList.remove('disabled');
        getModels(event.currentTarget);
    });
}


// get models based on selected make
function getModels(clickedMake) {
    var makeAttr = clickedMake.getAttribute('data-make');
    for( var i = 0; i < modelsItems.length; i++ ) {
        modelsItems[i].classList.add('hidden-item');
        if( modelsItems[i].getAttribute('data-make') === makeAttr ) {
            modelsItems[i].classList.remove('hidden-item');
        }
    }
    updateDropmenuLabel(clickedMake.textContent, makeLabelText); // update dropmenu label.
}

// get model content based on model selected
for( var i = 0; i < modelsItems.length; i++ ) {
    modelsItems[i].addEventListener('click', getModelContent);
}


// get model content
function getModelContent(event) {
    var text = event.currentTarget.getAttribute('data-text');
    var image = event.currentTarget.getAttribute('data-image');
    // replace text and image
    modelImage.setAttribute('src', 'img/' + image);
    modelText.textContent = text;
    // update dropmenu label
    updateDropmenuLabel(event.currentTarget.textContent, modelLabelText);
    // show content and hide intro
    var bodyClassList = document.body.classList;
    if( bodyClassList.contains('content-hidden') ) {
        bodyClassList.remove('content-hidden');
    }
}


// update dropmenu label.
function updateDropmenuLabel(text, element) {
    element.textContent = text;
}