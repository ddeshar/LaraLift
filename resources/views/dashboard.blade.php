@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>User Dashboard</h1>

        @if(Auth::check())
            User role: {{ Auth::user()->roles->first()->name }}
        @endif

        <h2>Current Laravel Version</h2>
        <p>{{ $data['current_version'] }}</p>

        <h2>Available Laravel Versions</h2>
        <ul>
            @foreach($data['available_versions'] as $version)
                <li>{{ $version }}</li>
            @endforeach
        </ul>

        <h2>Upgrade Status</h2>
        <p>{{ $data['upgrade_status'] }}</p>

        <h2>Compatibility Check</h2>
        <p>{{ $data['compatibility_check'] }}</p>

        <h2>Change Summary</h2>
        <ul>
            @foreach($data['change_summary'] as $change => $count)
                <li>{{ $change }}: {{ $count }}</li>
            @endforeach
        </ul>

        <h2>Version History</h2>
        <table>
            <thead>
                <tr>
                    <th>Version</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data['version_history'] as $version)
                    <tr>
                        <td>{{ $version['version'] }}</td>
                        <td>{{ $version['date'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h2>Repository Information</h2>
        <p>
            Name: {{ $data['repository_info']['name'] }}<br>
            Owner: {{ $data['repository_info']['owner'] }}<br>
            URL: <a href="{{ $data['repository_info']['url'] }}">{{ $data['repository_info']['url'] }}</a>
        </p>
    </div>
@endsection
