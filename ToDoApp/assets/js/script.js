(function($) {

    /**
     * INSERT FORM
     */
    var form = $('#add-form'),
        list = $('#item-list'),
        input = form.find('#text');

    // cursor in the textarea
    input.val('').focus();

    // stop php form request and do new js request
    form.submit(function(event) {
        event.preventDefault();

        var req = $.ajax({
            url: form.attr('action'),
            type: 'POST',
            data: form.serialize()
        });

        // make <li></li> list
        req.done(function (data) { 
            
            // send with php function die() in add-item.php    
            if ( data === 'success' ) { 

                // show home page and return complete html code
                $.ajax({ url: siteURL }).done(function(html) {
                    var newItem = $(html).find('li:last-child');

                    newItem.appendTo( list )
                        .css({ backgroundColor: '#fdd674'})
                        .delay(200)
                        .animate({ backgroundColor: 'transparent' });

                    // after enter clean textarea
                    input.val('').focus();
                });

            }
        });
    });

    // press enter for submitted
    input.keypress(function(event) {
        if ( event.which === 13 ) {
            form.submit();
            return false;
        }

    });

    /**
     * EDIT FORM
     */
    // selected cursor in Edit-textarea
    $('#edit-form').find('#text').select();

    // remove white spaces in textarea
    $('#edit-form').find('textarea').each(function(){
        $(this).val($(this).val().trim());
    });


    /**
     * DELETE FORM
     */
    // Doesn't working on mobile only in Browsers 
    // $('#delete-form').submit( function(event) {
    //     return confirm('for sure?'); 
    // });

    // remove white spaces in textarea
    $('#delete-form').find('textarea').each(function(){
        $(this).val($(this).val().trim());
    });


}(jQuery));