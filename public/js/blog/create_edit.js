$(document).ready(function(){
    $('.datepicker_start_date').datepicker({
        format: 'dd/mm/yyyy',
        startDate: '-3d'
    });
});

$("#blog_form").submit(function(e){}).validate({
 
    rules: {
        title: {
            required: true,
        },
        description: {
            required: true,
        },
        image: {
            required: true,
        },
    },
    messages: {
        title: {
            required: "Please enter Title",
        },
        description: {
            required: "Please enter Description",
        },
        image: {
            required: "Please enter Image",
        }
    }
    
});