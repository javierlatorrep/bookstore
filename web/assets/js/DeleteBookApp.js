'use strict';

(function(window, $, swal) {
    window.DeleteBookApp = function ($wrapper) {
        this.$wrapper = $wrapper;

        this.$wrapper.on(
            'click',
            '.js-delete-book',
            this.handleBookDelete.bind(this)
        );
    };

    $.extend(window.DeleteBookApp.prototype, {
        handleBookDelete: function (e) {
            e.preventDefault();

            var $link = $(e.currentTarget);

            var self = this;
            swal({
                title: 'Delete book',
                text: 'Are you sure you want to delete this book?',
                showCancelButton: true,
                showLoaderOnConfirm: true,
                preConfirm: function() {
                    return self._deleteBook($link);
                }
            }).catch(function(arg) {
                console.log('Canceled: ', arg);
            });
        },

         _deleteBook: function($link) {
            $link.addClass('text-danger');
            $link.find('.glyphicon-trash')
                .removeClass('glyphicon-trash')
                .addClass('fa-spinner')
                .addClass('fa-spin');

            var deleteUrl = $link.data('url');
            var $row = $link.closest('tr');
            var self = this;
            return $.ajax({
                url: deleteUrl,
                method: 'DELETE'
            }).then(function() {
                $row.fadeOut('normal', function () {
                    $(this).remove();
                });
            })
        }
    });
})(window, jQuery, swal);
