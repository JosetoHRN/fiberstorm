const buttonPOST = document.getElementById('postInventario');
buttonPOST.addEventListener('click', () => {
    console.log('post button clicked :>> ');
});

const tableOptions = document.getElementById('tableOptions');
const tableHeader = document.getElementById('tableHeader');
const tableContent = document.getElementById('tableContent');

const getData = async () => {
    fetch('../php/inventario/getAll.php',{
        method: 'GET',
        headers:{
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        console.log('data :>> ', data);
        const keys = Object.keys(data[0]);
        console.log('keys :>> ', keys);
        keys.map((item => {
            let header = document.createElement('span');
            header.innerText = item;
            tableHeader.appendChild(header);
        }));
        
    })
    .catch(err => console.log('err :>> ', err))
    .finally(()=>console.log('finally'));
};

getData();