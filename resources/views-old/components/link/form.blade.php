<div class="container">
    <form method="POST" class="mb-3" action="{{ $action }}">
        @csrf

        @if (isset($links))
            @method('PUT')
        @endif

        <button id="qrBtn" type="button" class="mt-3 mb-3 btn btn-primary">Escanear QR Code</button>

        <div id="qr-scan" class="d-none">
            <h1>QR scan</h1>
            <div class="d-flex justify-content-center">
                <div id="qr-reader" style="width:500px;"></div>
            </div>
        </div>


        <div class="mb-3 input-group-lg">
            <label for="tools" class="form-label">Ferramenta</label>
            <select class="select form-select" id="tools" name="tool" aria-label="Default select example">
                <option selected disabled value="">Selecione</option>
                @if (isset($tools))
                    @foreach ($tools as $tool)
                        <option value="{{ $tool['id'] }}" @if (isset($dados) && $dados->tool == $tool['id']) selected @endif
                            @if ($errors->any() && old('tool') == $tool['id']) selected @endif>
                            {{ $tool['name'] }}</option>
                    @endforeach
                @endif
            </select>
        </div>

        <div class="mb-3 input-group-lg">
            <label for="employee" class="form-label">Funcionário</label>
            <select class="select form-select" name="employee" aria-label="Default select example">
                <option selected disabled value="">Selecione</option>
                @if (isset($employees))
                    @foreach ($employees as $employee)
                        <option value="{{ $employee['id'] }}" @if (isset($dados) && $dados->employee == $employee['id']) selected @endif
                            @if ($errors->any() && old('employee') == $employee['id']) selected @endif>
                            {{ $employee['id'] . ' - ' . $employee['name'] }}</option>
                    @endforeach
                @endif
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</div>
