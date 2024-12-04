<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Details</title>
</head>
<body>
    <h1>Course Details</h1>
    <p><strong>Name:</strong> {{ $course->name }}</p>
    <p><strong>Description:</strong> {{ $course->description }}</p>
    <p><strong>Start Date:</strong> {{ $course->start_date }}</p>
    <p><strong>End Date:</strong> {{ $course->end_date }}</p>
    <p><strong>Teacher:</strong> {{ $course->teacher->name ?? 'Not assigned' }}</p>
    @foreach ($courses as $course)
        <p><img src="{{ asset('storage/' . $course->image) }}" alt="Course Image" width="200"></p>
    @endif
</body>
</html>
