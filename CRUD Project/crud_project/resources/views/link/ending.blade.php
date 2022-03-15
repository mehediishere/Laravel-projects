{{-- Datepicker JS --}}
<script src='https://cdn.jsdelivr.net/npm/vanillajs-datepicker@1.1.4/dist/js/datepicker-full.min.js'></script>

{{-- Bootstrap JS --}}
<script type="text/javascript" src="{{ asset('js/bootstrap.js') }}"></script>

<script type="text/javascript">
const elems = document.querySelectorAll('.datepicker_input');
for (const elem of elems) {
  const datepicker = new Datepicker(elem, {
    autohide: true
  });
}     
</script>