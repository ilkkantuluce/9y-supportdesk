@extends('template')

@section('title', $title)

@section('content')
    <section class="form">
        <h1>Ticket aanmaken</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('createdIssue') !== null)
            Issue "{{ session('createdIssue') }}" is aangemaakt<br />
        @endif
        <form action="" method="POST">
            @csrf
            <div class="form-group">
                <label for="project">Project</label>
                <input type="text" id="project" name="project" required value={{ Auth::user()->project }} readonly>
            </div>
            <div class="form-group">
                <label for="subject">Onderwerp</label>
                <input type="text" id="subject" name="subject" required>
            </div>
            <div class="form-group">
                <label for="message">Omschrijving</label>
                <textarea id="message" name="message" rows="4" required></textarea>
            </div>
            <button type="submit">Bevestigen</button>
        </form>
    </section>
@endsection

@section('scripts')

@endsection