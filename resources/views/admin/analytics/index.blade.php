@extends('layouts.admin')

@section('title', 'Social Feeds')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<canvas id="usersChart" height="120"></canvas>
<canvas id="viewsChart" height="120" style="margin-top:50px"></canvas>
<canvas id="sessionsChart" height="120" style="margin-top:50px"></canvas>

<script>
const labels = @json($data['dates']);

new Chart(document.getElementById('usersChart'), {
    type: 'line',
    data: {
        labels: labels,
        datasets: [{
            label: 'Users',
            data: @json($data['users']),
            borderWidth: 2
        }]
    }
});

new Chart(document.getElementById('viewsChart'), {
    type: 'line',
    data: {
        labels: labels,
        datasets: [{
            label: 'Page Views',
            data: @json($data['views']),
            borderWidth: 2
        }]
    }
});

new Chart(document.getElementById('sessionsChart'), {
    type: 'line',
    data: {
        labels: labels,
        datasets: [{
            label: 'Sessions',
            data: @json($data['sessions']),
            borderWidth: 2
        }]
    }
});
</script>

@endsection


