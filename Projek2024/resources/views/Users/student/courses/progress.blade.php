<x-app-layout>
    <div class="container">
        <h2>Progres Kursus: {{ $course->name }}</h2>

        <form action="{{ route('student.courses.progress.update', $course) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="completion_percentage">Progres (%)</label>
                <input type="number" name="completion_percentage" id="completion_percentage" class="form-control" max="100" min="0" required>
            </div>

            <button type="submit" class="btn btn-primary">Update Progres</button>
        </form>
    </div>
</x-app-layout>
