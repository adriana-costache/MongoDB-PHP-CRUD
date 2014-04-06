(function () {
    /* JQuery Selectors */
    var body = $("body");
    var form_searchBookForm = $("#searchBookForm");
    var input_bookTitle = $('input[name="bookTitle"]');
    var input_bookAuthors = $('input[name="bookAuthors"]');
    var input_bookEdition = $('input[name="bookEdition"]');
    var input_bookPublishedOn = $('input[name="bookPublishedOn"]');
    var input_bookLanguage = $('input[name="bookLanguage"]');
    var input_bookPublisher = $('input[name="bookPublisher"]');
    var input_bookIsbn = $('input[name="bookIsbn"]');
    var div_serverResponse = $("#divServerResponse");
    var div_message = $("#divMessage");
    var table_searchResult = $("#tableSearchResult");
    var table_searchResult_body = table_searchResult.find("tbody");

    var deleteUrl = "processDeleteBook.php";
    var updateUrl = "processUpdateBook.php";


    /* When the Submit Button is clicked - this action is taken care of */
    form_searchBookForm.submit(function (event) {
        /* stop form from submitting normally */
        event.preventDefault();

        var bookTitle = $.trim(input_bookTitle.val());
        var bookAuthors = $.trim(input_bookAuthors.tagsinput('items'));
        var bookEdition = parseInt($.trim(input_bookEdition.val()));
        var bookPublishedOn = parseInt($.trim(input_bookPublishedOn.val()));
        var bookLanguage = $.trim(input_bookLanguage.val());
        var bookPublisher = $.trim(input_bookPublisher.val());
        var bookIsbn = $.trim(input_bookIsbn.tagsinput('items'));
        var url = $.trim(form_searchBookForm.attr('action'));

        if (isNaN(bookEdition)) {
            bookEdition = null;
        }
        if (isNaN(bookPublishedOn)) {
            bookPublishedOn = null;
        }

        /* get the values from the various form elements - if they have some value,
         and set them to the data to be sent*/
        var dataToSend = {};
        if (bookTitle != '') {
            dataToSend['bookTitle'] = bookTitle;
        }
        if (bookAuthors != '') {
            dataToSend['bookAuthors'] = bookAuthors;
        }
        if (bookEdition != null) {
            dataToSend['bookEdition'] = bookEdition;
        }
        if (bookPublishedOn != null) {
            dataToSend['bookPublishedOn'] = bookPublishedOn;
        }
        if (bookLanguage != '') {
            dataToSend['bookLanguage'] = bookLanguage;
        }
        if (bookPublisher != '') {
            dataToSend['bookPublisher'] = bookPublisher;
        }
        if (bookIsbn != '') {
            dataToSend['bookIsbn'] = bookIsbn;
        }

        /* Send the data using post */
        var posting = $.post(url, dataToSend);

        /**
         * This function gets called
         * @param data
         * @param message
         */
        var showSuccessMessage = function (data, message) {
            div_message
                .html(data)
                .parent('div')
                .removeClass('hidden')
                .removeClass('alert-danger')
                .addClass('alert-success');

            div_serverResponse
                .html(message)
                .parent('div')
                .removeClass('hidden');
        };

        var failCallback = function (jqXHR) {
            div_serverResponse
                .html('')
                .parent('div')
                .addClass('hidden');

            var message = "<h1 class='bg-warning text-info'>Status: " + jqXHR.statusText
                + "</h1><h2>Response: </h2><p>" + jqXHR.responseText + "</p>";

            div_message
                .html(message)
                .parent('div')
                .removeClass('hidden')
                .removeClass('alert-success')
                .addClass('alert-danger');
        };

        /* Handle Success Response from the Server */
        posting.done(function (data, textStatus, jqXHR) {
            // Server returns the Json, so decode/parse it into a JavaScript object
            var books = JSON.parse(data);

            // Clear all the data from the table
            table_searchResult_body.html('');

            // Since the json returned by the server is an array, loop through it
            for (var bookNumber in books) {
                var book = books[bookNumber];
                // Fill in the table
                table_searchResult_body.append(
                    '' +
                        '<tr>' +
                        '<td class="bookNumber">' + bookNumber + '</td>' +
                        '<td>' + book.bookTitle + '</td>' +
                        '<td>' + book.bookAuthors + '</td>' +
                        '<td>' + book.bookEdition + '</td>' +
                        '<td>' + book.bookPublishedOn + '</td>' +
                        '<td>' + book.bookLanguage + '</td>' +
                        '<td>' + book.bookPublisher + '</td>' +
                        '<td>' + book.bookIsbn + '</td>' +
                        '<td>' + book.bookDescription + '</td>' +
                        '<td>' + book.bookCover + '</td>' +
                        '<td><button class="btn btn-warning updateBookInfo">Update</button></td>' +
                        '<td><button class="btn btn-danger deleteBookInfo">Delete</button></td>' +
                        '</tr>'
                );
            }

            var deleteRequest = function (bookNumber) {
                var book = books[bookNumber];
                var dataToDelete = {
                    '_id': book._id.$id
                };

                var posting = $.post(deleteUrl, dataToDelete);

                /* Handle Success Response from the Server */
                posting.done(function (data, textStatus, jqXHR) {
                    var message = "<h3 class= 'bg-success text-muted'> Delete Successful: </h3>";
                    showSuccessMessage(data, message);
                });

                /* Handle Failure Response from the Server */
                posting.fail(function (jqXHR) {
                    failCallback(jqXHR);
                });
            };

            var updateRequest = function (bookNumber) {
                var book = books[bookNumber];
                var $headerCells = table_searchResult.find("thead th:gt(0):lt(-2)"),
                    $rows = table_searchResult_body.find("tr");
                var headers, rows;

                headers = $headerCells.map(function (k, v) {
                    return $.trim($(this).text())
                }).get();

                rows = $rows.map(function (row, v) {
                    if (row == bookNumber) {
                        return ($(this)
                            .find("td:gt(0):lt(-2)")
                            .map(function (cell, v) {
                                return $.trim($(this).text());
                            }).get());
                    }
                }).get();

                var dataToUpdate = {};
                dataToUpdate['_id'] = book._id.$id;
                for (var count = 0; count < headers.length; count++) {
                    var headerName = headers[count];
                    if ((headerName == 'Authors') || (headerName == 'Isbn')) {
                        dataToUpdate[headerName] = rows[count].split(',');
                    } else {
                        dataToUpdate[headerName] = rows[count];
                    }
                }

                var posting = $.post(updateUrl, dataToUpdate);

                /* Handle Success Response from the Server */
                posting.done(function (data, textStatus, jqXHR) {
                    var message = "<h3 class= 'bg-success text-muted'> Details Updated Successful: </h3>";
                    showSuccessMessage(data, message);
                });

                /* Handle Failure Response from the Server */
                posting.fail(function (jqXHR) {
                    failCallback(jqXHR);
                });
            };

            // Make the table editable
            table_searchResult.editableTableWidget();
            $(table_searchResult_body).find('.updateBookInfo').click(function(){
                var bookNumber = $(this).parent('td').parent('tr').find('.bookNumber').html();
                updateRequest(bookNumber);
            });
            $(table_searchResult_body).find('.deleteBookInfo').click(function(){
                var bookNumber = $(this).parent('td').parent('tr').find('.bookNumber').html();
                deleteRequest(bookNumber);
            });

            // Show server responses
            var message = "<h3 class= 'bg-success text-muted'> Search Successful:"
                + "</h3><p> Found Total Number of Books: "
                + jqXHR.getResponseHeader('X-FOUND-BOOKS')
                + "</p >";
            showSuccessMessage(data, message);
        });

        /* Handle Failure Response from the Server */
        posting.fail(function (jqXHR) {
            failCallback(jqXHR);
        });
    });
})();
