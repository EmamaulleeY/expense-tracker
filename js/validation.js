const name1 = document.getElementById('user1');
const password = document.getElementById('password1');
const form = document.getElementById('form');
const errorElement = document.getElementById('error');

form.addEventListener('log', (e) =>{
    let message = [];
    if (name1.value === '' || password.value == ''){
        alert('Blank values are not accepted');
    }
    if (message.length > 0){
        e.preventDefault();
        errorElement.innerText = message.join(', ');
    }
})

const name2 = document.getElementById('user');
const password1 = document.getElementById('password');
const form1 = document.getElementById('form1');
const errorElement1 = document.getElementById('error1');

form.addEventListener('reg', (e) =>{
    let message1 = [];
    if (name2.value === '' || password1.value == ''){
        alert('Blank values are not accepted');
    }
    if (message1.length > 0){
        e.preventDefault();
        errorElement1.innerText = message1.join(', ');
    }
})