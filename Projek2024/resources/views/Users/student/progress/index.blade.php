<div class="container">
    <h1>Progres Belajar Anda</h1>

    @foreach ($progress as $data)
        <form action="{{ route('student.progress.update', $data['course']->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="completion_percentage">Progres untuk Kursus: {{ $data['course']->name }}</label>
                <input type="number" name="completion_percentage" value="{{ $data['progress'] }}" max="100" min="0" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Perbarui Progres</button>
        </form>
        <hr>
    @endforeach
</div>
