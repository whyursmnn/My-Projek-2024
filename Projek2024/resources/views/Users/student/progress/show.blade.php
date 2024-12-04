<!-- Misalnya menampilkan nama kursus dan progresnya -->
<h2>Progres Kursus: {{ $course->name }}</h2>
<p>Progres Anda: {{ $progress }}%</p>

<!-- Form untuk mengupdate progres -->
<form action="{{ route('student.progress.update', $course->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="completion_percentage">Perbarui Progres:</label>
    <input type="number" name="completion_percentage" value="{{ $progress }}" max="100" min="0" required>

    <button type="submit">Simpan</button>
</form>
