
$("#myForm").submit(function x(event){
    event.preventDefault();
    var formData = $("#myForm").serialize();
$.ajax({
    type: 'POST',
    url: $("#myForm").attr('action'),
    data: formData,
    success: function(data)
           {
               $("#outputTable").html(data); // show response from the php script.
           }
})
});


$("#myFormSix").submit(function x(event){
    event.preventDefault();
    var formData = $("#myFormSix").serialize();
$.ajax({
    type: 'POST',
    url: $("#myFormSix").attr('action'),
    data: formData,
    success: function(data)
           {
               $("#outputTable").html(data); // show response from the php script.
           }
})
});
