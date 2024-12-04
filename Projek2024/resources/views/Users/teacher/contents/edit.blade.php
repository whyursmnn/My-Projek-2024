


<div class="container">
    <h1>Edit Content</h1>
    <form action="{{ route('teacher.contents.update', $content) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="course_id">Course</label>
            <select name="course_id" id="course_id" class="form-control">
                @foreach ($courses as $course)
                    <option value="{{ $course->id }}" {{ $content->course_id == $course->id ? 'selected' : '' }}>
                        {{ $course->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $content->title }}">
        </div>
        <div class="form-group">
            <label for="body">Body</label>
            <textarea name="body" id="body" class="form-control">{{ $content->body }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Update</button>
    </form>
</div>

