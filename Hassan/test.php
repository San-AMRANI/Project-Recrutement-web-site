let descriptionOffre = new Quill('#descriptionoffre00', {
theme: 'snow'
});

descriptionOffre.on('text-change', function () {
var discOffreContent = descriptionOffre.root.innerHTML;
var descriptionElements = document.getElementsByName('discriptionoff');
for (var i = 0; i < descriptionElements.length; i++) { descriptionElements[i].value=discOffreContent; } });


<div id="descriptionoffre00" class="quill-editor">
                            <p>Description..</p>
                        </div>
                        <textarea hidden type="text" name="discriptionoff" id=""></textarea>