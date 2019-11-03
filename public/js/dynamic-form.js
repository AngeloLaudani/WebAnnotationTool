$(document).on('click', '.define-btn', function(e) {
  $('.define-ontology-form').removeClass('hide').addClass('show');
  $('.upload-ontology-form').removeClass('show').addClass('hide');
});

$(document).on('click', '.upload-btn', function(e) {
  $('.upload-ontology-form').removeClass('hide').addClass('show');
  $('.define-ontology-form').removeClass('show').addClass('hide');
});

$(document).on('change', '.context_class', function(e) {

  if ($(this).closest('.context_class').val() == '1') {
    $(this).closest('.class-selector').find('.target_class_box').removeClass('hide').addClass('show');
  }
  if ($(this).closest('.context_class').val() == '0') {
    $(this).closest('.class-selector').find('.target_class_box').removeClass('show').addClass('hide');
  }

});

$(document).on('click', '.labels-btn', function(e) {
  $(this).closest('.class-selector').find('.labels-btn').removeClass('btn-ghost').addClass('btn-full');
  $(this).closest('.class-selector').find('.attributes-btn').removeClass('btn-full').addClass('btn-ghost');
  $(this).closest('.class-selector').find('.labels-block').removeClass('hide').addClass('show');
  $(this).closest('.class-selector').find('.attributes-block').removeClass('show').addClass('hide');
});

$(document).on('click', '.attributes-btn', function(e) {
  $(this).closest('.class-selector').find('.attributes-btn').removeClass('btn-ghost').addClass('btn-full');
  $(this).closest('.class-selector').find('.labels-btn').removeClass('btn-full').addClass('btn-ghost');
  $(this).closest('.class-selector').find('.attributes-block').removeClass('hide').addClass('show');
  $(this).closest('.class-selector').find('.labels-block').removeClass('show').addClass('hide');
});

// Sample windows popup
$(document).on('click', '.sample-btn', function(e) {
  $(this).closest('.sample-wrap').find('.sample-window').removeClass('hide').addClass('show');
});

$(document).on('click', '.add-sample', function(e) {
  $(this).closest('.sample-wrap').find('.sample-window').removeClass('show').addClass('hide');
});

$(document).on('click', '.close', function(e) {
  $(this).closest('.sample-wrap').find('#sample').val("");
  $(this).closest('.sample-wrap').find('#sample_description').val("");
  $(this).closest('.sample-wrap').find('.sample-window').removeClass('show').addClass('hide');
});

