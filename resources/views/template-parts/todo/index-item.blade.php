<li class="list-group-item">
    <a href="{{route('todos.show', $single)}}"
       class="{{$single->is_completed ? 'text-success' : 'text-primary'}}"
    >
        {{ $single->title }}
    </a>
    @if($single->tags)
        @foreach($single->tags as $tag)
            <span class="badge bg-primary">{{$tag->name}}</span>
        @endforeach
    @endif
</li>
