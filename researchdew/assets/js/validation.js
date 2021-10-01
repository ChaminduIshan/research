$(function () {

    $("#contact").validate({ // initialize the plugin
        rules: {
            name: {
                required: true,
                minlength: 5
            },
            email: {
                required: true,
                email: true
            },
            subject:{
                required: true
            }
        },
        messages:{
            name:{
                required:'<span>cdjncdcnjcnccnjnjjn</span>',
            }
        }
    });

});