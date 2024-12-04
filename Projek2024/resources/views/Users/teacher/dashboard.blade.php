<x-app-layout>

    <div class="flex h-screen bg-gray-100">
        <!-- Sidebar -->
        <aside class="w-64 bg-purple-800 text-white flex flex-col">
            <div class="px-6 py-4">
                <h1 class="text-2xl font-bold">Akademi</h1>
            </div>
            <nav class="flex-1 px-4 py-2">
                <ul>
                    <li class="mb-4">
                        <a href="{{ route('dashboard') }}"
                            class="flex items-center gap-4 px-4 py-2 rounded hover:bg-purple-700 transition-colors">
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="mb-4">
                        <a href="{{ route('teacher.courses.index') }}" data-ajax="true"
                            class="flex items-center gap-4 px-4 py-2 rounded hover:bg-purple-700 transition-colors">
                            <span>Course Management</span>
                        </a>
                    </li>
                    <li class="mb-4">
                        <a href="{{ route('teacher.contents.index') }}" data-ajax="true"
                            class="flex items-center gap-4 px-4 py-2 rounded hover:bg-purple-700 transition-colors">
                            <span>Content Management</span>
                        </a>
                    </li>
                    {{-- <!-- Course-based Student Management -->
                    @foreach ($courses as $course)
                        <li class="mb-4">
                            <a href="{{ route('teacher.courses.student', ['course' => $course->id]) }}" data-ajax="true"
                                class="flex items-center gap-4 px-4 py-2 rounded hover:bg-purple-700 transition-colors">
                                <span>Student Management: {{ $course->name }}</span>
                            </a>
                        </li>
                    @endforeach
                    @if ($courses->isEmpty())
                        <li>
                            <p class="text-white px-4 py-2">No courses available for Student Management.</p>
                        </li>
                    @endif --}}
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <div id="main-content" class="flex-1 flex flex-col">
            <!-- Header -->
            <header class="bg-white shadow px-6 py-4 flex items-center justify-between">
                <h2 class="text-xl font-bold">Teacher Dashboard</h2>
                <div class="flex items-center space-x-4">
                    <input type="text" placeholder="Search"
                        class="border border-gray-300 rounded px-3 py-1 text-gray-700 focus:outline-none focus:ring-2 focus:ring-purple-500" />
                </div>
            </header>

            <!-- Dashboard Content -->
            <main class="p-6">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Total Courses -->
                    <div class="bg-white rounded-lg shadow p-6">
                        <h3 class="text-gray-500">Total Courses</h3>
                        <h1 class="text-2xl font-bold">{{ $courses->count() }}</h1>
                    </div>

                    <!-- Total Students in All Courses -->
                    <div class="bg-white rounded-lg shadow p-6">
                        <h3 class="text-gray-500">Total Students</h3>
                        <h1 class="text-2xl font-bold">{{ \App\Models\User::whereIn('id', $courses->pluck('user_id'))->count() }}</h1>
                    </div>

                    <!-- Total Content Entries -->
                    <div class="bg-white rounded-lg shadow p-6">
                        <h3 class="text-gray-500">Total Contents</h3>
                        <h1 class="text-2xl font-bold">{{ \App\Models\Content::count() }}</h1>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-6">
                    <!-- Monthly Course Data (Example Chart) -->
                    <div class="bg-white rounded-lg shadow p-6">
                        <h3 class="text-xl font-bold mb-4">Courses Per Month</h3>
                        <canvas id="coursesChart"></canvas>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script>
        const ctx = document.getElementById('coursesChart').getContext('2d');
        const coursesChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($chartData['labels'] ?? []) !!}, // Fallback to empty array
                datasets: [{
                    label: 'Courses',
                    data: {!! json_encode($chartData['data'] ?? []) !!}, // Fallback to empty array
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        document.addEventListener('DOMContentLoaded', function() {
            const links = document.querySelectorAll('a[data-ajax]');
            links.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    const url = this.getAttribute('href');
                    fetch(url)
                        .then(response => response.text())
                        .then(html => {
                            document.querySelector('#main-content').innerHTML = html;
                        })
                        .catch(error => console.error('Error loading the page: ' + error));
                });
            });
        });
    </script>

</x-app-layout>
