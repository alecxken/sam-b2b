
@extends('layouts.template')

@section('content')

@php
$orders = \App\Models\Order::all()->count();
$value = \App\Models\Order::all()->sum('total');
$paid = \App\Models\Order::where('payment_status','Paid')->sum('total');
$unpaid = \App\Models\Order::where('payment_status','Unpaid')->sum('total');
@endphp


<div class="row">
<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
<div class="card dash-widget">
<div class="card-body">
<span class="dash-widget-icon"><i class="fa fa-cubes"></i></span>
<div class="dash-widget-info">
<h3>{{$orders}}</h3>
<span>Orders</span>
</div>
</div>
</div>
</div>
<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
<div class="card dash-widget">
<div class="card-body">
<span class="dash-widget-icon"><i class="fa fa-usd"></i></span>
<div class="dash-widget-info">
<h3>{{number_format($value)}}</h3>
<span>Value</span>
</div>
</div>
</div>
</div>
<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
<div class="card dash-widget">
<div class="card-body">
<span class="dash-widget-icon"><i class="fa fa-diamond"></i></span>
<div class="dash-widget-info">
<h3>{{number_format($paid)}}</h3>
<span>Paid</span>
</div>
</div>
</div>
</div>
<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
<div class="card dash-widget">
<div class="card-body">
<span class="dash-widget-icon"><i class="fa fa-user"></i></span>
<div class="dash-widget-info">
<h3>{{number_format($unpaid)}}</h3>
<span>Unpaid</span>
</div>
</div>
</div>
</div>
</div>
@endsection