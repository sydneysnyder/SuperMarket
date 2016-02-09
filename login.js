    var phoneError="Phone # Format:(999)-999-9999";
    var firstNameError="Please Enter First Name";
    var lastNameError="Please Enter Last Name";
    var emailError="Invalid Email inputted.";
    var passwordError="Password Not Matching";
    var fNameErr=true;
    var lNameErr=true;
    var phoneNumErr=true;
    var emailErr=true;
    var pwErr=true;

         function checkFirstName(val){
     if(val==""){
      document.getElementById("checkOne").src="redX.png";
                           fNameErr=true;
         firstNameError="Please Enter First Name";
 
     }
      else{
                document.getElementById("checkOne").src="checkmark.png";   
          firstNameError="";
                   fNameErr=false;

      }
        
    }
    function checkLastName(val){
     if(val==""){
      document.getElementById("checkTwo").src="redX.png"; 
                            lNameErr=true;
         lastNameError="Please Enter Last Name";

     }
      else{
                document.getElementById("checkTwo").src="checkmark.png";
          lastNameError="";
                   lNameErr=false;

      }
        
    }
        function checkEmail(val){
         emailRE = /^.+@.+\..{2,4}$/;
            if (!val.match(emailRE)){
            document.getElementById("checkThree").src="redX.png"; 
                                                emailErr=true;

             emailError="Invalid Email inputted.";   
            }    
            else{
            document.getElementById("checkThree").src="checkmark.png";   
                emailError="";
                                emailErr=false;

            }
        }
        function checkPhone(val){
         phoneRE = /^\(\d{3}\)- *\d{3}-\d{4}$/;
            if (!val.match(phoneRE)){
             document.getElementById("checkFour").src="redX.png";  
                                                phoneNumErr=true;
                phoneError="Phone # Format:(999)-999-9999";

            }
            else{
             document.getElementById("checkFour").src="checkmark.png"; 
                phoneError="";
                                phoneNumErr=false;

            }
        }
        
function checkInputedPW(val) {
    var originalPW=document.getElementById("pw").value;
    if(val==originalPW){
    document.getElementById("check").src="checkmark.png";
                passwordError="";

                pwErr=false;

    }
    else{
    document.getElementById("check").src="redX.png";
         pwErr=true;
         passwordError="Password Not Matching";

    }
}
        function createAccount(){
           
            if(fNameErr==false && lNameErr==false && phoneNumErr==false && emailErr==false && pwErr==false){
                        alert("Account has been created.");
                        document.getElementById("f1").action="createAccount.php";
                        document.getElementById("f1").submit();
                        
                        }
            else{
             
            
         alert(phoneError+"\n"+emailError+"\n"+firstNameError+"\n"+lastNameError+"\n"+passwordError);        
           
                
            }
            
       }
       



    $("#f1").hide();
    function drop(){
       
        $("#f1").slideToggle("slow");
       
    }
