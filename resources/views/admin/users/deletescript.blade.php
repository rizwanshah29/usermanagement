<script type="text/javascript">
    function confirmdel($id){
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this imaginary file!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {

                if (willDelete) {

                    $.ajax({
                        url:'/admin_delete/',

                        type: 'GET',

                        data: {id:$id},

                        success:function(flash_message){
                            result = $.parseJSON(flash_message);
                            if (typeof result == 'object')
                            {
                                swal("Poof! Your imaginary file has been deleted!", {
                                    icon: "success",
                                });
                            }
                            location.reload();
                        },error:function(error){
                            console.log(error)
                            alert(error)
                        }

                    });
                }

                else {
                    swal("Your imaginary file is safe!");
                }
            });

    }

</script>