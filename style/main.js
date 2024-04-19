var aboutme = document.getElementById('about');
aboutme.onclick = function aboutus(){
  alert('Designed By Mahmoud');
};
//Validate  HYDRA VALIDATE The Input (FrontEnd)
/*
1-Inputs require
2-input > 5 & password > 8 & Email > 8
3-Not Empty
4- Input !< 11 & Password !< 24 & email  !< 20
*/
var form          = document.getElementById('formone');
var allFormInput  = form.elements;
var dontCreat     = 0;
var userName      = allFormInput.unm,
    email         = allFormInput.mail,
    passwordOne   = allFormInput.pwdr,
    passwordCon   = allFormInput.pwdrc;
    function valiform(data,errmessage,corrmessage,messageArea,slength,hlength){
      if(data.value == "" || data.value.indexOf("<") !== -1 || data.value.indexOf(">") !== -1 || typeof(data.value) == null || typeof(data.value) == 'undefined'){
        document.getElementById(messageArea).innerHTML = errmessage;
        dontCreat = 1;
        return false;
      }
      else if(data.value.search(/\s/g) > -1 || data.value.length <= slength || data.value.length >= hlength ){
        document.getElementById(messageArea).innerHTML = errmessage;
        dontCreat = 1;
        return false;
      }
      else {
        document.getElementById(messageArea).innerHTML = corrmessage;
        dontCreat = 2;
        return true;
      }
    }
function crousa(){
  if(dontCreat !== 2){
    document.getElementById('submitError').innerHTML = 'Dont Joking With Me Back And Correct Your Error!!';
    return false;
  } else if (passwordOne.value !== passwordCon.value){
    document.getElementById('errorPassC').innerHTML = 'Password Not Matched !';
    dontCreat = 1;
    return false;
  }
  else{
    return true;
  }
}
/*  END OF THE HYDRA-VALIDATE FUNCTION */
userName.addEventListener('input',function() { valiform(userName,'Not valid or correct username','Valid Keep going','errorUser',6,20); });
email.addEventListener('input',function() { valiform(email,'Not valid email','Valid email','errorEmail',15,42); });
passwordOne.addEventListener('input',function() { valiform(passwordOne,'Not valid Or Not Strong','Strong Password','errorPass',12,22); });
passwordCon.addEventListener('input',function() { valiform(passwordCon,'Not Match Or Wrong Type Password','Strong Password','errorPassC',12,22); });
