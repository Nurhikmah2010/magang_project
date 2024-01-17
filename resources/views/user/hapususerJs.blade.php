<script>
$(document).ready(function () {
    $('.btnhapususer').click(function(e) {
        e.preventDefault();

        const id = $(this).data('id');

        Swal.fire({
            title: "Apakah kamu yakin mau menghapus User Ini?",
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
                    type: "GET",
                    url: "{{ route('hapususer') }}",
                    data: { id: id },
                    success: function (response) {
                        Swal.fire({
                            title: "User Berhasil Dihapus",
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
                                text: 'An error occurred while deleting the user.', // Sesuaikan pesan dengan operasi yang benar
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
