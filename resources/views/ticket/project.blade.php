@extends('template')

@section('title', $title)

@section('content')
    <section class="form">
        <h1>Tickets</h1>
        <table id="tickets" class="table">
            <tr>
                <th>Project naam</th>
                <th>Identificatie</th>
                <th>Omschrijving</th>
                <th>Behandelaar</th>
            </tr>
            @foreach ($issues as $issue)
            <tr>
                <td>{{ $issue->fields->project->name }}</td>
                <td>{{ $issue->key }}</td>
                <td>{{ $issue->fields->summary }}</td>
                <td>
                    @if ($issue->fields->description)
                        {{ extractTextFromADF($issue->fields->description) }}
                    @else
                        Geen beschrijving
                    @endif
                </td>
                <td>
                    <div class="no-wrap">
                    @if ($issue->fields->assignee)
                    <img src="{{ $issue->fields->assignee->avatarUrls['48x48'] }}" alt="{{ $issue->fields->assignee->displayName }} Avatar" class="img-avatar">
                    {{ $issue->fields->assignee->displayName }}
                    @else
                        Geen toegewezene
                    @endif
                </div>
            </td>
    </tr>
@endforeach

        </table>
        @include('pagination')
    </section>
@endsection

@section('scripts')

@endsection