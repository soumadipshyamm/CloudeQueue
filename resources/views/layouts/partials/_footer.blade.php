<script>
    var APP_URL = {!!json_encode(url('/')) !!};
    var TOAST_POSITION = 'top-right';
</script>
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>
<script src="{{ asset('assets/js/common.js') }}"></script>
<script src="{{ asset('assets/js/custom/submit.js') }}"></script>
<script src="{{ asset('assets/js/custom/flash.js') }}"></script>
<script src="{{ asset('assets/js/custom/auto-scroll.js') }}"></script>
<script src="https://kit.fontawesome.com/c7890550ed.js" crossorigin="anonymous"></script>
<script type="text/javascript" src="{{ asset('assets/js/main.js') }}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script src="{{ asset('assets/js/custom.js') }}"></script>
<script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBrRtkwvBcSh3_uISG8CVAX2IqykHdQEP4&amp;libraries=places&amp;callback=initAutocomplete"
        async="" defer=""></script>
<script src="{{ asset('assets/js/custom/google_location.js') }}"></script>
<script src="{{ asset('assets/js/custom/geoPositionSimulator.js') }}"></script>
<script src="{{ asset('assets/js/custom/geoPosition.js') }}"></script>


<script src="{{ asset('assets/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables/responsive.bootstrap4.min.js') }}"></script>


@stack('scripts')
