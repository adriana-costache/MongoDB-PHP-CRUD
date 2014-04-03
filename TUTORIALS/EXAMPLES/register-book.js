(function () {
    /* JQuery Selectors */
    var body = $("body");
    var form_registerBook = $("#registerBookForm");
    var input_bookTitle = $('input[name="bookTitle"]');
    var input_bookAuthors = $('input[name="bookAuthors"]');
    var input_bookEdition = $('input[name="bookEdition"]');
    var input_bookPublishedOn = $('input[name="bookPublishedOn"]');
    var input_bookLanguage = $('input[name="bookLanguage"]');
    var input_bookPublisher = $('input[name="bookPublisher"]');
    var input_bookIsbn = $('input[name="bookIsbn"]');
    var input_bookDescription = $('textarea[name="bookDescription"]');
    var input_bookCover = $('input[name="bookCover"]');
    var div_serverResponse = $("#divServerResponse");
    var div_message = $("#divMessage");

    /* When the Submit Button is clicked - this action is taken care of */
    form_registerBook.submit(function (event) {
        /* stop form from submitting normally */
        event.preventDefault();

        /* get the values from the various form elements */
        var bookTitle = input_bookTitle.val();
        var bookAuthors = input_bookAuthors.tagsinput('items');
        var bookEdition = parseInt(input_bookEdition.val());
        var bookPublishedOn = parseInt(input_bookPublishedOn.val());
        var bookLanguage = input_bookLanguage.val();
        var bookPublisher = input_bookPublisher.val();
        var bookIsbn = input_bookIsbn.tagsinput('items');
        var bookDescription = input_bookDescription.val();
        var bookCover = input_bookCover.val();
        var url = form_registerBook.attr('action');

        var dataToSend = {
            bookTitle: bookTitle,
            bookAuthors: bookAuthors,
            bookEdition: bookEdition,
            bookPublishedOn: bookPublishedOn,
            bookLanguage: bookLanguage,
            bookPublisher: bookPublisher,
            bookIsbn: bookIsbn,
            bookDescription: bookDescription,
            bookCover: bookCover
        };

        /* Send the data using post */
        var posting = $.post(url, dataToSend);

        posting.done(function (data, textStatus, jqXHR) {

            div_message
                .html(data)
                .parent('div')
                .removeClass('hidden')
                .removeClass('alert-danger')
                .addClass('alert-success');

            var message = "<h3 class='bg-success text-muted'>You have Successfully saved Book with ID: " + jqXHR.getResponseHeader('X-ID')
                +"</h3><p>Total Books found by the same name: " + jqXHR.getResponseHeader('X-FOUND-BOOKS') + "</p>"

            div_serverResponse
                .html(message)
                .parent('div')
                .removeClass('hidden');
        });

        posting.fail(function (jqXHR) {
            div_serverResponse
                .html('')
                .parent('div')
                .addClass('hidden');

            var message = "<h1 class='bg-warning text-info'>Status: "+ jqXHR.statusText
                +"</h1><h2>Response: </h2><p>" + jqXHR.responseText + "</p>";

            div_message
                .html(message)
                .parent('div')
                .removeClass('hidden')
                .removeClass('alert-success')
                .addClass('alert-danger');
        });
    });
})();
