@extends('admin.layout.main')
@section('section')

<p>Agent ID: {{ $agent_id }}</p>
<p>Royalsundaram ID: {{ $royalsundaram_id }}</p>

<a href="{{ asset('storage/policy/' . $customFileName) }}" target="_blank">View Policy File</a>
@endsection 