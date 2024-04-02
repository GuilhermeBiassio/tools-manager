<x-main>
    <x-form title="Cadastro de empréstimo" btnTitle="Enviar" action="{{ $action }}">
        @if (isset($links))
            @method('PUT')
        @endif

        <button id="qrBtn" type="button" class="mt-3 mb-3 btn btn-primary">Escanear QR Code</button>

        <div id="qr-scan" class="d-none">
            <h3>QR scan</h3>
            <div class="d-flex justify-content-center">
                <div id="qr-reader" style="width:100%;"></div>
            </div>
        </div>

        <x-select class="select" name="tool" label="Ferramenta">
            @if (isset($tools))
                @foreach ($tools as $tool)
                    <option value="{{ $tool['id'] }}" @if (isset($dados) && $dados->tool == $tool['id']) selected @endif
                        @if ($errors->any() && old('tool') == $tool['id']) selected @endif>
                        {{ $tool['name'] }}
                    </option>
                @endforeach
            @endif
        </x-select>

        <x-select class="select" name="employee" label="Funcionário">
            @if (isset($employees))
                @foreach ($employees as $employee)
                    <option value="{{ $employee['id'] }}" @if (isset($dados) && $dados->employee == $employee['id']) selected @endif
                        @if ($errors->any() && old('employee') == $employee['id']) selected @endif>
                        {{ $employee['id'] . ' - ' . $employee['name'] }}
                    </option>
                @endforeach
            @endif
        </x-select>
    </x-form>

    <x-slot name="js">
        <script src="/assets/js/html5-qrcode.min.js"></script>
        <script>
            $(document).ready(function() {
                var qrBtn = document.querySelector('#qrBtn');
                var cont = 0;

                function selectRender() {
                    $('.select').select2({
                        theme: 'bootstrap4',
                        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ?
                            '100%' : 'style',
                        placeholder: $(this).data('placeholder'),
                        allowClear: Boolean($(this).data('allow-clear')),
                        closeOnSelect: !$(this).attr('multiple'),
                    });
                }

                selectRender();

                qrBtn.addEventListener('click', (event) => {
                    document.querySelector('#qr-scan').className = 'd-block';
                    qrScan()
                });

                function qrScan() {
                    var tools = document.querySelector('#tool');
                    console.log(tools);

                    function onScanSucces(decodeText, decodeResult) {
                        for (var i = 0; i < tools.options.length; i++) {
                            if (tools.options[i].value == decodeText) {
                                tools.options[i].selected = 'selected';
                                ++cont;
                            }
                        }
                        if (cont > 0) {
                            selectRender();
                            cont = 0;
                        } else {
                            alert('Ferramenta não encontrada!');
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
    </x-slot>
</x-main>
