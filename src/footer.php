</body>
<script src="/NexaStock/assets/js/jquery.js"></script>
<script>
$(document).ready(function () {
    function showLoginTransition(redirectUrl) {
        const isAdmin = redirectUrl.toLowerCase().includes('/admin/');
        const role = isAdmin ? 'Admin' : 'Staff';

        $('#transitionTitle').text(`Opening ${role} Dashboard`);
        $('#transitionMessage').text('Preparing your workspace...');
        $('#loginTransition').removeClass('hidden').addClass('show');

        setTimeout(function () {
            window.location.href = redirectUrl;
        }, 1400);
    }

    $('#signinForm').on('submit', function(e){
        e.preventDefault();

        var email = $('#login_email').val();
        var password = $('#login_password').val();
        var $submitButton = $(this).find('button[type="submit"]');
        
        $submitButton.prop('disabled', true).html('Signing In...');
       
        $.ajax({
            url: '/NexaStock/handlers/login.php',
            type: 'POST',
            data: { login: true, email: email, password: password },
            dataType: 'json',

            success: function(response){
                if(response.status === 'error'){
                    $submitButton.prop('disabled', false).html('Sign In â†’');
                    Swal.fire({
                        icon: "error",
                        title: "Login Failed",
                        text: response.message
                    });

                } else if(response.status === 'success'){
                    showLoginTransition(response.redirect);
                }
            },

            error: function(xhr, status, error){
                console.error('AJAX Error:', error);
                $submitButton.prop('disabled', false).html('Sign In â†’');

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
