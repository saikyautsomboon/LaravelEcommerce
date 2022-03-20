



@foreach ($categories as $category)
    <li class=""><a href="{{ route('filterpage',$category->id) }}">{{ $category->name }}</a></li>
@endforeach
