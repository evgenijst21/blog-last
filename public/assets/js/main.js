
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


let fields = document.querySelectorAll('.field__file');
Array.prototype.forEach.call(fields, function (input) {
  let label = input.nextElementSibling,
    labelVal = label.querySelector('.field__file-fake').innerText;

  input.addEventListener('change', function (e) {
    let countFiles = '';
    if (this.files && this.files.length >= 1)
      countFiles = this.files.length;

    if (countFiles)
      label.querySelector('.field__file-fake').innerText = 'Выбрано файлов: ' + countFiles;
    else
      label.querySelector('.field__file-fake').innerText = labelVal;
  });
});
