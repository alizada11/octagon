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
</body>

</html>