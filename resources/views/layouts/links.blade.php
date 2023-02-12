<div class="col-md-8"> 
  <h1><a href="/community">Community {{ $title}}</a></h1>
  @foreach ($links as $link)
  <li>

    <span class="label label-default" style="background: {{ $link->channel->color }}">
      <a href="/community/{{ $link->channel->title }}" target="_blank">{{ $link->channel->title}} </a>
  </span>
      <a href="{{$link->link}}" target="_blank">{{ $link->title}} </a>
      <small>Contributed by: {{$link->creator->name}} {{$link->updated_at->diffForHumans()}} 🤔{{$link->users()->count()}} </small>
  </li>
  @endforeach

</div>