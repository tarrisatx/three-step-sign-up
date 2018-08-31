$('form.ajax').on('submit', function(){
    
    var that = $(this),
        url = that.attr('action'),
        type = that.attr('method'),
        data = {};

        that.find('[name]').each(function(index, value) {
            var that = $(this),
                name = that.attr('name'),
                value = that.val();

            data[name] = value;
        })
    

           $.ajax({
               url: url,
               type: type,
               dataType: 'json',
               data: data,
               success: function(data) {
                   //$('#results').html(JSON.stringify(data));
                   $("#results").html(data.Username + " " + data.Useremail);
                //$('#contact_form').html("<div id='message'></div>");
                //$('#message').html("<h2>Contact Form Submitted!</h2>", response) 
                //$("#results").append(response);
                //console.log(response);
                //var name = $("input#name").val();
                //console.log(myEmail);

               
               }
           })

        return false;
})
        
    