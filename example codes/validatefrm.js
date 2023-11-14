window.onload=init;
function init()
{
    document.getElementById('reset').onclick = clearDisplay;

    document.getElementById('name').focus();
}

function validateForm(thisForm) {
    alert("hello");
    var name = document.getElementById('name');
    var nameError = document.getElementById('nameError');
    var email = document.getElementById('email');
    var emailError = document.getElementById('emailError');
    var password = document.getElementById('pwd');
    var pwdError = document.getElementById('pwdError');

    return (
        isNotEmpty(name.value, name, "Please Enter your Name!", nameError) &&
        isValidName(name.value, name, "Only Characters and Whitespace Allowed!", nameError) &&
        checkLength(name.value, 5, 20, name, "Enter 5-20 characters", nameError) &&
        isValidEmail(email.value, email, "Enter a valid email", emailError) &&
        isValidPassword(password.value, password, "Enter a valid password!", pwdError)
    );
}

function showMessageAndFocus(isValid, focusInputElm, errMsg, errElm){
    if(!isValid){
        if(errElm !== undefined && errElm !== null &&
            errMsg !== undefined && errMsg !== null){
                errElm.innerHTML = errMsg;
            }
        if(focusInputElm !== undefined && focusInputElm !== null){
            focusInputElm.className = "error";
            if (focusInputElm && typeof focusInputElm.focus === 'function') {
                focusInputElm.focus();
            }
        }
    }
    else{
        if(errElm !== undefined && errElm !== null){
            errElm.innerHTML = "";
        }
        if (focusInputElm !== undefined && focusInputElm !== null) {
           focusInputElm.className = "";
        }
    }
}
function isNotEmpty(input,focusInputElm,errMsg,errElm){
    var isValid = (input !== undefined && input !== null && input.trim() !== "");
    showMessageAndFocus(isValid,focusInputElm,errMsg,errElm);

    return isValid;
}
function isValidName(input,focusInputElm,errMsg,errElm){
    var isValid= input.trim().match(/^[A-Za-z ]+$/) !== null;
    showMessageAndFocus(isValid,focusInputElm,errMsg,errElm);

    return isValid;
}
function checkLength(input,minLen,maxLen,focusInputElm,errMsg,errElm){
    var input = input.trim();
    var isValid = ((input.length>=minLen) && (input.length<=maxLen));
    showMessageAndFocus(isValid,focusInputElm,errMsg,errElm);

    return isValid;
}
function isValidEmail(input,focusInputElm,errMsg,errElm){
    var isValid = ((input!==null) && (input.trim().match(/^\w+[.]\w+@learner\.manipal\.(edu|in)$/)!==null));
    showMessageAndFocus(isValid,focusInputElm,errMsg,errElm);
    
    return isValid;
    
}
function isValidPassword(input,focusInputElm,errMsg,errElm){
    var isValid = ((input!==null) && (input.trim().match(/^\w{6,10}$/) !== null));

    showMessageAndFocus(isValid,focusInputElm,errMsg,errElm);

    return isValid;
}

function clearDisplay(){
    var elems = document.getElementsByTagName('*');
    for(var i=0;i<elems.length;i++){
        if(elems[i].id.match(/Error$/)){
            elems[i].innerHTML="";
        }
        f (elems[i].className === "error")
        {
            elems[i].className = ""; 
        }
    }
}