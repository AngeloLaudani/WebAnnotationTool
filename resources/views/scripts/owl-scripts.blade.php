<script>
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  var data = "E:/tomcat/webapps/{{ $domain->owl_path }}";

    // Aggiunge Classes
    $.ajax({
      url: "{{ config('webservice.service_uri') }}getClassesLists",
      method: "POST",
      dataType: "json",
      data: data,
      contentType: "text/plain",

      success: function(result, status, jqXHR) {
        console.log('Web Service Success: Classes Loaded');

        $('#class_select').empty();
        $.each(result, function(index, ontology_class) {
          $.each(ontology_class, function(class_index, class_name) {
            $('#class_select').append('<option value="' + class_name + '">' + class_name + '</option>');
          });

          $('#context_block').empty();
          $('#context_block').append(
            '<div class="row"><div class="col span-1-of-3"><label for="context_class">Context Class</label></div><div class="col span-2-of-3"> Yes </div></div><div class="row"><div class="col span-1-of-3"><label for="target_class">Target Class</label></div><div class="col span-2-of-3">' +
            index + '</div></div>');
        });

      },
      error(jqXHR, textStatus, errorThrown) {
        console.log('Web Service Fail');
      }
    });

    $.ajax({
      url: "{{ config('webservice.service_uri') }}getAllLabels",
      method: "POST",
      dataType: "json",
      data: data,
      contentType: "text/plain",

      success: function(result, status, jqXHR) {
        console.log('Web Service Success: Labels Loaded');

        $('#label_select').empty();
        $.each(result, function(index, label) {

          $('#label_select').append('<option value="' + label + '">' + label + '</option>');

        });

      },
      error(jqXHR, textStatus, errorThrown) {
        console.log('Web Service Fail');
      }
    });

    // Aggiunge text form per generic property
    $.ajax({
      url: "{{ config('webservice.service_uri') }}addGenericProperty",
      method: "POST",
      dataType: "json",
      data: data,
      contentType: "text/plain",

      success: function(result, status, jqXHR) {
        console.log('Web Service Success: Generic Property Loaded');

        if (result == true) {
          $('#generic_property').empty();
          $('#generic_property').append(
            '<div class="row"><div class="col span-1-of-3"><label for="genericAnnotation">genericAnnotation</label></div><div class="col span-2-of-3"><input type="text" name="genericAnnotation" id="genericAnnotation" /></div></div>');
        }

      },
      error(jqXHR, textStatus, errorThrown) {
        console.log('Web Service Fail');
      }
    });

    // Aggiunge select per annotation properties
    $.ajax({
      url: "{{ config('webservice.service_uri') }}getAnnotationDataProperties",
      method: "POST",
      dataType: "json",
      data: data,
      contentType: "text/plain",

      success: function(result, status, jqXHR) {
        console.log('Web Service Success: Data Properties Loaded');

        $('#generic_block').empty();
        $.each(result, function(generic_index, generic_attribute) {

          $('#generic_block').append('<div class="row"><div class="col span-1-of-3"><label for="' + generic_index + '">' + generic_index +
            '</label></div><div class="col span-2-of-3"><select name="generic_select" id="' + generic_index + '"></select></div></div>');

          for (var i = 0; i < generic_attribute.length; i++) {
            $('#' + generic_index + '').append('<option value="' + generic_attribute[i] + '">' + generic_attribute[i] + '</option>');
          }
        });

      },
      error(jqXHR, textStatus, errorThrown) {
        console.log('Web Service Fail');
      }
    });

    // Aggiunge Physical Properties
    $.ajax({
      url: "{{ config('webservice.service_uri') }}getPhysicalPropertiesMap",
      method: "POST",
      dataType: "json",
      data: data,
      contentType: "text/plain",

      success: function(result, status, jqXHR) {
        console.log('Web Service Success: Physical Properties Loaded');

        $('#multivalues').empty();
        $.each(result, function(index, attribute_class) {
          $.each(attribute_class, function(attribute_index, attribute) {
            $('#multivalues').append('<div class="row"><div class="col span-1-of-3"><input name="attribute_name[]" type="hidden" value="' + attribute_index + '"><label for="' + attribute_index + '">' + attribute_index +
              '</label></div><div class="col span-2-of-3"><select name="attribute_select[]" id="' + attribute_index + '" class="sample-class"></select></div></div>');

            for (var i = 0; i < attribute.length; i++) {
              $('#' + attribute_index + '').append('<option value="' + attribute[i] + '">' + attribute[i] + '</option>');
            }

          });
        });

      },
      error(jqXHR, textStatus, errorThrown) {
        console.log('Web Service Fail');
      }
    });

    $('#multivalues').on('change', '.sample-class', function(e) {
      var attribute_name = e.target.id;
      var value_name = e.target.value;

      //Aggiunge Sample Path e Sample Description
      $.ajax({
        url: "{{ config('webservice.service_uri') }}getPhysicalPropertiesSamplesMap",
        method: "POST",
        dataType: "json",
        data: data,
        contentType: "text/plain",

        success: function(result_1, status, jqXHR) {
          console.log('Web Service Success: Samples Path Loaded');

          $.ajax({
            url: "{{ config('webservice.service_uri') }}getPhysicalPropertiesDescriptionsMap",
            method: "POST",
            dataType: "json",
            data: data,
            contentType: "text/plain",

            success: function(result_2, status, jqXHR) {
              console.log('Web Service Success: Samples Description Loaded');

              $('#sample_block').empty();
              $.each(result_1, function(index, sample_path) {
                $.each(result_2, function(sample_name, description) {
                  if (index == value_name && sample_name == value_name) {
                    $('#sample_block').append('<div class="row"><h2>Sample</h2></div><div class="row"><h4>' + attribute_name + ': ' + value_name +
                      '</h4></div><div class="row"><p>Hover sample for description</p></div><br /><div class="row sample-box"><img src="' + sample_path + '" alt="' + value_name +
                      ' Sample" class="sample-image tooltip-description" title=' + description + ' /></div>');
                  }
                });
              });

              $('.tooltip-description').tooltipster({
                theme: 'tooltipster-light',
                touchDevices: true
              });

            },
            error(jqXHR, textStatus, errorThrown) {
              console.log('Web Service Fail');
            }
          });

        },
        error(jqXHR, textStatus, errorThrown) {
          console.log('Web Service Fail');
        }
      });
    }).trigger('change');

    // Aggiunge Data Properties
    $.ajax({
      url: "{{ config('webservice.service_uri') }}getDataPropertiesMap",
      method: "POST",
      dataType: "json",
      data: data,
      contentType: "text/plain",

      success: function(result, status, jqXHR) {
        console.log('Web Service Success: Data Properties Loaded');

        $('#data_properties').empty();
        $.each(result, function(index, attribute_class) {
          $.each(attribute_class, function(attribute_index, attribute) {
            $('#data_properties').append('<div class="row"><div class="col span-1-of-3"><input name="attribute_name[]" type="hidden" value="' + attribute_index + '"><label for="' + attribute_index + '">' + attribute_index +
              '</label></div><div class="col span-2-of-3"><select name="attribute_select[]" id="' + attribute_index + '"></select></div></div>');

            for (var i = 0; i < attribute.length; i++) {
              $('#' + attribute_index + '').append('<option value="' + attribute[i] + '">' + attribute[i] + '</option>');
            }
          });
        });

      },
      error(jqXHR, textStatus, errorThrown) {
        console.log('Web Service Fail');
      }
    });
  </script>
