<div id="detail-col">
  <form method="post"
  @if($domain->owl_path != null)
    action="/annotations/upload-owl-annotation"
  @else
    action="/annotations/upload-annotation"
  @endif
   id="annotation-form">
    {{ csrf_field() }}

    <div class="annotation-details detail-1 show js--wp-12">
      @include('layouts.errors')
      <div class="row">
        <h2>Labeling</h2>
      </div>
      <div class="row">
        <div class="col span-1-of-3">
          <label for="class">Class</label>
        </div>
        <div class="col span-2-of-3">
          <select name="class_select" id="class_select">
            <option value="" selected>Select Class</option>
          @foreach ($classes as $class)
            <option value="{{ $class->id }}">{{ $class->class_name }}</option>
          @endforeach
        </select>
        </div>
      </div>
      <div class="row">
        <div class="col span-1-of-3">
          <label for="label">Label</label>
        </div>
        <div class="col span-2-of-3">
          <select name="label_select" id="label_select">

          </select>
        </div>
      </div>
      <div id="context_block">

      </div>
      <div class="row">
        <h2>Annotation</h2>
      </div>
      <div id="generic_property">

      </div>
      <div id="generic_block">
      <div class="row">
        <div class="col span-1-of-3">
          <label for="genericAnnotation">genericAnnotation</label>
        </div>
        <div class="col span-2-of-3">
          <input type="text" name="genericAnnotation" id="genericAnnotation" />
        </div>
      </div>
      <div class="row">
        <div class="col span-1-of-3">
          <label for="annotationIsVisible">annotationIsVisible</label>
        </div>
        <div class="col span-2-of-3">
          <select name="annotationIsVisible" id="annotationIsVisible">
                    <option value="entirely" selected>Entirely</option>
                    <option value="partially">Partially</option>
                </select>
        </div>
      </div>
    </div>
      <div class="row" id="annotation-form-buttons">
        <div class="col span-1-of-2"> <a class="btn btn-full" href="/annotation-page/{{ $image->id }}">Back</a> </div>
        <div class="col span-1-of-2">
          <div class="btn btn-full details-next-btn">Next</div>
        </div>
      </div>
    </div>



    <div class="annotation-details detail-2 hide js--wp-14">
      <div class="row">

        <div class="row">
          <h2>Attributes</h2>
        </div>
        <div id="multivalues">



        </div>
        <div id="data_properties">

        </div>
        <div id="sample_block">

        </div>
        <div class="row" id="annotation-form-buttons">
          <div class="col span-1-of-2">
            <div class="btn btn-full details-back-btn">Back</div>
          </div>
          <div class="col span-1-of-2">
            <input type="submit" value="Save">
          </div>
        </div>
      </div>
    </div>
  </form>
</div>
