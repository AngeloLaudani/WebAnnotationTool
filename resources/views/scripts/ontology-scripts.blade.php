<script>
  $('#class_select').on('change', function(e) {

    var class_id = e.target.value;

    $.get('/class-filter?class_id=' + class_id, function(data) {

      $('#label_select').empty();
      $.each(data.label, function(index, label) {

        $('#label_select').append('<option value="' + label.id + '">' + label.label_name + '</option>');

      });

      $('#context_block').empty();
      $.each(data.ontology_class, function(index, ontology_class) {

        if (ontology_class.context_class == 1) {
          $('#context_block').append(
            '<div class="row"><div class="col span-1-of-3"><label for="context_class">Context Class</label></div><div class="col span-2-of-3"> Yes </div></div><div class="row"><div class="col span-1-of-3"><label for="target_class">Target Class</label></div><div class="col span-2-of-3">' +
            ontology_class.target_class + '</div></div>');
        }

      });

      $('#multivalues').empty();
      $.each(data.attribute, function(index, attribute) {

        attribute_name = attribute.attribute_name.replace(/ /g,"_");

        $('#multivalues').append('<div class="row"><div class="col span-1-of-3"><label for="' + attribute.attribute_name + '">' + attribute.attribute_name +
          '</label></div><div class="col span-2-of-3"><select name="attribute_select[]" id="' + attribute_name + '"></select></div></div>');

        $.each(data.value, function(index, value) {
          if (attribute.id == value[0].attribute_id) {
            for (var i = 0; i < value.length; i++) {
              $('#' + attribute_name + '').append('<option value="' + value[i].id + '">' + value[i].value_name + '</option>');
            }
          }
        });

        $('#' + attribute_name + '').on('change', function(e) {
          var value_id = parseInt(e.target.value);
          $.each(data.value, function(index, value) {
            for (var i = 0; i < value.length; i++) {
              if (value[i].id == value_id) {
                $('#sample_block').empty();
                $('#sample_block').append('<div class="row"><h2>Sample</h2></div><div class="row"><h4>' + attribute.attribute_name + ': ' + value[i].value_name +
                  '</h4></div><div class="row"><p>Hover sample for description</p></div><br /><div class="row sample-box"><img src="{{ asset('storage/samples')}}/' + attribute.attribute_name + '/' + value[i].sample_path + '" alt="' + value[i].sample_path + '" class="sample-image tooltip-description" title="' + value[i].sample_description + '" /></div>');
              }
            }
          });

            $('.tooltip-description').tooltipster({
              theme: 'tooltipster-light',
              touchDevices: true
            });

        }).trigger('change');

      });

    });

  });
</script>
