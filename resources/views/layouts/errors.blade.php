@if (count($errors))

        @foreach ($errors->all() as $error)
          <div class="error-message">
            <div class="row">
              <i class="ion-android-warning"></i>&nbsp{{ $error }}</li>
            </div>
          </div>
        @endforeach

@endif
