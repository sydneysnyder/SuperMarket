var transTotal=0.0;
$("#opButton").click(function x(event){
    event.preventDefault();
    var formData = $("#checkPrice").serialize();
$.ajax({
    type: 'POST',
    url: $("#checkPrice").attr('action'),
    data: formData,
    success: function(data)
           {
               $("#total").html(data); 
               transTotal = parseFloat($("#total").text())+transTotal;
               
               document.getElementById("total").innerHTML=transTotal.toFixed(2).toString();
               //console.log(document.getElementById("total").innerHTML+"");
               console.log(transTotal);
           }
})
});
