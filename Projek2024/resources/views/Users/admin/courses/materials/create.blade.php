<x-app-layout>
    <div class="container">
        <h2>Tambah Materi untuk Kursus: {{ $course->name }}</h2>

        <form action="{{ route('admin.courses.materials.store', $course) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Judul Materi</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="description">Deskripsi</label>
                <textarea name="description" id="description" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label for="file">File Materi (Opsional)</label>
                <input type="file" name="file" id="file" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Simpan Materi</button>
        </form>
    </div>
</x-app-layout>
