<script type="text/javascript">
    function confirmdel($id){
        swal('id');
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
                        url:'/admin_role_delete/',

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









        {{--swal({--}}

        {{--title: "Are you sure",--}}

        {{--text: "You will not be able to recover this!",--}}

        {{--type: "warning",--}}

        {{--showCancelButton: true,--}}

        {{--confirmButtonClass: "btn-danger",--}}

        {{--confirmButtonText: "Yes delete it!",--}}

        {{--cancelButtonText: "No cancel please!",--}}

        {{--closeOnConfirm: false,--}}

        {{--closeOnCancel: false--}}

        {{--},--}}
        {{--function(isConfirm) {--}}
        {{--swal("ok");--}}

        {{--if (isConfirm) {--}}

        {{--var token = '{{ csrf_token()}}';--}}

        {{--route = '/admin/users/'+$id;--}}

        {{--$.ajax({--}}

        {{--url:route,--}}

        {{--type: 'post',--}}

        {{--data: {_method: 'delete', _token :token},--}}

        {{--success:function(msg){--}}


        {{--result = $.parseJSON(msg);--}}

        {{--if(typeof result == 'object')--}}

        {{--{--}}

        {{--status_message = '{{('deleted')}}';--}}

        {{--status_symbox = 'success';--}}

        {{--status_prefix_message = '';--}}

        {{--if(!result.status) {--}}

        {{--status_message = '{{('sorry')}}';--}}

        {{--status_prefix_message = '{{("cannot_delete_this_record_as")}}\n';--}}

        {{--status_symbox = 'info';--}}

        {{--}--}}

        {{--swal(status_message+"!", status_prefix_message+result.message, status_symbox);--}}

        {{--}--}}

        {{--else {--}}

        {{--swal("('deleted')}}!", "('your_record_has_been_deleted')", "success");--}}

        {{--}--}}

        {{--tableObj.ajax.reload();--}}

        {{--}--}}

        {{--});--}}



        {{--} else {--}}

        {{--swal("{{getPhrase('cancelled')}}", "", "error");--}}

        {{--}--}}

        {{--});--}}

    }

</script>