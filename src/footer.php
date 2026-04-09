</body>
<script src="/NexaStock/assets/js/jquery.js"></script>
<script>
$(document).ready(function () {

    $('#signinForm').on('submit', function(e){
        e.preventDefault();

        var email = $('#login_email').val();
        var password = $('#login_password').val();
        
       
        $.ajax({
            url: '/NexaStock/handlers/login.php',
            type: 'POST',
            data: { login: true, email: email, password: password },
            dataType: 'json',

            success: function(response){
                if(response.status === 'error'){
                    Swal.fire({
                        icon: "error",
                        title: "Login Failed",
                        text: response.message
                    });

                } else if(response.status === 'success'){
                    Swal.fire({
                        icon: "success",
                        title: "Login Successful",
                        text: "Redirecting...",
                        timer: 1500,
                        showConfirmButton: false
                    }).then(() => {
                        window.location.href = response.redirect;
                    });
                }
            },

            error: function(xhr, status, error){
                console.error('AJAX Error:', error);

                Swal.fire({
                    icon: "error",
                    title: "Server Error",
                    text: "Something went wrong. Check console."
                });
            }
        });

    });

});

</script>
</body>
</html>
