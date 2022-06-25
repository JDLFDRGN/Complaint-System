let signupPassword = document.querySelector('#signup-password');
let signupRetypePassword = document.querySelector('#signup-retype-password');
let adminViewUser = document.querySelectorAll('.admin-view-user');
let requestAccept = document.querySelectorAll('.request-accept');
let requestDelete = document.querySelectorAll('.request-delete');
let inboxForwardButton = document.querySelectorAll('.inbox-forward-button');

//Navigate Location
function navigate(navigateTo){
    location.href = navigateTo;
}

//Show or Hide Passwords
function passwordVisibility(e){
    if(e.checked){
        signupPassword.type = 'text';
        signupRetypePassword.type = 'text'; 
    }else{
        signupPassword.type = 'password';
        signupRetypePassword.type = 'password';
    }
}

//View All Users
adminViewUser.forEach(e=>{
    e.addEventListener('click',()=>{
        let userNumber = e.parentElement;
        let fullname = userNumber.querySelector('.admin-user-fullname');
        let email = userNumber.querySelector('.admin-user-email');
        let password = userNumber.querySelector('.admin-user-password');
        let date = userNumber.querySelector('.admin-user-date');

        document.querySelector('#admin-user-view-fullname').innerHTML = fullname.innerHTML.replace(/[0-9]/g,'').substring(2);
        document.querySelector('#admin-user-view-email').innerHTML = email.innerHTML;
        document.querySelector('#admin-user-view-password').innerHTML = password.innerHTML;
        document.querySelector('#admin-user-view-date').innerHTML = date.innerHTML;
        showViewForm('#admin-user-view-popup','admin-hide-view-form');
    });
});
//View Request form
requestAccept.forEach(e=>{
    e.addEventListener('click',()=>{
        let userID = e.parentElement.parentElement.id;        
        document.querySelector('#respond-instruction').innerHTML = "Decipher the morse code to accept the applicant. The code is seven lowercase letters.";
        document.querySelector('#applicant-id').value = userID;
        document.querySelector('#respond-submit').name = 'respond-submit';
        showViewForm('#respond-form','hide-respond-form');
    });
});
//View Delete form
requestDelete.forEach(e=>{
    e.addEventListener('click',()=>{
        let userID = e.parentElement.parentElement.id;
        document.querySelector('#applicant-id').value = userID;
        document.querySelector('#respond-instruction').innerHTML = "Decipher the morse code to delete the applicant. The code is seven lowercase letters.";
        document.querySelector('#respond-submit').name = 'respond-submit2';
        showViewForm('#respond-form','hide-respond-form');
    });
});
//View Forward form
inboxForwardButton.forEach(e=>{
    e.addEventListener('click',()=>{
        let complaintID = e.parentElement.id;
        document.querySelector('#complaint-id').value = complaintID;
        showViewForm('#forward-form','hide-forward-form');
    });
});

//Show the view form
function showViewForm(idName, className){
    document.querySelector(idName).classList.remove(className);
}
//Hide the view form
function hideViewForm(idName, className){
    document.querySelector(idName).classList.add(className);
}