<script>
 $(document).ready(function () {
    $("#tambahuser").click(function (e) {
        e.preventDefault(); // Prevent the form from submitting

        const nama = $("#username").val();
        const email = $("#email").val();
        const alamat = $("#alamat").val();
        const password = $("#password").val();
        const role = $("#role").val();
        const csrfToken = $('meta[name="csrf-token"]').attr('content');

        const formData = new FormData();
        formData.append('nama', nama);
        formData.append('password', password);
        formData.append('alamat', alamat);
        formData.append('email', email);
        formData.append('role', role);
        formData.append('_token', csrfToken);

        Swal.fire({
                    title: "Apakah kamu mau menambah User?",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#0d6efd',
                    cancelButtonColor: '#6e7881',
                    confirmButtonText: 'Yes',
                    cancelButtonText: 'No',
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'POST',
                            url: '{{ route('tambahuser' ) }}',
                            data: formData,
                            processData: false,
                            contentType: false,
                            success: function (response) {
                                    Swal.fire({
                                        title: "Success",
                                        text: "User Berhasil Ditambahkan",
                                        icon: "success",
                                        showConfirmButton: false,
                                        timer: 3000
                                    }).then((result) => {
                                        location.reload();
                                    });
                                },
                                error: function (xhr) {
                                if (xhr.status === 400) {
                                    Swal.fire({
                                        title: xhr.responseJSON.error,
                                        icon: 'error',
                                    });
                                } else {
                                    Swal.fire({
                                        title: 'Error!',
                                        text: 'An error occurred while adding the device.',
                                        icon: 'error',
                                    });
                                }
                            }
                    });
                }
                    // No need to handle the "No" case here, as the modal won't be closed
             });
    });
});
</script>
