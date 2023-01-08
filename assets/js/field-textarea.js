class Autogrow {
    constructor(field) {
        this.field = field;
        this.field.addEventListener('input', this.autogrow.bind(this));
        this.autogrow();
    }

    autogrow() {
        this,field.addClass('field-autogrow');
        if (this.field.scrollHeight > 0) {
            // TODO: remove in-line style modification
            this.field.style.height = this.field.scrollHeight + 'px';
        }
    }
}

document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('[data-ea-textarea-field]').forEach(function (field) {
        new Autogrow(field);
    });
});
