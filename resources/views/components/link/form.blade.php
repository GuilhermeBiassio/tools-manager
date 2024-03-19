<div class="container">
    <form method="POST" action="{{ $action }}">
        @csrf

        @if (isset($links))
            @method('PUT')
        @endif

        <div class="mb-3 input-group-lg">
            <label for="carro" class="form-label">Ferramenta</label>
            <select class="select form-select" name="tool" aria-label="Default select example">
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
            <label for="carro" class="form-label">Funcionário</label>
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
