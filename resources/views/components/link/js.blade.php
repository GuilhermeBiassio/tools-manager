<script src="/assets/js/html5-qrcode.min.js"></script>
<script>
    $(document).ready(function() {
        var qrBtn = document.querySelector('#qrBtn');

        $('.select').select2({
            theme: 'bootstrap4',
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' :
                'style',
            placeholder: $(this).data('placeholder'),
            allowClear: Boolean($(this).data('allow-clear')),
            closeOnSelect: !$(this).attr('multiple'),
        });

        qrBtn.addEventListener('click', (event) => {
            document.querySelector('#qr-scan').className = 'd-block';
            qrScan()
        });

        function qrScan() {
            var tools = document.querySelector('#tools');

            function onScanSucces(decodeText, decodeResult) {
                for (var i = 0; i < tools.options.length; i++) {
                    if (tools.options[i].value == decodeText) {
                        tools.value = decodeText;
                    }
                }
            }

            var htmlscanner = new Html5QrcodeScanner(
                "qr-reader", {
                    fps: 1,
                    qrbox: 250
                }
            );

            htmlscanner.render(onScanSucces);
        }
    });
</script>
