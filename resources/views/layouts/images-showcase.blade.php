@foreach ($datasets as $dataset)
  @foreach ($images as $image)
    @if($dataset->id == $image->dataset_id)

<figure class="ontology-image">
  <a href="/annotation-page/{{ $image->id }}">
    <img src="{{ asset('storage/datasets/'.$dataset->dataset_name.'/'.$image->path) }}" data-img="{{ asset('storage/datasets/'.$dataset->dataset_name.'/'.$image->path) }}" alt="{{ $dataset->dataset_name }}" class="box-image" />
  </a>
</figure>

@endif
@endforeach
@endforeach
