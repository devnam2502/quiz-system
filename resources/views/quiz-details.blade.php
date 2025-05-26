<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MCQ Page</title>
    @vite('resources/css/app.css')
    <!-- Add Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <x-user-navbar ></x-user-navbar>
    @if(session('message'))
        <p class="text-success">{{ session('message') }}</p>
    @endif
    <div class="bg-light d-flex flex-column align-items-center min-vh-100 pt-5">
        <h1 class="text-2xl text-center text-success mb-4 fw-bold ">
            {{$quizName}}
        </h1>
        <div class="mt-2 p-4 bg-white shadow rounded w-100" style="max-width: 1200px;">
            <h2 class="text-success fw-bold mb-4">Danh sách câu hỏi</h2>
            <div class="table-responsive">
                <table class="table table-bordered align-middle">
                    <thead class="table-success">
                        <tr>
                            <th>Question</th>
                            <th>Answer A</th>
                            <th>Answer B</th>
                            <th>Answer C</th>
                            <th>Answer D</th>
                            <th>Correct Answer</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($mcqs as $mcq)
                            <tr>
                                <td>{{ $mcq->question }}</td>
                                <td>{{ $mcq->a }}</td>
                                <td>{{ $mcq->b }}</td>
                                <td>{{ $mcq->c }}</td>
                                <td>{{ $mcq->d }}</td>
                                <td>
                                    @php
                                        $correct = $mcq->correct_ans;
                                        $answers = ['a' => $mcq->a, 'b' => $mcq->b, 'c' => $mcq->c, 'd' => $mcq->d];
                                    @endphp
                                    <span class="fw-bold text-success">{{ strtoupper($correct) }}.</span> {{ $answers[$correct] ?? '' }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <x-footer-user></x-footer-user>
    <!-- Add Bootstrap JS CDN (optional, for interactivity) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
