@extends('template')

@section('title', $title)

@section('content')
    <section class="form">
        <h1>Tickets</h1>
        <table id="tickets" class="table">
            <tr>
                <th>Project naam</th>
            </tr>

            @php
                $displayedProjects = [];
            @endphp

@foreach ($issues as $issue)
    @if (Auth::check() && Auth::user()->project && $issue->fields->project && Auth::user()->project == $issue->fields->project->key && !in_array($issue->fields->project->key, $displayedProjects))
        <tr>
            <td>
                <a href="{{ route('tickets.show', ['project' => $issue->fields->project->key]) }}">
                    @if (isset($issue->fields->project->avatarUrls))
                        @php
                            $avatarUrls = (array) $issue->fields->project->avatarUrls;
                        @endphp
                        <img src="{{ $avatarUrls['48x48'] }}" alt="{{ $issue->fields->project->name }} Avatar" class="img-avatar">
                    @endif
                    {{ $issue->fields->project->name }}
                </a>
            </td>
        </tr>
        @php
            $displayedProjects[] = $issue->fields->project->key;
        @endphp
    @endif
@endforeach




        </table>
    </section>
@endsection

@section('scripts')

@endsection