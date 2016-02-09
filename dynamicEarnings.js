$("#getEarningsForm").submit(function x(event){
    event.preventDefault();
    var formData = $("#getEarningsForm").serialize();
$.ajax({
    type: 'POST',
    url: $("#getEarningsForm").attr('action'),
    data: formData,
    success: function(data)
           {
               $("#outputTableTwo").html(data); // show response from the php script.
           }
})
});
