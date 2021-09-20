<h2>Eventos</h2>
<hr>

<ul>
    @foreach ($events as $event)
        <li>{{$event->title}}</li>
    @endforeach
</ul>

<hr>

<ul>
    @forelse ($events as $event)
        <li>{{$event->title}}</li>

        @empty
            <li>Nenhum evento cadastrado</li>
    @endforelse
</ul>