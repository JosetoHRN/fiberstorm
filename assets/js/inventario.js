const buttonPOST = document.getElementById('postInventario');
buttonPOST.addEventListener('click', () => {
    console.log('post button clicked :>> ');
});

const tableOptions = document.getElementById('tableOptions');
const tableHeader = document.getElementById('tableHeader');
const tableContent = document.getElementById('tableContent');

const getData = async () => {
    // Set loading
    fetch('../php/inventario/getAll.php',{
        method: 'GET',
        headers:{
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        // Table heading
        const keys = Object.keys(data[0]);
        keys.map((item) => {
            let header = document.createElement('span');
            header.innerText = item;
            tableHeader.appendChild(header);
        });
        // Table content
        data.map((item) => {
            let row = document.createElement('li');
            row.id = "inventario-"+item.id;
            Object.values(item).map((value) => {
                let data = document.createElement('p');
                data.innerText = value;
                row.appendChild(data);
            });
            // Append actions
            // ...
            tableContent.appendChild(row);
        });
        
    })
    .catch(err => console.log('err :>> ', err))
    .finally(()=> {
        //Remove loading
        console.log('finally');
    });
};

getData();