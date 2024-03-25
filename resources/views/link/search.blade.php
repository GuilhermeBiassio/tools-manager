@extends('components.main')
@section('content')
    <div class="container">
        <form method="POST" class="mb-3 row p-3" action="{{ route('link.search') }}">
            @csrf

            <div class="col-md-6">
                <label for="ini">Data inicial</label>
                <input type="date" id="ini" name="start" class="form-control form-control-lg"
                    @if ($errors->any()) value="{{ old('start') }}" @endif required>
            </div>
            <div class="col-md-6">
                <label for="end">Data final</label>
                <input type="date" id="end" name="end" class="form-control form-control-lg"
                    @if ($errors->any()) value="{{ old('end') }}" @endif required>
            </div>

            <div class="mb-3 input-group-lg">
                <label for="tools" class="form-label">Ferramenta</label>
                <select class="select form-select" id="tools" name="tool" aria-label="Default select example">
                    <option selected disabled value="">Selecione</option>
                    @if (isset($tools))
                        @foreach ($tools as $tool)
                            <option value="{{ $tool['id'] }}" @if ($errors->any() && old('tool') == $tool['id']) selected @endif>
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
                            <option value="{{ $employee['id'] }}" @if ($errors->any() && old('employee') == $employee['id']) selected @endif>
                                {{ $employee['id'] . ' - ' . $employee['name'] }}</option>
                        @endforeach
                    @endif
                </select>
            </div>

            <div class="col-12 m-2">
                <button type="submit" class="btn btn-primary btn-lg">Filtrar</button>
            </div>
        </form>
    </div>

@endsection

@section('js')
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

        });
    </script>
@endsection
