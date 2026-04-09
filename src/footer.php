</body>
<script src="/NexaStock/assets/js/jquery.js"></script>
<script>
$(document).ready(function () {
    
    $('#signinForm').on('submit', function(e){
        e.preventDefault(); // prevent normal form submission

        var email = $('#login_email').val().trim();
        var password = $('#login_password').val().trim();

        if(!email || !password){
            alert('All fields required');
            return;
        }

        $.ajax({
            url: '/NexaStock/handlers/login.php',
            type: 'POST',
            data: { login: true, email: email, password: password },
            dataType: 'json',
            success: function(response){
                if(response.error){
                    alert(response.error);
                } else if(response.redirect){
                    window.location.href = response.redirect;
                }
            },
            error: function(xhr, status, error){
                console.error('AJAX Error:', error);
                alert('An unexpected error occurred. Check console.');
            }
        });
    });
});

</script>

</body>
</html>
