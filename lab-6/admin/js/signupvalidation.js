function validateForm() {
   
    var name = document.getElementById("name").value;
    //alert(name);
    var email = document.getElementById("email").value;
    //alert(email);
    var password = document.getElementById("password").value;
    //alert(password);
    var confirmPassword = document.getElementById("confirmPassword").value;
    //alert(confirmPassword);

    var date = document.getElementById("birthday").value;
    //alert(date);
    var gender = "";
    var radios = document.getElementsByName('gender');
    
    var length = radios.length;
    for (var i = 0; i < length; i++) {
        if (radios[i].checked) {
            gender = radios[i].value;
            break;
        }
    } 
    //alert(gender);
    var regex;
    if (name.length === 0 || email.length === 0 || password.length === 0 || confirmPassword.length === 0 || date.length === 0 || gender.length === 0) {
        alert('fill up all the fields');
        return false;
    }
    else
    {
        regex=/^[a-zA-Z-' ]*$/;
        if(name.length<5)
        {
            alert("name must be five characters long");
            return false;
        }
        
        else if(!name.match(regex))
        {
            alert("invalid name");
            return false;
        }
        
        regex=/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;
        if(!email.match(regex))
        {
            alert("invalid email");
            return false;
        }
        regex=/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/;
        if(password!=confirmPassword)
        {
            alert("password mismatch");
            return false;
        }
        else if(!password.match(regex))
        {
            alert("password must be 8 characters long. contain special character,number,upper and lower case characters");
            return false;
        }

    }

    return true;
}
