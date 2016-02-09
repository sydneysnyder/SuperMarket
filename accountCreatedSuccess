$("#f1").submit(function x(event){
    event.preventDefault();
    var formData = $("#f1").serialize();
$.ajax({
    type: 'POST',
    url: $("#f1").attr('action'),
    data: formData,
    success: function(data)
           {
               $("#accCreatedDiv").html(data); // show response from the php script.
           }
})
});
