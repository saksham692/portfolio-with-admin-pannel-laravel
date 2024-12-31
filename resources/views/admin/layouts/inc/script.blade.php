<!-- General JS Scripts -->
<script src="{{ asset('assets/modules/jquery.min.js') }}"></script>
<script src="{{ asset('assets/modules/popper.js') }}"></script>
<script src="{{ asset('assets/modules/tooltip.js') }}"></script>
<script src="{{ asset('assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
<script src="{{ asset('assets/modules/moment.min.js') }}"></script>
<script src="{{ asset('assets/js/stisla.js') }}"></script>

<!-- JS Libraies -->
<script src="{{asset('assets/modules/jqvmap/dist/jquery.vmap.min.js')}}"></script>
<script src="{{asset('assets/modules/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script>
<script src="{{asset('assets/modules/summernote/summernote-bs4.js')}}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
{{--<script src="{{ asset('assets/js/plugins/summernote-bs4.js') }}"></script>--}}
<script src="{{asset('assets/js/plugins/jquery.selectric.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/jquery.uploadPreview.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/bootstrap-tagsinput.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/bootstrap-timepicker.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/daterangepicker.js')}}"></script>
<script src="{{asset('assets/js/plugins/select2.full.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap-iconpicker.bundle.min.js')}}"></script>

<!-- Template JS File -->
<script src="{{asset('assets/js/scripts.js')}}"></script>
<script src="{{asset('assets/js/custom.js')}}"></script>

<!-- Page Specific JS File -->
<script src="{{asset('assets/js/page/features-post-create.js')}}"></script>
<!-- Page Specific JS File -->
{{--<script src="{{asset('assets')}}/js/page/forms-advanced-forms.js"></script>--}}

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@stack('scripts')


<!-- Show dynamic validation errors -->
<script>
    @if (!empty($errors->all()))
        @foreach ($errors->all() as $error)
            toastr.error("{{$error}}",)
        @endforeach
    @endif

</script>

<script>
    $(document).ready(function(){
        // Csrf token
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // sweet alert for delete
        $('body').on('click', '.delete-item', function(e){
            e.preventDefault();
            let deleteUrl = $(this).attr('href');

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'DELETE',
                        url: deleteUrl,
                        success: function(data){
                            if(data.status == 'error'){
                                Swal.fire(
                                'You can not delete!',
                                'This category contain items cant be deleted!',
                                'error'
                            )
                            }else {
                                Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                                )
                                window.location.reload();
                            }
                        },
                        error: function(xhr, status, error){
                            console.log(error);
                        }
                    })
                }
            })
        })
    })
</script>
