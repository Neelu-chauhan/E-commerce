

@if (Session::has('success'))
    <script>
        Swal.fire({

            icon: "success",
            text: "{{ Session::get('success') }}",
            showConfirmButton: true,
            timer: 1000,
            customClass: 'swal-wide'
        });
    </script>
@endif
@if (Session::has('error'))
    <script>
        Swal.fire({

            icon: "error",
            text: "{{ Session::get('error') }}",
            showConfirmButton: true,
            timer: 1500,
            customClass: 'swal-wide'
        });
    </script>
@endif
</div>
</div>


{{-- swal for  delete the data from the list  --}}
<script>
    $(document).ready(function() {
        $('[data-confirm]').on('click', function(e) {
            e.preventDefault();
            var href = $(this).attr('href');
            var message = $(this).data('confirm');
            swal({
                    title: "Are you sure ??",
                    text: message,
                    icon: "warning",
                    buttons: true,
                    // dangerMode: true,
                    customClass: "Custom_Cancel"
                })
                .then((willDelete) => {
                    if (willDelete) {
                        swal("Data has been deleted!", {
                            icon: "success",
                            timer: 3000,
                        });
                        window.location.href = href;
                    }
                });
        });
    });
</script>
{{-- end of swal alert here --}}

<script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>

<!-- endinject -->
<!-- Plugin js for this page -->
<script src="{{ asset('assets/vendors/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('assets/vendors/progressbar.js/progressbar.min.js') }}"></script>
<script src="{{ asset('assets/vendors/jvectormap/jquery-jvectormap.min.js') }}"></script>
<script src="{{ asset('assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<script src="{{ asset('assets/vendors/owl-carousel-2/owl.carousel.min.js') }}"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="{{ asset('assets/js/off-canvas.js') }}"></script>
<script src="{{ asset('assets/js/hoverable-collapse.js') }}"></script>
<script src="{{ asset('assets/js/misc.js') }}"></script>
<script src="{{ asset('assets/js/settings.js') }}"></script>
<script src="{{ asset('assets/js/todolist.js') }}"></script>

{{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>  <!--- SWAL ALERT   --> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
    integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- endinject -->
<!-- Custom js for this page -->
<script src="{{ asset('assets/js/dashboard.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
<!-- End custom js for this page -->
</body>

</html>
