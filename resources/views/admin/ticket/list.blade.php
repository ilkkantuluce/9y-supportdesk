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
            </tr>
            @php
                $displayedProjects = [];
            @endphp
            @foreach ($issues as $issue)
                @if (!empty($issue->fields->project) && !in_array($issue->fields->project->key, $displayedProjects))
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
</x-admin-layout>