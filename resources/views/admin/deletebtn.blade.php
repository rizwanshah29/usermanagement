$(document).on('click', '.btndel', function (e) {
            e.preventDefault();
            var id = $(this).data('id');
            swal({
                    title: "Are you sure!",
                    type: "error",
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes!",
                    showCancelButton: true,
                },
                function() {
                    $.ajax({
                        type: "POST",
                        url: "{{url('/admin/users/st')}}",
                        data: {id:id},
                        success: function (data) {
                            //
                        }
                    });
                });
        });