// Dynamic form
$(document).ready(function() {
  var max_fields = 10;
  var class_wrapper = $(".class-wrap");
  var class_add_button = $(".add-class");

  var x = 1;
  var y = 1;
  var z = 1;
  $(class_add_button).click(function(e) {
    e.preventDefault();
    if (x < max_fields) {
      x++;
      y = 1;
      $('html,body').animate({
          scrollTop: $(".add-class").offset().top
        },
        'slow');
      $(class_wrapper).append('<div class="remove-wrap"><div class="class-selector"><div class="row"><div class="col span-2-of-4"><label for="class_name">Class</label></div><div class="col span-1-of-4"><label for="context_class">Context Class</label></div></div><div class="row"><div class="col span-2-of-4"><input type="text" name="class_name[' + x + '][]" id="class_name" placeholder="Class name"></div><div class="col span-1-of-4"><select name="context_class[' + x + '][]" class="context_class" id="context_class"><option value="0" selected>No</option><option value="1">Yes</option></select></div><div class="col span-1-of-4"><i class="ion-android-close icon-small remove-class"></i></div></div><div class="target_class_box hide"><div class="row"><div class="col span-2-of-4"><label for="target_class">Target Class</label></div></div><div class="row"><div class="col span-2-of-4"><input type="text" name="target_class[' + x + '][]" id="target_class" placeholder="Target Class name"></div></div></div><div class="row"><div class="col span-1-of-2"><div class="selector-box"><div class="label-attribute-selector"><div class="row"><div class="btn btn-full labels-btn"> Labels </div></div><div class="row"><div class="btn btn-ghost attributes-btn"> Attributes </div></div></div></div></div><div class="col span-1-of-2"><div class="labels-attributes-box"><div class="labels-block"><div class="label-wrap"><div class="row"><label for="label_name">Label</label></div><div class="row"><div class="col span-2-of-3"><input type="text" name="label_name[' + x + '][]" id="label_name" class="set-label" placeholder="Label name"></div></div></div><div class="row"><div class="btn btn-full add-label">Add Label</div></div></div><div class="attributes-block hide"><div class="attribute-wrap"><div class="row"><label for="attribute_name">Attribute</label></div><div class="row"><div class="col span-2-of-3"><input type="text" name="attribute_name[' + x + '][1][]" id="attribute_name" class="set-attribute" placeholder="Attribute name"></div></div><div class="value-wrap"><div class="sample-wrap"><div class="row"><div class="col span-1-of-3"><input type="text" name="value_name[' + x + '][1][1][]" id="value_name" class="set-value" placeholder="Value"></div><div class="col span-1-of-3"><div class="sample-btn">Sample</div></div><div class="col span-1-of-3"><i class="ion-android-add add-value"></i></div></div><div class="sample-window hide"><div class="sample-content"><span class="close">&times;</span><input type="file" id="sample" name="sample[' + x + '][1][1][]" accept="image/*" /><input type="text" id="sample_description" name="sample_description[' + x + '][1][1][]" placeholder="Sample description"><div class="btn btn-full add-sample">Add Sample</div></div></div></div></div></div><div class="row"><div class="btn btn-full add-attribute">Add Attribute</div></div></div></div></div></div></div></div>');
    }
  });

  $(class_wrapper).on("click", ".ion-android-close", function(e) {
    e.preventDefault();
    $(this).closest('.remove-wrap').remove();
    x--;
    $('html,body').animate({
        scrollTop: $(".class-selector").offset().top
      },
      'slow');
  });

  $(document).on('click', '.add-attribute', function(e) {

    e.preventDefault();
    var x = $(this).parents(".attributes-block").find(".set-attribute").attr("name").match(/\d+/)[0];
    y++;
    z = 1;


    $(this).closest('.attributes-block').find('.attribute-wrap').append('<div class="remove-wrap"><div class="row"><label for="attribute_name">Attribute</label></div><div class="row"><div class="col span-2-of-3"><input type="text" name="attribute_name[' + x + '][' + y + '][]" id="attribute_name" class="set-attribute" placeholder="Attribute name"></div><div class="col span-1-of-3"><i class="ion-android-close icon-small"></i></div></div><div class="value-wrap"><div class="sample-wrap"><div class="row"><div class="col span-1-of-3"><input type="text" name="value_name[' + x + '][' + y + '][1][]" id="value_name" class="set-value" placeholder="Value"></div><div class="col span-1-of-3"><div class="sample-btn">Sample</div></div><div class="col span-1-of-3"><i class="ion-android-add add-value"></i></div></div><div class="sample-window hide"><div class="sample-content"><span class="close">&times;</span><input type="file" id="sample" name="sample[' + x + '][' + y + '][1][]" accept="image/*" /><input type="text" id="sample_description" name="sample_description[' + x + '][' + y + '][1][]" placeholder="Sample description"><div class="btn btn-full add-sample">Add Sample</div></div></div></div></div>');


    $(".attribute-wrap").on("click", ".ion-android-close", function(e) {
      e.preventDefault();
      $(this).closest('.remove-wrap').remove();
    });

  });

  $(document).on('click', '.add-value', function(e) {

    e.preventDefault();
    var x = $(this).parents(".attributes-block").find(".set-value").attr("name").match(/\d+/)[0];
    z++;

    $(this).closest(".value-wrap").append('<div class="remove-wrap"><div class="sample-wrap"><div class="row"><div class="col span-1-of-3"><input type="text" name="value_name[' + x + '][' + y + '][' + z + '][]" id="value_name" class="set-value" placeholder="Value"></div><div class="col span-1-of-3"><div class="sample-btn">Sample</div></div><div class="col span-1-of-3"><i class="ion-android-close icon-small"></i></div></div><div class="sample-window hide"><div class="sample-content"><span class="close">&times;</span><input type="file" id="sample" name="sample[' + x + '][' + y + '][' + z + '][]" accept="image/*" /><input type="text" id="sample_description" name="sample_description[' + x + '][' + y + '][' + z + '][]" placeholder="Sample description"><div class="btn btn-full add-sample">Add Sample</div></div></div></div></div>');


    $(".value-wrap").on("click", ".ion-android-close", function(e) {
      e.preventDefault();
      $(this).closest('.remove-wrap').remove();

    });

  });

});

$(document).on('click', '.add-label', function(e) {

  e.preventDefault();
  x = $(this).parents(".labels-block").find(".set-label").attr("name");

  $(this).closest('.labels-block').find('.label-wrap').append('<div class="remove-wrap"><div class="row"><div class="col span-2-of-3"><input type="text" name="' + x + '" id="label_name" placeholder="Label name"></div><div class="col span-1-of-3"><i class="ion-android-close icon-small"></i></div></div></div>');


  $(".label-wrap").on("click", ".ion-android-close", function(e) {
    e.preventDefault();
    $(this).closest('.remove-wrap').remove();

  });

});
