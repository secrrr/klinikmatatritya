@extends('layouts.admin')

@section('title', 'Social Feeds')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/chart.js@4"></script>
<style>
.cards { display:flex; gap:1rem; margin-bottom:1rem; }
.card { padding:1rem; background:#fff; border-radius:8px; box-shadow:0 1px 4px rgba(0,0,0,0.08); }
</style>

<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Google Analytics View</h1>
       
    </div>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-body">
            <h2>Analytics</h2>


<div class="cards">
<div class="card" id="card-total">Total: —</div>
<div class="card" id="card-avg">Avg / hari: —</div>
<div class="card" id="card-change">Change: —</div>
</div>


<canvas id="chart"></canvas>
            
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
async function loadData(start, end) {
const qs = new URLSearchParams();
if (start) qs.set('start', start);
if (end) qs.set('end', end);


const res = await fetch('/admin/analytics/data?' + qs.toString());
const data = await res.json();
return data;
}


function formatDateLabel(yyyymmdd) {
return `${yyyymmdd.slice(0,4)}-${yyyymmdd.slice(4,6)}-${yyyymmdd.slice(6,8)}`;
}


(async () => {
const data = await loadData();


document.getElementById('card-total').innerText = 'Total: ' + data.total;
document.getElementById('card-avg').innerText = 'Avg / hari: ' + data.avg_per_day;
document.getElementById('card-change').innerText = 'Change vs prev: ' + (data.pct_change === null ? '—' : data.pct_change + '%');


const labels = data.rows.map(r => formatDateLabel(r.date));
const values = data.rows.map(r => r.pageviews);


const ctx = document.getElementById('chart').getContext('2d');
new Chart(ctx, {
type: 'line',
data: { labels, datasets: [{ label: 'Pageviews', data: values, tension:0.3 }] },
options: { responsive:true }
});
})();
</script>
@endsection


