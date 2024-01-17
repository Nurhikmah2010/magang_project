<script>
$(document).ready(function () {
    $('.btndetail').click(function(e) {
        e.preventDefault();
        const username = $(this).data('username');
        const email = $(this).data('email');
        const password = $(this).data('password');

        console.log(username);

        $("#detailusername").text(username);
        $("#detailemail").text(email);
        $("#detailpassword").text(password);
    });
});
</script>
