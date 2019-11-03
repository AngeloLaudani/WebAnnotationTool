<section class="section-ontology">
  <div class="row">
    <h3>Annotate Your World</h3>
  </div>
  <div class="ontology-filters">
    <form method="get">
    <div class="row">
      <div class="col span-1-of-3">
        <div class="row">
          <div class="filter-description"> <i class="ion-android-clipboard icon-small"></i>
            <label for="select-domain">Choose Domain</label>
          </div>
        </div>
        <div class="row">
          <div class="filter-box">
            <select name="select-domain" id="select-domain">
                      <option value="0">Select Domain</option>
                    @foreach ($domains as $domain)
                      <option value="{{ $domain->id }}">{{ $domain->domain_name }}</option>
                    @endforeach
            </select>
          </div>
        </div>
      </div>
      <div class="col span-1-of-3">
        <div class="row">
          <div class="filter-description"> <i class="ion-android-funnel icon-small"></i>
            <label for="order-by">Order By</label>
          </div>
        </div>
        <div class="row">
          <div class="filter-box">
            <select name="order-by" id="order-by">
                          <option value="most" selected>Most Annotations</option>
                          <option value="least">Least Annotations</option>
                      </select>
          </div>
        </div>
      </div>
      <div class="col span-1-of-3">
        <div class="row">
          <div class="filter-description"> <i class="ion-ios-upload-outline icon-small"></i>
            <label for="domain-upload">Create Domain</label>
          </div>
        </div>
        <div class="row domain-upload">
          <a class="btn btn-full" href="/annotations/upload-domain">New</a>
        </div>
      </div>
    </div>
  </form>
  </div>
</section>
