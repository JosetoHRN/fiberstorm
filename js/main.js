const user_json = JSON.parse(sessionStorage.getItem('user_data'));
document.querySelector('header > p').textContent += user_json['username'];

const logoutButton = document.getElementById('logout');
logoutButton.addEventListener('click', function(){
    console.log('a :>> ');
    window.location.assign('./login.php');
    sessionStorage.clear();
});