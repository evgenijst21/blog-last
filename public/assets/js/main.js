
let editor_text = CKEDITOR.replace('editor_text');
CKFinder.setupCKEditor(editor_text);

let editor_desc = CKEDITOR.replace('editor_desc');
CKFinder.setupCKEditor(editor_desc);

let editor_cat = CKEDITOR.replace('editor_cat');
CKFinder.setupCKEditor(editor_cat);

window.onload = function () {
  document.body.classList.add('loaded_hiding');
  window.setTimeout(function () {
    document.body.classList.add('loaded');
    document.body.classList.remove('loaded_hiding');
  }, 500);
}


const cards = document.querySelectorAll('.card');

function transition() {
  if (this.classList.contains('active')) {
    this.classList.remove('active')
  } else {
    this.classList.add('active');
  }
}



