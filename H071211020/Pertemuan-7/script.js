const password = document.getElementById("password");
const toogle = document.getElementById("toogle");
        
        function showHide(){
            if (password.type === 'password'){
                password.setAttribute('type', 'text');
                toogle.classList.add('hide');
            } else {
                password.setAttribute('type', 'password');
                toogle.classList.remove('hide');
            };
        };