$("#blog_form").submit(function(e){e.preventDefault();}).validate({
 
    rules: {
        title: {
            required: true,
        },
        description: {
            required: true,
        },
    },
    messages: {
        title: {
            required: "Please enter Title",
        },
        description: {
            required: "Please enter Description",
        }
    }
});