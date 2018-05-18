var isUser = false;

$("#signUser").change(function() {
$.ajax({
type: "post",
url: "checkUser.php",
dataType: "json",
data: { "username": $("#signUser").val() },
success: function(data,status) {
    if(data != false){
    isUser = false;
       $("#isthere").html("<h4 style = 'color: red;'>Username is taken </h4>");
    }
    else{
    isUser = true;
       $("#isthere").hide();
    }

},
complete: function(data,status) { //optional, used for debugging purposes
}

});//ajax

});//change


$("#signUp").submit(function(event) {
    var user = $("#signUser").val();
    var pass = $("#signPass").val();
    var phone =  $("#signPhone").val();
    // alert(user);
    if(isUser == true){
        alert("You have created your account please login");
         $.ajax({
            type : "post",
            url  : "signUpDB.php",            
            dataType : "json",
            data : {"username" : user,
                "password" : pass,
                "phoneNumber" :phone},            
            success : function(data){
                
            },
            complete: function(data,status) { //optional, used for debugging purposes
            }

        });//AJAX
    }
    else{
        alert("Error Signin up Please Try again");
    }
});

$("#addPet").submit(function(){
    var name = $("#newName").val();
    var type = $("#newType").val();
    var breed = $("#newBreed").val();
    var age = $("#newAge").val();
    var cost = $("#newCost").val();
    var img = $("#newImg").val();

    $.ajax({
        type : "post",
        url  : "addPetDB.php",            
        dataType : "json",
        data : {"jName" : name,
            "jType" : type,
            "jBreed" :breed,
            "jAge" :age,
            "jCost": cost,
            "jImg": img},            
        success : function(data){
            },
        complete: function(data,status) { //optional, used for debugging purposes
        }

    });//AJAX

});



$("#changePet").submit(function(){
    var name = $("#changeName").val();
    var breed = $("#changeBreed").val();
    var id = "breed"+name;
    $.ajax({
        type : "post",
        url  : "updatePet.php",            
        dataType : "json",
        data : {"chngName" : name,
            "chngBreed" :breed},            
        success : function(data){
            if(data){
                $("#"+id).html(data.breed);
                alert("Updated Data");
            }
        },
        complete: function(data,status) { //optional, used for debugging purposes
        }

    });//AJAX

});


$("#popular").change(function(){
    var breed = $("#popular").val();
    $.ajax({
        type : "post",
        url  : "popular.php",            
        dataType : "json",
        data : {"breed" : breed},            
        success : function(data){
            if(data){
                // alert("inhere");
            $("#popularImg").html(  "<img src='" + data.img + "'>");
            $("#popularName").html(data.name);
            }
            else{
                alert("Error Occured ");
            }
            // <span id="popularImg"></span><span id="popularName"></span>
        },
        complete: function(data,status) { //optional, used for debugging purposes
        }

    });//AJAX

});



function featured(e){
    $.ajax({
    type : "post",
    url  : "addFeatured.php",            
    dataType : "json",
    data : {"id": $("#"+ e.id).val()},          
    success : function(data){
      
    },
    complete: function(data,status) { //optional, used for debugging purposes
    }

    });//AJAX
}


function clickMe(e){
    $.ajax({
        type : "post",
        url  : "getPhone.php",            
        dataType : "json",
        data : {"phoneUser": $("#"+ e.id).val(),
            "name": $("#Name"+e.id).val()},          
        success : function(data){
            alert("Owner name: " + $("#"+ e.id).val() + "\nOwner Phone number: " +data.contact);
        },
        complete: function(data,status) { //optional, used for debugging purposes
        }

    });//AJAX
}

function deleteMe(e){
    $.ajax({
        type : "post",
        url  : "deletePet.php",            
        dataType : "json",
        data : {"petID": $("#"+ e.id).val()},          
        success : function(data){
            alert("Pet was deleted");
        },
        complete: function(data,status) { //optional, used for debugging purposes
        }
    });//AJAX

}
