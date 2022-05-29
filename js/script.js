$('document').ready(() => {

    updateTextAreaCharacterCount($('#registration-form textarea.form-element-field'));

    $('#registration-form').submit((e) => {
        e.preventDefault();

        const submitBtn = $('#registration-form [type="submit"]');
        const serializedData = $('#registration-form').serialize();
        const passwordInput = $('#registration-form [name="password"]');

        const passwordValid = validatePasswordInput(passwordInput);


        removeErrorFromFormElement(submitBtn.parent());

        if (!passwordValid) {
            return;
        }

        $('#registration-form *').prop('disabled', true);
        submitBtn.addClass('loading');

        $.ajax({
            url: "/api/submitForm.php",
            type: "POST",
            data: serializedData,
            success: function (response) {
                console.log(response);

                response = JSON.parse(response);

                $('#registration-form *').prop('disabled', false);
                submitBtn.removeClass('loading');

                if (!response['success']) {

                    if (response['errorFields']) {
                        const errorFields = response['errorFields'];

                        errorFields.forEach((field) => {
                            const parentField = $(`#registration-form [name="${field.name}"]`).parent();
                            const messages = field['messages'];

                            messages.forEach((message) => {
                                addErrorToFormElement(parentField, message);
                            });
                        });
                        return;
                    }

                    if (response['message']) {
                        addErrorToFormElement(submitBtn, response['message']);
                        return;
                    }

                    return;
                }

                $('#registration-form').parent().append('<p class="success">Daten erfolgreich gespeichert!</p>');
                $('#registration-form').remove();

            }
        });

    });





    $('#registration-form textarea').on('keyup', (e) => {
        updateTextAreaCharacterCount($(e.target));
    });


    function updateTextAreaCharacterCount(textarea) {
        const characterCount = textarea.val().length;

        $(textarea).parent().find('.form-element-hint').find('.character-count').text(characterCount);
    }

    function validatePasswordInput(passwordInput) {
        const password = passwordInput.val();
        const parentElement = passwordInput.parent();

        var hasError = false;
        var errorMessages = [];

        removeErrorFromFormElement(parentElement);

        // at least 8 characters
        regex = /.{8,}/;
        if (!regex.test(password)) {
            errorMessages.push('Das Passwort muss mindestens 8 Zeichen lang sein.');
            hasError = true;
        }

        // at least one number
        var regex = /(?=.*\d)/;
        if (!regex.test(password)) {
            errorMessages.push('Das Passwort muss mindestens eine Zahl enthalten.');
            hasError = true;
        }

        // at least one lowercase letter
        regex = /(?=.*[a-z])/;
        if (!regex.test(password)) {
            errorMessages.push('Das Passwort muss mindestens einen Kleinbuchstaben enthalten.');
            hasError = true;
        }

        // at least one uppercase letter
        regex = /(?=.*[A-Z])/;
        if (!regex.test(password)) {
            errorMessages.push('Das Passwort muss mindestens einen Großbuchstaben enthalten.');
            hasError = true;
        }

        // at least one special character
        regex = /(?=.*[!@#$§%^&*()_+\-=\[\]{};':"\\|,.<>\/?])/;
        if (!regex.test(password)) {
            errorMessages.push('Das Passwort muss mindestens ein Sonderzeichen enthalten.');
            hasError = true;
        }


        if (errorMessages) {
            errorMessages.forEach((message) => {
                addErrorToFormElement(parentElement, message);
            });
        }

        return !hasError;
    }


    function addErrorToFormElement(formElement, errorMsg) {
        formElement.hasClass('error') ? '' : formElement.addClass('error');
        formElement.append(`<small class="form-element-error">${errorMsg}</small>`);
    }


    function removeErrorFromFormElement(formElement) {
        formElement.hasClass ? formElement.removeClass('error') : '';
        formElement.find('.form-element-error').remove();
    }

});