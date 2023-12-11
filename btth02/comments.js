$(document).ready(function () {
    $('#commentForm').on('submit', function (event) {
        event.preventDefault();
        //chuan hoa du lieu
        var formData = $(this).serialize();
        $.ajax({
            url: "comments.php", //action
            method: "POST", //method
            data: formData, //data form
            dataType: "JSON",   //type data nhan ve
            success: function (response) {
                if (!response.error) {
                    $('#commentForm')[0].reset();
                    $('#commentId').val('0');
                    $('#message').html(response.message);
                    showComments();
                } else if (response.error) {
                    $('#message').html(response.message);
                }
            }
        })
        function showComments() {
            $.ajax({
                url: "show_comments.php",
                method: "POST",
                success: function (response) {
                    $('#showComments').html(response);
                }
            })
        }
        console.log(showComments());

    });


});

