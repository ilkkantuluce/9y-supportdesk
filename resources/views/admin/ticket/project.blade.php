
<x-admin-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }} {{ Auth::guard('admin')->user()->name }} - ({{ Auth::guard('admin')->user()->email }})
        </h2>
    </x-slot>
    
    <section class="form">
        <h1>Tickets</h1>
        <table id="tickets" class="table">
            <tr>
                <th>Project naam</th>
                <th>Identificatie</th>
                <th>Omschrijving</th>
                <th>Beschrijving</th>
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
    </x-admin-layout>
