@extends('layouts.master')

@section('page-style')
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/tooltipster.bundle.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/tooltipster-sideTip-light.min.css') }}">
@endsection

@section('title', '| Create Domain')

@section('content')

  <script>document.body.className += ' fade-out';</script>

      @include('layouts.main-header')

      @include('layouts.errors')

      <form method="post" action="/annotations/upload-domain" enctype="multipart/form-data" class="contact-form" id="upload-form">
        {{ csrf_field() }}

        <div class="upload-info">
          <h2>Create Domain</h2>
          <div class="upload-rows">
            <div class="row">
              <div class="col span-1-of-3">
                <label for="domain_name">Name</label>
              </div>
              <div class="col span-2-of-3">
                <input type="text" name="domain_name" id="domain_name" placeholder="Domain name" required>
              </div>
            </div>
            <div class="row">
              <div class="col span-1-of-3">
                <label for="type">Type</label>
              </div>
              <div class="col span-2-of-3">
                <select name="type" id="type">
                      <option value="classification" selected>Classification</option>
                      <option value="loc/det">Localization / Detection</option>
                      <option value="segmentation">Segmentation</option>
                  </select>
              </div>
            </div>
          </div>
        </div>

        <div class="upload-ontology">

          <div class="row" id="ontology-form-buttons">
            <div class="col span-1-of-2">
              <div class="btn btn-full define-btn">Define Ontology</div>
            </div>
            <div class="col span-1-of-2">
              <div class="btn btn-full upload-btn">Upload Ontology</div>
            </div>
          </div>

          <div class="define-ontology-form show">
            <div class="upload-rows">
              <h2>Define Ontology</h2>

              <h4>Classes</h4>

              <div class="class-wrap js--section-images">
                <div class="class-selector">
                  <div class="class-box js--wp-15">
                    <div class="row">
                      <div class="col span-2-of-4">
                        <label for="class_name">Class</label>
                      </div>
                      <div class="col span-1-of-4">
                        <label for="context_class">Context Class</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col span-2-of-4">
                        <input type="text" name="class_name[1][]" id="class_name" placeholder="Class name">
                      </div>
                      <div class="col span-1-of-4">
                        <select name="context_class[1][]" id="context_class" class="context_class">
                                <option value="0" selected>No</option>
                                <option value="1">Yes</option>
                            </select>
                      </div>
                      <div class="col span-1-of-4">
                        <i class="ion-ios-help-outline icon-small tooltip-description" title="How it works: Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam vulputate tristique lorem, ut vestibulum purus fermentum quis. Nunc quis rhoncus lorem."></i>
                      </div>
                    </div>
                    <div class="target_class_box hide">
                      <div class="row">
                        <div class="col span-2-of-4">
                          <label for="target_class">Target Class</label>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col span-2-of-4">
                          <input type="text" name="target_class[1][]" id="target_class" placeholder="Target Class name">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col span-1-of-2">
                      <div class="selector-box js--wp-4">
                        <div class="label-attribute-selector">
                          <div class="row">
                            <div class="btn btn-full labels-btn"> Labels </div>
                          </div>
                          <div class="row">
                            <div class="btn btn-ghost attributes-btn"> Attributes </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col span-1-of-2">
                      <div class="labels-attributes-box js--wp-5">
                        <div class="labels-block">
                          <div class="label-wrap">
                            <div class="row">
                              <label for="label_name">Label</label>
                            </div>
                            <div class="row">
                              <div class="col span-2-of-3">
                                <input type="text" name="label_name[1][]" id="label_name" class="set-label" placeholder="Label name">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="btn btn-full add-label">Add Label</div>
                          </div>
                        </div>
                        <div class="attributes-block hide">
                          <div class="attribute-wrap">
                            <div class="row">
                              <label for="attribute_name">Attribute</label>
                            </div>
                            <div class="row">
                              <div class="col span-2-of-3">
                                <input type="text" name="attribute_name[1][1][]" id="attribute_name" class="set-attribute" placeholder="Attribute name">
                              </div>
                            </div>
                            <div class="value-wrap">
                              <div class="sample-wrap">
                                <div class="row">
                                  <div class="col span-1-of-3">
                                    <input type="text" name="value_name[1][1][1][]" id="value_name" class="set-value" placeholder="Value">
                                  </div>
                                  <div class="col span-1-of-3">
                                    <div class="sample-btn">Sample</div>
                                  </div>
                                  <div class="col span-1-of-3">
                                    <i class="ion-android-add add-value"></i>
                                  </div>
                                </div>
                                <div class="sample-window hide">
                                  <div class="sample-content">
                                    <span class="close">&times;</span>
                                    <input type="file" id="sample" name="sample[1][1][1][]" accept="image/*" />
                                    <input type="text" id="sample_description" name="sample_description[1][1][1][]" placeholder="Sample description">
                                    <div class="btn btn-full add-sample">Add Sample</div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="btn btn-full add-attribute">Add Attribute</div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="btn btn-full add-class">Add Class</div>
              </div>

            </div>
          </div>

          <div class="upload-ontology-form hide">
            <div class="upload-rows">
              <h2>Upload Ontology</h2>
              <div class="row">
                <h4>
                    Select Ontology ".owl" File
                  </h4>
              </div>
              <div class="row">
                <input type="file" id="ontology-file" name="ontology-file" accept=".owl" />
              </div>
              <br /><br />
              <div class="row">
                <h4>
                    Upload Sample File
                  </h4>
              </div>
              <div class="row">
                <input type="file" id="sample-file" name="sample-file" accept=".zip, .rar" />
              </div>
            </div>
          </div>
        </div>

        <div class="upload-dataset">
          <div class="upload-rows">
            <h2>Upload Dataset</h2>

            <div class="row">
              <div class="col span-1-of-3">
                <label for="dataset_name">Name</label>
              </div>
              <div class="col span-2-of-3">
                <input type="text" name="dataset_name" id="dataset_name" placeholder="Dataset name" required>
              </div>
            </div>
            <div class="row">
              <h4>
                  Select Images for Dataset
                </h4>
            </div>
            <div class="row">
              <input type="file" id="files" name="files[]" multiple="multiple" accept="image/*" required />
            </div>
            <div class="preview-showcase">
              <output id="result" />
            </div>
          </div>
        </div>

        <div class="submit-dataset">
          <div class="row">
            <input type="submit" value="Upload!">
          </div>
        </div>

      </form>

@include('layouts.footer')

@endsection

@section('page-scripts')
  <script src="{{ asset('js/dynamic-form.js') }}"></script>
  <script src="{{ asset('js/upload-preview.js') }}"></script>
  <script src="{{ asset('js/tooltipster.bundle.min.js') }}"></script>
  <script>
  $(document).ready(function() {
         $('.tooltip-description').tooltipster({
           theme: 'tooltipster-light',
           touchDevices: true
         });
     });
  </script>
@endsection
