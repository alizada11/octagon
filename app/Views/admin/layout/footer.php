</div> <!-- End row -->
</div> <!-- End container -->
<script>
 function addBullet() {
  const container = document.getElementById('bullet-container');
  const input = document.createElement('input');
  input.type = 'text';
  input.name = 'bullets[]';
  input.className = 'form-control mb-2';
  input.placeholder = 'Bullet point';
  container.appendChild(input);
 }
</script>
<script>
 $(document).ready(function() {

  var navListItems = $('div.setup-panel div a'),
   allWells = $('.setup-content'),
   allNextBtn = $('.nextBtn');

  allWells.hide();

  navListItems.click(function(e) {
   e.preventDefault();
   var $target = $($(this).attr('href')),
    $item = $(this);

   if (!$item.hasClass('disabled')) {
    navListItems.removeClass('btn-success').addClass('btn-default');
    $item.addClass('btn-success');
    allWells.hide();
    $target.show();
    $target.find('input:eq(0)').focus();
   }
  });

  allNextBtn.click(function() {
   var curStep = $(this).closest(".setup-content"),
    curStepBtn = curStep.attr("id"),
    nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
    curInputs = curStep.find("input[type='text'], input[type='file'], input[type='url'], input[type='email'], input[type='date']"),
    isValid = true;

   $(".form-group").removeClass("has-error");
   for (var i = 0; i < curInputs.length; i++) {
    if (!curInputs[i].validity.valid) {
     isValid = false;
     $(curInputs[i]).closest(".form-group").addClass("has-error");
    }
   }

   if (isValid) nextStepWizard.removeAttr('disabled').trigger('click').addClass('w3-green');
  });

  $('div.setup-panel div a.btn-success').trigger('click');
 });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
 document.addEventListener('DOMContentLoaded', function() {
  // Initialize Select2 on all .agency-select fields
  $('.agency-select').select2({
   width: '100%',
   dropdownParent: $(this).closest('.modal') // ensure it works inside modals
  });

  // If you have many modals with same class, re-init on modal show
  const modals = document.querySelectorAll('.modal');
  modals.forEach(modal => {
   modal.addEventListener('shown.bs.modal', function() {
    $(this).find('.agency-select').select2({
     dropdownParent: $(this),
     width: '100%'
    });
   });
  });
 });
</script>

</body>

</html>