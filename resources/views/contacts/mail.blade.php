<h1>EMAIL:</h1>
<p>
    @if($contact->name)
        Správa od: {{ $contact->name }}
    @endif
    Email: {{ $contact->email }}
</p>
<p>
    {{ $contact->message }}
</p>

<p>
    Poslané: {{ $contact->created_at }}
</p>